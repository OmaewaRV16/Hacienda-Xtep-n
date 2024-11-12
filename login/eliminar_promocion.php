<?php
include "conexion.php";

$id = $_GET["id"];

$consulta = "DELETE FROM promociones WHERE id_promocion = '$id   ' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado esta promocion de manera correcta");
    location.href = "dashboard_promociones.php";
    </script>
    ';
}
?>