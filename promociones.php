<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/style_promociones.css">
    <link rel="stylesheet" href="PaginaPrincipal/animate.css">
    <script src="PaginaPrincipal/wow.min.js"></script>
    <title>Reservas</title>
</head>
<body>
    <?php include "menu_principal.php"; ?>
    <hr>

    <div class="contenedor">
        <div class="contenedor_promociones">
        <?php
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

        // Establecer el conjunto de caracteres para la conexión
        $conn->set_charset("utf8mb4");

        $sql = "SELECT * FROM promociones"; // Consulta para obtener todas las promociones
        $result = $conn->query($sql); // Ejecutar la consulta

        if ($result->num_rows > 0) {
            // Mientras haya promociones, mostrarlas
            while($row = $result->fetch_assoc()) {
                // Asignar valores de la base de datos a variables
                $id = $row['id_promocion']; // Suponiendo que el campo id es el identificador de la promoción
                $nombre_promocion = $row['nombre_promocion']; // Nombre de la promoción
                $descripcion = $row['descripcion']; // Descripción de la promoción
                $imagen = $row['imagen']; // Ruta de la imagen de la promoción
                
                // Asignar valor de invitados según el id de la promoción
                switch ($id) {
                    case 1:
                        $invitados = 900;
                        break;
                    case 2:
                        $invitados = 700;
                        break;
                    case 3:
                        $invitados = 500;
                        break;
                    case 4:
                        $invitados = 300;
                        break;
                    case 5;
                        $invitados = 100;
                        break;
                    case 6;
                        $invitados = 50;
                        break;
                }

        ?>

            <div class="paquete">
                <h2><?php echo htmlspecialchars($nombre_promocion); ?></h2>
                <h3><?php echo htmlspecialchars($descripcion); ?></h3>
                <!-- Botón para abrir el modal -->
                <button class="ver-detalles" onclick="openModal(<?php echo $id; ?>, '<?php echo $nombre_promocion; ?>', '<?php echo htmlspecialchars($descripcion); ?>', <?php echo $invitados; ?>)">Ver Foto</button>
            </div>
        <?php
            }
        } else {
            echo "No se encontraron promociones disponibles.";
        }
        ?>

        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            
            <!-- Imagen de la promoción -->
            <img id="modal-image" src="" alt="Imagen promocional" style="display: none; width: 70%;">

            <!-- Campos ocultos para enviar los datos al formulario de reserva -->
            <input type="hidden" id="evento">
            <input type="hidden" id="menu_banquete">
            <input type="hidden" id="invitados">

            <!-- Botón de reservar con el id modal-reservar-btn -->
            <button id="modal-reservar-btn" onclick="reservar()">Reservar</button>
        </div>
    </div>

    <?php include "pie_pagina.php"; ?>

    <script src="PaginaPrincipal/modal.js"></script>

</body>
</html>
