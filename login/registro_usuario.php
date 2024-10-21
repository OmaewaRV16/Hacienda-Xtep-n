<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleadduser.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="contimg">
        <a href="index.php"><img src="imagenes/tecnm.png" alt=""></a>
    </div>
    <div class="contenedorfrm">
        <form class="form" action="guardar_usuarios.php" method="post" enctype="multipart/form-data">
            <h1>Registro de Usuarios</h1><br><br>
            <input class="inputext" type="text" name="nombre_completo" placeholder="Nombre Completo" required>
            <br>
            <select class="inputext" name="roles" id="roles" required>
                <option value="" disabled selected>Rol</option>
                <option value="administrador">Administrador</option>
                <option value="empleado">Empleado</option>
                <option value="cliente">Cliente</option>
            </select>
            <br>
            <input class="inputext" type="email" name="email" placeholder="Correo electrónico" required>
            <br>
            <input class="inputext" type="password" name="contrasena" placeholder="Contraseña" required>
            <br>
            <div class="date">
                <p>Fecha de nacimiento:</p>
                <br><br>
                <input class="inputextdt" type="date" name="fecha_nacimiento" required>
                <p>Subir foto de perfil:</p>
                <input class="inputextdt" type="file" name="foto" id="foto" required>
            </div>
            <br>
            <button class="buttonsbmt" type="submit">Registrarse <i class="fa-solid fa-user"></i></button>
            <br><br>
            <a href="/HaciendaXtepen/login"><i class="fa-solid fa-angles-left"></i> Regresar</a>
        </form>
    </div>
</body>
</html>
