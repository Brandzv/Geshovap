<?php
require('../fpdf186/fpdf.php');
require_once('../conexion.php');
require_once('../seguridad.php');

class PDF extends FPDF
{
    // Encabezado
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'SOLICITUD DE VACACIONES', 0, 1, 'C');
        $this->Ln(10);
    }

    // Footer de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, mb_convert_encoding('Café La Parroquia De Veracruz', "ISO-8859-1", "UTF-8"), 0, 0, 'C');
    }

    function Content($empleado, $solicitud)
    {
        $this->SetFont('Arial', 'B', 10);

        // Datos del empleado
        $this->Cell(0, 7, mb_convert_encoding('DATOS DEL EMPLEADO', "ISO-8859-1", "UTF-8"), 1, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->Cell(95, 7, mb_convert_encoding('EMPLEADO: ' . $empleado['empleado'], "ISO-8859-1", "UTF-8"), 1);
        $this->Cell(95, 7, mb_convert_encoding('CATEGORÍA: ' . $empleado['categoria'], "ISO-8859-1", "UTF-8"), 1, 1);
        $this->Cell(95, 7, mb_convert_encoding('FECHA DE INGRESO: ' . date('d-m-Y', strtotime($empleado['fechaingreso'])), "ISO-8859-1", "UTF-8"), 1);
        $this->Cell(95, 7, mb_convert_encoding('FECHA DE SOLICITUD: ' . date('d/m/Y'), "ISO-8859-1", "UTF-8"), 1, 1);
        $this->Ln(5);

        // Año correspondiente
        $corresponding_year = empty($solicitud['iniciosolicitud']) ? '' : date('Y', strtotime($solicitud['iniciosolicitud']));

        # Formatea a DateTime a partir de las fechas
        $fechaInicio = new DateTime($solicitud['iniciosolicitud']);
        $fechaFin = new DateTime($solicitud['finsolicitud']);
        # Calcula la diferencia en días
        $intervalo = $fechaInicio->diff($fechaFin);
        $day_count = $intervalo->days;
        // Días solicitados
        $requested_days = empty($day_count) ? '' : $day_count;

        // Verificar y formatear fechas
        $iniciosolicitud = empty($solicitud['iniciosolicitud']) ? '' : date('d/m/Y', strtotime($solicitud['iniciosolicitud']));
        $finsolicitud = empty($solicitud['finsolicitud']) ? '' : date('d/m/Y', strtotime($solicitud['finsolicitud']));

        // Datos de vacaciones
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 7, mb_convert_encoding('DATOS DE VACACIONES', "ISO-8859-1", "UTF-8"), 1, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->Cell(95, 7, mb_convert_encoding('AÑO CORRESPONDIENTE: ' . $corresponding_year, "ISO-8859-1", "UTF-8"), 1);
        $this->Cell(95, 7, mb_convert_encoding('DIAS QUE LE CORRESPONDEN: ' . $empleado['diatotal'], "ISO-8859-1", "UTF-8"), 1, 1);
        $this->Cell(95, 7, mb_convert_encoding('DIAS SOLICITADOS: ' . $requested_days, "ISO-8859-1", "UTF-8"), 1);
        $this->Cell(95, 7, mb_convert_encoding('DIAS DISPONIBLES: ' . $empleado['disponible'], "ISO-8859-1", "UTF-8"), 1, 1);
        $this->Cell(95, 7, mb_convert_encoding('DEL: ' . $iniciosolicitud, "ISO-8859-1", "UTF-8"), 1);
        $this->Cell(95, 7, mb_convert_encoding('AL: ' . $finsolicitud, "ISO-8859-1", "UTF-8"), 1, 1);
        $this->Cell(95, 7, mb_convert_encoding('REGRESA: ' , "ISO-8859-1", "UTF-8"), 1);
        $this->Cell(95, 7, mb_convert_encoding('OBSERVACIONES: ' , "ISO-8859-1", "UTF-8"), 1, 1);
        $this->Ln(10);

        $this->MultiCell(0, 5, mb_convert_encoding("Por medio del presente, hago constar que disfrutaré de mis vacaciones correspondientes a la fecha arriba indicada conforme al tiempo que tengo de prestar mis servicios.", "ISO-8859-1", "UTF-8"));
        $this->Ln(20);

        $this->Cell(0, 10, 'Firma del empleado: _________________________', 0, 1, 'L');
        $this->Ln(20);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 7, 'AUTORIZACIONES', 1, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(95, 10, 'JEFE: _____________________________', 1, 0, 'L');
        $this->Cell(95, 10, 'RECURSOS HUMANOS: __________________', 1, 1, 'L');
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 7, 'PARA USO EXCLUSIVO DE RECURSOS HUMANOS', 1, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(95, 7, 'SALARIO DIARIO: _________________________', 1);
        $this->Cell(95, 7, 'PRIMA VACACIONAL: _____________________', 1, 1);
        $this->Cell(0, 7, 'FECHA EN QUE SE PAGA LA PRIMA: ____________________', 1, 1);
    }
}

if (isset($_GET['idvacacion'])) {
    $id_employee = $_GET['idvacacion'];

    $pdf = new PDF();
    $pdf->AddPage();

    $queryEmployee = "SELECT empleado, categoria, diatotal, disponible, fechaingreso FROM vacaciones WHERE idvacacion = $id_employee";
    $resultEmployee = mysqli_query($conecta, $queryEmployee);

    if ($resultEmployee->num_rows > 0) {
        $empleado = $resultEmployee->fetch_assoc();

        $queryReq = "SELECT iniciosolicitud, finsolicitud FROM solicitar WHERE empleadosolicitud = '$empleado[empleado]'";
        $resultReq = mysqli_query($conecta, $queryReq);

        if ($resultReq->num_rows > 0) {
            $solicitud = $resultReq->fetch_assoc();
        } else {
            // Asignar valores predeterminados
            $solicitud = array(
                'iniciosolicitud' => '',
                'finsolicitud' => ''
            );
        }

        $pdf->Content($empleado, $solicitud);
    }

    $pdf->Output();
}
?>
