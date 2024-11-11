<?php
require "conexion.php";

// Recibimos los datos del formulario
$nombre_promocion = addslashes($_POST['nombre_promocion']);
$descripcion = addslashes($_POST['descripcion']);

// Configuración de la imagen
$rutaEnServidor = 'img_prom';
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
    alert("El tamaño de imagen permitido es de 1 MB");
    window.history.go(-1);
    </script>
    ';
    exit;
}

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Configuración de la imagen
    $rutaEnServidor = 'img_prom';
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
        alert("El tamaño de imagen permitido es de 1 MB");
        window.history.go(-1);
        </script>
        ';
        exit;
    }

    $tiposPermitidos = ["image/jpeg", "image/png", "image/gif", "image/jpg", "image/pjpeg", "image/x-png"];
    $tipofotoServidor = mime_content_type($rutaTemporal);

    if (in_array($tipofoto, $tiposPermitidos) || in_array($tipofotoServidor, $tiposPermitidos)) {
        move_uploaded_file($rutaTemporal, $rutaDestino);
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
    echo '
    <script>
    alert("Error al subir la imagen. Por favor, verifica que el archivo sea válido.");
    window.history.go(-1);
    </script>
    ';
    exit;
}

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO promociones (nombre_promocion, descripcion, imagen) 
             VALUES ('$nombre_promocion', '$descripcion', '$rutaDestino')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
        <script>
          alert("SE GUARDARON LOS DATOS CORRECTAMENTE");
          location.href="dashboard_promociones.php";
        </script>
    ';
} else {
    echo '
        <script>
          alert("NO SE GUARDÓ EN LA BASE DE DATOS");
          location.href="alta_promociones.php";
        </script>
    ';
}
?>
