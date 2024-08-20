<?php
    // Asegura que las variables existan antes de usarlas
    $getNameEmployee = isset($modalData['nombreempleado']) ? $modalData['nombreempleado'] : '';
    $getStartRequest = isset($modalData['iniciosolicitud']) ? $modalData['iniciosolicitud'] : '';
    $getEndRequest = isset($modalData['finsolicitud']) ? $modalData['finsolicitud'] : '';
    $status = isset($modalData['status']) ? $modalData['status'] : '';

    $startRequest = new DateTime($getStartRequest);
    $StartDay = $startRequest->format('d');
    $StartMonth = traducirMes($startRequest->format('F'));
    $StartYear = $startRequest->format('Y');
    $startRequestFormatted = "$StartDay de $StartMonth del $StartYear";

    $endRequest = new DateTime($getEndRequest);
    $endDay = $endRequest->format('d');
    $endMonth = traducirMes($endRequest->format('F'));
    $endYear = $endRequest->format('Y');
    $endRequestFormatted = "$endDay de $endMonth del $endYear";
?>

<div class="modal fade" id="ModalStaVac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../actions/updateStatusVac.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalReqVacLabel">Detalles de Solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body width-100">
                    <input type="hidden" name="nameEmployee" value="<?php echo htmlspecialchars($getNameEmployee); ?>">
                    <input type="hidden" name="startRequest" value="<?php echo htmlspecialchars($getStartRequest); ?>">
                    <input type="hidden" name="endRequest" value="<?php echo htmlspecialchars($getEndRequest); ?>">
                    
                    <p class="modal__text">
                        Vacaciones del <span class="modal__important"> <?php echo htmlspecialchars($startRequestFormatted); ?> </span>
                        al <span class="modal__important"> <?php echo htmlspecialchars($endRequestFormatted); ?> </span>
                        Estatus: <span class="modal__important"> <?php if ($status == 1) { echo "<span class='modal___green'>" . "Aceptado ✔" . "</span>"; } elseif ($status == 2) { echo "<span class='modal___red'>" . "Rechazado ❌" . "</span>"; } ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name="submitOk">Enterado</button>
                </div>
            </form>
        </div>
    </div>
</div>

