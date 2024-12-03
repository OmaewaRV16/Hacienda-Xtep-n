<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylepersonal.css">
    <title>Personal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include "menu.php"; ?>
    <div>
        <?php
        require "conexion.php";

        $query = "SELECT * FROM personal";
        $result = mysqli_query($conectar, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<table class="tabla">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Descripción</th>';
            echo '<th>Editar</th>';
            echo '<th>Eliminar</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($fila = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($fila['nombre_personal']) . '</td>';
                echo '<td>' . htmlspecialchars($fila['descripcion']) . '</td>';
                echo '<td class="acciones">';
                echo '<a href="editar_personal.php?id=' . htmlspecialchars($fila['id_personal']) . '" class="icono"><i class="fa-solid fa-edit" style="color: var(--Texto);"></i></a>';
                echo '</td>';
                echo '<td class="acciones">';
                echo '<a href="eliminar_personal.php?id=' . htmlspecialchars($fila['id_personal']) . '" class="icono" onclick="return confirm(\'¿Estás seguro de eliminar este registro?\')"><i class="basurita fa-solid fa-trash-can" style="color: var(--Texto);"></i></a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No hay personal disponibles actualmente.</p>';
        }
        ?>
    </div>
</body>
</html>