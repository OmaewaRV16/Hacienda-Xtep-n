<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesedtvr.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Ver Reserva</title>
</head>
<body>
    <?php include "menu.php" ?>
    <div class="container">
        <br>
        <div class="information">
            <h2>Ver Reserva</h2>
            <br>
            <a class="back" href="dashboard_reservas.php"><i class="fa-solid fa-angles-left"></i></a>

            <?php
            require "conexion.php";
            $id_reserva = $_GET['id'];

            // Consulta para obtener los detalles de la reserva
            $verreserva = "SELECT * FROM reservas WHERE id = '$id_reserva'";
            $resultado = mysqli_query($conectar, $verreserva);
            $fila = $resultado->fetch_array();

            // Función para convertir el mes al formato en español
            function convertir_mes_espanol($fecha) {
                $meses_ingles = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                $meses_espanol = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                
                return str_replace($meses_ingles, $meses_espanol, strftime("%d de %B de %Y", strtotime($fecha)));
            }

            // Convertir las fechas de llegada y salida al formato español
            $fecha_llegada = convertir_mes_espanol($fila["fecha_llegada"]);
            $fecha_salida = convertir_mes_espanol($fila["fecha_salida"]);
            ?>

            <div class="contenedor_usuario">
                <h3>Nombre del Cliente</h3>
                <h4><?php echo $fila["nombre"]; ?></h4>
                <hr>
                <h3>Correo Electrónico</h3>
                <h4><?php echo $fila["email"]; ?></h4>
                <hr>
                <h3>Teléfono</h3>
                <h4><?php echo $fila["telefono"]; ?></h4>
                <hr>
                <h3>Fecha de Llegada</h3>
                <h4><?php echo $fecha_llegada; ?></h4>
                <hr>
                <h3>Fecha de Salida</h3>
                <h4><?php echo $fecha_salida; ?></h4>
                <hr>
                <h3>Personas</h3>
                <h4><?php echo $fila["personas"]; ?></h4>
                <hr>
                <br>
                <a href="editar_reserva.php?id=<?php echo $fila['id']; ?>"><button class="btn2">Editar Reserva</button></a>
            </div>
        </div>
    </div>
</body>
</html>
