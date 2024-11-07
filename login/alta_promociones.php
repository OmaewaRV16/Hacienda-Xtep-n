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
        <form action="agregar_promciones.php" method="post">
            <h1>Promociones</h1>
            <div>
                <input class="inputext" type="text" name="nombre_promocion" placeholder="Inserte Nombre de la Promoción" required>
            </div>
            <br>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion de la Promoción" required></textarea>
            </div>
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>
</body>
</html>
