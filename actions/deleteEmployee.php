<?php
	require_once("../seguridad.php");
    require_once("../conexion.php");

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $selectedEmployeeId = $_POST['id'];
        if (empty($selectedEmployeeId)) {
            header("Location: ../pages/admin_home.php");
        }
    }
	/*Validación de ID por método GET */
	if (isset($_GET['id'])) {
		$idEmployee = $_GET ['id'];
		
		$query = "DELETE FROM horarios WHERE id = $idEmployee";
		$resultado = mysqli_query($conecta, $query);
		
		header("Location: ../pages/admin_home.php");
	}
?>