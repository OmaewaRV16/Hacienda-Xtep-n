<?php
require "seguridad.php"; // Verifica la sesión y que el usuario esté autenticado

// Verificamos si el id_usuario está en la sesión
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
} else {
    echo "ID de sesión no encontrado.";
    exit;
}

require "conexion.php";

// Consultamos los datos del usuario por su id
$verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
$resultado = mysqli_query($conectar, $verusuario);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = $resultado->fetch_array();
} else {
    echo "Usuario no encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleuserup.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Alta de Usuarios</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <br><br>
    <div class="information">
        <div class="formulario">
            <form class="form" action="guardar_usuarios_panel.php" method="post" enctype="multipart/form-data">
                <h1>Registro de Usuarios</h1>
                <br>
                <input class="inputext" type="text" name="nombre_completo" placeholder="Nombre Completo" required>
                <input class="inputext" type="email" name="email" placeholder="Correo electrónico" required>
                <input class="inputext" type="password" name="contrasena" placeholder="Contraseña" required>
                <div class="date">
                    <p>Fecha de nacimiento:</p>
                    <input class="inputextdt" type="date" name="fecha_nacimiento" required>
                </div>
                <div class="pic">
                    <p>Subir foto de perfil:</p>
                    <input class="inputextpic" type="file" name="foto" id="foto" required>
                </div>
                <select class="inputext" name="roles" id="roles" required>
                    <option value="" disabled selected>Rol</option>
                    <option value="administrador">Administrador</option>
                    <option value="cliente">Cliente</option>
                </select>
                <button class="buttonsbmt" type="submit">Registrar <i class="fa-solid fa-user"></i></button> <br>
                <a class="back" href="dashboard_usuarios.php"><i class="fa-solid fa-angles-left"></i></a>
            </form>
        </div>
    </div>
</body>
</html>
