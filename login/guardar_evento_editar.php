<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_GET['id']; // Asegúrate de pasar el ID en la URL
    $nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
    $email = mysqli_real_escape_string($conectar, $_POST['email']);
    $telefono = mysqli_real_escape_string($conectar, $_POST['telefono']);
    $evento = mysqli_real_escape_string($conectar, $_POST['evento']);
    $fecha = mysqli_real_escape_string($conectar, $_POST['fecha']);
    $invitados = mysqli_real_escape_string($conectar, $_POST['invitados']);
    $mensaje = mysqli_real_escape_string($conectar, $_POST['mensaje']);
    $menu_banquete = mysqli_real_escape_string($conectar, $_POST['menu_banquete']); // Captura el menú seleccionado
    $estado = mysqli_real_escape_string($conectar, $_POST['estado']); // Captura el estado del evento

    // Verificar si la fecha ya está registrada (exceptuando el evento actual)
    $verificar_fecha = mysqli_query($conectar, 
    "SELECT * FROM reservas_eventos WHERE fecha = '$fecha' AND id != '$id'");

    if (mysqli_num_rows($verificar_fecha) > 0) {
        // Si la fecha ya está registrada, mostrar un mensaje de advertencia con JavaScript
        echo "<script>
                alert('Error: La fecha seleccionada ya está ocupada para otro evento. Por favor, elige otra fecha.');
                window.history.back(); // Volver a la página anterior
              </script>";
        exit(); // Detener el procesamiento del formulario
    } else {
        // Preparar la consulta de actualización
        // Preparar la consulta de actualización
        $actualizarEvento = "UPDATE reservas_eventos SET 
        nombre = '$nombre',
        email = '$email',
        telefono = '$telefono',
        fecha = '$fecha',
        invitados = '$invitados',
        evento = '$evento',
        mensaje = '$mensaje',
        menu_banquete = '$menu_banquete',
        estado = '$estado' 
        WHERE id = '$id'";


        // Ejecutar la consulta
        if (mysqli_query($conectar, $actualizarEvento)) {
            // Redirigir a la página de confirmación o dashboard
            header("Location: dashboard_eventos.php?mensaje=Evento actualizado correctamente");
            exit();
        } else {
            echo "Error al actualizar el evento: " . mysqli_error($conectar);
        }
    }
} else {
    // Si no se ha enviado el formulario, redirigir
    header("Location: dashboard_eventos.php");
    exit();
}

// Cerrar la conexión
mysqli_close($conectar);
?>
