<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    $employee_req = $_GET['empleado'];
    $startDate = $_GET['inicio'];
    $endDate = $_GET['fin'];

    // Formatea a DateTime a partir de las fechas
    $fechaInicio = new DateTime($startDate);
    $fechaFin = new DateTime($endDate);
    // Calcula la diferencia en días
    $intervalo = $fechaInicio->diff($fechaFin);
    $day_count = $intervalo->days;

    // Sanea el valor de $employee_req
    $employee_safe = mysqli_real_escape_string($conecta, $employee_req);

    $query = "SELECT diatotal, disponible, diausado FROM vacaciones WHERE empleado LIKE ?";
    $stmt = mysqli_prepare($conecta, $query);
    mysqli_stmt_bind_param($stmt, "s", $employee_safe);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        $dias_totales = $row['diatotal'];
        $dias_disponibles = $row['disponible'];
        $dias_usados = $row['diausado'];

        $updateDias_disponibles = $dias_disponibles - $day_count;
        $updateDias_usados = $dias_usados + $day_count;

        $query_update = "UPDATE vacaciones SET disponible = ?, diausado = ? WHERE empleado LIKE ?";
        $stmt_update = mysqli_prepare($conecta, $query_update);
        mysqli_stmt_bind_param($stmt_update, "iis", $updateDias_disponibles, $updateDias_usados, $employee_safe);
        $resultado_update = mysqli_stmt_execute($stmt_update);

        if ($resultado_update) {
            $queryUpdate_status = "UPDATE solicitar SET status = ? WHERE empleadosolicitud = ? AND iniciosolicitud = ? AND finsolicitud = ?";
            $stmtUpdate_status = mysqli_prepare($conecta, $queryUpdate_status);
            $new_status = 1; // 0 para visible, 1 aceptado y 2 rechazado
            mysqli_stmt_bind_param($stmtUpdate_status, "isss", $new_status, $employee_safe, $startDate, $endDate);
            $resultado_update_status = mysqli_stmt_execute($stmtUpdate_status);

            header("Location: ../pages/requestVacation.php");
        }
    }

    mysqli_close($conecta);
?>
