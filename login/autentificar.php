<?php
require "conexion.php";

$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {

    $fila = $resultado->fetch_array();

    if (password_verify($contrasena, $fila["contrasena"])) {

        session_start(); // Iniciar la sesión

        // Guardamos el id_usuario en la sesión
        $_SESSION['id_usuario'] = $fila["id_usuario"];
        $_SESSION['username'] = $email;
        $_SESSION['autentificado'] = "SI";
        $_SESSION['tiempo_ultima_actividad'] = time();

        // Redireccionamos al panel administrativo
        header("Location: panel_administrativo.php");
        exit();
    } else {
        echo '
        <script>
        location.href = "index.php?errorusuario=SI";
        </script>
        ';
    }
} else {
    echo '
    <script>
    location.href = "index.php?errorusuario=SI";
    </script>
    ';
}

mysqli_free_result($resultado);
mysqli_close($conectar);
?>
