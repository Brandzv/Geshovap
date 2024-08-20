<?php
    require_once("../conexion.php");

    $queryVac = "SELECT empleado FROM vacaciones";
    $resultVac = mysqli_query($conecta, $queryVac);
    
    // Array con los empleados que ya están en la tabla horarios
    $employeeSchedule = [];
    $queryHor = "SELECT DISTINCT empleado FROM horarios";
    $resultHor = mysqli_query($conecta, $queryHor);
    
    if ($resultHor->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultHor)) {
            $employeeSchedule[] = $row['empleado'];
        }
    }
?>
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body width-100">
                <form action= "../actions/saveEmployee.php" method="POST">
                    <div class="form__item">
                        <label class="form__label" for="employees">Empleado:</label>
                        <select class="form__input" name="employeesInput" id="lunes" required>
                            <option value="" disabled selected>Selecciona un empleado</option>
                            <?php
                                if ($resultVac->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($resultVac)) {
                                        $employee = $row['empleado'];
                                        // Verificar si el empleado está en la lista de horarios
                                        if (!in_array($employee, $employeeSchedule)) {
                                            echo '<option value="' . htmlspecialchars($employee) . '">' . htmlspecialchars($employee) . '</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
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