<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylereservas.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Editar Reserva</title>
</head>
<body>
<div class="container">
    <?php include "menu.php"?>
    <br><br>

    <div class="information">
        <?php
        require "conexion.php";
        $id = $_GET['id'];

        $verreserva = "SELECT * FROM reservas WHERE id = '$id'";
        $resultado = mysqli_query($conectar, $verreserva);
        $fila = $resultado -> fetch_array();
        ?>

        <div class="formulario">
        <form class="form" action="guardar_reserva2_editar.php" method="post">
        <h1>Editar Reserva</h1><br>
            <input type="text" class="inputext" name="nombre" placeholder="Nombre completo" required value="<?php echo $fila["nombre"]?>">
            <br>
            <input type="email" class="inputext" placeholder="Correo electrónico" required value="<?php echo $fila["email"]?>" disabled>
            <br>
            <input type="tel" class="inputext" name="telefono" placeholder="Teléfono" required>
            <br>
            <div class="date">
                <p>Fecha de Entrada:</p>
                <input class="inputextdt" type="date" name="fecha_llegada" required value="<?php echo $fila["fecha_llegada"]?>">
            </div>
            <br>
            <div class="date">
            <p>Fecha de Salida:</p>
            <input class="inputextdt" type="date" name="fecha_salida" required value="<?php echo $fila["fecha_salida"]?>">
            </div>
            <br>
            <input type="number" class="inputext" name="personas" placeholder="Número de personas" required min="1" value="<?php echo $fila["personas"]?>">
            <br>
            <textarea class="inputext" name="comentarios" placeholder="Comentarios adicionales"><?php echo $fila["comentarios"]?></textarea>
            <br>
            <input type="hidden" name="email" value="<?php echo $fila["email"]?>">
            <button class="buttonsbmt" type="submit">Editar</button> <br>
            <a class="back" href="dashboard_reservas.php"><i class="fa-solid fa-angles-left"></i></a>
        </form>
        </div>
</div>
</body>
</html>