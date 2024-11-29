<?php
// obtener_detalles.php

// Obtener el ID de la promoción
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

require 'login/conexion.php';

// Verificar si la conexión fue exitosa

// Consulta para obtener los detalles de la promoción
$sql = "SELECT * FROM promociones WHERE id_promocion = $id";
$result = $conectar->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Devolver los detalles en formato JSON
    echo json_encode($row);
} else {
    // Si no se encuentran detalles, devolver un error
    echo json_encode(['error' => 'Promoción no encontrada']);
}

$conectar->close();
?>
