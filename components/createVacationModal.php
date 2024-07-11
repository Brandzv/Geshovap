<!-- Modal -->
<div class="modal fade" id="createVacationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action= "../components/saveVacations.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="employees">Empleado:</label>
                        <input class="form__input" type="text" id="employeesCreateVacation" name="employeesInput" placeholder="Nombre del empleado" autocomplete="off" required autofocus >
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="años">Años de servicio:</label>
                        <select class="form__input" name="ageSelect" id="años" require>
                            <option value="12">1 Año</option>
                            <option value="14">2 Años</option>
                            <option value="16">3 Años</option>
                            <option value="18">4 Años</option>
                            <option value="20">5 Años</option>
                            <option value="22">6 a 10 Años</option>
                            <option value="24">11 a 15 Años</option>
                            <option value="26">16 a 20 Años</option>
                            <option value="28">21 a 25 Años</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="monto">Salario mensual:</label>
                        <input class="form__input" type="number" id="monto" name="salaryInput" minlength="0" maxlength="39" placeholder="Salario mensual" oninput="formatearMonto()" onKeyPress="if(this.value.length==7) return false;" required>
                        <p class="money-style" id="montoFormateado"></p>
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