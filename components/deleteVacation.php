<?php
    require_once("../conexion.php");

    /* Validación de ID por método GET */
    if (isset($_GET['id'])) {
        $idVacation = $_GET['id'];

        $query = "DELETE FROM vacaciones WHERE idvacacion = $idVacation";
        $resultado = mysqli_query($conecta, $query);

        header("Location: ../pages/vacations.php");
    }
?>
