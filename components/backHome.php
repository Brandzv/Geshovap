<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    if (isset($_SESSION['usuarioactual'])) {
        $currentUser = $_SESSION['usuarioactual'];
    } else {
        $currentUser = "No has iniciado sesión.";
    }

    // Comparar $currentUser con 'Admin' o 'admin'
    if ($currentUser == 'Admin' || $currentUser == 'admin') {
        // Si es admin
        header("Location: ../pages/admin_home.php");
    } else {
        // Si no es admin
        header("Location: ../pages/home.php");
    }
    exit();
?>
