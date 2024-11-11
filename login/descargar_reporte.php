<?php
require('fpdf186/fpdf.php'); // Asegúrate de que la ruta sea correcta

// Conexión a la base de datos
include  "conexion.php";

// Consulta para obtener los datos de eventos
$query = "SELECT * FROM reservas_eventos";
$result = mysqli_query($conectar, $query);

// Crear PDF
class PDF extends FPDF
{
    // Encabezado de la página
    function Header()
    {
        // Fuente para el encabezado
        $this->SetFont('Arial', 'B', 14);
        // Título
        $this->Cell(0, 10, 'Reporte de Eventos', 0, 1, 'C');
        $this->Ln(10); // Salto de línea
    }

    // Pie de página
    function Footer()
    {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Fuente para el pie de página
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Encabezados de la tabla
$columns = ['ID', 'Nombre del Evento', 'Fecha', 'Ubicación', 'Estado'];
foreach ($columns as $col) {
    $pdf->Cell(40, 10, $col, 1, 0, 'C');
}
$pdf->Ln();

// Datos de la tabla
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(40, 10, $row['id'], 1);
    $pdf->Cell(40, 10, $row['nombre'], 1);
    $pdf->Cell(40, 10, $row['email'], 1);
    $pdf->Cell(40, 10, $row['telefono'], 1);
    $pdf->Cell(40, 10, $row['fecha'], 1);
    $pdf->Cell(40, 10, $row['estado'], 1);
    $pdf->Cell(40, 10, $row['evento'], 1);

    $pdf->Ln();
}

// Cerrar la conexión
mysqli_close($conectar);

// Salida del archivo PDF al navegador
$pdf->Output('I', 'reporte_eventos.pdf');
exit;
?>
