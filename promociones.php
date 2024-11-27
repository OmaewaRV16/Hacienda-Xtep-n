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

        // Consulta para obtener todas las promociones
        $sql = "SELECT id_promocion, nombre_promocion, descripcion, menu_banquete, tipo_evento, invitados, personal FROM promociones";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar todas las promociones disponibles
            while ($row = $result->fetch_assoc()) {
                $id = $row['id_promocion'];
                $nombre_promocion = $row['nombre_promocion'];
                $descripcion = $row['descripcion'];
                $menu_banquete_id = $row['menu_banquete'];
                $tipo_evento = $row['tipo_evento'];
                $invitados = $row['invitados'];
                $personal_id = $row['personal'];

                // Obtener el nombre del menú a partir de su ID
                $menu_nombre = "";
                $consulta_menu = "SELECT nombre_menu FROM banquete_menu WHERE id = $menu_banquete_id";
                $resultado_menu = $conn->query($consulta_menu);
                if ($resultado_menu && $resultado_menu->num_rows > 0) {
                    $menu = $resultado_menu->fetch_assoc();
                    $menu_nombre = $menu['nombre_menu'];
                }

                // Obtener el nombre del personal a partir de su ID
                $personal_nombre = "";
                $consulta_personal = "SELECT nombre_personal FROM personal WHERE id_personal = $personal_id";
                $resultado_personal = $conn->query($consulta_personal);
                if ($resultado_personal && $resultado_personal->num_rows > 0) {
                    $personal = $resultado_personal->fetch_assoc();
                    $personal_nombre = $personal['nombre_personal'];
                }
        ?>

            <div class="paquete">
                <h2><?php echo htmlspecialchars($nombre_promocion); ?></h2>
                <p><?php echo htmlspecialchars($descripcion); ?></p>

                <!-- Botón para abrir el modal -->
                <button class="ver-detalles" 
                        onclick="openModal('<?php echo htmlspecialchars($id); ?>',
                                          '<?php echo htmlspecialchars($nombre_promocion); ?>', 
                                          '<?php echo htmlspecialchars($menu_nombre); ?>', 
                                          '<?php echo htmlspecialchars($tipo_evento); ?>', 
                                          <?php echo htmlspecialchars($invitados); ?>, 
                                          '<?php echo htmlspecialchars($descripcion); ?>',
                                          '<?php echo htmlspecialchars($personal_nombre); ?>')">
                    Ver Detalles
                </button>
            </div>
        <?php
            }
        } else {
            echo "No se encontraron promociones disponibles.";
        }
        $conn->close();
        ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>

            <!-- Detalles de la promoción -->
            <h2 id="modal-nombre"></h2>
            <p id="modal-menu"></p>
            <p id="modal-tipo"></p>
            <p id="modal-invitados"></p>
            <p id="modal-descripcion"></p>
            <p id="modal-personal"></p>

            <!-- Botón de reservar -->
            <a id="modal-reservar-btn" class="button" href="#">Reservar</a>
        </div>
    </div>

    <?php include "pie_pagina.php"; ?>

    <script>
        // Función para abrir el modal
        function openModal(id, nombre, menu, tipo, invitados, descripcion, personal) {
            document.getElementById("modal-nombre").textContent = nombre;
            document.getElementById("modal-menu").textContent = "Menú: " + menu;
            document.getElementById("modal-tipo").textContent = "Evento: " + tipo;
            document.getElementById("modal-invitados").textContent = "Invitados: " + invitados;
            document.getElementById("modal-descripcion").textContent = "Descripción: " + descripcion;
            document.getElementById("modal-personal").textContent = "Personal Adicional: " + personal;

            // Configurar el enlace del botón de reserva
            const reservarBtn = document.getElementById("modal-reservar-btn");
            reservarBtn.href = `alta_reservas_eventos.php?id=${id}&nombre=${encodeURIComponent(nombre)}&menu=${encodeURIComponent(menu)}&tipo=${encodeURIComponent(tipo)}&invitados=${invitados}&descripcion=${encodeURIComponent(descripcion)}&personal=${encodeURIComponent(personal)}`;

            document.getElementById("myModal").style.display = "block";
        }

        // Función para cerrar el modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>

</body>
</html>
