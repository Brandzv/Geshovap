<?php
require_once("../conexion.php");
require_once("../seguridad.php");

if (isset($_GET['iduser'])) {
    $getIdUser = $_GET['iduser'];

    $query = "SELECT idusuario, nombre, clave, estado FROM usuarios WHERE idusuario = '$getIdUser'";
    $result = mysqli_query($conecta, $query);
    if (mysqli_num_rows($result) == 1) {
        $mostrar = mysqli_fetch_array($result);

        $idUser = $mostrar['idusuario'];
        $name = $mostrar['nombre'];
        $pass = $mostrar['clave'];
        $status = $mostrar['estado'];
    }
}

if (isset($_POST['updateSettingUser'])) {
    $updateIdUser = $_POST['iduser-input'];
    $updateName = $_POST['name-input'];
    $updatePass = $_POST['pass-input'];
    $updateStatus = $_POST['status-input'];

    $queryUpdate = "UPDATE usuarios SET nombre = '$updateName', clave = '$updatePass', estado = '$updateStatus' WHERE idusuario = '$idUser'";
    mysqli_query($conecta, $queryUpdate);

    header("Location: ../pages/settings.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <title>Editar tabla usuarios | La Parroquia de Veracruz</title>
    </head>
    <body>
                <form class="form" method= "POST">
                    <h2 class="h2-form">Editar usuario</h2>
                    
                    <div class="form__item">
                        <label class="form__label" for="user">Usuario:</label>
                        <input class="form__input" type= "text" id="user" name="user-input" value= "<?php echo $idUser;?>" placeholder= "Actualiza usuario" autocomplete="off" autofocus required>
                    </div>

                    <div class="form__item">
                        <label for="name" class="form__label">Nombre:</label>
                        <input class="form__input" type= "text" id="name" name= "name-input" value= "<?php echo $name;?>" placeholder= "Actualiza nombre" autocomplete="off" required>
                    </div>

                    <div class="form__item">
                        <label for="pass" class="form__label">Clave:</label>
                        <input class="form__input" type= "text" id="pass" name= "pass-input" value= "<?php echo $pass;?>" placeholder= "Actualiza clave" autocomplete="off" required>
                    </div>

                    <div class="form__item">
                        <label for="status" class="form__label">Estado:</label>
                        <select class="form__input" id="status" name="status-input">
                            <option value="1">Activo</option>
                            <option value="0">Desactivo</option>
                        </select>
                    </div>

                    <div class="form__item center-flex">
                        <button class="button-general" name="updateSettingUser">Guardar cambios</button>
                    </div>
                </form>
    </body>
</html>
