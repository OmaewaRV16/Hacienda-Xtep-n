<?php
include "conexion.php";

$id = $_GET["id"];

$consulta = "DELETE FROM reservas_eventos WHERE id = '$id   ' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado tu usuario de manera correcta");
    location.href = "dashboard_eventos.php";
    </script>
    ';
}
?>