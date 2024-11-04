<?php 
require "seguridad.php"; 
include "conexion.php";

// Obtener la fecha de búsqueda si está presente
$fecha_busqueda = isset($_POST['fecha_busqueda']) ? $_POST['fecha_busqueda'] : '';

// Función para convertir el mes a español
function convertir_mes_espanol($fecha) {
    $meses_ingles = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $meses_espanol = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    return str_replace($meses_ingles, $meses_espanol, strftime("%d de %B de %Y", strtotime($fecha)));
}

?>
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
        <form method="POST" onsubmit="return validarFecha()">
            <label for="fecha_busqueda">Buscar por Fecha:</label>
            <input type="date" id="fecha_busqueda" name="fecha_busqueda" required>
            <input type="submit" value="Buscar">
        </form>

        <!-- Botón "Ver Todas las Reservas" solo aparece si hay una fecha de búsqueda -->
        <?php if (!empty($fecha_busqueda)): ?>
            <a href="dashboard_eventos.php"><button class="btn">Ver Todas las Reservas</button></a>
        <?php endif; ?>

        <div class="tabla">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre Completo</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Fecha del Evento</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>

                <?php
                // Consulta base para obtener todas las reservas
                $todas_reservas = "SELECT * FROM reservas_eventos ORDER BY id ASC";

                // Filtrar solo si hay una fecha de búsqueda
                if (!empty($fecha_busqueda)) {
                    $todas_reservas = "SELECT * FROM reservas_eventos WHERE DATE(fecha) = '$fecha_busqueda' ORDER BY id ASC";
                }

                $resultado = mysqli_query($conectar, $todas_reservas);

                // Verificar si se encontraron resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Mostrar cada resultado en la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $fecha = convertir_mes_espanol($fila["fecha"]);
                        $fecha_db = date('Y-m-d', strtotime($fila["fecha"]));

                        // Verifica si la fecha de la fila coincide con la fecha de búsqueda
                        $resaltar = ($fecha_busqueda == $fecha_db) ? 'highlight' : '';
                        
                        // Determina el icono del estado
                        $icono_estado = '';
                        if ($fila['estado'] == 'realizada') {
                            $icono_estado = '<i class="fas fa-check-circle" style="color: green;"></i>';
                        } elseif ($fila['estado'] == 'cancelada') {
                            $icono_estado = '<i class="fas fa-times-circle" style="color: red;"></i>';
                        } else {
                            $icono_estado = '<i class="fas fa-clock" style="color: gray;"></i>'; // Estado pendiente
                        }
                ?>
                        <tr>
                            <td style="width: 10px;"><?php echo $fila["id"]; ?></td>
                            <td><?php echo $fila["nombre"]; ?></td>
                            <td><?php echo $fila["email"]; ?></td>
                            <td><?php echo $fila["telefono"]; ?></td>
                            <td><?php echo $resaltar ? "<span class='highlight'>" . $fecha . "</span>" : $fecha; ?></td>
                            <td style="text-align: center; width: 10px;"><?php echo $icono_estado; ?></td>
                            <td style="width: 50px;"><a href="ver_evento.php?id=<?php echo $fila['id']; ?>"><i class="basurita fa-solid fa-eye"></i></a></td>
                            <td style="width: 50px;"><a href="editar_evento.php?id=<?php echo $fila['id']; ?>"><i class="basurita fa-solid fa-pen-to-square"></i></a></td>
                            <td style="width: 50px;">
                                <a href="#" onClick="validar('eliminar_evento.php?id=<?php echo $fila['id']; ?>')"><i class="basurita fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    // Mostrar mensaje si no se encuentran resultados
                    echo "<tr><td colspan='9' style='text-align: center; padding: 20px;'>No se encontraron reservas para la fecha especificada.</td></tr>";
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

        function validarFecha() {
            var fecha = document.getElementById('fecha_busqueda').value;
            var regex = /^\d{4}-\d{2}-\d{2}$/; // Expresión regular para validar formato YYYY-MM-DD
            if (!regex.test(fecha)) {
                alert("Por favor, introduce la fecha en el formato YYYY-MM-DD.");
                return false; // Detiene el envío del formulario
            }
            return true; // Permite el envío del formulario
        }
    </script>
</body>
</html>
