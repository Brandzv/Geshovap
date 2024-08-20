<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action="../actions/settingAddUser.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="addUserId">Usuario:</label>
                        <input class="form__input" id="addUserId" name="addUserIdInput" placeholder="AdminJohn" autocomplete="off" required autofocus>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="addNameId">Nombre:</label>
                        <input class="form__input" type="text" id="addNameId" name="addNameIdInput" placeholder="John Doh" autocomplete="off" required autofocus>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="addPassId">Contraseña:</label>
                        <input class="form__input" id="addPassId" name="addPassIdInput" placeholder="1234" autocomplete="off" required autofocus>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="addStatusId">Estado:</label>
                        <select class="form__input" id="addStatusId" name="addStatusIdInput">
                            <option value="1">Activo</option>
                            <option value="0">Desactivo</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="save-submit">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
