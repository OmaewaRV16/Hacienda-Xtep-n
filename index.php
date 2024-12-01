<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PaginaPrincipal/pagprinc.css">
    <link rel="stylesheet" href="PaginaPrincipal/animate.css">
    <link rel="stylesheet" href="PaginaPrincipal/fancybox.css">
    <script src="PaginaPrincipal/fancybox.js"></script>
    <script src="PaginaPrincipal/wow.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/b971a45ca4.js" crossorigin="anonymous"></script>
    <title>Hacienda Xtepén</title>
</head>
<body>
    <?php include "menu_principal.php";?>
    <section class="hero">
        <div class="herocontainer">
            <img class="wow animate__animated animate__bounceInLeft animate__slow" src="login/imagenes/xtepen-logo-500-shadow.png" alt="">
            <p class="wow animate__animated animate__bounceInRight animate__slow">Bienvenidos a Hacienda Xtepen, un lugar donde la historia y la elegancia se unen para crear eventos inolvidables. Ubicada en el corazón de Yucatán, nuestra majestuosa hacienda ofrece un entorno único rodeado de naturaleza y arquitectura colonial.</p>
        </div>
    </section>
    <section class="historia ancho">
        <h1 class="wow animate__animated animate__fadeIn animate__delay-2s">Historia</h1>
        <p class="wow animate__animated animate__fadeIn animate__delay-2s">Hacienda Xtepen, fundada en el siglo XIX, conserva su esencia colonial y te transporta al pasado. Antaño una productora de henequén, hoy es un espacio restaurado para celebrar momentos únicos en un entorno lleno de historia.</p>
    </section>
    <section class="servicios ancho">
        <figure>
            <img src="login/imagenes/FotoSec2.jpg" alt="">
        </figure>
        <div>
            <p>Ofrecemos servicios para todo tipo de eventos: bodas, celebraciones privadas y corporativas. Desde catering y decoración hasta iluminación, nuestro equipo se encargará de cada detalle para que tu evento sea inolvidable.</p>
            <a class="serv wow animate__animated animate__bounceInRight animate__slow" href="#">Saber mas</a>
        </div>
    </section>
    <section class="galemov ancho">
        <div class="galemovcontainer">
        <a href="login/imagenes/foto2-2.jpg" data-fancybox="gallery" data-caption="Caption #1">
            <img src="login/imagenes/foto2-2.jpg" />
        </a>
        <a href="login/imagenes/foto1-1.jpg" data-fancybox="gallery" data-caption="Caption #2">
            <img src="login/imagenes/foto1-1.jpg" />
        </a>
        </div>
    </section>
    <section class="gale ancho">
        <h1>Conoce nuestras areas</h1>
        <div class="galeria">
            <figure class="wow animate__animated animate__slideInLeft animate__fast foto1 imgscale">
                <img src="login/imagenes/foto2-2.jpg" alt="">
                <article class="articleimglg">
                    <h3>Comedor Principal</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInRight animate__fast foto2 imgscale">
                <img src="login/imagenes/foto1-1.jpg" alt="">
                <article class="articleimg">
                    <h3>Capilla</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInRight animate__fast foto3 imgscale">
                <img src="login/imagenes/foto3-1.jpg" alt="">
                <article class="articleimg">
                    <h3>Salon Unicornio</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInLeft foto4 imgscale">
                <img src="login/imagenes/foto4-1.jpg" alt="">
                <article class="articleimg">
                    <h3>Piscina</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__zoomIn foto5 imgscale">
                <img src="login/imagenes/foto5-2.jpg" alt="">
                <article class="articleimglg">
                    <h3>Bosque Ficus</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInRight foto6 imgscale">
                <img src="login/imagenes/foto9-1.jpg" alt="">
                <article class="articleimg">
                    <h3>Piscina de Noche</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInLeft animate__slow foto7 imgscale">
                <img src="login/imagenes/foto8-1.jpg" alt="">
                <article class="articleimg">
                    <h3>Capilla por fuera</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInLeft animate__slow foto8 imgscale">
                <img src="login/imagenes/foto7-1.jpg" alt="">
                <article class="articleimg">
                    <h3>Jardin 4 Estaciones</h3>
                </article>
            </figure>
            <figure class="wow animate__animated animate__slideInRight animate__slow foto9 imgscale">
                <img src="login/imagenes/foto6-2.jpg" alt="">
                <article class="articleimglg">
                    <h3>Explanada</h3>
                </article>
            </figure>
        </div>
    </section>
    <section class="contactanos ancho">
        <h1>Ubicacion</h1>
        <div class="contact">
            <div class="textubi">
                <h2 class="wow animate__animated animate__fadeInUp">Ubicada en el corazón de Yucatán, Hacienda Xtepen se encuentra a solo 20 minutos de Mérida, ofreciendo la tranquilidad del campo sin alejarte de la ciudad. Nuestro entorno natural y fácil acceso hacen de Xtepen el lugar ideal para tu evento. ¡Visítanos y descubre este rincón de historia y belleza!</h2>
            </div>
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.2282634859635!2d-89.74585092529105!3d20.822486994832424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56139b7a4ffdb1%3A0x319d43331f2b501b!2sHacienda%20Xtep%C3%A9n!5e0!3m2!1ses-419!2smx!4v1729530819698!5m2!1ses-419!2smx" width="460" height="460" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <footer>
        <figure>
            <img src="login/imagenes/xtepen-logo-500-shadow.png" alt="">
        </figure>
        <div class="smedia">
            <h3>Redes Sociales</h3>
            <div class="icsm">
                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>
    <script>
        new WOW().init();
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });

    </script>
</body>


<!-- Prueba de Conexion al Repositorio de Cedrovich -->

</html>