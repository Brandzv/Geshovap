<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    $idPermission = $_GET['idpermiso'];

    $query = "UPDATE permisos SET status = 2 WHERE idpermiso = $idPermission";
    $result = mysqli_query($conecta, $query);

    header("Location: ../pages/permissions.php");
?>