<?php require "seguridad.php"; ?>
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
            $id_reserva = isset($_GET['id']) ? intval($_GET['id']) : 0;

            // Consulta para obtener los detalles de la reserva
            $verreserva = "SELECT * FROM reservas_eventos 
            INNER JOIN banquete_menu ON reservas_eventos.menu_banquete = banquete_menu.id
            WHERE reservas_eventos.id = '$id_reserva'";
            $resultado = mysqli_query($conectar, $verreserva);
            
            if (!$resultado) {
                die("Error en la consulta: " . mysqli_error($conectar));
            }
            
            if (mysqli_num_rows($resultado) == 0) {
                echo "No se encontró la reserva.";
                exit;
            }

            $fila = $resultado->fetch_array();

            // Función para convertir el mes al formato en español
            function convertir_mes_espanol($fecha) {
                $meses_ingles = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                $meses_espanol = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                
                return str_replace($meses_ingles, $meses_espanol, date("d \d\e F \d\e Y", strtotime($fecha)));
            }

            // Convertir la fecha del evento al formato español
            $fecha = convertir_mes_espanol($fila["fecha"]);
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
                <h4><?php echo $fila["evento"]; ?></h4>
                <hr>
                <h3>Fecha del Evento</h3>
                <h4><?php echo $fecha; ?></h4>
                <hr>
                <h3>Cantidad de Invitados</h3>
                <h4><?php echo $fila["invitados"]; ?></h4>
                <hr>
                <h3>Banquete-Menu</h3>
                <h4><?php echo $fila["nombre_menu"]; ?></h4>
                <hr>
                <h3>Detalles Adicionales</h3>
                <h4><?php echo $fila["mensaje"]; ?></h4>
                <hr>
                <br>
                
                <a href="editar_evento.php?id=<?php echo $id_reserva; ?>">
                    <button class="btn2">Editar Reserva</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
