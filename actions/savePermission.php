<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedEmployee = $_POST['employeePerInput'];
        if (empty($selectedEmployee)) {
            header("Location: ../pages/permissions.php");
            exit;
        }
    }

    if (isset($_POST['savePer-submit'])) {
        $employee = $_POST["employeePerInput"];
        $typePermission = $_POST["typePermissionPerInput"];
        $description = $_POST["descriptionPerInput"];
        $startDate = $_POST["startDatePerInput"];
        $endDate = $_POST["endDatePerInput"];

        $queryInsertPermission = "INSERT INTO permisos (empleadopermiso, tipopermiso, descripcionpermiso, iniciopermiso, finpermiso) VALUES ('$employee', '$typePermission', '$description', '$startDate', '$endDate')";
        $resultInsertPermission = mysqli_query($conecta, $queryInsertPermission);

        header("Location: ../pages/permissions.php");
    }
?>
