-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2024 a las 03:40:51
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
-- Estructura de tabla para la tabla `banquete_menu`
--

CREATE TABLE `banquete_menu` (
  `id` int(11) NOT NULL,
  `nombre_menu` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banquete_menu`
--

INSERT INTO `banquete_menu` (`id`, `nombre_menu`, `descripcion`, `imagen`) VALUES
(3, 'Menú prueba 1', 'Prueba 1', 'images/2024-11-01-06-31-02-comida1.jpg'),
(4, 'Menú prueba 2', 'Prueba 2', 'images/2024-11-01-06-33-05-comida2.jpg'),
(5, 'Menú prueba 3', 'Prueba 3', 'images/2024-11-01-06-35-10-comida3.jpg'),
(6, 'Menú prueba 4', 'Prueba 4', 'images/2024-11-01-06-35-30-comida 4.jpg'),
(7, 'Menú prueba 5', 'Prueba 5', 'images/2024-11-01-06-36-23-comida5.jpg'),
(8, 'Menú prueba 6', 'Este menú se compone de una selección cuidadosamente curada de platillos que reflejan la rica diversidad de la gastronomía contemporánea.', 'images/2024-11-01-08-25-30-WhatsApp Image 2024-10-07 at 4.02.50 PM.jpeg'),
(9, 'Menú prueba 7', 'hola estoy probando', 'images/2024-11-04-01-05-10-el mas duro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_eventos`
--

CREATE TABLE `reservas_eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `invitados` int(11) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp(),
  `menu_banquete` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas_eventos`
--

INSERT INTO `reservas_eventos` (`id`, `nombre`, `email`, `telefono`, `evento`, `fecha`, `invitados`, `mensaje`, `fecha_reserva`, `menu_banquete`, `estado`) VALUES
(9, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'quinceanera', '2024-11-22', 80, 'wwd', '2024-10-22 14:59:53', 7, 'pendiente'),
(15, 'Natanel ', 'joselo12@gmail.com', '9992456783', 'cumpleanos', '2024-11-30', 599, 'hahahahaha', '2024-11-01 19:14:43', 9, 'pendiente'),
(16, 'Joaquin', 'admin@admin.com', '9998080008', 'corporativo', '2024-11-28', 888, 'bien', '2024-11-01 19:15:50', 7, 'pendiente'),
(17, 'manuel', 'manuel.lv@gmail.com', '9998679690', 'comunion', '2024-11-03', 889, 'hjol', '2024-11-03 20:42:23', 5, 'realizada'),
(20, 'Omar', 'jose.omar.romero@hotmail.com', '9994567857', 'comunion', '2024-12-25', 459, 'hola', '2024-11-03 23:18:48', 6, 'pendiente'),
(21, 'jose', 'omar16.jorv@gmail.com', '9998768547', 'corporativo', '2024-12-19', 678, 'si', '2024-11-03 23:40:44', 7, 'pendiente'),
(22, 'sdsad', 'gohohjp@kaka.com', '9994567857', 'comunion', '2024-12-27', 156, 'jajajajaja', '2024-11-03 23:42:17', 6, 'pendiente'),
(23, 'Gerardo', 'Ger.lb@gmail.com', '9998754323', 'comunion', '2024-11-17', 425, 'hola', '2024-11-04 02:21:54', 7, 'pendiente'),
(24, 'kevin', 'kev.lb@gmail.com', '9998755885', 'boda', '2024-12-17', 425, 'hihoohpp', '2024-11-04 02:23:30', 7, 'pendiente'),
(25, 'Jay', 'Jay.co@gmail.com', '9991293748', 'boda', '2024-11-04', 546, 'jejeje', '2024-11-04 02:31:59', 6, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(100) DEFAULT NULL,
  `roles` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `acc` int(11) NOT NULL
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
-- Indices de la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_banquete` (`menu_banquete`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  ADD CONSTRAINT `fk_menu_banquete` FOREIGN KEY (`menu_banquete`) REFERENCES `banquete_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
