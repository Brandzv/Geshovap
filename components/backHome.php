<?php
    include("../conexion.php");

    // Consulta para verificar si el usuario es un administrador
    $query = "SELECT idusuario FROM usuarios WHERE idusuario = 'admin'";

    $resultado = mysqli_query($conecta, $query);

    if ($resultado) {
        // Si existe el usuario con id "admin", redirige a "admin_home.php"
        header("Location: ../pages/admin_home.php");
        exit;
    } else {
        // Si no existe el usuario o su id no es "admin", redirige a "home.php"
        header("Location: ../pages/home.php");
        exit;
    }
?>
