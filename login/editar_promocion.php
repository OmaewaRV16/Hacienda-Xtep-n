<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleprom.css">
    <title>Editar Promociones</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="information">
        <form action="agregar_promociones_editar.php" method="post" enctype="multipart/form-data">
        <?php
        require "conexion.php";
        $id_promocion = $_GET['id_promocion'];

        // Consulta para obtener los datos de la promoción
        $verPromocion = "SELECT * FROM promociones WHERE id_promocion = '$id_promocion'";
        $resultado = mysqli_query($conectar, $verPromocion);
        $fila = mysqli_fetch_array($resultado);
        ?>
            <h1>Editar Promoción</h1>
            <div>
                <input class="inputext" type="text" name="nombre_promocion" placeholder="Inserte Nombre de la Promoción" required value="<?php echo $fila['nombre_promocion']; ?>">
            </div>
            <br>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripción de la Promoción" required><?php echo $fila['descripcion']; ?></textarea>
            </div>
            <br>
            <div class="file-container">
                <h5>Inserta Imagen de Muestra (opcional):</h5>
                <input class="inputext" type="file" name="imagen" id="imagen">
                
                <?php if (!empty($fila['imagen'])): ?>
                    <br>
                    <img src="<?php echo $fila['imagen']; ?>" alt="Imagen Actual" width="100">
                    <br><br>
                <?php endif; ?>

                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, <br> solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
                <br>
                <input type="hidden" name="imagen_actual" value="<?php echo $fila['imagen']; ?>">
                <input type="hidden" name="id_promocion" value="<?php echo $fila['id_promocion']; ?>">
            </div>
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>
</body>
</html>
