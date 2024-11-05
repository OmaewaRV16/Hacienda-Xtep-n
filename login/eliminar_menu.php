<?php
include "conexion.php";

$id = $_GET["id"];

$consulta = "DELETE FROM banquete_menu WHERE id = '$id   ' ";
$resultado = mysqli_query($conectar, $consulta);
if ($resultado) {
    echo '
    <script>
    alert("Se ha eliminado de manera correcta");
    location.href = "dashboard_banquetes.php";
    </script>
    ';
}
?>