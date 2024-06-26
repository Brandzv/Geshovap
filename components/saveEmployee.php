<?php
	require_once("../conexion.php");
	
	/*Validación de datos por método POST*/
	if (isset($_POST['save-submit'])) {
		$employee = $_POST['employeesInput'];
		$monday = $_POST['mondaySelect'];
		$tuesday = $_POST['tuesdaySelect'];
		$wednesday = $_POST['wednesdaySelect'];
		$thursday = $_POST['thursdaySelect'];
		$friday = $_POST['fridaySelect'];
		$saturday = $_POST['saturdaySelect'];
		$sunday = $_POST['sundaySelect'];

		$query = "INSERT INTO horarios(empleado, lunes, martes, miercoles, jueves, viernes, sabado, domingo) VALUES ('$employee', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday')";
		$resultado = mysqli_query($conecta, $query);
		
		header ("Location:../pages/admin_home.php");
	}
?>