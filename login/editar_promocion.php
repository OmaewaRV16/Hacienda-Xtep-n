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
        $id_promocion = $_GET['id'];

        // Consulta para obtener los detalles de la promoción
        $verPromocion = "SELECT * FROM promociones WHERE id_promocion = '$id_promocion'";
        $resultado = mysqli_query($conectar, $verPromocion);
        
        if (!$resultado) {
            die('Consulta fallida: ' . mysqli_error($conectar));
        }

        $fila = $resultado->fetch_array();

        if (!$fila) {
            echo "No se encontró la promoción con el ID: " . $id_promocion;
            exit;
        }
        ?>

        <div class="formulario">
        <form class="form" action="guardar_promocion_editar.php?id=<?php echo $fila['id_promocion']; ?>" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                <h1>Editar: <?php echo $fila["nombre_promocion"]?></h1>
                <label for="">Todos los campos son obligatorios</label>
                <div>
                    <input type="text" class="inputext" name="nombre_promocion" id="nombre_promocion" placeholder="Nombre de la Promoción" required value="<?php echo $fila["nombre_promocion"]; ?>">
                </div>
                <div>
                    <textarea class="inputext" name="descripcion" id="descripcion" placeholder="Descripción de la promoción"><?php echo $fila["descripcion"]; ?></textarea>
                </div>
                <div>
                    <label for="imagen">Subir Imagen (debe de ser .jpg .png .web):*</label>
                    <input type="file" class="inputext" name="imagen" id="imagen" accept="image/*">
                    <?php if (!empty($fila["imagen"])): ?>
                        <p>Imagen actual: <img src="<?php echo $fila["imagen"]; ?>" alt="Imagen de promoción" width="100"></p>
                    <?php endif; ?>
                </div>
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
