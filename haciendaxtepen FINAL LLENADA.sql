-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2024 a las 18:28:08
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
  `nombre_menu` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `descripcion_larga` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banquete_menu`
--

INSERT INTO `banquete_menu` (`id`, `nombre_menu`, `descripcion`, `descripcion_larga`, `imagen`) VALUES
(10, 'Banquete Chino', 'Un banquete chino lleno de sabor y tradición, con una selección de platos clásicos. Una experiencia culinaria que combina lo mejor de la gastronomía china en cada bocado, perfecta para cualquier ocasión especial.', '<p>Sum&eacute;rgete en una experiencia de sabores ex&oacute;ticos con nuestro delicioso banquete chino. Cada platillo est&aacute; cuidadosamente preparado con ingredientes frescos y aut&eacute;nticos, desde los cl&aacute;sicos rollitos primavera hasta el famoso pollo a la naranja. Con una variedad de opciones dulces, saladas y picantes, este men&uacute; ofrece una combinaci&oacute;n perfecta de tradici&oacute;n y sabor, ideal para sorprender a tus invitados en cualquier evento. &iexcl;Un fest&iacute;n que celebra la rica y vibrante gastronom&iacute;a china!</p>\r\n\r\n<p><strong>Entradas:</strong></p>\r\n\r\n<ul>\r\n	<li>Rollitos primavera (vegetales y carne)</li>\r\n	<li>Sopa agripicante de pollo</li>\r\n	<li>Ensalada china con aderezo de s&eacute;samo</li>\r\n	<li>Dim sum (dumplings al vapor)</li>\r\n</ul>\r\n\r\n<p><strong>Platos principales:</strong></p>\r\n\r\n<ul>\r\n	<li>Pollo a la naranja</li>\r\n	<li>Cerdo agridulce</li>\r\n	<li>Ternera con br&oacute;coli</li>\r\n	<li>Pescado a la cantonesa (al vapor con jengibre y ceboll&iacute;n)</li>\r\n	<li>Arroz frito con camarones y vegetales</li>\r\n	<li>Fideos fritos con pollo y verduras</li>\r\n	<li>Tofu al estilo Sichuan (picante)</li>\r\n</ul>\r\n\r\n<p><strong>Acompa&ntilde;amientos:</strong></p>\r\n\r\n<ul>\r\n	<li>Verduras salteadas al estilo chino (pimientos, zanahorias, hongos y brotes de bamb&uacute;)</li>\r\n	<li>Arroz jazm&iacute;n</li>\r\n	<li>Panecillos al vapor</li>\r\n</ul>\r\n\r\n<p><strong>Salsas y Aderezos:</strong></p>\r\n\r\n<ul>\r\n	<li>Salsa de soja</li>\r\n	<li>Salsa de ostras</li>\r\n	<li>Salsa picante de chile</li>\r\n	<li>Salsa hoisin</li>\r\n</ul>\r\n\r\n<p><strong>Postres (opcional):</strong></p>\r\n\r\n<ul>\r\n	<li>Pastelito de luna</li>\r\n	<li>Helado de t&eacute; verde</li>\r\n	<li>Frutas frescas (mandarinas, pi&ntilde;a y sand&iacute;a)</li>\r\n</ul>\r\n', 'images/2024-11-20-06-30-27-chino.jpg'),
(16, 'Banquete Mariscos', 'Un exquisito banquete de mariscos frescos, ideal para disfrutar en celebraciones especiales. Variedad de platillos elaborados con los mariscos más selectos, para un festín de sabor.', '<p>Disfruta de una experiencia culinaria &uacute;nica con nuestro exclusivo banquete de mariscos. Una selecci&oacute;n de los mejores productos del mar, preparados con esmero y frescura, te permitir&aacute; saborear una variedad de platillos exquisitos, desde ceviches y c&oacute;cteles hasta langosta y camarones al ajillo. Ideal para cualquier ocasi&oacute;n especial, este banquete promete deleitar a tus invitados con una fusi&oacute;n de sabores aut&eacute;nticos y sofisticados, en cada bocado. &iexcl;Una celebraci&oacute;n del mar que no querr&aacute;s perderte!</p>\r\n\r\n<p><strong>Entradas:</strong></p>\r\n\r\n<ul>\r\n	<li>Ceviche de camar&oacute;n</li>\r\n	<li>C&oacute;ctel de mariscos</li>\r\n	<li>Tostadas de at&uacute;n fresco</li>\r\n	<li>Tartar de salm&oacute;n</li>\r\n	<li>Ostiones frescos (al gusto)</li>\r\n</ul>\r\n\r\n<p><strong>Platos principales:</strong></p>\r\n\r\n<ul>\r\n	<li>Paella de mariscos (arroz con camarones, mejillones, calamares, y almejas)</li>\r\n	<li>Langosta a la mantequilla</li>\r\n	<li>Camarones al ajillo</li>\r\n	<li>Filete de pescado a la parrilla</li>\r\n	<li>Pulpo a la parrilla</li>\r\n	<li>Arroz con camarones</li>\r\n</ul>\r\n\r\n<p><strong>Acompa&ntilde;amientos:</strong></p>\r\n\r\n<ul>\r\n	<li>Ensalada fresca (con aderezo de lim&oacute;n y aceite de oliva)</li>\r\n	<li>Papas al gusto (fritas o al horno)</li>\r\n	<li>Verduras asadas (calabacitas, zanahorias y esp&aacute;rragos)</li>\r\n	<li>Arroz blanco o arroz a la mantequilla</li>\r\n</ul>\r\n\r\n<p><strong>Salsas y Aderezos:</strong></p>\r\n\r\n<ul>\r\n	<li>Salsa de ajo y lim&oacute;n</li>\r\n	<li>Salsa picante de chile y tomate</li>\r\n	<li>Mayonesa de ajo</li>\r\n	<li>Salsa t&aacute;rtara</li>\r\n</ul>\r\n\r\n<p><strong>Postres (opcional):</strong></p>\r\n\r\n<ul>\r\n	<li>Mousse de maracuy&aacute;</li>\r\n	<li>Flan de coco</li>\r\n	<li>Frutas frescas de temporada</li>\r\n</ul>\r\n', 'images/2024-11-20-06-18-36-mariscos.jpg'),
(17, 'Sabores A La Patria', 'Deléitate con los sabores tradicionales de México en un banquete lleno de color, tradición y auténticos platillos típicos', '<p>El men&uacute; <em>Banquete Mexicano</em>&nbsp;ofrece una experiencia culinaria completa, inspirada en la rica gastronom&iacute;a de nuestro pa&iacute;s. Perfecto para eventos que celebran nuestras ra&iacute;ces, este banquete incluye una amplia variedad de platillos que combinan ingredientes frescos, sabores aut&eacute;nticos y t&eacute;cnicas tradicionales.</p>\r\n\r\n<p><strong>Entrada:</strong></p>\r\n\r\n<ul>\r\n	<li>Sopes de chicharr&oacute;n prensado y frijoles refritos.</li>\r\n	<li>Guacamole con totopos de ma&iacute;z hechos a mano.</li>\r\n</ul>\r\n\r\n<p><strong>Sopa:</strong></p>\r\n\r\n<ul>\r\n	<li>Crema de poblano con elote y un toque de queso fresco.</li>\r\n</ul>\r\n\r\n<p><strong>Plato Fuerte:</strong></p>\r\n\r\n<ul>\r\n	<li>Tacos al pastor servidos con pi&ntilde;a fresca, cebolla, y cilantro.</li>\r\n	<li>Pollo en mole poblano acompa&ntilde;ado de arroz rojo.</li>\r\n	<li>Tamales de cochinita pibil envueltos en hoja de pl&aacute;tano.</li>\r\n</ul>\r\n\r\n<p><strong>Guarniciones:</strong></p>\r\n\r\n<ul>\r\n	<li>Ensalada de nopales con jitomate, queso panela y or&eacute;gano.</li>\r\n	<li>Esquites estilo tradicional con mayonesa, queso y chile en polvo.</li>\r\n</ul>\r\n\r\n<p><strong>Postres:</strong></p>\r\n\r\n<ul>\r\n	<li>Flan napolitano ba&ntilde;ado en caramelo.</li>\r\n	<li>Bu&ntilde;uelos crujientes con miel de piloncillo.</li>\r\n</ul>\r\n\r\n<p><strong>Bebidas:</strong></p>\r\n\r\n<ul>\r\n	<li>Agua fresca de jamaica y horchata.</li>\r\n	<li>Caf&eacute; de olla con canela para el cierre perfecto.&quot;</li>\r\n</ul>\r\n', 'images/2024-11-27-02-35-36-dd60947e-2c0f-4254-a0d4-3fd20223c856_5_257495-157504439545099.jpeg'),
(18, 'Elegancia Mediterranea', 'Sabores frescos y sofisticados del Mediterráneo, perfectos para un evento formal.', '<p>​​​​​​​Este men&uacute; est&aacute; dise&ntilde;ado para quienes buscan una experiencia gastron&oacute;mica fresca, saludable y sofisticada. Cada plato combina ingredientes naturales y t&eacute;cnicas tradicionales que resaltan los sabores vibrantes del Mediterr&aacute;neo.</p>\r\n\r\n<ul>\r\n	<li><strong>Entradas:</strong>\r\n\r\n	<ul>\r\n		<li>Bruschettas con tomate cherry, albahaca fresca y aceite de oliva virgen extra.</li>\r\n		<li>Ensalada de tabul&eacute; con bulgur, perejil, menta, pepino y un toque de lim&oacute;n.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Platos Fuertes:</strong>\r\n	<ul>\r\n		<li>Lubina al horno marinada en hierbas arom&aacute;ticas, acompa&ntilde;ada de vegetales asados.</li>\r\n		<li>Risotto cremoso de setas porcini y esp&aacute;rragos verdes.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Bebidas:</strong>\r\n	<ul>\r\n		<li>Vino blanco seco de uvas Sauvignon Blanc.</li>\r\n		<li>Agua infusionada con pepino, lim&oacute;n y hojas de menta.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Postres:</strong>\r\n	<ul>\r\n		<li>Tiramis&uacute; cl&aacute;sico con mascarpone y cacao.</li>\r\n		<li>Panna cotta de vainilla con coulis de frutos rojos frescos.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'images/2024-11-27-02-28-45-Alimentos-en-la-dieta-mediterranea-e1668576061910.jpg'),
(19, 'Sabores de America Latina', 'Platos llenos de tradición, colores vibrantes y especias típicas de la región.', '<p>Este men&uacute; es una celebraci&oacute;n de la diversidad y riqueza de la cocina latinoamericana. Los ingredientes aut&oacute;ctonos y las t&eacute;cnicas tradicionales se unen para crear una experiencia c&aacute;lida y vibrante.</p>\r\n\r\n<ul>\r\n	<li><strong>Entradas:</strong>\r\n\r\n	<ul>\r\n		<li><strong>Empanadas de carne:</strong> Peque&ntilde;as y doradas, rellenas con carne especiada y acompa&ntilde;adas de chimichurri fresco.</li>\r\n		<li><strong>Ceviche de camar&oacute;n:</strong> Camarones marinados en jugo de lim&oacute;n, mezclados con aguacate, cebolla morada y cilantro, servidos en copas transparentes.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Platos Fuertes:</strong>\r\n	<ul>\r\n		<li><strong>Lomo de res en tamarindo:</strong> Tiernos medallones de lomo en salsa agridulce, acompa&ntilde;ados de pur&eacute; cremoso de yuca.</li>\r\n		<li><strong>Pollo en mole poblano:</strong> Piezas de pollo ba&ntilde;adas en un mole casero, decorado con ajonjol&iacute; y servido con arroz blanco.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Bebidas:</strong>\r\n	<ul>\r\n		<li><strong>Margarita de tamarindo:</strong> Una bebida refrescante con un toque &aacute;cido y sal de chile.</li>\r\n		<li><strong>Agua fresca de horchata:</strong> Dulce y cremosa, preparada con canela y arroz.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Postres:</strong>\r\n	<ul>\r\n		<li><strong>Tres leches:</strong> Bizcocho esponjoso ba&ntilde;ado en tres tipos de leche, decorado con crema batida y fresas frescas.</li>\r\n		<li><strong>Alfajores:</strong> Galletas suaves rellenas de dulce de leche y espolvoreadas con az&uacute;car glas.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'images/2024-11-27-02-30-19-la_cocina_regional.jpg'),
(20, 'Inspiracion Italiana', 'Un recorrido por los sabores tradicionales y reconfortantes de Italia, ideal para amantes de la pasta y los postres clásicos.', '<p>Este men&uacute; est&aacute; dise&ntilde;ado para quienes buscan una experiencia gastron&oacute;mica fresca, saludable y sofisticada. Cada plato combina ingredientes naturales y t&eacute;cnicas tradicionales que resaltan los sabores de la cocina Italiana.</p>\r\n\r\n<ul>\r\n	<li><strong>Entradas:</strong>\r\n\r\n	<ul>\r\n		<li><strong>Caprese en brochetas:</strong> Mini brochetas con mozzarella fresca, albahaca y tomate cherry, decoradas con un toque de pesto.</li>\r\n		<li><strong>Arancini de risotto:</strong> Bolitas de risotto rellenas de queso, empanizadas y fritas.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Platos Fuertes:</strong>\r\n	<ul>\r\n		<li><strong>Lasagna cl&aacute;sica:</strong> Capas de pasta, rag&uacute; de carne y salsa bechamel, gratinadas con parmesano.</li>\r\n		<li><strong>Saltimbocca de pollo:</strong> Pechuga envuelta en jam&oacute;n serrano, con salsa de vino blanco.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Bebidas:</strong>\r\n	<ul>\r\n		<li><strong>Prosecco espumante:</strong> Fresco y afrutado, perfecto para maridar los sabores italianos.</li>\r\n		<li><strong>Agua con gas y rodajas de naranja.</strong></li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Postres:</strong>\r\n	<ul>\r\n		<li><strong>Tiramis&uacute;:</strong> Con capas de mascarpone, caf&eacute; y cacao amargo.</li>\r\n		<li><strong>Cannoli rellenos:</strong> Dulces crujientes rellenos de crema de ricotta y frutas confitadas.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'images/2024-11-27-02-39-15-images (3).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `nombre_personal` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fotos` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre_personal`, `descripcion`, `fotos`) VALUES
(1, 'Fotografía', 'Incluye a los mejores fotógrafos y más.', 'img_personal/2024-11-19-04-19-01-Xtepen_hacienda-cover-min.jpg'),
(3, 'Música ', 'Incluye música clásica', 'img_personal/2024-11-19-04-29-24-instructor2.jpg'),
(4, 'Bartender ', 'Lo mejor en bebida', 'img_personal/2024-11-19-04-39-42-barten.jpg'),
(5, 'Stand Up', 'Incluye un Franco Escamilla', 'img_personal/2024-11-19-04-47-21-Franco.jpg'),
(6, 'Seguridad', 'Incluye seguridad buena', 'img_personal/2024-11-19-05-18-30-seguridad.jpg'),
(8, 'Show Infantil', 'Show Infantil', 'img_personal/2024-11-27-02-46-37-bely-y-beto-003.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(11) NOT NULL,
  `nombre_promocion` varchar(100) DEFAULT NULL,
  `menu_banquete` int(11) NOT NULL,
  `tipo_evento` varchar(100) NOT NULL,
  `personal` int(11) NOT NULL,
  `invitados` int(20) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `nombre_promocion`, `menu_banquete`, `tipo_evento`, `personal`, `invitados`, `descripcion`, `imagen`) VALUES
(22, 'Sueño Dorado', 10, 'boda', 3, 300, 'Celebra el inicio de una nueva etapa con una boda que combina lujo, elegancia y sabores exquisitos. Esta promoción está diseñada para bodas de hasta 300 invitados y garantiza una experiencia inolvidable acompañada de un banquete que destaca los mejores sabores orientales y acompañando a la velada un grupo musical.', 'fotos/674732442e683_analois-photoshoot-0055_5_193443-164815363528699.jpeg'),
(23, 'Olas y Vino', 16, 'cumpleanos', 4, 150, 'Disfruta de un cumpleaños único al estilo costero, lleno de frescura, diversión y elegancia y acompañado de los mejores cocteles. Esta promoción es ideal para eventos de hasta 150 invitados, donde cada detalle está diseñado para crear una experiencia relajada y memorable.', 'img_prom/2024-11-27-03-55-13-istockphoto-612009244-612x612.jpg'),
(24, 'Orgullo Mexicano', 17, 'corporativo', 1, 300, 'Impulsa la imagen de tu empresa con un evento que celebra la riqueza de la cultura mexicana. Diseñado para hasta 300 invitados, este paquete garantiza un impacto positivo y profesional con un banquete tradicional y un servicio de fotografía profesional.', 'img_prom/2024-11-27-03-56-50-Copia-de-Copia-de-1-81-1.png'),
(25, 'Mediterraneo de Ensueño', 18, 'comunion', 8, 100, 'Haz que el bautizo de tu hijo sea un evento lleno de serenidad y buen gusto. Diseñado para hasta 100 invitados, este paquete combina un banquete elegante con entretenimiento infantil para toda la familia.', 'img_prom/2024-11-27-03-58-02-images (4).jpg'),
(26, 'Latino Vibrante', 19, 'quinceanera', 3, 500, 'Celebra los quince años con un evento lleno de color, sabor y alegría. Diseñado para hasta 500 invitados, este paquete incluye un banquete que representa la riqueza de América Latina y música en vivo que garantiza diversión.', 'img_prom/2024-11-27-04-04-32-images (5).jpg'),
(27, 'Italia para Dos', 20, 'pedida', 1, 50, 'Sorprende a tu pareja con una velada íntima y mágica inspirada en los sabores de Italia. Diseñado para reuniones de hasta 50 invitados, este paquete incluye todo para un momento inolvidable.', 'img_prom/2024-11-27-04-05-33-images (6).jpg');

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
  `estado` varchar(10) DEFAULT 'pendiente',
  `personal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas_eventos`
--

INSERT INTO `reservas_eventos` (`id`, `nombre`, `email`, `telefono`, `evento`, `fecha`, `invitados`, `mensaje`, `fecha_reserva`, `menu_banquete`, `estado`, `personal`) VALUES
(27, 'Jay', 'Jay.co@gmail.com', '9991293748', 'comunion', '2024-11-17', 546, 'snoqqp', '2024-11-05 18:25:30', NULL, 'pendiente', 3),
(28, 'Joaquin', 'joselo12@gmail.com', '9992456783', 'comunion', '2024-11-22', 78, 'pdwcdqs', '2024-11-05 18:27:32', 10, 'realizada', NULL),
(30, 'José Omar', 'jose16.jorv@gmail.com', '9993292792', 'corporativo', '2024-11-16', 200, 'kdcnosocpows', '2024-11-05 18:28:48', 10, 'cancelada', NULL),
(31, 'Kevin Ortiz', 'kevin@ortz.com', '9998653571', 'comunion', '2024-11-26', 666, 'mpspwdpdwp', '2024-11-05 18:29:56', 10, 'cancelada', NULL),
(32, 'Edrick Leon', 'ledrickon22@gmail.com', '9998688636', 'boda', '2024-12-22', 100, 'hola', '2024-11-05 19:07:38', 10, 'pendiente', 1),
(33, 'hector cetina', 'hector@hotmail.com', '9998999898', 'comunion', '2024-12-17', 1000, 'jjodjcaoesdjoecn', '2024-11-08 20:05:32', 10, 'pendiente', NULL),
(40, 'nahuel', 'nahuel.guzman@gmail.com', '9998786786', 'pedida', '2024-12-04', 50, 'knonnollnl', '2024-11-11 03:44:23', NULL, 'pendiente', NULL),
(41, 'uriel antuna', 'uriel.antuna@gmail.com', '9996453575', 'cumpleanos', '2024-11-12', 677, 'ibihohiohoh', '2024-11-11 03:45:26', NULL, 'realizada', NULL),
(42, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'quinceanera', '2024-11-29', 300, 'sadsd', '2024-11-12 14:36:36', NULL, 'pendiente', NULL),
(43, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'corporativo', '2024-12-12', 1000, 'kmsalmñasdmlñdlmñd', '2024-11-12 17:59:17', NULL, 'pendiente', NULL),
(44, 'Ulises Millan', 'Uligamer@gmail.com', '9994736528', 'comunion', '2024-11-15', 888, 'jajajajajaja', '2024-11-13 00:47:32', NULL, 'pendiente', NULL),
(45, 'Raul Achach', 'Raul.ds@gmail.com', '9998453677', 'boda', '2024-11-24', 1000, 'hahhahahahaha', '2024-11-13 01:43:03', NULL, 'pendiente', NULL),
(46, 'Raul Achach', 'Raul.ds@gmail.com', '9998453677', 'boda', '2024-11-30', 900, 'ohfehifehikfekkefs', '2024-11-13 14:44:20', 10, 'pendiente', NULL),
(47, 'José Omar', 'jose16.jorv@gmail.com', '9993292792', 'corporativo', '2024-11-13', 122, 'jajjajfeowjo´qndwófew', '2024-11-13 16:07:50', NULL, 'realizada', NULL),
(48, 'Emiliano Gaxiola', 'Gaxi_em@gmail.com', '9999877878', 'pedida', '2024-12-11', 66, 'doncnewnnocew', '2024-11-14 23:15:58', NULL, 'pendiente', 1),
(49, 'Jesus Antonio Mendoza Loeza', 'Chucho@mdz.com', '9991828366', 'quinceanera', '2024-12-07', 1000, 'ndiwqidiwqnocoqewnf', '2024-11-15 16:40:32', NULL, 'pendiente', 1),
(50, 'hector cetina', 'hector@hotmail.com', '9989384974', 'boda', '2024-12-24', 645, 'jejeje xd', '2024-11-15 19:46:03', NULL, 'pendiente', 3),
(51, 'José Omar Romero', 'le20080950@merida.tecnm.mx', '9999737383', 'quinceanera', '2024-12-31', 778, '8ry438rf8y34ry84390y348', '2024-11-15 20:06:18', 16, 'pendiente', 1),
(52, 'Edrick Leon Perez', 'jose16.jorv@gmail.com', '9995687291', 'boda', '2025-01-11', 222, 'wweq', '2024-11-27 02:57:53', 16, 'pendiente', 6),
(54, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'quinceanera', '2025-06-05', 200, 'sdasdads', '2024-11-27 03:37:43', 10, 'pendiente', 5),
(55, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'boda', '2025-07-09', 500, 'fddfgdfg', '2024-11-27 03:38:53', 10, 'pendiente', 6),
(56, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'quinceanera', '2025-03-06', 200, 'asdad', '2024-11-27 03:43:11', 10, 'pendiente', 5),
(57, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'corporativo', '2025-07-08', 0, 'sadadasd', '2024-11-27 03:43:46', 17, 'pendiente', 1),
(58, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'comunion', '2025-08-14', 700, 'ksdkdsalkkldasd', '2024-11-27 03:52:59', NULL, 'pendiente', 3),
(59, 'Edrick Leon Perez', 'ledrickon22@gmail.com', '9991939073', 'quinceanera', '2027-06-17', 0, 'asdsada', '2024-11-27 03:53:50', 16, 'pendiente', NULL),
(60, 'zvz', 'ledrickon22@gmail.com', '9991939073', 'comunion', '2024-11-28', 100, 'kjbhjj', '2024-11-27 17:01:27', 18, 'pendiente', 8);

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
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_completo`, `roles`, `email`, `contrasena`, `fecha_nacimiento`, `foto`) VALUES
(1, 'José Omar Romero Verde', '', 'jose16.jorv@gmail.com', '$2y$10$ZicN2Rx40vgmZvk9mSRAle3TaPUUI5w5xLcRbSJxoHUrzVTgIF3y.', '2001-04-01', 'fotos/2024-10-10-11-23-48-pic.jpg'),
(5, 'Jorge Mar Martínez Pérez', '', 'mar@gmail.com', '$2y$10$oBC9YW6HNu2CC9W4FzzJFekBYUXi05mN2HWLqN7yy.9bc5qv7wv2a', '2024-10-03', 'fotos/2024-10-09-07-50-01-WhatsApp Image 2024-10-09 at 1.49.02 PM.jpeg'),
(8, 'admin', '', 'admin@admin.com', '$2y$10$FGuN7OFD4V12WDUlacPDRuRXr7ecTR1f12JwjrssoTIYE6HqVVKIu', '2024-10-09', 'fotos/2024-10-09-07-51-51-WhatsApp Image 2024-10-09 at 1.49.02 PM (5).jpeg'),
(9, 'Kevin Ortiz', '', 'gaby_st@gmail.com', '$2y$10$i.BcUB7iqPjTnLeu0HZuReNXfBfP/XeSXGIysRc.4DDYreoC8ExkK', '2024-10-09', 'fotos/2024-10-09-08-31-34-WhatsApp Image 2024-10-09 at 1.49.02 PM (4).jpeg'),
(10, 'Jesus Antonio Mendoza Loeza', '', 'Chucho@mdz.com', '$2y$10$U3fF/gM5U677J/FBx9rkF./7aIJGn5Q.X8J0hFaP1gSXaxSr0NQ5S', '2024-10-09', 'fotos/2024-10-09-07-40-23-WhatsApp Image 2024-10-07 at 4.02.50 PM.jpeg'),
(11, 'Gener Alejandro Vallejos', '', 'Gner@vall.com', '$2y$10$Djfrk12mnv0b0YTX2eahueVgFvDwYNwkcXMw2OdtEfgg94YgcgtRS', '2024-10-09', 'fotos/2024-10-09-07-32-11-WhatsApp Image 2024-10-07 at 3.37.36 PM.jpeg'),
(12, 'Edrick Leon', 'administrador', 'ledrickon22@gmail.com', '$2y$10$lfP3P8Ph9ookdUsq82O8BeKCBJ6IX/gO4ZGa/y03IQizqFHfgtyai', '2002-12-22', 'fotos/2024-10-22-04-06-13-WhatsApp Image 2024-10-10 at 20.22.42.jpeg'),
(13, 'Luis Peñe', 'cliente', 'luispeine@gmial.com', '$2y$10$C/hzdZZzjAaeoJKOF58nfOZS43TpOfGSj3lRM1DY7zcG.0Na3DzmG', '2010-10-10', 'fotos/2024-10-11-02-48-59-WhatsApp Image 2024-10-10 at 22.08.54.jpeg'),
(16, 'Emilio Puigtraconis', 'administrador', 'sincorreo@hotmail.com', '$2y$10$vb33MrApR2vmBCjIHYj.yu7BFiBv1xXlMIxFoRcKNBpdVHVBI9BAy', '2006-10-20', 'fotos/2024-10-11-05-03-13-WhatsApp Image 2024-10-10 at 22.08.54.jpeg'),
(17, 'Franki segura', 'administrador', 'franki@gmail.com', '$2y$10$L67FATG8BdbV7xKzMsIqvuZv/3Us2PSd3rwmi4hmWGOw59Y7KD30.', '2005-12-10', 'fotos/2024-10-11-05-06-34-WhatsApp Image 2024-10-10 at 22.08.54.jpeg'),
(18, 'Hernia Duran', 'administrador', 'sincorreo1@hotmail.com', '$2y$10$QFRv2KziwKcAcSZ0VTIJ/O10Y00IiRLY/zrttq6NFluxr8BNzEocq', '2002-06-13', 'fotos/2024-10-22-05-56-59-WhatsApp Image 2024-10-17 at 14.23.24.jpeg'),
(19, 'Hector Cetina', 'administrador', 'hector@hotmail.com', '$2y$10$TVhUpjrMAMQ0iHZqbIMV2.BXUat9y6GjwrNJWLcX.sP6y49pokqCC', '2024-11-15', 'fotos/2024-11-15-08-12-32-Captura de pantalla_2-10-2024_161140_www.bing.com.jpeg'),
(20, 'Kevin Ortiz', 'administrador', 'kev.lb@gmail.com', '$2y$10$YxYG.mdfHAl6.OjhpFFJYOGqQwUfc/t/iE.cJSblJ5fbfAnXX1RDe', '2024-11-15', 'fotos/2024-11-15-08-13-27-WhatsApp Image 2024-10-09 at 1.49.02 PM (4).jpeg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `reservas_eventos`
--
ALTER TABLE `reservas_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
