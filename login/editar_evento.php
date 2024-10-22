<?php require "seguridad.php";?>
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
                <input type="text" class="inputext" name="nombre" placeholder="Ingresa tu nombre completo" required value="<?php echo $fila["nombre"]; ?>">
                <input type="email" class="inputext" name="email" placeholder="Correo de contacto" required value="<?php echo $fila["email"]; ?>">
                </div>
                <br>
                <div class="date">
                    <input type="tel" class="inputextdt" name="telefono" placeholder="Tu número de contacto" required minlength="10" maxlength="10" value="<?php echo $fila["telefono"]; ?>">
                    <p>Fecha de Evento:</p>
                    <input class="inputextdt" type="date" name="fecha" required value="<?php echo $fila["fecha_evento"]; ?>">
                </div>
                <br>
                <div>
                <input type="number" class="inputext" name="invitados" placeholder="Cantidad de invitados" required value="<?php echo $fila["numero_invitados"]; ?>">
                <select class="inputext" id="evento" name="tipo_evento" required>
                    <option value="" disabled <?php echo ($fila['tipo_evento'] == '') ? 'selected' : ''; ?>>Selecciona un tipo de evento</option>
                    <option value="boda" <?php echo ($fila['tipo_evento'] == 'boda') ? 'selected' : ''; ?>>Boda</option>
                    <option value="quinceanera" <?php echo ($fila['tipo_evento'] == 'quinceanera') ? 'selected' : ''; ?>>Quinceañera</option>
                    <option value="corporativo" <?php echo ($fila['tipo_evento'] == 'corporativo') ? 'selected' : ''; ?>>Evento Corporativo</option>
                    <option value="comunion" <?php echo ($fila['tipo_evento'] == 'comunion') ? 'selected' : ''; ?>>Primera Comunión o Bautizo</option>
                    <option value="cumpleanos" <?php echo ($fila['tipo_evento'] == 'cumpleanos') ? 'selected' : ''; ?>>Cumpleaños</option>
                    <option value="pedida" <?php echo ($fila['tipo_evento'] == 'pedida') ? 'selected' : ''; ?>>Pedida de Mano</option>
                </select>

                </div>
                <br>
                <h3>Servicios Adicionales:</h3>
                <p>(seleccione la opción que desee)</p>

                <div class="contenedor-servicios">
                    <div class="servicio">
                        <input type="radio" id="ceremonia" name="ceremonia_presentacion" value="ceremonia" <?php echo ($fila["ceremonia_presentacion"] == 'ceremonia') ? 'checked' : ''; ?> required>
                        <label for="ceremonia">Ceremonia</label><br>
                        <input type="radio" id="presentacion" name="ceremonia_presentacion" value="presentacion" <?php echo ($fila["ceremonia_presentacion"] == 'presentacion') ? 'checked' : ''; ?> required>
                        <label for="presentacion">Presentación</label>
                    </div>

                    <div class="servicio">
                        <input type="radio" id="banquete_si" name="banquete" value="si" <?php echo ($fila["banquete"] == 'si') ? 'checked' : ''; ?> required>
                        <label for="banquete_si">Banquete</label><br>
                        <input type="radio" id="banquete_no" name="banquete" value="no" <?php echo ($fila["banquete"] == 'no') ? 'checked' : ''; ?> required>
                        <label for="banquete_no">No</label>
                    </div>

                    <div class="servicio">
                        <input type="radio" id="bebidas" name="bebidas" value="bebidas" <?php echo ($fila["bebidas"] == 'bebidas') ? 'checked' : ''; ?> required>
                        <label for="bebidas">Bebidas</label><br>
                        <input type="radio" id="barra_libre" name="bebidas" value="barra_libre" <?php echo ($fila["bebidas"] == 'barra_libre') ? 'checked' : ''; ?> required>
                        <label for="barra_libre">Barra Libre</label>
                    </div>

                    <div class="servicio">
                        <input type="radio" id="musica_vivo_si" name="musica_vivo" value="si" <?php echo ($fila["musica_vivo"] == 'si') ? 'checked' : ''; ?> required>
                        <label for="musica_vivo_si">Música en Vivo</label><br>
                        <input type="radio" id="musica_vivo_no" name="musica_vivo" value="no" <?php echo ($fila["musica_vivo"] == 'no') ? 'checked' : ''; ?> required>
                        <label for="musica_vivo_no">No</label>
                    </div>

                    <div class="servicio">
                        <input type="radio" id="show_vivo_si" name="show_vivo" value="si" <?php echo ($fila["show_vivo"] == 'si') ? 'checked' : ''; ?> required>
                        <label for="show_vivo_si">Show en Vivo</label><br>
                        <input type="radio" id="show_vivo_no" name="show_vivo" value="no" <?php echo ($fila["show_vivo"] == 'no') ? 'checked' : ''; ?> required>
                        <label for="show_vivo_no">No</label>
                    </div>

                    <div class="servicio">
                        <input type="radio" id="fotografo_si" name="fotografo" value="si" <?php echo ($fila["fotografo"] == 'si') ? 'checked' : ''; ?> required>
                        <label for="fotografo_si">Fotógrafo</label><br>
                        <input type="radio" id="fotografo_no" name="fotografo" value="no" <?php echo ($fila["fotografo"] == 'no') ? 'checked' : ''; ?> required>
                        <label for="fotografo_no">No</label>
                    </div>
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
