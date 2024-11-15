<?php 
require "seguridad.php"; 
include "conexion.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$estado_busqueda = isset($_POST['estado_busqueda']) ? $_POST['estado_busqueda'] : (isset($_GET['estado_busqueda']) ? $_GET['estado_busqueda'] : '');
$mes_busqueda = isset($_POST['mes_busqueda']) ? $_POST['mes_busqueda'] : (isset($_GET['mes_busqueda']) ? $_GET['mes_busqueda'] : '');

// Número de resultados por página
$limit = 10;

// Determinar la página actual
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit; // Calculamos el inicio de la consulta

// Función para convertir el mes a español usando IntlDateFormatte
function convertir_mes_espanol($fecha) {
    $meses = [
        '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo',
        '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio',
        '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre',
        '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
    ];

    $date = new DateTime($fecha);
    $dia = $date->format('d');
    $mes = $meses[$date->format('m')];
    $anio = $date->format('Y');

    return "$dia de $mes de $anio";
}

// Obtener el nombre del mes en español según el número
function obtener_nombre_mes($mes) {
    $meses = array(
        '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo',
        '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio',
        '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre',
        '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
    );
    return $meses[$mes] ?? '';
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
    <script>
        function buscarEstado(estado) {
            // Obtener el valor actual de mes_busqueda
            var mes_busqueda = document.getElementById('mes_busqueda').value;
            
            // Redirigir a la página con los parámetros de estado y mes
            window.location.href = "?estado_busqueda=" + estado + "&mes_busqueda=" + mes_busqueda;
        }

        function buscarMes() {
            // Obtener el estado seleccionado
            var estado_busqueda = document.querySelector('input[name="estado_busqueda"]:checked') ? document.querySelector('input[name="estado_busqueda"]:checked').value : '';
            
            // Obtener el valor del mes seleccionado
            var mes_busqueda = document.getElementById('mes_busqueda').value;

            // Redirigir a la página con los parámetros de estado y mes
            window.location.href = "?estado_busqueda=" + estado_busqueda + "&mes_busqueda=" + mes_busqueda;
        }
    </script>
</head>
<body>
    <?php include "menu.php"; ?>
    <hr>
    <div class="information">
        <div class="search-bar">
            <form action="" method="GET">
                <br>
                <label>Buscar por Estado:</label>
                <a type="button" onclick="buscarEstado('realizada')" class="search-btn">
                    <i class="fas fa-check-circle icon realizada" title="Realizada"></i>
                </a>
                <a type="button" onclick="buscarEstado('cancelada')" class="search-btn">
                    <i class="fas fa-times-circle icon cancelada" title="Cancelada"></i>
                </a>
                <a type="button" onclick="buscarEstado('pendiente')" class="search-btn">
                    <i class="fas fa-clock icon pendiente" title="Pendiente"></i>
                </a>

                <label>Buscar por Mes:</label>
                <select id="mes_busqueda" class="mes-select" onchange="buscarMes()">
                    <option value="">Seleccionar Mes</option>
                    <?php
                    for ($mes = 1; $mes <= 12; $mes++) {
                        $mes_str = str_pad($mes, 2, '0', STR_PAD_LEFT); // Asegura que el mes tenga dos dígitos
                        $nombre_mes = obtener_nombre_mes($mes_str);
                        echo "<option value='$mes_str' " . ($mes_busqueda == $mes_str ? 'selected' : '') . ">$nombre_mes</option>";
                    }
                    ?>
                </select>
            </form>
        </div>
        <br>

        <div class="reporte">
            <?php if (empty($estado_busqueda) && empty($mes_busqueda)): ?>
            <a href="descargar_reporte.php" target="_blank"><button class="btn">Descargar Reporte PDF</button></a>
            <?php endif; ?>
        </div>

        <!-- Botón "Ver Todas las Reservas" solo aparece si hay un estado de búsqueda -->
        <?php if (!empty($estado_busqueda) || !empty($mes_busqueda)): ?>
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
                // Consulta base para obtener todas las reservas con paginación
                $todas_reservas = "SELECT * FROM reservas_eventos WHERE 1=1";

                // Filtrar solo si hay un estado de búsqueda
                if (!empty($estado_busqueda)) {
                    $todas_reservas .= " AND estado = '" . mysqli_real_escape_string($conectar, $estado_busqueda) . "'";
                }

                // Filtrar solo si hay un mes de búsqueda
                if (!empty($mes_busqueda)) {
                    $todas_reservas .= " AND MONTH(fecha) = '" . mysqli_real_escape_string($conectar, $mes_busqueda) . "'";
                }

                // Limitar los resultados y aplicar paginación
                $todas_reservas .= " ORDER BY id ASC LIMIT $start, $limit";

                $resultado = mysqli_query($conectar, $todas_reservas);

                // Verificar si se encontraron resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Mostrar cada resultado en la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $fecha = convertir_mes_espanol($fila["fecha"]);
                        $fecha_db = date('Y-m-d', strtotime($fila["fecha"]));

                        // Determina el icono del estado
                        $icono_estado = '';
                        if ($fila['estado'] == 'realizada') {
                            $icono_estado = '<i class="fas fa-check-circle icon realizada" style="color: green;" title="Realizada"></i>';
                        } elseif ($fila['estado'] == 'cancelada') {
                            $icono_estado = '<i class="fas fa-times-circle icon cancelada" style="color: red;" title="Cancelada"></i>';
                        } else {
                            $icono_estado = '<i class="fas fa-clock icon pendiente" style="color: gray;" title="Pendiente"></i>'; // Estado pendiente
                        }
                ?>
                        <tr>
                            <td style="width: 10px;"><?php echo $fila["id"]; ?></td>
                            <td><?php echo $fila["nombre"]; ?></td>
                            <td><?php echo $fila["email"]; ?></td>
                            <td><?php echo $fila["telefono"]; ?></td>
                            <td><?php echo $fecha; ?></td>
                            <td style="text-align: center; width: 10px;"><?php echo $icono_estado; ?></td>
                            <td style="width: 50px;">
                                <a href="ver_reserva.php?id=<?php echo $fila['id']; ?>"><i class="fa-solid fa-eye" style="color: var(--Texto);"></i></a>
                            </td>
                            <td style="width: 50px;">
                                <a href="editar_evento.php?id=<?php echo $fila['id']; ?>"><i class="fa-solid fa-edit" style="color: var(--Texto);"></i></a>
                            </td>
                            <td style="width: 50px;">
                                <a href="eliminar_evento.php?id=<?php echo $fila['id']; ?>"><i class="basurita fa-solid fa-trash-can" style="color: var(--Texto);"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='9'>No hay registros.</td></tr>";
                }
                ?>
            </table>

            <div class="paginacion">
                <?php
                // Mostrar la paginación
                $total_reservas = "SELECT COUNT(*) FROM reservas_eventos WHERE 1=1";

                if (!empty($estado_busqueda)) {
                    $total_reservas .= " AND estado = '" . mysqli_real_escape_string($conectar, $estado_busqueda) . "'";
                }

                if (!empty($mes_busqueda)) {
                    $total_reservas .= " AND MONTH(fecha) = '" . mysqli_real_escape_string($conectar, $mes_busqueda) . "'";
                }

                $resultado_total = mysqli_query($conectar, $total_reservas);
                $total_filas = mysqli_fetch_array($resultado_total)[0];
                $total_paginas = ceil($total_filas / $limit);

                // Paginación: Enlaces a páginas anteriores y siguientes
                if ($page > 1) {
                    echo "<a href='?page=" . ($page - 1) . "&estado_busqueda=$estado_busqueda&mes_busqueda=$mes_busqueda'>Anterior</a>";
                }

                for ($i = 1; $i <= $total_paginas; $i++) {
                    if ($i == $page) {
                        echo "<span>$i</span>";
                    } else {
                        echo "<a href='?page=$i&estado_busqueda=$estado_busqueda&mes_busqueda=$mes_busqueda'>$i</a>";
                    }
                }

                if ($page < $total_paginas) {
                    echo "<a href='?page=" . ($page + 1) . "&estado_busqueda=$estado_busqueda&mes_busqueda=$mes_busqueda'>Siguiente</a>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
