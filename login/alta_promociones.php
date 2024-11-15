<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleprom.css">
    <title>Alta Menú Banquetes</title>
</head>
<body>
    <?php include "menu.php";?>

    <div class="information">
        <form action="agregar_promociones.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <h1>Promociones</h1>
            <div>
                <input class="inputext" type="text" name="nombre_promocion" placeholder="Inserte Nombre de la Promoción" id="nombre_promocion" required>
            </div>
            <br>
            <div>
                <textarea style="resize: none;" class="inputext" name="descripcion" id="descripcion" placeholder="Inserta la Descripción de la Promoción" required></textarea>
            </div>

            <div class="file-container">
                <h5>Inserta Imagen de Muestra:</h5>
                <input class="inputext" type="file" name="imagen" id="imagen" accept="image/jpeg, image/png, image/gif, image/jpg" required>
                <label class="file-info">(El máximo de peso de la imagen debe ser de 1MB, solo acepta formatos en JPEG, PNG, GIF y JPG).</label>
                <br>
            </div>
            <button class="buttonsbmt">Enviar</button>
        </form>
    </div>

    <script>
        function validateForm() {
            // Validación de nombre de la promoción
            var nombrePromocion = document.getElementById("nombre_promocion").value.trim();
            if (nombrePromocion === "") {
                alert("El nombre de la promoción es obligatorio.");
                return false;
            }

            // Validación de descripción
            var descripcion = document.getElementById("descripcion").value.trim();
            if (descripcion === "") {
                alert("La descripción de la promoción es obligatoria.");
                return false;
            }

            // Validación de la imagen
            var imagen = document.getElementById("imagen");
            var file = imagen.files[0];
            if (file) {
                // Verificar el tipo de archivo (solo imágenes)
                var allowedExtensions = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
                if (!allowedExtensions.includes(file.type)) {
                    alert("Solo se permiten imágenes en formato JPEG, PNG, GIF o JPG.");
                    return false;
                }

                // Verificar el tamaño del archivo (máximo 1MB)
                var maxSize = 1 * 1024 * 1024; // 1MB en bytes
                if (file.size > maxSize) {
                    alert("El tamaño de la imagen no debe superar 1MB.");
                    return false;
                }
            } else {
                alert("Por favor, selecciona una imagen.");
                return false;
            }

            // Si todas las validaciones pasan
            return true;
        }
    </script>
</body>
</html>
