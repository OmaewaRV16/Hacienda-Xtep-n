-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2024 a las 16:50:59
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `banquete_menu`
--

CREATE TABLE `banquete_menu` (
  `id` int NOT NULL,
  `nombre_menu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banquete_menu`
--

INSERT INTO `banquete_menu` (`id`, `nombre_menu`, `descripcion`, `imagen`) VALUES
(10, 'Menú prueba 1', 'tal', 'images/2024-11-05-06-25-16-comida 4.jpg'),
(11, 'Menú prueba 2', 'Prueba 2', 'images/2024-11-10-11-32-32-comida2.jpg'),
(12, 'Menú prueba 3', 'prueba 3', 'images/2024-11-10-11-32-54-comida3.jpg'),
(13, 'Menú prueba 4', 'prueba 4', 'images/2024-11-10-11-33-22-comida 4.jpg'),
(14, 'Menú prueba 5', 'prueba 5', 'images/2024-11-10-11-44-30-comida5.jpg'),
(15, 'Menú prueba 6', 'prueba 6', 'images/2024-11-10-11-44-57-WhatsApp Image 2024-10-07 at 4.02.50 PM.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int NOT NULL,
  `nombre_personal` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `fotos` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre_personal`, `descripcion`, `fotos`) VALUES
(1, 'Categoría Fotografía', 'Incluye a los mejores fotógrafos y más.', 'img_personal/2024-11-15-01-49-03-Captura de pantalla 2024-11-15 074834.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int NOT NULL,
  `nombre_promocion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `menu_banquete` int NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `nombre_promocion`, `menu_banquete`, `descripcion`, `imagen`) VALUES
(1, 'Paquete Gustavo', 0, 'Incluye todo lo necesario para hacer de tu boda un día inolvidable, desde el banquete hasta la decoración.', 'fotos/67337401d3ea5_WhatsApp Image 2024-11-05 at 19.35.13.jpeg'),
(2, 'Paquete Generacion', 0, 'Un paquete diseñado para hacer la celebración de tu quinceañera única, con decoración y comida personalizada.', 'fotos/6733728217646_D_NQ_NP_994953-MLM42527593209_072020-O.webp'),
(5, 'Paquete Cumpleaños', 0, 'Un paquete versátil para celebrar tu cumpleaños con amigos y familia, incluyendo comida, bebida y decoraciones temáticas.', 'img_prom/2024-11-10-11-40-29-WhatsApp Image 2024-10-09 at 1.49.02 PM (1).jpeg'),
(6, 'Paquete Pedida de Mano', 0, 'Haz tu pedida de mano especial con un paquete que incluye un ambiente romántico y una cena inolvidable.', 'img_prom/2024-11-10-11-41-05-Captura de pantalla_16-5-2024_03426_web.whatsapp.com.jpeg'),
(9, 'Paquete Agencia de Viajes', 0, 'sadasd', 'img_prom/2024-11-12-04-29-25-code-snapshot.png'),
(10, 'Paquete Generacion 2', 0, 'Esta ya esta no es una prueba', 'fotos/67338858a9d06_platillo2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_eventos`
--

CREATE TABLE `reservas_eventos` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `evento` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` date NOT NULL,
  `invitados` int NOT NULL,
  `mensaje` text COLLATE utf8mb4_general_ci,
  `fecha_reserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menu_banquete` int DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_general_ci DEFAULT 'pendiente',
  `personal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas_eventos`
--

INSERT INTO `reservas_eventos` (`id`, `nombre`, `email`, `telefono`, `evento`, `fecha`, `invitados`, `mensaje`, `fecha_reserva`, `menu_banquete`, `estado`, `personal`) VALUES
(27, 'Jay', 'Jay.co@gmail.com', '9991293748', 'comunion', '2024-11-17', 546, 'snoqqp', '2024-11-05 18:25:30', 15, 'cancelada', NULL),
(28, 'Joaquin', 'joselo12@gmail.com', '9992456783', 'comunion', '2024-11-22', 78, 'pdwcdqs', '2024-11-05 18:27:32', 10, 'realizada', NULL),
(30, 'José Omar', 'jose16.jorv@gmail.com', '9993292792', 'corporativo', '2024-11-16', 200, 'kdcnosocpows', '2024-11-05 18:28:48', 10, 'cancelada', NULL),
(31, 'Kevin Ortiz', 'kevin@ortz.com', '9998653571', 'comunion', '2024-11-26', 666, 'mpspwdpdwp', '2024-11-05 18:29:56', 10, 'cancelada', NULL),
(32, 'Edrick Leon', 'ledrickon22@gmail.com', '9998688636', 'boda', '2024-12-22', 100, 'hola', '2024-11-05 19:07:38', 10, 'pendiente', 1),
(33, 'hector cetina', 'hector@hotmail.com', '9998999898', 'comunion', '2024-12-17', 1000, 'jjodjcaoesdjoecn', '2024-11-08 20:05:32', 10, 'pendiente', NULL),
(40, 'nahuel', 'nahuel.guzman@gmail.com', '9998786786', 'pedida', '2024-12-04', 50, 'knonnollnl', '2024-11-11 03:44:23', 15, 'pendiente', NULL),
(41, 'uriel antuna', 'uriel.antuna@gmail.com', '9996453575', 'cumpleanos', '2024-11-12', 677, 'ibihohiohoh', '2024-11-11 03:45:26', 14, 'realizada', NULL),
(42, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'quinceanera', '2024-11-29', 300, 'sadsd', '2024-11-12 14:36:36', 14, 'pendiente', NULL),
(43, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'corporativo', '2024-12-12', 1000, 'kmsalmñasdmlñdlmñd', '2024-11-12 17:59:17', 14, 'pendiente', NULL),
(44, 'Ulises Millan', 'Uligamer@gmail.com', '9994736528', 'comunion', '2024-11-15', 888, 'jajajajajaja', '2024-11-13 00:47:32', 14, 'pendiente', NULL),
(45, 'Raul Achach', 'Raul.ds@gmail.com', '9998453677', 'boda', '2024-11-24', 1000, 'hahhahahahaha', '2024-11-13 01:43:03', 11, 'pendiente', NULL),
(46, 'Raul Achach', 'Raul.ds@gmail.com', '9998453677', 'boda', '2024-11-30', 900, 'ohfehifehikfekkefs', '2024-11-13 14:44:20', 10, 'pendiente', NULL),
(47, 'José Omar', 'jose16.jorv@gmail.com', '9993292792', 'corporativo', '2024-11-13', 122, 'jajjajfeowjo´qndwófew', '2024-11-13 16:07:50', 15, 'realizada', NULL),
(48, 'Emiliano Gaxiola', 'Gaxi_em@gmail.com', '9999877878', 'pedida', '2024-12-11', 66, 'doncnewnnocew', '2024-11-14 23:15:58', 12, 'pendiente', 1),
(49, 'Jesus Antonio Mendoza Loeza', 'Chucho@mdz.com', '9991828366', 'quinceanera', '2024-12-07', 1000, 'ndiwqidiwqnocoqewnf', '2024-11-15 16:40:32', 15, 'pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roles` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `acc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_completo`, `roles`, `email`, `contrasena`, `fecha_nacimiento`, `foto`, `acc`) VALUES
(1, 'José Omar Romero Verde', '', 'jose16.jorv@gmail.com', '$2y$10$ZicN2Rx40vgmZvk9mSRAle3TaPUUI5w5xLcRbSJxoHUrzVTgIF3y.', '2001-04-01', 'fotos/2024-10-10-11-23-48-pic.jpg', 0),
(5, 'Jorge Mar Martínez Pérez', '', 'mar@gmail.com', '$2y$10$oBC9YW6HNu2CC9W4FzzJFekBYUXi05mN2HWLqN7yy.9bc5qv7wv2a', '2024-10-03', 'fotos/2024-10-09-07-50-01-WhatsApp Image 2024-10-09 at 1.49.02 PM.jpeg', 0),
(8, 'admin', '', 'admin@admin.com', '$2y$10$FGuN7OFD4V12WDUlacPDRuRXr7ecTR1f12JwjrssoTIYE6HqVVKIu', '2024-10-09', 'fotos/2024-10-09-07-51-51-WhatsApp Image 2024-10-09 at 1.49.02 PM (5).jpeg', 0),
(9, 'Kevin Ortiz', '', 'gaby_st@gmail.com', '$2y$10$i.BcUB7iqPjTnLeu0HZuReNXfBfP/XeSXGIysRc.4DDYreoC8ExkK', '2024-10-09', 'fotos/2024-10-09-08-31-34-WhatsApp Image 2024-10-09 at 1.49.02 PM (4).jpeg', 0),
(10, 'Jesus Antonio Mendoza Loeza', '', 'Chucho@mdz.com', '$2y$10$U3fF/gM5U677J/FBx9rkF./7aIJGn5Q.X8J0hFaP1gSXaxSr0NQ5S', '2024-10-09', 'fotos/2024-10-09-07-40-23-WhatsApp Image 2024-10-07 at 4.02.50 PM.jpeg', 0),
(11, 'Gener Alejandro Vallejos', '', 'Gner@vall.com', '$2y$10$Djfrk12mnv0b0YTX2eahueVgFvDwYNwkcXMw2OdtEfgg94YgcgtRS', '2024-10-09', 'fotos/2024-10-09-07-32-11-WhatsApp Image 2024-10-07 at 3.37.36 PM.jpeg', 0),
(12, 'Edrick Leon', 'administrador', 'ledrickon22@gmail.com', '$2y$10$lfP3P8Ph9ookdUsq82O8BeKCBJ6IX/gO4ZGa/y03IQizqFHfgtyai', '2002-12-22', 'fotos/2024-10-22-04-06-13-WhatsApp Image 2024-10-10 at 20.22.42.jpeg', 0),
(13, 'Luis Peñe', 'cliente', 'luispeine@gmial.com', '$2y$10$C/hzdZZzjAaeoJKOF58nfOZS43TpOfGSj3lRM1DY7zcG.0Na3DzmG', '2010-10-10', 'fotos/2024-10-11-02-48-59-WhatsApp Image 2024-10-10 at 22.08.54.jpeg', 0),
(16, 'Emilio Puigtraconis', 'administrador', 'sincorreo@hotmail.com', '$2y$10$vb33MrApR2vmBCjIHYj.yu7BFiBv1xXlMIxFoRcKNBpdVHVBI9BAy', '2006-10-20', 'fotos/2024-10-11-05-03-13-WhatsApp Image 2024-10-10 at 22.08.54.jpeg', 0),
(17, 'Franki segura', 'administrador', 'franki@gmail.com', '$2y$10$L67FATG8BdbV7xKzMsIqvuZv/3Us2PSd3rwmi4hmWGOw59Y7KD30.', '2005-12-10', 'fotos/2024-10-11-05-06-34-WhatsApp Image 2024-10-10 at 22.08.54.jpeg', 0),
(18, 'Hernia Duran', 'administrador', 'sincorreo1@hotmail.com', '$2y$10$QFRv2KziwKcAcSZ0VTIJ/O10Y00IiRLY/zrttq6NFluxr8BNzEocq', '2002-06-13', 'fotos/2024-10-22-05-56-59-WhatsApp Image 2024-10-17 at 14.23.24.jpeg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banquete_menu`
--
ALTER TABLE `banquete_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_banquete` (`menu_banquete`),
  ADD KEY `fk_reservas_personal` (`personal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banquete_menu`
--
ALTER TABLE `banquete_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  ADD CONSTRAINT `fk_menu_banquete` FOREIGN KEY (`menu_banquete`) REFERENCES `banquete_menu` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_reservas_personal` FOREIGN KEY (`personal`) REFERENCES `personal` (`id_personal`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
