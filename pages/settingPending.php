<?php
require_once("../conexion.php");
require_once("../seguridad.php");

if (isset($_GET['id'])) {
    $getIdEmployee = $_GET['id'];

    $query = "SELECT empleadopendiente, primavacacionalpendiente, añopendiente FROM pendientes WHERE idpendiente = '$getIdEmployee'";
    $result = mysqli_query($conecta, $query);

    if (mysqli_num_rows($result) == 1) {
        $mostrar = mysqli_fetch_array($result);

        $employeePend = $mostrar['empleadopendiente'];
        $vacationBonusPend = $mostrar['primavacacionalpendiente'];
        $yearPend = $mostrar['añopendiente'];
    }
}

if (isset($_POST['updateSettingPending'])) {
    $updateEmployee = $_POST['employee-input'];
    $updateVacationBonus = $_POST['vacationBonus-input'];
    $updateYearPend = $_POST['yearPend-input'];

    $query = "UPDATE pendientes SET empleadopendiente = '$updateEmployee', primavacacionalpendiente = '$updateVacationBonus', añopendiente = '$updateYearPend' WHERE idpendiente = '$getIdEmployee'";
    $result = mysqli_query($conecta, $query);

    header("Location: ../pages/settings.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <title>Editar tabla pendientes | La Parroquia de Veracruz</title>
    </head>
    <body>
        <form class="form" method= "POST">
            <h2 class="h2-form">Editar pendientes</h2>

            <div class="form__item">
                <label class="form__label" for="employeeId">Empleado:</label>
                <input class="form__input" type= "text" id="employeeId" name="employee-input" value= "<?php echo $employeePend;?>" placeholder= "Actualiza nombre de empleado" autocomplete="off" readonly required>
            </div>

            <div class="form__item">
                <label class="form__label" for="vacationBonusId">Prima vacacional:</label>
                <input class="form__input" type= "text" id="vacationBonusId" name= "vacationBonus-input" value= "<?php echo $vacationBonusPend;?>" placeholder= "Actualiza prima vacacional" autocomplete="off" autofocus required>
            </div>

            <div class="form__item">
                <label class="form__label" for="yearPendId">Año pendiente:</label>
                <input class="form__input" type= "text" id="yearPendId" name= "yearPend-input" value= "<?php echo $yearPend;?>" placeholder= "Actualiza año pendiente" autocomplete="off" required>
            </div>

            <div class="form__item center-flex">
                <button class="button-general" name="updateSettingPending">Guardar cambios</button>
            </div>
        </form>
    </body>
</html>
