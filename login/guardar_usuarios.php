<?php

require "conexion.php";

$nombre_completo = addslashes($_POST['nombre_completo']);
$roles = addslashes($_POST['roles']);
$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);

$rutaEnServidor = 'fotos';
$rutaTemporal = $_FILES['foto']['tmp_name'];
$nombreImagen = $_FILES['foto']['name'];


date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "-" . $nombreImagen;

$rutaDestino = $rutaEnServidor . "/". $nombreimagenunico;

$pesofoto = $_FILES['foto']['size'];
$tipofoto = $_FILES['foto']['type'];

if ($pesofoto > 900000) {
    echo '
    <script>
    alert("Es demasiado pesada la foto de perfil");
    window.history.go(-1);
    </script>
    ';
    exit;
    }
    
    if ($tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif" or $tipofoto == "image/jpg" or $nombreImagen == "") {
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

$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$verficar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE email = '$email' ");

if (mysqli_num_rows($verficar_usuario) > 0) {
  echo '
  <script>
    alert("ESTE USUARIO YA ESTA REGISTRADO");
    location.href="registro_usuario.php";
  </script>

';
  exit;
}

$insertar = "INSERT INTO usuarios (nombre_completo, roles, email, contrasena, fecha_nacimiento, foto) VALUES ('$nombre_completo', '$roles', '$email', '$contrasena_encriptada', '$fecha_nacimiento', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
          alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
          location.href="index.php";
        </script>
  
      ';
  } else {
    echo '
        <script>
          alert("NO SE GUARDO EN LA BASE DE DATOS");
          location.href="registro_usuario.php";
        </script>
  
      ';
  }


?>

