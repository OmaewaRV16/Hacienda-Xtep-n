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
            <form action="agregar_reserva_evento.php?token=123456" method="post">
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
                    <span>Seleccione fecha de reserva: </span><input type="date" name="fecha" id="fecha" required>
                    <input type="number" name="invitados" id="invitados" required min="1" max="9999" maxlength="4" placeholder="Cantidad de invitados">
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

    <?php include "pie_pagina.php"; ?>
</body>
</html>

<!-- <?php
// Configuración de la conexión
$host = "localhost";
$user = "root";
$contrasena = "";
$bd = "haciendaxtepen";

// Conexión a la base de datos
$conectar = mysqli_connect($host, $user, $contrasena, $bd);

// Verificar la conexión
if (!$conectar) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Manejo de la inserción de reserva
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $evento = $_POST['evento'];
    $fecha = $_POST['fecha'];
    $invitados = $_POST['invitados'];
    $mensaje = $_POST['mensaje'];
    $menuSeleccionado = $_POST['menu-select']; // Menú seleccionado

    // Preparar la consulta SQL para insertar en la tabla reserva_eventos
    $query = "INSERT INTO reservas_eventos (nombre, email, telefono, evento, fecha, invitados, mensaje, menu) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Usar una declaración preparada para evitar inyecciones SQL
    $stmt = $conectar->prepare($query);
    $stmt->bind_param("ssssisss", $nombre, $email, $telefono, $evento, $fecha, $invitados, $mensaje, $menuSeleccionado);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script>alert('Reserva realizada con éxito.');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Cerrar la declaración
    $stmt->close();
}
?>

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
            <form action="" method="post">
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
                    <span>Seleccione fecha de reserva: </span><input type="date" name="fecha" id="fecha" required>
                    <input type="number" name="invitados" id="invitados" required min="1" max="9999" maxlength="4" placeholder="Cantidad de invitados">
                    <!-- Select para menú dinámico -->
                    <select id="menu-select" name="menu-select" required>
                        <option value="">Seleccione un menú</option>
                        <?php
                            // Consulta para obtener los nombres de menú
                            $query = "SELECT nombre_menu FROM banquete_menu";
                            $result = $conectar->query($query);

                            if ($result && $result->num_rows > 0) {
                                // Generar opciones de menú
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row['nombre_menu']) . "'>" . htmlspecialchars($row['nombre_menu']) . "</option>";
                                }
                            } else {
                                echo "<option value=''>No hay menús disponibles</option>";
                            }
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

    <?php include "pie_pagina.php"; ?>
</body>
</html> -->
