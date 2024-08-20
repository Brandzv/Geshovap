<div class="modal fade" id="ModalReqVac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar vacaciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action="../actions/reqVacations.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="startDate">Fecha de inicio:</label>
                        <input class="form__input" type="date" id="startDate" name="startDateInput">
                    </div>
                    <div class="form__item">
                        <label class="form__label" for="endDate">Fecha de finalización:</label>
                        <input class="form__input" type="date" id="endDate" name="endDateInput">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="submitVac">Enviar solicitud</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
