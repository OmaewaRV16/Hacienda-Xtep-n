<?php
session_start(); // Asegúrate de iniciar la sesión
require "conexion.php";

// Verificamos si el id del usuario está en la sesión
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Consultamos el usuario en la base de datos por su id
    $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
    $resultado = mysqli_query($conectar, $verusuario);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = $resultado->fetch_array();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID de sesión no encontrado.";
    exit;
}

// Recibimos los datos del formulario
$nombre_completo = addslashes($_POST['nombre_completo']);
$roles = addslashes($_POST['roles']);
$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);

// Configuración de la foto
$rutaEnServidor = 'fotos';
$rutaTemporal = $_FILES['foto']['tmp_name'];
$nombreImagen = $_FILES['foto']['name'];

date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "-" . $nombreImagen;
$rutaDestino = $rutaEnServidor . "/". $nombreimagenunico;

$pesofoto = $_FILES['foto']['size'];
$tipofoto = $_FILES['foto']['type'];

// Validaciones de la foto
if ($pesofoto > 900000) {
    echo '
    <script>
    alert("Es demasiado pesada la foto de perfil");
    window.history.go(-1);
    </script>
    ';
    exit;
}

if ($tipofoto == "image/jpeg" || $tipofoto == "image/png" || $tipofoto == "image/gif" || $tipofoto == "image/jpg" || $nombreImagen == "") {
    move_uploaded_file($rutaTemporal, $rutaDestino);
} else {
    echo '
    <script>
    alert("No es una IMAGEN");
    window.history.go(-1);
    </script>
    ';
    exit;
}

// Encriptamos la contraseña
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

// Verificamos si el usuario ya está registrado
$verficar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE email = '$email'");

if (mysqli_num_rows($verficar_usuario) > 0) {
    echo '
    <script>
        alert("ESTE USUARIO YA ESTA REGISTRADO");
        location.href="alta_usuarios.php?id=' . $id_usuario . '"; // Mantener el ID del usuario en la URL
    </script>
    ';
    exit;
}

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO usuarios (nombre_completo, roles, email, contrasena, fecha_nacimiento, foto) 
             VALUES ('$nombre_completo', '$roles', '$email', '$contrasena_encriptada', '$fecha_nacimiento', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
          alert("SE GUARDARON LOS DATOS CORRECTAMENTE");
          location.href="alta_usuarios.php?id=' . $id_usuario . '"; // Mantener el ID del usuario en la URL
        </script>
    ';
} else {
    echo '
        <script>
          alert("NO SE GUARDO EN LA BASE DE DATOS");
          location.href="alta_usuarios.php?id=' . $id_usuario . '"; // Mantener el ID del usuario en la URL
        </script>
    ';
}
?>

