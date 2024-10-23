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
            <input class="inputext" type="text" placeholder="Insertar Nombre del Platillo">
           </div>
           <br>
           <div>
           <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Platillo"></textarea>
           </div>
           <br>
           <div>
            <h5>Inserta La Foto del Platillo: </h5>
            <br>
            <input class="inputext" type="file" name="images" id="images">
           </div>
        </form>
    </div>


</body>
</html>