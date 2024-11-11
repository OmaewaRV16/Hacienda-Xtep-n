<?php
session_start();
session_destroy();
echo '
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cerrando Sesión</title>
        <style>
            body {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                background-color: #e5d3cf;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                color: white;
            }
            .message-box {
                background-color: #FFF7F4;
                color: #333;
                padding: 30px 40px;
                border-radius: 20px;
                text-align: center;
                font-size: 20px;
                font-weight: bold;
                box-shadow: 0px 0px 40px #7700002d;
                width: 350px;
                opacity: 0;
                animation: fadeIn 1s forwards, slideUp 0.8s forwards;
            }
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            @keyframes slideUp {
                from { transform: translateY(30px); }
                to { transform: translateY(0); }
            }
            .message-box .loading {
                font-size: 18px;
                font-weight: normal;
                margin-top: 15px;
                color: var(--Texto);
            }
            .message-box p {
                margin-bottom: 20px;
                font-size: 22px;
            }
            .message-box img {
                width: 100%; /* Ajusta el tamaño de la imagen al 100% del contenedor */
                max-width: 200px; /* Limita el tamaño máximo de la imagen */
                height: auto; /* Mantiene la proporción de la imagen */
                margin-bottom: 20px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <div class="message-box">
            <img src="http://localhost/Hacienda-Xtep-n/login/imagenes/xtepen-logo-750.gif" alt="Logo Hacienda Xtepén">
            <p>Estamos cerrando tu sesión...</p>
            <div class="loading">Por favor espera, serás redirigido en breve.</div>
        </div>
        <script>
            // Redirige al usuario después de 5 segundos
            setTimeout(function() {
                location.href = "index.php";
            }, 5000);  // Redirige después de 5 segundos
        </script>
    </body>
    </html>
';
?>
