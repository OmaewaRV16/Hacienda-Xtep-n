<?php require "seguridad.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylepromociones.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Editar Promoción</title>
</head>
<body>
<div class="container">
    <?php include "menu.php"; ?>
    <br><br>

    <div class="information">
        <?php
        require "conexion.php";
        $id_promocion = intval($_GET['id']);

        // Consulta para obtener los detalles de la promoción
        $verPromocion = "SELECT * FROM promociones WHERE id_promocion = $id_promocion";
        $resultado = mysqli_query($conectar, $verPromocion);
        
        if (!$resultado) {
            die('Consulta fallida: ' . mysqli_error($conectar));
        }

        $fila = $resultado->fetch_array();

        if (!$fila) {
            echo "No se encontró la promoción con el ID: " . $id_promocion;
            exit;
        }

        // Consulta para cargar opciones del menú de banquete
        $query_menus = "SELECT id, nombre_menu FROM banquete_menu";
        $menus_resultado = mysqli_query($conectar, $query_menus);

        if (!$menus_resultado) {
            die('Error al cargar los menús de banquete: ' . mysqli_error($conectar));
        }

        // Consulta para cargar opciones de personal adicional
        $query_personal = "SELECT id_personal, nombre_personal FROM personal";
        $personal_resultado = mysqli_query($conectar, $query_personal);

        if (!$personal_resultado) {
            die('Error al cargar el personal adicional: ' . mysqli_error($conectar));
        }
        ?>

        <div class="formulario">
        <form class="form" action="guardar_promocion_editar.php?id=<?php echo $fila['id_promocion']; ?>" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                <h1>Editar: <?php echo htmlspecialchars($fila["nombre_promocion"]); ?></h1>
                <label for="">Todos los campos son obligatorios</label>
                <!-- Nombre de la Promoción -->
                <div>
                    <input type="text" class="inputext" name="nombre_promocion" id="nombre_promocion" placeholder="Nombre de la Promoción" required value="<?php echo htmlspecialchars($fila["nombre_promocion"]); ?>">
                </div>
                <!-- Menú de Banquete -->
                <div>
                    <label for="menu_banquete">Menú del Banquete:</label>
                    <select id="menu_banquete" name="menu_banquete" required>
                        <option value="" disabled>Selecciona un menú de banquete</option>
                        <?php
                        while ($menu = mysqli_fetch_assoc($menus_resultado)) {
                            $selected = ($menu['id'] == $fila['menu_banquete']) ? "selected" : "";
                            echo "<option value='" . $menu['id'] . "' $selected>" . htmlspecialchars($menu['nombre_menu']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Tipo de Evento -->
                <div>
                    <label for="tipo_evento">Tipo de Evento:</label>
                    <select id="tipo_evento" name="tipo_evento" required>
                        <option value="" disabled>Selecciona un tipo de evento</option>
                        <option value="boda" <?php echo ($fila['tipo_evento'] == 'boda') ? 'selected' : ''; ?>>Boda</option>
                        <option value="quinceanera" <?php echo ($fila['tipo_evento'] == 'quinceanera') ? 'selected' : ''; ?>>Quinceañera</option>
                        <option value="corporativo" <?php echo ($fila['tipo_evento'] == 'corporativo') ? 'selected' : ''; ?>>Evento Corporativo</option>
                        <option value="comunion" <?php echo ($fila['tipo_evento'] == 'comunion') ? 'selected' : ''; ?>>Primera Comunión o Bautizo</option>
                        <option value="cumpleanos" <?php echo ($fila['tipo_evento'] == 'cumpleanos') ? 'selected' : ''; ?>>Cumpleaños</option>
                        <option value="pedida" <?php echo ($fila['tipo_evento'] == 'pedida') ? 'selected' : ''; ?>>Pedida de Mano</option>
                    </select>
                </div>
                <!-- Número de Invitados -->
                <div>
                    <input type="number" class="inputext" name="invitados" id="invitados" placeholder="Número de Invitados" required value="<?php echo htmlspecialchars($fila['invitados']); ?>">
                </div>
                <!-- Personal Adicional -->
                <div>
                    <label for="personal_adicional">Personal Adicional:</label>
                    <select id="personal_adicional" name="personal_adicional" required>
                        <option value="" disabled>Selecciona Personal Adicional</option>
                        <?php
                        while ($personal = mysqli_fetch_assoc($personal_resultado)) {
                            $selected = ($personal['id_personal'] == $fila['personal']) ? "selected" : "";
                            echo "<option value='" . $personal['id_personal'] . "' $selected>" . htmlspecialchars($personal['nombre_personal']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Descripción -->
                <div>
                    <textarea class="inputext inputextdesc" name="descripcion" id="descripcion" placeholder="Descripción de la promoción"><?php echo htmlspecialchars($fila["descripcion"]); ?></textarea>
                </div>
                <!-- Imagen -->
                <div>
                    <label for="imagen">Subir Imagen (debe ser .jpg .png .gif):*</label>
                    <input type="file" class="inputext" name="imagen" id="imagen" accept="image/*">
                </div>

                <!-- Botón -->
                <button class="buttonsbmt" type="submit">Editar <i class="fa fa-check-square" aria-hidden="true"></i></button> <br>
                <a class="back" href="dashboard_promociones.php"><i class="fa-solid fa-angles-left"></i></a>
            </form>
        </div>
    </div>
</div>

<script>
    function validarFormulario() {
        const nombrePromocion = document.getElementById('nombre_promocion').value.trim();
        const descripcion = document.getElementById('descripcion').value.trim();
        const imagenInput = document.getElementById('imagen');
        const imagen = imagenInput.files[0];

        // Verificar campos obligatorios
        if (!nombrePromocion || !descripcion) {
            alert("Por favor, complete todos los campos obligatorios.");
            return false;
        }

        // Validar tamaño de la imagen (máximo 2MB)
        const maxSize = 2 * 1024 * 1024; // 2MB
        if (imagen && imagen.size > maxSize) {
            alert("El tamaño de la imagen debe ser inferior a 2 MB.");
            return false;
        }

        // Validar tipo de archivo
        if (imagen && !imagen.type.startsWith("image/")) {
            alert("El archivo seleccionado no es una imagen válida.");
            return false;
        }

        // Confirmación de edición
        return confirm("¿Estás seguro de que deseas editar esta promoción?");
    }
</script>

</body>
</html>
