<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_promocion = $_GET['id'];
    $nombre_promocion = mysqli_real_escape_string($conectar, $_POST['nombre_promocion']);
    $menu_banquete = intval($_POST['menu_banquete']); // Ahora es el ID del menú
    $tipo_evento = mysqli_real_escape_string($conectar, $_POST['tipo_evento']);
    $invitados = intval($_POST['invitados']);
    $personal_adicional = intval($_POST['personal_adicional']); // Ahora es el ID del personal
    $descripcion = mysqli_real_escape_string($conectar, $_POST['descripcion']);
    $imagen = ''; // Variable para guardar la ruta de la imagen

    // Consulta para obtener el registro actual y conservar la imagen si no se carga una nueva
    $consultaActual = "SELECT imagen FROM promociones WHERE id_promocion = '$id_promocion'";
    $resultadoActual = mysqli_query($conectar, $consultaActual);
    $registroActual = mysqli_fetch_assoc($resultadoActual);
    $imagen = $registroActual['imagen']; // Ruta de la imagen actual

    // Verificar si se ha subido una nueva imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorioDestino = "fotos/"; // Carpeta donde se guardarán las imágenes
        $nombreArchivo = uniqid() . "_" . basename($_FILES['imagen']['name']);
        $rutaArchivo = $directorioDestino . $nombreArchivo;

        // Validar el tipo de archivo
        $tipoArchivo = mime_content_type($_FILES['imagen']['tmp_name']);
        $tiposPermitidos = ["image/jpeg", "image/png", "image/gif", "image/jpg"];
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            echo "Error: El archivo debe ser una imagen válida (JPEG, PNG, GIF).";
            exit;
        }

        // Validar el tamaño del archivo (máximo 2 MB)
        $tamañoArchivo = $_FILES['imagen']['size'];
        if ($tamañoArchivo > 2 * 1024 * 1024) { // 2MB
            echo "Error: El tamaño de la imagen no debe superar los 2 MB.";
            exit;
        }

        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaArchivo)) {
            $imagen = $rutaArchivo;
            // Eliminar la imagen anterior si existe y es diferente de la nueva imagen
            if ($registroActual['imagen'] && file_exists($registroActual['imagen'])) {
                unlink($registroActual['imagen']);
            }
        } else {
            echo "Error al subir la imagen.";
            exit;
        }
    }

    // Preparar la consulta de actualización
    $actualizarPromocion = "UPDATE promociones SET 
        nombre_promocion = '$nombre_promocion',
        menu_banquete = $menu_banquete,
        tipo_evento = '$tipo_evento',
        invitados = $invitados,
        personal = $personal_adicional,
        descripcion = '$descripcion',
        imagen = '$imagen'
        WHERE id_promocion = '$id_promocion'";

    // Ejecutar la consulta
    if (mysqli_query($conectar, $actualizarPromocion)) {
        header("Location: dashboard_promociones.php?mensaje=Promoción actualizada correctamente");
        exit();
    } else {
        echo "Error al actualizar la promoción: " . mysqli_error($conectar);
    }
} else {
    header("Location: dashboard_promociones.php");
    exit();
}

mysqli_close($conectar);
?>
