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
                <p class="text3">Rebiras en tu <span class="azul">correo electrónico</span>,se ha enviado tu <span class="rojo">codigo de verificación</span> y <span class="rojo">enlace</span> para cambiar la contraseña de tu cuenta</p><br>
                <br><br>
                <a class="regresar" href="/HaciendaXtepen/login/">Regresar</a>
        </div>
    </div>

    <?php
include("conectar.php");
$code=rand(100000, 999999);
$email = $_POST['email'];
$consulta = "SELECT * FROM usuarios WHERE email='$email'";
$busqueda= mysqli_query($enlace,$consulta);
while ($filas = $busqueda->fetch_array(MYSQLI_ASSOC)) {
$nombre_completo = $filas['nombre_completo'];
}
//-----------------------------------------------------------------------
//Base BD
if(strlen($_POST['email'])>=1){
    $asignar = "UPDATE usuarios SET ACC='$code' WHERE email='$email'";
    $busqueda = mysqli_query($enlace,$asignar);
   }else {
    echo "favor de introducir datos, todos los campos son obligatorios";
   }


//-----------------------------------------------------------------------

//Correo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = 'https://script.google.com/macros/s/AKfycbx6RgaQ6M8mkfOxtmfh2f8dCpxAFT2erwyjfqxWPan9nwnmEPhgQ_oeRDUWQ81JGpsB/exec';
    $data = array('email' => $email,'code' => $code, 'nombre_completo' => $nombre_completo);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Hubo un error al enviar el correo.";
    } else {
        echo "Correo enviado correctamente.";
    }
}
?>
</body>
</html>
