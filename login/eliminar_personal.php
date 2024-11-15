<?php
include "conexion.php";

$id = $_GET["id"];

$consulta = "DELETE FROM personal WHERE id_personal = '$id   ' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado esta promocion de manera correcta");
    location.href = "dashboard_personal.php";
    </script>
    ';
}
?>