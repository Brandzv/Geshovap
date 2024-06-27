<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action= "../components/saveEmployee.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="employees">Empleado:</label>
                        <input class="form__input" type="text" id="employees" name="employeesInput" placeholder="Nombre del empleado" autocomplete="off" required autofocus >
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="lunes">Lunes:</label>
                        <select class="form__input" name="mondaySelect" id="lunes">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="martes">Martes:</label>
                        <select class="form__input" name="tuesdaySelect" id="martes">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="miercoles">Miércoles:</label>
                        <select class="form__input" name="wednesdaySelect" id="miercoles">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="jueves">Jueves:</label>
                        <select class="form__input" name="thursdaySelect" id="jueves">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="viernes">Viernes:</label>
                        <select class="form__input" name="fridaySelect" id="viernes">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="sabado">Sábado:</label>
                        <select class="form__input" name="saturdaySelect" id="sabado">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="domingo">Domingo:</label>
                        <select class="form__input" name="sundaySelect" id="domingo">
                            <option value="8 AM - 16 PM">8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM">16 PM - 00 AM</option>
                            <option value="Descanso">Descanso</option>
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