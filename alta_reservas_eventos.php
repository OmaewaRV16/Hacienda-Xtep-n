<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/stylereservas.css">
    <title>Reservas</title>
</head>
<body>
    <?php include "menu_principal.php"; ?>
    <hr>
    <div class="contenedor">
        <div class="contenedor_frm">
            <h2>Reservar Evento</h2>
            <br>
            <form action="agregar_reserva_evento.php?token=123456" method="post" id="formReserva">
                <input type="hidden" name="auth_code" value="codigo_secreto">
                
                <div>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre completo" required>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu correo electronico" required>
                </div>

                <div>
                    <input type="tel" name="telefono" id="telefono" placeholder="Ingresa un número celular" maxlength="10" required pattern="[0-9]{10}" inputmode="numeric" title="Ingresa un número de 10 dígitos">
                    
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
                    <span>Seleccione fecha de reserva: </span><input class="dte" type="date" name="fecha" id="fecha" required>
                    
                    <div class="tooltip">
                        <input class="inv" type="number" name="invitados" id="invitados" required min="1" max="1000" maxlength="4" placeholder="Cantidad de invitados" oninput="validarCantidadInvitados(this)">
                        <span class="tooltiptext">Máximo 1000 invitados</span>
                    </div>

                </div>
                
                <div>
                    <select name="menu_banquete" id="menu_banquete" onchange="mostrarDetalles()" required>
                        <option value="" disabled selected>Seleccione su Menú</option>
                        
                        <?php
                        // Conexión a la base de datos
                        $conexion = new mysqli("localhost", "root", "", "haciendaxtepen");

                        // Verificar si hubo error en la conexión
                        if ($conexion->connect_error) {
                        die("Error de conexión: " . $conexion->connect_error);
                        }

                        // Consulta para obtener los menús de banquete
                        $consulta = "SELECT id, nombre_menu, descripcion, imagen FROM banquete_menu";
                        $resultado = $conexion->query($consulta);

                        // Agregar cada menú de banquete como opción en el select
                        if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo '<option value="'.$fila['id'].'" 
                                    data-imagen="'.$fila['imagen'].'" 
                                    data-descripcion="'.$fila['descripcion'].'">'
                                    .$fila['nombre_menu'].'</option>';
                        }
                        } else {
                        echo '<option value="" disabled>No hay menús disponibles</option>';
                        }

                        // Cerrar la conexión
                        $conexion->close();
                        ?>
                        </select>

                        <!-- Contenedor para mostrar la imagen y la descripción -->
                        <div id="detalles-contenedor" style="margin-top: 20px; display: none;">
                        <button id="cerrar-detalles" onclick="cerrarDetalles()" style="border: none; background: transparent; font-size: 40px; cursor: pointer; color: black;">&times;</button>
                        <img id="imagen-menu" src="" alt="Imagen del menú" style="max-width: 200px; border-radius: 8px;">
                        <p id="descripcion-menu" style="margin-top: 10px; font-size: 14px; color: red;"></p>
                        </div>

                        </div>

                        <script>
                        function mostrarDetalles() {
                        // Obtener el select y la opción seleccionada
                        const select = document.getElementById('menu_banquete');
                        const opcionSeleccionada = select.options[select.selectedIndex];

                        // Obtener los atributos data-imagen y data-descripcion
                        const imagenRuta = opcionSeleccionada.getAttribute('data-imagen');
                        const descripcionTexto = opcionSeleccionada.getAttribute('data-descripcion');

                        // Elementos donde se mostrarán los detalles
                        const contenedorDetalles = document.getElementById('detalles-contenedor');
                        const imagenElemento = document.getElementById('imagen-menu');
                        const descripcionElemento = document.getElementById('descripcion-menu');

                        // Mostrar la imagen y la descripción
                        if (imagenRuta && descripcionTexto) {
                        imagenElemento.src = 'login/' + imagenRuta; // Ajusta la ruta si es necesario
                        descripcionElemento.textContent = descripcionTexto;
                        contenedorDetalles.style.display = 'block'; // Mostrar el contenedor
                        } else {
                        contenedorDetalles.style.display = 'none'; // Ocultar el contenedor si no hay detalles
                        }
                        }

                        function cerrarDetalles() {
                            const contenedorDetalles = document.getElementById('detalles-contenedor');
                            contenedorDetalles.style.display = 'none'; // Ocultar el contenedor cuando se cierre
                            }
                        </script>



                <div>
                <select name="personal" id="personal" required>
                        <option value="" disabled selected>Seleccione su Personal Adicional</option>
                        <?php
                        // Conexión a la base de datos
                        $conexion = new mysqli("localhost", "root", "", "haciendaxtepen");

                        // Verificar si hubo error en la conexión
                        if ($conexion->connect_error) {
                            die("Error de conexión: " . $conexion->connect_error);
                        }

                        // Consulta para obtener los menús de banquete
                        $consulta = "SELECT id_personal, nombre_personal FROM personal";
                        $resultado = $conexion->query($consulta);

                        // Agregar cada menú de banquete como opción en el select
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo '<option value="'.$fila['id_personal'].'">'.$fila['nombre_personal'].'</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No hay menús disponibles</option>';
                        }

                        // Cerrar la conexión
                        $conexion->close();
                        ?>
                    </select>
                </div>

                <div>
                    <textarea class="inputext" id="mensaje" name="mensaje" rows="4" cols="50" placeholder="Describe los detalles adicionales del evento" required></textarea>
                </div>

                <input type="submit" value="Reservar">
            </form>
        </div>
    </div>

    <script>
    // Obtener los parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);

    let invitados = urlParams.get('invitados');

   
    // Función para llenar el campo de invitados
    function validarCantidadInvitados(input) {
        const valor = parseInt(input.value);
        if (valor > 1000) {
            input.value = 1000; // Limita el valor a 1000
        }
    }

    // Configuración de la fecha mínima
    const fechaEventoInput = document.getElementById('fecha');
    const fechaActual = new Date().toISOString().split('T')[0];
    fechaEventoInput.min = fechaActual;

  
    const invitadosInput = document.getElementById('invitados');

    // Asignar el valor de invitados
    invitadosInput.value = invitados;

 

    </script>

    <?php include "pie_pagina.php"; ?>
</body>
</html>
