<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylemenu.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="PaginaPrincipal/animate.css">
    <script src="PaginaPrincipal/wow.min.js"></script>
=======
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
    <title>Menu</title>
</head>
<body>
    <?php include "menu.php";?>
    <br><br>
    <div class="information">
<<<<<<< HEAD
        <img class="wow animate__animated xtepenimg" src="imagenes/xtepen-logo-500-shadow.png" alt="">
=======
        <img class="xtepenimg" src="imagenes/xtepen-logo-500-shadow.png" alt="">
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
        <br><br>

        <?php
        require "conexion.php";
        $id_usuario = $_SESSION['id_usuario'];

        $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conectar, $verusuario);
        $fila = $resultado -> fetch_array();
        ?>

        <!-- <img src="<?php echo $fila["foto"]; ?>" alt="" style="width: 200px; height: 200px; object-fit: cover; border-radius: 20%;">
        <h3>USUARIO: <br> <?php echo $fila["nombre_completo"]; ?></h3> -->


    </div>
<<<<<<< HEAD
    <script>
        new WOW().init();
    </script>
=======
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
</body>
</html
