<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedEmployee = $_POST['employeeReqInput'];
        if (empty($selectedEmployee)) {
            header("Location: ../pages/requestVacation.php");
            exit;
        }
    }

    if (isset($_POST['saveReq-submit'])) {
        $employeeReq = $_POST["employeeReqInput"];
        $startDate = $_POST["startDayReqInput"];
        $endDate = $_POST["endDateReqInput"];

        $queryInsertRequest = "INSERT INTO solicitar (empleadosolicitud, iniciosolicitud, finsolicitud) VALUES ('$employeeReq', '$startDate', '$endDate')";
        $resultInsertRequest = mysqli_query($conecta, $queryInsertRequest);

        header("Location: ../pages/requestVacation.php");
    }
?>
