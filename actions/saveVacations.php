<?php
    require_once("../seguridad.php");
    require_once("../conexion.php");

    /* Validación de datos por método POST */
    if (isset($_POST['save-submit'])) {
        $employee = $_POST['employeesInput'];
        $entryDate = $_POST['dateInput'];
        $category = $_POST['categoryInput'];
        $monthlySalary = $_POST['salaryInput'];
        
        $currentDate = date('Y-m-d');
        /* Formatea la fecha a yyyy/mm/dd */
        $formatEntryDate = strtotime($entryDate);
        $formatCurrentDate = strtotime($currentDate);
        /* Calcula el lapso transcurrido entre la fecha de ingreso y la fecha actual */
        $yearsElapsed = date('Y', $formatCurrentDate) - date('Y', $formatEntryDate);
        $monthsElapsed = date('m', $formatCurrentDate) - date('m', $formatEntryDate);
        $daysElapsed = date('d', $formatCurrentDate) - date('d', $formatEntryDate);

        if ($monthsElapsed < 0 || ($monthsElapsed === 0 && $daysElapsed < 0)) {
            $yearsElapsed--;
        }

        /* Inicializa la variable $vacationDays */
        $vacationDays = 12; // Mínimo de 12 días de vacaciones

        /* Obtiene los días de vacaciones según los años transcurridos */
        if ($yearsElapsed >= 1 && $yearsElapsed <= 5) {
            $vacationDays += ($yearsElapsed - 1) * 2;
        } elseif ($yearsElapsed >= 6 && $yearsElapsed <= 10) {
            $vacationDays = 22;
        } elseif ($yearsElapsed >= 11 && $yearsElapsed <= 15) {
            $vacationDays = 24;
        } elseif ($yearsElapsed >= 16 && $yearsElapsed <= 20) {
            $vacationDays = 26;
        } elseif ($yearsElapsed >= 21 && $yearsElapsed <= 25) {
            $vacationDays = 28;
        }

        $availibleDays = $vacationDays;

        /* Calcula prima vacacional */
        $dailySalary = $monthlySalary / 30;
        $VacationBonus = ($dailySalary * $vacationDays) / 4;

        $query = "INSERT INTO vacaciones(empleado, categoria, diatotal, disponible, primavacacional, salariomensual, fechaingreso) VALUES ('$employee', '$category', '$vacationDays', '$availibleDays', '$VacationBonus', '$monthlySalary', '$entryDate')";
        $resultado = mysqli_query($conecta, $query);

        // Inserta los datos en la tabla "pendientes" para cada año transcurrido
        $roundedYears = $yearsElapsed;

        for ($i = 1; $i <= $roundedYears; $i++) {
            /* Calcula la prima vacacional para cada año */
            $annualVacationDays = 12; // Mínimo de 12 días de vacaciones
            if ($i >= 1 && $i <= 5) {
                $annualVacationDays += ($i - 1) * 2;
            } elseif ($i >= 6 && $i <= 10) {
                $annualVacationDays = 22;
            } elseif ($i >= 11 && $i <= 15) {
                $annualVacationDays = 24;
            } elseif ($i >= 16 && $i <= 20) {
                $annualVacationDays = 26;
            } elseif ($i >= 21 && $i <= 25) {
                $annualVacationDays = 28;
            }

            $annualVacationBonus = ($dailySalary * $annualVacationDays) / 4;
            $queryPendientes = "INSERT INTO pendientes(empleadopendiente, primavacacionalpendiente, añopendiente) VALUES ('$employee', '$annualVacationBonus', '$i')";
            $resultadoPendientes = mysqli_query($conecta, $queryPendientes);
        }

        // Inserta los datos en la tabla "usuarios"
        // Función para generar un nombre de usuario único
        function generateUserName($employee, $formatEntryDate) {
            $name = substr($employee, 0, 3); // Obtiene las primeras 3 letras del nombre del empleado
            $name = str_replace(' ', '', $name); // Elimina espacios en blanco
            $dateFormat = date('y', strtotime($formatEntryDate));
            $user = $name . $dateFormat . rand(10, 99); // Añade números aleatorios
            return strtolower($user); // Convierte a minúsculas
        }

        // Función para obtener las iniciales del nombre del empleado
        function getInitials($employee) {
            $nameEmployee = explode(' ', $employee); // Divide $employee en palabras con el espacio como delimitador
            $initials = ''; // Array vacío para almacenar las iniciales
            foreach ($nameEmployee as $name) {
                // Obtiene la primera letra de cada palabra
                $initials .= substr($name, 0, 1);
            }
            return strtoupper($initials); // Convierte a mayúsculas
        }

        // Función para generar una contraseña con iniciales y año actual
        function generatePass($employee) {
            $initialsPass = getInitials($employee);
            $currentYear = date('Y');
            return $initialsPass . $currentYear;
        }
        
        // Generar nombre de usuario y contraseña
        $userName = generateUserName($employee, $formatEntryDate);
        $pass = hash('sha256',generatePass($employee)); // Iniciales del empleado en mayúsculas y el año actual

        $queryUser = "INSERT INTO usuarios(idusuario, nombre, clave, estado) VALUES ('$userName', '$employee', '$pass' , '1')";
        $resultUser = mysqli_query($conecta, $queryUser);

        header("Location: ../pages/vacations.php");
    }
?>
