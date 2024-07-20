<?php
    require_once("../conexion.php");
    require_once("../seguridad.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $selectedId = $_GET['id'];

        // Si no se ha seleccionado un empleado
        if (empty($selectedId)) {
            header("Location: ../pages/admin_home.php");
        }
    }

    // Validación del ID con método GET
    if (isset($_GET['id'])) {
        $idemployee = $_GET['id'];
        $query = "SELECT id, empleado, lunes, martes, miercoles, jueves, viernes, sabado, domingo FROM horarios WHERE id = '$idemployee'";
        $resultado = mysqli_query($conecta, $query);
        if (mysqli_num_rows($resultado) == 1) {
            $mostrar = mysqli_fetch_array($resultado);
            $employee_get = $mostrar['empleado'];
            $lunes_get_server = $mostrar['lunes'];
            $martes_get_server = $mostrar['martes'];
            $miercoles_get_server = $mostrar['miercoles'];
            $jueves_get_server = $mostrar['jueves'];
            $viernes_get_server = $mostrar['viernes'];
            $sabado_get_server = $mostrar['sabado'];
            $domingo_get_server = $mostrar['domingo'];

            $lunes_clear = preg_replace('/\s*\([^)]*\)/', '', $lunes_get_server);
            $martes_clear = preg_replace('/\s*\([^)]*\)/', '', $martes_get_server);
            $miercoles_clear = preg_replace('/\s*\([^)]*\)/', '', $miercoles_get_server);
            $jueves_clear = preg_replace('/\s*\([^)]*\)/', '', $jueves_get_server);
            $viernes_clear = preg_replace('/\s*\([^)]*\)/', '', $viernes_get_server);
            $sabado_clear = preg_replace('/\s*\([^)]*\)/', '', $sabado_get_server);
            $domingo_clear = preg_replace('/\s*\([^)]*\)/', '', $domingo_get_server);

            $lunes_get = trim($lunes_clear);
            $martes_get = trim($martes_clear);
            $miercoles_get = trim($miercoles_clear);
            $jueves_get = trim($jueves_clear);
            $viernes_get = trim($viernes_clear);
            $sabado_get = trim($sabado_clear);
            $domingo_get = trim($domingo_clear);
        }
    }

    // Comprobación del formulario de actualización
    if (isset($_POST['update'])) {
        $encargado_lunes = $_POST['input-encargadoLunes'];
        $encargado_martes = $_POST['input-encargadoMartes'];
        $encargado_miercoles = $_POST['input-encargadoMiercoles'];
        $encargado_jueves = $_POST['input-encargadoJueves'];
        $encargado_viernes = $_POST['input-encargadoViernes'];
        $encargado_sabado = $_POST['input-encargadoSabado'];
        $encargado_domingo = $_POST['input-encargadoDomingo'];

        $hora_lunes = $_POST['lunes-input'];
        $hora_martes = $_POST['martes-input'];
        $hora_miercoles = $_POST['miercoles-input'];
        $hora_jueves = $_POST['jueves-input'];
        $hora_viernes = $_POST['viernes-input'];
        $hora_sabado = $_POST['sabado-input'];
        $hora_domingo = $_POST['domingo-input'];

        $employee = $_POST['employee-input'];
        $lunes = "$hora_lunes $encargado_lunes";
        $martes = "$hora_martes $encargado_martes";
        $miercoles = "$hora_miercoles $encargado_miercoles";
        $jueves = "$hora_jueves $encargado_jueves";
        $viernes = "$hora_viernes $encargado_viernes";
        $sabado = "$hora_sabado $encargado_sabado";
        $domingo = "$hora_domingo $encargado_domingo";

        $query = "UPDATE horarios SET empleado = '$employee', lunes = '$lunes', martes = '$martes', miercoles = '$miercoles', jueves = '$jueves', viernes = '$viernes', sabado = '$sabado', domingo = '$domingo' WHERE id = $idemployee";
        mysqli_query($conecta, $query);

        header("Location: ../pages/admin_home.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../components/header.php'); ?>
        <title>Editar horario empleado | La Parroquia de Veracruz</title>
    </head>
    <body>
        <div>
            <div>
                <form class="form" action= "editEmployee.php?id=<?php echo $_GET['id'];?>" method= "POST">
                    <h2 class="h2-form">Editar horario</h2>
                    
                    <div class="form__item">
                        <label class="form__label" for="employee">Empleado:</label>
                        <input class="form__input" type= "text" id="employee" name= "employee-input" value= "<?php echo $employee_get;?>" placeholder= "Actualiza empleado" autocomplete="off" autofocus required>
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="lunes" class="form__label">Lunes:</label>
                            <div>
                                <label for="encargadoLunes">Encargado: </label>
                                <input id="encargadoLunes" name="input-encargadoLunes" value="(Encargado)" type="checkbox">
                            </div>
                        </div>

                        <select class="form__input" id="lunes" name= "lunes-input">
                            <option value="8 AM - 16 PM"<?php if ($lunes_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($lunes_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($lunes_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                        
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="martes" class="form__label">Martes:</label>
                            <div>
                                <label id="encargadoMartes">Encargado: </label>
                                <input id="encargadoMartes" name="input-encargadoMartes" value="(Encargado)" type="checkbox">
                            </div>
                        </div>

                        <select class="form__input" id="martes" name= "martes-input">
                            <option value="8 AM - 16 PM"<?php if ($martes_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($martes_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($martes_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="miercoles" class="form__label">Miércoles:</label>
                            <div>
                                <label id="encargadoMiercoles">Encargado: </label>
                                <input id="encargadoMiercoles" name="input-encargadoMiercoles" value="(Encargado)" type="checkbox">
                            </div>
                        </div>

                        <select class="form__input" id="miercoles" name= "miercoles-input">
                            <option value="8 AM - 16 PM"<?php if ($miercoles_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($miercoles_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($miercoles_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="jueves" class="form__label">Jueves:</label>
                            <div>
                                <label for="encargadoJueves">Encargado: </label>
                                <input id="encargadoJueves" name="input-encargadoJueves" value="(Encargado)" type="checkbox">
                            </div>
                        </div>

                        <select class="form__input" id="jueves" name= "jueves-input">
                            <option value="8 AM - 16 PM"<?php if ($jueves_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($jueves_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($jueves_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="viernes" class="form__label">Viernes:</label>
                            <div>
                                <label for="encargadoViernes">Encargado: </label>
                                <input id="encargadoViernes" name="input-encargadoViernes" value="(Encargado)" type="checkbox">
                            </div> 
                        </div>

                        <select class="form__input" id="viernes" name="viernes-input">
                            <option value="8 AM - 16 PM"<?php if ($viernes_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($viernes_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($viernes_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="sabado" class="form__label">Sábado:</label>
                            <div>
                                <label for="encargadoSabado">Encargado: </label>
                                <input id="encargadoSabado" name="input-encargadoSabado" value="(Encargado)" type="checkbox">
                            </div>
                        </div>
                        
                        <select class="form__input" id="sabado" name="sabado-input">
                            <option value="8 AM - 16 PM"<?php if ($sabado_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($sabado_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($sabado_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                    </div>

                    <div class="form__item">
                        <div class="space-between">
                            <label for="domingo" class="form__label">Domingo:</label>
                            <div>
                                <label for="encargadoDomingo">Encargado: </label>
                                <input id="encargadoDomingo" name="input-encargadoDomingo" value="(Encargado)" type="checkbox">
                            </div>
                        </div>
                        
                        <select class="form__input" id="domingo" name="domingo-input">
                            <option value="8 AM - 16 PM"<?php if ($domingo_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                            <option value="16 PM - 00 AM"<?php if ($domingo_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                            <option value="Descanso"<?php if ($domingo_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                        </select>
                    </div>

                    <div class="form__item center-flex">
                        <button class="button-general" name="update">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>