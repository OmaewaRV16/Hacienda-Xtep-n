<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_GET['id']; // Asegúrate de pasar el ID en la URL
    $nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
    $email = mysqli_real_escape_string($conectar, $_POST['email']);
    $telefono = mysqli_real_escape_string($conectar, $_POST['telefono']);
    $tipo_evento = mysqli_real_escape_string($conectar, $_POST['tipo_evento']);
    $fecha = mysqli_real_escape_string($conectar, $_POST['fecha']);
    $invitados = mysqli_real_escape_string($conectar, $_POST['invitados']);
    $ceremonia_presentacion = mysqli_real_escape_string($conectar, $_POST['ceremonia_presentacion']);
    $banquete = mysqli_real_escape_string($conectar, $_POST['banquete']);
    $bebidas = mysqli_real_escape_string($conectar, $_POST['bebidas']);
    $musica_vivo = mysqli_real_escape_string($conectar, $_POST['musica_vivo']);
    $show_vivo = mysqli_real_escape_string($conectar, $_POST['show_vivo']);
    $fotografo = mysqli_real_escape_string($conectar, $_POST['fotografo']);
    $mensaje = mysqli_real_escape_string($conectar, $_POST['mensaje']);

    // Preparar la consulta de actualización
    $actualizarEvento = "UPDATE reservas_eventos SET 
        nombre = '$nombre',
        email = '$email',
        telefono = '$telefono',
        fecha_evento = '$fecha',
        numero_invitados = '$invitados',
        tipo_evento = '$tipo_evento',
        ceremonia_presentacion = '$ceremonia_presentacion',
        banquete = '$banquete',
        bebidas = '$bebidas',
        musica_vivo = '$musica_vivo',
        show_vivo = '$show_vivo',
        fotografo = '$fotografo',
        mensaje = '$mensaje'
        WHERE id = '$id'";

    // Ejecutar la consulta
    if (mysqli_query($conectar, $actualizarEvento)) {
        // Redirigir a la página de confirmación o dashboard
        header("Location: dashboard_eventos.php?mensaje=Evento actualizado correctamente");
        exit();
    } else {
        echo "Error al actualizar el evento: " . mysqli_error($conectar);
    }
} else {
    // Si no se ha enviado el formulario, redirigir
    header("Location: dashboard_eventos.php");
    exit();
}

// Cerrar la conexión
mysqli_close($conectar);
?>
