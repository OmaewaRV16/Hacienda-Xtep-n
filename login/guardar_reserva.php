<?php
require "conexion.php";

$nombre = addslashes($_POST['nombre']);
$email = addslashes($_POST['email']);
$telefono = addslashes($_POST['telefono']);
$fecha_llegada = addslashes($_POST['fecha_llegada']);
$fecha_salida = addslashes($_POST['fecha_salida']);
$personas = addslashes($_POST['personas']);
$comentarios = addslashes($_POST['comentarios']);

$verificar_fechas = mysqli_query($conectar, 
    "SELECT * FROM reservas 
     WHERE (fecha_llegada <= '$fecha_salida' AND fecha_salida >= '$fecha_llegada')");

if (mysqli_num_rows($verificar_fechas) > 0) {
    echo '
    <script>
        alert("Ya existe una reserva en este rango de fechas. Por favor, selecciona otras fechas.");
        location.href="alta_reservas.php";
    </script>
    ';
    exit;
}

$insertar = "INSERT INTO reservas (nombre, email, telefono, fecha_llegada, fecha_salida, personas, comentarios) VALUES ('$nombre', '$email', '$telefono', '$fecha_llegada', '$fecha_salida', '$personas', '$comentarios')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("LA RESERVA SE GUARDÓ CORRECTAMENTE");
        location.href="dashboard_reservas.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("NO SE PUDO GUARDAR LA RESERVA");
        location.href="alta_reservas.php";
    </script>
    ';
}
?>
