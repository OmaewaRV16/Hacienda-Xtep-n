<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="PaginaPrincipal/stylepromo.css">
    <link rel="stylesheet" href="PaginaPrincipal/animate.css">
    <script src="/PaginaPrincipal/wow.min.js"></script>
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Promociones</title>
</head>
<body>
    <?php include "menu_principal.php"; ?>
    <hr>

    <section class="contenedor">
        <h1>PROMOCIONES</h1>
        <article>
            <h2>Paquete Boda</h2>
            <p>Paquete de bodas con todo incluido</p>
            <span class="open">Ver detalles</span>
        </article>
        <article>
            <h2>Paquete Cumpleaños</h2>
            <p>Paquete de bodas con todo incluido</p>
            <span class="open">Ver detalles</span>
        </article>
        <article>
            <h2>Paquete Quinceaños</h2>
            <p>Paquete de bodas con todo incluido</p>
            <span class="open">Ver detalles</span>
        </article>
        <div id="modal-background"></div>
        <div id="modal">
            <div id="close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h1>Paquete Boda</h1>
            <p>Este paquete es para bodas de hasta 500 invitados, con una increible cocteleria y un grupo que hara que la fiesta este prendida por completo</p>
            <div class="fotos">
                <figure>
                    <img src="login/imagenes/FotoSec2.jpg" alt="">
                </figure>
                <figure>
                    <img src="login/imagenes/FotoSec3.jpg" alt="">
                </figure>
            </div>
            <a href="alta_reservas_eventos.php">Reserva Ya!</a>
        </div>
    </section>
    <?php include "pie_pagina.php"; ?>
    <script>
        $(document).ready(function() {
            $("#modal").hide();
            $("#modal-background").hide();

            $(".open").click(function(event) {
                event.preventDefault();
                $("#modal").fadeIn();
                $("#modal-background").fadeIn();
            });

            $("#close").click(function() {
                $("#modal").fadeOut();
                $("#modal-background").fadeOut();
            });

            $("#modal-background").click(function() {
                $("#modal").fadeOut();
                $("#modal-background").fadeOut();
            });
        });
    </script>
</body>
</html>