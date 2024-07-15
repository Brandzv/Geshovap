<?php require_once("../seguridad.php");?>
<?php require_once("../conexion.php");?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <script src="../assets/js/color-modes.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
        <!-- Custom styles for this template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../css/dashboard.css" rel="stylesheet">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Admin - Vacaciones | La Parroquia de Veracruz</title>
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
            <symbol id="file-earmark" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M6.5 0a.5.5 0 0 0-.5.5V3H4.5A1.5 1.5 0 0 0 3 4.5v9a1.5 1.5 0 0 0 1.003 1.416A1 1 0 1 0 6 15h4a1 1 0 1 0 1.996-.084A1.5 1.5 0 0 0 13 13.5v-9A1.5 1.5 0 0 0 11.5 3H10V.5a.5.5 0 0 0-.5-.5zM9 3H7V1h2zM4 7V6h8v1z"/>
            </symbol>
            <symbol id="gear-wide-connected" viewBox="0 0 16 16" Class="symbol-fill">
                <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
            </symbol>
            <symbol id="house-fill" viewBox="0 0 16 16" class="symbol-fill">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
            </symbol>
            <symbol id="list" viewBox="0 0 16 16" Class="symbol-fill">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
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
                                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                                Home
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" href="./vacations.php">
                                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
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
                            <a class="nav-link d-flex align-items-center gap-2" href="./settings.php">
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
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Vacaciones</h1>
                    </div>

                    <div class="table-responsive pad-15">
                        <table class="table table--design">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#createVacationModal">
                                Agregar
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#editVacationModal">
                                Modificar
                            </button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteVacationModal">
                                Eliminar
                            </button>
                            <a href="../pages/requestVacation.php">
                                <button type="button">
                                    Solicitudes
                                </button>
                            </a>
                            

                            <?php include('../components/createVacationModal.php'); ?>
                            <?php include('../components/editVacationModal.php'); ?>
                            <?php include('../components/deleteVacationModal.php'); ?>

                            <thead>
                                <tr>
                                    <th class="width_cells">Empleado</th>
                                    <th class="width_cells">Días totales</th>
                                    <th class="width_cells">Disponibles</th>
                                    <th class="width_cells">Días usados</th>
                                    <th class="width_cells">Primas vacacionales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT empleado, diatotal, disponible, diausado, primavacacional FROM vacaciones";
                                    $resultado = mysqli_query($conecta, $sql);

                                    while ($mostrar=mysqli_fetch_array($resultado)) {
                                ?>
                                <tr>
                                    <td class="center_content"><?php echo $mostrar['empleado'] ?></td>
                                    <td class="center_content"><?php echo $mostrar['diatotal'] ?></td>
                                    <td class="center_content"><?php echo $mostrar['disponible'] ?></td>
                                    <td class="center_content"><?php echo $mostrar['diausado'] ?></td>
                                    <td class="center_content"><?php echo $mostrar['primavacacional'] ?></td>
                                </tr>
                                <?php
                                    }
                                    mysqli_close($conecta);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <canvas class="my-4 w-100" id="myChart" width="900" height="262"></canvas>

                </main>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
    </body>
</html>