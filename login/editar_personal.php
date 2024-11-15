<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylepersonal.css">
    <title>Alta Personal</title>
</head>
<body>
    <?php include "menu.php";?>

    <div class="information">
        <form action="agregar_personal.editar.php" method="post" enctype="multipart/form-data">
        <?php
        require "conexion.php";
        $id_personal = $_GET['id'];

        $verpersonal = "SELECT * FROM personal WHERE id_personal = '$id_personal'";
        $resultado = mysqli_query($conectar, $verpersonal);
        $fila = $resultado->fetch_array();
        ?>
            <h1>Editar Personal</h1>
            <div>
                <input class="inputext" type="text" name="nombre_personal" placeholder="Inserte Nombre del Personal" id="nombre_personal" required value="<?php echo $fila['nombre_personal']?>">
            </div>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Personal" required><?php echo $fila['descripcion']?></textarea>
            </div>
            <div class="file-container">
                <h5>Inserta Imagen de Muestra (opcional):</h5>
                <input class="inputext" type="file" name="fotos" id="fotos">
                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, <br> solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
                <br>
            </div>
            <input type="hidden" name="imagen_actual" value="<?php echo $fila['fotos']; ?>">
            <input type="hidden" name="id_personal" value="<?php echo $fila['id_personal']; ?>">
            <button class="buttonsbmt">Enviar</button>
        </form>
        <a href="dashboard_personal.php">Regresar</a>
    </div>
</body>
</html>
