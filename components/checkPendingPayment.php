<?php
    include("../seguridad.php");
    include("../conexion.php");

    if (isset($_GET['id'])) {
        $pendingPayment = $_GET['id'];
        $query = "DELETE FROM pendientes WHERE idpendiente  = $pendingPayment";
        mysqli_query($conecta, $query);

        header("Location: ../pages/pendingPayments.php?id");
    }
?>