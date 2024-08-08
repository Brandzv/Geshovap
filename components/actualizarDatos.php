<?php
require_once("../conexion.php");
require_once("../seguridad.php");

// Obtener dia y mes actual
$CurrentMonthDay = date('m-d');

// Obtener fechas de ingreso
$sql = "SELECT idvacacion, empleado, diatotal, primavacacional, salariomensual, DATE_FORMAT(fechaingreso, '%m-%d') AS fechaingreso, fechaingreso AS fechaingreso_d_m_y FROM vacaciones";
$result = mysqli_query($conecta, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['fechaingreso'] === $CurrentMonthDay) {
        $idvacacion = $row['idvacacion'];
        $nameEmployee = $row['empleado'];
        $totalDay = $row['diatotal'];
        $getVacationBonus = $row['primavacacional'];
        $getEntryDate = $row['fechaingreso_d_m_y'];
        $getMonthlySalary = $row['salariomensual'];

        // Fecha actual
        $updateCurrentDate = date('Y-m-d');

        // Formatea fecha a yyyy/mm/dd
        $updateFormatEntryDate = strtotime($getEntryDate);
        $updateFormatCurrentDate = strtotime($updateCurrentDate);

        // Calcula el lapso transcurrido entre la fecha de ingreso y la fecha actual
        $updateYearsElapsed = date('Y', $updateFormatCurrentDate) - date('Y', $updateFormatEntryDate);
        $updateMonthsElapsed = date('m', $updateFormatCurrentDate) - date('m', $updateFormatEntryDate);
        $updateDaysElapsed = date('d', $updateFormatCurrentDate) - date('d', $updateFormatEntryDate);

        // Ajusta la diferencia si es necesario (por si la fecha actual es anterior al día de ingreso)
        if ($updateMonthsElapsed < 0 || ($updateMonthsElapsed === 0 && $updateDaysElapsed < 0)) {
            $updateYearsElapsed--;
        }

        // Obtiene los días de vacaciones según los años transcurridos
        if ($updateYearsElapsed >= 1 && $updateYearsElapsed <= 5) {
            $updateVacationDays = 12 + ($updateYearsElapsed - 1) * 2;
        } elseif ($updateYearsElapsed >= 6 && $updateYearsElapsed <= 10) {
            $updateVacationDays = 22;
        } elseif ($updateYearsElapsed >= 11 && $updateYearsElapsed <= 15) {
            $updateVacationDays = 24;
        } elseif ($updateYearsElapsed >= 16 && $updateYearsElapsed <= 20) {
            $updateVacationDays = 26;
        } elseif ($updateYearsElapsed >= 21 && $updateYearsElapsed <= 25) {
            $updateVacationDays = 28;
        } else {
            $updateVacationDays = 30;
        }

        $updateAvailibleDays = $updateVacationDays;
        $updateUsedDays = 0;

        $getDailySalary = $getMonthlySalary / 30;

        // Obtiene la nueva prima vacacional
        $updateVacationBonus = ($getDailySalary * $updateVacationDays) / 4;

        // Redondea la prima vacacional
        $updateVacationBonus = round($updateVacationBonus);

        $queryVac = "UPDATE vacaciones SET diatotal = $updateVacationDays, disponible = $updateAvailibleDays, diausado = $updateUsedDays, primavacacional = $updateVacationBonus WHERE idvacacion = $idvacacion";
        mysqli_query($conecta, $queryVac);

        // Verificar si ya existe un registro en pendientes
        $queryCheck = "SELECT COUNT(*) FROM pendientes WHERE empleadopendiente = '$nameEmployee' AND añopendiente = $updateYearsElapsed";
        $resultCheck = mysqli_query($conecta, $queryCheck);
        $rowCheck = mysqli_fetch_row($resultCheck);
        $check = $rowCheck[0];

        if ($check == 0) {
            // Insertar datos pendientes solo si no existen
            $queryPend = "INSERT INTO pendientes (empleadopendiente, primavacacionalpendiente, añopendiente) VALUES ('$nameEmployee', $updateVacationBonus, $updateYearsElapsed)";
            mysqli_query($conecta, $queryPend);
        }
    }
}
?>
