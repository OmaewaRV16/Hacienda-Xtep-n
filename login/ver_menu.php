<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_menu.css">
    
    <title>Ver Menu Completo</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <hr>

    <div>
    <div class="contenedor_mnu">
    <?php include "conexion.php";
            $id = $_GET['id'];
            $vermenu = "SELECT * FROM banquete_menu WHERE id = '$id'";
            $resultado = mysqli_query($conectar, $vermenu);
            $fila = $resultado -> fetch_array();
            ?>

        <a href="dashboard_banquetes.php" class="icono_grande"><i class="fa-solid fa-reply"></i></a>
        <h2><?php echo $fila["nombre_menu"]?></h2>
        

        <img class="imagen_menu" src="<?php echo $fila["imagen"]; ?>" alt="">
        

        <p><?php echo $fila["descripcion_larga"]?></p>
        
    </div>
</div>
</body>
</html>