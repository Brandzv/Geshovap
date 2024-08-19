<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    /* Validación de datos por método POST */
    if (isset($_POST['submitVac'])) {
        $currentUser = $_SESSION['usuarioactual'];

        $queryUsuario = "SELECT nombre FROM usuarios WHERE idusuario = '$currentUser'";
        $resultUsuario = mysqli_query($conecta, $queryUsuario);

        if ($resultUsuario) {
            $row = mysqli_fetch_assoc($resultUsuario);

            $nameEmployee = $row['nombre'];
        }

        $startDate = $_POST['startDateInput'];
        $endDate = $_POST['endDateInput'];

        // Preparar la consulta
        $stmt = mysqli_prepare($conecta, "INSERT INTO solicitar(empleadosolicitud, iniciosolicitud, finsolicitud) VALUES (?, ?, ?)");

        // Vincular los parámetros (sssss = 5 strings)
        mysqli_stmt_bind_param($stmt, 'sss', $nameEmployee, $startDate, $endDate);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        header("Location: ../pages/home.php");
    }
?>
