<?php

$host = "localhost";
$user = "root";
$contrasena = "";
$bd = "haciendaxtepen";

$conectar = mysqli_connect($host, $user, $contrasena, $bd);

if (!$conectar) {
    echo "No se pudo conectar a la base de datos";
    exit;
}

// Verificar el token en la URL
$token_valido = '123456'; // Token que debe coincidir

if (!isset($_GET['token']) || $_GET['token'] !== $token_valido) {
    echo '<script>
        alert("Acceso no autorizado.");
        location.href="index.php";
    </script>';
    exit;
}

// Verificación del campo oculto
if ($_POST['auth_code'] !== 'codigo_secreto') {
    echo '<script>
        alert("Acceso no autorizado.");
        location.href="index.php";
    </script>';
    exit;
}

// Recibir los datos del formulario
$nombre = addslashes($_POST['nombre']);
$email = addslashes($_POST['email']);
$telefono = addslashes($_POST['telefono']);
$tipo_evento = addslashes($_POST['evento']);
$evento = $_POST['evento'];
$mensaje = $_POST['mensaje'];
$fecha = addslashes($_POST['fecha']);
$invitados = addslashes($_POST['invitados']);
$mensaje = addslashes($_POST['mensaje']);
$menu_banquete = addslashes($_POST['menu_banquete']);  // Nuevo campo para el menú de banquete
$personal = addslashes($_POST['personal']);

// Verificar si ya existe una reserva para la misma fecha
$verificar_fecha = mysqli_query($conectar, "SELECT * FROM reservas_eventos WHERE fecha = '$fecha'");

if (mysqli_num_rows($verificar_fecha) > 0) {
    $queryString = http_build_query($_POST); // Serializa todos los datos del formulario
    echo "
    <script>
        alert('Ya existe una reserva para esta fecha. Por favor, selecciona otra.');
        location.href='alta_reservas_eventos.php?$queryString';
    </script>
    ";
    exit;
}


// Verificar si el menu_banquete existe en la tabla banquete_menu
$verificar_menu = mysqli_query($conectar, "SELECT id FROM banquete_menu WHERE id = '$menu_banquete'");

if (mysqli_num_rows($verificar_menu) == 0) {
    echo '
    <script>
        alert("El menú seleccionado no existe. Por favor, selecciona un menú válido.");
        location.href="alta_reservas_eventos.php";
    </script>
    ';
    exit;
}

// Verificar si el menu_banquete existe en la tabla banquete_menu
$verificar_personal = mysqli_query($conectar, "SELECT id_personal FROM personal WHERE id_personal = '$personal'");

if (mysqli_num_rows($verificar_personal) == 0) {
    echo '
    <script>
        alert("El menú seleccionado no existe. Por favor, selecciona un menú válido.");
        location.href="alta_reservas_eventos.php";
    </script>
    ';
    exit;
}

// Insertar los datos en la base de datos
$insertar = "INSERT INTO reservas_eventos (nombre, email, telefono, evento, fecha, invitados, mensaje, menu_banquete, personal) 
VALUES ('$nombre', '$email', '$telefono', '$tipo_evento', '$fecha', '$invitados', '$mensaje', '$menu_banquete', '$personal')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
            alert("LA RESERVA SE GUARDÓ CORRECTAMENTE");
            location.href="index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("NO SE PUDO GUARDAR LA RESERVA");
            location.href="alta_reservas_eventos.php";
        </script>
    ';
}

// Enviar correo (opcional)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = 'https://script.google.com/macros/s/AKfycbwevdSQ-zuTImAnojMbB82HhLgScPp8dGQWYZ9rQOeptMA_s0wXOctSgiSrR-Z8lFmwgQ/exec';
    $data = array('email' => $email, 'fecha' => $fecha, 'nombre' => $nombre, 'telefono' =>$telefono, 'evento' => $evento, 'invitados' => $invitados, 'mensaje' => $mensaje);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Hubo un error al enviar el correo.";
    } else {
        echo "Correo enviado correctamente.";
    }
}

?>
