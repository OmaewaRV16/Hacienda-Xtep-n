<?php
include("conectar.php");
$nombre = 'NULL';
//-----------------------------------------------------------------------
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $busqueda = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($enlace, $busqueda);
    while ($filas = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $nombre = $filas['nombre_completo'];
    }
} else {
    echo "No se proporcionó un correo electrónico.";
}
?>
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
            <h2>Cambia tu contraseña</h2>
            <br>
            <form action="cd.php" method="post">
                <p class="text2">Hola <strong><?php echo htmlspecialchars($nombre); ?></strong>, ingresa tu código y la nueva contraseña para cambiarla</p><br>
                
                <p class="le">Código de verificación</p>
                <input class="cam1" type="text" placeholder="123456" id="code" name="code" required>
                <br><br>
                
                <p class="le">Contraseña:</p>
                <input class="cam1" type="password" placeholder="example123456" id="contraseña" name="contraseña" required>
                <br><br>
                
                <input class="envi" type="submit" value="Cambiar">
            </form>
        </div>
    </div>
</body>
</html>
