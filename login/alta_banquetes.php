<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylebanqts.css">
    <title>Alta Menú Banquetes</title>

    <!-- Incluir CKEditor desde la ruta local -->
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
    <?php include "menu.php";?>

    <div class="information">
        <form action="agregar_banquete_menu.php" method="post" enctype="multipart/form-data">
            <h1>Menú Banquete</h1>
            <div>
                <input class="inputext" type="text" name="nombre_menu" placeholder="Insertar Nombre del Menú" required>
            </div>
            <br>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Menú" required></textarea>
            </div>
            <br>
            <div>
                <!-- Este es el nuevo textarea para CKEditor -->
                <textarea  class="inputext" name="descripcion_larga" id="descripcion_larga" placeholder="Inserta las Especificaciones de todo el Menú" required></textarea>
            </div>
            <br>
            <div class="file-container">
                <h5>Inserta La Foto del Menú:</h5>
                <input class="inputext" type="file" name="imagen" id="imagen" required>
                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, <br> solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
                <br>
            </div>
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>

    <!-- Inicializar CKEditor en el nuevo textarea (descripcion_larga) -->
    <script>
            CKEDITOR.replace('descripcion_larga');
    </script>
</body>
</html>
