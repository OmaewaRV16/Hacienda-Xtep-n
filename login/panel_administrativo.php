<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylemenu.css">
    <title>Menu</title>
</head>
<body>
    <?php include "menu.php";?>
    <br><br>
    <div class="information">
        <img class="xtepenimg" src="imagenes/xtepen-logo-500-shadow.png" alt="">
        <br><br>

        <?php
        require "conexion.php";
        $id_usuario = $_SESSION['id_usuario'];

        $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conectar, $verusuario);
        $fila = $resultado -> fetch_array();
        ?>

        <!-- <img src="<?php echo $fila["foto"]; ?>" alt="" style="width: 200px; height: 200px; object-fit: cover; border-radius: 20%;">
        <h3>USUARIO: <br> <?php echo $fila["nombre_completo"]; ?></h3> -->


    </div>
</body>
</html
