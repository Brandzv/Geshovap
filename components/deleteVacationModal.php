<?php
    $query = "SELECT idvacacion, empleado FROM vacaciones";
    $resultado = $conecta->query($query);

    // Almacena los resultados en un array
    $vacaciones = [];
    while ($row = $resultado->fetch_assoc()) {
        $vacaciones[$row['idvacacion']] = $row['empleado'];
    }
?>
<div class="modal fade" id="deleteVacationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="../components/deleteVacation.php" method="get">
                <label class="form__label" for="employees">Empleado:</label>
                <select class="form__input" id="employees" name="id">
                    <option value="" disabled selected>Selecciona un empleado</option>
                    <?php foreach ($vacaciones as $idVacation => $nombre) : ?>
                        <option value="<?php echo $idVacation; ?>"><?php echo $nombre; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>