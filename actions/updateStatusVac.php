<?php
require_once("../seguridad.php");
require_once("../conexion.php");

$nameEmployee = isset($_POST['nameEmployee']) ? mysqli_real_escape_string($conecta, $_POST['nameEmployee']) : '';
$startRequest = isset($_POST['startRequest']) ? mysqli_real_escape_string($conecta, $_POST['startRequest']) : '';
$endRequest = isset($_POST['endRequest']) ? mysqli_real_escape_string($conecta, $_POST['endRequest']) : '';

$query = "DELETE FROM solicitar WHERE empleadosolicitud = ? AND iniciosolicitud = ? AND finsolicitud = ?";
$stmt = mysqli_prepare($conecta, $query);
mysqli_stmt_bind_param($stmt, "sss", $nameEmployee, $startRequest, $endRequest);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../pages/home.php");
} else {
    echo "Error: " . mysqli_error($conecta);
}
?>
