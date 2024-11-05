
<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylever.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Ver</title>
</head>
<body>
    <?php include "menu.php"?>
    <div class="container">
        <br>
    <div class="information">
        <h2>Ver Usuario</h2>
        <br>
        <a class="back" href="dashboard_usuarios.php?id=<?php echo $id_usuario; ?>"><i class="fa-solid fa-angles-left"></i></a>


        <?php
        require "conexion.php";
        $id_usuario = $_GET['id'];

        $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conectar, $verusuario);
        $fila = $resultado -> fetch_array();
        ?>

        <div class="contenedor_usuario">
            <h3>Nombre del usuario:</h3>
            <h4><?php echo $fila["nombre_completo"];?></h4>
            <hr>
            <h3>Rol:</h3>
            <h4><?php echo $fila["roles"];?></h4>
            <hr>
            <h3>Email:</h3>
            <h4><?php echo $fila["email"];?></h4>
            <hr>
            <h3>Fecha de nacimiento:</h3>
            <h4><?php echo $fila["fecha_nacimiento"];?></h4>
            <hr>
            <h3>Contraseña:</h3>
            <h4><?php echo $fila["contrasena"];?></h4>
            <hr>
            <br>
            <a href="editar_usuario.php?id=<?php echo $fila['id_usuario']; ?>"><button class="btn2">Editar usuario</button></a>
        </div>
    </div>
</div>
</body>
</html>
