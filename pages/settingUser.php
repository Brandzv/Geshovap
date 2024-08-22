<?php
require_once("../conexion.php");
require_once("../seguridad.php");

if (isset($_SESSION['usuarioactual'])) {
    $currentUser = $_SESSION['usuarioactual'];

    $query = "SELECT idusuario, nombre, clave, estado FROM usuarios WHERE idusuario = '$currentUser'";
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
    $updateIdUser = $_POST['userId-input'];
    $updateName = $_POST['name-input'];

    $updatePassTest = $_POST['pass-input'];
    if ($updatePassTest == $pass) {
        $updatePass = $pass; // Mantener la contraseña actual si no se ha cambiado
    } else {
        $updatePass = hash('sha256', $_POST['pass-input']);
    }

    $updateStatus = $_POST['status-input'];

    // Actualizar usuario en la base de datos
    $queryUpdate = "UPDATE usuarios SET idusuario = '$updateIdUser', nombre = '$updateName', clave = '$updatePass', estado = '$updateStatus' WHERE idusuario = '$idUser'";
    mysqli_query($conecta, $queryUpdate);

    // Actualizar la sesión con las nuevas credenciales
    $_SESSION['usuarioactual'] = $updateIdUser;

    // Redirigir a la misma página para reflejar los cambios
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <script src="../assets/js/color-modes.js"></script>
        <!-- Custom styles for this template -->
        <link href="../css/dashboard.css" rel="stylesheet">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Editar tabla usuarios | La Parroquia de Veracruz</title>
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="door-closed" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
            </symbol>
            <symbol id="gear-wide-connected" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
            </symbol>
            <symbol id="house" viewBox="0 0 16 16" class="symbol-fill">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
            </symbol>
            <symbol id="list" viewBox="0 0 16 16" Class="symbol-fill">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </symbol>
            <symbol id="bell" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
            </symbol>
        </svg>
        <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="../pages/admin_home.php">La Parroquia de Veracruz</a>

            <ul class="navbar-nav flex-row d-md-none">
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <svg class="bi"><use xlink:href="#list"/></svg>
                    </button>
                </li>
            </ul>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="sidebarMenuLabel">La Parroquia de Veracruz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="./home.php">
                                <svg class="bi"><use xlink:href="#house"/></svg>
                                Home
                            </a>
                            </li>
                        </ul>
                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="./settingUser.php">
                                    <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                                    Configuración
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="../salir.php">
                                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                                    Salir
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <form class="form" method= "POST">
                        <h2 class="h2-form">Editar usuario</h2>

                        <div class="form__item">
                            <label class="form__label" for="nameId">Nombre:</label>
                            <input class="form__input" type= "text" id="nameId" name= "name-input" value= "<?php echo $name;?>" placeholder= "Actualiza nombre" autocomplete="off" readonly required>
                        </div>

                        <div class="form__item">
                            <label class="form__label" for="userId">Usuario:</label>
                            <input class="form__input" type= "text" id="userId" name="userId-input" value= "<?php echo $idUser;?>" placeholder= "Actualiza usuario" autocomplete="off" autofocus required>
                        </div>

                        <div class="form__item">
                            <label class="form__label" for="passId">Contraseña (Encriptada):</label>
                            <input class="form__input" type= "text" id="passId" name= "pass-input" value= "<?php echo $pass;?>" placeholder= "Actualiza clave" autocomplete="off" required>
                        </div>

                        <div class="form__item center-flex">
                            <button class="button-general" name="updateSettingUser">Guardar cambios</button>
                        </div>
                    </form>

                    <canvas class="my-4 w-100" id="myChart" width="900" height="16"></canvas>

                </main>
            </div>
        </div>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    </body>
</html>
