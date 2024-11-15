<?php
require('fpdf186/fpdf.php'); // Asegúrate de que la ruta sea correcta

// Conexión a la base de datos
include "conexion.php";

// Consulta para obtener los datos de eventos
$query = "SELECT * FROM reservas_eventos";
$result = mysqli_query($conectar, $query);

// Crear PDF
class PDF extends FPDF
{
    // Encabezado de la página
    function Header()
    {
        // Agregar imagen al lado izquierdo del encabezado
        $this->Image('imagenes/xtepen-logo-750.gif', 10, 8, 50); // Ajusta la ruta, posición y tamaño según sea necesario

        // Establecer el color de texto para el título (rojo oscuro #770000)
        $this->SetTextColor(119, 0, 0); // Color de texto #770000 (rojo oscuro)

        // Definir la fuente (Arial, negrita, tamaño 14)
        $this->SetFont('Arial', 'B', 14);

        // Título centrado con el color #770000
        $this->SetY(8); // Ajustar la posición vertical después de la imagen
        $this->SetX(10); // Ajustar la posición horizontal para centrar el título
        $this->Cell(0, 15, utf8_decode('Reporte de Reservas'), 0, 1, 'C'); // Título centrado

        // Agregar la fecha en la esquina superior derecha
        $this->SetY(5); // Ajustar la posición vertical más cerca del borde superior
        $this->SetX(170); // Posicionamos un poco a la derecha del borde para alinearlo
        $this->SetFont('Arial', 'I', 10); // Fuente para la fecha
        $this->SetTextColor(0, 0, 0); // Color negro para la fecha
        $fecha = date('d/m/Y'); // Obtener la fecha actual
        $this->Cell(0, 10, 'Fecha de descarga: ' . $fecha, 0, 1, 'R'); // Alineación a la derecha
        
        // Salto de línea para separar el título de la tabla
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Fuente para el pie de página
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);

// Ajuste de márgenes para centrar la tabla en la página
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

// Colores de las celdas de encabezado
$pdf->SetFillColor(119, 0, 0); // Color de fondo #770000 (rojo oscuro)
$pdf->SetTextColor(255, 255, 255); // Color de texto blanco

// Encabezados de la tabla con el color de fondo aplicado
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(35, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Email', 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', true);
$pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Estado', 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode('Evento'), 1, 0, 'C', true);
$pdf->Ln();

// Cambiar color de texto para el contenido de las celdas
$pdf->SetTextColor(0, 0, 0); // Restablecer a color negro para el contenido

// Intercalar colores de fondo para las filas
$fill = false; // Variable para alternar el color de las filas

// Datos de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    // Alternar entre blanco y #FFF7F4
    if ($fill) {
        $pdf->SetFillColor(255, 247, 244); // Color de fondo #FFF7F4
    } else {
        $pdf->SetFillColor(255, 255, 255); // Color de fondo blanco
    }

    $pdf->Cell(10, 10, $row['id'], 1, 0, 'C', true);
    $pdf->Cell(35, 10, utf8_decode($row['nombre']), 1, 0, 'C', true);
    $pdf->Cell(40, 10, utf8_decode($row['email']), 1, 0, 'C', true);
    $pdf->Cell(30, 10, utf8_decode($row['telefono']), 1, 0, 'C', true);
    $pdf->Cell(25, 10, date('d/m/Y', strtotime($row['fecha'])), 1, 0, 'C', true);
    $pdf->Cell(20, 10, utf8_decode($row['estado']), 1, 0, 'C', true);
    $pdf->Cell(30, 10, utf8_decode($row['evento']), 1, 0, 'C', true);
    $pdf->Ln();

    // Cambiar el valor de $fill para la siguiente fila
    $fill = !$fill;
}

// Cerrar la conexión
mysqli_close($conectar);

// Salida del archivo PDF al navegador
$pdf->Output('D', 'reporte_reservas.pdf');
exit;
?>
