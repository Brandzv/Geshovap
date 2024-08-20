<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    if (isset($_GET['id'])) {
        $pendingPayment = $_GET['id'];
        $employeePayment = $_GET['empleado'];

        $query = "DELETE FROM pendientes WHERE idpendiente  = $pendingPayment";
        mysqli_query($conecta, $query);

        header("Location: ../pages/pendingPayments.php?empleado=$employeePayment");
    }
?>