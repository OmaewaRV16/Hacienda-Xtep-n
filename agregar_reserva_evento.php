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

$nombre = addslashes($_POST['nombre']);
$email = addslashes($_POST['email']);
$telefono = addslashes($_POST['telefono']);
$tipo_evento = addslashes($_POST['evento']);
$fecha = addslashes($_POST['fecha']);
$invitados = addslashes($_POST['invitados']);
$mensaje = addslashes($_POST['mensaje']);

$verificar_fecha = mysqli_query($conectar, 
    "SELECT * FROM reservas_eventos WHERE fecha = '$fecha'");

if (mysqli_num_rows($verificar_fecha) > 0) {
    echo '
    <script>
        alert("Ya existe una reserva para esta fecha. Por favor, selecciona otra.");
        location.href="alta_reservas_eventos.php";
    </script>
    ';
    exit;
}

$insertar = "INSERT INTO reservas_eventos
(nombre, email, telefono, evento, fecha, invitados, mensaje)
VALUES ('$nombre', '$email', '$telefono', '$tipo_evento', '$fecha', '$invitados', '$mensaje')";

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

?>
