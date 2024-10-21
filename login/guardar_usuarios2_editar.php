<?php
require "conexion.php";

$id_usuario = $_POST['id_usuario'];
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

$actualizar = "UPDATE usuarios SET nombre_completo = '$nombre_completo', email = '$email', contrasena = '$contrasena_encriptada', fecha_nacimiento = '$fecha_nacimiento', foto = '$rutaDestino' WHERE id_usuario = '$id_usuario'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
        <script>
          alert("SI SE GUARDARO LOS DATOS CORRECTAMENTE");
          location.href="ver.php?id=' . $id_usuario .'";
        </script>
  
      ';
  } else {
    echo '
        <script>
          alert("NO SE GUARDO EN LA BASE DE DATOS");
          location.href="editar_usuario.php?id=' . $id_usuario .'";
        </script>
  
      ';
  }
?>