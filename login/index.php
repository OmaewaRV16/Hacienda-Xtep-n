<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylelogin.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <div class="contenedorfrm">
    <form class="form" action="autentificar.php" method="post">
        <figure class="logo">
            <img src="imagenes/xtepen-logo-750.gif" alt="">
        </figure>
        <h2>Iniciar Sesion</h2>
        <?php
            $errorusuario = isset($_GET['errorusuario']);
            if ($errorusuario == "SI") {
                echo '<div class="error-container">';
                echo '<h3 class="avisoerror">Datos Incorrectos</h3>';
                echo '</div>';
            }
            ?>
        <input class="inputext" type="email" id="email" name="email" placeholder="Correo electrónico" required><br>
        <input class="inputext" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required><br>
        <button class="buttonsbmt" type="submit">Iniciar sesión <i class="fa-solid fa-right-to-bracket"></i></button>
        <br>
        <a href="/HaciendaXtepen/recuperar">Olvide mi contraseña</a>
        <br>
        <a class="return" href="/HaciendaXtepen"><i class="fa-solid fa-angles-left"></i></a>
        <br>
    </form>
</div>
</body>
</html>