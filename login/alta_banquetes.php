<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylebanqts.css">
    <title>Alta Menú Banquetes</title>
</head>
<body>
    <?php include "menu.php";?>

    <div class="information">
        <form action="agregar_banquete_menu.php" method="post" enctype="multipart/form-data">
            <h1>Menú Banquete</h1>
            <div>
<<<<<<< HEAD
                <input class="inputext" type="text" name="nombre_menu" placeholder="Insertar Nombre del Menú" required>
            </div>
            <br>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Menú" required></textarea>
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
</body>
</html>
=======
            <input class="inputext" type="text" name="nombre_menu" placeholder="Insertar Nombre del Menú" required>
           </div>
           <br>
           <div>
           <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Menú" required></textarea>
           </div>
           <br>
           <div>
            <h5>Inserta La Foto del Menú: </h5>
            <br>
            <input class="inputext" type="file" name="imagen" id="imagen" required>
           </div>
           <button class="buttonsbmt">Enviar</button>
        </form>
    </div>


</body>
</html>
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
