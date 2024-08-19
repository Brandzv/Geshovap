<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    // Obtener parámetros de la solicitud
    $employee_req = $_GET['empleado'];
    $startDate = $_GET['inicio'];
    $endDate = $_GET['fin'];

    if ($stmtUpdate_status = mysqli_prepare($conecta, "UPDATE solicitar SET status = ? WHERE empleadosolicitud = ? AND iniciosolicitud = ? AND finsolicitud = ?")) {
        $new_status = 2; // 0 para visible, 1 aceptado y 2 rechazado

        mysqli_stmt_bind_param($stmtUpdate_status, "isss", $new_status, $employee_req, $startDate, $endDate);

        if (mysqli_stmt_execute($stmtUpdate_status)) {
            header("Location: ../pages/requestVacation.php");
        }
    }

    mysqli_close($conecta);
?>
