<?php
    require_once("../conexion.php");

    $queryRequest = "SELECT empleado FROM vacaciones";
    $resultRequest = $conecta->query($queryRequest);

    // Almacena los resultados en un array
    $empleados = [];
?>
<!-- Modal -->
<div class="modal fade" id="createRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar solicitud</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action= "../actions/saveRequest.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="employeeReq">Empleado:</label>
                        <select class="form__input" id="employeeReq" name="employeeReqInput">
                                <option value="" disabled selected>Selecciona un empleado</option>
                                <?php while ($rowReq = $resultRequest->fetch_assoc()) { ?>
                                <option value="<?php echo $rowReq['empleado'];; ?>"><?php echo $rowReq['empleado'];; ?></option>
                                <?php } ?>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="startDayReq">Fecha de inicio:</label>
                        <input class="form__input" type="date" id="startDayReq" name="startDayReqInput" required >
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="endDateReq">Fecha de finalización:</label>
                        <input class="form__input" type="date" id="endDateReq" name="endDateReqInput" required  >
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="saveReq-submit">Confirmar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>