<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/style_menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="contenedor_arriba">
        <a href="banquetes_menu.php"><button title="Regresar"><i class="fa-solid fa-reply"></i></button></a>
        <img src="login/imagenes/xtepen-logo-750.gif" alt="">
    </div>
    <hr>

    <div class="contenedor_mnu">
    <?php require "login/conexion.php";
            $id = $_GET['id'];
            $vermenu = "SELECT * FROM banquete_menu WHERE id = '$id'";
            $resultado = mysqli_query($conectar, $vermenu);
            $fila = $resultado -> fetch_array();
            ?>
        <h2><?php echo $fila["nombre_menu"]?></h2>
        

        <img class="imagen_menu" src="login/<?php echo $fila["imagen"]; ?>" alt="">
        

        <p><?php echo $fila["descripcion_larga"]?></p>
        
    </div>

    <br>
</body>
</html>