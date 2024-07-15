<?php
    include_once("../conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedEmployeeId = $_POST['editVacEmployees'];
        if (empty($selectedEmployeeId)) {
            header("Location: ../pages/vacations.php");
        }
    }
    // Verifica si se ha enviado el formulario
    if (isset($_POST['editVac-submit'])) {
        $idvacation = $_POST["editVacEmployees"];
        $editVacationDays = $_POST["editVacAgeSelect"];
        $editMonthlySalary = $_POST["editVacSalaryInput"];
        $editAvailibleDays = $editVacationDays;
        $editUsedDays = 0;

        $editDailySalary = $editMonthlySalary / 30;
        $editVacationBonus = ($editDailySalary * $editVacationDays) / 4;
        
        $query = "UPDATE vacaciones SET diatotal = $editVacationDays,disponible = $editAvailibleDays, diausado = $editUsedDays, primavacacional = $editVacationBonus WHERE idvacacion = $idvacation";
        mysqli_query($conecta, $query);

        // Redirección a la página admin_home.php
        header("Location: ../pages/vacations.php");
    }
?>