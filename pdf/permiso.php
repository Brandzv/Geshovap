<?php
require('../fpdf186/fpdf.php');
require_once('../conexion.php');
require_once('../seguridad.php');

class PDF extends FPDF
{
    // Encabezado
    function Header()
    {
        $this->Image('../img/logo.png', 10, 8, 18);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'SOLICITUD DE PERMISOS', 0, 1, 'C');
        $this->Ln(10);
    }

    // Footer de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, mb_convert_encoding('Café La Parroquia De Veracruz', "ISO-8859-1", "UTF-8"), 0, 0, 'C');
    }

    function Content($permiso)
    {
        $this->SetFont('Arial', 'B', 12);

        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'A: ' . 'Recursos humanos', 0, 1);
        $this->Cell(0, 10, mb_convert_encoding('Yo: ' . $permiso['empleadopermiso'], "ISO-8859-1", "UTF-8"), 0, 1);

        $this->Ln(10);

        // Función para traducir el nombre del mes
        function traducirMes($mes) {
            $meses = [
                'January' => 'enero',
                'February' => 'febrero',
                'March' => 'marzo',
                'April' => 'abril',
                'May' => 'mayo',
                'June' => 'junio',
                'July' => 'julio',
                'August' => 'agosto',
                'September' => 'septiembre',
                'October' => 'octubre',
                'November' => 'noviembre',
                'December' => 'diciembre'
            ];

            return $meses[$mes];
        }

        $inicioPermiso = new DateTime($permiso['iniciopermiso']);
        $finPermiso = new DateTime($permiso['finpermiso']);

        // Formatear fechas
        $diaInicio = $inicioPermiso->format('d');
        $mesInicio = traducirMes($inicioPermiso->format('F'));
        $inicioPermisoFormatted = "$diaInicio de $mesInicio";

        $diaFin = $finPermiso->format('d');
        $mesFin = traducirMes($finPermiso->format('F'));
        $finPermisoFormatted = "$diaFin de $mesFin";

        $añoPermisoFormatted = $inicioPermiso->format('Y');

        $this->MultiCell(0, 10, mb_convert_encoding('Pido se me conceda un permiso por (' . $permiso['tipopermiso'] . '); desde el ' . $inicioPermisoFormatted . ' hasta el ' . $finPermisoFormatted . ' del ' . $añoPermisoFormatted . ', por las siguientes razones: ' . "\n    - " . $permiso['descripcionpermiso'], "ISO-8859-1", "UTF-8"));
        $this->Ln(5);
        $this->MultiCell(0, 10, ' ');

        $this->Ln(10);

        $this->MultiCell(0, 10, 'Al concederme dicho permiso quedo en conocimiento de que si no regreso a mi trabajo en la fecha prometida quedo incurso en las condiciones de la Ley del Trabajo en lo que respecta a ausencias injustificadas.');

        $this->Ln(20);

        $this->Cell(0, 10, '_________________________', 0, 1, 'C');
        $this->Cell(0, 10, 'Firma del Trabajador', 0, 1, 'C');

        $this->Ln(10);

        $fechaActual = new DateTime();
        $diaActual = $fechaActual->format('d');
        $mesActual = traducirMes($fechaActual->format('F'));
        $añoActual = $fechaActual->format('Y');
        $fechaActualFormatted = "$diaActual de $mesActual del $añoActual";

        $this->Cell(0, 10, mb_convert_encoding('Fecha: ' . $fechaActualFormatted, "ISO-8859-1", "UTF-8"), 0, 1, 'L');

        $this->Ln(10);

        $this->Cell(0, 10, mb_convert_encoding('Recursos humanos: _____________________', "ISO-8859-1", "UTF-8"), 0, 1, 'L');

        $this->Ln(10);
        $this->Cell(0, 10, mb_convert_encoding('Cc: Administración de personal.', "ISO-8859-1", "UTF-8"), 0, 1, 'L');
    }
}

if (isset($_GET['idpermiso'])) {
    $id_permission = $_GET['idpermiso'];

    $pdf = new PDF();
    $pdf->AddPage();

    $query = "SELECT empleadopermiso, tipopermiso, descripcionpermiso, iniciopermiso, finpermiso FROM permisos WHERE idpermiso = $id_permission";
    $result = mysqli_query($conecta, $query);

    if ($result->num_rows > 0) {
        $permiso = $result->fetch_assoc();

        $pdf->Content($permiso);
    }

    $pdf->Output();
}
?>
