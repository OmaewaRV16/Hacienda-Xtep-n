<?php
require "conexion.php";

// Recibimos los datos del formulario
$id_personal = intval($_POST['id_personal']);
$nombre_personal = addslashes($_POST['nombre_personal']);
$descripcion = addslashes($_POST['descripcion']);

// Actualizamos los datos en la base de datos
$update = "UPDATE personal 
           SET nombre_personal = '$nombre_personal', 
               descripcion = '$descripcion'
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
