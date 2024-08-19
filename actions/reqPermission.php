<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    /* Validación de datos por método POST */
    if (isset($_POST['submitPer'])) {
        $currentUser = $_SESSION['usuarioactual'];

        $queryUsuario = "SELECT nombre FROM usuarios WHERE idusuario = '$currentUser'";
        $resultUsuario = mysqli_query($conecta, $queryUsuario);

        if ($resultUsuario) {
            $row = mysqli_fetch_assoc($resultUsuario);

            $nameEmployee = $row['nombre'];
        }

        $typePermission = $_POST['typePermissionInput'];
        $descriptionPermission = $_POST['descriptionPermissionInput'];
        $startDatePermission = $_POST['startDatePermissionInput'];
        $endDatePermission = $_POST['endDatePermissionInput'];

        // Preparar la consulta
        $stmt = mysqli_prepare($conecta, "INSERT INTO permisos(empleadopermiso, tipopermiso, descripcionpermiso, iniciopermiso, finpermiso) VALUES (?, ?, ?, ?, ?)");

        // Vincular los parámetros (sssss = 5 strings)
        mysqli_stmt_bind_param($stmt, 'sssss', $nameEmployee, $typePermission, $descriptionPermission, $startDatePermission, $endDatePermission);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        header("Location: ../pages/home.php");
    }
?>
