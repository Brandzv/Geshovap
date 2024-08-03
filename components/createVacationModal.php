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
                        <label class="form__label" for="employeesCreateVacation">Empleado:</label>
                        <input class="form__input" type="text" id="employeesCreateVacation" name="employeesInput" placeholder="Nombre del empleado" autocomplete="off" required autofocus >
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="entryDate">Fecha de ingreso:</label>
                        <input class="form__input" type="date" id="entryDate" name="dateInput" placeholder="Nombre del empleado" autocomplete="off" required autofocus >
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="categoryCreateVac">Categoría</label>
                        <select class="form__input" name="categoryInput" id="categoryCreateVac" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="Administración">Administración</option>
                            <option value="Cocina">Cocina</option>
                            <option value="Servicio">Servicio</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="monto">Salario mensual:</label>
                        <input class="form__input" type="number" id="monto" name="salaryInput" placeholder="$7,468" oninput="formatearMonto()" onKeyPress="if(this.value.length==7) return false;" required>
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