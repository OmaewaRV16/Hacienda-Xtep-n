<?php
require "conexion.php";

// Recibimos los datos del formulario
$nombre_promocion = addslashes($_POST['nombre_promocion']);
$menu_banquete = addslashes($_POST['menu_banquete']); // Ahora será el nombre del menú
$tipo_evento = addslashes($_POST['tipo_evento']);
$invitados = intval($_POST['invitados']);
$personal_adicional = addslashes($_POST['personal_adicional']); // Personal adicional
$descripcion = addslashes($_POST['descripcion']);

// Configuración de la imagen
$rutaEnServidor = 'img_prom';
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nombreImagen = $_FILES['imagen']['name'];
$nombreimagenunico = date('Y-m-d-h-i-s') . "-" . $nombreImagen;
$rutaDestino = $rutaEnServidor . "/" . $nombreimagenunico;

// Validaciones de la imagen
$pesofoto = $_FILES['imagen']['size'];
$tipofoto = $_FILES['imagen']['type'];

if ($pesofoto > 1048576) { // Máximo 1 MB
    echo '
    <script>
    alert("El tamaño de imagen permitido es de 1 MB");
    window.history.go(-1);
    </script>
    ';
    exit;
}

$tiposPermitidos = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
if (!in_array($tipofoto, $tiposPermitidos)) {
    echo '
    <script>
    alert("El archivo debe ser una imagen. Tipos permitidos: JPEG, PNG, GIF.");
    window.history.go(-1);
    </script>
    ';
    exit;
}

// Movemos la imagen al servidor
if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
    // Insertamos los datos en la base de datos
    $insertar = "INSERT INTO promociones (nombre_promocion, menu_banquete, tipo_evento, invitados, personal, descripcion, imagen) 
                 VALUES ('$nombre_promocion', '$menu_banquete', '$tipo_evento', $invitados, '$personal_adicional', '$descripcion', '$rutaDestino')";

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
              alert("NO SE GUARDÓ EN LA BASE DE DATOS: ' . mysqli_error($conectar) . '");
              window.history.go(-1);
            </script>
        ';
    }
} else {
    echo '
    <script>
    alert("Error al mover la imagen al servidor.");
    window.history.go(-1);
    </script>
    ';
    exit;
}
?>
