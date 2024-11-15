<?php
require "conexion.php";
require "seguridad.php";

$nombre = addslashes($_POST['nombre']);
$email = addslashes($_POST['email']);
$telefono = addslashes($_POST['telefono']);
$tipo_evento = addslashes($_POST['evento']);
$fecha = addslashes($_POST['fecha']);
$invitados = addslashes($_POST['invitados']);
$mensaje = addslashes($_POST['mensaje']);
$menu_banquete = addslashes($_POST['menu_banquete']);
$personal = addslashes($_POST['personal']); // Capturamos el personal seleccionado

// Verificar si ya existe una reserva para la misma fecha
$verificar_fecha = mysqli_query($conectar, 
    "SELECT * FROM reservas_eventos WHERE fecha = '$fecha'");

if (mysqli_num_rows($verificar_fecha) > 0) {
    echo '
    <script>
        alert("Ya existe una reserva para esta fecha. Por favor, selecciona otra.");
        location.href="alta_eventos.php";
    </script>
    ';
    exit;
}

// Insertar los datos en la base de datos, incluyendo el personal seleccionado
$insertar = "INSERT INTO reservas_eventos
(nombre, email, telefono, evento, fecha, invitados, mensaje, menu_banquete, personal)
VALUES ('$nombre', '$email', '$telefono', '$tipo_evento', '$fecha', '$invitados', '$mensaje', '$menu_banquete', '$personal')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("LA RESERVA SE GUARDÓ CORRECTAMENTE");
        location.href="dashboard_eventos.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("NO SE PUDO GUARDAR LA RESERVA");
        location.href="alta_eventos.php";
    </script>
    ';
}
?>
