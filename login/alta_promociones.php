<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleprom.css">
    <title>Alta Menú Banquetes</title>
</head>
<body>
    <?php include "menu.php";?>
    <?php
    // Conexión a la base de datos
    require "conexion.php";

    // Consulta para obtener los menús desde la tabla banquete_menu
    $query_menus = "SELECT id, nombre_menu FROM banquete_menu";
    $result_menus = mysqli_query($conectar, $query_menus);

    if (!$result_menus) {
        echo "<p>Error al cargar los menús de banquetes.</p>";
        exit;
    }

    // Consulta para obtener el personal adicional desde la tabla personal
    $query_personal = "SELECT id_personal, nombre_personal FROM personal";
    $result_personal = mysqli_query($conectar, $query_personal);

    if (!$result_personal) {
        echo "<p>Error al cargar el personal adicional.</p>";
        exit;
    }
    ?>

    <div class="information">
        <form action="agregar_promociones.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <h1>Promociones</h1>
            <label class="file-info">Todos los campos son obligatorios (*)</label>
            <!-- Nombre de la promoción -->
            <div>
                <input class="inputext" type="text" name="nombre_promocion" placeholder="Inserte Nombre de la Promoción" id="nombre_promocion" required>
            </div>
            <!-- Menú de Banquete (Select dinámico con ID) -->
            <div>
                <select id="menu_banquete" name="menu_banquete" required>
                    <option value="" disabled selected>Selecciona un menú de banquete</option>
                    <?php
                    // Generar las opciones del select dinámicamente con el ID y el nombre del menú
                    while ($menu = mysqli_fetch_assoc($result_menus)) {
                        echo "<option value='" . $menu['id'] . "'>" . $menu['nombre_menu'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Tipo de Evento -->
            <div>
                <select id="tipo_evento" name="tipo_evento" required>
                    <option value="" disabled selected>Selecciona un tipo de evento</option>
                    <option value="boda">Boda</option>
                    <option value="quinceanera">Quinceañera</option>
                    <option value="corporativo">Evento Corporativo</option>
                    <option value="comunion">Primera Comunión o Bautizo</option>
                    <option value="cumpleanos">Cumpleaños</option>
                    <option value="pedida">Pedida de Mano</option>
                </select>
            </div>
            <!-- Número de Invitados -->
            <div>
                <input class="inputext" type="number" name="invitados" placeholder="Número de Invitados" id="invitados" required oninput="validateGuestCount(this)">
            </div>
            <!-- Personal Adicional (Select dinámico con ID) -->
            <div>
                <select id="personal_adicional" name="personal_adicional" required>
                    <option value="" disabled selected>Selecciona Personal Adicional</option>
                    <?php
                    // Generar las opciones del select dinámicamente con el ID y el nombre del personal
                    while ($personal = mysqli_fetch_assoc($result_personal)) {
                        echo "<option value='" . $personal['id_personal'] . "'>" . $personal['nombre_personal'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Descripción -->
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripción de la Promoción" required></textarea>
            </div>
            <!-- Imagen -->
            <div class="file-container">
                <h5>Inserta Imagen de Muestra:</h5>
                <input class="inputext" type="file" name="imagen" id="imagen" accept="image/jpeg, image/png, image/gif, image/jpg" required>
                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
            </div>
            <!-- Botón de Envío -->
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>

    <script>
        // Validar y ajustar automáticamente el número de invitados
        function validateGuestCount(input) {
            const maxGuests = 1000; // Número máximo de invitados
            if (input.value > maxGuests) {
                input.value = maxGuests; // Ajusta automáticamente a 1000 si se excede
            } else if (input.value < 0) {
                input.value = 0; // Evita números negativos
            }
        }

        // Validación completa del formulario
        function validateForm() {
            // Validar que todos los campos obligatorios estén llenos
            const nombrePromocion = document.getElementById("nombre_promocion").value.trim();
            const menuBanquete = document.getElementById("menu_banquete").value;
            const tipoEvento = document.getElementById("tipo_evento").value;
            const invitados = document.getElementById("invitados").value;
            const personalAdicional = document.getElementById("personal_adicional").value;
            const descripcion = document.getElementById("descripcion").value.trim();
            const imagen = document.getElementById("imagen").files[0];

            if (!nombrePromocion) {
                alert("El nombre de la promoción es obligatorio.");
                return false;
            }

            if (!menuBanquete) {
                alert("Por favor, selecciona un menú de banquete.");
                return false;
            }

            if (!tipoEvento) {
                alert("Por favor, selecciona un tipo de evento.");
                return false;
            }

            if (!invitados || invitados <= 0 || invitados > 1000) {
                alert("El número de invitados debe ser mayor a 0 y no puede exceder los 1000.");
                return false;
            }

            if (!personalAdicional) {
                alert("Por favor, selecciona un personal adicional.");
                return false;
            }

            if (!descripcion) {
                alert("La descripción de la promoción es obligatoria.");
                return false;
            }

            if (!imagen) {
                alert("Por favor, sube una imagen de muestra.");
                return false;
            }

            // Validar tamaño y formato de la imagen
            const maxFileSize = 1 * 1024 * 1024; // 1MB en bytes
            const allowedExtensions = ["image/jpeg", "image/png", "image/gif", "image/jpg"];

            if (imagen.size > maxFileSize) {
                alert("La imagen no puede superar 1MB de tamaño.");
                return false;
            }

            if (!allowedExtensions.includes(imagen.type)) {
                alert("El formato de la imagen no es válido. Solo se aceptan JPEG, PNG, GIF y JPG.");
                return false;
            }

            return true; // Si todas las validaciones pasan
        }
    </script>
</body>
</html>
