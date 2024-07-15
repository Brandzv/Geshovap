<?php
    // Consulta para obtener nombres e IDs de empleados
    $query = "SELECT idvacacion, empleado, diatotal, primavacacional FROM vacaciones";
    $resultado = $conecta->query($query);

    // Almacena los resultados en un arreglo
    $empleados = [];
    while ($row = $resultado->fetch_assoc()) {
        $empleados[$row['idvacacion']] = $row['empleado'];
    }
?>
<div class="modal fade" id="editVacationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editEmployeeModalLabel2">Modificar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../components/editVacation.php" method="post">
                    <div class="form__item">
                        <label class="form__label" for="employeesEditVacation">Empleado:</label>
                        <select class="form__input" id="editVacEmployees" name="editVacEmployees">
                                <option value="" disabled selected>Selecciona un empleado</option>
                                <?php foreach ($empleados as $id => $nombre) : ?>
                                <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="employeesEditVacation">Años de servicio:</label>
                        <select class="form__input" name="editVacAgeSelect" id="editVacAños" required>
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
                        <label class="form__label" for="editVacSalaryInput">Salario mensual:</label>
                        <input class="form__input" type="number" id="editMonto" name="editVacSalaryInput" placeholder="$7,468" oninput="formatearMontoEdit()" onKeyPress="if(this.value.length==7) return false;" required>
                        <p class="money-style" id="editMontoFormateado"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="editVac-submit">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>