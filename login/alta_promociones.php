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

            <!-- Nombre de la promoción -->
            <div>
                <input class="inputext" type="text" name="nombre_promocion" placeholder="Inserte Nombre de la Promoción" id="nombre_promocion" required>
            </div>
            <br>

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
            <br>

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
            <br>

            <!-- Número de Invitados -->
            <div>
                <input class="inputext" type="number" name="invitados" placeholder="Número de Invitados" id="invitados" required>
            </div>
            <br>

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
            <br>

            <!-- Descripción -->
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripción de la Promoción" required></textarea>
            </div>
            <br>

            <!-- Imagen -->
            <div class="file-container">
                <h5>Inserta Imagen de Muestra:</h5>
                <input class="inputext" type="file" name="imagen" id="imagen" accept="image/jpeg, image/png, image/gif, image/jpg" required>
                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
            </div>
            <br>

            <!-- Botón de Envío -->
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>

    <script>
        function validateForm() {
            // Validaciones adicionales, si se necesitan
            return true;
        }
    </script>
</body>
</html>
