<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylepersonal.css">
    <title>Personal</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="contenedor_menu">
        <h1>Personal</h1>
        <hr>
        <div class="menu-list">
            <?php
            require "conexion.php";

            // Consultar las promociones en la base de datos
            $query = "SELECT * FROM personal";
            $result = mysqli_query($conectar, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($fila = mysqli_fetch_assoc($result)) {
                    echo '<div class="menu-card">';
                    echo '<h2>' . htmlspecialchars($fila['nombre_personal']) . '</h2>';
                    echo '<a href="#" class="ver-foto" data-imagen="' . htmlspecialchars($fila['fotos']) . '">';
                    echo '<img src="' . htmlspecialchars($fila['fotos']) . '" alt="Imagen de ' . htmlspecialchars($fila['nombre_personal']) . '">';
                    echo '</a>';
                    echo '<p>' . htmlspecialchars($fila['descripcion']) . '</p>';
                    echo "<br>";
                    echo '<div class="contenedor_btn">';
                    echo '<button class="buttonsbmt2"><a href="editar_personal.php?id=' . $fila['id_personal'] . '">Editar</a></button>';
                    echo '<button class="buttonsbmt2" onClick="validar(\'eliminar_personal.php?id=' . $fila['id_personal'] . '\')">Eliminar</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay personal disponibles actualmente.</p>';
            }
            ?>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImage" src="" alt="Imagen de promoción">
        </div>
    </div>

    <script>
        // Obtener el modal
        var modal = document.getElementById("myModal");
        var modalImage = document.getElementById("modalImage");

        // Obtener todos los enlaces con la clase "ver-foto"
        var verFotoLinks = document.querySelectorAll(".ver-foto");

        // Asignar el evento de click a cada imagen
        verFotoLinks.forEach(function(link) {
            link.onclick = function(e) {
                e.preventDefault();
                var imagenSrc = this.getAttribute("data-imagen");
                modalImage.src = imagenSrc;
                modal.style.display = "block";
            };
        });

        // Obtener el elemento de cerrar (X)
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario hace click en <span> (x), cerrar el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cerrar el modal si se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>´

    <script>
    function validar(url) {
        var eliminar = confirm("¿Deseas eliminar este apartado?");
        if (eliminar) {
                window.location = url;
            }
        }
    </script>
</body>
</html>
