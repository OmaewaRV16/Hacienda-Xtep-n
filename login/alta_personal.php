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
        <form action="agregar_personal.php" method="post" enctype="multipart/form-data">
            <h1>Alta Personal</h1>
            <div>
                <input class="inputext" type="text" name="nombre_personal" placeholder="Inserte Nombre del Personal" id="nombre_personal" required>
            </div>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Personal" required></textarea>
            </div>
            <div class="file-container">
                <h5>Inserta Imagen de Muestra:</h5>
                <input class="inputext" type="file" name="fotos" id="fotos" required>
                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, <br> solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
                <br>
            </div>
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>
</body>
</html>
