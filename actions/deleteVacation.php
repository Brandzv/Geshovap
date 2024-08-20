<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $selectedEmployeeId = $_POST['id'];
        if (empty($selectedEmployeeId)) {
            header("Location: ../pages/vacations.php");
        }
    }
    /* Validación de ID por método GET */
    if (isset($_GET['id'])) {
        $idVacation = $_GET['id'];

        $querySelect = "SELECT empleado FROM vacaciones WHERE idvacacion = $idVacation";
        $resultadoSelect = mysqli_query($conecta, $querySelect);
        $rowEmployee = mysqli_fetch_assoc($resultadoSelect);
        $selectEmployee = $rowEmployee['empleado'];

        $queryDeleteUser = "DELETE FROM usuarios WHERE nombre = '$selectEmployee'";
        $resultadoDeleteUser = mysqli_query($conecta, $queryDeleteUser);

        $queryDeleteRequest = "DELETE FROM solicitar WHERE empleadosolicitud = '$selectEmployee'";
        $resultadoDeleteRequest = mysqli_query($conecta, $queryDeleteRequest);

        $queryDeletePermission = "DELETE FROM permisos WHERE empleadopermiso = '$selectEmployee'";
        $resultadoDeletePermission = mysqli_query($conecta, $queryDeletePermission);

        $queryDeletePending = "DELETE FROM pendientes WHERE empleadopendiente = '$selectEmployee'";
        $resultadoDeletePending = mysqli_query($conecta, $queryDeletePending);

        $queryDeleteSchedule = "DELETE FROM horarios WHERE empleado = '$selectEmployee'";
        $resultadoDeleteSchedule = mysqli_query($conecta, $queryDeleteSchedule);

        $query = "DELETE FROM vacaciones WHERE idvacacion = $idVacation";
        $resultado = mysqli_query($conecta, $query);

        header("Location: ../pages/vacations.php");
    }
?>
