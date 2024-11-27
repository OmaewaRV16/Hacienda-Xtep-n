<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/stylereservas.css">
    <title>Reservas</title>
</head>
<body>
    <?php include "menu_principal.php"; ?>
    <hr>
    <div class="contenedor">
        <div class="contenedor_frm">
            <h2>Reservar Evento</h2>
            <br>

            <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "haciendaxtepen");

            // Verificar si hubo error en la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Inicializar variables para los datos de la promoción
            $id_promocion = isset($_GET['id']) ? intval($_GET['id']) : null;
            $tipo_evento = $invitados = $menu_id = $personal_id = "";

            // Si hay un ID de promoción, obtener los datos de la promoción
            if ($id_promocion) {
                // Obtener los datos de la promoción
                $consulta_promocion = "SELECT tipo_evento, invitados, menu_banquete, personal FROM promociones WHERE id_promocion = $id_promocion";
                $resultado_promocion = $conexion->query($consulta_promocion);

                if ($resultado_promocion && $resultado_promocion->num_rows > 0) {
                    $promocion = $resultado_promocion->fetch_assoc();
                    $tipo_evento = $promocion['tipo_evento'];
                    $invitados = $promocion['invitados'];
                    $menu_id = $promocion['menu_banquete']; // Usamos directamente el ID del menú
                    $personal_id = $promocion['personal']; // Usamos directamente el ID del personal
                }
            }
            ?>

            <form action="agregar_reserva_evento.php?token=123456" method="post" id="formReserva">
                <input type="hidden" name="auth_code" value="codigo_secreto">
                
                <!-- Campos del cliente -->
                <div>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre completo" required>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu correo electrónico" required>
                </div>

                <!-- Tipo de evento -->
                <div>
                    <input type="tel" name="telefono" id="telefono" placeholder="Ingresa un número celular" maxlength="10" required pattern="[0-9]{10}" inputmode="numeric" title="Ingresa un número de 10 dígitos">
                    
                    <select id="evento" name="evento" <?= $id_promocion ? "disabled" : "required"; ?>>
                        <option value="" disabled <?= empty($tipo_evento) ? "selected" : "" ?>>Selecciona un tipo de evento</option>
                        <option value="boda" <?= $tipo_evento == 'boda' ? "selected" : "" ?>>Boda</option>
                        <option value="quinceanera" <?= $tipo_evento == 'quinceanera' ? "selected" : "" ?>>Quinceañera</option>
                        <option value="corporativo" <?= $tipo_evento == 'corporativo' ? "selected" : "" ?>>Evento Corporativo</option>
                        <option value="comunion" <?= $tipo_evento == 'comunion' ? "selected" : "" ?>>Primera Comunión o Bautizo</option>
                        <option value="cumpleanos" <?= $tipo_evento == 'cumpleanos' ? "selected" : "" ?>>Cumpleaños</option>
                        <option value="pedida" <?= $tipo_evento == 'pedida' ? "selected" : "" ?>>Pedida de Mano</option>
                    </select>
                </div>

                <!-- Fecha y número de invitados -->
                <div>
                    <span>Seleccione fecha de reserva: </span><input class="dte" type="date" name="fecha" id="fecha" required>
                    
                    <div class="tooltip">
                        <input class="inv" type="number" name="invitados" id="invitados" <?= $id_promocion ? "readonly" : ""; ?> min="1" max="1000" maxlength="4" placeholder="Cantidad de invitados" value="<?= htmlspecialchars($invitados) ?>">
                        <span class="tooltiptext">Máximo 1000 invitados</span>
                    </div>
                </div>
                
                <!-- Menú de banquete -->
                <div>
                    <select name="menu_banquete" id="menu_banquete" <?= $id_promocion ? "disabled" : "required"; ?>>
                        <option value="" disabled <?= empty($menu_id) ? "selected" : "" ?>>Seleccione su Menú</option>
                        <?php
                        $consulta_menus = "SELECT id, nombre_menu FROM banquete_menu";
                        $resultado_menus = $conexion->query($consulta_menus);

                        if ($resultado_menus->num_rows > 0) {
                            while ($menu = $resultado_menus->fetch_assoc()) {
                                $selected = ($menu['id'] == $menu_id) ? "selected" : "";
                                echo '<option value="' . htmlspecialchars($menu['id']) . '" ' . $selected . '>' . htmlspecialchars($menu['nombre_menu']) . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No hay menús disponibles</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- Personal adicional -->
                <div>
                    <select name="personal" id="personal" <?= $id_promocion ? "disabled" : "required"; ?>>
                        <option value="" disabled <?= empty($personal_id) ? "selected" : "" ?>>Seleccione su Personal Adicional</option>
                        <?php
                        $consulta_personal = "SELECT id_personal, nombre_personal FROM personal";
                        $resultado_personal = $conexion->query($consulta_personal);

                        if ($resultado_personal->num_rows > 0) {
                            while ($p = $resultado_personal->fetch_assoc()) {
                                $selected = ($p['id_personal'] == $personal_id) ? "selected" : "";
                                echo '<option value="' . htmlspecialchars($p['id_personal']) . '" ' . $selected . '>' . htmlspecialchars($p['nombre_personal']) . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No hay personal disponible</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- Detalles adicionales -->
                <div>
                    <textarea class="inputext" id="mensaje" name="mensaje" rows="4" cols="50" placeholder="Describe los detalles adicionales del evento" required></textarea>
                </div>

                <input type="submit" value="Reservar">
            </form>
        </div>
    </div>

    <script>
        function validarCantidadInvitados(input) {
            const valor = parseInt(input.value);
            if (valor > 1000) {
                input.value = 1000; // Limita el valor a 1000
            }
        }

        // Configuración de la fecha mínima
        const fechaEventoInput = document.getElementById('fecha');
        const fechaActual = new Date().toISOString().split('T')[0];
        fechaEventoInput.min = fechaActual;
    </script>

    <?php include "pie_pagina.php"; ?>
</body>
</html>
