<?php
require "seguridad.php";
$usuario = $_SESSION['username']; // Usuario autenticado
require "conexion.php";

// Verificamos si el id_usuario está en la sesión
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
} else {
    echo "ID de sesión no encontrado.";
    exit;
}

require "conexion.php";
$id_usuario = $_SESSION['id_usuario'];

$verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
$resultado = mysqli_query($conectar, $verusuario);
$fila = $resultado -> fetch_array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylenavbar.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Menu</title>
</head>
<body>
    <div class="container">
        <div class="tutorial">
            <ul>
                <div class="left-items">
                    <figure class="logo-left">
                        <img src="imagenes/xtepen-logo-750.gif" alt="">
                    </figure>
                    <li><a href="panel_administrativo.php">Inicio</a></li>
                    <li><a href="dashboard_usuarios.php">Usuarios<i class="fa fa-angle-down"></i>
                        <ul>
                            <li><a href="alta_usuarios.php">Alta Usuarios</a></li>
                        </ul>
                    </li>
                    <li><a href="dashboard_eventos.php">Eventos<i class="fa fa-angle-down"></i>
                        <ul>
                            <li><a href="alta_eventos.php">Alta Eventos</a></li>
                        </ul>
                    </li>
                </div>
                <div class="right-items">
                <img class="ppic" src="<?php echo $fila["foto"]; ?>" alt="">
                    <li class="usuarioh4"><h4 class="usuarioh4"><?php echo $usuario; ?>
                </li>
                    <li><a href="salir.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                </div>
            </ul>
        </div>
    </div>
</body>
</html>

