<?php
    require_once("../conexion.php");

    $query = "SELECT idvacacion, empleado, diatotal, primavacacional FROM vacaciones";
    $resultado = $conecta->query($query);

    // Almacena los resultados en un array
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
                        <label class="form__label" for="editVacEmployees">Empleado:</label>
                        <select class="form__input" id="editVacEmployees" name="editVacEmployees">
                                <option value="" disabled selected>Selecciona un empleado</option>
                                <?php foreach ($empleados as $id => $nombre) : ?>
                                <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="editCategoryVac">Categoría</label>
                        <select class="form__input" name="editCategoryVac" id="editCategoryVac" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="Administración">Administración</option>
                            <option value="Cocina">Cocina</option>
                            <option value="Servicio">Servicio</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <label class="form__label" for="editMonto">Salario mensual:</label>
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