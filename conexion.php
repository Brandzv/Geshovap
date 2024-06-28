<?php

date_default_timezone_set('America/Mexico_City');

$servidor = "localhost"; // Nombre del servidor ("localhost" o la IP)
$usuario = "root"; // Usuario de la base de datos
$contraseña = ""; // Contraseña del usuario
$baseDatos = "geshovap_bd"; // Nombre de la base de datos

$conecta =  mysqli_connect($servidor, $usuario, $contraseña, $baseDatos);

if (!mysqli_set_charset($conecta,'utf8')){

die('No pudo conectarse: ' . mysqli_connect_error());

}
?>