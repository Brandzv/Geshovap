<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    // Consulta para verificar si el usuario es un administrador
    $query = "SELECT idusuario FROM usuarios WHERE idusuario = 'admin'";

    $resultado = mysqli_query($conecta, $query);

    if ($resultado) {
        // Si es admin
        header("Location: ../pages/admin_home.php");
    } else {
        // Si no es admin
        header("Location: ../pages/home.php");
    }
?>
