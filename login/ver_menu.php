<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Ver Menu Completo</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <hr>

    <div class="contenedor_mnu">
    <?php include "conexion.php";
            $id = $_GET['id'];
            $vermenu = "SELECT * FROM banquete_menu WHERE id = '$id'";
            $resultado = mysqli_query($conectar, $vermenu);
            $fila = $resultado -> fetch_array();
            ?>
        <h2><?php echo $fila["nombre_menu"]?></h2>
        

        <img class="imagen_menu" src="login/<?php echo $fila["imagen"]; ?>" alt="">
        

        <p><?php echo $fila["descripcion_larga"]?></p>
        
    </div>
</body>
</html>