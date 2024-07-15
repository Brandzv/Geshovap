<?php
include_once("../conexion.php");
// Verifica si se ha enviado el formulario
if (isset($_POST['editVac-submit'])) {

    $idvacation = $_POST["editVacEmployees"];
    $editVacationDays = $_POST["editVacAgeSelect"];
    $editMonthlySalary = $_POST["editVacSalaryInput"];

    $editDailySalary = $editMonthlySalary / 30;
	$editVacationBonus = ($editDailySalary * $editVacationDays) / 4;
    
    $query = "UPDATE vacaciones SET diatotal = $editVacationDays, primavacacional = $editVacationBonus WHERE idvacacion = $idvacation";
    mysqli_query($conecta, $query);

    // Redirección a la página admin_home.php
    header("Location: ../pages/vacations.php");
}
?>