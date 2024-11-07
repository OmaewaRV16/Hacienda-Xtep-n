<?php
require "conexion.php";

// Validar que se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar el ID del menú desde el formulario
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Verificar que el ID sea válido
    if ($id <= 0) {
        echo '<script>alert("ID no válido."); window.location.href="dashboard_banquetes.php";</script>';
        exit;
    }

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
<<<<<<< HEAD
    if ($pesofoto > 1000000) {
        echo '
        <script>
        alert("Es demasiado pesada la imagen del menú,  El tamaño máximo permitido es 1 mb.");
=======
    if ($pesofoto > 900000) {
        echo '
        <script>
        alert("Es demasiado pesada la imagen del menú. El tamaño máximo permitido es 900 KB.");
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
        window.history.go(-1);
        </script>
        ';
        exit;
    }

    // Inicializar el nombre de la imagen
    $imagenActual = $_POST['imagen_actual']; // Obtener el nombre de la imagen actual

    // Comprobar si se subió una nueva imagen
    if (!empty($nombreImagen)) {
        // Comprobar si el tipo de archivo es una imagen válida
        $tiposPermitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");

        if (in_array($tipofoto, $tiposPermitidos)) {
            // Mover la nueva imagen al servidor
            move_uploaded_file($rutaTemporal, $rutaDestino);
            $rutaDestino = $rutaDestino; // Usar la nueva ruta de la imagen
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
        // Si no se subió una nueva imagen, conservar la imagen actual
        $rutaDestino = $imagenActual;
    }

    // Actualizamos los datos en la base de datos
    $actualizar = "UPDATE banquete_menu 
                   SET nombre_menu = '$nombre_menu', descripcion = '$descripcion', imagen = '$rutaDestino' 
                   WHERE id = '$id'";

    $query = mysqli_query($conectar, $actualizar);

    if ($query) {
        echo '
            <script>
              alert("SE ACTUALIZARON LOS DATOS CORRECTAMENTE");
              location.href="dashboard_banquetes.php";
            </script>
        ';
    } else {
        // Mostrar el error de la consulta
        echo '
            <script>
              alert("NO SE ACTUALIZÓ EN LA BASE DE DATOS: ' . mysqli_error($conectar) . '");
              location.href="alta_banquetes.php";
            </script>
        ';
    }
} else {
    echo '<script>alert("Método de solicitud no válido."); window.location.href="dashboard_banquetes.php";</script>';
    exit;
}
?>
