<?php

require_once('conexion.php');

session_start();

if (isset($_SESSION["usuarioactual"])) {
    $user = mb_convert_encoding($_SESSION["usuarioactual"], "ISO-8859-1", "UTF-8");

    $ensesion = "UPDATE usuarios SET login=0 WHERE idusuario='$user'";
    $result = mysqli_query($conecta, $ensesion);
}

session_destroy();

echo "<script> window.location.href = 'index.php'; </script>";

?>
