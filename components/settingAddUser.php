<?php
    include("../seguridad.php");
    include("../conexion.php");

    /*Validación de datos por método POST*/
    if (isset($_POST['save-submit'])) {
        $userId = $_POST['addUserIdInput'];
        $userName = $_POST['addNameIdInput'];
        $userPass = hash('sha256', $_POST['addPassIdInput']);
        $userStatus = $_POST['addStatusIdInput'];

        $checkQuery = "SELECT idusuario FROM usuarios WHERE idusuario = '$userId'";
        $checkResult = mysqli_query($conecta, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            header("Location: ../pages/settings.php");
        } else {
            $query = "INSERT INTO usuarios(idusuario, nombre, clave, estado) VALUES ('$userId', '$userName', '$userPass', '$userStatus')";
            $result = mysqli_query($conecta, $query);

            header("Location: ../pages/settings.php");
        }
    }
?>
