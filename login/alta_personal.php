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
        <form action="agregar_personal.php" method="post">
            <h1>Alta Personal</h1>
            <label class="file-info">Todos los Campos son Obligatorios*</label>
            <div>
                <input class="inputext" type="text" name="nombre_personal" placeholder="Inserte Nombre del Personal" id="nombre_personal" required>
            </div>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Personal" required></textarea>
            </div>
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>
</body>
</html>