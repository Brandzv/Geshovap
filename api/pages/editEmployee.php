<?php
require_once("../conexion.php");
require_once("../seguridad.php");

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $selectedId = $_GET['id'];

    // Si no se ha seleccionado un empleado, redirige o muestra un mensaje de error
    if (empty($selectedId)) {
        echo "Por favor, selecciona un empleado antes de continuar.";
        // Puedes redirigir al usuario a otra página aquí si lo deseas
        header("Location: ../pages/admin_home.php");
    }
}

// Validación del ID por método GET
if (isset($_GET['id'])) {
    $idemployee = $_GET['id'];
    $query = "SELECT id, empleado, lunes, martes, miercoles, jueves, viernes, sabado, domingo FROM horarios WHERE id = '$idemployee'";
    $resultado = mysqli_query($conecta, $query);
    if (mysqli_num_rows($resultado) == 1) {
        $mostrar = mysqli_fetch_array($resultado);
        $employee_get = $mostrar['empleado'];
        $lunes_get = $mostrar['lunes'];
        $martes_get = $mostrar['martes'];
        $miercoles_get = $mostrar['miercoles'];
        $jueves_get = $mostrar['jueves'];
        $viernes_get = $mostrar['viernes'];
        $sabado_get = $mostrar['sabado'];
        $domingo_get = $mostrar['domingo'];
    }
}

// Comprobación del formulario de actualización
if (isset($_POST['update'])) {
    $employee = $_POST['employee-input'];
    $lunes = $_POST['lunes-input'];
    $martes = $_POST['martes-input'];
    $miercoles = $_POST['miercoles-input'];
    $jueves = $_POST['jueves-input'];
    $viernes = $_POST['viernes-input'];
    $sabado = $_POST['sabado-input'];
    $domingo = $_POST['domingo-input'];

    // Consulta para actualizar los datos del empleado
    $query = "UPDATE horarios SET empleado = '$employee', lunes = '$lunes', martes = '$martes', miercoles = '$miercoles', jueves = '$jueves', viernes = '$viernes', sabado = '$sabado', domingo = '$domingo' WHERE id = $idemployee";
    mysqli_query($conecta, $query);

    // Redirección a la página admin_home.php
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
                    <input class="form__input" type= "text" id="employee" name= "employee-input" value= "<?php echo $employee_get;?>" placeholder= "Actualiza empleado" autocomplete="off" required>
				</div>

				<div class="form__item">
					<label for="lunes" class="form__label">Lunes:</label>
					<select class="form__input" id="lunes" name= "lunes-input">
                        <option value="8 AM - 16 PM"<?php if ($lunes_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                        <option value="16 PM - 00 AM"<?php if ($lunes_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                        <option value="Descanso"<?php if ($lunes_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                    </select>
				</div>

				<div class="form__item">
                    <label for="martes" class="form__label">Martes:</label>
                    <select class="form__input" id="martes" name= "martes-input">
                        <option value="8 AM - 16 PM"<?php if ($martes_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                        <option value="16 PM - 00 AM"<?php if ($martes_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                        <option value="Descanso"<?php if ($martes_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                    </select>
                </div>

				<div class="form__item">
                    <label for="miercoles" class="form__label">Miércoles:</label>
                    <select class="form__input" id="miercoles" name= "miercoles-input">
                        <option value="8 AM - 16 PM"<?php if ($miercoles_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                        <option value="16 PM - 00 AM"<?php if ($miercoles_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                        <option value="Descanso"<?php if ($miercoles_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                    </select>
                </div>

				<div class="form__item">
                    <label for="jueves" class="form__label">Jueves:</label>
                    <select class="form__input" id="jueves" name= "jueves-input">
                        <option value="8 AM - 16 PM"<?php if ($jueves_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                        <option value="16 PM - 00 AM"<?php if ($jueves_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                        <option value="Descanso"<?php if ($jueves_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                    </select>
                </div>

                <div class="form__item">
                    <label for="viernes" class="form__label">Viernes:</label>
					<select class="form__input" id="viernes" name="viernes-input">
                        <option value="8 AM - 16 PM"<?php if ($viernes_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                        <option value="16 PM - 00 AM"<?php if ($viernes_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                        <option value="Descanso"<?php if ($viernes_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                    </select>
				</div>

                <div class="form__item">
                    <label for="sabado" class="form__label">Sábado:</label>
                    <select class="form__input" id="sabado" name="sabado-input">
                        <option value="8 AM - 16 PM"<?php if ($sabado_get === '8 AM - 16 PM') echo ' selected'; ?>>8 AM - 16 PM</option>
                        <option value="16 PM - 00 AM"<?php if ($sabado_get === '16 PM - 00 AM') echo ' selected'; ?>>16 PM - 00 AM</option>
                        <option value="Descanso"<?php if ($sabado_get === 'Descanso') echo ' selected'; ?>>Descanso</option>
                    </select>
                </div>

                <div class="form__item">
                    <label for="domingo" class="form__label">Domingo:</label>
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