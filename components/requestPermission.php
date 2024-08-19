<div class="modal fade" id="ModalReqPer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar permiso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action="../actions/reqPermission.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="typePermission">Tipo de permiso:</label>
                        <input class="form__input" id="typePermission" name="typePermissionInput">
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="descriptionPermission">Descripción:</label>
                        <input class="form__input" id="descriptionPermission" name="descriptionPermissionInput">
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="startDatePermission">Fecha de inicio:</label>
                        <input type="date" class="form__input" id="startDatePermission" name="startDatePermissionInput">
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="endDatePermission">Fecha de fin:</label>
                        <input type="date" class="form__input" id="endDatePermission" name="endDatePermissionInput">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="submitPer">Enviar solicitud</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>