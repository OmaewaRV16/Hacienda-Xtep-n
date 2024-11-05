<?php 
require "seguridad.php"; 
include "conexion.php";

<<<<<<< HEAD
// Obtener el estado de búsqueda y el mes de búsqueda si están presentes
$estado_busqueda = isset($_POST['estado_busqueda']) ? $_POST['estado_busqueda'] : '';
$mes_busqueda = isset($_POST['mes_busqueda']) ? $_POST['mes_busqueda'] : '';
=======
// Obtener la fecha de búsqueda si está presente
$fecha_busqueda = isset($_POST['fecha_busqueda']) ? $_POST['fecha_busqueda'] : '';
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7

// Función para convertir el mes a español
function convertir_mes_espanol($fecha) {
    $meses_ingles = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $meses_espanol = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    return str_replace($meses_ingles, $meses_espanol, strftime("%d de %B de %Y", strtotime($fecha)));
}

<<<<<<< HEAD
// Obtener el nombre del mes en español según el número
function obtener_nombre_mes($mes) {
    $meses = array(
        '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo',
        '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio',
        '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre',
        '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
    );
    return $meses[$mes];
}

=======
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
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
<<<<<<< HEAD
    <hr>
    <div class="information">
        <form method="POST">
            <div class="search-bar">
                <span>Buscar por Estado:</span>
                <i class="fas fa-check-circle icon realizada" title="Realizada" onclick="buscarEstado('realizada')"></i>
                <i class="fas fa-times-circle icon cancelada" title="Cancelada" onclick="buscarEstado('cancelada')"></i>
                <i class="fas fa-clock icon pendiente" title="Pendiente" onclick="buscarEstado('pendiente')"></i>
                <span>Buscar por Mes:</span>
                <select name="mes_busqueda" class="mes-select" onchange="this.form.submit()">
                    <option value="">Seleccionar Mes</option>
                    <?php
                    for ($mes = 1; $mes <= 12; $mes++) {
                        $mes_str = str_pad($mes, 2, '0', STR_PAD_LEFT); // Asegura que el mes tenga dos dígitos
                        $nombre_mes = obtener_nombre_mes($mes_str);
                        echo "<option value='$mes_str' " . ($mes_busqueda == $mes_str ? 'selected' : '') . ">$nombre_mes</option>";
                    }
                    ?>
                </select>
            </div>
        </form>

        <!-- Botón "Ver Todas las Reservas" solo aparece si hay un estado de búsqueda -->
        <?php if (!empty($estado_busqueda) || !empty($mes_busqueda)): ?>
=======
    <br><br>
    <div class="information">
        <form method="POST" onsubmit="return validarFecha()">
            <label for="fecha_busqueda">Buscar por Fecha:</label>
            <input type="date" id="fecha_busqueda" name="fecha_busqueda" required>
            <input type="submit" value="Buscar">
        </form>

        <!-- Botón "Ver Todas las Reservas" solo aparece si hay una fecha de búsqueda -->
        <?php if (!empty($fecha_busqueda)): ?>
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
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
<<<<<<< HEAD
                $todas_reservas = "SELECT * FROM reservas_eventos WHERE 1=1";

                // Filtrar solo si hay un estado de búsqueda
                if (!empty($estado_busqueda)) {
                    $todas_reservas .= " AND estado = '$estado_busqueda'";
                }

                // Filtrar solo si hay un mes de búsqueda
                if (!empty($mes_busqueda)) {
                    $todas_reservas .= " AND MONTH(fecha) = '$mes_busqueda'";
                }

                $todas_reservas .= " ORDER BY id ASC";

=======
                $todas_reservas = "SELECT * FROM reservas_eventos ORDER BY id ASC";

                // Filtrar solo si hay una fecha de búsqueda
                if (!empty($fecha_busqueda)) {
                    $todas_reservas = "SELECT * FROM reservas_eventos WHERE DATE(fecha) = '$fecha_busqueda' ORDER BY id ASC";
                }

>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
                $resultado = mysqli_query($conectar, $todas_reservas);

                // Verificar si se encontraron resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Mostrar cada resultado en la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $fecha = convertir_mes_espanol($fila["fecha"]);
                        $fecha_db = date('Y-m-d', strtotime($fila["fecha"]));

<<<<<<< HEAD
                        // Determina el icono del estado
                        $icono_estado = '';
                        if ($fila['estado'] == 'realizada') {
                            $icono_estado = '<i class="fas fa-check-circle realizada" style="color: green;"></i>';
                        } elseif ($fila['estado'] == 'cancelada') {
                            $icono_estado = '<i class="fas fa-times-circle cancelada" style="color: red;"></i>';
                        } else {
                            $icono_estado = '<i class="fas fa-clock pendiente" style="color: gray;"></i>'; // Estado pendiente
=======
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
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
                        }
                ?>
                        <tr>
                            <td style="width: 10px;"><?php echo $fila["id"]; ?></td>
                            <td><?php echo $fila["nombre"]; ?></td>
                            <td><?php echo $fila["email"]; ?></td>
                            <td><?php echo $fila["telefono"]; ?></td>
<<<<<<< HEAD
                            <td><?php echo $fecha; ?></td>
=======
                            <td><?php echo $resaltar ? "<span class='highlight'>" . $fecha . "</span>" : $fecha; ?></td>
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
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
<<<<<<< HEAD
                    echo "<tr><td colspan='9' style='text-align: center; padding: 20px;'>No se encontraron reservas para el estado o mes especificado.</td></tr>";
=======
                    echo "<tr><td colspan='9' style='text-align: center; padding: 20px;'>No se encontraron reservas para la fecha especificada.</td></tr>";
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
                }
                ?>
            </table>
        </div>
    </div>
    <script>
<<<<<<< HEAD
        function buscarEstado(estado) {
            // Crear un formulario oculto para enviar el estado
            const form = document.createElement('form');
            form.method = 'POST';
            form.style.display = 'none';

            // Crear un campo oculto para el estado
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'estado_busqueda';
            input.value = estado;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

=======
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
        function validar(url) {
            var eliminar = confirm("¿Deseas eliminar esta reserva?");
            if (eliminar == true) {
                window.location = url;
            }
        }
<<<<<<< HEAD
=======

        function validarFecha() {
            var fecha = document.getElementById('fecha_busqueda').value;
            var regex = /^\d{4}-\d{2}-\d{2}$/; // Expresión regular para validar formato YYYY-MM-DD
            if (!regex.test(fecha)) {
                alert("Por favor, introduce la fecha en el formato YYYY-MM-DD.");
                return false; // Detiene el envío del formulario
            }
            return true; // Permite el envío del formulario
        }
>>>>>>> 2e2e65ea59f33af6a5b9b6aae829f9acc4fd3ba7
    </script>
</body>
</html>
