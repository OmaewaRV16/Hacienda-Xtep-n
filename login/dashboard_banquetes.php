<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylebanqts.css">
    <title>Menú de Banquetes</title>
</head>
<body>
    <?php include "menu.php";?>

    <div class="contenedor_menu">
        <h1>Menú de Banquetes</h1>
        <hr>
        <div class="menu-list">
            <?php
            require "conexion.php";
            $query = "SELECT * FROM banquete_menu";
            $result = mysqli_query($conectar, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($fila = mysqli_fetch_assoc($result)) {
                    echo '<div class="menu-card">';
                    echo '<h2>' . htmlspecialchars($fila['nombre_menu']) . '</h2>';
                    echo '<img src="' . htmlspecialchars($fila['imagen']) . '" alt="Imagen de ' . htmlspecialchars($fila['nombre_menu']) . '">';
                    echo '<p>' . htmlspecialchars($fila['descripcion']) . '</p>';
                    // Botón de eliminar
                    echo '<form action="eliminar_banquete_menu.php" method="post" class="delete-form">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($fila['id']) . '">';
                    echo "<br>";
                    echo '<button class="buttonsbmt" type="submit">Eliminar Menú</button>';
                    echo '</form>';
                    
                    echo '</div>';
                }
            } else {
                echo '<p>No hay menús disponibles actualmente.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>

