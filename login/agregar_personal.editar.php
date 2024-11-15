<?php
require "conexion.php";

// Recibimos los datos del formulario
$id_personal = intval($_POST['id_personal']);
$nombre_personal = addslashes($_POST['nombre_personal']);
$descripcion = addslashes($_POST['descripcion']);
$imagen_actual = $_POST['imagen_actual'];

// Configuración de la imagen
$rutaEnServidor = 'img_personal';
$rutaTemporal = $_FILES['fotos']['tmp_name'];
$nombreImagen = $_FILES['fotos']['name'];

date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "-" . $nombreImagen;
$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunico;

$pesofoto = $_FILES['fotos']['size'];
$tipofoto = $_FILES['fotos']['type'];

// Validaciones de la imagen
if (!empty($nombreImagen)) {
    if ($pesofoto > 900000) {
        echo '
        <script>
        alert("El tamaño de imagen permitido es de 1 MB");
        window.history.go(-1);
        </script>
        ';
        exit;
    }

    if ($tipofoto == "image/jpeg" || $tipofoto == "image/png" || $tipofoto == "image/gif" || $tipofoto == "image/jpg") {
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $rutaFinal = $rutaDestino;
    } else {
        echo '
        <script>
        alert("El archivo debe ser una imagen. Tipos permitidos: JPEG, PNG, GIF.");
        window.history.go(-1);
        </script>
        ';
        exit;
    }
} else {
    $rutaFinal = $imagen_actual; // Si no se sube una nueva imagen, se usa la imagen actual
}

// Actualizamos los datos en la base de datos
$update = "UPDATE personal 
           SET nombre_personal = '$nombre_personal', 
               descripcion = '$descripcion', 
               fotos = '$rutaFinal'
           WHERE id_personal = $id_personal";

$query = mysqli_query($conectar, $update);

if ($query) {
    echo '
        <script>
          alert("SE ACTUALIZARON LOS DATOS CORRECTAMENTE");
          location.href="dashboard_personal.php";
        </script>
    ';
} else {
    echo '
        <script>
          alert("NO SE ACTUALIZÓ EN LA BASE DE DATOS");
          location.href="dashboard_personal.php";
        </script>
    ';
}
?>
