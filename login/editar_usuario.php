<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesedtvr.css">
    <title>Registrar Usuarios</title>
</head>
<body>
<div class="container">
    <?php include "menu.php"?>
    <br><br>

    <div class="information">
        <br>
        <h2>Editar Usuario</h2>
        <br>
        <a href="dashboard_usuarios.php"><button class="btn2">Regresar</button></a>

        <?php
        require "conexion.php";
        $id_usuario = $_GET['id'];

        $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conectar, $verusuario);
        $fila = $resultado -> fetch_array();
        ?>

        <br><br>

        <div class="formulario">
        <form action="guardar_usuarios2_editar.php" method="post" enctype="multipart/form-data">
            <br>
            <input type="text" name="nombre_completo" placeholder="Nombre" required value="<?php echo $fila["nombre_completo"]?>">
            <br><br>
            <select class="inputext" name="roles" id="roles" required>
                <option value="" disabled selected>Rol</option>
                <option value="administrador">Administrador</option>
                <option value="empleado">Empleado</option>
                <option value="cliente">Cliente</option>
            </select>
            <br><br>
            <input type="email" placeholder="Correo electrónico" required value="<?php echo $fila["email"]?>" disabled>
            <br><br>
            <input type="password" name="contrasena" placeholder="Contraseña" required value="<?php echo $fila["contrasena"]?>">
            <br><br>
            <div class="date">
                <p>Fecha de nacimiento:</p><br>
                <input type="date" name="fecha_nacimiento" required value="<?php echo $fila["fecha_nacimiento"]?>">
                <p>Subir foto de perfil:</p>
                <input class="inputextdt" type="file" name="foto" id="foto">
            </div>
            <br><br>
            <input type="hidden" name="id_usuario" value="<?php echo $fila["id_usuario"]?>">
            <input type="hidden" name="email" value="<?php echo $fila["email"]?>">

            <button class="btn2" type="submit">Editar</button>
            <br><br>
        </form>
        </div>
</div>
</body>
</html>