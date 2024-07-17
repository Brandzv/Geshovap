<?php
    require_once("../conexion.php");

    /* Validación de datos por método POST */
    if (isset($_POST['save-submit'])) {
        $employee = $_POST['employeesInput'];
        $monthlySalary = $_POST['salaryInput'];
        $entryDate = $_POST['dateInput'];
        $currentDate = date('Y-m-d');
        /* Formatea la fecha a yyyy/mm/dd */
        $formatEntryDate = strtotime($entryDate);
        $formatCurrentDate = strtotime($currentDate);
        /* Calcula el lapso transcurrido entre la fecha de ingreso y la fecha actual */
        $yearsElapsed = date('Y', $formatCurrentDate) - date('Y', $formatEntryDate);
        $monthsElapsed = date('m', $formatCurrentDate) - date('m', $formatEntryDate);
        $daysElapsed = date('d', $formatCurrentDate) - date('d', $formatEntryDate);

        /* Ajusta la diferencia si es necesario (por si la fecha actual es anterior al día de ingreso) */
        if ($monthsElapsed < 0 || ($monthsElapsed === 0 && $daysElapsed < 0)) {
            $yearsElapsed--;
        }

        /* Establece un mínimo de 12 días de vacaciones */
        $vacationDays = max(12, $vacationDays);

        /* Obtiene los días de vacaciones según los años transcurridos */
        if ($yearsElapsed >= 1 && $yearsElapsed <= 5) {
            $vacationDays += ($yearsElapsed - 1) * 2;
        } elseif ($yearsElapsed >= 6 && $yearsElapsed <= 10) {
            $vacationDays = 22;
        } elseif ($yearsElapsed >= 11 && $yearsElapsed <= 15) {
            $vacationDays = 24;
        } elseif ($yearsElapsed >= 16 && $yearsElapsed <= 20) {
            $vacationDays = 26;
        } elseif ($yearsElapsed >= 21 && $yearsElapsed <= 25) {
            $vacationDays = 28;
        }

        $availibleDays = $vacationDays;

        /* Calcula prima vacacional */
        $dailySalary = $monthlySalary / 30;
        $VacationBonus = ($dailySalary * $vacationDays) / 4;

        $query = "INSERT INTO vacaciones(empleado, diatotal, disponible, primavacacional, fechaingreso) VALUES ('$employee', '$vacationDays', '$availibleDays', '$VacationBonus', '$entryDate')";
        $resultado = mysqli_query($conecta, $query);

        header("Location: ../pages/vacations.php");
        exit;
    }
?>
