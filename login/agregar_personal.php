<?php
require "conexion.php";

// Recibimos los datos del formulario
$nombre_personal = addslashes($_POST['nombre_personal']);
$descripcion = addslashes($_POST['descripcion']);

// Configuración de la imagen
$rutaEnServidor = 'img_personal';
$rutaTemporal = $_FILES['fotos']['tmp_name'];
$nombreImagen = $_FILES['fotos']['name'];

date_default_timezone_set('UTC');
$nombreimagenunico = date('Y-m-d-h-i-s') . "-" . $nombreImagen;
$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunico;

$pesofoto = $_FILES['fotos']['size'];
$tipofoto = $_FILES['fotos']['type'];

// Validar tipo de archivo
if (!in_array($tipofoto, ["image/jpeg", "image/png","image/jpg"])) {
    echo '
    <script>
    alert("El archivo no es un tipo de imagen permitido. Solo se aceptan imágenes en formato JPG, JPEG y PNG.");
    window.history.go(-1);
    </script>
    ';
    exit;
}

// Validar tamaño del archivo
if ($pesofoto > 900000) {
    echo '
    <script>
    alert("El tamaño de imagen permitido es de 1 MB.");
    window.history.go(-1);
    </script>
    ';
    exit;
}

// Mover el archivo al servidor
move_uploaded_file($rutaTemporal, $rutaDestino);

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO personal (nombre_personal, descripcion, fotos) 
             VALUES ('$nombre_personal', '$descripcion', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
          alert("SE GUARDARON LOS DATOS CORRECTAMENTE");
          location.href="dashboard_personal.php";
        </script>
    ';
} else {
    echo '
        <script>
          alert("NO SE GUARDÓ EN LA BASE DE DATOS");
          location.href="alta_personal.php";
        </script>
    ';
}
?>
