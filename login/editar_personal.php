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
        <form action="agregar_personal.editar.php" method="post">
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
            <input type="hidden" name="id_personal" value="<?php echo $fila['id_personal']; ?>">
            <button class="buttonsbmt">Enviar</button>
        </form>
        
    </div>
</body>
</html>
