<?php
require_once("../seguridad.php");
require_once("../conexion.php");

$queryUser = "SELECT idusuario, nombre, clave, estado FROM usuarios";
$resultUser = mysqli_query($conecta, $queryUser);

$queryVac = "SELECT empleado, categoria, diatotal, disponible, diausado, primavacacional, salariomensual, fechaingreso FROM vacaciones";
$resultVac = mysqli_query($conecta, $queryVac);

$queryPend = "SELECT empleadopendiente, primavacacionalpendiente, añopendiente FROM pendientes";
$resultPend = mysqli_query($conecta, $queryPend);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <script src="../assets/js/color-modes.js"></script>
        <!-- Custom styles for this template -->
        <link href="../css/dashboard.css" rel="stylesheet">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Configuración | Café La Parroquia De Veracruz</title>
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="cart" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </symbol>
            <symbol id="door-closed" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
            </symbol>
            <symbol id="suitcase" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M6.5 0a.5.5 0 0 0-.5.5V3H4.5A1.5 1.5 0 0 0 3 4.5v9a1.5 1.5 0 0 0 1.003 1.416A1 1 0 1 0 6 15h4a1 1 0 1 0 1.996-.084A1.5 1.5 0 0 0 13 13.5v-9A1.5 1.5 0 0 0 11.5 3H10V.5a.5.5 0 0 0-.5-.5zM9 3H7V1h2zM4 7V6h8v1z"/>
            </symbol>
            <symbol id="gear-wide-connected" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
            </symbol>
            <symbol id="calendar" viewBox="0 0 16 16" class="symbol-fill">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
            </symbol>
            <symbol id="list" viewBox="0 0 16 16" Class="symbol-fill">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </symbol>
            <symbol id="people-circle" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </symbol>
            <symbol id="calendar-week" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
            </symbol>
            <symbol id="airplane" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599"/>
            </symbol>
            <symbol id="file-earmark-person" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5z"/>
            </symbol>
            <symbol id="three-dots-vertical" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            </symbol>
            <symbol id="pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </symbol>
            <symbol id="trash" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
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
                            <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="./admin_home.php">
                                <svg class="bi"><use xlink:href="#calendar"/></svg>
                                Horario
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="./vacations.php">
                                <svg class="bi"><use xlink:href="#suitcase"/></svg>
                                Vacaciones
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="./permissions.php">
                                <svg class="bi"><use xlink:href="#cart"/></svg>
                                Permisos
                            </a>
                            </li>
                        </ul>
                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" data-bs-toggle="collapse" href="#dropdownMenu" role="button" aria-expanded="false" aria-controls="dropdownMenu">
                                    <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                                    Configuración
                                </a>
                                <div class="collapse show" id="dropdownMenu">
                                    <ul class="nav flex-column ps-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#usuarios">
                                                <svg class="bi"><use xlink:href="#people-circle"/></svg>
                                                Usuarios
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#vacaciones">
                                                <svg class="bi"><use xlink:href="#airplane"/></svg>
                                                Vacaciones
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pendientes">
                                                <svg class="bi"><use xlink:href="#file-earmark-person"/></svg>
                                                Pendientes
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Configuración</h1>
                    </div>

                    <fieldset class="fieldset-scrollable margin-bottom50" id="usuarios">
                        <legend>Usuarios</legend>
                        <div class="table-responsive pad-15">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="center_content">Usuario</th>
                                        <th class="center_content">Nombre</th>
                                        <th class="center_content">Contraseña</th>
                                        <th class="center_content">Estado</th>
                                        <th class="center_content"><svg class="bi"><use xlink:href="#three-dots-vertical"/></svg></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($rowUser = mysqli_fetch_array($resultUser)) { ?>
                                    <tr>
                                        <td class="center_content"><?php echo $rowUser['idusuario'];?></td>
                                        <td class="center_content"><?php echo $rowUser['nombre'];?></td>
                                        <td class="center_content"><?php echo $rowUser['clave'];?>
                                        <td class="center_content"><?php if ($rowUser['estado'] == 1) { echo "Activo"; } else { echo "Desactivado"; } ?>
                                        <td class="center_content">
                                            <a class="decoration-none" href="../pages/settingEditUser.php?iduser=<?php echo $rowUser['idusuario'];?>">
                                                <svg class="bi"><use xlink:href="#pencil-square"/></svg>
                                            </a>
                                            <a class="decoration-none" href="../pages/settingDeleteUser.php?iduser=<?php echo $rowUser['idusuario'];?>">
                                                <svg class="bi"><use xlink:href="#trash"/></svg>
                                            </a>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset-scrollable margin-bottom50" id="vacaciones">
                            <legend>Vacaciones</legend>
                            <div class="table-responsive pad-15">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="center_content">Empleado</th>
                                            <th class="center_content">Categoría</th>
                                            <th class="center_content">Días totales</th>
                                            <th class="center_content">Días disponibles</th>
                                            <th class="center_content">Días usados</th>
                                            <th class="center_content">Prima vacacional</th>
                                            <th class="center_content">Salario mensual</th>
                                            <th class="center_content">Fecha de ingreso</th>
                                            <th class="center_content"><svg class="bi"><use xlink:href="#three-dots-vertical"/></svg></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($rowVac = mysqli_fetch_array($resultVac)) { ?>
                                        <tr>
                                            <td class="center_content"><?php echo $rowVac['empleado'];?></td>
                                            <td class="center_content"><?php echo $rowVac['categoria'];?></td>
                                            <td class="center_content"><?php echo $rowVac['diatotal'];?>
                                            <td class="center_content"><?php echo $rowVac['disponible'];?>
                                            <td class="center_content"><?php echo $rowVac['diausado'];?>
                                            <td class="center_content"><?php echo $rowVac['primavacacional'];?>
                                            <td class="center_content"><?php echo $rowVac['salariomensual'];?>
                                            <td class="center_content w-98"><?php echo $rowVac['fechaingreso'];?>
                                            <td class="center_content">
                                                <a href="../pages/settingVacation.php" class="decoration-none">
                                                    <svg class="bi"><use xlink:href="#pencil-square"/></svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset-scrollable margin-bottom50" id="pendientes">
                            <legend>Pendientes</legend>
                            <div class="table-responsive pad-15">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="center_content">Empleado</th>
                                            <th class="center_content">Prima vacacional pendiente</th>
                                            <th class="center_content">Año correspondiente</th>
                                            <th class="center_content"><svg class="bi"><use xlink:href="#three-dots-vertical"/></svg></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($rowPend = mysqli_fetch_array($resultPend)) { ?>
                                        <tr>
                                            <td class="center_content"><?php echo $rowPend['empleadopendiente'];?></td>
                                            <td class="center_content"><?php echo $rowPend['primavacacionalpendiente'];?></td>
                                            <td class="center_content"><?php echo $rowPend['añopendiente'];?>
                                            <td class="center_content">
                                                <a href="../pages/settingPending.php" class="decoration-none">
                                                    <svg class="bi"><use xlink:href="#pencil-square"/></svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>

                    <canvas class="my-4 w-100" id="myChart" width="900" height="341"></canvas>

                </main>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    </body>
</html>