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
            require 'login/conexion.php';

            // Inicializar variables
            $tipo_evento = "";
            $invitados = "";
            $menu_banquete = "";
            $personal = "";

            // Si hay un ID de promoción en la URL, cargar sus datos
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id_promocion = intval($_GET['id']);
                $consulta_promocion = "SELECT tipo_evento, invitados, menu_banquete, personal FROM promociones WHERE id_promocion = $id_promocion";
                $resultado_promocion = $conectar->query($consulta_promocion);

                if ($resultado_promocion && $resultado_promocion->num_rows > 0) {
                    $promocion = $resultado_promocion->fetch_assoc();
                    $tipo_evento = $promocion['tipo_evento'];
                    $invitados = $promocion['invitados'];
                    $menu_banquete = $promocion['menu_banquete'];
                    $personal = $promocion['personal'];
                }
            }
            ?>

            <form action="agregar_reserva_evento.php?token=123456" method="post" id="formReserva">
                <input type="hidden" name="auth_code" value="codigo_secreto">
                
                <div>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre completo" required>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu correo electronico" required>
                </div>

                <div>
                    <input type="tel" name="telefono" id="telefono" placeholder="Ingresa un número celular" maxlength="10" required pattern="[0-9]{10}" inputmode="numeric" title="Ingresa un número de 10 dígitos">
                    
                    <select id="evento" name="evento" <?= $tipo_evento ? "disabled" : "required"; ?>>
                        <option value="" disabled <?= empty($tipo_evento) ? "selected" : ""; ?>>Selecciona un tipo de evento</option>
                        <option value="boda" <?= $tipo_evento === "boda" ? "selected" : ""; ?>>Boda</option>
                        <option value="quinceanera" <?= $tipo_evento === "quinceanera" ? "selected" : ""; ?>>Quinceañera</option>
                        <option value="corporativo" <?= $tipo_evento === "corporativo" ? "selected" : ""; ?>>Evento Corporativo</option>
                        <option value="comunion" <?= $tipo_evento === "comunion" ? "selected" : ""; ?>>Primera Comunión o Bautizo</option>
                        <option value="cumpleanos" <?= $tipo_evento === "cumpleanos" ? "selected" : ""; ?>>Cumpleaños</option>
                        <option value="pedida" <?= $tipo_evento === "pedida" ? "selected" : ""; ?>>Pedida de Mano</option>
                    </select>
                    <?php if ($tipo_evento): ?>
                        <input type="hidden" name="evento" value="<?= htmlspecialchars($tipo_evento); ?>">
                    <?php endif; ?>
                </div>

                <div>
                    <span>Seleccione fecha de reserva: </span><input class="dte" type="date" name="fecha" id="fecha" required>
                    <div class="tooltip">
                        <input class="inv" type="number" id="invitados_visible" value="<?= htmlspecialchars($invitados); ?>" <?= $invitados ? "disabled" : ""; ?> placeholder="Cantidad de invitados">
                        <input type="hidden" name="invitados" id="invitados" value="<?= htmlspecialchars($invitados); ?>">
                        <span class="tooltiptext">Máximo 1000 invitados</span>
                    </div>
                </div>
                <div>
                    <select name="menu_banquete" id="menu_banquete" <?= $menu_banquete ? "disabled" : "required"; ?>>
                        <option value="" disabled <?= empty($menu_banquete) ? "selected" : ""; ?>>Seleccione su Menú</option>
                        <?php
                        $consulta_menus = "SELECT id, nombre_menu FROM banquete_menu";
                        $resultado_menus = $conectar->query($consulta_menus);

                        if ($resultado_menus->num_rows > 0) {
                            while ($menu = $resultado_menus->fetch_assoc()) {
                                $selected = ($menu['id'] == $menu_banquete) ? "selected" : "";
                                echo '<option value="' . $menu['id'] . '" ' . $selected . '>' . $menu['nombre_menu'] . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No hay menús disponibles</option>';
                        }
                        ?>
                    </select>
                    <?php if ($menu_banquete): ?>
                        <input type="hidden" name="menu_banquete" value="<?= htmlspecialchars($menu_banquete); ?>">
                    <?php endif; ?>
                </div>

                <div>
                    <select name="personal" id="personal" <?= $personal ? "disabled" : "required"; ?>>
                        <option value="" disabled <?= empty($personal) ? "selected" : ""; ?>>Seleccione su Personal Adicional</option>
                        <?php
                        $consulta_personal = "SELECT id_personal, nombre_personal FROM personal";
                        $resultado_personal = $conectar->query($consulta_personal);

                        if ($resultado_personal->num_rows > 0) {
                            while ($p = $resultado_personal->fetch_assoc()) {
                                $selected = ($p['id_personal'] == $personal) ? "selected" : "";
                                echo '<option value="' . $p['id_personal'] . '" ' . $selected . '>' . $p['nombre_personal'] . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No hay personal disponible</option>';
                        }
                        ?>
                    </select>
                    <?php if ($personal): ?>
                        <input type="hidden" name="personal" value="<?= htmlspecialchars($personal); ?>">
                    <?php endif; ?>
                </div>

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
