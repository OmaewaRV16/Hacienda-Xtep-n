
    <?php
include("conectar.php");

$code = $_POST['code'];
$contraseña = $_POST['contraseña'];

// Encriptar la contraseña
$contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

// Actualizar la base de datos con la contraseña encriptada
$asignar = "UPDATE usuarios SET CONTRASENA = '$contraseña_encriptada', ACC = 0 WHERE ACC='$code'";
$busqueda = mysqli_query($enlace, $asignar);
echo '
<script>
alert("Recuerda que el código de verificación se puede utilizar una vez. En dado caso de volver a perder tu contraseña, tienes que hacer el proceso nuevamente.");
location.href = "/HaciendaXtepen/login/";
</script>
';

?>

