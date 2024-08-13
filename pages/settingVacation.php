<?php
require_once("../conexion.php");
require_once("../seguridad.php");

if (isset($_GET['id'])) {
    $getIdEmployee = $_GET['id'];

    $query = "SELECT empleado, categoria, diatotal, disponible, diausado, primavacacional, salariomensual, fechaingreso FROM vacaciones WHERE idvacacion = '$getIdEmployee'";
    $result = mysqli_query($conecta, $query);

    if (mysqli_num_rows($result) == 1) {
        $mostrar = mysqli_fetch_array($result);

        $employee = $mostrar['empleado'];
        $category = $mostrar['categoria'];
        $totalDay = $mostrar['diatotal'];
        $availableDay = $mostrar['disponible'];
        $usedDay = $mostrar['diausado'];
        $vacationBonus = $mostrar['primavacacional'];
        $monthlySalary = $mostrar['salariomensual'];
        $dateEntry = $mostrar['fechaingreso'];
    }
}

if (isset($_POST['updateSettingVacation'])) {
    $updateEmployee = $_POST['employee-input'];
    $updateCategory = $_POST['category-input'];
    $updateTotalDay = $_POST['totalDay-input'];
    $updateAvailableDay = $_POST['availableDay-input'];
    $updateUsedDay = $_POST['usedDay-input'];
    $updateVacationBonus = $_POST['vacationBonus-input'];
    $updateMonthlySalary = $_POST['monthlySalary-input'];
    $updateDateEntry = $_POST['dateEntry-input'];

    $query = "UPDATE vacaciones SET empleado = '$updateEmployee', categoria = '$updateCategory', diatotal = '$updateTotalDay', disponible = '$updateAvailableDay', diausado = '$updateUsedDay', primavacacional = '$updateVacationBonus', salariomensual = '$updateMonthlySalary', fechaingreso = '$updateDateEntry' WHERE idvacacion = '$getIdEmployee'";
    $result = mysqli_query($conecta, $query);

    header("Location: ../pages/settings.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <title>Editar tabla usuarios | La Parroquia de Veracruz</title>
    </head>
    <body>
        <form class="form" method= "POST">
            <h2 class="h2-form">Editar vacaciones</h2>

            <div class="form__item">
                <label class="form__label" for="employeeId">Empleado:</label>
                <input class="form__input" type= "text" id="employeeId" name="employee-input" value= "<?php echo $employee;?>" placeholder= "Actualiza usuario" autocomplete="off" autofocus required>
            </div>

            <div class="form__item">
                <label class="form__label" for="categoryId">Categoría:</label>
                <input class="form__input" type= "text" id="categoryId" name= "category-input" value= "<?php echo $category;?>" placeholder= "Actualiza nombre" autocomplete="off" required>
            </div>

            <div class="form__item">
                <label class="form__label" for="totalDayId">Días totales:</label>
                <input class="form__input" type= "text" id="totalDayId" name= "totalDay-input" value= "<?php echo $totalDay;?>" placeholder= "Actualiza clave" autocomplete="off" required>
            </div>

            <div class="form__item">
                <label class="form__label" for="availableDayId">Días disponibles:</label>
                <input class="form__input" type= "text" id="availableDayId" name= "availableDay-input" value= "<?php echo $availableDay;?>" placeholder= "Actualiza clave" autocomplete="off" required>
            </div>

            <div class="form__item">
                <label class="form__label" for="usedDayId">Días usados:</label>
                <input class="form__input" type= "text" id="usedDayId" name="usedDay-input" value= "<?php echo $usedDay;?>" placeholder= "Actualiza usuario" autocomplete="off" autofocus required>
            </div>

            <div class="form__item">
                <label class="form__label" for="vacationBonusId">Prima vacacional:</label>
                <input class="form__input" type= "text" id="vacationBonusId" name= "vacationBonus-input" value= "<?php echo $vacationBonus;?>" placeholder= "Actualiza nombre" autocomplete="off" required>
            </div>

            <div class="form__item">
                <label class="form__label" for="monthlySalaryId">Salario mensual:</label>
                <input class="form__input" type= "text" id="monthlySalaryId" name= "monthlySalary-input" value= "<?php echo $monthlySalary;?>" placeholder= "Actualiza clave" autocomplete="off" required>
            </div>

            <div class="form__item">
                <label class="form__label" for="dateEntryId">Fecha de ingreso:</label>
                <input class="form__input" type= "text" id="dateEntryId" name= "dateEntry-input" value= "<?php echo $dateEntry;?>" placeholder= "Actualiza clave" autocomplete="off" required>
            </div>

            <div class="form__item center-flex">
                <button class="button-general" name="updateSettingVacation">Guardar cambios</button>
            </div>
        </form>
    </body>
</html>
