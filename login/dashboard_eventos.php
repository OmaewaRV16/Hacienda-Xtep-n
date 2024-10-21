<?php require "seguridad.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylersvboard.css">
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Reservas</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <br><br>
    <div class="information">
        <div class="tabla">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre Completo</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Tipo de Evento</th>
                    <th>Fecha del Evento</th>
                    <th>Número de Invitados</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>

                <?php
                include "conexion.php";

                function convertir_mes_espanol($fecha) {
                    $meses_ingles = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                    $meses_espanol = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                    
                    return str_replace($meses_ingles, $meses_espanol, strftime("%d de %B de %Y", strtotime($fecha)));
                }

                $todas_reservas = "SELECT * FROM reservas_eventos ORDER BY id ASC";
                $resultado = mysqli_query($conectar, $todas_reservas);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $fecha = convertir_mes_espanol($fila["fecha"]);
                ?>
                    <tr>
                        <td><?php echo $fila["id"]; ?></td>
                        <td><?php echo $fila["nombre"]; ?></td>
                        <td><?php echo $fila["email"]; ?></td>
                        <td><?php echo $fila["telefono"]; ?></td>
                        <td><?php echo $fila["evento"]; ?></td>
                        <td><?php echo $fila["fecha"]; ?></td>
                        <td><?php echo $fila["invitados"]; ?></td>
                        <td><a href="ver_evento.php?id=<?php echo $fila['id']; ?>"><i class="basurita fa-solid fa-eye"></i></a></td>
                        <td><a href="editar_evento.php?id=<?php echo $fila['id']; ?>"><i class="basurita fa-solid fa-pen-to-square"></i></a></td>
                        <td>
                            <a href="#" onClick="validar('eliminar_evento.php?id=<?php echo $fila['id']; ?>')"><i class="basurita fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <script>
        function validar(url) {
            var eliminar = confirm("¿Deseas eliminar esta reserva?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>
</html>
