-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2024 a las 20:12:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `haciendaxtepen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(11) NOT NULL,
  `nombre_promocion` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `nombre_promocion`, `descripcion`, `imagen`) VALUES
(1, 'Paquete Boda', 'Incluye todo lo necesario para hacer de tu boda un día inolvidable, desde el banquete hasta la decoración.', 'img_prom/2024-11-10-08-02-20-comida1.jpg'),
(2, 'Paquete Quinceañera', 'Un paquete diseñado para hacer la celebración de tu quinceañera única, con decoración y comida personalizada.', 'img_prom/2024-11-10-08-12-04-Estudiantes.jpg'),
(3, 'Paquete Evento Corporativo', 'Ideal para eventos empresariales, ofreciendo opciones de catering, decoración elegante y espacios adecuados.', 'img_prom/2024-11-10-09-02-34-WhatsApp Image 2024-04-18 at 11.45.29 AM.jpeg'),
(4, 'Paquete Bautizo o Primera Comunión', 'Este paquete cubre todos los aspectos esenciales para la celebración de tu bautizo o primera comunión.', 'img_prom/2024-11-10-11-39-44-WhatsApp Image 2024-10-07 at 3.37.36 PM.jpeg'),
(5, 'Paquete Cumpleaños', 'Un paquete versátil para celebrar tu cumpleaños con amigos y familia, incluyendo comida, bebida y decoraciones temáticas.', 'img_prom/2024-11-10-11-40-29-WhatsApp Image 2024-10-09 at 1.49.02 PM (1).jpeg'),
(6, 'Paquete Pedida de Mano', 'Haz tu pedida de mano especial con un paquete que incluye un ambiente romántico y una cena inolvidable.', 'img_prom/2024-11-10-11-41-05-Captura de pantalla_16-5-2024_03426_web.whatsapp.com.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
