
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
        <form action="agregar_banquete_editar.php" method="post" enctype="multipart/form-data">
        <?php
        require "conexion.php";
        $id = $_GET['id'];

        $vermenu = "SELECT * FROM banquete_menu WHERE id = '$id'";
        $resultado = mysqli_query($conectar, $vermenu);
        $fila = $resultado->fetch_array();
        ?>
            <h1>Menú Banquete</h1>
            <label class="file-info">Campos Obligatorios *.</label><br>
            <div>
                <h5>Nombre: *</h5>
                <input class="inputext" type="text" name="nombre_menu" placeholder="Insertar Nombre del Menú" required value="<?php echo $fila["nombre_menu"];?>">
           </div>
           <br>
           <div>
                <h5>Descripcion: *</h5>
               <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripcion del Menú" required><?php echo $fila["descripcion"];?></textarea>
           </div>
           <br>
           <div>
               <h5>Inserta La Foto del Menú (opcional): </h5>
               <input class="inputext" type="file" name="imagen" id="imagen">
               
               <input type="hidden" name="imagen_actual" value="<?php echo $fila['imagen']; ?>">
               <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
           </div>
           <button class="buttonsbmt">Enviar</button>
        </form>
    </div>
</body>
</html>
