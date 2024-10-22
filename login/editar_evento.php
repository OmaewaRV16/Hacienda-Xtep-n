<?php require "seguridad.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleeventos.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Reservas Eventos</title>
</head>
<body>
<div class="container">
    <?php include "menu.php"; ?>
    <br><br>

    <div class="information">
        <?php
        require "conexion.php";
        $id = $_GET['id'];

        $verevento = "SELECT * FROM reservas_eventos WHERE id = '$id'";
        $resultado = mysqli_query($conectar, $verevento);
        $fila = $resultado->fetch_array();
        ?>

        <div class="formulario">
        <form class="form" action="guardar_evento_editar.php?id=<?php echo $fila['id']; ?>" method="post">

                <h1>Reservas Eventos</h1><br>
                <div>
                    <input type="text" class="inputext" name="nombre_disabled" placeholder="Ingresa tu nombre completo" required value="<?php echo $fila["nombre"]; ?>" disabled>
                    <input type="hidden" name="nombre" value="<?php echo $fila["nombre"]; ?>">

                    <input type="email" class="inputext" name="email_disabled" placeholder="Correo de contacto" required value="<?php echo $fila["email"]; ?>" disabled>
                    <input type="hidden" name="email" value="<?php echo $fila["email"]; ?>">
                </div>
                <br>
                <div class="date">
                    <input type="tel" class="inputextdt" name="telefono_disabled" placeholder="Tu número de contacto" required minlength="10" maxlength="10" value="<?php echo $fila["telefono"]; ?>" disabled>
                    <input type="hidden" name="telefono" value="<?php echo $fila["telefono"]; ?>">

                    <p>Fecha de Evento:</p>
                    <input class="inputextdt" type="date" name="fecha" id="fecha" required value="<?php echo $fila["fecha"]; ?>">
                </div>
                <br>
                <div>
                    <input type="number" class="inputext" name="invitados" placeholder="Cantidad de invitados" required value="<?php echo $fila["invitados"]; ?>">
                    <select class="inputext" id="evento" name="evento" required>
                        <option value="" disabled <?php echo ($fila['evento'] == '') ? 'selected' : ''; ?>>Selecciona un tipo de evento</option>
                        <option value="boda" <?php echo ($fila['evento'] == 'boda') ? 'selected' : ''; ?>>Boda</option>
                        <option value="quinceanera" <?php echo ($fila['evento'] == 'quinceanera') ? 'selected' : ''; ?>>Quinceañera</option>
                        <option value="corporativo" <?php echo ($fila['evento'] == 'corporativo') ? 'selected' : ''; ?>>Evento Corporativo</option>
                        <option value="comunion" <?php echo ($fila['evento'] == 'comunion') ? 'selected' : ''; ?>>Primera Comunión o Bautizo</option>
                        <option value="cumpleanos" <?php echo ($fila['evento'] == 'cumpleanos') ? 'selected' : ''; ?>>Cumpleaños</option>
                        <option value="pedida" <?php echo ($fila['evento'] == 'pedida') ? 'selected' : ''; ?>>Pedida de Mano</option>
                    </select>
                </div>  

                <textarea class="inputext" name="mensaje" placeholder="Describe los detalles adicionales del evento"><?php echo $fila["mensaje"]; ?></textarea>
                <br>
                <button class="buttonsbmt" type="submit">Reservar <i class="fa fa-check-square" aria-hidden="true"></i></button> <br>
                <a class="back" href="dashboard_eventos.php"><i class="fa-solid fa-angles-left"></i></a>
            </form>
        </div>
    </div>
</div>
<script>
    const fechaEventoInput = document.getElementById('fecha');

    function obtenerFechaActual() {
        const hoy = new Date();
        const dia = ('0' + hoy.getDate()).slice(-2);
        const mes = ('0' + (hoy.getMonth() + 1)).slice(-2);
        const anio = hoy.getFullYear();
        return `${anio}-${mes}-${dia}`;
    }

    const fechaActual = obtenerFechaActual();
    fechaEventoInput.min = fechaActual;
</script>

</body>
</html>
