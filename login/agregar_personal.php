<?php
require "conexion.php";

// Recibimos los datos del formulario
$nombre_personal = addslashes($_POST['nombre_personal']);
$descripcion = addslashes($_POST['descripcion']);

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO personal (nombre_personal, descripcion) 
             VALUES ('$nombre_personal', '$descripcion')";

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
