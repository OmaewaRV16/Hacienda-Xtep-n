<?php
// obtener_detalles.php

// Obtener el ID de la promoción
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Datos de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'haciendaxtepen';

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los detalles de la promoción
$sql = "SELECT * FROM promociones WHERE id_promocion = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Devolver los detalles en formato JSON
    echo json_encode($row);
} else {
    // Si no se encuentran detalles, devolver un error
    echo json_encode(['error' => 'Promoción no encontrada']);
}

$conn->close();
?>
