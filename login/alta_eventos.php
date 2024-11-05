<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleeventos.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include "conexion.php";  // Incluir el archivo de conexión
        include "menu.php";
    ?>

    <div class="information">
        <div class="formulario">
            <form class="form" action="guardar_evento.php" method="post">
                <h1>Reservas Eventos</h1>
                <div class="inputs">
                    <input class="inputext" type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
                    <input class="inputext" type="email" id="email" name="email" placeholder="Correo de contacto" required>
                    <input class="inputext" type="tel" id="telefono" name="telefono" placeholder="Tu número de contacto" required minlength="10" maxlength="10">
                    
                    <select class="inputext" id="evento" name="evento" required>
                        <option value="" disabled selected>Selecciona un tipo de evento</option>
                        <option value="boda">Boda</option>
                        <option value="quinceanera">Quinceañera</option>
                        <option value="corporativo">Evento Corporativo</option>
                        <option value="comunion">Primera Comunión o Bautizo</option>
                        <option value="cumpleanos">Cumpleaños</option>
                        <option value="pedida">Pedida de Mano</option>
                    </select>
                    
                    <div class="date">
                        <p>Fecha de Evento:</p>
                        <input class="inputextdt" type="date" id="fecha" name="fecha" required>
                    </div>
                    
                    <input class="inputext" type="number" id="invitados" name="invitados" placeholder="Cantidad de invitados" required min="1" max="1000" oninput="validarInvitados(this)">
                    
                    <!-- Select para el menú de banquete -->
<<<<<<< HEAD
                    <select class="inputext" name="menu_banquete" id="menu_banquete">
=======
                    <select class="inputext" name="menu_banquete" id="menu_banquete" required>
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
                        <option value="" disabled selected>Seleccione Menú del Banquete de su preferencia</option>
                        <?php
                            $query = "SELECT id, nombre_menu FROM banquete_menu";
                            $result = mysqli_query($conectar, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nombre_menu']) . "</option>";
                                }
                            }
                        ?>
                    </select>

                    <script>
                        function validarInvitados(input) {
                            const min = 1;
                            const max = 1000;
                            if (input.value < min) input.value = min;
                            if (input.value > max) input.value = max;
                        }
                    </script>

                    <textarea class="inputmsj" id="mensaje" name="mensaje" rows="4" cols="50" placeholder="Describe los detalles adicionales del evento"></textarea>
                    <button class="buttonsbmt" type="submit">Reservar <i class="fa fa-check-square" aria-hidden="true"></i></button>
                    <a class="back" href="dashboard_eventos.php"><i class="fa-solid fa-angles-left"></i></a>
                </div>
            </form>
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
