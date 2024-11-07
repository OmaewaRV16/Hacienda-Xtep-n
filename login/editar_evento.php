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

        // Consulta para obtener los detalles de la reserva y el nombre del menú usando LEFT JOIN
        $verevento = "SELECT reservas_eventos.*, banquete_menu.nombre_menu 
                      FROM reservas_eventos 
                      LEFT JOIN banquete_menu ON reservas_eventos.menu_banquete = banquete_menu.id 
                      WHERE reservas_eventos.id = '$id'";
        $resultado = mysqli_query($conectar, $verevento);
        
        // Verificar si la consulta se ejecutó correctamente
        if (!$resultado) {
            die('Consulta fallida: ' . mysqli_error($conectar));
        }

        $fila = $resultado->fetch_array();

        // Verificar si se encontraron filas
        if (!$fila) {
            echo "No se encontró el evento con el ID: " . $id;
            exit; // O redirige a otra página si es necesario
        }
        ?>

        <div class="formulario">
        <form class="form" action="guardar_evento_editar.php?id=<?php echo $fila['id']; ?>" method="post">

                <h1> Editar Evento del Id: <?php echo $fila["id"]?></h1><br>
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

                <div>
                    <label for="estado">Estado:</label>
                    <select class="inputext" id="estado" name="estado" required>
                        <option value="" disabled>Selecciona el estado</option>
                        <option value="pendiente" <?php echo ($fila['estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="realizada" <?php echo ($fila['estado'] == 'realizada') ? 'selected' : ''; ?>>Realizada</option>
                        <option value="cancelada" <?php echo ($fila['estado'] == 'cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                    </select>
                </div>

                <div>
                    <label for="menu_banquete">Menú Banquete:</label>
                    <select class="inputext" id="menu_banquete" name="menu_banquete" required>
                        <option value="" disabled <?php echo ($fila['menu_banquete'] == null) ? 'selected' : ''; ?>>Selecciona un menú</option>
                        <?php
                        // Obtener todos los menús de la base de datos
                        $query_menus = "SELECT * FROM banquete_menu";
                        $result_menus = mysqli_query($conectar, $query_menus);
                        while ($menu = mysqli_fetch_array($result_menus)) {
                            $selected = ($menu['id'] == $fila['menu_banquete']) ? 'selected' : '';
                            echo "<option value='{$menu['id']}' $selected>{$menu['nombre_menu']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <textarea class="inputext" name="mensaje" placeholder="Describe los detalles adicionales del evento"><?php echo $fila["mensaje"]; ?></textarea>
                <br>
                <button class="buttonsbmt" type="submit">Editar <i class="fa fa-check-square" aria-hidden="true"></i></button> <br>
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
