<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/stylebanq.css">
    <link rel="stylesheet" href="PaginaPrincipal/animate.css">
    <script src="PaginaPrincipal/wow.min.js"></script>
    <title>Reservas</title>
</head>
<body>
    <?php include "menu_principal.php"; ?>
    <hr>

    <div class="contenedor">
        <div class="contenedor_frm">
            <?php 
            // Conexión a la base de datos
            $host = "localhost";
            $user = "root";
            $contrasena = "";
            $bd = "haciendaxtepen";
            
            $conectar = mysqli_connect($host, $user, $contrasena, $bd);
            if (!$conectar) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Consulta para obtener menús
            $vermenu = "SELECT * FROM banquete_menu";
            $result = mysqli_query($conectar, $vermenu);

            // Verificar si hay resultados
            if ($result && mysqli_num_rows($result) > 0) {
                while ($fila = mysqli_fetch_assoc($result)) {
                    // Comprobación de ruta de imagen
                    $imagenUrl = 'login/' . htmlspecialchars($fila['imagen']);
                    echo '<div class="wow animate__animated animate__zoomIn menu-card" style="background-image: url(\'' . $imagenUrl . '\');">';
                    echo '<div class="menu-content">';
                    echo '<h2>' . htmlspecialchars($fila['nombre_menu']) . '</h2>';
                    echo '<h3>' . htmlspecialchars($fila['descripcion']) . '</h3>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay menús disponibles actualmente.</p>';
            }
            
            mysqli_close($conectar); // Cerrar la conexión
            ?>
        </div>
    </div>

    <?php include "pie_pagina.php"; ?>
    <script>
        new WOW().init();
    </script>
</body>
</html>
