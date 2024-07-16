<?php
	require_once("../conexion.php");

	/*Validación de datos por método POST*/
	if (isset($_POST['save-submit'])) {
		$entryDate = $_POST['dateInput'];
		$employee = $_POST['employeesInput'];
		$VacationDays = $_POST['ageSelect'];
		$monthlySalary = $_POST['salaryInput'];
		$availibleDays = $VacationDays;

		# Calcula prima vacacional
		$dailySalary = $monthlySalary / 30;
		$VacationBonus = ($dailySalary * $VacationDays) / 4;

		$query = "INSERT INTO vacaciones(empleado, diatotal, disponible, primavacacional, fechaingreso) VALUES ('$employee', '$VacationDays', '$availibleDays', '$VacationBonus', '$entryDate')";
		$resultado = mysqli_query($conecta, $query);
		
		header ("Location: ../pages/vacations.php");
	}
?>