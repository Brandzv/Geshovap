<?php
    include("../seguridad.php");
    include("../conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedEmployeeId = $_POST['editVacEmployees'];
        if (empty($selectedEmployeeId)) {
            header("Location: ../pages/vacations.php");
            exit;
        }
    }

    if (isset($_POST['editVac-submit'])) {
        $idvacation = $_POST["editVacEmployees"];
        $query = "SELECT fechaingreso FROM vacaciones WHERE idvacacion = $idvacation";
        $result = mysqli_query($conecta, $query);
        $row = mysqli_fetch_assoc($result);

        $editEntryDate = $row['fechaingreso'];
        $editCurrentDate = date('Y-m-d');
        /* Formatea la fecha a yyyy/mm/dd */
        $editFormatEntryDate = strtotime($editEntryDate);
        $editFormatCurrentDate = strtotime($editCurrentDate);
        /* Calcula el lapso transcurrido entre la fecha de ingreso y la fecha actual */
        $editYearsElapsed = date('Y', $editFormatCurrentDate) - date('Y', $editFormatEntryDate);
        $editMonthsElapsed = date('m', $editFormatCurrentDate) - date('m', $editFormatEntryDate);
        $editDaysElapsed = date('d', $editFormatCurrentDate) - date('d', $editFormatEntryDate);

        /* Ajusta la diferencia si es necesario (por si la fecha actual es anterior al día de ingreso) */
        if ($editMonthsElapsed < 0 || ($editMonthsElapsed === 0 && $editDaysElapsed < 0)) {
            $editYearsElapsed--;
        }

        /* Establece un mínimo de 12 días de vacaciones */
        $editVacationDays = max(12, $editVacationDays);

        /* Obtiene los días de vacaciones según los años transcurridos */
        if ($editYearsElapsed >= 1 && $editYearsElapsed <= 5) {
            $editVacationDays += ($editYearsElapsed - 1) * 2;
        } elseif ($editYearsElapsed >= 6 && $editYearsElapsed <= 10) {
            $editVacationDays = 22;
        } elseif ($editYearsElapsed >= 11 && $editYearsElapsed <= 15) {
            $editVacationDays = 24;
        } elseif ($editYearsElapsed >= 16 && $editYearsElapsed <= 20) {
            $editVacationDays = 26;
        } elseif ($editYearsElapsed >= 21 && $editYearsElapsed <= 25) {
            $editVacationDays = 28;
        }

        $editAvailibleDays = $editVacationDays;
        $editUsedDays = 0;

        /* Calcula prima vacacional */
        $editMonthlySalary = $_POST["editVacSalaryInput"];
        $editDailySalary = $editMonthlySalary / 30;
        $editVacationBonus = ($editDailySalary * $editVacationDays) / 4;

        $query = "UPDATE vacaciones SET diatotal = $editVacationDays, disponible = $editAvailibleDays, diausado = $editUsedDays, primavacacional = $editVacationBonus WHERE idvacacion = $idvacation";
        mysqli_query($conecta, $query);

        header("Location: ../pages/vacations.php");
    }
?>
