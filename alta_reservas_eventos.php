<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/stylereservas.css">
    <title>Reservas</title>
</head>
<body>
    <?php include "menu_principal.php";?>
    <hr>
    <div class="contenedor">
        <div class="contenedor_frm">
            <h2>Reservar Evento</h2>
            <br>
            <form action="agregar_reserva_evento.php" method="post">
                <div>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre completo" required>
                    <input type="email" name="email"  id="email" placeholder="Ingresa tu correo electronico" required>
                </div>

                <div>
                    <input type="tel" name="telefono" id="telefono" placeholder="Ingresa un número celular" minlength="10" maxlength="10" required>
                    <select id="evento" name="evento" required>
                        <option value="" disabled selected>Selecciona un tipo de evento</option>
                        <option value="boda">Boda</option>
                        <option value="quinceanera">Quinceañera</option>
                        <option value="corporativo">Evento Corporativo</option>
                        <option value="comunion">Primera Comunión o Bautizo</option>
                        <option value="cumpleanos">Cumpleaños</option>
                        <option value="pedida">Pedida de Mano</option>
                    </select>
                </div>

                <div>
                    <span>Seleccione fecha de reserva: </span><input type="date" name="fecha" id="fecha" required>
                    <input type="number" name="invitados" id="invitados" required placeholder="Cantidad de invitados">
                </div>

                <div>
                <textarea class="inputext" id="mensaje" name="mensaje" rows="4" cols="50" placeholder="Describe los detalles adicionales del evento" required></textarea>
                </div>

                <input type="submit" value="Reservar">
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

    <?php include "pie_pagina.php"?>
</body>
</html>