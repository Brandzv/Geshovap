<?php
require('../fpdf186/fpdf.php');
require_once('../conexion.php');
require_once('../seguridad.php');

class PDF extends FPDF
{
    // Encabezado de página
    function Header()
    {
        $this->Image('../img/logo.png', 10, 8, 18);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, mb_convert_encoding('Horario de Empleados', "ISO-8859-1", "UTF-8"), 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, mb_convert_encoding('Café La Parroquia De Veracruz', "ISO-8859-1", "UTF-8"), 0, 0, 'C');
    }

    // Función para ajustar el contenido de las celdas
    function TablaAjustada($header, $data)
    {
        $margin = 10; // Margen de la tabla
        $padding = 2; // Padding de las celdas
        $lineHeight = 5; // Altura de la línea
        $this->SetX($margin);
        $pageWidth = $this->GetPageWidth() - 2 * $margin; // Calcula el ancho de la página
        $colWidth = $pageWidth / count($header); // Calcula el ancho de las columnas

        // Encabezado de la tabla
        $this->SetFillColor(119, 66, 19);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col) {
            $this->Cell($colWidth, 10, mb_convert_encoding($col, "ISO-8859-1", "UTF-8"), 1, 0, 'C', true); // Crea encabezado de tabla
        }
        $this->Ln();

        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', '', 11);

        foreach ($data as $row) {
            // Calcula la altura de la fila
            $maxHeight = 0;
            $cellData = []; // Array para almacenar los datos de las celdas
            foreach ($row as $cell) {
                $numLines = $this->NbLines($colWidth - 2 * $padding, mb_convert_encoding($cell, "ISO-8859-1", "UTF-8")); // Calcula el número de líneas necesarias para el texto
                $cellHeight = $lineHeight * $numLines + 2 * $padding; // Calcula la altura de la celda
                $cellData[] = ['text' => mb_convert_encoding($cell, "ISO-8859-1", "UTF-8"), 'height' => $cellHeight, 'numLines' => $numLines]; // Almacena el texto y la altura de la celda
                if ($cellHeight > $maxHeight) {
                    $maxHeight = $cellHeight; // Actualiza la altura máxima de la fila si es necesario
                }
            }

            // Mostrar las celdas de la fila
            foreach ($cellData as $index => $cell) {
                $x = $this->GetX(); // Obtiene la posición X
                $y = $this->GetY(); // Obtiene la posición Y
                $this->Rect($x, $y, $colWidth, $maxHeight); // Borde de la celda
                $textY = $y + ($maxHeight - $cell['height']) / 2 + $padding; // Calcula la posición Y para centrar el texto verticalmente
                $this->SetXY($x + $padding, $textY); // Establece la posición XY para el texto dentro de la celda
                $this->MultiCell($colWidth - 2 * $padding, $lineHeight, $cell['text'], 0, 'C'); // Escribe el texto dentro de la celda
                $this->SetXY($x + $colWidth, $y); // Restaura la posición X para la siguiente celda
            }
            $this->Ln($maxHeight);
        }
    }

    // Función para contar el número de líneas necesarias
    function NbLines($w, $txt)
    {
        $cw = &$this->CurrentFont['cw']; // Obtiene el ancho de los caracteres de la fuente
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x; // Calcula el ancho disponible
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize; // Calcula el ancho máximo de la línea en unidades de la fuente
        $s = str_replace("\r", '', $txt); // Elimina los caracteres de retorno
        $nb = strlen($s); // Longitud del texto
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--; // Ajusta la longitud si el texto termina con una nueva línea
        $sep = -1; // Posición del último espacio
        $i = 0; // Índice de caracteres
        $j = 0; // Índice de inicio de línea
        $l = 0; // Longitud de la línea actual
        $nl = 1; // Número de líneas
        while ($i < $nb) {
            $c = $s[$i]; // Caracter actual
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i; // Actualiza la posición del espacio
            $l += $cw[$c]; // Añade el ancho del caracter a la longitud de la línea
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl; // Devuelve el número de líneas necesarias
    }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();

$sql = "SELECT empleado, lunes, martes, miercoles, jueves, viernes, sabado, domingo FROM horarios";
$resultado = mysqli_query($conecta, $sql); // Ejecuta la consulta

$data = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $data[] = $row; // Almacena cada fila de resultados en el arreglo $data
}

// Encabezados de las columnas
$header = ['Empleado', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

// Generar la tabla ajustada
$pdf->TablaAjustada($header, $data); // Llama a la función para generar la tabla

mysqli_close($conecta);

// Output del PDF
$pdf->Output();
?>
