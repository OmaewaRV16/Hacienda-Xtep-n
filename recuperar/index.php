<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvide mi contraseña</title>
    <link rel="stylesheet" href="estilo.css">
    <meta name="description" content="Cambiar la contraseña">
</head>
<body>
<div class="fondo">
        <p class="text"><a href="/HaciendaXtepen"><img src="imagenes/logo.gif" alt="logo"></a><span class="center">Hacienda Xtepen</span></p>
        <br><br><br><br>
        <div class="acceso">
            <h2>RECUPERA TU CUENTA</h2>
            <br>
            <form action="enviar.php" method="post">
                <p class="text2">Ingresa tu correo electronico para cambiar tu contraseña</p><br>

                <input class="cam1" type="email" placeholder="Correo electrónico" id="email" name="email" required>
                <br><br>
                <a class="regresar" href="/HaciendaXtepen/login/">Cancelar</a>
                <input class="envi" type="submit" value="Enviar">

                
        </div>

    </div>


</form>
</body>
</html>
