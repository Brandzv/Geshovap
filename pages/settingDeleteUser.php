<?php
	require_once("../seguridad.php");
    require_once("../conexion.php");

	if (isset($_GET['iduser'])) {
		$getIdUser = $_GET ['iduser'];
		
		$query = "DELETE FROM usuarios WHERE idusuario = '$getIdUser'";
		$result = mysqli_query($conecta, $query);

        header("Location: ../pages/settings.php");
	}
?>