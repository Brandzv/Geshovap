<?php
require_once("../conexion.php");
require_once("../seguridad.php");

// Obtener la fecha actual
$currentDate = date('Y-m-d');

// Preparar y ejecutar la consulta para eliminar registros
$query = "DELETE FROM permisos WHERE DATE_ADD(finpermiso, INTERVAL 1 WEEK) < ?";
$stmt = $conecta->prepare($query);
$stmt->bind_param("s", $currentDate);
$stmt->execute();
?>
