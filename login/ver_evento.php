<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesedtvr.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Ver Reserva de Evento</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container">
        <br>
        <div class="information">
            <h2>Ver Reserva de Evento</h2>
            <br>
            <a class="back" href="dashboard_eventos.php"><i class="fa-solid fa-angles-left"></i></a>

            <?php
            require "conexion.php";
            $id_reserva = $_GET['id'];

            // Consulta para obtener los detalles de la reserva
            $verreserva = "SELECT * FROM reservas_eventos WHERE id = '$id_reserva'";
            $resultado = mysqli_query($conectar, $verreserva);
            $fila = $resultado->fetch_array();

            // Función para convertir el mes al formato en español
            function convertir_mes_espanol($fecha) {
                $meses_ingles = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                $meses_espanol = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                
                return str_replace($meses_ingles, $meses_espanol, strftime("%d de %B de %Y", strtotime($fecha)));
            }

            // Convertir la fecha del evento al formato español
            $fecha_evento = convertir_mes_espanol($fila["fecha_evento"]);
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
                <h3>Tipo de Evento</h3>
                <h4><?php echo $fila["tipo_evento"]; ?></h4>
                <hr>
                <h3>Fecha del Evento</h3>
                <h4><?php echo $fecha_evento; ?></h4>
                <hr>
                <h3>Cantidad de Invitados</h3>
                <h4><?php echo $fila["numero_invitados"]; ?></h4>
                <hr>
                <h3>Servicios Adicionales</h3>
                <h4>Ceremonia o Presentación: <?php echo $fila["ceremonia_presentacion"];?></h4>
                <h4>Banquete: <?php echo $fila["banquete"];?></h4>
                <h4>Bebidas o Barra Libre: <?php echo $fila["bebidas"];?></h4>
                <h4>Música en vivo: <?php echo $fila["musica_vivo"];?></h4>
                <h4>Fotografo: <?php echo $fila["fotografo"];?></h4>
                <hr>
                <h3>Detalles Adicionales</h3>
                <h4><?php echo $fila["mensaje"]; ?></h4>
                <hr>
                <br>
                <a href="editar_reserva_evento.php?id=<?php echo $fila['id']; ?>"><button class="btn2">Editar Reserva</button></a>
            </div>
        </div>
    </div>
</body>
</html>
