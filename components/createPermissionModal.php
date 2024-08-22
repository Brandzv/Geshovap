<?php
    require_once("../conexion.php");

    $queryRequest = "SELECT empleado FROM vacaciones";
    $resultRequest = $conecta->query($queryRequest);

    // Almacena los resultados en un array
    $empleados = [];
?>
<!-- Modal -->
<div class="modal fade" id="createPermissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar permiso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action= "../actions/savePermission.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="employeePer">Empleado:</label>
                        <select class="form__input" id="employeePer" name="employeePerInput">
                                <option value="" disabled selected>Selecciona un empleado</option>
                                <?php while ($rowReq = $resultRequest->fetch_assoc()) { ?>
                                <option value="<?php echo $rowReq['empleado'];; ?>"><?php echo $rowReq['empleado'];; ?></option>
                                <?php } ?>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="typePermissionPer">Tipo de permiso:</label>
                        <input class="form__input" id="typePermissionPer" name="typePermissionPerInput" autocomplete="off">
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="descriptionPer">Descripción:</label>
                        <input class="form__input" id="descriptionPer" name="descriptionPerInput" autocomplete="off">
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="startDatePer">Fecha de inicio:</label>
                        <input type="date" class="form__input" id="startDatePer" name="startDatePerInput">
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="endDatePer">Fecha de finalización:</label>
                        <input type="date" class="form__input" id="endDatePer" name="endDatePerInput">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="savePer-submit">Confirmar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>