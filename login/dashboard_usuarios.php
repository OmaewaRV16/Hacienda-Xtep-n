<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylemenu.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Menu</title>
</head>
<body>
    <?php include "menu.php";?>
    <br><br>
    <div class="information">
    <div class="tabla">
        <table>
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nombre Completo</th>
                <th>Correo Electronico</th>
                <!-- <th>CONTRASEÑA</th>
                <th>FECHA DE NACIMIENTO</th> -->
                <th>Editar</th>
            </tr>

            <?php
            include "conexion.php";
            if (isset($_SESSION['id_usuario'])) {
                $id_usuario = $_SESSION['id_usuario'];
                $verusuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
                $resultado = mysqli_query($conectar, $verusuario);
                $fila = $resultado->fetch_array();
            } else {
                echo "ID no proporcionado.";
                exit;
            } {
            ?>

            <tr>
                <td><?php echo $fila["id_usuario"]; ?></td>
                <td><img src="<?php echo $fila["foto"]; ?>" alt="" style="width: 90px; height: 90px; object-fit: cover; border-radius: 100%; padding: 5px;"></td>
                <td><?php echo $fila["nombre_completo"]; ?></td>
                <td><?php echo $fila["email"]; ?></td>
                <!-- <td><?php echo $fila["contrasena"]; ?></td>
                <td><?php echo $fila["fecha_nacimiento"]; ?></td> -->
                <td><a href="editar_usuario.php?id=<?php echo $fila['id_usuario']; ?>"><i class=" basurita fa-solid fa-pen-to-square"></i></a></td>
            </tr>

            <?php
            }
            ?>
        </table>
        </div>
    </div>
</div>
    </div>
</body>
</html>