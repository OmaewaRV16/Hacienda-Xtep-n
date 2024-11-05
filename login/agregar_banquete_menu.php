<?php
require "conexion.php";

// Recibimos los datos del formulario
$nombre_menu = addslashes($_POST['nombre_menu']);
$descripcion = addslashes($_POST['descripcion']);

// Configuración de la imagen
$rutaEnServidor = 'images';
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];

date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "-" . $nombreImagen;
$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunico;

$pesofoto = $_FILES['imagen']['size'];
$tipofoto = $_FILES['imagen']['type'];

// Validaciones de la imagen
if ($pesofoto > 900000) {
    echo '
    <script>
<<<<<<< HEAD
    alert("El tamaño de imagen permitido es de 1 mb");
=======
    alert("Es demasiado pesada la imagen del menú");
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
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
<<<<<<< HEAD
    alert("El archivo debe ser una imagen. Tipos permitidos: JPEG, PNG, GIF.");
=======
    alert("El archivo no es una imagen");
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
    window.history.go(-1);
    </script>
    ';
    exit;
}

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO banquete_menu (nombre_menu, descripcion, imagen) 
             VALUES ('$nombre_menu', '$descripcion', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
          alert("SE GUARDARON LOS DATOS CORRECTAMENTE");
          location.href="dashboard_banquetes.php";
        </script>
    ';
} else {
    echo '
        <script>
          alert("NO SE GUARDÓ EN LA BASE DE DATOS");
          location.href="alta_banquetes.php";
        </script>
    ';
}
?>
