<?php
    include("../seguridad.php");
    include("../conexion.php");
	
	/*Validación de datos por método POST*/
	if (isset($_POST['save-submit'])) {
        $userId = $_POST['addUserIdInput'];
        $userName = $_POST['addNameIdInput'];
        $userPass = sha1($_POST['addPassIdInput']);
        $userStatus = $_POST['addStatusIdInput'];

        $query = "INSERT INTO usuarios(idusuario, nombre, clave, estado) VALUES ('$userId', '$userName', '$userPass', '$userStatus')";
        $result = mysqli_query($conecta, $query);

        header("Location: ../pages/settings.php");
    }
?>