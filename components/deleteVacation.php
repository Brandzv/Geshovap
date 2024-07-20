<?php
    include("../seguridad.php");
    include("../conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $selectedEmployeeId = $_POST['id'];
        if (empty($selectedEmployeeId)) {
            header("Location: ../pages/vacations.php");
        }
    }
    /* Validación de ID por método GET */
    if (isset($_GET['id'])) {
        $idVacation = $_GET['id'];

        $query = "DELETE FROM vacaciones WHERE idvacacion = $idVacation";
        $resultado = mysqli_query($conecta, $query);

        header("Location: ../pages/vacations.php");
    }
?>
