-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2022 a las 19:53:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address_companies`
--

CREATE TABLE `address_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locality_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address_enterprises`
--

CREATE TABLE `address_enterprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locality_id` bigint(20) UNSIGNED NOT NULL,
  `enterprise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_notificacions`
--

CREATE TABLE `admin_notificacions` (
  `id` int(11) NOT NULL,
  `tabla` varchar(200) NOT NULL,
  `tabla_id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `university_id` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin_notificacions`
--

INSERT INTO `admin_notificacions` (`id`, `tabla`, `tabla_id`, `descripcion`, `university_id`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'university_services', 80, 'Agrego un nuevo servicio', 38, 1, '2022-04-08 17:04:49', '2022-04-08 19:49:47'),
(2, 'university_services', 81, 'Agrego un nuevo servicio', 38, 1, '2022-04-08 17:26:35', '2022-04-08 19:50:09'),
(3, 'university_services', 82, 'Agrego un nuevo servicio', 38, 1, '2022-04-08 17:30:05', '2022-04-08 19:52:10'),
(4, 'university_services', 83, 'Agrego un nuevo servicio', 38, 1, '2022-04-08 17:30:24', '2022-04-08 21:24:06'),
(5, 'equipment_services', 14, 'Agrego un nuevo equipo a un laboratorio', 38, 1, '2022-04-08 20:42:00', '2022-04-08 20:54:01'),
(6, 'equipment_services', 15, 'Agrego un nuevo personal a un laboratorio', 38, 1, '2022-04-08 21:12:51', '2022-04-08 21:24:06'),
(7, 'university_services', 84, 'Agregó un nuevo servicio', 38, 1, '2022-04-08 23:01:12', '2022-04-08 23:05:14'),
(8, 'equipment_services', 16, 'Agrego un nuevo equipo a un laboratorio', 38, 1, '2022-04-08 23:08:20', '2022-04-08 23:08:59'),
(9, 'equipment_services', 46, 'Agrego un nuevo equipo a un laboratorio', 38, 1, '2022-05-18 17:25:45', '2022-05-18 17:27:05'),
(10, 'university_services', 122, 'Agregó un nuevo servicio', 38, 1, '2022-05-30 23:17:21', '2022-06-03 15:50:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignars`
--

CREATE TABLE `asignars` (
  `id` bigint(20) NOT NULL,
  `enterprise_id` int(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignars`
--

INSERT INTO `asignars` (`id`, `enterprise_id`, `user_id`, `created_at`, `updated_at`) VALUES
(18, 25, 155, '2022-03-15 17:35:27', '2022-03-15 17:35:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_university_service`
--

CREATE TABLE `asignar_university_service` (
  `id` int(11) NOT NULL,
  `university_service_id` int(11) NOT NULL,
  `asignar_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignar_university_service`
--

INSERT INTO `asignar_university_service` (`id`, `university_service_id`, `asignar_id`, `created_at`, `updated_at`) VALUES
(32, 71, 18, '2022-03-18 09:55:40', '2022-03-18 09:55:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcions`
--

CREATE TABLE `descripcions` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `scian` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcions`
--

INSERT INTO `descripcions` (`id`, `descripcion`, `scian`, `created_at`, `updated_at`) VALUES
(1, 'Edificación de inmuebles comerciales y de servicios, excepto la supervisión', '236221', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Edificación de vivienda unifamiliar', '236111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Construcción de obras de urbanización', '237212', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Construcción de carreteras, puentes y similares', '237312', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Otros trabajos en exteriores', '238190', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Instalaciones eléctricas en construcciones', '238210', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Edificación de naves y plantas industriales, excepto la supervisión', '236211', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Construcción de obras de generación y conducción de energía eléctrica', '237131', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Otras instalaciones y equipamiento en construcciones', '238290', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Instalaciones de sistemas centrales de aire acondicionado y calefacción', '238222', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Supervisión de construcción de vías de comunicación', '237313', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Construcción de obras marítimas, fluviales y subacuáticas', '237992', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Otros trabajos especializados para la construcción', '238990', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Otros trabajos de acabados en edificaciones', '238390', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Construcción de obras para el tratamiento, distribución y suministro de agua y drenaje', '237111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Supervisión de construcción de obras de generación y conducción de energía eléctrica y de obras para telecomunicaciones', '237133', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Trabajos de albañilería', '238130', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Preparación de terrenos para la construcción', '238910', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Otras construcciones de ingeniería civil', '237999', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Supervisión de edificación residencial', '236113', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Supervisión de construcción de otras obras de ingeniería civil', '237994', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Construcción de sistemas de distribución de petróleo y gas', '237121', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Construcción de obras para transporte eléctrico y ferroviario', '237993', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Edificación de vivienda multifamiliar', '236112', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Construcción de plantas de refinería y petroquímica', '237122', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Construcción de obras para telecomunicaciones', '237132', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Trabajos de cimentaciones', '238110', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'División de terrenos', '237211', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Colocación de pisos flexibles y de madera', '238330', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Realización de trabajos de carpintería en el lugar de la construcción', '238350', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Instalaciones hidrosanitarias y de gas', '238221', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Colocación de muros falsos y aislamiento', '238311', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Construcción de sistemas de riego agrícola', '237112', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Montaje de estructuras de acero prefabricadas', '238122', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Construcción de obras marítimas, fluviales y subacuáticas', '237132', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_subsector`
--

CREATE TABLE `descripcion_subsector` (
  `id` int(11) NOT NULL,
  `descripcion_id` int(11) NOT NULL,
  `subsector_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcion_subsector`
--

INSERT INTO `descripcion_subsector` (`id`, `descripcion_id`, `subsector_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-08-04 18:05:02', '2022-08-04 18:05:02'),
(2, 2, 1, '2022-08-04 18:05:02', '2022-08-04 18:05:02'),
(3, 7, 1, '2022-08-04 18:05:34', '2022-08-04 18:05:34'),
(4, 20, 1, '2022-08-04 18:05:34', '2022-08-04 18:05:34'),
(5, 24, 1, '2022-08-04 18:05:50', '2022-08-04 18:05:50'),
(6, 3, 2, '2022-08-04 18:07:44', '2022-08-04 18:07:44'),
(7, 4, 2, '2022-08-04 18:07:44', '2022-08-04 18:07:44'),
(8, 8, 2, '2022-08-04 18:08:13', '2022-08-04 18:08:13'),
(9, 11, 2, '2022-08-04 18:08:13', '2022-08-04 18:08:13'),
(10, 12, 2, '2022-08-04 18:08:41', '2022-08-04 18:08:41'),
(11, 15, 2, '2022-08-04 18:08:41', '2022-08-04 18:08:41'),
(12, 16, 2, '2022-08-04 18:09:12', '2022-08-04 18:09:12'),
(13, 19, 2, '2022-08-04 18:09:12', '2022-08-04 18:09:12'),
(14, 21, 2, '2022-08-04 18:10:00', '2022-08-04 18:10:00'),
(15, 22, 2, '2022-08-04 18:10:00', '2022-08-04 18:10:00'),
(16, 0, 0, '2022-08-04 18:10:26', '2022-08-04 18:10:26'),
(17, 23, 2, '2022-08-04 18:12:43', '2022-08-04 18:12:43'),
(18, 25, 2, '2022-08-04 18:12:43', '2022-08-04 18:12:43'),
(19, 26, 2, '2022-08-04 18:12:43', '2022-08-04 18:12:43'),
(20, 35, 2, '2022-08-04 18:12:43', '2022-08-04 18:12:43'),
(21, 28, 2, '2022-08-04 18:12:43', '2022-08-04 18:12:43'),
(22, 33, 2, '2022-08-04 18:12:43', '2022-08-04 18:12:43'),
(23, 26, 2, '2022-08-04 18:13:14', '2022-08-04 18:13:14'),
(24, 35, 2, '2022-08-04 18:13:14', '2022-08-04 18:13:14'),
(25, 5, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(26, 6, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(27, 9, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(28, 10, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(29, 13, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(30, 14, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(31, 17, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(32, 18, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(33, 27, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(34, 29, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(35, 30, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(36, 31, 3, '2022-08-04 18:17:56', '2022-08-04 18:17:56'),
(37, 32, 3, '2022-08-04 18:18:27', '2022-08-04 18:18:27'),
(38, 34, 3, '2022-08-04 18:18:27', '2022-08-04 18:18:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_sector`
--

CREATE TABLE `empresa_sector` (
  `id` int(11) NOT NULL,
  `enterpris_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `subsector_id` int(11) NOT NULL,
  `descripcion_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprises`
--

CREATE TABLE `enterprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enterprises`
--

INSERT INTO `enterprises` (`id`, `name`, `phone`, `email`, `giro`, `description`, `test_link`, `location`, `image`, `created_at`, `updated_at`) VALUES
(25, 'Prueba', '(+52) 123-347-69-87', 'prueba@empresa.com', 'Prueba', 'prueba', 'prueba.com', 'xalapa', 'enterprises/gq4GOVjlQ8dWO3CNTNXa8jnfSANNpG95GG4L9nJI.jpg', '2022-03-15 17:35:19', '2022-03-15 17:35:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_projects`
--

CREATE TABLE `enterprise_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enterprise_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_services`
--

CREATE TABLE `enterprise_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enterprise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enterprise_services`
--

INSERT INTO `enterprise_services` (`id`, `name`, `area`, `type`, `description`, `enterprise_id`, `created_at`, `updated_at`) VALUES
(20, 'Mantenimiento De Ordenadores', 'Ingeniería en sistemas', 'Por Servicio', 'Se solicita ingeniero en sistemas para dar mantenimiento a las computadoras', 25, '2022-03-15 17:37:49', '2022-03-15 17:37:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise_service_university`
--

CREATE TABLE `enterprise_service_university` (
  `id` int(11) NOT NULL,
  `enterprise_service_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipment_services`
--

CREATE TABLE `equipment_services` (
  `id` int(11) NOT NULL,
  `inventario` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `laboratorio` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `capacidad` text DEFAULT NULL,
  `funcionalidad` text DEFAULT NULL,
  `trabajos` text DEFAULT NULL,
  `lineas` text DEFAULT NULL,
  `servicios` text DEFAULT NULL,
  `grado` varchar(100) DEFAULT NULL,
  `certificaciones` text DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL,
  `university_service_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipment_services`
--

INSERT INTO `equipment_services` (`id`, `inventario`, `nombre`, `marca`, `modelo`, `laboratorio`, `descripcion`, `capacidad`, `funcionalidad`, `trabajos`, `lineas`, `servicios`, `grado`, `certificaciones`, `carrera`, `university_service_id`, `deleted_at`, `updated_at`, `created_at`) VALUES
(9, 'S/N', 'Cámara Termográfica', 'RoHS', 'RoHS', 'Equipo', 'El equipo se apunta al tablero,  circuito eléctrico o mecanismo en cuestión el cual detecta y mide la energía infrarroja de los objetos. La cámara convierte los datos infrarrojos en una imagen electrónica que muestra la temperatura aparente de la superficie del objeto medido. Esta imagén sirve para determinar puntos calientes, falsos contactos y en base a ello poder programar mantenimientos preventivos.', NULL, 'El equipo se apunta al tablero,  circuito eléctrico o mecanismo en cuestión el cual detecta y mide la energía infrarroja de los objetos. La cámara convierte los datos infrarrojos en una imagen electrónica que muestra la temperatura aparente de la superficie del objeto medido. Esta imagén sirve para determinar puntos calientes, falsos contactos y en base a ello poder programar mantenimientos preventivos.', '-20 °C a 300 °C y lectura de 50cm de distancia.', 'Calidad y ahorro de energía y\r\nMantenimiento predictivo mecánico en máquinas eléctricas', 'Introducción al análisis de circuitos y máquinas eléctricas y mecánicas a través de cámaras termográficas', NULL, NULL, NULL, 73, NULL, '2022-03-17 18:20:08', '2022-03-17 18:20:08'),
(10, '123', 'Baño Termostatado', 'Marca X', '6798', 'Equipo', 'Especialmente diseñado para controlar la\r\ntemperatura de un modo real. Su\r\nsistema de programación, facilidad\r\nde manejo, aislamiento, precisión lo\r\nhacen muy adecuado para mantener\r\nla temperatura constante en distintos\r\ntipos de muestras que se puedan\r\nsumergir en el líquido del baño\r\n(generalmente agua). Mayor\r\ninformación', NULL, 'Para aplicaciones de temperatura a sistemas internos y externos de hasta +300°C', 'Para aplicaciones de temperatura a\r\nsistemas internos y externos de hasta +300°C', 'Ingeniería en alimentos', 'x', NULL, NULL, NULL, 75, NULL, '2022-03-22 16:43:09', '2022-03-22 16:43:09'),
(11, NULL, 'Cinthia FR', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Alimentos ...', NULL, 'Doctorado en ...', 'xxx', 'Ing. Química, Ing. en alimentos ...', 75, NULL, '2022-03-22 16:45:36', '2022-03-22 16:45:36'),
(12, '208', 'Freadora novamill', 'Denford', 'Novamill atc nc', 'Equipo', 'Fresadora de 3 ejes(x y z), con un carrucel de 6 posiciones, con una bancada de  36cm por 13cm', NULL, 'Careados, desbatados, ranurados, barrenos  en un plano de planta.', 'Piezas  en una sola dimensión sobre el plano de planta eje (Z)', 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', 'Puesta en pie de máquina, dibujo asistido por computadora (CAD), manfactura asistida por comptadora(CAM), códigos G y M.', NULL, NULL, NULL, 89, NULL, '2022-03-24 18:01:20', '2022-03-24 18:01:20'),
(13, '104', 'Taladro de bancada con escote', 'Excel', 'XL-25F', 'Equipo', 'Taladro de bancada, con un broquero de una pulgada, con diferentes velocidades,  con prensa de sujeción.', NULL, 'Barrenos con diferentes brocas de diámetro.', 'Barrenos y cuerdas con machuelos.', 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', 'Manejo de la máquina y puesta en marcha.', NULL, NULL, NULL, 89, NULL, '2022-03-24 18:05:27', '2022-03-24 18:05:27'),
(14, '87', 'Torno M-300', 'Harrizon', 'M-300 GH', 'Equipo', 'Es un torno semi automático,con una bancada de un metro lineal, con dos carros de desplazamiento (carro longitudinal y carro transversal), y un contrapunto con una velocidad máxima de 540 rpm y con una mínima de 40rpm.', NULL, 'Roscas, careado, desvastados, ranurados, machueleados, achurados.', 'Desbaste sobre piezas cilíndricas y cuerdas.', 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', 'Puesta en pie de la máquina, manejo de operaciones y cuerdas.', NULL, NULL, NULL, 89, NULL, '2022-03-24 18:08:03', '2022-03-24 18:08:03'),
(15, '88', 'Fresadora mecánica', 'Excel', 'PUH-L', 'Equipo', 'Tiene tres ejes manuales (X,Y,Z)manejados con manivelas, tiene dos posiciones horizontal y vertical, con un máximo de  cono  de media pulgada,  puede utilizar cortadores verticales como insertos  o con su porta herramienta. Semiatomática  en el eje X  con una bancada de un metro por  24cm.', NULL, 'Careados, desbatados, ranurados, engranes.', 'Piezas  sobre el plano de planta, ranurados y machuelados.', 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', 'Puesta en marcha en pie de la máquina y maquinados manuales.', NULL, NULL, NULL, 89, NULL, '2022-03-24 18:10:28', '2022-03-24 18:10:28'),
(16, '89', 'Torno Boxford 250', 'Boxford', '205_pc', 'Equipo', 'Es automatizado con 2 ejes (x y z) con dos carros  uno longitudinal y otro transversal, con una bancada  de 80cm.', NULL, 'Piezas con exactitud  en barras cilindricas', 'Piezas sobre el eje z', 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', 'Puesta en pie de máquina, dibujo asistido por computadora (CAD), manufactura asistida por computadora(CAM), códigos G y M.', NULL, NULL, NULL, 89, NULL, '2022-03-24 18:12:31', '2022-03-24 18:12:31'),
(17, NULL, 'Felipe Dey García', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', NULL, 'Licenciatura', 'Seguridad Industrial\r\nSolidwoks \r\nCadena de Suministro\r\nManufactura Esbelta', 'INGENIERÍA INDUSTRIAL', 89, NULL, '2022-03-24 18:17:29', '2022-03-24 18:17:29'),
(18, NULL, 'Leslye Yamileth Garrido Quintero', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', NULL, 'Maestría', NULL, 'INGENIERÍA INDUSTRIAL', 89, NULL, '2022-03-24 18:19:03', '2022-03-24 18:19:03'),
(19, '582', 'Centrífuga de lacteos', 'Gerber instruments', 'S/M', 'Equipo', 'Se pueden realizar los siguientes métodos: Determinación de grasa según Gerber y Babcock\r\nDeterminación de la solubilidad según Gerber y ADPI', NULL, 'Separación y análisis de productos lácteos', 'Composición química de la leche\r\nAnálisis de yogourt', NULL, NULL, NULL, NULL, NULL, 90, NULL, '2022-03-24 20:27:16', '2022-03-24 20:27:16'),
(20, '6841 y 6840', '(2)unidad de control 1', 'HITECH', 'SN', 'Equipo', 'Módulo para la practicas de PLC  para los sistemas mecatrónicos, el robot 3d y el simulador de estampado.', NULL, 'Simulaciones', 'NA', 'Automatización', 'NA', NULL, NULL, NULL, 92, NULL, '2022-03-24 21:46:25', '2022-03-24 21:46:25'),
(21, '6838', 'Sistema mecatrónico 1', 'HITECH', 'SN', 'Equipo', 'Sistema de simulación para procesos industriales tales como fresado y taladrado.', NULL, 'Simulaciones', 'No aplica', 'Automatización', 'No aplica', NULL, NULL, NULL, 92, NULL, '2022-03-24 21:51:37', '2022-03-24 21:51:37'),
(22, '6836', 'Sistema mecatronico2', 'HITECH', 'SN', 'Equipo', 'Sistema de simulación para procesos industriales los culés utilizan la neumática', NULL, 'Simulaciones', 'No aplica', 'Automatización', 'No aplica', NULL, NULL, NULL, 92, NULL, '2022-03-24 21:55:19', '2022-03-24 21:55:19'),
(24, '6837', 'Robod 3d con manipulador', 'HITECH', 'SN', 'Equipo', 'Sistema de simulación de un brazo robótico de 3 ejes', NULL, 'Simulaciones', 'No aplica', 'Automatización', 'No aplica', NULL, NULL, NULL, 92, NULL, '2022-03-24 22:00:02', '2022-03-24 22:00:02'),
(25, '6839', 'Simulador de estampado', 'HITECH', 'SN', 'Equipo', 'Sistema de simulación para procesos industriales como estampadoras', NULL, 'Simulaciones', 'No aplica', 'Automatización', 'No aplica', NULL, NULL, NULL, 92, NULL, '2022-03-24 22:01:39', '2022-03-24 22:01:39'),
(26, 'N/A', 'IMPRESORAS 3D', 'CREALITY', 'V3', 'Equipo', 'EQUIPO DE IMPRESIÓN 3D', NULL, 'Tiene un volumen de construcción de 220 x 220 x 250 mm, una placa de construcción calentada similar a BuildTak, un modo de recuperación de energía y un canal de filamento estrecho, lo que facilita el uso de materiales flexibles para imprimir.', 'PROTOTIPOS DE SIMULACIÓN MÉDICA, DISEÑO ARQUITECTÓNICO, DECORACIÓN DE HOGAR, ACCESORIOS DE CINE Y TELEVISIÓN.', NULL, 'DISEÑO Y FABRICACIÓN DE ELEMENTOS EN PLA CON GRADO DE COMPLEJIDAD EN 3 EJES.', NULL, NULL, NULL, 76, NULL, '2022-03-24 22:32:53', '2022-03-24 22:32:53'),
(27, NULL, 'ING. DAVID RODOLFO GARCÍA MORENO', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, NULL, NULL, 'LICENCIATURA', NULL, 'INGENIERÍA ELECTROMECÁNICA', 76, NULL, '2022-03-24 22:34:22', '2022-03-24 22:34:22'),
(28, 'N/A', 'TORNO PARALELO', 'TITANIUM', 'TY-1440', 'Equipo', 'Los tornos Titanium ha sido diseñados especialmente para el taller de reparación de piezas de trabajo en general y de precisión, así como para la enseñanza de escuelas técnicas. Son capaces de maquinar: refacciones, flechas, bujes, casquillos, poleas, levas, etc. De construcción robusta y resistente, realizan muy buenos cortes además de maquinados de precisión. * Engranados totalmente, los tornos Titanium cuentan con caja Norton, que es una caja de engranes cerrada bañada de aceite y tiene un árbol principal o husillo soportado con rodamientos de alta calidad. * La bancada es robusta y los prismas son templados y rectificados. * Fácil de manejar, de operación sencilla, el torno Titanium es un torno diferente', NULL, 'Maquinar: refacciones, flechas, bujes, casquillos, poleas, levas, etc.', 'ELEMENTOS MAQUINADOS SOBRE EJE DE ROTACIÓN HASTA 500MM Y DIAMETRO HASTA 200MM', NULL, 'DISEÑO Y MAQUINADO DE ELEMENTOS DE MAQUNAS ESPECIALES.', NULL, NULL, NULL, 77, NULL, '2022-03-24 22:41:35', '2022-03-24 22:41:35'),
(29, NULL, 'ING. DAVID RODOLFO GARCÍA MORENO', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, NULL, NULL, 'LICENCIATURA', NULL, 'INGENIERÍA ELECTROMECÁNICA', 77, NULL, '2022-03-24 22:42:25', '2022-03-24 22:42:25'),
(30, 'S/N', 'Impresora 3D', 'Ender', '3', 'Equipo', 'Impresora 3D para modelado', NULL, 'Imprimir modelos de piezas.', 'Productos', 'Dispositivos, circuitos y sistema: aplicaciones en instrumentación y control.', 'Impresión de modelos en 3D.', NULL, NULL, NULL, 102, NULL, '2022-03-24 22:49:45', '2022-03-24 22:48:01'),
(31, '1623, 1524', 'SOLDADORA', 'INFRA', 'MI 250', 'Equipo', '2 MAQUINA DE SOLDAR INFRA 250 A,', NULL, 'SOLDADURAS EN DISTINTOS AMPERAJES Y CICLOS DE TRABAJO', 'UNION DE PIEZAS METALICAS EN ACERO CASERAS, COMERCIALES E INDUSTRIALES.', 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', 'SOLDADURAS DE MUEBLES METÁLICOS, HERRERIA, ESTRUCTURAS METÁLICAS EN ACERO.', NULL, NULL, NULL, 103, NULL, '2022-03-24 22:53:33', '2022-03-24 22:53:33'),
(32, NULL, 'VICENTE HERNÁNDEZ HERNÁNDEZ', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Diseño y mejora de procesos y productos LGAC-2017-SXAL-IIND-15', NULL, 'TÉCNICO', 'Pendientes', 'INGENIERÍA ELECTROMÉCANICA', 103, NULL, '2022-03-24 22:58:33', '2022-03-24 22:54:44'),
(33, '2', 'Hornos de gaveta', 'Diamantini', 'M-14-140', 'Equipo', 'Con capacidad para 4 charolas grandes', NULL, 'Horneado de pan, galletas, pasteles, piezas enteras de pollo, pavos, pierna de cerdo', 'N/A', 'N/A', 'Cursos formativos, de panadería, repostería, coctelería.', NULL, NULL, NULL, 104, NULL, '2022-03-25 17:24:24', '2022-03-25 17:24:24'),
(34, '6', 'Licuadoras', 'Ninja', 'QB 1004', 'Equipo', 'Dos litros', NULL, 'Elaboración de bebidas, preparadas con y sin alcohol, procesadores de alimentos', 'N/A', 'N/A', NULL, NULL, NULL, NULL, 104, NULL, '2022-03-25 17:26:41', '2022-03-25 17:26:41'),
(35, NULL, 'Isaí Pacheco Tejeda', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Diseño de Sistema Mecatrónicos', NULL, 'Maestría', 'Solid Works', 'INGENIERÍA MECATRÓNICA', 92, NULL, '2022-03-25 18:17:35', '2022-03-25 18:17:35'),
(36, NULL, 'Luis Ricardo Gallardo Montiel', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Diseño de Sistema Mecatrónicos', NULL, 'Técnico', NULL, 'INGENIERÍA MECATRÓNICA', 92, NULL, '2022-03-25 18:18:38', '2022-03-25 18:18:38'),
(38, NULL, 'Edgar Emilio Castillo Cortés', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, NULL, NULL, 'Licenciatura', NULL, 'LICENCIATURA EN GASTRONOMÍA', 104, NULL, '2022-03-25 18:41:50', '2022-03-25 18:41:50'),
(39, '8014', 'Campana de flujo laminar', 'Ecoshel', 'IIAL', 'Equipo', 'Campaña de siembra de MO  de 3 ejes(x y z),', NULL, 'Realización de siembra de MO contener un ambiente aislado para evitar la contaminación.', 'Piezas  en una sola dimensión sobre el plano de planta eje (Z)', 'Microbiología', 'Utilización  siembra de MO, llenado de material estéril y antibióticos, siembra no patógenos', NULL, NULL, NULL, 105, NULL, '2022-03-25 22:23:35', '2022-03-25 22:23:35'),
(40, NULL, 'Aidé Romero Luna', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, 'Tecnología de Alimentos', NULL, 'Doctora', NULL, 'INGENIERIA EN INDUSTRIAS ALIMENTARIAS', 105, NULL, '2022-03-25 22:52:02', '2022-03-25 22:43:34'),
(41, '7514', 'Termobalanza', 'MA 50/1.R', 'RADWAG', 'Equipo', 'Termobalanza  de 3 ejes(x y z), con un balanza analítica, con charola para deposito de producto para determinar humedad', NULL, 'Pesado de producto alimenticio, determinación de humedad contenida.', 'Piezas  en una sola dimensión sobre el plano de planta eje (Z)', NULL, 'Determinación de  la cantidad de humedad contenida en los alimentos analizados.', NULL, NULL, NULL, 105, NULL, '2022-03-25 22:48:43', '2022-03-25 22:48:43'),
(42, '10010,10011,10012,10013', 'ROUTER', 'CISCO', 'Router cisco', 'Equipo', 'Creación de redes de internet', NULL, 'Redes de computadora, administración y configuración de redes ,conmutación y enroutamiento de redes, redes inalámbricas, administración de redes.', NULL, NULL, NULL, NULL, NULL, NULL, 109, NULL, '2022-03-28 22:30:52', '2022-03-28 22:30:52'),
(43, '10023,10024,10025,10026,10027,10028,10029', NULL, 'Switch', '4250T483C17305', 'Equipo', 'Switch cisco', NULL, NULL, 'Creación de redes de internet', NULL, 'Redes de computadora, administración y configuración de redes, conmutación y enroutamiento de redes, redes inalámbricas, administración de redes.', NULL, NULL, NULL, 109, NULL, '2022-03-28 22:37:17', '2022-03-28 22:37:17'),
(44, NULL, 'Jorge Arturo Adad Rodríguez', NULL, NULL, 'Personal', NULL, NULL, NULL, NULL, NULL, NULL, 'Técnico', NULL, 'Ingeniería en Sistemas Computacionales', 109, NULL, '2022-03-28 22:45:52', '2022-03-28 22:45:52'),
(45, 'ITSJRC/250/2012', 'Microscopio', 'Revelation', 'CRISA/M111', 'Equipo', '- Análisis de Falla\r\n- Magnificación hasta 6000x\r\n- Medición 2D y 3D\r\n- Metalografía\r\n- Con Lentes de Alta Resolución,', NULL, 'Es una herramienta que permite observar elementos que no pueden observarse o son invisibles a simple vista, a través de lentes, visores y rayos de luz, que acercan o agrandan la imagen en escalas convenientes para su examinación y análisis.', NULL, NULL, NULL, NULL, NULL, NULL, 119, NULL, '2022-03-29 03:06:53', '2022-03-29 03:06:53'),
(46, '8965', 'ejemplo', 'ejemplo', 'ejemplo', 'Equipo', 'ejemplo', NULL, 'ejemplo', 'ejemplo', 'ejemplo', 'ejemplo', NULL, NULL, NULL, 73, NULL, '2022-05-18 17:25:45', '2022-05-18 17:25:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_imagens`
--

CREATE TABLE `equipo_imagens` (
  `id` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `equipment_service_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `id` int(11) NOT NULL,
  `linea` varchar(200) NOT NULL,
  `modalidad` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`id`, `linea`, `modalidad`, `unidad`, `carrera_id`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 'ROBOTICA AVANZADA', 1, 797, 874, 38, '2022-03-29 00:07:09', '2022-03-29 22:44:18'),
(2, 'INTERNET DE LAS COSAS', 1, 797, 3173, 38, '2022-03-29 15:40:15', '2022-03-29 22:07:25'),
(4, 'INVESTIGACIÓN', 1, 797, 874, 38, '2022-03-31 17:28:52', '2022-03-31 17:28:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_07_09_023430_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_07_09_023830_create_universities_table', 1),
(6, '2020_07_09_023941_create_university_services_table', 1),
(7, '2020_07_09_024014_create_projects_table', 1),
(8, '2020_07_09_024659_create_students_table', 1),
(9, '2020_07_09_024757_create_evaluations_table', 1),
(10, '2020_07_09_024905_create_project_students_table', 1),
(11, '2020_07_09_025001_create_enterprises_table', 1),
(12, '2020_07_09_025036_create_enterprise_projects_table', 1),
(13, '2020_07_09_025221_create_enterprise_services_table', 1),
(14, '2020_07_09_025311_create_states_table', 1),
(15, '2020_07_09_025337_create_municipalities_table', 1),
(16, '2020_07_09_025537_create_localities_table', 1),
(17, '2020_07_09_025652_create_address_enterprises_table', 1),
(18, '2020_07_10_045108_create_vacancies_table', 1),
(19, '2020_10_16_011146_create_address_companies_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipalities`
--

INSERT INTO `municipalities` (`id`, `state_id`, `clave`, `name`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '001', 'Aguascalientes', '1', NULL, NULL),
(2, 1, '002', 'Asientos', '1', NULL, NULL),
(3, 1, '003', 'Calvillo', '1', NULL, NULL),
(4, 1, '004', 'Cosío', '1', NULL, NULL),
(5, 1, '005', 'Jesús María', '1', NULL, NULL),
(6, 1, '006', 'Pabellón de Arteaga', '1', NULL, NULL),
(7, 1, '007', 'Rincón de Romos', '1', NULL, NULL),
(8, 1, '008', 'San José de Gracia', '1', NULL, NULL),
(9, 1, '009', 'Tepezalá', '1', NULL, NULL),
(10, 1, '010', 'El Llano', '1', NULL, NULL),
(11, 1, '011', 'San Francisco de los Romo', '1', NULL, NULL),
(12, 2, '001', 'Ensenada', '1', NULL, NULL),
(13, 2, '002', 'Mexicali', '1', NULL, NULL),
(14, 2, '003', 'Tecate', '1', NULL, NULL),
(15, 2, '004', 'Tijuana', '1', NULL, NULL),
(16, 2, '005', 'Playas de Rosarito', '1', NULL, NULL),
(17, 3, '001', 'Comondú', '1', NULL, NULL),
(18, 3, '002', 'Mulegé', '1', NULL, NULL),
(19, 3, '003', 'La Paz', '1', NULL, NULL),
(20, 3, '008', 'Los Cabos', '1', NULL, NULL),
(21, 3, '009', 'Loreto', '1', NULL, NULL),
(22, 4, '001', 'Calkiní', '1', NULL, NULL),
(23, 4, '002', 'Campeche', '1', NULL, NULL),
(24, 4, '003', 'Carmen', '1', NULL, NULL),
(25, 4, '004', 'Champotón', '1', NULL, NULL),
(26, 4, '005', 'Hecelchakán', '1', NULL, NULL),
(27, 4, '006', 'Hopelchén', '1', NULL, NULL),
(28, 4, '007', 'Palizada', '1', NULL, NULL),
(29, 4, '008', 'Tenabo', '1', NULL, NULL),
(30, 4, '009', 'Escárcega', '1', NULL, NULL),
(31, 4, '010', 'Calakmul', '1', NULL, NULL),
(32, 4, '011', 'Candelaria', '1', NULL, NULL),
(33, 5, '001', 'Abasolo', '1', NULL, NULL),
(34, 5, '002', 'Acuña', '1', NULL, NULL),
(35, 5, '003', 'Allende', '1', NULL, NULL),
(36, 5, '004', 'Arteaga', '1', NULL, NULL),
(37, 5, '005', 'Candela', '1', NULL, NULL),
(38, 5, '006', 'Castaños', '1', NULL, NULL),
(39, 5, '007', 'Cuatro Ciénegas', '1', NULL, NULL),
(40, 5, '008', 'Escobedo', '1', NULL, NULL),
(41, 5, '009', 'Francisco I. Madero', '1', NULL, NULL),
(42, 5, '010', 'Frontera', '1', NULL, NULL),
(43, 5, '011', 'General Cepeda', '1', NULL, NULL),
(44, 5, '012', 'Guerrero', '1', NULL, NULL),
(45, 5, '013', 'Hidalgo', '1', NULL, NULL),
(46, 5, '014', 'Jiménez', '1', NULL, NULL),
(47, 5, '015', 'Juárez', '1', NULL, NULL),
(48, 5, '016', 'Lamadrid', '1', NULL, NULL),
(49, 5, '017', 'Matamoros', '1', NULL, NULL),
(50, 5, '018', 'Monclova', '1', NULL, NULL),
(51, 5, '019', 'Morelos', '1', NULL, NULL),
(52, 5, '020', 'Múzquiz', '1', NULL, NULL),
(53, 5, '021', 'Nadadores', '1', NULL, NULL),
(54, 5, '022', 'Nava', '1', NULL, NULL),
(55, 5, '023', 'Ocampo', '1', NULL, NULL),
(56, 5, '024', 'Parras', '1', NULL, NULL),
(57, 5, '025', 'Piedras Negras', '1', NULL, NULL),
(58, 5, '026', 'Progreso', '1', NULL, NULL),
(59, 5, '027', 'Ramos Arizpe', '1', NULL, NULL),
(60, 5, '028', 'Sabinas', '1', NULL, NULL),
(61, 5, '029', 'Sacramento', '1', NULL, NULL),
(62, 5, '030', 'Saltillo', '1', NULL, NULL),
(63, 5, '031', 'San Buenaventura', '1', NULL, NULL),
(64, 5, '032', 'San Juan de Sabinas', '1', NULL, NULL),
(65, 5, '033', 'San Pedro', '1', NULL, NULL),
(66, 5, '034', 'Sierra Mojada', '1', NULL, NULL),
(67, 5, '035', 'Torreón', '1', NULL, NULL),
(68, 5, '036', 'Viesca', '1', NULL, NULL),
(69, 5, '037', 'Villa Unión', '1', NULL, NULL),
(70, 5, '038', 'Zaragoza', '1', NULL, NULL),
(71, 6, '001', 'Armería', '1', NULL, NULL),
(72, 6, '002', 'Colima', '1', NULL, NULL),
(73, 6, '003', 'Comala', '1', NULL, NULL),
(74, 6, '004', 'Coquimatlán', '1', NULL, NULL),
(75, 6, '005', 'Cuauhtémoc', '1', NULL, NULL),
(76, 6, '006', 'Ixtlahuacán', '1', NULL, NULL),
(77, 6, '007', 'Manzanillo', '1', NULL, NULL),
(78, 6, '008', 'Minatitlán', '1', NULL, NULL),
(79, 6, '009', 'Tecomán', '1', NULL, NULL),
(80, 6, '010', 'Villa de Álvarez', '1', NULL, NULL),
(81, 7, '001', 'Acacoyagua', '1', NULL, NULL),
(82, 7, '002', 'Acala', '1', NULL, NULL),
(83, 7, '003', 'Acapetahua', '1', NULL, NULL),
(84, 7, '004', 'Altamirano', '1', NULL, NULL),
(85, 7, '005', 'Amatán', '1', NULL, NULL),
(86, 7, '006', 'Amatenango de la Frontera', '1', NULL, NULL),
(87, 7, '007', 'Amatenango del Valle', '1', NULL, NULL),
(88, 7, '008', 'Angel Albino Corzo', '1', NULL, NULL),
(89, 7, '009', 'Arriaga', '1', NULL, NULL),
(90, 7, '010', 'Bejucal de Ocampo', '1', NULL, NULL),
(91, 7, '011', 'Bella Vista', '1', NULL, NULL),
(92, 7, '012', 'Berriozábal', '1', NULL, NULL),
(93, 7, '013', 'Bochil', '1', NULL, NULL),
(94, 7, '014', 'El Bosque', '1', NULL, NULL),
(95, 7, '015', 'Cacahoatán', '1', NULL, NULL),
(96, 7, '016', 'Catazajá', '1', NULL, NULL),
(97, 7, '017', 'Cintalapa', '1', NULL, NULL),
(98, 7, '018', 'Coapilla', '1', NULL, NULL),
(99, 7, '019', 'Comitán de Domínguez', '1', NULL, NULL),
(100, 7, '020', 'La Concordia', '1', NULL, NULL),
(101, 7, '021', 'Copainalá', '1', NULL, NULL),
(102, 7, '022', 'Chalchihuitán', '1', NULL, NULL),
(103, 7, '023', 'Chamula', '1', NULL, NULL),
(104, 7, '024', 'Chanal', '1', NULL, NULL),
(105, 7, '025', 'Chapultenango', '1', NULL, NULL),
(106, 7, '026', 'Chenalhó', '1', NULL, NULL),
(107, 7, '027', 'Chiapa de Corzo', '1', NULL, NULL),
(108, 7, '028', 'Chiapilla', '1', NULL, NULL),
(109, 7, '029', 'Chicoasén', '1', NULL, NULL),
(110, 7, '030', 'Chicomuselo', '1', NULL, NULL),
(111, 7, '031', 'Chilón', '1', NULL, NULL),
(112, 7, '032', 'Escuintla', '1', NULL, NULL),
(113, 7, '033', 'Francisco León', '1', NULL, NULL),
(114, 7, '034', 'Frontera Comalapa', '1', NULL, NULL),
(115, 7, '035', 'Frontera Hidalgo', '1', NULL, NULL),
(116, 7, '036', 'La Grandeza', '1', NULL, NULL),
(117, 7, '037', 'Huehuetán', '1', NULL, NULL),
(118, 7, '038', 'Huixtán', '1', NULL, NULL),
(119, 7, '039', 'Huitiupán', '1', NULL, NULL),
(120, 7, '040', 'Huixtla', '1', NULL, NULL),
(121, 7, '041', 'La Independencia', '1', NULL, NULL),
(122, 7, '042', 'Ixhuatán', '1', NULL, NULL),
(123, 7, '043', 'Ixtacomitán', '1', NULL, NULL),
(124, 7, '044', 'Ixtapa', '1', NULL, NULL),
(125, 7, '045', 'Ixtapangajoya', '1', NULL, NULL),
(126, 7, '046', 'Jiquipilas', '1', NULL, NULL),
(127, 7, '047', 'Jitotol', '1', NULL, NULL),
(128, 7, '048', 'Juárez', '1', NULL, NULL),
(129, 7, '049', 'Larráinzar', '1', NULL, NULL),
(130, 7, '050', 'La Libertad', '1', NULL, NULL),
(131, 7, '051', 'Mapastepec', '1', NULL, NULL),
(132, 7, '052', 'Las Margaritas', '1', NULL, NULL),
(133, 7, '053', 'Mazapa de Madero', '1', NULL, NULL),
(134, 7, '054', 'Mazatán', '1', NULL, NULL),
(135, 7, '055', 'Metapa', '1', NULL, NULL),
(136, 7, '056', 'Mitontic', '1', NULL, NULL),
(137, 7, '057', 'Motozintla', '1', NULL, NULL),
(138, 7, '058', 'Nicolás Ruíz', '1', NULL, NULL),
(139, 7, '059', 'Ocosingo', '1', NULL, NULL),
(140, 7, '060', 'Ocotepec', '1', NULL, NULL),
(141, 7, '061', 'Ocozocoautla de Espinosa', '1', NULL, NULL),
(142, 7, '062', 'Ostuacán', '1', NULL, NULL),
(143, 7, '063', 'Osumacinta', '1', NULL, NULL),
(144, 7, '064', 'Oxchuc', '1', NULL, NULL),
(145, 7, '065', 'Palenque', '1', NULL, NULL),
(146, 7, '066', 'Pantelhó', '1', NULL, NULL),
(147, 7, '067', 'Pantepec', '1', NULL, NULL),
(148, 7, '068', 'Pichucalco', '1', NULL, NULL),
(149, 7, '069', 'Pijijiapan', '1', NULL, NULL),
(150, 7, '070', 'El Porvenir', '1', NULL, NULL),
(151, 7, '071', 'Villa Comaltitlán', '1', NULL, NULL),
(152, 7, '072', 'Pueblo Nuevo Solistahuacán', '1', NULL, NULL),
(153, 7, '073', 'Rayón', '1', NULL, NULL),
(154, 7, '074', 'Reforma', '1', NULL, NULL),
(155, 7, '075', 'Las Rosas', '1', NULL, NULL),
(156, 7, '076', 'Sabanilla', '1', NULL, NULL),
(157, 7, '077', 'Salto de Agua', '1', NULL, NULL),
(158, 7, '078', 'San Cristóbal de las Casas', '1', NULL, NULL),
(159, 7, '079', 'San Fernando', '1', NULL, NULL),
(160, 7, '080', 'Siltepec', '1', NULL, NULL),
(161, 7, '081', 'Simojovel', '1', NULL, NULL),
(162, 7, '082', 'Sitalá', '1', NULL, NULL),
(163, 7, '083', 'Socoltenango', '1', NULL, NULL),
(164, 7, '084', 'Solosuchiapa', '1', NULL, NULL),
(165, 7, '085', 'Soyaló', '1', NULL, NULL),
(166, 7, '086', 'Suchiapa', '1', NULL, NULL),
(167, 7, '087', 'Suchiate', '1', NULL, NULL),
(168, 7, '088', 'Sunuapa', '1', NULL, NULL),
(169, 7, '089', 'Tapachula', '1', NULL, NULL),
(170, 7, '090', 'Tapalapa', '1', NULL, NULL),
(171, 7, '091', 'Tapilula', '1', NULL, NULL),
(172, 7, '092', 'Tecpatán', '1', NULL, NULL),
(173, 7, '093', 'Tenejapa', '1', NULL, NULL),
(174, 7, '094', 'Teopisca', '1', NULL, NULL),
(175, 7, '096', 'Tila', '1', NULL, NULL),
(176, 7, '097', 'Tonalá', '1', NULL, NULL),
(177, 7, '098', 'Totolapa', '1', NULL, NULL),
(178, 7, '099', 'La Trinitaria', '1', NULL, NULL),
(179, 7, '100', 'Tumbalá', '1', NULL, NULL),
(180, 7, '101', 'Tuxtla Gutiérrez', '1', NULL, NULL),
(181, 7, '102', 'Tuxtla Chico', '1', NULL, NULL),
(182, 7, '103', 'Tuzantán', '1', NULL, NULL),
(183, 7, '104', 'Tzimol', '1', NULL, NULL),
(184, 7, '105', 'Unión Juárez', '1', NULL, NULL),
(185, 7, '106', 'Venustiano Carranza', '1', NULL, NULL),
(186, 7, '107', 'Villa Corzo', '1', NULL, NULL),
(187, 7, '108', 'Villaflores', '1', NULL, NULL),
(188, 7, '109', 'Yajalón', '1', NULL, NULL),
(189, 7, '110', 'San Lucas', '1', NULL, NULL),
(190, 7, '111', 'Zinacantán', '1', NULL, NULL),
(191, 7, '112', 'San Juan Cancuc', '1', NULL, NULL),
(192, 7, '113', 'Aldama', '1', NULL, NULL),
(193, 7, '114', 'Benemérito de las Américas', '1', NULL, NULL),
(194, 7, '115', 'Maravilla Tenejapa', '1', NULL, NULL),
(195, 7, '116', 'Marqués de Comillas', '1', NULL, NULL),
(196, 7, '117', 'Montecristo de Guerrero', '1', NULL, NULL),
(197, 7, '118', 'San Andrés Duraznal', '1', NULL, NULL),
(198, 7, '119', 'Santiago el Pinar', '1', NULL, NULL),
(199, 7, '120', 'Capitán Luis Ángel Vidal', '1', NULL, NULL),
(200, 7, '121', 'Rincón Chamula San Pedro', '1', NULL, NULL),
(201, 7, '122', 'El Parral', '1', NULL, NULL),
(202, 7, '123', 'Emiliano Zapata', '1', NULL, NULL),
(203, 7, '124', 'Mezcalapa', '1', NULL, NULL),
(204, 8, '001', 'Ahumada', '1', NULL, NULL),
(205, 8, '002', 'Aldama', '1', NULL, NULL),
(206, 8, '003', 'Allende', '1', NULL, NULL),
(207, 8, '004', 'Aquiles Serdán', '1', NULL, NULL),
(208, 8, '005', 'Ascensión', '1', NULL, NULL),
(209, 8, '006', 'Bachíniva', '1', NULL, NULL),
(210, 8, '007', 'Balleza', '1', NULL, NULL),
(211, 8, '008', 'Batopilas de Manuel Gómez Morín', '1', NULL, NULL),
(212, 8, '009', 'Bocoyna', '1', NULL, NULL),
(213, 8, '010', 'Buenaventura', '1', NULL, NULL),
(214, 8, '011', 'Camargo', '1', NULL, NULL),
(215, 8, '012', 'Carichí', '1', NULL, NULL),
(216, 8, '013', 'Casas Grandes', '1', NULL, NULL),
(217, 8, '014', 'Coronado', '1', NULL, NULL),
(218, 8, '015', 'Coyame del Sotol', '1', NULL, NULL),
(219, 8, '016', 'La Cruz', '1', NULL, NULL),
(220, 8, '017', 'Cuauhtémoc', '1', NULL, NULL),
(221, 8, '018', 'Cusihuiriachi', '1', NULL, NULL),
(222, 8, '019', 'Chihuahua', '1', NULL, NULL),
(223, 8, '020', 'Chínipas', '1', NULL, NULL),
(224, 8, '021', 'Delicias', '1', NULL, NULL),
(225, 8, '022', 'Dr. Belisario Domínguez', '1', NULL, NULL),
(226, 8, '023', 'Galeana', '1', NULL, NULL),
(227, 8, '024', 'Santa Isabel', '1', NULL, NULL),
(228, 8, '025', 'Gómez Farías', '1', NULL, NULL),
(229, 8, '026', 'Gran Morelos', '1', NULL, NULL),
(230, 8, '027', 'Guachochi', '1', NULL, NULL),
(231, 8, '028', 'Guadalupe', '1', NULL, NULL),
(232, 8, '029', 'Guadalupe y Calvo', '1', NULL, NULL),
(233, 8, '030', 'Guazapares', '1', NULL, NULL),
(234, 8, '031', 'Guerrero', '1', NULL, NULL),
(235, 8, '032', 'Hidalgo del Parral', '1', NULL, NULL),
(236, 8, '033', 'Huejotitán', '1', NULL, NULL),
(237, 8, '034', 'Ignacio Zaragoza', '1', NULL, NULL),
(238, 8, '035', 'Janos', '1', NULL, NULL),
(239, 8, '036', 'Jiménez', '1', NULL, NULL),
(240, 8, '037', 'Juárez', '1', NULL, NULL),
(241, 8, '038', 'Julimes', '1', NULL, NULL),
(242, 8, '039', 'López', '1', NULL, NULL),
(243, 8, '040', 'Madera', '1', NULL, NULL),
(244, 8, '041', 'Maguarichi', '1', NULL, NULL),
(245, 8, '042', 'Manuel Benavides', '1', NULL, NULL),
(246, 8, '043', 'Matachí', '1', NULL, NULL),
(247, 8, '044', 'Matamoros', '1', NULL, NULL),
(248, 8, '045', 'Meoqui', '1', NULL, NULL),
(249, 8, '046', 'Morelos', '1', NULL, NULL),
(250, 8, '047', 'Moris', '1', NULL, NULL),
(251, 8, '048', 'Namiquipa', '1', NULL, NULL),
(252, 8, '049', 'Nonoava', '1', NULL, NULL),
(253, 8, '050', 'Nuevo Casas Grandes', '1', NULL, NULL),
(254, 8, '051', 'Ocampo', '1', NULL, NULL),
(255, 8, '052', 'Ojinaga', '1', NULL, NULL),
(256, 8, '053', 'Praxedis G. Guerrero', '1', NULL, NULL),
(257, 8, '054', 'Riva Palacio', '1', NULL, NULL),
(258, 8, '055', 'Rosales', '1', NULL, NULL),
(259, 8, '056', 'Rosario', '1', NULL, NULL),
(260, 8, '057', 'San Francisco de Borja', '1', NULL, NULL),
(261, 8, '058', 'San Francisco de Conchos', '1', NULL, NULL),
(262, 8, '059', 'San Francisco del Oro', '1', NULL, NULL),
(263, 8, '060', 'Santa Bárbara', '1', NULL, NULL),
(264, 8, '061', 'Satevó', '1', NULL, NULL),
(265, 8, '062', 'Saucillo', '1', NULL, NULL),
(266, 8, '063', 'Temósachic', '1', NULL, NULL),
(267, 8, '064', 'El Tule', '1', NULL, NULL),
(268, 8, '065', 'Urique', '1', NULL, NULL),
(269, 8, '066', 'Uruachi', '1', NULL, NULL),
(270, 8, '067', 'Valle de Zaragoza', '1', NULL, NULL),
(271, 9, '002', 'Azcapotzalco', '1', NULL, NULL),
(272, 9, '003', 'Coyoacán', '1', NULL, NULL),
(273, 9, '004', 'Cuajimalpa de Morelos', '1', NULL, NULL),
(274, 9, '005', 'Gustavo A. Madero', '1', NULL, NULL),
(275, 9, '006', 'Iztacalco', '1', NULL, NULL),
(276, 9, '007', 'Iztapalapa', '1', NULL, NULL),
(277, 9, '008', 'La Magdalena Contreras', '1', NULL, NULL),
(278, 9, '009', 'Milpa Alta', '1', NULL, NULL),
(279, 9, '010', 'Álvaro Obregón', '1', NULL, NULL),
(280, 9, '011', 'Tláhuac', '1', NULL, NULL),
(281, 9, '012', 'Tlalpan', '1', NULL, NULL),
(282, 9, '013', 'Xochimilco', '1', NULL, NULL),
(283, 9, '014', 'Benito Juárez', '1', NULL, NULL),
(284, 9, '015', 'Cuauhtémoc', '1', NULL, NULL),
(285, 9, '016', 'Miguel Hidalgo', '1', NULL, NULL),
(286, 9, '017', 'Venustiano Carranza', '1', NULL, NULL),
(287, 10, '001', 'Canatlán', '1', NULL, NULL),
(288, 10, '002', 'Canelas', '1', NULL, NULL),
(289, 10, '003', 'Coneto de Comonfort', '1', NULL, NULL),
(290, 10, '004', 'Cuencamé', '1', NULL, NULL),
(291, 10, '005', 'Durango', '1', NULL, NULL),
(292, 10, '006', 'General Simón Bolívar', '1', NULL, NULL),
(293, 10, '007', 'Gómez Palacio', '1', NULL, NULL),
(294, 10, '008', 'Guadalupe Victoria', '1', NULL, NULL),
(295, 10, '009', 'Guanaceví', '1', NULL, NULL),
(296, 10, '010', 'Hidalgo', '1', NULL, NULL),
(297, 10, '011', 'Indé', '1', NULL, NULL),
(298, 10, '012', 'Lerdo', '1', NULL, NULL),
(299, 10, '013', 'Mapimí', '1', NULL, NULL),
(300, 10, '014', 'Mezquital', '1', NULL, NULL),
(301, 10, '015', 'Nazas', '1', NULL, NULL),
(302, 10, '016', 'Nombre de Dios', '1', NULL, NULL),
(303, 10, '017', 'Ocampo', '1', NULL, NULL),
(304, 10, '018', 'El Oro', '1', NULL, NULL),
(305, 10, '019', 'Otáez', '1', NULL, NULL),
(306, 10, '020', 'Pánuco de Coronado', '1', NULL, NULL),
(307, 10, '021', 'Peñón Blanco', '1', NULL, NULL),
(308, 10, '022', 'Poanas', '1', NULL, NULL),
(309, 10, '023', 'Pueblo Nuevo', '1', NULL, NULL),
(310, 10, '024', 'Rodeo', '1', NULL, NULL),
(311, 10, '025', 'San Bernardo', '1', NULL, NULL),
(312, 10, '026', 'San Dimas', '1', NULL, NULL),
(313, 10, '027', 'San Juan de Guadalupe', '1', NULL, NULL),
(314, 10, '028', 'San Juan del Río', '1', NULL, NULL),
(315, 10, '029', 'San Luis del Cordero', '1', NULL, NULL),
(316, 10, '030', 'San Pedro del Gallo', '1', NULL, NULL),
(317, 10, '031', 'Santa Clara', '1', NULL, NULL),
(318, 10, '032', 'Santiago Papasquiaro', '1', NULL, NULL),
(319, 10, '033', 'Súchil', '1', NULL, NULL),
(320, 10, '034', 'Tamazula', '1', NULL, NULL),
(321, 10, '035', 'Tepehuanes', '1', NULL, NULL),
(322, 10, '036', 'Tlahualilo', '1', NULL, NULL),
(323, 10, '037', 'Topia', '1', NULL, NULL),
(324, 10, '038', 'Vicente Guerrero', '1', NULL, NULL),
(325, 10, '039', 'Nuevo Ideal', '1', NULL, NULL),
(326, 11, '001', 'Abasolo', '1', NULL, NULL),
(327, 11, '002', 'Acámbaro', '1', NULL, NULL),
(328, 11, '003', 'San Miguel de Allende', '1', NULL, NULL),
(329, 11, '004', 'Apaseo el Alto', '1', NULL, NULL),
(330, 11, '005', 'Apaseo el Grande', '1', NULL, NULL),
(331, 11, '006', 'Atarjea', '1', NULL, NULL),
(332, 11, '007', 'Celaya', '1', NULL, NULL),
(333, 11, '008', 'Manuel Doblado', '1', NULL, NULL),
(334, 11, '009', 'Comonfort', '1', NULL, NULL),
(335, 11, '010', 'Coroneo', '1', NULL, NULL),
(336, 11, '011', 'Cortazar', '1', NULL, NULL),
(337, 11, '012', 'Cuerámaro', '1', NULL, NULL),
(338, 11, '013', 'Doctor Mora', '1', NULL, NULL),
(339, 11, '014', 'Dolores Hidalgo Cuna de la Independencia Nacional', '1', NULL, NULL),
(340, 11, '015', 'Guanajuato', '1', NULL, NULL),
(341, 11, '016', 'Huanímaro', '1', NULL, NULL),
(342, 11, '017', 'Irapuato', '1', NULL, NULL),
(343, 11, '018', 'Jaral del Progreso', '1', NULL, NULL),
(344, 11, '019', 'Jerécuaro', '1', NULL, NULL),
(345, 11, '020', 'León', '1', NULL, NULL),
(346, 11, '021', 'Moroleón', '1', NULL, NULL),
(347, 11, '022', 'Ocampo', '1', NULL, NULL),
(348, 11, '023', 'Pénjamo', '1', NULL, NULL),
(349, 11, '024', 'Pueblo Nuevo', '1', NULL, NULL),
(350, 11, '025', 'Purísima del Rincón', '1', NULL, NULL),
(351, 11, '026', 'Romita', '1', NULL, NULL),
(352, 11, '027', 'Salamanca', '1', NULL, NULL),
(353, 11, '028', 'Salvatierra', '1', NULL, NULL),
(354, 11, '029', 'San Diego de la Unión', '1', NULL, NULL),
(355, 11, '030', 'San Felipe', '1', NULL, NULL),
(356, 11, '031', 'San Francisco del Rincón', '1', NULL, NULL),
(357, 11, '032', 'San José Iturbide', '1', NULL, NULL),
(358, 11, '033', 'San Luis de la Paz', '1', NULL, NULL),
(359, 11, '034', 'Santa Catarina', '1', NULL, NULL),
(360, 11, '035', 'Santa Cruz de Juventino Rosas', '1', NULL, NULL),
(361, 11, '036', 'Santiago Maravatío', '1', NULL, NULL),
(362, 11, '037', 'Silao de la Victoria', '1', NULL, NULL),
(363, 11, '038', 'Tarandacuao', '1', NULL, NULL),
(364, 11, '039', 'Tarimoro', '1', NULL, NULL),
(365, 11, '040', 'Tierra Blanca', '1', NULL, NULL),
(366, 11, '041', 'Uriangato', '1', NULL, NULL),
(367, 11, '042', 'Valle de Santiago', '1', NULL, NULL),
(368, 11, '043', 'Victoria', '1', NULL, NULL),
(369, 11, '044', 'Villagrán', '1', NULL, NULL),
(370, 11, '045', 'Xichú', '1', NULL, NULL),
(371, 11, '046', 'Yuriria', '1', NULL, NULL),
(372, 12, '001', 'Acapulco de Juárez', '1', NULL, NULL),
(373, 12, '002', 'Ahuacuotzingo', '1', NULL, NULL),
(374, 12, '003', 'Ajuchitlán del Progreso', '1', NULL, NULL),
(375, 12, '004', 'Alcozauca de Guerrero', '1', NULL, NULL),
(376, 12, '005', 'Alpoyeca', '1', NULL, NULL),
(377, 12, '006', 'Apaxtla', '1', NULL, NULL),
(378, 12, '007', 'Arcelia', '1', NULL, NULL),
(379, 12, '008', 'Atenango del Río', '1', NULL, NULL),
(380, 12, '009', 'Atlamajalcingo del Monte', '1', NULL, NULL),
(381, 12, '010', 'Atlixtac', '1', NULL, NULL),
(382, 12, '011', 'Atoyac de Álvarez', '1', NULL, NULL),
(383, 12, '012', 'Ayutla de los Libres', '1', NULL, NULL),
(384, 12, '013', 'Azoyú', '1', NULL, NULL),
(385, 12, '014', 'Benito Juárez', '1', NULL, NULL),
(386, 12, '015', 'Buenavista de Cuéllar', '1', NULL, NULL),
(387, 12, '016', 'Coahuayutla de José María Izazaga', '1', NULL, NULL),
(388, 12, '017', 'Cocula', '1', NULL, NULL),
(389, 12, '018', 'Copala', '1', NULL, NULL),
(390, 12, '019', 'Copalillo', '1', NULL, NULL),
(391, 12, '020', 'Copanatoyac', '1', NULL, NULL),
(392, 12, '021', 'Coyuca de Benítez', '1', NULL, NULL),
(393, 12, '022', 'Coyuca de Catalán', '1', NULL, NULL),
(394, 12, '023', 'Cuajinicuilapa', '1', NULL, NULL),
(395, 12, '024', 'Cualác', '1', NULL, NULL),
(396, 12, '025', 'Cuautepec', '1', NULL, NULL),
(397, 12, '026', 'Cuetzala del Progreso', '1', NULL, NULL),
(398, 12, '027', 'Cutzamala de Pinzón', '1', NULL, NULL),
(399, 12, '028', 'Chilapa de Álvarez', '1', NULL, NULL),
(400, 12, '029', 'Chilpancingo de los Bravo', '1', NULL, NULL),
(401, 12, '030', 'Florencio Villarreal', '1', NULL, NULL),
(402, 12, '031', 'General Canuto A. Neri', '1', NULL, NULL),
(403, 12, '032', 'General Heliodoro Castillo', '1', NULL, NULL),
(404, 12, '033', 'Huamuxtitlán', '1', NULL, NULL),
(405, 12, '034', 'Huitzuco de los Figueroa', '1', NULL, NULL),
(406, 12, '035', 'Iguala de la Independencia', '1', NULL, NULL),
(407, 12, '036', 'Igualapa', '1', NULL, NULL),
(408, 12, '037', 'Ixcateopan de Cuauhtémoc', '1', NULL, NULL),
(409, 12, '038', 'Zihuatanejo de Azueta', '1', NULL, NULL),
(410, 12, '039', 'Juan R. Escudero', '1', NULL, NULL),
(411, 12, '040', 'Leonardo Bravo', '1', NULL, NULL),
(412, 12, '041', 'Malinaltepec', '1', NULL, NULL),
(413, 12, '042', 'Mártir de Cuilapan', '1', NULL, NULL),
(414, 12, '043', 'Metlatónoc', '1', NULL, NULL),
(415, 12, '044', 'Mochitlán', '1', NULL, NULL),
(416, 12, '045', 'Olinalá', '1', NULL, NULL),
(417, 12, '046', 'Ometepec', '1', NULL, NULL),
(418, 12, '047', 'Pedro Ascencio Alquisiras', '1', NULL, NULL),
(419, 12, '048', 'Petatlán', '1', NULL, NULL),
(420, 12, '049', 'Pilcaya', '1', NULL, NULL),
(421, 12, '050', 'Pungarabato', '1', NULL, NULL),
(422, 12, '051', 'Quechultenango', '1', NULL, NULL),
(423, 12, '052', 'San Luis Acatlán', '1', NULL, NULL),
(424, 12, '053', 'San Marcos', '1', NULL, NULL),
(425, 12, '054', 'San Miguel Totolapan', '1', NULL, NULL),
(426, 12, '055', 'Taxco de Alarcón', '1', NULL, NULL),
(427, 12, '056', 'Tecoanapa', '1', NULL, NULL),
(428, 12, '057', 'Técpan de Galeana', '1', NULL, NULL),
(429, 12, '058', 'Teloloapan', '1', NULL, NULL),
(430, 12, '059', 'Tepecoacuilco de Trujano', '1', NULL, NULL),
(431, 12, '060', 'Tetipac', '1', NULL, NULL),
(432, 12, '061', 'Tixtla de Guerrero', '1', NULL, NULL),
(433, 12, '062', 'Tlacoachistlahuaca', '1', NULL, NULL),
(434, 12, '063', 'Tlacoapa', '1', NULL, NULL),
(435, 12, '064', 'Tlalchapa', '1', NULL, NULL),
(436, 12, '065', 'Tlalixtaquilla de Maldonado', '1', NULL, NULL),
(437, 12, '066', 'Tlapa de Comonfort', '1', NULL, NULL),
(438, 12, '067', 'Tlapehuala', '1', NULL, NULL),
(439, 12, '068', 'La Unión de Isidoro Montes de Oca', '1', NULL, NULL),
(440, 12, '069', 'Xalpatláhuac', '1', NULL, NULL),
(441, 12, '070', 'Xochihuehuetlán', '1', NULL, NULL),
(442, 12, '071', 'Xochistlahuaca', '1', NULL, NULL),
(443, 12, '072', 'Zapotitlán Tablas', '1', NULL, NULL),
(444, 12, '073', 'Zirándaro', '1', NULL, NULL),
(445, 12, '074', 'Zitlala', '1', NULL, NULL),
(446, 12, '075', 'Eduardo Neri', '1', NULL, NULL),
(447, 12, '076', 'Acatepec', '1', NULL, NULL),
(448, 12, '077', 'Marquelia', '1', NULL, NULL),
(449, 12, '078', 'Cochoapa el Grande', '1', NULL, NULL),
(450, 12, '079', 'José Joaquín de Herrera', '1', NULL, NULL),
(451, 12, '080', 'Juchitán', '1', NULL, NULL),
(452, 12, '081', 'Iliatenco', '1', NULL, NULL),
(453, 13, '001', 'Acatlán', '1', NULL, NULL),
(454, 13, '002', 'Acaxochitlán', '1', NULL, NULL),
(455, 13, '003', 'Actopan', '1', NULL, NULL),
(456, 13, '004', 'Agua Blanca de Iturbide', '1', NULL, NULL),
(457, 13, '005', 'Ajacuba', '1', NULL, NULL),
(458, 13, '006', 'Alfajayucan', '1', NULL, NULL),
(459, 13, '007', 'Almoloya', '1', NULL, NULL),
(460, 13, '008', 'Apan', '1', NULL, NULL),
(461, 13, '009', 'El Arenal', '1', NULL, NULL),
(462, 13, '010', 'Atitalaquia', '1', NULL, NULL),
(463, 13, '011', 'Atlapexco', '1', NULL, NULL),
(464, 13, '012', 'Atotonilco el Grande', '1', NULL, NULL),
(465, 13, '013', 'Atotonilco de Tula', '1', NULL, NULL),
(466, 13, '014', 'Calnali', '1', NULL, NULL),
(467, 13, '015', 'Cardonal', '1', NULL, NULL),
(468, 13, '016', 'Cuautepec de Hinojosa', '1', NULL, NULL),
(469, 13, '017', 'Chapantongo', '1', NULL, NULL),
(470, 13, '018', 'Chapulhuacán', '1', NULL, NULL),
(471, 13, '019', 'Chilcuautla', '1', NULL, NULL),
(472, 13, '020', 'Eloxochitlán', '1', NULL, NULL),
(473, 13, '021', 'Emiliano Zapata', '1', NULL, NULL),
(474, 13, '022', 'Epazoyucan', '1', NULL, NULL),
(475, 13, '023', 'Francisco I. Madero', '1', NULL, NULL),
(476, 13, '024', 'Huasca de Ocampo', '1', NULL, NULL),
(477, 13, '025', 'Huautla', '1', NULL, NULL),
(478, 13, '026', 'Huazalingo', '1', NULL, NULL),
(479, 13, '027', 'Huehuetla', '1', NULL, NULL),
(480, 13, '028', 'Huejutla de Reyes', '1', NULL, NULL),
(481, 13, '029', 'Huichapan', '1', NULL, NULL),
(482, 13, '030', 'Ixmiquilpan', '1', NULL, NULL),
(483, 13, '031', 'Jacala de Ledezma', '1', NULL, NULL),
(484, 13, '032', 'Jaltocán', '1', NULL, NULL),
(485, 13, '033', 'Juárez Hidalgo', '1', NULL, NULL),
(486, 13, '034', 'Lolotla', '1', NULL, NULL),
(487, 13, '035', 'Metepec', '1', NULL, NULL),
(488, 13, '036', 'San Agustín Metzquititlán', '1', NULL, NULL),
(489, 13, '037', 'Metztitlán', '1', NULL, NULL),
(490, 13, '038', 'Mineral del Chico', '1', NULL, NULL),
(491, 13, '039', 'Mineral del Monte', '1', NULL, NULL),
(492, 13, '040', 'La Misión', '1', NULL, NULL),
(493, 13, '041', 'Mixquiahuala de Juárez', '1', NULL, NULL),
(494, 13, '042', 'Molango de Escamilla', '1', NULL, NULL),
(495, 13, '043', 'Nicolás Flores', '1', NULL, NULL),
(496, 13, '044', 'Nopala de Villagrán', '1', NULL, NULL),
(497, 13, '045', 'Omitlán de Juárez', '1', NULL, NULL),
(498, 13, '046', 'San Felipe Orizatlán', '1', NULL, NULL),
(499, 13, '047', 'Pacula', '1', NULL, NULL),
(500, 13, '048', 'Pachuca de Soto', '1', NULL, NULL),
(501, 13, '049', 'Pisaflores', '1', NULL, NULL),
(502, 13, '050', 'Progreso de Obregón', '1', NULL, NULL),
(503, 13, '051', 'Mineral de la Reforma', '1', NULL, NULL),
(504, 13, '052', 'San Agustín Tlaxiaca', '1', NULL, NULL),
(505, 13, '053', 'San Bartolo Tutotepec', '1', NULL, NULL),
(506, 13, '054', 'San Salvador', '1', NULL, NULL),
(507, 13, '055', 'Santiago de Anaya', '1', NULL, NULL),
(508, 13, '056', 'Santiago Tulantepec de Lugo Guerrero', '1', NULL, NULL),
(509, 13, '057', 'Singuilucan', '1', NULL, NULL),
(510, 13, '058', 'Tasquillo', '1', NULL, NULL),
(511, 13, '059', 'Tecozautla', '1', NULL, NULL),
(512, 13, '060', 'Tenango de Doria', '1', NULL, NULL),
(513, 13, '061', 'Tepeapulco', '1', NULL, NULL),
(514, 13, '062', 'Tepehuacán de Guerrero', '1', NULL, NULL),
(515, 13, '063', 'Tepeji del Río de Ocampo', '1', NULL, NULL),
(516, 13, '064', 'Tepetitlán', '1', NULL, NULL),
(517, 13, '065', 'Tetepango', '1', NULL, NULL),
(518, 13, '066', 'Villa de Tezontepec', '1', NULL, NULL),
(519, 13, '067', 'Tezontepec de Aldama', '1', NULL, NULL),
(520, 13, '068', 'Tianguistengo', '1', NULL, NULL),
(521, 13, '069', 'Tizayuca', '1', NULL, NULL),
(522, 13, '070', 'Tlahuelilpan', '1', NULL, NULL),
(523, 13, '071', 'Tlahuiltepa', '1', NULL, NULL),
(524, 13, '072', 'Tlanalapa', '1', NULL, NULL),
(525, 13, '073', 'Tlanchinol', '1', NULL, NULL),
(526, 13, '074', 'Tlaxcoapan', '1', NULL, NULL),
(527, 13, '075', 'Tolcayuca', '1', NULL, NULL),
(528, 13, '076', 'Tula de Allende', '1', NULL, NULL),
(529, 13, '077', 'Tulancingo de Bravo', '1', NULL, NULL),
(530, 13, '078', 'Xochiatipan', '1', NULL, NULL),
(531, 13, '079', 'Xochicoatlán', '1', NULL, NULL),
(532, 13, '080', 'Yahualica', '1', NULL, NULL),
(533, 13, '081', 'Zacualtipán de Ángeles', '1', NULL, NULL),
(534, 13, '082', 'Zapotlán de Juárez', '1', NULL, NULL),
(535, 13, '083', 'Zempoala', '1', NULL, NULL),
(536, 13, '084', 'Zimapán', '1', NULL, NULL),
(537, 14, '001', 'Acatic', '1', NULL, NULL),
(538, 14, '002', 'Acatlán de Juárez', '1', NULL, NULL),
(539, 14, '003', 'Ahualulco de Mercado', '1', NULL, NULL),
(540, 14, '004', 'Amacueca', '1', NULL, NULL),
(541, 14, '005', 'Amatitán', '1', NULL, NULL),
(542, 14, '006', 'Ameca', '1', NULL, NULL),
(543, 14, '007', 'San Juanito de Escobedo', '1', NULL, NULL),
(544, 14, '008', 'Arandas', '1', NULL, NULL),
(545, 14, '009', 'El Arenal', '1', NULL, NULL),
(546, 14, '010', 'Atemajac de Brizuela', '1', NULL, NULL),
(547, 14, '011', 'Atengo', '1', NULL, NULL),
(548, 14, '012', 'Atenguillo', '1', NULL, NULL),
(549, 14, '013', 'Atotonilco el Alto', '1', NULL, NULL),
(550, 14, '014', 'Atoyac', '1', NULL, NULL),
(551, 14, '015', 'Autlán de Navarro', '1', NULL, NULL),
(552, 14, '016', 'Ayotlán', '1', NULL, NULL),
(553, 14, '017', 'Ayutla', '1', NULL, NULL),
(554, 14, '018', 'La Barca', '1', NULL, NULL),
(555, 14, '019', 'Bolaños', '1', NULL, NULL),
(556, 14, '020', 'Cabo Corrientes', '1', NULL, NULL),
(557, 14, '021', 'Casimiro Castillo', '1', NULL, NULL),
(558, 14, '022', 'Cihuatlán', '1', NULL, NULL),
(559, 14, '023', 'Zapotlán el Grande', '1', NULL, NULL),
(560, 14, '024', 'Cocula', '1', NULL, NULL),
(561, 14, '025', 'Colotlán', '1', NULL, NULL),
(562, 14, '026', 'Concepción de Buenos Aires', '1', NULL, NULL),
(563, 14, '027', 'Cuautitlán de García Barragán', '1', NULL, NULL),
(564, 14, '028', 'Cuautla', '1', NULL, NULL),
(565, 14, '029', 'Cuquío', '1', NULL, NULL),
(566, 14, '030', 'Chapala', '1', NULL, NULL),
(567, 14, '031', 'Chimaltitán', '1', NULL, NULL),
(568, 14, '032', 'Chiquilistlán', '1', NULL, NULL),
(569, 14, '033', 'Degollado', '1', NULL, NULL),
(570, 14, '034', 'Ejutla', '1', NULL, NULL),
(571, 14, '035', 'Encarnación de Díaz', '1', NULL, NULL),
(572, 14, '036', 'Etzatlán', '1', NULL, NULL),
(573, 14, '037', 'El Grullo', '1', NULL, NULL),
(574, 14, '038', 'Guachinango', '1', NULL, NULL),
(575, 14, '039', 'Guadalajara', '1', NULL, NULL),
(576, 14, '040', 'Hostotipaquillo', '1', NULL, NULL),
(577, 14, '041', 'Huejúcar', '1', NULL, NULL),
(578, 14, '042', 'Huejuquilla el Alto', '1', NULL, NULL),
(579, 14, '043', 'La Huerta', '1', NULL, NULL),
(580, 14, '044', 'Ixtlahuacán de los Membrillos', '1', NULL, NULL),
(581, 14, '045', 'Ixtlahuacán del Río', '1', NULL, NULL),
(582, 14, '046', 'Jalostotitlán', '1', NULL, NULL),
(583, 14, '047', 'Jamay', '1', NULL, NULL),
(584, 14, '048', 'Jesús María', '1', NULL, NULL),
(585, 14, '049', 'Jilotlán de los Dolores', '1', NULL, NULL),
(586, 14, '050', 'Jocotepec', '1', NULL, NULL),
(587, 14, '051', 'Juanacatlán', '1', NULL, NULL),
(588, 14, '052', 'Juchitlán', '1', NULL, NULL),
(589, 14, '053', 'Lagos de Moreno', '1', NULL, NULL),
(590, 14, '054', 'El Limón', '1', NULL, NULL),
(591, 14, '055', 'Magdalena', '1', NULL, NULL),
(592, 14, '056', 'Santa María del Oro', '1', NULL, NULL),
(593, 14, '057', 'La Manzanilla de la Paz', '1', NULL, NULL),
(594, 14, '058', 'Mascota', '1', NULL, NULL),
(595, 14, '059', 'Mazamitla', '1', NULL, NULL),
(596, 14, '060', 'Mexticacán', '1', NULL, NULL),
(597, 14, '061', 'Mezquitic', '1', NULL, NULL),
(598, 14, '062', 'Mixtlán', '1', NULL, NULL),
(599, 14, '063', 'Ocotlán', '1', NULL, NULL),
(600, 14, '064', 'Ojuelos de Jalisco', '1', NULL, NULL),
(601, 14, '065', 'Pihuamo', '1', NULL, NULL),
(602, 14, '066', 'Poncitlán', '1', NULL, NULL),
(603, 14, '067', 'Puerto Vallarta', '1', NULL, NULL),
(604, 14, '068', 'Villa Purificación', '1', NULL, NULL),
(605, 14, '069', 'Quitupan', '1', NULL, NULL),
(606, 14, '070', 'El Salto', '1', NULL, NULL),
(607, 14, '071', 'San Cristóbal de la Barranca', '1', NULL, NULL),
(608, 14, '072', 'San Diego de Alejandría', '1', NULL, NULL),
(609, 14, '073', 'San Juan de los Lagos', '1', NULL, NULL),
(610, 14, '074', 'San Julián', '1', NULL, NULL),
(611, 14, '075', 'San Marcos', '1', NULL, NULL),
(612, 14, '076', 'San Martín de Bolaños', '1', NULL, NULL),
(613, 14, '077', 'San Martín Hidalgo', '1', NULL, NULL),
(614, 14, '078', 'San Miguel el Alto', '1', NULL, NULL),
(615, 14, '079', 'Gómez Farías', '1', NULL, NULL),
(616, 14, '080', 'San Sebastián del Oeste', '1', NULL, NULL),
(617, 14, '081', 'Santa María de los Ángeles', '1', NULL, NULL),
(618, 14, '082', 'Sayula', '1', NULL, NULL),
(619, 14, '083', 'Tala', '1', NULL, NULL),
(620, 14, '084', 'Talpa de Allende', '1', NULL, NULL),
(621, 14, '085', 'Tamazula de Gordiano', '1', NULL, NULL),
(622, 14, '086', 'Tapalpa', '1', NULL, NULL),
(623, 14, '087', 'Tecalitlán', '1', NULL, NULL),
(624, 14, '088', 'Tecolotlán', '1', NULL, NULL),
(625, 14, '089', 'Techaluta de Montenegro', '1', NULL, NULL),
(626, 14, '090', 'Tenamaxtlán', '1', NULL, NULL),
(627, 14, '091', 'Teocaltiche', '1', NULL, NULL),
(628, 14, '092', 'Teocuitatlán de Corona', '1', NULL, NULL),
(629, 14, '093', 'Tepatitlán de Morelos', '1', NULL, NULL),
(630, 14, '094', 'Tequila', '1', NULL, NULL),
(631, 14, '095', 'Teuchitlán', '1', NULL, NULL),
(632, 14, '096', 'Tizapán el Alto', '1', NULL, NULL),
(633, 14, '097', 'Tlajomulco de Zúñiga', '1', NULL, NULL),
(634, 14, '098', 'San Pedro Tlaquepaque', '1', NULL, NULL),
(635, 14, '099', 'Tolimán', '1', NULL, NULL),
(636, 14, '100', 'Tomatlán', '1', NULL, NULL),
(637, 14, '101', 'Tonalá', '1', NULL, NULL),
(638, 14, '102', 'Tonaya', '1', NULL, NULL),
(639, 14, '103', 'Tonila', '1', NULL, NULL),
(640, 14, '104', 'Totatiche', '1', NULL, NULL),
(641, 14, '105', 'Tototlán', '1', NULL, NULL),
(642, 14, '106', 'Tuxcacuesco', '1', NULL, NULL),
(643, 14, '107', 'Tuxcueca', '1', NULL, NULL),
(644, 14, '108', 'Tuxpan', '1', NULL, NULL),
(645, 14, '109', 'Unión de San Antonio', '1', NULL, NULL),
(646, 14, '110', 'Unión de Tula', '1', NULL, NULL),
(647, 14, '111', 'Valle de Guadalupe', '1', NULL, NULL),
(648, 14, '112', 'Valle de Juárez', '1', NULL, NULL),
(649, 14, '113', 'San Gabriel', '1', NULL, NULL),
(650, 14, '114', 'Villa Corona', '1', NULL, NULL),
(651, 14, '115', 'Villa Guerrero', '1', NULL, NULL),
(652, 14, '116', 'Villa Hidalgo', '1', NULL, NULL),
(653, 14, '117', 'Cañadas de Obregón', '1', NULL, NULL),
(654, 14, '118', 'Yahualica de González Gallo', '1', NULL, NULL),
(655, 14, '119', 'Zacoalco de Torres', '1', NULL, NULL),
(656, 14, '120', 'Zapopan', '1', NULL, NULL),
(657, 14, '121', 'Zapotiltic', '1', NULL, NULL),
(658, 14, '122', 'Zapotitlán de Vadillo', '1', NULL, NULL),
(659, 14, '123', 'Zapotlán del Rey', '1', NULL, NULL),
(660, 14, '124', 'Zapotlanejo', '1', NULL, NULL),
(661, 14, '125', 'San Ignacio Cerro Gordo', '1', NULL, NULL),
(662, 15, '001', 'Acambay de Ruíz Castañeda', '1', NULL, NULL),
(663, 15, '002', 'Acolman', '1', NULL, NULL),
(664, 15, '003', 'Aculco', '1', NULL, NULL),
(665, 15, '004', 'Almoloya de Alquisiras', '1', NULL, NULL),
(666, 15, '005', 'Almoloya de Juárez', '1', NULL, NULL),
(667, 15, '006', 'Almoloya del Río', '1', NULL, NULL),
(668, 15, '007', 'Amanalco', '1', NULL, NULL),
(669, 15, '008', 'Amatepec', '1', NULL, NULL),
(670, 15, '009', 'Amecameca', '1', NULL, NULL),
(671, 15, '010', 'Apaxco', '1', NULL, NULL),
(672, 15, '011', 'Atenco', '1', NULL, NULL),
(673, 15, '012', 'Atizapán', '1', NULL, NULL),
(674, 15, '013', 'Atizapán de Zaragoza', '1', NULL, NULL),
(675, 15, '014', 'Atlacomulco', '1', NULL, NULL),
(676, 15, '015', 'Atlautla', '1', NULL, NULL),
(677, 15, '016', 'Axapusco', '1', NULL, NULL),
(678, 15, '017', 'Ayapango', '1', NULL, NULL),
(679, 15, '018', 'Calimaya', '1', NULL, NULL),
(680, 15, '019', 'Capulhuac', '1', NULL, NULL),
(681, 15, '020', 'Coacalco de Berriozábal', '1', NULL, NULL),
(682, 15, '021', 'Coatepec Harinas', '1', NULL, NULL),
(683, 15, '022', 'Cocotitlán', '1', NULL, NULL),
(684, 15, '023', 'Coyotepec', '1', NULL, NULL),
(685, 15, '024', 'Cuautitlán', '1', NULL, NULL),
(686, 15, '025', 'Chalco', '1', NULL, NULL),
(687, 15, '026', 'Chapa de Mota', '1', NULL, NULL),
(688, 15, '027', 'Chapultepec', '1', NULL, NULL),
(689, 15, '028', 'Chiautla', '1', NULL, NULL),
(690, 15, '029', 'Chicoloapan', '1', NULL, NULL),
(691, 15, '030', 'Chiconcuac', '1', NULL, NULL),
(692, 15, '031', 'Chimalhuacán', '1', NULL, NULL),
(693, 15, '032', 'Donato Guerra', '1', NULL, NULL),
(694, 15, '033', 'Ecatepec de Morelos', '1', NULL, NULL),
(695, 15, '034', 'Ecatzingo', '1', NULL, NULL),
(696, 15, '035', 'Huehuetoca', '1', NULL, NULL),
(697, 15, '036', 'Hueypoxtla', '1', NULL, NULL),
(698, 15, '037', 'Huixquilucan', '1', NULL, NULL),
(699, 15, '038', 'Isidro Fabela', '1', NULL, NULL),
(700, 15, '039', 'Ixtapaluca', '1', NULL, NULL),
(701, 15, '040', 'Ixtapan de la Sal', '1', NULL, NULL),
(702, 15, '041', 'Ixtapan del Oro', '1', NULL, NULL),
(703, 15, '042', 'Ixtlahuaca', '1', NULL, NULL),
(704, 15, '043', 'Xalatlaco', '1', NULL, NULL),
(705, 15, '044', 'Jaltenco', '1', NULL, NULL),
(706, 15, '045', 'Jilotepec', '1', NULL, NULL),
(707, 15, '046', 'Jilotzingo', '1', NULL, NULL),
(708, 15, '047', 'Jiquipilco', '1', NULL, NULL),
(709, 15, '048', 'Jocotitlán', '1', NULL, NULL),
(710, 15, '049', 'Joquicingo', '1', NULL, NULL),
(711, 15, '050', 'Juchitepec', '1', NULL, NULL),
(712, 15, '051', 'Lerma', '1', NULL, NULL),
(713, 15, '052', 'Malinalco', '1', NULL, NULL),
(714, 15, '053', 'Melchor Ocampo', '1', NULL, NULL),
(715, 15, '054', 'Metepec', '1', NULL, NULL),
(716, 15, '055', 'Mexicaltzingo', '1', NULL, NULL),
(717, 15, '056', 'Morelos', '1', NULL, NULL),
(718, 15, '057', 'Naucalpan de Juárez', '1', NULL, NULL),
(719, 15, '058', 'Nezahualcóyotl', '1', NULL, NULL),
(720, 15, '059', 'Nextlalpan', '1', NULL, NULL),
(721, 15, '060', 'Nicolás Romero', '1', NULL, NULL),
(722, 15, '061', 'Nopaltepec', '1', NULL, NULL),
(723, 15, '062', 'Ocoyoacac', '1', NULL, NULL),
(724, 15, '063', 'Ocuilan', '1', NULL, NULL),
(725, 15, '064', 'El Oro', '1', NULL, NULL),
(726, 15, '065', 'Otumba', '1', NULL, NULL),
(727, 15, '066', 'Otzoloapan', '1', NULL, NULL),
(728, 15, '067', 'Otzolotepec', '1', NULL, NULL),
(729, 15, '068', 'Ozumba', '1', NULL, NULL),
(730, 15, '069', 'Papalotla', '1', NULL, NULL),
(731, 15, '070', 'La Paz', '1', NULL, NULL),
(732, 15, '071', 'Polotitlán', '1', NULL, NULL),
(733, 15, '072', 'Rayón', '1', NULL, NULL),
(734, 15, '073', 'San Antonio la Isla', '1', NULL, NULL),
(735, 15, '074', 'San Felipe del Progreso', '1', NULL, NULL),
(736, 15, '075', 'San Martín de las Pirámides', '1', NULL, NULL),
(737, 15, '076', 'San Mateo Atenco', '1', NULL, NULL),
(738, 15, '077', 'San Simón de Guerrero', '1', NULL, NULL),
(739, 15, '078', 'Santo Tomás', '1', NULL, NULL),
(740, 15, '079', 'Soyaniquilpan de Juárez', '1', NULL, NULL),
(741, 15, '080', 'Sultepec', '1', NULL, NULL),
(742, 15, '081', 'Tecámac', '1', NULL, NULL),
(743, 15, '082', 'Tejupilco', '1', NULL, NULL),
(744, 15, '083', 'Temamatla', '1', NULL, NULL),
(745, 15, '084', 'Temascalapa', '1', NULL, NULL),
(746, 15, '085', 'Temascalcingo', '1', NULL, NULL),
(747, 15, '086', 'Temascaltepec', '1', NULL, NULL),
(748, 15, '087', 'Temoaya', '1', NULL, NULL),
(749, 15, '088', 'Tenancingo', '1', NULL, NULL),
(750, 15, '089', 'Tenango del Aire', '1', NULL, NULL),
(751, 15, '090', 'Tenango del Valle', '1', NULL, NULL),
(752, 15, '091', 'Teoloyucan', '1', NULL, NULL),
(753, 15, '092', 'Teotihuacán', '1', NULL, NULL),
(754, 15, '093', 'Tepetlaoxtoc', '1', NULL, NULL),
(755, 15, '094', 'Tepetlixpa', '1', NULL, NULL),
(756, 15, '095', 'Tepotzotlán', '1', NULL, NULL),
(757, 15, '096', 'Tequixquiac', '1', NULL, NULL),
(758, 15, '097', 'Texcaltitlán', '1', NULL, NULL),
(759, 15, '098', 'Texcalyacac', '1', NULL, NULL),
(760, 15, '099', 'Texcoco', '1', NULL, NULL),
(761, 15, '100', 'Tezoyuca', '1', NULL, NULL),
(762, 15, '101', 'Tianguistenco', '1', NULL, NULL),
(763, 15, '102', 'Timilpan', '1', NULL, NULL),
(764, 15, '103', 'Tlalmanalco', '1', NULL, NULL),
(765, 15, '104', 'Tlalnepantla de Baz', '1', NULL, NULL),
(766, 15, '105', 'Tlatlaya', '1', NULL, NULL),
(767, 15, '106', 'Toluca', '1', NULL, NULL),
(768, 15, '107', 'Tonatico', '1', NULL, NULL),
(769, 15, '108', 'Tultepec', '1', NULL, NULL),
(770, 15, '109', 'Tultitlán', '1', NULL, NULL),
(771, 15, '110', 'Valle de Bravo', '1', NULL, NULL),
(772, 15, '111', 'Villa de Allende', '1', NULL, NULL),
(773, 15, '112', 'Villa del Carbón', '1', NULL, NULL),
(774, 15, '113', 'Villa Guerrero', '1', NULL, NULL),
(775, 15, '114', 'Villa Victoria', '1', NULL, NULL),
(776, 15, '115', 'Xonacatlán', '1', NULL, NULL),
(777, 15, '116', 'Zacazonapan', '1', NULL, NULL),
(778, 15, '117', 'Zacualpan', '1', NULL, NULL),
(779, 15, '118', 'Zinacantepec', '1', NULL, NULL),
(780, 15, '119', 'Zumpahuacán', '1', NULL, NULL),
(781, 15, '120', 'Zumpango', '1', NULL, NULL),
(782, 15, '121', 'Cuautitlán Izcalli', '1', NULL, NULL),
(783, 15, '122', 'Valle de Chalco Solidaridad', '1', NULL, NULL),
(784, 15, '123', 'Luvianos', '1', NULL, NULL),
(785, 15, '124', 'San José del Rincón', '1', NULL, NULL),
(786, 15, '125', 'Tonanitla', '1', NULL, NULL),
(787, 16, '001', 'Acuitzio', '1', NULL, NULL),
(788, 16, '002', 'Aguililla', '1', NULL, NULL),
(789, 16, '003', 'Álvaro Obregón', '1', NULL, NULL),
(790, 16, '004', 'Angamacutiro', '1', NULL, NULL),
(791, 16, '005', 'Angangueo', '1', NULL, NULL),
(792, 16, '006', 'Apatzingán', '1', NULL, NULL),
(793, 16, '007', 'Aporo', '1', NULL, NULL),
(794, 16, '008', 'Aquila', '1', NULL, NULL),
(795, 16, '009', 'Ario', '1', NULL, NULL),
(796, 16, '010', 'Arteaga', '1', NULL, NULL),
(797, 16, '011', 'Briseñas', '1', NULL, NULL),
(798, 16, '012', 'Buenavista', '1', NULL, NULL),
(799, 16, '013', 'Carácuaro', '1', NULL, NULL),
(800, 16, '014', 'Coahuayana', '1', NULL, NULL),
(801, 16, '015', 'Coalcomán de Vázquez Pallares', '1', NULL, NULL),
(802, 16, '016', 'Coeneo', '1', NULL, NULL),
(803, 16, '017', 'Contepec', '1', NULL, NULL),
(804, 16, '018', 'Copándaro', '1', NULL, NULL),
(805, 16, '019', 'Cotija', '1', NULL, NULL),
(806, 16, '020', 'Cuitzeo', '1', NULL, NULL),
(807, 16, '021', 'Charapan', '1', NULL, NULL),
(808, 16, '022', 'Charo', '1', NULL, NULL),
(809, 16, '023', 'Chavinda', '1', NULL, NULL),
(810, 16, '024', 'Cherán', '1', NULL, NULL),
(811, 16, '025', 'Chilchota', '1', NULL, NULL),
(812, 16, '026', 'Chinicuila', '1', NULL, NULL),
(813, 16, '027', 'Chucándiro', '1', NULL, NULL),
(814, 16, '028', 'Churintzio', '1', NULL, NULL),
(815, 16, '029', 'Churumuco', '1', NULL, NULL),
(816, 16, '030', 'Ecuandureo', '1', NULL, NULL),
(817, 16, '031', 'Epitacio Huerta', '1', NULL, NULL),
(818, 16, '032', 'Erongarícuaro', '1', NULL, NULL),
(819, 16, '033', 'Gabriel Zamora', '1', NULL, NULL),
(820, 16, '034', 'Hidalgo', '1', NULL, NULL),
(821, 16, '035', 'La Huacana', '1', NULL, NULL),
(822, 16, '036', 'Huandacareo', '1', NULL, NULL),
(823, 16, '037', 'Huaniqueo', '1', NULL, NULL),
(824, 16, '038', 'Huetamo', '1', NULL, NULL),
(825, 16, '039', 'Huiramba', '1', NULL, NULL),
(826, 16, '040', 'Indaparapeo', '1', NULL, NULL),
(827, 16, '041', 'Irimbo', '1', NULL, NULL),
(828, 16, '042', 'Ixtlán', '1', NULL, NULL),
(829, 16, '043', 'Jacona', '1', NULL, NULL),
(830, 16, '044', 'Jiménez', '1', NULL, NULL),
(831, 16, '045', 'Jiquilpan', '1', NULL, NULL),
(832, 16, '046', 'Juárez', '1', NULL, NULL),
(833, 16, '047', 'Jungapeo', '1', NULL, NULL),
(834, 16, '048', 'Lagunillas', '1', NULL, NULL),
(835, 16, '049', 'Madero', '1', NULL, NULL),
(836, 16, '050', 'Maravatío', '1', NULL, NULL),
(837, 16, '051', 'Marcos Castellanos', '1', NULL, NULL),
(838, 16, '052', 'Lázaro Cárdenas', '1', NULL, NULL),
(839, 16, '053', 'Morelia', '1', NULL, NULL),
(840, 16, '054', 'Morelos', '1', NULL, NULL),
(841, 16, '055', 'Múgica', '1', NULL, NULL),
(842, 16, '056', 'Nahuatzen', '1', NULL, NULL),
(843, 16, '057', 'Nocupétaro', '1', NULL, NULL),
(844, 16, '058', 'Nuevo Parangaricutiro', '1', NULL, NULL),
(845, 16, '059', 'Nuevo Urecho', '1', NULL, NULL),
(846, 16, '060', 'Numarán', '1', NULL, NULL),
(847, 16, '061', 'Ocampo', '1', NULL, NULL),
(848, 16, '062', 'Pajacuarán', '1', NULL, NULL),
(849, 16, '063', 'Panindícuaro', '1', NULL, NULL),
(850, 16, '064', 'Parácuaro', '1', NULL, NULL),
(851, 16, '065', 'Paracho', '1', NULL, NULL),
(852, 16, '066', 'Pátzcuaro', '1', NULL, NULL),
(853, 16, '067', 'Penjamillo', '1', NULL, NULL),
(854, 16, '068', 'Peribán', '1', NULL, NULL),
(855, 16, '069', 'La Piedad', '1', NULL, NULL),
(856, 16, '070', 'Purépero', '1', NULL, NULL),
(857, 16, '071', 'Puruándiro', '1', NULL, NULL),
(858, 16, '072', 'Queréndaro', '1', NULL, NULL),
(859, 16, '073', 'Quiroga', '1', NULL, NULL),
(860, 16, '074', 'Cojumatlán de Régules', '1', NULL, NULL),
(861, 16, '075', 'Los Reyes', '1', NULL, NULL),
(862, 16, '076', 'Sahuayo', '1', NULL, NULL),
(863, 16, '077', 'San Lucas', '1', NULL, NULL),
(864, 16, '078', 'Santa Ana Maya', '1', NULL, NULL),
(865, 16, '079', 'Salvador Escalante', '1', NULL, NULL),
(866, 16, '080', 'Senguio', '1', NULL, NULL),
(867, 16, '081', 'Susupuato', '1', NULL, NULL),
(868, 16, '082', 'Tacámbaro', '1', NULL, NULL),
(869, 16, '083', 'Tancítaro', '1', NULL, NULL),
(870, 16, '084', 'Tangamandapio', '1', NULL, NULL),
(871, 16, '085', 'Tangancícuaro', '1', NULL, NULL),
(872, 16, '086', 'Tanhuato', '1', NULL, NULL),
(873, 16, '087', 'Taretan', '1', NULL, NULL),
(874, 16, '088', 'Tarímbaro', '1', NULL, NULL),
(875, 16, '089', 'Tepalcatepec', '1', NULL, NULL),
(876, 16, '090', 'Tingambato', '1', NULL, NULL),
(877, 16, '091', 'Tingüindín', '1', NULL, NULL),
(878, 16, '092', 'Tiquicheo de Nicolás Romero', '1', NULL, NULL),
(879, 16, '093', 'Tlalpujahua', '1', NULL, NULL),
(880, 16, '094', 'Tlazazalca', '1', NULL, NULL),
(881, 16, '095', 'Tocumbo', '1', NULL, NULL),
(882, 16, '096', 'Tumbiscatío', '1', NULL, NULL),
(883, 16, '097', 'Turicato', '1', NULL, NULL),
(884, 16, '098', 'Tuxpan', '1', NULL, NULL),
(885, 16, '099', 'Tuzantla', '1', NULL, NULL),
(886, 16, '100', 'Tzintzuntzan', '1', NULL, NULL),
(887, 16, '101', 'Tzitzio', '1', NULL, NULL),
(888, 16, '102', 'Uruapan', '1', NULL, NULL),
(889, 16, '103', 'Venustiano Carranza', '1', NULL, NULL),
(890, 16, '104', 'Villamar', '1', NULL, NULL),
(891, 16, '105', 'Vista Hermosa', '1', NULL, NULL),
(892, 16, '106', 'Yurécuaro', '1', NULL, NULL),
(893, 16, '107', 'Zacapu', '1', NULL, NULL),
(894, 16, '108', 'Zamora', '1', NULL, NULL),
(895, 16, '109', 'Zináparo', '1', NULL, NULL),
(896, 16, '110', 'Zinapécuaro', '1', NULL, NULL),
(897, 16, '111', 'Ziracuaretiro', '1', NULL, NULL),
(898, 16, '112', 'Zitácuaro', '1', NULL, NULL),
(899, 16, '113', 'José Sixto Verduzco', '1', NULL, NULL),
(900, 17, '001', 'Amacuzac', '1', NULL, NULL),
(901, 17, '002', 'Atlatlahucan', '1', NULL, NULL),
(902, 17, '003', 'Axochiapan', '1', NULL, NULL),
(903, 17, '004', 'Ayala', '1', NULL, NULL),
(904, 17, '005', 'Coatlán del Río', '1', NULL, NULL),
(905, 17, '006', 'Cuautla', '1', NULL, NULL),
(906, 17, '007', 'Cuernavaca', '1', NULL, NULL),
(907, 17, '008', 'Emiliano Zapata', '1', NULL, NULL),
(908, 17, '009', 'Huitzilac', '1', NULL, NULL),
(909, 17, '010', 'Jantetelco', '1', NULL, NULL),
(910, 17, '011', 'Jiutepec', '1', NULL, NULL),
(911, 17, '012', 'Jojutla', '1', NULL, NULL),
(912, 17, '013', 'Jonacatepec de Leandro Valle', '1', NULL, NULL),
(913, 17, '014', 'Mazatepec', '1', NULL, NULL),
(914, 17, '015', 'Miacatlán', '1', NULL, NULL),
(915, 17, '016', 'Ocuituco', '1', NULL, NULL),
(916, 17, '017', 'Puente de Ixtla', '1', NULL, NULL),
(917, 17, '018', 'Temixco', '1', NULL, NULL),
(918, 17, '019', 'Tepalcingo', '1', NULL, NULL),
(919, 17, '020', 'Tepoztlán', '1', NULL, NULL),
(920, 17, '021', 'Tetecala', '1', NULL, NULL),
(921, 17, '022', 'Tetela del Volcán', '1', NULL, NULL),
(922, 17, '023', 'Tlalnepantla', '1', NULL, NULL),
(923, 17, '024', 'Tlaltizapán de Zapata', '1', NULL, NULL),
(924, 17, '025', 'Tlaquiltenango', '1', NULL, NULL),
(925, 17, '026', 'Tlayacapan', '1', NULL, NULL),
(926, 17, '027', 'Totolapan', '1', NULL, NULL),
(927, 17, '028', 'Xochitepec', '1', NULL, NULL),
(928, 17, '029', 'Yautepec', '1', NULL, NULL),
(929, 17, '030', 'Yecapixtla', '1', NULL, NULL),
(930, 17, '031', 'Zacatepec', '1', NULL, NULL),
(931, 17, '032', 'Zacualpan de Amilpas', '1', NULL, NULL),
(932, 17, '033', 'Temoac', '1', NULL, NULL),
(933, 18, '001', 'Acaponeta', '1', NULL, NULL),
(934, 18, '002', 'Ahuacatlán', '1', NULL, NULL),
(935, 18, '003', 'Amatlán de Cañas', '1', NULL, NULL),
(936, 18, '004', 'Compostela', '1', NULL, NULL),
(937, 18, '005', 'Huajicori', '1', NULL, NULL),
(938, 18, '006', 'Ixtlán del Río', '1', NULL, NULL),
(939, 18, '007', 'Jala', '1', NULL, NULL),
(940, 18, '008', 'Xalisco', '1', NULL, NULL),
(941, 18, '009', 'Del Nayar', '1', NULL, NULL),
(942, 18, '010', 'Rosamorada', '1', NULL, NULL),
(943, 18, '011', 'Ruíz', '1', NULL, NULL),
(944, 18, '012', 'San Blas', '1', NULL, NULL),
(945, 18, '013', 'San Pedro Lagunillas', '1', NULL, NULL),
(946, 18, '014', 'Santa María del Oro', '1', NULL, NULL),
(947, 18, '015', 'Santiago Ixcuintla', '1', NULL, NULL),
(948, 18, '016', 'Tecuala', '1', NULL, NULL),
(949, 18, '017', 'Tepic', '1', NULL, NULL),
(950, 18, '018', 'Tuxpan', '1', NULL, NULL),
(951, 18, '019', 'La Yesca', '1', NULL, NULL),
(952, 18, '020', 'Bahía de Banderas', '1', NULL, NULL),
(953, 19, '001', 'Abasolo', '1', NULL, NULL),
(954, 19, '002', 'Agualeguas', '1', NULL, NULL),
(955, 19, '003', 'Los Aldamas', '1', NULL, NULL),
(956, 19, '004', 'Allende', '1', NULL, NULL),
(957, 19, '005', 'Anáhuac', '1', NULL, NULL),
(958, 19, '006', 'Apodaca', '1', NULL, NULL),
(959, 19, '007', 'Aramberri', '1', NULL, NULL),
(960, 19, '008', 'Bustamante', '1', NULL, NULL),
(961, 19, '009', 'Cadereyta Jiménez', '1', NULL, NULL),
(962, 19, '010', 'El Carmen', '1', NULL, NULL),
(963, 19, '011', 'Cerralvo', '1', NULL, NULL),
(964, 19, '012', 'Ciénega de Flores', '1', NULL, NULL),
(965, 19, '013', 'China', '1', NULL, NULL),
(966, 19, '014', 'Doctor Arroyo', '1', NULL, NULL),
(967, 19, '015', 'Doctor Coss', '1', NULL, NULL),
(968, 19, '016', 'Doctor González', '1', NULL, NULL),
(969, 19, '017', 'Galeana', '1', NULL, NULL),
(970, 19, '018', 'García', '1', NULL, NULL),
(971, 19, '019', 'San Pedro Garza García', '1', NULL, NULL),
(972, 19, '020', 'General Bravo', '1', NULL, NULL),
(973, 19, '021', 'General Escobedo', '1', NULL, NULL),
(974, 19, '022', 'General Terán', '1', NULL, NULL),
(975, 19, '023', 'General Treviño', '1', NULL, NULL),
(976, 19, '024', 'General Zaragoza', '1', NULL, NULL),
(977, 19, '025', 'General Zuazua', '1', NULL, NULL),
(978, 19, '026', 'Guadalupe', '1', NULL, NULL),
(979, 19, '027', 'Los Herreras', '1', NULL, NULL),
(980, 19, '028', 'Higueras', '1', NULL, NULL),
(981, 19, '029', 'Hualahuises', '1', NULL, NULL),
(982, 19, '030', 'Iturbide', '1', NULL, NULL),
(983, 19, '031', 'Juárez', '1', NULL, NULL),
(984, 19, '032', 'Lampazos de Naranjo', '1', NULL, NULL),
(985, 19, '033', 'Linares', '1', NULL, NULL),
(986, 19, '034', 'Marín', '1', NULL, NULL),
(987, 19, '035', 'Melchor Ocampo', '1', NULL, NULL),
(988, 19, '036', 'Mier y Noriega', '1', NULL, NULL),
(989, 19, '037', 'Mina', '1', NULL, NULL),
(990, 19, '038', 'Montemorelos', '1', NULL, NULL),
(991, 19, '039', 'Monterrey', '1', NULL, NULL),
(992, 19, '040', 'Parás', '1', NULL, NULL),
(993, 19, '041', 'Pesquería', '1', NULL, NULL),
(994, 19, '042', 'Los Ramones', '1', NULL, NULL),
(995, 19, '043', 'Rayones', '1', NULL, NULL),
(996, 19, '044', 'Sabinas Hidalgo', '1', NULL, NULL),
(997, 19, '045', 'Salinas Victoria', '1', NULL, NULL),
(998, 19, '046', 'San Nicolás de los Garza', '1', NULL, NULL),
(999, 19, '047', 'Hidalgo', '1', NULL, NULL),
(1000, 19, '048', 'Santa Catarina', '1', NULL, NULL),
(1001, 19, '049', 'Santiago', '1', NULL, NULL),
(1002, 19, '050', 'Vallecillo', '1', NULL, NULL),
(1003, 19, '051', 'Villaldama', '1', NULL, NULL),
(1004, 20, '001', 'Abejones', '1', NULL, NULL),
(1005, 20, '002', 'Acatlán de Pérez Figueroa', '1', NULL, NULL),
(1006, 20, '003', 'Asunción Cacalotepec', '1', NULL, NULL),
(1007, 20, '004', 'Asunción Cuyotepeji', '1', NULL, NULL),
(1008, 20, '005', 'Asunción Ixtaltepec', '1', NULL, NULL),
(1009, 20, '006', 'Asunción Nochixtlán', '1', NULL, NULL),
(1010, 20, '007', 'Asunción Ocotlán', '1', NULL, NULL),
(1011, 20, '008', 'Asunción Tlacolulita', '1', NULL, NULL),
(1012, 20, '009', 'Ayotzintepec', '1', NULL, NULL),
(1013, 20, '010', 'El Barrio de la Soledad', '1', NULL, NULL),
(1014, 20, '011', 'Calihualá', '1', NULL, NULL),
(1015, 20, '012', 'Candelaria Loxicha', '1', NULL, NULL),
(1016, 20, '013', 'Ciénega de Zimatlán', '1', NULL, NULL),
(1017, 20, '014', 'Ciudad Ixtepec', '1', NULL, NULL),
(1018, 20, '015', 'Coatecas Altas', '1', NULL, NULL),
(1019, 20, '016', 'Coicoyán de las Flores', '1', NULL, NULL),
(1020, 20, '017', 'La Compañía', '1', NULL, NULL),
(1021, 20, '018', 'Concepción Buenavista', '1', NULL, NULL),
(1022, 20, '019', 'Concepción Pápalo', '1', NULL, NULL),
(1023, 20, '020', 'Constancia del Rosario', '1', NULL, NULL),
(1024, 20, '021', 'Cosolapa', '1', NULL, NULL),
(1025, 20, '022', 'Cosoltepec', '1', NULL, NULL),
(1026, 20, '023', 'Cuilápam de Guerrero', '1', NULL, NULL),
(1027, 20, '024', 'Cuyamecalco Villa de Zaragoza', '1', NULL, NULL),
(1028, 20, '025', 'Chahuites', '1', NULL, NULL),
(1029, 20, '026', 'Chalcatongo de Hidalgo', '1', NULL, NULL);
INSERT INTO `municipalities` (`id`, `state_id`, `clave`, `name`, `activo`, `created_at`, `updated_at`) VALUES
(1030, 20, '027', 'Chiquihuitlán de Benito Juárez', '1', NULL, NULL),
(1031, 20, '028', 'Heroica Ciudad de Ejutla de Crespo', '1', NULL, NULL),
(1032, 20, '029', 'Eloxochitlán de Flores Magón', '1', NULL, NULL),
(1033, 20, '030', 'El Espinal', '1', NULL, NULL),
(1034, 20, '031', 'Tamazulápam del Espíritu Santo', '1', NULL, NULL),
(1035, 20, '032', 'Fresnillo de Trujano', '1', NULL, NULL),
(1036, 20, '033', 'Guadalupe Etla', '1', NULL, NULL),
(1037, 20, '034', 'Guadalupe de Ramírez', '1', NULL, NULL),
(1038, 20, '035', 'Guelatao de Juárez', '1', NULL, NULL),
(1039, 20, '036', 'Guevea de Humboldt', '1', NULL, NULL),
(1040, 20, '037', 'Mesones Hidalgo', '1', NULL, NULL),
(1041, 20, '038', 'Villa Hidalgo', '1', NULL, NULL),
(1042, 20, '039', 'Heroica Ciudad de Huajuapan de León', '1', NULL, NULL),
(1043, 20, '040', 'Huautepec', '1', NULL, NULL),
(1044, 20, '041', 'Huautla de Jiménez', '1', NULL, NULL),
(1045, 20, '042', 'Ixtlán de Juárez', '1', NULL, NULL),
(1046, 20, '043', 'Heroica Ciudad de Juchitán de Zaragoza', '1', NULL, NULL),
(1047, 20, '044', 'Loma Bonita', '1', NULL, NULL),
(1048, 20, '045', 'Magdalena Apasco', '1', NULL, NULL),
(1049, 20, '046', 'Magdalena Jaltepec', '1', NULL, NULL),
(1050, 20, '047', 'Santa Magdalena Jicotlán', '1', NULL, NULL),
(1051, 20, '048', 'Magdalena Mixtepec', '1', NULL, NULL),
(1052, 20, '049', 'Magdalena Ocotlán', '1', NULL, NULL),
(1053, 20, '050', 'Magdalena Peñasco', '1', NULL, NULL),
(1054, 20, '051', 'Magdalena Teitipac', '1', NULL, NULL),
(1055, 20, '052', 'Magdalena Tequisistlán', '1', NULL, NULL),
(1056, 20, '053', 'Magdalena Tlacotepec', '1', NULL, NULL),
(1057, 20, '054', 'Magdalena Zahuatlán', '1', NULL, NULL),
(1058, 20, '055', 'Mariscala de Juárez', '1', NULL, NULL),
(1059, 20, '056', 'Mártires de Tacubaya', '1', NULL, NULL),
(1060, 20, '057', 'Matías Romero Avendaño', '1', NULL, NULL),
(1061, 20, '058', 'Mazatlán Villa de Flores', '1', NULL, NULL),
(1062, 20, '059', 'Miahuatlán de Porfirio Díaz', '1', NULL, NULL),
(1063, 20, '060', 'Mixistlán de la Reforma', '1', NULL, NULL),
(1064, 20, '061', 'Monjas', '1', NULL, NULL),
(1065, 20, '062', 'Natividad', '1', NULL, NULL),
(1066, 20, '063', 'Nazareno Etla', '1', NULL, NULL),
(1067, 20, '064', 'Nejapa de Madero', '1', NULL, NULL),
(1068, 20, '065', 'Ixpantepec Nieves', '1', NULL, NULL),
(1069, 20, '066', 'Santiago Niltepec', '1', NULL, NULL),
(1070, 20, '067', 'Oaxaca de Juárez', '1', NULL, NULL),
(1071, 20, '068', 'Ocotlán de Morelos', '1', NULL, NULL),
(1072, 20, '069', 'La Pe', '1', NULL, NULL),
(1073, 20, '070', 'Pinotepa de Don Luis', '1', NULL, NULL),
(1074, 20, '071', 'Pluma Hidalgo', '1', NULL, NULL),
(1075, 20, '072', 'San José del Progreso', '1', NULL, NULL),
(1076, 20, '073', 'Putla Villa de Guerrero', '1', NULL, NULL),
(1077, 20, '074', 'Santa Catarina Quioquitani', '1', NULL, NULL),
(1078, 20, '075', 'Reforma de Pineda', '1', NULL, NULL),
(1079, 20, '076', 'La Reforma', '1', NULL, NULL),
(1080, 20, '077', 'Reyes Etla', '1', NULL, NULL),
(1081, 20, '078', 'Rojas de Cuauhtémoc', '1', NULL, NULL),
(1082, 20, '079', 'Salina Cruz', '1', NULL, NULL),
(1083, 20, '080', 'San Agustín Amatengo', '1', NULL, NULL),
(1084, 20, '081', 'San Agustín Atenango', '1', NULL, NULL),
(1085, 20, '082', 'San Agustín Chayuco', '1', NULL, NULL),
(1086, 20, '083', 'San Agustín de las Juntas', '1', NULL, NULL),
(1087, 20, '084', 'San Agustín Etla', '1', NULL, NULL),
(1088, 20, '085', 'San Agustín Loxicha', '1', NULL, NULL),
(1089, 20, '086', 'San Agustín Tlacotepec', '1', NULL, NULL),
(1090, 20, '087', 'San Agustín Yatareni', '1', NULL, NULL),
(1091, 20, '088', 'San Andrés Cabecera Nueva', '1', NULL, NULL),
(1092, 20, '089', 'San Andrés Dinicuiti', '1', NULL, NULL),
(1093, 20, '090', 'San Andrés Huaxpaltepec', '1', NULL, NULL),
(1094, 20, '091', 'San Andrés Huayápam', '1', NULL, NULL),
(1095, 20, '092', 'San Andrés Ixtlahuaca', '1', NULL, NULL),
(1096, 20, '093', 'San Andrés Lagunas', '1', NULL, NULL),
(1097, 20, '094', 'San Andrés Nuxiño', '1', NULL, NULL),
(1098, 20, '095', 'San Andrés Paxtlán', '1', NULL, NULL),
(1099, 20, '096', 'San Andrés Sinaxtla', '1', NULL, NULL),
(1100, 20, '097', 'San Andrés Solaga', '1', NULL, NULL),
(1101, 20, '098', 'San Andrés Teotilálpam', '1', NULL, NULL),
(1102, 20, '099', 'San Andrés Tepetlapa', '1', NULL, NULL),
(1103, 20, '100', 'San Andrés Yaá', '1', NULL, NULL),
(1104, 20, '101', 'San Andrés Zabache', '1', NULL, NULL),
(1105, 20, '102', 'San Andrés Zautla', '1', NULL, NULL),
(1106, 20, '103', 'San Antonino Castillo Velasco', '1', NULL, NULL),
(1107, 20, '104', 'San Antonino el Alto', '1', NULL, NULL),
(1108, 20, '105', 'San Antonino Monte Verde', '1', NULL, NULL),
(1109, 20, '106', 'San Antonio Acutla', '1', NULL, NULL),
(1110, 20, '107', 'San Antonio de la Cal', '1', NULL, NULL),
(1111, 20, '108', 'San Antonio Huitepec', '1', NULL, NULL),
(1112, 20, '109', 'San Antonio Nanahuatípam', '1', NULL, NULL),
(1113, 20, '110', 'San Antonio Sinicahua', '1', NULL, NULL),
(1114, 20, '111', 'San Antonio Tepetlapa', '1', NULL, NULL),
(1115, 20, '112', 'San Baltazar Chichicápam', '1', NULL, NULL),
(1116, 20, '113', 'San Baltazar Loxicha', '1', NULL, NULL),
(1117, 20, '114', 'San Baltazar Yatzachi el Bajo', '1', NULL, NULL),
(1118, 20, '115', 'San Bartolo Coyotepec', '1', NULL, NULL),
(1119, 20, '116', 'San Bartolomé Ayautla', '1', NULL, NULL),
(1120, 20, '117', 'San Bartolomé Loxicha', '1', NULL, NULL),
(1121, 20, '118', 'San Bartolomé Quialana', '1', NULL, NULL),
(1122, 20, '119', 'San Bartolomé Yucuañe', '1', NULL, NULL),
(1123, 20, '120', 'San Bartolomé Zoogocho', '1', NULL, NULL),
(1124, 20, '121', 'San Bartolo Soyaltepec', '1', NULL, NULL),
(1125, 20, '122', 'San Bartolo Yautepec', '1', NULL, NULL),
(1126, 20, '123', 'San Bernardo Mixtepec', '1', NULL, NULL),
(1127, 20, '124', 'San Blas Atempa', '1', NULL, NULL),
(1128, 20, '125', 'San Carlos Yautepec', '1', NULL, NULL),
(1129, 20, '126', 'San Cristóbal Amatlán', '1', NULL, NULL),
(1130, 20, '127', 'San Cristóbal Amoltepec', '1', NULL, NULL),
(1131, 20, '128', 'San Cristóbal Lachirioag', '1', NULL, NULL),
(1132, 20, '129', 'San Cristóbal Suchixtlahuaca', '1', NULL, NULL),
(1133, 20, '130', 'San Dionisio del Mar', '1', NULL, NULL),
(1134, 20, '131', 'San Dionisio Ocotepec', '1', NULL, NULL),
(1135, 20, '132', 'San Dionisio Ocotlán', '1', NULL, NULL),
(1136, 20, '133', 'San Esteban Atatlahuca', '1', NULL, NULL),
(1137, 20, '134', 'San Felipe Jalapa de Díaz', '1', NULL, NULL),
(1138, 20, '135', 'San Felipe Tejalápam', '1', NULL, NULL),
(1139, 20, '136', 'San Felipe Usila', '1', NULL, NULL),
(1140, 20, '137', 'San Francisco Cahuacuá', '1', NULL, NULL),
(1141, 20, '138', 'San Francisco Cajonos', '1', NULL, NULL),
(1142, 20, '139', 'San Francisco Chapulapa', '1', NULL, NULL),
(1143, 20, '140', 'San Francisco Chindúa', '1', NULL, NULL),
(1144, 20, '141', 'San Francisco del Mar', '1', NULL, NULL),
(1145, 20, '142', 'San Francisco Huehuetlán', '1', NULL, NULL),
(1146, 20, '143', 'San Francisco Ixhuatán', '1', NULL, NULL),
(1147, 20, '144', 'San Francisco Jaltepetongo', '1', NULL, NULL),
(1148, 20, '145', 'San Francisco Lachigoló', '1', NULL, NULL),
(1149, 20, '146', 'San Francisco Logueche', '1', NULL, NULL),
(1150, 20, '147', 'San Francisco Nuxaño', '1', NULL, NULL),
(1151, 20, '148', 'San Francisco Ozolotepec', '1', NULL, NULL),
(1152, 20, '149', 'San Francisco Sola', '1', NULL, NULL),
(1153, 20, '150', 'San Francisco Telixtlahuaca', '1', NULL, NULL),
(1154, 20, '151', 'San Francisco Teopan', '1', NULL, NULL),
(1155, 20, '152', 'San Francisco Tlapancingo', '1', NULL, NULL),
(1156, 20, '153', 'San Gabriel Mixtepec', '1', NULL, NULL),
(1157, 20, '154', 'San Ildefonso Amatlán', '1', NULL, NULL),
(1158, 20, '155', 'San Ildefonso Sola', '1', NULL, NULL),
(1159, 20, '156', 'San Ildefonso Villa Alta', '1', NULL, NULL),
(1160, 20, '157', 'San Jacinto Amilpas', '1', NULL, NULL),
(1161, 20, '158', 'San Jacinto Tlacotepec', '1', NULL, NULL),
(1162, 20, '159', 'San Jerónimo Coatlán', '1', NULL, NULL),
(1163, 20, '160', 'San Jerónimo Silacayoapilla', '1', NULL, NULL),
(1164, 20, '161', 'San Jerónimo Sosola', '1', NULL, NULL),
(1165, 20, '162', 'San Jerónimo Taviche', '1', NULL, NULL),
(1166, 20, '163', 'San Jerónimo Tecóatl', '1', NULL, NULL),
(1167, 20, '164', 'San Jorge Nuchita', '1', NULL, NULL),
(1168, 20, '165', 'San José Ayuquila', '1', NULL, NULL),
(1169, 20, '166', 'San José Chiltepec', '1', NULL, NULL),
(1170, 20, '167', 'San José del Peñasco', '1', NULL, NULL),
(1171, 20, '168', 'San José Estancia Grande', '1', NULL, NULL),
(1172, 20, '169', 'San José Independencia', '1', NULL, NULL),
(1173, 20, '170', 'San José Lachiguiri', '1', NULL, NULL),
(1174, 20, '171', 'San José Tenango', '1', NULL, NULL),
(1175, 20, '172', 'San Juan Achiutla', '1', NULL, NULL),
(1176, 20, '173', 'San Juan Atepec', '1', NULL, NULL),
(1177, 20, '174', 'Ánimas Trujano', '1', NULL, NULL),
(1178, 20, '175', 'San Juan Bautista Atatlahuca', '1', NULL, NULL),
(1179, 20, '176', 'San Juan Bautista Coixtlahuaca', '1', NULL, NULL),
(1180, 20, '177', 'San Juan Bautista Cuicatlán', '1', NULL, NULL),
(1181, 20, '178', 'San Juan Bautista Guelache', '1', NULL, NULL),
(1182, 20, '179', 'San Juan Bautista Jayacatlán', '1', NULL, NULL),
(1183, 20, '180', 'San Juan Bautista Lo de Soto', '1', NULL, NULL),
(1184, 20, '181', 'San Juan Bautista Suchitepec', '1', NULL, NULL),
(1185, 20, '182', 'San Juan Bautista Tlacoatzintepec', '1', NULL, NULL),
(1186, 20, '183', 'San Juan Bautista Tlachichilco', '1', NULL, NULL),
(1187, 20, '184', 'San Juan Bautista Tuxtepec', '1', NULL, NULL),
(1188, 20, '185', 'San Juan Cacahuatepec', '1', NULL, NULL),
(1189, 20, '186', 'San Juan Cieneguilla', '1', NULL, NULL),
(1190, 20, '187', 'San Juan Coatzóspam', '1', NULL, NULL),
(1191, 20, '188', 'San Juan Colorado', '1', NULL, NULL),
(1192, 20, '189', 'San Juan Comaltepec', '1', NULL, NULL),
(1193, 20, '190', 'San Juan Cotzocón', '1', NULL, NULL),
(1194, 20, '191', 'San Juan Chicomezúchil', '1', NULL, NULL),
(1195, 20, '192', 'San Juan Chilateca', '1', NULL, NULL),
(1196, 20, '193', 'San Juan del Estado', '1', NULL, NULL),
(1197, 20, '194', 'San Juan del Río', '1', NULL, NULL),
(1198, 20, '195', 'San Juan Diuxi', '1', NULL, NULL),
(1199, 20, '196', 'San Juan Evangelista Analco', '1', NULL, NULL),
(1200, 20, '197', 'San Juan Guelavía', '1', NULL, NULL),
(1201, 20, '198', 'San Juan Guichicovi', '1', NULL, NULL),
(1202, 20, '199', 'San Juan Ihualtepec', '1', NULL, NULL),
(1203, 20, '200', 'San Juan Juquila Mixes', '1', NULL, NULL),
(1204, 20, '201', 'San Juan Juquila Vijanos', '1', NULL, NULL),
(1205, 20, '202', 'San Juan Lachao', '1', NULL, NULL),
(1206, 20, '203', 'San Juan Lachigalla', '1', NULL, NULL),
(1207, 20, '204', 'San Juan Lajarcia', '1', NULL, NULL),
(1208, 20, '205', 'San Juan Lalana', '1', NULL, NULL),
(1209, 20, '206', 'San Juan de los Cués', '1', NULL, NULL),
(1210, 20, '207', 'San Juan Mazatlán', '1', NULL, NULL),
(1211, 20, '208', 'San Juan Mixtepec', '1', NULL, NULL),
(1212, 20, '209', 'San Juan Mixtepec', '1', NULL, NULL),
(1213, 20, '210', 'San Juan Ñumí', '1', NULL, NULL),
(1214, 20, '211', 'San Juan Ozolotepec', '1', NULL, NULL),
(1215, 20, '212', 'San Juan Petlapa', '1', NULL, NULL),
(1216, 20, '213', 'San Juan Quiahije', '1', NULL, NULL),
(1217, 20, '214', 'San Juan Quiotepec', '1', NULL, NULL),
(1218, 20, '215', 'San Juan Sayultepec', '1', NULL, NULL),
(1219, 20, '216', 'San Juan Tabaá', '1', NULL, NULL),
(1220, 20, '217', 'San Juan Tamazola', '1', NULL, NULL),
(1221, 20, '218', 'San Juan Teita', '1', NULL, NULL),
(1222, 20, '219', 'San Juan Teitipac', '1', NULL, NULL),
(1223, 20, '220', 'San Juan Tepeuxila', '1', NULL, NULL),
(1224, 20, '221', 'San Juan Teposcolula', '1', NULL, NULL),
(1225, 20, '222', 'San Juan Yaeé', '1', NULL, NULL),
(1226, 20, '223', 'San Juan Yatzona', '1', NULL, NULL),
(1227, 20, '224', 'San Juan Yucuita', '1', NULL, NULL),
(1228, 20, '225', 'San Lorenzo', '1', NULL, NULL),
(1229, 20, '226', 'San Lorenzo Albarradas', '1', NULL, NULL),
(1230, 20, '227', 'San Lorenzo Cacaotepec', '1', NULL, NULL),
(1231, 20, '228', 'San Lorenzo Cuaunecuiltitla', '1', NULL, NULL),
(1232, 20, '229', 'San Lorenzo Texmelúcan', '1', NULL, NULL),
(1233, 20, '230', 'San Lorenzo Victoria', '1', NULL, NULL),
(1234, 20, '231', 'San Lucas Camotlán', '1', NULL, NULL),
(1235, 20, '232', 'San Lucas Ojitlán', '1', NULL, NULL),
(1236, 20, '233', 'San Lucas Quiaviní', '1', NULL, NULL),
(1237, 20, '234', 'San Lucas Zoquiápam', '1', NULL, NULL),
(1238, 20, '235', 'San Luis Amatlán', '1', NULL, NULL),
(1239, 20, '236', 'San Marcial Ozolotepec', '1', NULL, NULL),
(1240, 20, '237', 'San Marcos Arteaga', '1', NULL, NULL),
(1241, 20, '238', 'San Martín de los Cansecos', '1', NULL, NULL),
(1242, 20, '239', 'San Martín Huamelúlpam', '1', NULL, NULL),
(1243, 20, '240', 'San Martín Itunyoso', '1', NULL, NULL),
(1244, 20, '241', 'San Martín Lachilá', '1', NULL, NULL),
(1245, 20, '242', 'San Martín Peras', '1', NULL, NULL),
(1246, 20, '243', 'San Martín Tilcajete', '1', NULL, NULL),
(1247, 20, '244', 'San Martín Toxpalan', '1', NULL, NULL),
(1248, 20, '245', 'San Martín Zacatepec', '1', NULL, NULL),
(1249, 20, '246', 'San Mateo Cajonos', '1', NULL, NULL),
(1250, 20, '247', 'Capulálpam de Méndez', '1', NULL, NULL),
(1251, 20, '248', 'San Mateo del Mar', '1', NULL, NULL),
(1252, 20, '249', 'San Mateo Yoloxochitlán', '1', NULL, NULL),
(1253, 20, '250', 'San Mateo Etlatongo', '1', NULL, NULL),
(1254, 20, '251', 'San Mateo Nejápam', '1', NULL, NULL),
(1255, 20, '252', 'San Mateo Peñasco', '1', NULL, NULL),
(1256, 20, '253', 'San Mateo Piñas', '1', NULL, NULL),
(1257, 20, '254', 'San Mateo Río Hondo', '1', NULL, NULL),
(1258, 20, '255', 'San Mateo Sindihui', '1', NULL, NULL),
(1259, 20, '256', 'San Mateo Tlapiltepec', '1', NULL, NULL),
(1260, 20, '257', 'San Melchor Betaza', '1', NULL, NULL),
(1261, 20, '258', 'San Miguel Achiutla', '1', NULL, NULL),
(1262, 20, '259', 'San Miguel Ahuehuetitlán', '1', NULL, NULL),
(1263, 20, '260', 'San Miguel Aloápam', '1', NULL, NULL),
(1264, 20, '261', 'San Miguel Amatitlán', '1', NULL, NULL),
(1265, 20, '262', 'San Miguel Amatlán', '1', NULL, NULL),
(1266, 20, '263', 'San Miguel Coatlán', '1', NULL, NULL),
(1267, 20, '264', 'San Miguel Chicahua', '1', NULL, NULL),
(1268, 20, '265', 'San Miguel Chimalapa', '1', NULL, NULL),
(1269, 20, '266', 'San Miguel del Puerto', '1', NULL, NULL),
(1270, 20, '267', 'San Miguel del Río', '1', NULL, NULL),
(1271, 20, '268', 'San Miguel Ejutla', '1', NULL, NULL),
(1272, 20, '269', 'San Miguel el Grande', '1', NULL, NULL),
(1273, 20, '270', 'San Miguel Huautla', '1', NULL, NULL),
(1274, 20, '271', 'San Miguel Mixtepec', '1', NULL, NULL),
(1275, 20, '272', 'San Miguel Panixtlahuaca', '1', NULL, NULL),
(1276, 20, '273', 'San Miguel Peras', '1', NULL, NULL),
(1277, 20, '274', 'San Miguel Piedras', '1', NULL, NULL),
(1278, 20, '275', 'San Miguel Quetzaltepec', '1', NULL, NULL),
(1279, 20, '276', 'San Miguel Santa Flor', '1', NULL, NULL),
(1280, 20, '277', 'Villa Sola de Vega', '1', NULL, NULL),
(1281, 20, '278', 'San Miguel Soyaltepec', '1', NULL, NULL),
(1282, 20, '279', 'San Miguel Suchixtepec', '1', NULL, NULL),
(1283, 20, '280', 'Villa Talea de Castro', '1', NULL, NULL),
(1284, 20, '281', 'San Miguel Tecomatlán', '1', NULL, NULL),
(1285, 20, '282', 'San Miguel Tenango', '1', NULL, NULL),
(1286, 20, '283', 'San Miguel Tequixtepec', '1', NULL, NULL),
(1287, 20, '284', 'San Miguel Tilquiápam', '1', NULL, NULL),
(1288, 20, '285', 'San Miguel Tlacamama', '1', NULL, NULL),
(1289, 20, '286', 'San Miguel Tlacotepec', '1', NULL, NULL),
(1290, 20, '287', 'San Miguel Tulancingo', '1', NULL, NULL),
(1291, 20, '288', 'San Miguel Yotao', '1', NULL, NULL),
(1292, 20, '289', 'San Nicolás', '1', NULL, NULL),
(1293, 20, '290', 'San Nicolás Hidalgo', '1', NULL, NULL),
(1294, 20, '291', 'San Pablo Coatlán', '1', NULL, NULL),
(1295, 20, '292', 'San Pablo Cuatro Venados', '1', NULL, NULL),
(1296, 20, '293', 'San Pablo Etla', '1', NULL, NULL),
(1297, 20, '294', 'San Pablo Huitzo', '1', NULL, NULL),
(1298, 20, '295', 'San Pablo Huixtepec', '1', NULL, NULL),
(1299, 20, '296', 'San Pablo Macuiltianguis', '1', NULL, NULL),
(1300, 20, '297', 'San Pablo Tijaltepec', '1', NULL, NULL),
(1301, 20, '298', 'San Pablo Villa de Mitla', '1', NULL, NULL),
(1302, 20, '299', 'San Pablo Yaganiza', '1', NULL, NULL),
(1303, 20, '300', 'San Pedro Amuzgos', '1', NULL, NULL),
(1304, 20, '301', 'San Pedro Apóstol', '1', NULL, NULL),
(1305, 20, '302', 'San Pedro Atoyac', '1', NULL, NULL),
(1306, 20, '303', 'San Pedro Cajonos', '1', NULL, NULL),
(1307, 20, '304', 'San Pedro Coxcaltepec Cántaros', '1', NULL, NULL),
(1308, 20, '305', 'San Pedro Comitancillo', '1', NULL, NULL),
(1309, 20, '306', 'San Pedro el Alto', '1', NULL, NULL),
(1310, 20, '307', 'San Pedro Huamelula', '1', NULL, NULL),
(1311, 20, '308', 'San Pedro Huilotepec', '1', NULL, NULL),
(1312, 20, '309', 'San Pedro Ixcatlán', '1', NULL, NULL),
(1313, 20, '310', 'San Pedro Ixtlahuaca', '1', NULL, NULL),
(1314, 20, '311', 'San Pedro Jaltepetongo', '1', NULL, NULL),
(1315, 20, '312', 'San Pedro Jicayán', '1', NULL, NULL),
(1316, 20, '313', 'San Pedro Jocotipac', '1', NULL, NULL),
(1317, 20, '314', 'San Pedro Juchatengo', '1', NULL, NULL),
(1318, 20, '315', 'San Pedro Mártir', '1', NULL, NULL),
(1319, 20, '316', 'San Pedro Mártir Quiechapa', '1', NULL, NULL),
(1320, 20, '317', 'San Pedro Mártir Yucuxaco', '1', NULL, NULL),
(1321, 20, '318', 'San Pedro Mixtepec', '1', NULL, NULL),
(1322, 20, '319', 'San Pedro Mixtepec', '1', NULL, NULL),
(1323, 20, '320', 'San Pedro Molinos', '1', NULL, NULL),
(1324, 20, '321', 'San Pedro Nopala', '1', NULL, NULL),
(1325, 20, '322', 'San Pedro Ocopetatillo', '1', NULL, NULL),
(1326, 20, '323', 'San Pedro Ocotepec', '1', NULL, NULL),
(1327, 20, '324', 'San Pedro Pochutla', '1', NULL, NULL),
(1328, 20, '325', 'San Pedro Quiatoni', '1', NULL, NULL),
(1329, 20, '326', 'San Pedro Sochiápam', '1', NULL, NULL),
(1330, 20, '327', 'San Pedro Tapanatepec', '1', NULL, NULL),
(1331, 20, '328', 'San Pedro Taviche', '1', NULL, NULL),
(1332, 20, '329', 'San Pedro Teozacoalco', '1', NULL, NULL),
(1333, 20, '330', 'San Pedro Teutila', '1', NULL, NULL),
(1334, 20, '331', 'San Pedro Tidaá', '1', NULL, NULL),
(1335, 20, '332', 'San Pedro Topiltepec', '1', NULL, NULL),
(1336, 20, '333', 'San Pedro Totolápam', '1', NULL, NULL),
(1337, 20, '334', 'Villa de Tututepec', '1', NULL, NULL),
(1338, 20, '335', 'San Pedro Yaneri', '1', NULL, NULL),
(1339, 20, '336', 'San Pedro Yólox', '1', NULL, NULL),
(1340, 20, '337', 'San Pedro y San Pablo Ayutla', '1', NULL, NULL),
(1341, 20, '338', 'Villa de Etla', '1', NULL, NULL),
(1342, 20, '339', 'San Pedro y San Pablo Teposcolula', '1', NULL, NULL),
(1343, 20, '340', 'San Pedro y San Pablo Tequixtepec', '1', NULL, NULL),
(1344, 20, '341', 'San Pedro Yucunama', '1', NULL, NULL),
(1345, 20, '342', 'San Raymundo Jalpan', '1', NULL, NULL),
(1346, 20, '343', 'San Sebastián Abasolo', '1', NULL, NULL),
(1347, 20, '344', 'San Sebastián Coatlán', '1', NULL, NULL),
(1348, 20, '345', 'San Sebastián Ixcapa', '1', NULL, NULL),
(1349, 20, '346', 'San Sebastián Nicananduta', '1', NULL, NULL),
(1350, 20, '347', 'San Sebastián Río Hondo', '1', NULL, NULL),
(1351, 20, '348', 'San Sebastián Tecomaxtlahuaca', '1', NULL, NULL),
(1352, 20, '349', 'San Sebastián Teitipac', '1', NULL, NULL),
(1353, 20, '350', 'San Sebastián Tutla', '1', NULL, NULL),
(1354, 20, '351', 'San Simón Almolongas', '1', NULL, NULL),
(1355, 20, '352', 'San Simón Zahuatlán', '1', NULL, NULL),
(1356, 20, '353', 'Santa Ana', '1', NULL, NULL),
(1357, 20, '354', 'Santa Ana Ateixtlahuaca', '1', NULL, NULL),
(1358, 20, '355', 'Santa Ana Cuauhtémoc', '1', NULL, NULL),
(1359, 20, '356', 'Santa Ana del Valle', '1', NULL, NULL),
(1360, 20, '357', 'Santa Ana Tavela', '1', NULL, NULL),
(1361, 20, '358', 'Santa Ana Tlapacoyan', '1', NULL, NULL),
(1362, 20, '359', 'Santa Ana Yareni', '1', NULL, NULL),
(1363, 20, '360', 'Santa Ana Zegache', '1', NULL, NULL),
(1364, 20, '361', 'Santa Catalina Quierí', '1', NULL, NULL),
(1365, 20, '362', 'Santa Catarina Cuixtla', '1', NULL, NULL),
(1366, 20, '363', 'Santa Catarina Ixtepeji', '1', NULL, NULL),
(1367, 20, '364', 'Santa Catarina Juquila', '1', NULL, NULL),
(1368, 20, '365', 'Santa Catarina Lachatao', '1', NULL, NULL),
(1369, 20, '366', 'Santa Catarina Loxicha', '1', NULL, NULL),
(1370, 20, '367', 'Santa Catarina Mechoacán', '1', NULL, NULL),
(1371, 20, '368', 'Santa Catarina Minas', '1', NULL, NULL),
(1372, 20, '369', 'Santa Catarina Quiané', '1', NULL, NULL),
(1373, 20, '370', 'Santa Catarina Tayata', '1', NULL, NULL),
(1374, 20, '371', 'Santa Catarina Ticuá', '1', NULL, NULL),
(1375, 20, '372', 'Santa Catarina Yosonotú', '1', NULL, NULL),
(1376, 20, '373', 'Santa Catarina Zapoquila', '1', NULL, NULL),
(1377, 20, '374', 'Santa Cruz Acatepec', '1', NULL, NULL),
(1378, 20, '375', 'Santa Cruz Amilpas', '1', NULL, NULL),
(1379, 20, '376', 'Santa Cruz de Bravo', '1', NULL, NULL),
(1380, 20, '377', 'Santa Cruz Itundujia', '1', NULL, NULL),
(1381, 20, '378', 'Santa Cruz Mixtepec', '1', NULL, NULL),
(1382, 20, '379', 'Santa Cruz Nundaco', '1', NULL, NULL),
(1383, 20, '380', 'Santa Cruz Papalutla', '1', NULL, NULL),
(1384, 20, '381', 'Santa Cruz Tacache de Mina', '1', NULL, NULL),
(1385, 20, '382', 'Santa Cruz Tacahua', '1', NULL, NULL),
(1386, 20, '383', 'Santa Cruz Tayata', '1', NULL, NULL),
(1387, 20, '384', 'Santa Cruz Xitla', '1', NULL, NULL),
(1388, 20, '385', 'Santa Cruz Xoxocotlán', '1', NULL, NULL),
(1389, 20, '386', 'Santa Cruz Zenzontepec', '1', NULL, NULL),
(1390, 20, '387', 'Santa Gertrudis', '1', NULL, NULL),
(1391, 20, '388', 'Santa Inés del Monte', '1', NULL, NULL),
(1392, 20, '389', 'Santa Inés Yatzeche', '1', NULL, NULL),
(1393, 20, '390', 'Santa Lucía del Camino', '1', NULL, NULL),
(1394, 20, '391', 'Santa Lucía Miahuatlán', '1', NULL, NULL),
(1395, 20, '392', 'Santa Lucía Monteverde', '1', NULL, NULL),
(1396, 20, '393', 'Santa Lucía Ocotlán', '1', NULL, NULL),
(1397, 20, '394', 'Santa María Alotepec', '1', NULL, NULL),
(1398, 20, '395', 'Santa María Apazco', '1', NULL, NULL),
(1399, 20, '396', 'Santa María la Asunción', '1', NULL, NULL),
(1400, 20, '397', 'Heroica Ciudad de Tlaxiaco', '1', NULL, NULL),
(1401, 20, '398', 'Ayoquezco de Aldama', '1', NULL, NULL),
(1402, 20, '399', 'Santa María Atzompa', '1', NULL, NULL),
(1403, 20, '400', 'Santa María Camotlán', '1', NULL, NULL),
(1404, 20, '401', 'Santa María Colotepec', '1', NULL, NULL),
(1405, 20, '402', 'Santa María Cortijo', '1', NULL, NULL),
(1406, 20, '403', 'Santa María Coyotepec', '1', NULL, NULL),
(1407, 20, '404', 'Santa María Chachoápam', '1', NULL, NULL),
(1408, 20, '405', 'Villa de Chilapa de Díaz', '1', NULL, NULL),
(1409, 20, '406', 'Santa María Chilchotla', '1', NULL, NULL),
(1410, 20, '407', 'Santa María Chimalapa', '1', NULL, NULL),
(1411, 20, '408', 'Santa María del Rosario', '1', NULL, NULL),
(1412, 20, '409', 'Santa María del Tule', '1', NULL, NULL),
(1413, 20, '410', 'Santa María Ecatepec', '1', NULL, NULL),
(1414, 20, '411', 'Santa María Guelacé', '1', NULL, NULL),
(1415, 20, '412', 'Santa María Guienagati', '1', NULL, NULL),
(1416, 20, '413', 'Santa María Huatulco', '1', NULL, NULL),
(1417, 20, '414', 'Santa María Huazolotitlán', '1', NULL, NULL),
(1418, 20, '415', 'Santa María Ipalapa', '1', NULL, NULL),
(1419, 20, '416', 'Santa María Ixcatlán', '1', NULL, NULL),
(1420, 20, '417', 'Santa María Jacatepec', '1', NULL, NULL),
(1421, 20, '418', 'Santa María Jalapa del Marqués', '1', NULL, NULL),
(1422, 20, '419', 'Santa María Jaltianguis', '1', NULL, NULL),
(1423, 20, '420', 'Santa María Lachixío', '1', NULL, NULL),
(1424, 20, '421', 'Santa María Mixtequilla', '1', NULL, NULL),
(1425, 20, '422', 'Santa María Nativitas', '1', NULL, NULL),
(1426, 20, '423', 'Santa María Nduayaco', '1', NULL, NULL),
(1427, 20, '424', 'Santa María Ozolotepec', '1', NULL, NULL),
(1428, 20, '425', 'Santa María Pápalo', '1', NULL, NULL),
(1429, 20, '426', 'Santa María Peñoles', '1', NULL, NULL),
(1430, 20, '427', 'Santa María Petapa', '1', NULL, NULL),
(1431, 20, '428', 'Santa María Quiegolani', '1', NULL, NULL),
(1432, 20, '429', 'Santa María Sola', '1', NULL, NULL),
(1433, 20, '430', 'Santa María Tataltepec', '1', NULL, NULL),
(1434, 20, '431', 'Santa María Tecomavaca', '1', NULL, NULL),
(1435, 20, '432', 'Santa María Temaxcalapa', '1', NULL, NULL),
(1436, 20, '433', 'Santa María Temaxcaltepec', '1', NULL, NULL),
(1437, 20, '434', 'Santa María Teopoxco', '1', NULL, NULL),
(1438, 20, '435', 'Santa María Tepantlali', '1', NULL, NULL),
(1439, 20, '436', 'Santa María Texcatitlán', '1', NULL, NULL),
(1440, 20, '437', 'Santa María Tlahuitoltepec', '1', NULL, NULL),
(1441, 20, '438', 'Santa María Tlalixtac', '1', NULL, NULL),
(1442, 20, '439', 'Santa María Tonameca', '1', NULL, NULL),
(1443, 20, '440', 'Santa María Totolapilla', '1', NULL, NULL),
(1444, 20, '441', 'Santa María Xadani', '1', NULL, NULL),
(1445, 20, '442', 'Santa María Yalina', '1', NULL, NULL),
(1446, 20, '443', 'Santa María Yavesía', '1', NULL, NULL),
(1447, 20, '444', 'Santa María Yolotepec', '1', NULL, NULL),
(1448, 20, '445', 'Santa María Yosoyúa', '1', NULL, NULL),
(1449, 20, '446', 'Santa María Yucuhiti', '1', NULL, NULL),
(1450, 20, '447', 'Santa María Zacatepec', '1', NULL, NULL),
(1451, 20, '448', 'Santa María Zaniza', '1', NULL, NULL),
(1452, 20, '449', 'Santa María Zoquitlán', '1', NULL, NULL),
(1453, 20, '450', 'Santiago Amoltepec', '1', NULL, NULL),
(1454, 20, '451', 'Santiago Apoala', '1', NULL, NULL),
(1455, 20, '452', 'Santiago Apóstol', '1', NULL, NULL),
(1456, 20, '453', 'Santiago Astata', '1', NULL, NULL),
(1457, 20, '454', 'Santiago Atitlán', '1', NULL, NULL),
(1458, 20, '455', 'Santiago Ayuquililla', '1', NULL, NULL),
(1459, 20, '456', 'Santiago Cacaloxtepec', '1', NULL, NULL),
(1460, 20, '457', 'Santiago Camotlán', '1', NULL, NULL),
(1461, 20, '458', 'Santiago Comaltepec', '1', NULL, NULL),
(1462, 20, '459', 'Santiago Chazumba', '1', NULL, NULL),
(1463, 20, '460', 'Santiago Choápam', '1', NULL, NULL),
(1464, 20, '461', 'Santiago del Río', '1', NULL, NULL),
(1465, 20, '462', 'Santiago Huajolotitlán', '1', NULL, NULL),
(1466, 20, '463', 'Santiago Huauclilla', '1', NULL, NULL),
(1467, 20, '464', 'Santiago Ihuitlán Plumas', '1', NULL, NULL),
(1468, 20, '465', 'Santiago Ixcuintepec', '1', NULL, NULL),
(1469, 20, '466', 'Santiago Ixtayutla', '1', NULL, NULL),
(1470, 20, '467', 'Santiago Jamiltepec', '1', NULL, NULL),
(1471, 20, '468', 'Santiago Jocotepec', '1', NULL, NULL),
(1472, 20, '469', 'Santiago Juxtlahuaca', '1', NULL, NULL),
(1473, 20, '470', 'Santiago Lachiguiri', '1', NULL, NULL),
(1474, 20, '471', 'Santiago Lalopa', '1', NULL, NULL),
(1475, 20, '472', 'Santiago Laollaga', '1', NULL, NULL),
(1476, 20, '473', 'Santiago Laxopa', '1', NULL, NULL),
(1477, 20, '474', 'Santiago Llano Grande', '1', NULL, NULL),
(1478, 20, '475', 'Santiago Matatlán', '1', NULL, NULL),
(1479, 20, '476', 'Santiago Miltepec', '1', NULL, NULL),
(1480, 20, '477', 'Santiago Minas', '1', NULL, NULL),
(1481, 20, '478', 'Santiago Nacaltepec', '1', NULL, NULL),
(1482, 20, '479', 'Santiago Nejapilla', '1', NULL, NULL),
(1483, 20, '480', 'Santiago Nundiche', '1', NULL, NULL),
(1484, 20, '481', 'Santiago Nuyoó', '1', NULL, NULL),
(1485, 20, '482', 'Santiago Pinotepa Nacional', '1', NULL, NULL),
(1486, 20, '483', 'Santiago Suchilquitongo', '1', NULL, NULL),
(1487, 20, '484', 'Santiago Tamazola', '1', NULL, NULL),
(1488, 20, '485', 'Santiago Tapextla', '1', NULL, NULL),
(1489, 20, '486', 'Villa Tejúpam de la Unión', '1', NULL, NULL),
(1490, 20, '487', 'Santiago Tenango', '1', NULL, NULL),
(1491, 20, '488', 'Santiago Tepetlapa', '1', NULL, NULL),
(1492, 20, '489', 'Santiago Tetepec', '1', NULL, NULL),
(1493, 20, '490', 'Santiago Texcalcingo', '1', NULL, NULL),
(1494, 20, '491', 'Santiago Textitlán', '1', NULL, NULL),
(1495, 20, '492', 'Santiago Tilantongo', '1', NULL, NULL),
(1496, 20, '493', 'Santiago Tillo', '1', NULL, NULL),
(1497, 20, '494', 'Santiago Tlazoyaltepec', '1', NULL, NULL),
(1498, 20, '495', 'Santiago Xanica', '1', NULL, NULL),
(1499, 20, '496', 'Santiago Xiacuí', '1', NULL, NULL),
(1500, 20, '497', 'Santiago Yaitepec', '1', NULL, NULL),
(1501, 20, '498', 'Santiago Yaveo', '1', NULL, NULL),
(1502, 20, '499', 'Santiago Yolomécatl', '1', NULL, NULL),
(1503, 20, '500', 'Santiago Yosondúa', '1', NULL, NULL),
(1504, 20, '501', 'Santiago Yucuyachi', '1', NULL, NULL),
(1505, 20, '502', 'Santiago Zacatepec', '1', NULL, NULL),
(1506, 20, '503', 'Santiago Zoochila', '1', NULL, NULL),
(1507, 20, '504', 'Nuevo Zoquiápam', '1', NULL, NULL),
(1508, 20, '505', 'Santo Domingo Ingenio', '1', NULL, NULL),
(1509, 20, '506', 'Santo Domingo Albarradas', '1', NULL, NULL),
(1510, 20, '507', 'Santo Domingo Armenta', '1', NULL, NULL),
(1511, 20, '508', 'Santo Domingo Chihuitán', '1', NULL, NULL),
(1512, 20, '509', 'Santo Domingo de Morelos', '1', NULL, NULL),
(1513, 20, '510', 'Santo Domingo Ixcatlán', '1', NULL, NULL),
(1514, 20, '511', 'Santo Domingo Nuxaá', '1', NULL, NULL),
(1515, 20, '512', 'Santo Domingo Ozolotepec', '1', NULL, NULL),
(1516, 20, '513', 'Santo Domingo Petapa', '1', NULL, NULL),
(1517, 20, '514', 'Santo Domingo Roayaga', '1', NULL, NULL),
(1518, 20, '515', 'Santo Domingo Tehuantepec', '1', NULL, NULL),
(1519, 20, '516', 'Santo Domingo Teojomulco', '1', NULL, NULL),
(1520, 20, '517', 'Santo Domingo Tepuxtepec', '1', NULL, NULL),
(1521, 20, '518', 'Santo Domingo Tlatayápam', '1', NULL, NULL),
(1522, 20, '519', 'Santo Domingo Tomaltepec', '1', NULL, NULL),
(1523, 20, '520', 'Santo Domingo Tonalá', '1', NULL, NULL),
(1524, 20, '521', 'Santo Domingo Tonaltepec', '1', NULL, NULL),
(1525, 20, '522', 'Santo Domingo Xagacía', '1', NULL, NULL),
(1526, 20, '523', 'Santo Domingo Yanhuitlán', '1', NULL, NULL),
(1527, 20, '524', 'Santo Domingo Yodohino', '1', NULL, NULL),
(1528, 20, '525', 'Santo Domingo Zanatepec', '1', NULL, NULL),
(1529, 20, '526', 'Santos Reyes Nopala', '1', NULL, NULL),
(1530, 20, '527', 'Santos Reyes Pápalo', '1', NULL, NULL),
(1531, 20, '528', 'Santos Reyes Tepejillo', '1', NULL, NULL),
(1532, 20, '529', 'Santos Reyes Yucuná', '1', NULL, NULL),
(1533, 20, '530', 'Santo Tomás Jalieza', '1', NULL, NULL),
(1534, 20, '531', 'Santo Tomás Mazaltepec', '1', NULL, NULL),
(1535, 20, '532', 'Santo Tomás Ocotepec', '1', NULL, NULL),
(1536, 20, '533', 'Santo Tomás Tamazulapan', '1', NULL, NULL),
(1537, 20, '534', 'San Vicente Coatlán', '1', NULL, NULL),
(1538, 20, '535', 'San Vicente Lachixío', '1', NULL, NULL),
(1539, 20, '536', 'San Vicente Nuñú', '1', NULL, NULL),
(1540, 20, '537', 'Silacayoápam', '1', NULL, NULL),
(1541, 20, '538', 'Sitio de Xitlapehua', '1', NULL, NULL),
(1542, 20, '539', 'Soledad Etla', '1', NULL, NULL),
(1543, 20, '540', 'Villa de Tamazulápam del Progreso', '1', NULL, NULL),
(1544, 20, '541', 'Tanetze de Zaragoza', '1', NULL, NULL),
(1545, 20, '542', 'Taniche', '1', NULL, NULL),
(1546, 20, '543', 'Tataltepec de Valdés', '1', NULL, NULL),
(1547, 20, '544', 'Teococuilco de Marcos Pérez', '1', NULL, NULL),
(1548, 20, '545', 'Teotitlán de Flores Magón', '1', NULL, NULL),
(1549, 20, '546', 'Teotitlán del Valle', '1', NULL, NULL),
(1550, 20, '547', 'Teotongo', '1', NULL, NULL),
(1551, 20, '548', 'Tepelmeme Villa de Morelos', '1', NULL, NULL),
(1552, 20, '549', 'Heroica Villa Tezoatlán de Segura y Luna, Cuna de ', '1', NULL, NULL),
(1553, 20, '550', 'San Jerónimo Tlacochahuaya', '1', NULL, NULL),
(1554, 20, '551', 'Tlacolula de Matamoros', '1', NULL, NULL),
(1555, 20, '552', 'Tlacotepec Plumas', '1', NULL, NULL),
(1556, 20, '553', 'Tlalixtac de Cabrera', '1', NULL, NULL),
(1557, 20, '554', 'Totontepec Villa de Morelos', '1', NULL, NULL),
(1558, 20, '555', 'Trinidad Zaachila', '1', NULL, NULL),
(1559, 20, '556', 'La Trinidad Vista Hermosa', '1', NULL, NULL),
(1560, 20, '557', 'Unión Hidalgo', '1', NULL, NULL),
(1561, 20, '558', 'Valerio Trujano', '1', NULL, NULL),
(1562, 20, '559', 'San Juan Bautista Valle Nacional', '1', NULL, NULL),
(1563, 20, '560', 'Villa Díaz Ordaz', '1', NULL, NULL),
(1564, 20, '561', 'Yaxe', '1', NULL, NULL),
(1565, 20, '562', 'Magdalena Yodocono de Porfirio Díaz', '1', NULL, NULL),
(1566, 20, '563', 'Yogana', '1', NULL, NULL),
(1567, 20, '564', 'Yutanduchi de Guerrero', '1', NULL, NULL),
(1568, 20, '565', 'Villa de Zaachila', '1', NULL, NULL),
(1569, 20, '566', 'San Mateo Yucutindoo', '1', NULL, NULL),
(1570, 20, '567', 'Zapotitlán Lagunas', '1', NULL, NULL),
(1571, 20, '568', 'Zapotitlán Palmas', '1', NULL, NULL),
(1572, 20, '569', 'Santa Inés de Zaragoza', '1', NULL, NULL),
(1573, 20, '570', 'Zimatlán de Álvarez', '1', NULL, NULL),
(1574, 21, '001', 'Acajete', '1', NULL, NULL),
(1575, 21, '002', 'Acateno', '1', NULL, NULL),
(1576, 21, '003', 'Acatlán', '1', NULL, NULL),
(1577, 21, '004', 'Acatzingo', '1', NULL, NULL),
(1578, 21, '005', 'Acteopan', '1', NULL, NULL),
(1579, 21, '006', 'Ahuacatlán', '1', NULL, NULL),
(1580, 21, '007', 'Ahuatlán', '1', NULL, NULL),
(1581, 21, '008', 'Ahuazotepec', '1', NULL, NULL),
(1582, 21, '009', 'Ahuehuetitla', '1', NULL, NULL),
(1583, 21, '010', 'Ajalpan', '1', NULL, NULL),
(1584, 21, '011', 'Albino Zertuche', '1', NULL, NULL),
(1585, 21, '012', 'Aljojuca', '1', NULL, NULL),
(1586, 21, '013', 'Altepexi', '1', NULL, NULL),
(1587, 21, '014', 'Amixtlán', '1', NULL, NULL),
(1588, 21, '015', 'Amozoc', '1', NULL, NULL),
(1589, 21, '016', 'Aquixtla', '1', NULL, NULL),
(1590, 21, '017', 'Atempan', '1', NULL, NULL),
(1591, 21, '018', 'Atexcal', '1', NULL, NULL),
(1592, 21, '019', 'Atlixco', '1', NULL, NULL),
(1593, 21, '020', 'Atoyatempan', '1', NULL, NULL),
(1594, 21, '021', 'Atzala', '1', NULL, NULL),
(1595, 21, '022', 'Atzitzihuacán', '1', NULL, NULL),
(1596, 21, '023', 'Atzitzintla', '1', NULL, NULL),
(1597, 21, '024', 'Axutla', '1', NULL, NULL),
(1598, 21, '025', 'Ayotoxco de Guerrero', '1', NULL, NULL),
(1599, 21, '026', 'Calpan', '1', NULL, NULL),
(1600, 21, '027', 'Caltepec', '1', NULL, NULL),
(1601, 21, '028', 'Camocuautla', '1', NULL, NULL),
(1602, 21, '029', 'Caxhuacan', '1', NULL, NULL),
(1603, 21, '030', 'Coatepec', '1', NULL, NULL),
(1604, 21, '031', 'Coatzingo', '1', NULL, NULL),
(1605, 21, '032', 'Cohetzala', '1', NULL, NULL),
(1606, 21, '033', 'Cohuecan', '1', NULL, NULL),
(1607, 21, '034', 'Coronango', '1', NULL, NULL),
(1608, 21, '035', 'Coxcatlán', '1', NULL, NULL),
(1609, 21, '036', 'Coyomeapan', '1', NULL, NULL),
(1610, 21, '037', 'Coyotepec', '1', NULL, NULL),
(1611, 21, '038', 'Cuapiaxtla de Madero', '1', NULL, NULL),
(1612, 21, '039', 'Cuautempan', '1', NULL, NULL),
(1613, 21, '040', 'Cuautinchán', '1', NULL, NULL),
(1614, 21, '041', 'Cuautlancingo', '1', NULL, NULL),
(1615, 21, '042', 'Cuayuca de Andrade', '1', NULL, NULL),
(1616, 21, '043', 'Cuetzalan del Progreso', '1', NULL, NULL),
(1617, 21, '044', 'Cuyoaco', '1', NULL, NULL),
(1618, 21, '045', 'Chalchicomula de Sesma', '1', NULL, NULL),
(1619, 21, '046', 'Chapulco', '1', NULL, NULL),
(1620, 21, '047', 'Chiautla', '1', NULL, NULL),
(1621, 21, '048', 'Chiautzingo', '1', NULL, NULL),
(1622, 21, '049', 'Chiconcuautla', '1', NULL, NULL),
(1623, 21, '050', 'Chichiquila', '1', NULL, NULL),
(1624, 21, '051', 'Chietla', '1', NULL, NULL),
(1625, 21, '052', 'Chigmecatitlán', '1', NULL, NULL),
(1626, 21, '053', 'Chignahuapan', '1', NULL, NULL),
(1627, 21, '054', 'Chignautla', '1', NULL, NULL),
(1628, 21, '055', 'Chila', '1', NULL, NULL),
(1629, 21, '056', 'Chila de la Sal', '1', NULL, NULL),
(1630, 21, '057', 'Honey', '1', NULL, NULL),
(1631, 21, '058', 'Chilchotla', '1', NULL, NULL),
(1632, 21, '059', 'Chinantla', '1', NULL, NULL),
(1633, 21, '060', 'Domingo Arenas', '1', NULL, NULL),
(1634, 21, '061', 'Eloxochitlán', '1', NULL, NULL),
(1635, 21, '062', 'Epatlán', '1', NULL, NULL),
(1636, 21, '063', 'Esperanza', '1', NULL, NULL),
(1637, 21, '064', 'Francisco Z. Mena', '1', NULL, NULL),
(1638, 21, '065', 'General Felipe Ángeles', '1', NULL, NULL),
(1639, 21, '066', 'Guadalupe', '1', NULL, NULL),
(1640, 21, '067', 'Guadalupe Victoria', '1', NULL, NULL),
(1641, 21, '068', 'Hermenegildo Galeana', '1', NULL, NULL),
(1642, 21, '069', 'Huaquechula', '1', NULL, NULL),
(1643, 21, '070', 'Huatlatlauca', '1', NULL, NULL),
(1644, 21, '071', 'Huauchinango', '1', NULL, NULL),
(1645, 21, '072', 'Huehuetla', '1', NULL, NULL),
(1646, 21, '073', 'Huehuetlán el Chico', '1', NULL, NULL),
(1647, 21, '074', 'Huejotzingo', '1', NULL, NULL),
(1648, 21, '075', 'Hueyapan', '1', NULL, NULL),
(1649, 21, '076', 'Hueytamalco', '1', NULL, NULL),
(1650, 21, '077', 'Hueytlalpan', '1', NULL, NULL),
(1651, 21, '078', 'Huitzilan de Serdán', '1', NULL, NULL),
(1652, 21, '079', 'Huitziltepec', '1', NULL, NULL),
(1653, 21, '080', 'Atlequizayan', '1', NULL, NULL),
(1654, 21, '081', 'Ixcamilpa de Guerrero', '1', NULL, NULL),
(1655, 21, '082', 'Ixcaquixtla', '1', NULL, NULL),
(1656, 21, '083', 'Ixtacamaxtitlán', '1', NULL, NULL),
(1657, 21, '084', 'Ixtepec', '1', NULL, NULL),
(1658, 21, '085', 'Izúcar de Matamoros', '1', NULL, NULL),
(1659, 21, '086', 'Jalpan', '1', NULL, NULL),
(1660, 21, '087', 'Jolalpan', '1', NULL, NULL),
(1661, 21, '088', 'Jonotla', '1', NULL, NULL),
(1662, 21, '089', 'Jopala', '1', NULL, NULL),
(1663, 21, '090', 'Juan C. Bonilla', '1', NULL, NULL),
(1664, 21, '091', 'Juan Galindo', '1', NULL, NULL),
(1665, 21, '092', 'Juan N. Méndez', '1', NULL, NULL),
(1666, 21, '093', 'Lafragua', '1', NULL, NULL),
(1667, 21, '094', 'Libres', '1', NULL, NULL),
(1668, 21, '095', 'La Magdalena Tlatlauquitepec', '1', NULL, NULL),
(1669, 21, '096', 'Mazapiltepec de Juárez', '1', NULL, NULL),
(1670, 21, '097', 'Mixtla', '1', NULL, NULL),
(1671, 21, '098', 'Molcaxac', '1', NULL, NULL),
(1672, 21, '099', 'Cañada Morelos', '1', NULL, NULL),
(1673, 21, '100', 'Naupan', '1', NULL, NULL),
(1674, 21, '101', 'Nauzontla', '1', NULL, NULL),
(1675, 21, '102', 'Nealtican', '1', NULL, NULL),
(1676, 21, '103', 'Nicolás Bravo', '1', NULL, NULL),
(1677, 21, '104', 'Nopalucan', '1', NULL, NULL),
(1678, 21, '105', 'Ocotepec', '1', NULL, NULL),
(1679, 21, '106', 'Ocoyucan', '1', NULL, NULL),
(1680, 21, '107', 'Olintla', '1', NULL, NULL),
(1681, 21, '108', 'Oriental', '1', NULL, NULL),
(1682, 21, '109', 'Pahuatlán', '1', NULL, NULL),
(1683, 21, '110', 'Palmar de Bravo', '1', NULL, NULL),
(1684, 21, '111', 'Pantepec', '1', NULL, NULL),
(1685, 21, '112', 'Petlalcingo', '1', NULL, NULL),
(1686, 21, '113', 'Piaxtla', '1', NULL, NULL),
(1687, 21, '114', 'Puebla', '1', NULL, NULL),
(1688, 21, '115', 'Quecholac', '1', NULL, NULL),
(1689, 21, '116', 'Quimixtlán', '1', NULL, NULL),
(1690, 21, '117', 'Rafael Lara Grajales', '1', NULL, NULL),
(1691, 21, '118', 'Los Reyes de Juárez', '1', NULL, NULL),
(1692, 21, '119', 'San Andrés Cholula', '1', NULL, NULL),
(1693, 21, '120', 'San Antonio Cañada', '1', NULL, NULL),
(1694, 21, '121', 'San Diego la Mesa Tochimiltzingo', '1', NULL, NULL),
(1695, 21, '122', 'San Felipe Teotlalcingo', '1', NULL, NULL),
(1696, 21, '123', 'San Felipe Tepatlán', '1', NULL, NULL),
(1697, 21, '124', 'San Gabriel Chilac', '1', NULL, NULL),
(1698, 21, '125', 'San Gregorio Atzompa', '1', NULL, NULL),
(1699, 21, '126', 'San Jerónimo Tecuanipan', '1', NULL, NULL),
(1700, 21, '127', 'San Jerónimo Xayacatlán', '1', NULL, NULL),
(1701, 21, '128', 'San José Chiapa', '1', NULL, NULL),
(1702, 21, '129', 'San José Miahuatlán', '1', NULL, NULL),
(1703, 21, '130', 'San Juan Atenco', '1', NULL, NULL),
(1704, 21, '131', 'San Juan Atzompa', '1', NULL, NULL),
(1705, 21, '132', 'San Martín Texmelucan', '1', NULL, NULL),
(1706, 21, '133', 'San Martín Totoltepec', '1', NULL, NULL),
(1707, 21, '134', 'San Matías Tlalancaleca', '1', NULL, NULL),
(1708, 21, '135', 'San Miguel Ixitlán', '1', NULL, NULL),
(1709, 21, '136', 'San Miguel Xoxtla', '1', NULL, NULL),
(1710, 21, '137', 'San Nicolás Buenos Aires', '1', NULL, NULL),
(1711, 21, '138', 'San Nicolás de los Ranchos', '1', NULL, NULL),
(1712, 21, '139', 'San Pablo Anicano', '1', NULL, NULL),
(1713, 21, '140', 'San Pedro Cholula', '1', NULL, NULL),
(1714, 21, '141', 'San Pedro Yeloixtlahuaca', '1', NULL, NULL),
(1715, 21, '142', 'San Salvador el Seco', '1', NULL, NULL),
(1716, 21, '143', 'San Salvador el Verde', '1', NULL, NULL),
(1717, 21, '144', 'San Salvador Huixcolotla', '1', NULL, NULL),
(1718, 21, '145', 'San Sebastián Tlacotepec', '1', NULL, NULL),
(1719, 21, '146', 'Santa Catarina Tlaltempan', '1', NULL, NULL),
(1720, 21, '147', 'Santa Inés Ahuatempan', '1', NULL, NULL),
(1721, 21, '148', 'Santa Isabel Cholula', '1', NULL, NULL),
(1722, 21, '149', 'Santiago Miahuatlán', '1', NULL, NULL),
(1723, 21, '150', 'Huehuetlán el Grande', '1', NULL, NULL),
(1724, 21, '151', 'Santo Tomás Hueyotlipan', '1', NULL, NULL),
(1725, 21, '152', 'Soltepec', '1', NULL, NULL),
(1726, 21, '153', 'Tecali de Herrera', '1', NULL, NULL),
(1727, 21, '154', 'Tecamachalco', '1', NULL, NULL),
(1728, 21, '155', 'Tecomatlán', '1', NULL, NULL),
(1729, 21, '156', 'Tehuacán', '1', NULL, NULL),
(1730, 21, '157', 'Tehuitzingo', '1', NULL, NULL),
(1731, 21, '158', 'Tenampulco', '1', NULL, NULL),
(1732, 21, '159', 'Teopantlán', '1', NULL, NULL),
(1733, 21, '160', 'Teotlalco', '1', NULL, NULL),
(1734, 21, '161', 'Tepanco de López', '1', NULL, NULL),
(1735, 21, '162', 'Tepango de Rodríguez', '1', NULL, NULL),
(1736, 21, '163', 'Tepatlaxco de Hidalgo', '1', NULL, NULL),
(1737, 21, '164', 'Tepeaca', '1', NULL, NULL),
(1738, 21, '165', 'Tepemaxalco', '1', NULL, NULL),
(1739, 21, '166', 'Tepeojuma', '1', NULL, NULL),
(1740, 21, '167', 'Tepetzintla', '1', NULL, NULL),
(1741, 21, '168', 'Tepexco', '1', NULL, NULL),
(1742, 21, '169', 'Tepexi de Rodríguez', '1', NULL, NULL),
(1743, 21, '170', 'Tepeyahualco', '1', NULL, NULL),
(1744, 21, '171', 'Tepeyahualco de Cuauhtémoc', '1', NULL, NULL),
(1745, 21, '172', 'Tetela de Ocampo', '1', NULL, NULL),
(1746, 21, '173', 'Teteles de Avila Castillo', '1', NULL, NULL),
(1747, 21, '174', 'Teziutlán', '1', NULL, NULL),
(1748, 21, '175', 'Tianguismanalco', '1', NULL, NULL),
(1749, 21, '176', 'Tilapa', '1', NULL, NULL),
(1750, 21, '177', 'Tlacotepec de Benito Juárez', '1', NULL, NULL),
(1751, 21, '178', 'Tlacuilotepec', '1', NULL, NULL),
(1752, 21, '179', 'Tlachichuca', '1', NULL, NULL),
(1753, 21, '180', 'Tlahuapan', '1', NULL, NULL),
(1754, 21, '181', 'Tlaltenango', '1', NULL, NULL),
(1755, 21, '182', 'Tlanepantla', '1', NULL, NULL),
(1756, 21, '183', 'Tlaola', '1', NULL, NULL),
(1757, 21, '184', 'Tlapacoya', '1', NULL, NULL),
(1758, 21, '185', 'Tlapanalá', '1', NULL, NULL),
(1759, 21, '186', 'Tlatlauquitepec', '1', NULL, NULL),
(1760, 21, '187', 'Tlaxco', '1', NULL, NULL),
(1761, 21, '188', 'Tochimilco', '1', NULL, NULL),
(1762, 21, '189', 'Tochtepec', '1', NULL, NULL),
(1763, 21, '190', 'Totoltepec de Guerrero', '1', NULL, NULL),
(1764, 21, '191', 'Tulcingo', '1', NULL, NULL),
(1765, 21, '192', 'Tuzamapan de Galeana', '1', NULL, NULL),
(1766, 21, '193', 'Tzicatlacoyan', '1', NULL, NULL),
(1767, 21, '194', 'Venustiano Carranza', '1', NULL, NULL),
(1768, 21, '195', 'Vicente Guerrero', '1', NULL, NULL),
(1769, 21, '196', 'Xayacatlán de Bravo', '1', NULL, NULL),
(1770, 21, '197', 'Xicotepec', '1', NULL, NULL),
(1771, 21, '198', 'Xicotlán', '1', NULL, NULL),
(1772, 21, '199', 'Xiutetelco', '1', NULL, NULL),
(1773, 21, '200', 'Xochiapulco', '1', NULL, NULL),
(1774, 21, '201', 'Xochiltepec', '1', NULL, NULL),
(1775, 21, '202', 'Xochitlán de Vicente Suárez', '1', NULL, NULL),
(1776, 21, '203', 'Xochitlán Todos Santos', '1', NULL, NULL),
(1777, 21, '204', 'Yaonáhuac', '1', NULL, NULL),
(1778, 21, '205', 'Yehualtepec', '1', NULL, NULL),
(1779, 21, '206', 'Zacapala', '1', NULL, NULL),
(1780, 21, '207', 'Zacapoaxtla', '1', NULL, NULL),
(1781, 21, '208', 'Zacatlán', '1', NULL, NULL),
(1782, 21, '209', 'Zapotitlán', '1', NULL, NULL),
(1783, 21, '210', 'Zapotitlán de Méndez', '1', NULL, NULL),
(1784, 21, '211', 'Zaragoza', '1', NULL, NULL),
(1785, 21, '212', 'Zautla', '1', NULL, NULL),
(1786, 21, '213', 'Zihuateutla', '1', NULL, NULL),
(1787, 21, '214', 'Zinacatepec', '1', NULL, NULL),
(1788, 21, '215', 'Zongozotla', '1', NULL, NULL),
(1789, 21, '216', 'Zoquiapan', '1', NULL, NULL),
(1790, 21, '217', 'Zoquitlán', '1', NULL, NULL),
(1791, 22, '001', 'Amealco de Bonfil', '1', NULL, NULL),
(1792, 22, '002', 'Pinal de Amoles', '1', NULL, NULL),
(1793, 22, '003', 'Arroyo Seco', '1', NULL, NULL),
(1794, 22, '004', 'Cadereyta de Montes', '1', NULL, NULL),
(1795, 22, '005', 'Colón', '1', NULL, NULL),
(1796, 22, '006', 'Corregidora', '1', NULL, NULL),
(1797, 22, '007', 'Ezequiel Montes', '1', NULL, NULL),
(1798, 22, '008', 'Huimilpan', '1', NULL, NULL),
(1799, 22, '009', 'Jalpan de Serra', '1', NULL, NULL),
(1800, 22, '010', 'Landa de Matamoros', '1', NULL, NULL),
(1801, 22, '011', 'El Marqués', '1', NULL, NULL),
(1802, 22, '012', 'Pedro Escobedo', '1', NULL, NULL),
(1803, 22, '013', 'Peñamiller', '1', NULL, NULL),
(1804, 22, '014', 'Querétaro', '1', NULL, NULL),
(1805, 22, '015', 'San Joaquín', '1', NULL, NULL),
(1806, 22, '016', 'San Juan del Río', '1', NULL, NULL),
(1807, 22, '017', 'Tequisquiapan', '1', NULL, NULL),
(1808, 22, '018', 'Tolimán', '1', NULL, NULL),
(1809, 23, '001', 'Cozumel', '1', NULL, NULL),
(1810, 23, '002', 'Felipe Carrillo Puerto', '1', NULL, NULL),
(1811, 23, '003', 'Isla Mujeres', '1', NULL, NULL),
(1812, 23, '004', 'Othón P. Blanco', '1', NULL, NULL),
(1813, 23, '005', 'Benito Juárez', '1', NULL, NULL),
(1814, 23, '006', 'José María Morelos', '1', NULL, NULL),
(1815, 23, '007', 'Lázaro Cárdenas', '1', NULL, NULL),
(1816, 23, '008', 'Solidaridad', '1', NULL, NULL),
(1817, 23, '009', 'Tulum', '1', NULL, NULL),
(1818, 23, '010', 'Bacalar', '1', NULL, NULL),
(1819, 23, '011', 'Puerto Morelos', '1', NULL, NULL),
(1820, 24, '001', 'Ahualulco', '1', NULL, NULL),
(1821, 24, '002', 'Alaquines', '1', NULL, NULL),
(1822, 24, '003', 'Aquismón', '1', NULL, NULL),
(1823, 24, '004', 'Armadillo de los Infante', '1', NULL, NULL),
(1824, 24, '005', 'Cárdenas', '1', NULL, NULL),
(1825, 24, '006', 'Catorce', '1', NULL, NULL),
(1826, 24, '007', 'Cedral', '1', NULL, NULL),
(1827, 24, '008', 'Cerritos', '1', NULL, NULL),
(1828, 24, '009', 'Cerro de San Pedro', '1', NULL, NULL),
(1829, 24, '010', 'Ciudad del Maíz', '1', NULL, NULL),
(1830, 24, '011', 'Ciudad Fernández', '1', NULL, NULL),
(1831, 24, '012', 'Tancanhuitz', '1', NULL, NULL),
(1832, 24, '013', 'Ciudad Valles', '1', NULL, NULL),
(1833, 24, '014', 'Coxcatlán', '1', NULL, NULL),
(1834, 24, '015', 'Charcas', '1', NULL, NULL),
(1835, 24, '016', 'Ebano', '1', NULL, NULL),
(1836, 24, '017', 'Guadalcázar', '1', NULL, NULL),
(1837, 24, '018', 'Huehuetlán', '1', NULL, NULL),
(1838, 24, '019', 'Lagunillas', '1', NULL, NULL),
(1839, 24, '020', 'Matehuala', '1', NULL, NULL),
(1840, 24, '021', 'Mexquitic de Carmona', '1', NULL, NULL),
(1841, 24, '022', 'Moctezuma', '1', NULL, NULL),
(1842, 24, '023', 'Rayón', '1', NULL, NULL),
(1843, 24, '024', 'Rioverde', '1', NULL, NULL),
(1844, 24, '025', 'Salinas', '1', NULL, NULL),
(1845, 24, '026', 'San Antonio', '1', NULL, NULL),
(1846, 24, '027', 'San Ciro de Acosta', '1', NULL, NULL),
(1847, 24, '028', 'San Luis Potosí', '1', NULL, NULL),
(1848, 24, '029', 'San Martín Chalchicuautla', '1', NULL, NULL),
(1849, 24, '030', 'San Nicolás Tolentino', '1', NULL, NULL),
(1850, 24, '031', 'Santa Catarina', '1', NULL, NULL),
(1851, 24, '032', 'Santa María del Río', '1', NULL, NULL),
(1852, 24, '033', 'Santo Domingo', '1', NULL, NULL),
(1853, 24, '034', 'San Vicente Tancuayalab', '1', NULL, NULL),
(1854, 24, '035', 'Soledad de Graciano Sánchez', '1', NULL, NULL),
(1855, 24, '036', 'Tamasopo', '1', NULL, NULL),
(1856, 24, '037', 'Tamazunchale', '1', NULL, NULL),
(1857, 24, '038', 'Tampacán', '1', NULL, NULL),
(1858, 24, '039', 'Tampamolón Corona', '1', NULL, NULL),
(1859, 24, '040', 'Tamuín', '1', NULL, NULL),
(1860, 24, '041', 'Tanlajás', '1', NULL, NULL),
(1861, 24, '042', 'Tanquián de Escobedo', '1', NULL, NULL),
(1862, 24, '043', 'Tierra Nueva', '1', NULL, NULL),
(1863, 24, '044', 'Vanegas', '1', NULL, NULL),
(1864, 24, '045', 'Venado', '1', NULL, NULL),
(1865, 24, '046', 'Villa de Arriaga', '1', NULL, NULL),
(1866, 24, '047', 'Villa de Guadalupe', '1', NULL, NULL),
(1867, 24, '048', 'Villa de la Paz', '1', NULL, NULL),
(1868, 24, '049', 'Villa de Ramos', '1', NULL, NULL),
(1869, 24, '050', 'Villa de Reyes', '1', NULL, NULL),
(1870, 24, '051', 'Villa Hidalgo', '1', NULL, NULL),
(1871, 24, '052', 'Villa Juárez', '1', NULL, NULL),
(1872, 24, '053', 'Axtla de Terrazas', '1', NULL, NULL),
(1873, 24, '054', 'Xilitla', '1', NULL, NULL),
(1874, 24, '055', 'Zaragoza', '1', NULL, NULL),
(1875, 24, '056', 'Villa de Arista', '1', NULL, NULL),
(1876, 24, '057', 'Matlapa', '1', NULL, NULL),
(1877, 24, '058', 'El Naranjo', '1', NULL, NULL),
(1878, 25, '001', 'Ahome', '1', NULL, NULL),
(1879, 25, '002', 'Angostura', '1', NULL, NULL),
(1880, 25, '003', 'Badiraguato', '1', NULL, NULL),
(1881, 25, '004', 'Concordia', '1', NULL, NULL),
(1882, 25, '005', 'Cosalá', '1', NULL, NULL),
(1883, 25, '006', 'Culiacán', '1', NULL, NULL),
(1884, 25, '007', 'Choix', '1', NULL, NULL),
(1885, 25, '008', 'Elota', '1', NULL, NULL),
(1886, 25, '009', 'Escuinapa', '1', NULL, NULL),
(1887, 25, '010', 'El Fuerte', '1', NULL, NULL),
(1888, 25, '011', 'Guasave', '1', NULL, NULL),
(1889, 25, '012', 'Mazatlán', '1', NULL, NULL),
(1890, 25, '013', 'Mocorito', '1', NULL, NULL),
(1891, 25, '014', 'Rosario', '1', NULL, NULL),
(1892, 25, '015', 'Salvador Alvarado', '1', NULL, NULL),
(1893, 25, '016', 'San Ignacio', '1', NULL, NULL),
(1894, 25, '017', 'Sinaloa', '1', NULL, NULL),
(1895, 25, '018', 'Navolato', '1', NULL, NULL),
(1896, 26, '001', 'Aconchi', '1', NULL, NULL),
(1897, 26, '002', 'Agua Prieta', '1', NULL, NULL),
(1898, 26, '003', 'Alamos', '1', NULL, NULL),
(1899, 26, '004', 'Altar', '1', NULL, NULL),
(1900, 26, '005', 'Arivechi', '1', NULL, NULL),
(1901, 26, '006', 'Arizpe', '1', NULL, NULL),
(1902, 26, '007', 'Atil', '1', NULL, NULL),
(1903, 26, '008', 'Bacadéhuachi', '1', NULL, NULL),
(1904, 26, '009', 'Bacanora', '1', NULL, NULL),
(1905, 26, '010', 'Bacerac', '1', NULL, NULL),
(1906, 26, '011', 'Bacoachi', '1', NULL, NULL),
(1907, 26, '012', 'Bácum', '1', NULL, NULL),
(1908, 26, '013', 'Banámichi', '1', NULL, NULL),
(1909, 26, '014', 'Baviácora', '1', NULL, NULL),
(1910, 26, '015', 'Bavispe', '1', NULL, NULL),
(1911, 26, '016', 'Benjamín Hill', '1', NULL, NULL),
(1912, 26, '017', 'Caborca', '1', NULL, NULL),
(1913, 26, '018', 'Cajeme', '1', NULL, NULL),
(1914, 26, '019', 'Cananea', '1', NULL, NULL),
(1915, 26, '020', 'Carbó', '1', NULL, NULL),
(1916, 26, '021', 'La Colorada', '1', NULL, NULL),
(1917, 26, '022', 'Cucurpe', '1', NULL, NULL),
(1918, 26, '023', 'Cumpas', '1', NULL, NULL),
(1919, 26, '024', 'Divisaderos', '1', NULL, NULL),
(1920, 26, '025', 'Empalme', '1', NULL, NULL),
(1921, 26, '026', 'Etchojoa', '1', NULL, NULL),
(1922, 26, '027', 'Fronteras', '1', NULL, NULL),
(1923, 26, '028', 'Granados', '1', NULL, NULL),
(1924, 26, '029', 'Guaymas', '1', NULL, NULL),
(1925, 26, '030', 'Hermosillo', '1', NULL, NULL),
(1926, 26, '031', 'Huachinera', '1', NULL, NULL),
(1927, 26, '032', 'Huásabas', '1', NULL, NULL),
(1928, 26, '033', 'Huatabampo', '1', NULL, NULL),
(1929, 26, '034', 'Huépac', '1', NULL, NULL),
(1930, 26, '035', 'Imuris', '1', NULL, NULL),
(1931, 26, '036', 'Magdalena', '1', NULL, NULL),
(1932, 26, '037', 'Mazatán', '1', NULL, NULL),
(1933, 26, '038', 'Moctezuma', '1', NULL, NULL),
(1934, 26, '039', 'Naco', '1', NULL, NULL),
(1935, 26, '040', 'Nácori Chico', '1', NULL, NULL),
(1936, 26, '041', 'Nacozari de García', '1', NULL, NULL),
(1937, 26, '042', 'Navojoa', '1', NULL, NULL),
(1938, 26, '043', 'Nogales', '1', NULL, NULL),
(1939, 26, '044', 'Onavas', '1', NULL, NULL),
(1940, 26, '045', 'Opodepe', '1', NULL, NULL);
INSERT INTO `municipalities` (`id`, `state_id`, `clave`, `name`, `activo`, `created_at`, `updated_at`) VALUES
(1941, 26, '046', 'Oquitoa', '1', NULL, NULL),
(1942, 26, '047', 'Pitiquito', '1', NULL, NULL),
(1943, 26, '048', 'Puerto Peñasco', '1', NULL, NULL),
(1944, 26, '049', 'Quiriego', '1', NULL, NULL),
(1945, 26, '050', 'Rayón', '1', NULL, NULL),
(1946, 26, '051', 'Rosario', '1', NULL, NULL),
(1947, 26, '052', 'Sahuaripa', '1', NULL, NULL),
(1948, 26, '053', 'San Felipe de Jesús', '1', NULL, NULL),
(1949, 26, '054', 'San Javier', '1', NULL, NULL),
(1950, 26, '055', 'San Luis Río Colorado', '1', NULL, NULL),
(1951, 26, '056', 'San Miguel de Horcasitas', '1', NULL, NULL),
(1952, 26, '057', 'San Pedro de la Cueva', '1', NULL, NULL),
(1953, 26, '058', 'Santa Ana', '1', NULL, NULL),
(1954, 26, '059', 'Santa Cruz', '1', NULL, NULL),
(1955, 26, '060', 'Sáric', '1', NULL, NULL),
(1956, 26, '061', 'Soyopa', '1', NULL, NULL),
(1957, 26, '062', 'Suaqui Grande', '1', NULL, NULL),
(1958, 26, '063', 'Tepache', '1', NULL, NULL),
(1959, 26, '064', 'Trincheras', '1', NULL, NULL),
(1960, 26, '065', 'Tubutama', '1', NULL, NULL),
(1961, 26, '066', 'Ures', '1', NULL, NULL),
(1962, 26, '067', 'Villa Hidalgo', '1', NULL, NULL),
(1963, 26, '068', 'Villa Pesqueira', '1', NULL, NULL),
(1964, 26, '069', 'Yécora', '1', NULL, NULL),
(1965, 26, '070', 'General Plutarco Elías Calles', '1', NULL, NULL),
(1966, 26, '071', 'Benito Juárez', '1', NULL, NULL),
(1967, 26, '072', 'San Ignacio Río Muerto', '1', NULL, NULL),
(1968, 27, '001', 'Balancán', '1', NULL, NULL),
(1969, 27, '002', 'Cárdenas', '1', NULL, NULL),
(1970, 27, '003', 'Centla', '1', NULL, NULL),
(1971, 27, '004', 'Centro', '1', NULL, NULL),
(1972, 27, '005', 'Comalcalco', '1', NULL, NULL),
(1973, 27, '006', 'Cunduacán', '1', NULL, NULL),
(1974, 27, '007', 'Emiliano Zapata', '1', NULL, NULL),
(1975, 27, '008', 'Huimanguillo', '1', NULL, NULL),
(1976, 27, '009', 'Jalapa', '1', NULL, NULL),
(1977, 27, '010', 'Jalpa de Méndez', '1', NULL, NULL),
(1978, 27, '011', 'Jonuta', '1', NULL, NULL),
(1979, 27, '012', 'Macuspana', '1', NULL, NULL),
(1980, 27, '013', 'Nacajuca', '1', NULL, NULL),
(1981, 27, '014', 'Paraíso', '1', NULL, NULL),
(1982, 27, '015', 'Tacotalpa', '1', NULL, NULL),
(1983, 27, '016', 'Teapa', '1', NULL, NULL),
(1984, 27, '017', 'Tenosique', '1', NULL, NULL),
(1985, 28, '001', 'Abasolo', '1', NULL, NULL),
(1986, 28, '002', 'Aldama', '1', NULL, NULL),
(1987, 28, '003', 'Altamira', '1', NULL, NULL),
(1988, 28, '004', 'Antiguo Morelos', '1', NULL, NULL),
(1989, 28, '005', 'Burgos', '1', NULL, NULL),
(1990, 28, '006', 'Bustamante', '1', NULL, NULL),
(1991, 28, '007', 'Camargo', '1', NULL, NULL),
(1992, 28, '008', 'Casas', '1', NULL, NULL),
(1993, 28, '009', 'Ciudad Madero', '1', NULL, NULL),
(1994, 28, '010', 'Cruillas', '1', NULL, NULL),
(1995, 28, '011', 'Gómez Farías', '1', NULL, NULL),
(1996, 28, '012', 'González', '1', NULL, NULL),
(1997, 28, '013', 'Güémez', '1', NULL, NULL),
(1998, 28, '014', 'Guerrero', '1', NULL, NULL),
(1999, 28, '015', 'Gustavo Díaz Ordaz', '1', NULL, NULL),
(2000, 28, '016', 'Hidalgo', '1', NULL, NULL),
(2001, 28, '017', 'Jaumave', '1', NULL, NULL),
(2002, 28, '018', 'Jiménez', '1', NULL, NULL),
(2003, 28, '019', 'Llera', '1', NULL, NULL),
(2004, 28, '020', 'Mainero', '1', NULL, NULL),
(2005, 28, '021', 'El Mante', '1', NULL, NULL),
(2006, 28, '022', 'Matamoros', '1', NULL, NULL),
(2007, 28, '023', 'Méndez', '1', NULL, NULL),
(2008, 28, '024', 'Mier', '1', NULL, NULL),
(2009, 28, '025', 'Miguel Alemán', '1', NULL, NULL),
(2010, 28, '026', 'Miquihuana', '1', NULL, NULL),
(2011, 28, '027', 'Nuevo Laredo', '1', NULL, NULL),
(2012, 28, '028', 'Nuevo Morelos', '1', NULL, NULL),
(2013, 28, '029', 'Ocampo', '1', NULL, NULL),
(2014, 28, '030', 'Padilla', '1', NULL, NULL),
(2015, 28, '031', 'Palmillas', '1', NULL, NULL),
(2016, 28, '032', 'Reynosa', '1', NULL, NULL),
(2017, 28, '033', 'Río Bravo', '1', NULL, NULL),
(2018, 28, '034', 'San Carlos', '1', NULL, NULL),
(2019, 28, '035', 'San Fernando', '1', NULL, NULL),
(2020, 28, '036', 'San Nicolás', '1', NULL, NULL),
(2021, 28, '037', 'Soto la Marina', '1', NULL, NULL),
(2022, 28, '038', 'Tampico', '1', NULL, NULL),
(2023, 28, '039', 'Tula', '1', NULL, NULL),
(2024, 28, '040', 'Valle Hermoso', '1', NULL, NULL),
(2025, 28, '041', 'Victoria', '1', NULL, NULL),
(2026, 28, '042', 'Villagrán', '1', NULL, NULL),
(2027, 28, '043', 'Xicoténcatl', '1', NULL, NULL),
(2028, 29, '001', 'Amaxac de Guerrero', '1', NULL, NULL),
(2029, 29, '002', 'Apetatitlán de Antonio Carvajal', '1', NULL, NULL),
(2030, 29, '003', 'Atlangatepec', '1', NULL, NULL),
(2031, 29, '004', 'Atltzayanca', '1', NULL, NULL),
(2032, 29, '005', 'Apizaco', '1', NULL, NULL),
(2033, 29, '006', 'Calpulalpan', '1', NULL, NULL),
(2034, 29, '007', 'El Carmen Tequexquitla', '1', NULL, NULL),
(2035, 29, '008', 'Cuapiaxtla', '1', NULL, NULL),
(2036, 29, '009', 'Cuaxomulco', '1', NULL, NULL),
(2037, 29, '010', 'Chiautempan', '1', NULL, NULL),
(2038, 29, '011', 'Muñoz de Domingo Arenas', '1', NULL, NULL),
(2039, 29, '012', 'Españita', '1', NULL, NULL),
(2040, 29, '013', 'Huamantla', '1', NULL, NULL),
(2041, 29, '014', 'Hueyotlipan', '1', NULL, NULL),
(2042, 29, '015', 'Ixtacuixtla de Mariano Matamoros', '1', NULL, NULL),
(2043, 29, '016', 'Ixtenco', '1', NULL, NULL),
(2044, 29, '017', 'Mazatecochco de José María Morelos', '1', NULL, NULL),
(2045, 29, '018', 'Contla de Juan Cuamatzi', '1', NULL, NULL),
(2046, 29, '019', 'Tepetitla de Lardizábal', '1', NULL, NULL),
(2047, 29, '020', 'Sanctórum de Lázaro Cárdenas', '1', NULL, NULL),
(2048, 29, '021', 'Nanacamilpa de Mariano Arista', '1', NULL, NULL),
(2049, 29, '022', 'Acuamanala de Miguel Hidalgo', '1', NULL, NULL),
(2050, 29, '023', 'Natívitas', '1', NULL, NULL),
(2051, 29, '024', 'Panotla', '1', NULL, NULL),
(2052, 29, '025', 'San Pablo del Monte', '1', NULL, NULL),
(2053, 29, '026', 'Santa Cruz Tlaxcala', '1', NULL, NULL),
(2054, 29, '027', 'Tenancingo', '1', NULL, NULL),
(2055, 29, '028', 'Teolocholco', '1', NULL, NULL),
(2056, 29, '029', 'Tepeyanco', '1', NULL, NULL),
(2057, 29, '030', 'Terrenate', '1', NULL, NULL),
(2058, 29, '031', 'Tetla de la Solidaridad', '1', NULL, NULL),
(2059, 29, '032', 'Tetlatlahuca', '1', NULL, NULL),
(2060, 29, '033', 'Tlaxcala', '1', NULL, NULL),
(2061, 29, '034', 'Tlaxco', '1', NULL, NULL),
(2062, 29, '035', 'Tocatlán', '1', NULL, NULL),
(2063, 29, '036', 'Totolac', '1', NULL, NULL),
(2064, 29, '037', 'Ziltlaltépec de Trinidad Sánchez Santos', '1', NULL, NULL),
(2065, 29, '038', 'Tzompantepec', '1', NULL, NULL),
(2066, 29, '039', 'Xaloztoc', '1', NULL, NULL),
(2067, 29, '040', 'Xaltocan', '1', NULL, NULL),
(2068, 29, '041', 'Papalotla de Xicohténcatl', '1', NULL, NULL),
(2069, 29, '042', 'Xicohtzinco', '1', NULL, NULL),
(2070, 29, '043', 'Yauhquemehcan', '1', NULL, NULL),
(2071, 29, '044', 'Zacatelco', '1', NULL, NULL),
(2072, 29, '045', 'Benito Juárez', '1', NULL, NULL),
(2073, 29, '046', 'Emiliano Zapata', '1', NULL, NULL),
(2074, 29, '047', 'Lázaro Cárdenas', '1', NULL, NULL),
(2075, 29, '048', 'La Magdalena Tlaltelulco', '1', NULL, NULL),
(2076, 29, '049', 'San Damián Texóloc', '1', NULL, NULL),
(2077, 29, '050', 'San Francisco Tetlanohcan', '1', NULL, NULL),
(2078, 29, '051', 'San Jerónimo Zacualpan', '1', NULL, NULL),
(2079, 29, '052', 'San José Teacalco', '1', NULL, NULL),
(2080, 29, '053', 'San Juan Huactzinco', '1', NULL, NULL),
(2081, 29, '054', 'San Lorenzo Axocomanitla', '1', NULL, NULL),
(2082, 29, '055', 'San Lucas Tecopilco', '1', NULL, NULL),
(2083, 29, '056', 'Santa Ana Nopalucan', '1', NULL, NULL),
(2084, 29, '057', 'Santa Apolonia Teacalco', '1', NULL, NULL),
(2085, 29, '058', 'Santa Catarina Ayometla', '1', NULL, NULL),
(2086, 29, '059', 'Santa Cruz Quilehtla', '1', NULL, NULL),
(2087, 29, '060', 'Santa Isabel Xiloxoxtla', '1', NULL, NULL),
(2088, 30, '001', 'Acajete', '1', NULL, NULL),
(2089, 30, '002', 'Acatlán', '1', NULL, NULL),
(2090, 30, '003', 'Acayucan', '1', NULL, NULL),
(2091, 30, '004', 'Actopan', '1', NULL, NULL),
(2092, 30, '005', 'Acula', '1', NULL, NULL),
(2093, 30, '006', 'Acultzingo', '1', NULL, NULL),
(2094, 30, '007', 'Camarón de Tejeda', '1', NULL, NULL),
(2095, 30, '008', 'Alpatláhuac', '1', NULL, NULL),
(2096, 30, '009', 'Alto Lucero de Gutiérrez Barrios', '1', NULL, NULL),
(2097, 30, '010', 'Altotonga', '1', NULL, NULL),
(2098, 30, '011', 'Alvarado', '1', NULL, NULL),
(2099, 30, '012', 'Amatitlán', '1', NULL, NULL),
(2100, 30, '013', 'Naranjos Amatlán', '1', NULL, NULL),
(2101, 30, '014', 'Amatlán de los Reyes', '1', NULL, NULL),
(2102, 30, '015', 'Angel R. Cabada', '1', NULL, NULL),
(2103, 30, '016', 'La Antigua', '1', NULL, NULL),
(2104, 30, '017', 'Apazapan', '1', NULL, NULL),
(2105, 30, '018', 'Aquila', '1', NULL, NULL),
(2106, 30, '019', 'Astacinga', '1', NULL, NULL),
(2107, 30, '020', 'Atlahuilco', '1', NULL, NULL),
(2108, 30, '021', 'Atoyac', '1', NULL, NULL),
(2109, 30, '022', 'Atzacan', '1', NULL, NULL),
(2110, 30, '023', 'Atzalan', '1', NULL, NULL),
(2111, 30, '024', 'Tlaltetela', '1', NULL, NULL),
(2112, 30, '025', 'Ayahualulco', '1', NULL, NULL),
(2113, 30, '026', 'Banderilla', '1', NULL, NULL),
(2114, 30, '027', 'Benito Juárez', '1', NULL, NULL),
(2115, 30, '028', 'Boca del Río', '1', NULL, NULL),
(2116, 30, '029', 'Calcahualco', '1', NULL, NULL),
(2117, 30, '030', 'Camerino Z. Mendoza', '1', NULL, NULL),
(2118, 30, '031', 'Carrillo Puerto', '1', NULL, NULL),
(2119, 30, '032', 'Catemaco', '1', NULL, NULL),
(2120, 30, '033', 'Cazones de Herrera', '1', NULL, NULL),
(2121, 30, '034', 'Cerro Azul', '1', NULL, NULL),
(2122, 30, '035', 'Citlaltépetl', '1', NULL, NULL),
(2123, 30, '036', 'Coacoatzintla', '1', NULL, NULL),
(2124, 30, '037', 'Coahuitlán', '1', NULL, NULL),
(2125, 30, '038', 'Coatepec', '1', NULL, NULL),
(2126, 30, '039', 'Coatzacoalcos', '1', NULL, NULL),
(2127, 30, '040', 'Coatzintla', '1', NULL, NULL),
(2128, 30, '041', 'Coetzala', '1', NULL, NULL),
(2129, 30, '042', 'Colipa', '1', NULL, NULL),
(2130, 30, '043', 'Comapa', '1', NULL, NULL),
(2131, 30, '044', 'Córdoba', '1', NULL, NULL),
(2132, 30, '045', 'Cosamaloapan de Carpio', '1', NULL, NULL),
(2133, 30, '046', 'Cosautlán de Carvajal', '1', NULL, NULL),
(2134, 30, '047', 'Coscomatepec', '1', NULL, NULL),
(2135, 30, '048', 'Cosoleacaque', '1', NULL, NULL),
(2136, 30, '049', 'Cotaxtla', '1', NULL, NULL),
(2137, 30, '050', 'Coxquihui', '1', NULL, NULL),
(2138, 30, '051', 'Coyutla', '1', NULL, NULL),
(2139, 30, '052', 'Cuichapa', '1', NULL, NULL),
(2140, 30, '053', 'Cuitláhuac', '1', NULL, NULL),
(2141, 30, '054', 'Chacaltianguis', '1', NULL, NULL),
(2142, 30, '055', 'Chalma', '1', NULL, NULL),
(2143, 30, '056', 'Chiconamel', '1', NULL, NULL),
(2144, 30, '057', 'Chiconquiaco', '1', NULL, NULL),
(2145, 30, '058', 'Chicontepec', '1', NULL, NULL),
(2146, 30, '059', 'Chinameca', '1', NULL, NULL),
(2147, 30, '060', 'Chinampa de Gorostiza', '1', NULL, NULL),
(2148, 30, '061', 'Las Choapas', '1', NULL, NULL),
(2149, 30, '062', 'Chocamán', '1', NULL, NULL),
(2150, 30, '063', 'Chontla', '1', NULL, NULL),
(2151, 30, '064', 'Chumatlán', '1', NULL, NULL),
(2152, 30, '065', 'Emiliano Zapata', '1', NULL, NULL),
(2153, 30, '066', 'Espinal', '1', NULL, NULL),
(2154, 30, '067', 'Filomeno Mata', '1', NULL, NULL),
(2155, 30, '068', 'Fortín', '1', NULL, NULL),
(2156, 30, '069', 'Gutiérrez Zamora', '1', NULL, NULL),
(2157, 30, '070', 'Hidalgotitlán', '1', NULL, NULL),
(2158, 30, '071', 'Huatusco', '1', NULL, NULL),
(2159, 30, '072', 'Huayacocotla', '1', NULL, NULL),
(2160, 30, '073', 'Hueyapan de Ocampo', '1', NULL, NULL),
(2161, 30, '074', 'Huiloapan de Cuauhtémoc', '1', NULL, NULL),
(2162, 30, '075', 'Ignacio de la Llave', '1', NULL, NULL),
(2163, 30, '076', 'Ilamatlán', '1', NULL, NULL),
(2164, 30, '077', 'Isla', '1', NULL, NULL),
(2165, 30, '078', 'Ixcatepec', '1', NULL, NULL),
(2166, 30, '079', 'Ixhuacán de los Reyes', '1', NULL, NULL),
(2167, 30, '080', 'Ixhuatlán del Café', '1', NULL, NULL),
(2168, 30, '081', 'Ixhuatlancillo', '1', NULL, NULL),
(2169, 30, '082', 'Ixhuatlán del Sureste', '1', NULL, NULL),
(2170, 30, '083', 'Ixhuatlán de Madero', '1', NULL, NULL),
(2171, 30, '084', 'Ixmatlahuacan', '1', NULL, NULL),
(2172, 30, '085', 'Ixtaczoquitlán', '1', NULL, NULL),
(2173, 30, '086', 'Jalacingo', '1', NULL, NULL),
(2174, 30, '087', 'Xalapa', '1', NULL, NULL),
(2175, 30, '088', 'Jalcomulco', '1', NULL, NULL),
(2176, 30, '089', 'Jáltipan', '1', NULL, NULL),
(2177, 30, '090', 'Jamapa', '1', NULL, NULL),
(2178, 30, '091', 'Jesús Carranza', '1', NULL, NULL),
(2179, 30, '092', 'Xico', '1', NULL, NULL),
(2180, 30, '093', 'Jilotepec', '1', NULL, NULL),
(2181, 30, '094', 'Juan Rodríguez Clara', '1', NULL, NULL),
(2182, 30, '095', 'Juchique de Ferrer', '1', NULL, NULL),
(2183, 30, '096', 'Landero y Coss', '1', NULL, NULL),
(2184, 30, '097', 'Lerdo de Tejada', '1', NULL, NULL),
(2185, 30, '098', 'Magdalena', '1', NULL, NULL),
(2186, 30, '099', 'Maltrata', '1', NULL, NULL),
(2187, 30, '100', 'Manlio Fabio Altamirano', '1', NULL, NULL),
(2188, 30, '101', 'Mariano Escobedo', '1', NULL, NULL),
(2189, 30, '102', 'Martínez de la Torre', '1', NULL, NULL),
(2190, 30, '103', 'Mecatlán', '1', NULL, NULL),
(2191, 30, '104', 'Mecayapan', '1', NULL, NULL),
(2192, 30, '105', 'Medellín de Bravo', '1', NULL, NULL),
(2193, 30, '106', 'Miahuatlán', '1', NULL, NULL),
(2194, 30, '107', 'Las Minas', '1', NULL, NULL),
(2195, 30, '108', 'Minatitlán', '1', NULL, NULL),
(2196, 30, '109', 'Misantla', '1', NULL, NULL),
(2197, 30, '110', 'Mixtla de Altamirano', '1', NULL, NULL),
(2198, 30, '111', 'Moloacán', '1', NULL, NULL),
(2199, 30, '112', 'Naolinco', '1', NULL, NULL),
(2200, 30, '113', 'Naranjal', '1', NULL, NULL),
(2201, 30, '114', 'Nautla', '1', NULL, NULL),
(2202, 30, '115', 'Nogales', '1', NULL, NULL),
(2203, 30, '116', 'Oluta', '1', NULL, NULL),
(2204, 30, '117', 'Omealca', '1', NULL, NULL),
(2205, 30, '118', 'Orizaba', '1', NULL, NULL),
(2206, 30, '119', 'Otatitlán', '1', NULL, NULL),
(2207, 30, '120', 'Oteapan', '1', NULL, NULL),
(2208, 30, '121', 'Ozuluama de Mascareñas', '1', NULL, NULL),
(2209, 30, '122', 'Pajapan', '1', NULL, NULL),
(2210, 30, '123', 'Pánuco', '1', NULL, NULL),
(2211, 30, '124', 'Papantla', '1', NULL, NULL),
(2212, 30, '125', 'Paso del Macho', '1', NULL, NULL),
(2213, 30, '126', 'Paso de Ovejas', '1', NULL, NULL),
(2214, 30, '127', 'La Perla', '1', NULL, NULL),
(2215, 30, '128', 'Perote', '1', NULL, NULL),
(2216, 30, '129', 'Platón Sánchez', '1', NULL, NULL),
(2217, 30, '130', 'Playa Vicente', '1', NULL, NULL),
(2218, 30, '131', 'Poza Rica de Hidalgo', '1', NULL, NULL),
(2219, 30, '132', 'Las Vigas de Ramírez', '1', NULL, NULL),
(2220, 30, '133', 'Pueblo Viejo', '1', NULL, NULL),
(2221, 30, '134', 'Puente Nacional', '1', NULL, NULL),
(2222, 30, '135', 'Rafael Delgado', '1', NULL, NULL),
(2223, 30, '136', 'Rafael Lucio', '1', NULL, NULL),
(2224, 30, '137', 'Los Reyes', '1', NULL, NULL),
(2225, 30, '138', 'Río Blanco', '1', NULL, NULL),
(2226, 30, '139', 'Saltabarranca', '1', NULL, NULL),
(2227, 30, '140', 'San Andrés Tenejapan', '1', NULL, NULL),
(2228, 30, '141', 'San Andrés Tuxtla', '1', NULL, NULL),
(2229, 30, '142', 'San Juan Evangelista', '1', NULL, NULL),
(2230, 30, '143', 'Santiago Tuxtla', '1', NULL, NULL),
(2231, 30, '144', 'Sayula de Alemán', '1', NULL, NULL),
(2232, 30, '145', 'Soconusco', '1', NULL, NULL),
(2233, 30, '146', 'Sochiapa', '1', NULL, NULL),
(2234, 30, '147', 'Soledad Atzompa', '1', NULL, NULL),
(2235, 30, '148', 'Soledad de Doblado', '1', NULL, NULL),
(2236, 30, '149', 'Soteapan', '1', NULL, NULL),
(2237, 30, '150', 'Tamalín', '1', NULL, NULL),
(2238, 30, '151', 'Tamiahua', '1', NULL, NULL),
(2239, 30, '152', 'Tampico Alto', '1', NULL, NULL),
(2240, 30, '153', 'Tancoco', '1', NULL, NULL),
(2241, 30, '154', 'Tantima', '1', NULL, NULL),
(2242, 30, '155', 'Tantoyuca', '1', NULL, NULL),
(2243, 30, '156', 'Tatatila', '1', NULL, NULL),
(2244, 30, '157', 'Castillo de Teayo', '1', NULL, NULL),
(2245, 30, '158', 'Tecolutla', '1', NULL, NULL),
(2246, 30, '159', 'Tehuipango', '1', NULL, NULL),
(2247, 30, '160', 'Álamo Temapache', '1', NULL, NULL),
(2248, 30, '161', 'Tempoal', '1', NULL, NULL),
(2249, 30, '162', 'Tenampa', '1', NULL, NULL),
(2250, 30, '163', 'Tenochtitlán', '1', NULL, NULL),
(2251, 30, '164', 'Teocelo', '1', NULL, NULL),
(2252, 30, '165', 'Tepatlaxco', '1', NULL, NULL),
(2253, 30, '166', 'Tepetlán', '1', NULL, NULL),
(2254, 30, '167', 'Tepetzintla', '1', NULL, NULL),
(2255, 30, '168', 'Tequila', '1', NULL, NULL),
(2256, 30, '169', 'José Azueta', '1', NULL, NULL),
(2257, 30, '170', 'Texcatepec', '1', NULL, NULL),
(2258, 30, '171', 'Texhuacán', '1', NULL, NULL),
(2259, 30, '172', 'Texistepec', '1', NULL, NULL),
(2260, 30, '173', 'Tezonapa', '1', NULL, NULL),
(2261, 30, '174', 'Tierra Blanca', '1', NULL, NULL),
(2262, 30, '175', 'Tihuatlán', '1', NULL, NULL),
(2263, 30, '176', 'Tlacojalpan', '1', NULL, NULL),
(2264, 30, '177', 'Tlacolulan', '1', NULL, NULL),
(2265, 30, '178', 'Tlacotalpan', '1', NULL, NULL),
(2266, 30, '179', 'Tlacotepec de Mejía', '1', NULL, NULL),
(2267, 30, '180', 'Tlachichilco', '1', NULL, NULL),
(2268, 30, '181', 'Tlalixcoyan', '1', NULL, NULL),
(2269, 30, '182', 'Tlalnelhuayocan', '1', NULL, NULL),
(2270, 30, '183', 'Tlapacoyan', '1', NULL, NULL),
(2271, 30, '184', 'Tlaquilpa', '1', NULL, NULL),
(2272, 30, '185', 'Tlilapan', '1', NULL, NULL),
(2273, 30, '186', 'Tomatlán', '1', NULL, NULL),
(2274, 30, '187', 'Tonayán', '1', NULL, NULL),
(2275, 30, '188', 'Totutla', '1', NULL, NULL),
(2276, 30, '189', 'Tuxpan', '1', NULL, NULL),
(2277, 30, '190', 'Tuxtilla', '1', NULL, NULL),
(2278, 30, '191', 'Ursulo Galván', '1', NULL, NULL),
(2279, 30, '192', 'Vega de Alatorre', '1', NULL, NULL),
(2280, 30, '193', 'Veracruz', '1', NULL, NULL),
(2281, 30, '194', 'Villa Aldama', '1', NULL, NULL),
(2282, 30, '195', 'Xoxocotla', '1', NULL, NULL),
(2283, 30, '196', 'Yanga', '1', NULL, NULL),
(2284, 30, '197', 'Yecuatla', '1', NULL, NULL),
(2285, 30, '198', 'Zacualpan', '1', NULL, NULL),
(2286, 30, '199', 'Zaragoza', '1', NULL, NULL),
(2287, 30, '200', 'Zentla', '1', NULL, NULL),
(2288, 30, '201', 'Zongolica', '1', NULL, NULL),
(2289, 30, '202', 'Zontecomatlán de López y Fuentes', '1', NULL, NULL),
(2290, 30, '203', 'Zozocolco de Hidalgo', '1', NULL, NULL),
(2291, 30, '204', 'Agua Dulce', '1', NULL, NULL),
(2292, 30, '205', 'El Higo', '1', NULL, NULL),
(2293, 30, '206', 'Nanchital de Lázaro Cárdenas del Río', '1', NULL, NULL),
(2294, 30, '207', 'Tres Valles', '1', NULL, NULL),
(2295, 30, '208', 'Carlos A. Carrillo', '1', NULL, NULL),
(2296, 30, '209', 'Tatahuicapan de Juárez', '1', NULL, NULL),
(2297, 30, '210', 'Uxpanapa', '1', NULL, NULL),
(2298, 30, '211', 'San Rafael', '1', NULL, NULL),
(2299, 30, '212', 'Santiago Sochiapan', '1', NULL, NULL),
(2300, 31, '001', 'Abalá', '1', NULL, NULL),
(2301, 31, '002', 'Acanceh', '1', NULL, NULL),
(2302, 31, '003', 'Akil', '1', NULL, NULL),
(2303, 31, '004', 'Baca', '1', NULL, NULL),
(2304, 31, '005', 'Bokobá', '1', NULL, NULL),
(2305, 31, '006', 'Buctzotz', '1', NULL, NULL),
(2306, 31, '007', 'Cacalchén', '1', NULL, NULL),
(2307, 31, '008', 'Calotmul', '1', NULL, NULL),
(2308, 31, '009', 'Cansahcab', '1', NULL, NULL),
(2309, 31, '010', 'Cantamayec', '1', NULL, NULL),
(2310, 31, '011', 'Celestún', '1', NULL, NULL),
(2311, 31, '012', 'Cenotillo', '1', NULL, NULL),
(2312, 31, '013', 'Conkal', '1', NULL, NULL),
(2313, 31, '014', 'Cuncunul', '1', NULL, NULL),
(2314, 31, '015', 'Cuzamá', '1', NULL, NULL),
(2315, 31, '016', 'Chacsinkín', '1', NULL, NULL),
(2316, 31, '017', 'Chankom', '1', NULL, NULL),
(2317, 31, '018', 'Chapab', '1', NULL, NULL),
(2318, 31, '019', 'Chemax', '1', NULL, NULL),
(2319, 31, '020', 'Chicxulub Pueblo', '1', NULL, NULL),
(2320, 31, '021', 'Chichimilá', '1', NULL, NULL),
(2321, 31, '022', 'Chikindzonot', '1', NULL, NULL),
(2322, 31, '023', 'Chocholá', '1', NULL, NULL),
(2323, 31, '024', 'Chumayel', '1', NULL, NULL),
(2324, 31, '025', 'Dzán', '1', NULL, NULL),
(2325, 31, '026', 'Dzemul', '1', NULL, NULL),
(2326, 31, '027', 'Dzidzantún', '1', NULL, NULL),
(2327, 31, '028', 'Dzilam de Bravo', '1', NULL, NULL),
(2328, 31, '029', 'Dzilam González', '1', NULL, NULL),
(2329, 31, '030', 'Dzitás', '1', NULL, NULL),
(2330, 31, '031', 'Dzoncauich', '1', NULL, NULL),
(2331, 31, '032', 'Espita', '1', NULL, NULL),
(2332, 31, '033', 'Halachó', '1', NULL, NULL),
(2333, 31, '034', 'Hocabá', '1', NULL, NULL),
(2334, 31, '035', 'Hoctún', '1', NULL, NULL),
(2335, 31, '036', 'Homún', '1', NULL, NULL),
(2336, 31, '037', 'Huhí', '1', NULL, NULL),
(2337, 31, '038', 'Hunucmá', '1', NULL, NULL),
(2338, 31, '039', 'Ixil', '1', NULL, NULL),
(2339, 31, '040', 'Izamal', '1', NULL, NULL),
(2340, 31, '041', 'Kanasín', '1', NULL, NULL),
(2341, 31, '042', 'Kantunil', '1', NULL, NULL),
(2342, 31, '043', 'Kaua', '1', NULL, NULL),
(2343, 31, '044', 'Kinchil', '1', NULL, NULL),
(2344, 31, '045', 'Kopomá', '1', NULL, NULL),
(2345, 31, '046', 'Mama', '1', NULL, NULL),
(2346, 31, '047', 'Maní', '1', NULL, NULL),
(2347, 31, '048', 'Maxcanú', '1', NULL, NULL),
(2348, 31, '049', 'Mayapán', '1', NULL, NULL),
(2349, 31, '050', 'Mérida', '1', NULL, NULL),
(2350, 31, '051', 'Mocochá', '1', NULL, NULL),
(2351, 31, '052', 'Motul', '1', NULL, NULL),
(2352, 31, '053', 'Muna', '1', NULL, NULL),
(2353, 31, '054', 'Muxupip', '1', NULL, NULL),
(2354, 31, '055', 'Opichén', '1', NULL, NULL),
(2355, 31, '056', 'Oxkutzcab', '1', NULL, NULL),
(2356, 31, '057', 'Panabá', '1', NULL, NULL),
(2357, 31, '058', 'Peto', '1', NULL, NULL),
(2358, 31, '059', 'Progreso', '1', NULL, NULL),
(2359, 31, '060', 'Quintana Roo', '1', NULL, NULL),
(2360, 31, '061', 'Río Lagartos', '1', NULL, NULL),
(2361, 31, '062', 'Sacalum', '1', NULL, NULL),
(2362, 31, '063', 'Samahil', '1', NULL, NULL),
(2363, 31, '064', 'Sanahcat', '1', NULL, NULL),
(2364, 31, '065', 'San Felipe', '1', NULL, NULL),
(2365, 31, '066', 'Santa Elena', '1', NULL, NULL),
(2366, 31, '067', 'Seyé', '1', NULL, NULL),
(2367, 31, '068', 'Sinanché', '1', NULL, NULL),
(2368, 31, '069', 'Sotuta', '1', NULL, NULL),
(2369, 31, '070', 'Sucilá', '1', NULL, NULL),
(2370, 31, '071', 'Sudzal', '1', NULL, NULL),
(2371, 31, '072', 'Suma', '1', NULL, NULL),
(2372, 31, '073', 'Tahdziú', '1', NULL, NULL),
(2373, 31, '074', 'Tahmek', '1', NULL, NULL),
(2374, 31, '075', 'Teabo', '1', NULL, NULL),
(2375, 31, '076', 'Tecoh', '1', NULL, NULL),
(2376, 31, '077', 'Tekal de Venegas', '1', NULL, NULL),
(2377, 31, '078', 'Tekantó', '1', NULL, NULL),
(2378, 31, '079', 'Tekax', '1', NULL, NULL),
(2379, 31, '080', 'Tekit', '1', NULL, NULL),
(2380, 31, '081', 'Tekom', '1', NULL, NULL),
(2381, 31, '082', 'Telchac Pueblo', '1', NULL, NULL),
(2382, 31, '083', 'Telchac Puerto', '1', NULL, NULL),
(2383, 31, '084', 'Temax', '1', NULL, NULL),
(2384, 31, '085', 'Temozón', '1', NULL, NULL),
(2385, 31, '086', 'Tepakán', '1', NULL, NULL),
(2386, 31, '087', 'Tetiz', '1', NULL, NULL),
(2387, 31, '088', 'Teya', '1', NULL, NULL),
(2388, 31, '089', 'Ticul', '1', NULL, NULL),
(2389, 31, '090', 'Timucuy', '1', NULL, NULL),
(2390, 31, '091', 'Tinum', '1', NULL, NULL),
(2391, 31, '092', 'Tixcacalcupul', '1', NULL, NULL),
(2392, 31, '093', 'Tixkokob', '1', NULL, NULL),
(2393, 31, '094', 'Tixmehuac', '1', NULL, NULL),
(2394, 31, '095', 'Tixpéhual', '1', NULL, NULL),
(2395, 31, '096', 'Tizimín', '1', NULL, NULL),
(2396, 31, '097', 'Tunkás', '1', NULL, NULL),
(2397, 31, '098', 'Tzucacab', '1', NULL, NULL),
(2398, 31, '099', 'Uayma', '1', NULL, NULL),
(2399, 31, '100', 'Ucú', '1', NULL, NULL),
(2400, 31, '101', 'Umán', '1', NULL, NULL),
(2401, 31, '102', 'Valladolid', '1', NULL, NULL),
(2402, 31, '103', 'Xocchel', '1', NULL, NULL),
(2403, 31, '104', 'Yaxcabá', '1', NULL, NULL),
(2404, 31, '105', 'Yaxkukul', '1', NULL, NULL),
(2405, 31, '106', 'Yobaín', '1', NULL, NULL),
(2406, 32, '001', 'Apozol', '1', NULL, NULL),
(2407, 32, '002', 'Apulco', '1', NULL, NULL),
(2408, 32, '003', 'Atolinga', '1', NULL, NULL),
(2409, 32, '004', 'Benito Juárez', '1', NULL, NULL),
(2410, 32, '005', 'Calera', '1', NULL, NULL),
(2411, 32, '006', 'Cañitas de Felipe Pescador', '1', NULL, NULL),
(2412, 32, '007', 'Concepción del Oro', '1', NULL, NULL),
(2413, 32, '008', 'Cuauhtémoc', '1', NULL, NULL),
(2414, 32, '009', 'Chalchihuites', '1', NULL, NULL),
(2415, 32, '010', 'Fresnillo', '1', NULL, NULL),
(2416, 32, '011', 'Trinidad García de la Cadena', '1', NULL, NULL),
(2417, 32, '012', 'Genaro Codina', '1', NULL, NULL),
(2418, 32, '013', 'General Enrique Estrada', '1', NULL, NULL),
(2419, 32, '014', 'General Francisco R. Murguía', '1', NULL, NULL),
(2420, 32, '015', 'El Plateado de Joaquín Amaro', '1', NULL, NULL),
(2421, 32, '016', 'General Pánfilo Natera', '1', NULL, NULL),
(2422, 32, '017', 'Guadalupe', '1', NULL, NULL),
(2423, 32, '018', 'Huanusco', '1', NULL, NULL),
(2424, 32, '019', 'Jalpa', '1', NULL, NULL),
(2425, 32, '020', 'Jerez', '1', NULL, NULL),
(2426, 32, '021', 'Jiménez del Teul', '1', NULL, NULL),
(2427, 32, '022', 'Juan Aldama', '1', NULL, NULL),
(2428, 32, '023', 'Juchipila', '1', NULL, NULL),
(2429, 32, '024', 'Loreto', '1', NULL, NULL),
(2430, 32, '025', 'Luis Moya', '1', NULL, NULL),
(2431, 32, '026', 'Mazapil', '1', NULL, NULL),
(2432, 32, '027', 'Melchor Ocampo', '1', NULL, NULL),
(2433, 32, '028', 'Mezquital del Oro', '1', NULL, NULL),
(2434, 32, '029', 'Miguel Auza', '1', NULL, NULL),
(2435, 32, '030', 'Momax', '1', NULL, NULL),
(2436, 32, '031', 'Monte Escobedo', '1', NULL, NULL),
(2437, 32, '032', 'Morelos', '1', NULL, NULL),
(2438, 32, '033', 'Moyahua de Estrada', '1', NULL, NULL),
(2439, 32, '034', 'Nochistlán de Mejía', '1', NULL, NULL),
(2440, 32, '035', 'Noria de Ángeles', '1', NULL, NULL),
(2441, 32, '036', 'Ojocaliente', '1', NULL, NULL),
(2442, 32, '037', 'Pánuco', '1', NULL, NULL),
(2443, 32, '038', 'Pinos', '1', NULL, NULL),
(2444, 32, '039', 'Río Grande', '1', NULL, NULL),
(2445, 32, '040', 'Sain Alto', '1', NULL, NULL),
(2446, 32, '041', 'El Salvador', '1', NULL, NULL),
(2447, 32, '042', 'Sombrerete', '1', NULL, NULL),
(2448, 32, '043', 'Susticacán', '1', NULL, NULL),
(2449, 32, '044', 'Tabasco', '1', NULL, NULL),
(2450, 32, '045', 'Tepechitlán', '1', NULL, NULL),
(2451, 32, '046', 'Tepetongo', '1', NULL, NULL),
(2452, 32, '047', 'Teúl de González Ortega', '1', NULL, NULL),
(2453, 32, '048', 'Tlaltenango de Sánchez Román', '1', NULL, NULL),
(2454, 32, '049', 'Valparaíso', '1', NULL, NULL),
(2455, 32, '050', 'Vetagrande', '1', NULL, NULL),
(2456, 32, '051', 'Villa de Cos', '1', NULL, NULL),
(2457, 32, '052', 'Villa García', '1', NULL, NULL),
(2458, 32, '053', 'Villa González Ortega', '1', NULL, NULL),
(2459, 32, '054', 'Villa Hidalgo', '1', NULL, NULL),
(2460, 32, '055', 'Villanueva', '1', NULL, NULL),
(2461, 32, '056', 'Zacatecas', '1', NULL, NULL),
(2462, 32, '057', 'Trancoso', '1', NULL, NULL),
(2463, 32, '058', 'Santa María de la Paz', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `progress`, `keywords`, `description`, `imagen`, `university_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(31, 'Proyecto Ejemplo', 'Desarrollo', 'Programación', 'proyecto ejemplo', 'img_proyecto/SCytNpOIwiNKL4GBhx8wKdiDb7gE2Sdq8uAp0hlH.png', 38, NULL, '2022-08-03 15:03:45', '2022-08-03 15:03:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_students`
--

CREATE TABLE `project_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL),
(2, 'Universidad', NULL, '2020-09-08 21:32:26', '2021-02-04 03:24:11'),
(3, 'Estudiante', NULL, '2020-09-15 15:51:08', '2020-09-15 15:51:08'),
(4, 'Empresa', NULL, '2020-10-14 04:49:25', '2021-02-04 03:23:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `sector` varchar(200) NOT NULL,
  `scian` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sectors`
--

INSERT INTO `sectors` (`id`, `sector`, `scian`, `created_at`, `updated_at`) VALUES
(1, 'Construcción', '23', '2022-08-04 16:36:32', '2022-08-04 16:36:32'),
(2, 'Generación, transmisión, distribución y comercialización de energía eléctrica, suministro de agua y de gas natural por ductos al consumidor final', '22', '2022-08-04 16:36:32', '2022-08-04 16:36:32'),
(3, 'Minería', '21', '2022-08-04 16:37:12', '2022-08-04 16:37:12'),
(4, 'Industrias manufactureras', '31-33', '2022-08-04 16:37:12', '2022-08-04 16:37:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_subsector`
--

CREATE TABLE `sector_subsector` (
  `id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `subsector_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sector_subsector`
--

INSERT INTO `sector_subsector` (`id`, `sector_id`, `subsector_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-08-04 17:55:42', '2022-08-04 17:55:42'),
(2, 1, 2, '2022-08-04 17:55:42', '2022-08-04 17:55:42'),
(3, 1, 3, '2022-08-04 17:55:59', '2022-08-04 17:55:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_enterprises`
--

CREATE TABLE `service_enterprises` (
  `id` int(11) NOT NULL,
  `type_training` varchar(100) DEFAULT NULL,
  `type_machinery` varchar(100) DEFAULT NULL,
  `type_certification` varchar(100) DEFAULT NULL,
  `type_laboratory` varchar(100) DEFAULT NULL,
  `type_other` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `duration_exam` varchar(200) DEFAULT NULL,
  `hour` varchar(300) DEFAULT NULL,
  `modality` varchar(300) DEFAULT NULL,
  `modality_maquinary` varchar(200) DEFAULT NULL,
  `managed` varchar(200) DEFAULT NULL,
  `price` varchar(300) DEFAULT NULL,
  `price_machinery` varchar(200) DEFAULT NULL,
  `price_certification` varchar(200) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `functionality` varchar(200) DEFAULT NULL,
  `technical_data` varchar(200) DEFAULT NULL,
  `dimensions` varchar(200) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `study_area` varchar(200) DEFAULT NULL,
  `analysis_type` varchar(300) DEFAULT NULL,
  `tests_performed` varchar(200) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `details_certification` varchar(100) DEFAULT NULL,
  `details_laboratory` varchar(500) DEFAULT NULL,
  `other` varchar(500) DEFAULT NULL,
  `enterprise_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abrev` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `clave`, `name`, `abrev`, `activo`, `created_at`, `updated_at`) VALUES
(1, '01', 'Aguascalientes', 'Ags.', '1', NULL, NULL),
(2, '02', 'Baja California', 'BC', '1', NULL, NULL),
(3, '03', 'Baja California Sur', 'BCS', '1', NULL, NULL),
(4, '04', 'Campeche', 'Camp.', '1', NULL, NULL),
(5, '05', 'Coahuila de Zaragoza', 'Coah.', '1', NULL, NULL),
(6, '06', 'Colima', 'Col.', '1', NULL, NULL),
(7, '07', 'Chiapas', 'Chis.', '1', NULL, NULL),
(8, '08', 'Chihuahua', 'Chih.', '1', NULL, NULL),
(9, '09', 'Ciudad de México', 'CDMX', '1', NULL, NULL),
(10, '10', 'Durango', 'Dgo.', '1', NULL, NULL),
(11, '11', 'Guanajuato', 'Gto.', '1', NULL, NULL),
(12, '12', 'Guerrero', 'Gro.', '1', NULL, NULL),
(13, '13', 'Hidalgo', 'Hgo.', '1', NULL, NULL),
(14, '14', 'Jalisco', 'Jal.', '1', NULL, NULL),
(15, '15', 'México', 'Mex.', '1', NULL, NULL),
(16, '16', 'Michoacán de Ocampo', 'Mich.', '1', NULL, NULL),
(17, '17', 'Morelos', 'Mor.', '1', NULL, NULL),
(18, '18', 'Nayarit', 'Nay.', '1', NULL, NULL),
(19, '19', 'Nuevo León', 'NL', '1', NULL, NULL),
(20, '20', 'Oaxaca', 'Oax.', '1', NULL, NULL),
(21, '21', 'Puebla', 'Pue.', '1', NULL, NULL),
(22, '22', 'Querétaro', 'Qro.', '1', NULL, NULL),
(23, '23', 'Quintana Roo', 'Q. Roo', '1', NULL, NULL),
(24, '24', 'San Luis Potosí', 'SLP', '1', NULL, NULL),
(25, '25', 'Sinaloa', 'Sin.', '1', NULL, NULL),
(26, '26', 'Sonora', 'Son.', '1', NULL, NULL),
(27, '27', 'Tabasco', 'Tab.', '1', NULL, NULL),
(28, '28', 'Tamaulipas', 'Tamps.', '1', NULL, NULL),
(29, '29', 'Tlaxcala', 'Tlax.', '1', NULL, NULL),
(30, '30', 'Veracruz de Ignacio de la Llave', 'Ver.', '1', NULL, NULL),
(31, '31', 'Yucatán', 'Yuc.', '1', NULL, NULL),
(32, '32', 'Zacatecas', 'Zac.', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrollment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_tel` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habilidades` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(11) NOT NULL,
  `user_id` bigint(11) UNSIGNED NOT NULL,
  `university_id` int(11) NOT NULL,
  `subsistema_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `enrollment`, `personal_email`, `personal_tel`, `habilidades`, `cv`, `status`, `program_id`, `user_id`, `university_id`, `subsistema_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(43, '1234567', '', '', NULL, '', 'Estudiante', 1712, 175, 2288, 53, NULL, '2022-03-18 18:37:24', '2022-03-18 18:37:24'),
(44, '12345678', '', '', NULL, '', 'Estudiante', 856, 181, 797, 38, NULL, '2022-08-03 15:21:15', '2022-08-03 15:21:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_vacancy`
--

CREATE TABLE `student_vacancy` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsectors`
--

CREATE TABLE `subsectors` (
  `id` int(11) NOT NULL,
  `subsector` varchar(200) NOT NULL,
  `scian` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subsectors`
--

INSERT INTO `subsectors` (`id`, `subsector`, `scian`, `created_at`, `updated_at`) VALUES
(1, 'Edificación', '236', '2022-08-04 16:38:58', '2022-08-04 16:38:58'),
(2, 'Construcción de obras de ingeniería civil', '237', '2022-08-04 16:38:58', '2022-08-04 16:38:58'),
(3, 'Trabajos especializados para la construcción', '238', '2022-08-04 16:39:14', '2022-08-04 16:39:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(60) NOT NULL,
  `persuasivo` tinyint(1) DEFAULT 0,
  `gentil` tinyint(1) DEFAULT 0,
  `humilde` tinyint(1) DEFAULT 0,
  `original` tinyint(1) DEFAULT 0,
  `decidido` tinyint(1) DEFAULT 0,
  `fiesta` tinyint(1) DEFAULT 0,
  `comodino` tinyint(1) DEFAULT 0,
  `temeroso` tinyint(1) DEFAULT 0,
  `agradable` tinyint(1) DEFAULT 0,
  `tdios` tinyint(1) DEFAULT 0,
  `tenaz` tinyint(1) DEFAULT 0,
  `atractivo` tinyint(1) DEFAULT 0,
  `cauteloso` tinyint(1) DEFAULT 0,
  `determinado` tinyint(1) DEFAULT 0,
  `convincente` tinyint(1) DEFAULT 0,
  `bonachon` tinyint(1) DEFAULT 0,
  `docil` tinyint(1) DEFAULT 0,
  `atrevido` tinyint(1) DEFAULT 0,
  `leal` tinyint(1) DEFAULT 0,
  `cautivador` tinyint(1) DEFAULT 0,
  `dispuesto` tinyint(1) DEFAULT 0,
  `deseoso` tinyint(1) DEFAULT 0,
  `condescendiente` tinyint(1) DEFAULT 0,
  `entusiasta` tinyint(1) DEFAULT 0,
  `voluntad` tinyint(1) DEFAULT 0,
  `mente` tinyint(1) DEFAULT 0,
  `complaciente` tinyint(1) DEFAULT 0,
  `animoso` tinyint(1) DEFAULT 0,
  `confiado` tinyint(1) DEFAULT 0,
  `simpatico` tinyint(1) DEFAULT 0,
  `tolerante` tinyint(1) DEFAULT 0,
  `afirmativo` tinyint(1) DEFAULT 0,
  `ecuanime` tinyint(1) DEFAULT 0,
  `preciso` tinyint(1) DEFAULT 0,
  `nervioso` tinyint(1) DEFAULT 0,
  `jovial` tinyint(1) DEFAULT 0,
  `diciplinado` tinyint(1) DEFAULT 0,
  `generoso` tinyint(1) DEFAULT 0,
  `animado` tinyint(1) DEFAULT 0,
  `persistente` tinyint(1) DEFAULT 0,
  `competitivo` tinyint(1) DEFAULT 0,
  `alegre` tinyint(1) DEFAULT 0,
  `considerado` tinyint(1) DEFAULT 0,
  `armonioso` tinyint(1) DEFAULT 0,
  `admirable` tinyint(1) DEFAULT 0,
  `bondadoso` tinyint(1) DEFAULT 0,
  `resignado` tinyint(1) DEFAULT 0,
  `firme` tinyint(1) DEFAULT 0,
  `obediente` tinyint(1) DEFAULT 0,
  `remilgoso` tinyint(1) DEFAULT 0,
  `inconquistable` tinyint(1) DEFAULT 0,
  `jugueton` tinyint(1) DEFAULT 0,
  `respetuoso` tinyint(1) DEFAULT 0,
  `emprendedor` tinyint(1) DEFAULT 0,
  `optimista` tinyint(1) DEFAULT 0,
  `servicial` tinyint(1) DEFAULT 0,
  `valiente` tinyint(1) DEFAULT 0,
  `inspirador` tinyint(1) DEFAULT 0,
  `sumiso` tinyint(1) DEFAULT 0,
  `timido` tinyint(1) DEFAULT 0,
  `adaptable` tinyint(1) DEFAULT 0,
  `disputador` tinyint(1) DEFAULT 0,
  `indiferente` tinyint(1) DEFAULT 0,
  `sangreliviana` tinyint(1) DEFAULT 0,
  `amiguero` tinyint(1) DEFAULT 0,
  `paciente` tinyint(1) DEFAULT 0,
  `segurodesi` tinyint(1) DEFAULT 0,
  `hablarsuave` tinyint(1) DEFAULT 0,
  `conforme` tinyint(1) DEFAULT 0,
  `confiable` tinyint(1) DEFAULT 0,
  `pacifico` tinyint(1) DEFAULT 0,
  `positivo` tinyint(1) DEFAULT 0,
  `aventurero` tinyint(1) DEFAULT 0,
  `receptivo` tinyint(1) DEFAULT 0,
  `cordial` tinyint(1) DEFAULT 0,
  `moderado` tinyint(1) DEFAULT 0,
  `indulgente` tinyint(1) DEFAULT 0,
  `estetico` tinyint(1) DEFAULT 0,
  `vigoroso` tinyint(1) DEFAULT 0,
  `sociable` tinyint(1) DEFAULT 0,
  `parlanchin` tinyint(1) DEFAULT 0,
  `controlado` tinyint(1) DEFAULT 0,
  `convencional` tinyint(1) DEFAULT 0,
  `terminante` tinyint(1) DEFAULT 0,
  `cohibido` bigint(20) DEFAULT 0,
  `exacto` bigint(20) DEFAULT 0,
  `franco` bigint(20) DEFAULT 0,
  `buencompañero` bigint(20) DEFAULT 0,
  `diplomatico` bigint(20) DEFAULT 0,
  `audaz` bigint(20) DEFAULT 0,
  `refinado` bigint(20) DEFAULT 0,
  `satisfecho` bigint(20) DEFAULT 0,
  `inquieto` bigint(20) DEFAULT 0,
  `popular` bigint(20) DEFAULT 0,
  `buenvecino` bigint(20) DEFAULT 0,
  `devoto` bigint(20) DEFAULT 0,
  `observation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tests`
--

INSERT INTO `tests` (`id`, `student_id`, `persuasivo`, `gentil`, `humilde`, `original`, `decidido`, `fiesta`, `comodino`, `temeroso`, `agradable`, `tdios`, `tenaz`, `atractivo`, `cauteloso`, `determinado`, `convincente`, `bonachon`, `docil`, `atrevido`, `leal`, `cautivador`, `dispuesto`, `deseoso`, `condescendiente`, `entusiasta`, `voluntad`, `mente`, `complaciente`, `animoso`, `confiado`, `simpatico`, `tolerante`, `afirmativo`, `ecuanime`, `preciso`, `nervioso`, `jovial`, `diciplinado`, `generoso`, `animado`, `persistente`, `competitivo`, `alegre`, `considerado`, `armonioso`, `admirable`, `bondadoso`, `resignado`, `firme`, `obediente`, `remilgoso`, `inconquistable`, `jugueton`, `respetuoso`, `emprendedor`, `optimista`, `servicial`, `valiente`, `inspirador`, `sumiso`, `timido`, `adaptable`, `disputador`, `indiferente`, `sangreliviana`, `amiguero`, `paciente`, `segurodesi`, `hablarsuave`, `conforme`, `confiable`, `pacifico`, `positivo`, `aventurero`, `receptivo`, `cordial`, `moderado`, `indulgente`, `estetico`, `vigoroso`, `sociable`, `parlanchin`, `controlado`, `convencional`, `terminante`, `cohibido`, `exacto`, `franco`, `buencompañero`, `diplomatico`, `audaz`, `refinado`, `satisfecho`, `inquieto`, `popular`, `buenvecino`, `devoto`, `observation`, `created_at`, `updated_at`) VALUES
(5, 5, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-10-20 21:58:31', '2020-10-20 21:58:31'),
(7, 6, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-10-20 22:16:46', '2020-10-20 22:16:46'),
(8, 9, 1, -1, NULL, NULL, 1, NULL, -1, NULL, NULL, NULL, 1, -1, 1, NULL, -1, NULL, NULL, 1, -1, NULL, NULL, -1, 1, NULL, NULL, NULL, 1, -1, NULL, NULL, 1, -1, NULL, -1, 1, NULL, -1, NULL, NULL, 1, 1, NULL, -1, NULL, NULL, NULL, 1, -1, NULL, -1, 1, NULL, NULL, -1, 1, NULL, -1, 1, NULL, NULL, 1, NULL, -1, NULL, NULL, -1, 1, NULL, 1, -1, NULL, NULL, 1, NULL, NULL, -1, NULL, -1, 1, NULL, NULL, NULL, -1, 1, 1, -1, NULL, NULL, 1, NULL, -1, NULL, 1, -1, NULL, NULL, NULL, '2020-10-23 18:17:06', '2020-10-23 18:17:06'),
(9, 11, 1, NULL, -1, NULL, 1, NULL, -1, NULL, -1, NULL, 1, NULL, NULL, 1, NULL, NULL, -1, NULL, 1, NULL, 1, NULL, NULL, -1, 1, NULL, NULL, -1, NULL, NULL, -1, 1, NULL, 1, -1, NULL, 1, NULL, NULL, -1, 1, NULL, -1, NULL, NULL, NULL, -1, 1, 1, -1, NULL, NULL, NULL, 1, -1, NULL, 1, NULL, -1, NULL, 1, NULL, -1, NULL, NULL, -1, 1, NULL, NULL, 1, NULL, -1, NULL, 1, NULL, -1, NULL, 1, NULL, -1, NULL, 1, NULL, -1, NULL, NULL, 1, -1, NULL, 1, -1, NULL, 1, -1, NULL, NULL, NULL, '2020-11-12 23:51:13', '2020-11-12 23:51:13'),
(10, 18, 1, NULL, -1, NULL, NULL, -1, 1, NULL, NULL, -1, 1, NULL, NULL, 1, -1, NULL, NULL, -1, 1, NULL, NULL, -1, 1, NULL, NULL, -1, 1, NULL, -1, NULL, 1, NULL, -1, NULL, 1, NULL, -1, NULL, 1, NULL, NULL, -1, 1, NULL, NULL, NULL, -1, NULL, NULL, 1, -1, NULL, NULL, -1, 1, NULL, NULL, 1, NULL, -1, NULL, 1, -1, NULL, -1, NULL, 1, NULL, NULL, -1, NULL, NULL, NULL, -1, 1, NULL, NULL, 1, NULL, -1, -1, NULL, 1, NULL, NULL, -1, 1, NULL, NULL, -1, NULL, 1, NULL, NULL, 1, NULL, NULL, '2021-02-24 23:32:00', '2021-02-24 23:32:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portada` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `universities`
--

INSERT INTO `universities` (`id`, `university_id`, `user_id`, `logo`, `banner`, `portada`, `created_at`, `updated_at`) VALUES
(60, 242, 145, NULL, NULL, NULL, '2022-03-15 16:39:57', '2022-03-15 16:39:57'),
(61, 38, 146, 'logos/64FgoPNSiHMAcG6msuCRClfzBKTwAfPYcgxhTIas.png', 'banners/1sz4dl4MhLzwb8AyGv99yw0wldgHhKlZKjf0ryJY.jpg', 'portadas/JH5UO9vK6pOeaDjQAU3zbblt49Z3fZ04FcQsWX86.png', '2022-03-15 16:42:12', '2022-07-26 00:30:04'),
(63, 17, 170, NULL, NULL, NULL, '2022-03-16 16:06:06', '2022-03-16 16:06:06'),
(64, 18, 150, 'logos/Lclf5IC6CRPU2HzTPzDy0hEnpSiqR7YMBA5J8tH2.jpg', NULL, NULL, '2022-03-16 16:06:47', '2022-03-23 18:08:03'),
(65, 19, 169, 'logos/5vMErZq6ADYW50L62QVOkcdi5fZLHJyfAh4N31DY.png', 'banners/q0qlYVa19dt16092lE8kMuF1zlAb9Wfo7KTlu6we.png', NULL, '2022-03-16 16:07:26', '2022-03-29 00:06:07'),
(66, 20, 149, NULL, NULL, NULL, '2022-03-16 16:07:42', '2022-03-16 16:07:42'),
(67, 21, 167, 'logos/xIeu4tWGPGitRF5Pg5ofLdy25xmaOUaBPmYomEuR.jpg', 'banners/T8FNX4g5RJDzKoSwzyNu1gDpzJmeeqvjXAMBmUeC.jpg', 'portadas/33KbYPbxBeixnluoNRlMjR8R4rtgx2aJ4pgVVMf4.jpg', '2022-03-16 16:08:03', '2022-03-24 19:08:27'),
(68, 24, 163, 'logos/AP1gWLcd5ZCqNMkRjMWYVNAEp7uTgRdSLzawEEe5.jpg', 'banners/kMO0kZgUch73ABYIB3v6p2DWhSbcMeji7RucIHaQ.jpg', 'portadas/4mMqSckpLN5LLaXm5MoOWhQJZBQJzEg6ZaRVHGdU.jpg', '2022-03-16 16:09:48', '2022-03-29 01:10:36'),
(69, 28, 165, 'logos/dsb19e5tPuzKdJ6oTSekL1iTbsJa3uGe94WqBEGo.jpg', 'banners/aWew9Ufdc1VxiVi3RMK9yawsqMjyq2pNpI1KTR82.jpg', NULL, '2022-03-16 16:10:06', '2022-03-30 16:53:36'),
(70, 33, 171, NULL, NULL, NULL, '2022-03-16 16:10:24', '2022-03-16 16:10:24'),
(71, 29, 168, 'logos/N8Z5YrdknReSEDHQctS5mwV0xbQCFrtxbd6z2OZB.jpg', 'banners/z5vCNkzTcgOVty6R5tRY3ND3fWvMHiQiOK0isJx7.jpg', NULL, '2022-03-16 16:10:52', '2022-03-23 16:53:17'),
(72, 36, 172, 'logos/VNmwYOwouxvi5AGfk5flB4r1PI1oGgLK6lvkTjpX.jpg', NULL, NULL, '2022-03-16 16:16:42', '2022-03-25 05:08:38'),
(73, 30, 166, 'logos/l6mFQRFWeProUWHqfRt6GVTdKv6Sc9QnUQyA9LJy.png', 'banners/UcXYr5fXsJPNfSIeSjtiFgth6ySoQXxaR4N4TYNC.jpg', 'portadas/TM4QmMBl2yomkgji4UM9hDmRcBwphiKykrnBKYli.jpg', '2022-03-16 16:17:21', '2022-03-22 20:04:38'),
(74, 34, 164, NULL, NULL, NULL, '2022-03-16 16:17:43', '2022-03-16 16:17:43'),
(75, 40, 161, 'logos/SVXycI4SVUrfix7HtCYZD6DlAtRVtBy6jhqeIeht.jpg', NULL, NULL, '2022-03-16 16:21:07', '2022-03-23 18:05:05'),
(76, 35, 153, 'logos/YWQbfeMmzYEBrYEvRrRIPdnkzlb1r8D9P58B052C.jpg', 'banners/yZdynr6YUFAPjc92Ccy7S5QNXCDOVOJl10aNQoB3.jpg', 'portadas/lr4dUnAkLNwmrYPYf0Xuqzw0PMbY3ykITdguLE9k.jpg', '2022-03-16 16:21:38', '2022-03-23 22:13:27'),
(77, 26, 151, NULL, NULL, NULL, '2022-03-16 16:22:04', '2022-03-16 16:22:04'),
(78, 32, 160, 'logos/DRMillUWni3geixTVycQiwVYDqgGrqvw10dLPQvr.jpg', 'banners/vafBTpf4Qhbp9RsKb8u7ON69kYLIuW1RM5RgIe8g.jpg', 'portadas/6c6WSSvnLK9D1Zbm3JS2D6QmfpJ8uR5nEUW0Nl1r.jpg', '2022-03-16 16:31:54', '2022-03-23 19:23:25'),
(79, 27, 159, 'logos/r4vdwrQezMM0ZcoxlJaj0N87PLXfhpnSFXfcCGMx.png', 'banners/kqF7hSre5ze3mj8G0goc2ZeyB0GEcAM2tAz4D5KD.jpg', 'portadas/RfwEqCOhG6hj9cSgf2Qq8YDJ5N3QsOWTMZGOmJAm.jpg', '2022-03-16 16:32:11', '2022-03-23 17:24:06'),
(80, 37, 158, NULL, NULL, NULL, '2022-03-16 16:32:32', '2022-03-16 16:32:32'),
(81, 31, 162, 'logos/H5dFqhNXpajCWHn65RiFvFzRTptXTvwCGfDFUq5M.jpg', 'banners/lQPLozYyNqk68PTIkYudVqeyb82Tz1umV6JfZhCC.jpg', 'portadas/3s4yhZytO3vzNCYIXCYPxMLfcJA9JvDXdXo3iIok.jpg', '2022-03-16 16:33:21', '2022-03-22 20:36:30'),
(82, 39, 173, NULL, NULL, NULL, '2022-03-16 16:55:10', '2022-03-16 16:55:10'),
(83, 53, 174, NULL, NULL, NULL, '2022-03-18 18:33:19', '2022-03-18 18:33:19'),
(84, 25, 176, 'logos/xcqNOC3B7F9gBlcmBk2RyTWiwMAMsINIEj01heEx.jpg', 'banners/F8Hxf33Cvgz51QSjcidxd0FqzUrBk9X2lI4x1krd.jpg', 'portadas/ATDaGRb0wING3dgSUGm8GsyrhSYalLOseMm63i3G.jpg', '2022-03-22 19:35:46', '2022-03-23 22:38:54'),
(85, 23, 177, NULL, NULL, 'portadas/WkkmEigHmJwFl9ql4rwWXYBgEGy4RIIwoKvI8aFZ.jpg', '2022-03-23 20:23:20', '2022-03-29 21:16:13'),
(86, 16, 180, NULL, NULL, NULL, '2022-05-31 19:14:21', '2022-05-31 19:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `university_services`
--

CREATE TABLE `university_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `oferta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_exam` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modality` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modality_maquinary` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `managed` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_machinery` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_certification` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `functionality` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_data` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensions` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analysis_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tests_performed` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_certification` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_laboratory` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `university_services`
--

INSERT INTO `university_services` (`id`, `oferta`, `type`, `name`, `duration`, `duration_exam`, `hour`, `modality`, `modality_maquinary`, `managed`, `price`, `price_machinery`, `price_certification`, `brand`, `model`, `functionality`, `technical_data`, `dimensions`, `exam`, `place`, `study_area`, `analysis_type`, `tests_performed`, `details`, `details_certification`, `details_laboratory`, `other`, `university_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(71, 'Laboratorio', 'Química Y Física', 'QUIMICA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'ESPECIALIDAD EN ANÁLISIS CLÍNICOS', NULL, 242, NULL, '2022-03-15 17:54:47', '2022-03-15 17:54:47'),
(72, 'Laboratorio', 'Desarrollo De Software', 'SOFTWARE', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'DESARROLLO DE SOFTWARE', NULL, 242, NULL, '2022-03-15 18:30:06', '2022-03-15 18:30:06'),
(73, 'Laboratorio', 'Maquinaria Industrial', 'Máquinas eléctricas y manufactura', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Máquinas eléctricas y manufactura', NULL, 38, NULL, '2022-03-17 17:44:35', '2022-03-17 17:44:35'),
(75, 'Laboratorio', 'Química Y Física', 'L. de química', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Las principales pruebas que se pueden realizar en este laboratorio', NULL, 53, NULL, '2022-03-18 19:15:53', '2022-03-18 19:15:53'),
(76, 'Laboratorio', 'Laboratorio De Fabricación 3D/Realidad Virtual', 'Taller de Electromecánica', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Espacio destinado para las actividades relacionadas metal-mecánicas y electricidad.', NULL, 31, NULL, '2022-03-22 19:33:23', '2022-03-22 19:33:23'),
(77, 'Laboratorio', 'Laboratorio De Maquinado (Piezas Metálicas)', 'Taller de Electromecánica', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Servicios de diseño y fabricación de piezas especiales.', NULL, 31, NULL, '2022-03-22 19:37:41', '2022-03-22 19:37:41'),
(78, 'Laboratorio', 'Desarrollo De Software', 'Laboratorio de Cómputo y Sistemas', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Laboratorio de prácticas de programación, ingeniería de software, desarrollo de software, instalación, configuración y administración de redes de computadoras y servidores.', NULL, 16, '2022-03-24 21:58:05', '2022-03-22 22:05:48', '2022-03-24 21:58:05'),
(79, 'Laboratorio', 'Ingeniería Forestal/Invernaderos', 'Forestal', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'xxxx', NULL, 53, NULL, '2022-03-23 18:34:28', '2022-03-23 18:34:28'),
(80, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Fisicoquímicos en agua:\r\n-pH\r\n-Cloruros\r\n-Alcalinidad\r\n-Sólidos totales\r\n-Conductividad', NULL, 39, '2022-03-24 21:26:42', '2022-03-23 20:33:37', '2022-03-24 21:26:42'),
(81, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Microbiológicos:\r\n-Coliformes totales\r\n-Coliformes fecales\r\n-Escherichia coli\r\n-Salmonella\r\n-Coliformes totales (UFC/g o ml)', NULL, 39, '2022-03-23 20:38:49', '2022-03-23 20:35:56', '2022-03-23 20:38:49'),
(82, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Microbiológicos:\r\n-Coliformes totales\r\n-Coliformes fecales\r\n-Escherichia coli\r\n-Salmonella\r\n-Coliformes totales (UFC/g o ml)\r\n-Mesófilos aerobios\r\n-Coliformes (NMP/g o ml)\r\n-Mohos y levanduras', NULL, 39, '2022-03-24 21:27:49', '2022-03-23 20:43:10', '2022-03-24 21:27:49'),
(83, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Bromatológicos en alimentos:\r\n-Humedad\r\n-Cenizas\r\n-Proteínas\r\n-Grasas\r\n-Fibra\r\n-Carbohidratos\r\n-Sodio\r\n-Contenido energético\r\n-Azúcares reductores', NULL, 39, '2022-03-24 21:30:20', '2022-03-23 20:46:55', '2022-03-24 21:30:20'),
(84, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Fisicoquímicos en café:\r\n-Humedad\r\n-Cenizas\r\n-Grasas\r\n-Sodio\r\n-Azúcares reductores', NULL, 39, '2022-03-24 21:31:24', '2022-03-23 20:48:07', '2022-03-24 21:31:24'),
(85, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Bebidas alcohólicas:\r\n-Alcohol\r\nDeterminación del contenido alcohólico (porcentaje del alcohol en volumen a 20°C % Alc. Vol.)', NULL, 39, '2022-03-24 21:33:13', '2022-03-23 20:50:36', '2022-03-24 21:33:13'),
(86, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Vida útil:\r\nDeterminación de vida útil (vida de anaquel).', NULL, 39, '2022-03-24 21:34:09', '2022-03-23 20:51:32', '2022-03-24 21:34:09'),
(87, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Vida útil:\r\nDeterminación de vida útil (vida de anaquel).', NULL, 39, '2022-03-24 21:34:32', '2022-03-23 20:51:32', '2022-03-24 21:34:32'),
(88, 'Laboratorio', 'Desarrollo De Software', 'UNIVERSIDAD TECNOLÓGICA DEL CENTRO DE VERACRUZ', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '1. Desarrollo de aplicaciones de escritorio.\r\n\r\n2. Desarrollo de aplicaciones móviles (iOS & Android).\r\n\r\n3. Servicios de redes y telecomunicaciones\r\n\r\n4. Servicios de soporte y mantenimiento de equipo de cómputo.\r\n\r\n5.Diseño de imagen corporativa', NULL, 39, '2022-03-24 21:35:10', '2022-03-23 20:59:56', '2022-03-24 21:35:10'),
(89, 'Laboratorio', 'Laboratorio De Maquinado (Piezas Metálicas)', 'Laboratorio de Ingenieria Industrial Sistemas Integrados de Manufactura', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Asesoría del manejo de equipo a docentes y estudiantes, así como, préstamo y resguardo de los mismos y periféricos.', NULL, 16, NULL, '2022-03-24 17:44:13', '2022-03-24 17:44:13'),
(90, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Centro de Investigación en Alimentos y Ambiental', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'El grupo de investiga del CIA ha trabajado con proyectos de remediación de suelos cuerpos de agua mediante microorganismos además desarrollan investigación sobre productos alimenticios con propiedades probióticas', NULL, 19, NULL, '2022-03-24 20:02:40', '2022-03-24 20:02:40'),
(91, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Centro de Investigación en Alimentos', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'El grupo de investigación del laboratorio ha trabajado con proyectos de remediación de suelos, cuerpos de agua ,mediante micro organismos además desarrolla investigación sobre productos alimenticios con propiedades pro bióticas', NULL, 19, '2022-03-29 00:33:34', '2022-03-24 20:06:32', '2022-03-29 00:33:34'),
(92, 'Laboratorio', 'Maquinaria Industrial', 'Laboratorio de Ingeniería Mecatrónica', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Capacitación de los alumnos en materia de robótica, generación de robots y la participación en concursos relacionados a los mismos.', NULL, 16, NULL, '2022-03-24 20:30:48', '2022-03-24 20:30:48'),
(93, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Fisicoquímicos en agua', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '-pH -Cloruros \r\n-Alcalinidad \r\n-Sólidos totales \r\n-Conductividad', NULL, 39, NULL, '2022-03-24 21:26:26', '2022-03-24 21:26:26'),
(94, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Microbiológicos', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '-Coliformes totales \r\n-Coliformes fecales \r\n-Escherichia coli \r\n-Salmonella \r\n-Coliformes totales (UFC/g o ml) \r\n-Mesófilos aerobios \r\n-Coliformes (NMP/g o ml) \r\n-Mohos y levanduras', NULL, 39, NULL, '2022-03-24 21:27:35', '2022-03-24 21:27:35'),
(95, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Bromatológicos en alimentos', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '-Humedad \r\n-Cenizas \r\n-Proteínas \r\n-Grasas \r\n-Fibra \r\n-Carbohidratos \r\n-Sodio \r\n-Contenido energético \r\n-Azúcares reductores', NULL, 39, NULL, '2022-03-24 21:28:24', '2022-03-24 21:28:24'),
(96, 'Laboratorio', 'Elija Tipo', 'Fisicoquímicos en café', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '-Humedad \r\n-Cenizas \r\n-Grasas \r\n-Sodio \r\n-Azúcares reductores', NULL, 39, '2022-03-24 21:33:06', '2022-03-24 21:31:00', '2022-03-24 21:33:06'),
(97, 'Laboratorio', 'Elija Tipo', 'Bebidas alcohólicas (Determinación de alcohol)', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Determinación del contenido alcohólico (porcentaje del alcohol en volumen a 20°C % Alc. Vol.)', NULL, 39, '2022-03-24 21:34:17', '2022-03-24 21:32:19', '2022-03-24 21:34:17'),
(98, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Fisicoquímicos en café', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '-Humedad \r\n-Cenizas \r\n-Grasas \r\n-Sodio \r\n-Azúcares reductores', NULL, 39, NULL, '2022-03-24 21:32:55', '2022-03-24 21:32:55'),
(99, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Bebidas alcohólicas (Determinación de alcohol)', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Determinación del contenido alcohólico (porcentaje del alcohol en volumen a 20°C % Alc. Vol.)', NULL, 39, NULL, '2022-03-24 21:33:34', '2022-03-24 21:33:34'),
(100, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Vida de anaquel', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Vida útil: Determinación de vida útil (vida de anaquel).', NULL, 39, NULL, '2022-03-24 21:34:01', '2022-03-24 21:34:01'),
(101, 'Laboratorio', 'Desarrollo De Software', 'CEDESOFT', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '1. Desarrollo de aplicaciones de escritorio. 2. Desarrollo de aplicaciones móviles (iOS & Android). 3. Servicios de redes y telecomunicaciones 4. Servicios de soporte y mantenimiento de equipo de cómputo. 5.Diseño de imagen corporativa', NULL, 39, NULL, '2022-03-24 21:35:03', '2022-03-24 21:35:03'),
(102, 'Laboratorio', 'Laboratorio De Fabricación 3D/Realidad Virtual', 'Laboratorio de Ingeniería Electrónica', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Espacio destinado al desarrollo de prácticas de las materias de Ingeniería Electrónica.', NULL, 16, NULL, '2022-03-24 22:44:39', '2022-03-24 22:44:39'),
(103, 'Laboratorio', 'Laboratorio De Maquinado (Piezas Metálicas)', 'TALLER DE SOLDADURA SMAW', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'CAPACITACIÓN EN EL PROCESO DE SOLDADURA SMAW (SOLDADRA POR ARCO DE ELECTRODO REVESTIDO) EN DISTINTAS POSICIONES', NULL, 16, NULL, '2022-03-24 22:51:37', '2022-03-24 22:51:37'),
(104, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Taller de Gastronomía', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Espacio destinado a la elaboración, preparación y montaje de alimentos y bebidas.', NULL, 16, NULL, '2022-03-25 16:37:42', '2022-03-25 16:37:42'),
(105, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Laboratorio de Microbiología', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Laboratorio para realizar análisis de diferentes tipos de alimentos y bebidas.', NULL, 16, NULL, '2022-03-25 22:19:48', '2022-03-25 22:19:48'),
(106, 'Capacitacion', '', NULL, '30 hrs', NULL, 'Asíncrona', 'Virtual', '', 'Todos', 'Sin Costo', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 17, NULL, '2022-03-28 20:40:33', '2022-03-28 20:40:33'),
(107, 'Capacitacion', '', NULL, '30 hrs', NULL, '8:00 Am', 'Presencial', '', 'Docentes', 'Sin Costo', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 17, NULL, '2022-03-28 20:41:07', '2022-03-28 20:41:07'),
(108, 'Laboratorio', 'Laboratorio De Alimentos/Procesos Alimentarios', 'Fisicoquímicos en café', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'kqdchkcnslcnsaoldcmnsalckmsa', NULL, 39, '2022-03-28 21:32:42', '2022-03-28 21:32:15', '2022-03-28 21:32:42'),
(109, 'Laboratorio', 'Desarrollo De Software', 'Laboratorio de redes', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Laboratorio de redes y computo', NULL, 16, NULL, '2022-03-28 22:26:27', '2022-03-28 22:26:27'),
(110, 'Laboratorio', 'Química Y Física', 'Laboratorio de Química', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Capacidades para realizas practicas orgánicas e inorgánica para el nivel licenciatura de nanotecnología y ciencias químicas, Incubadora de microorganismos, super y ultra congelador.', NULL, 32, NULL, '2022-03-29 00:22:27', '2022-03-29 00:22:27'),
(111, 'Laboratorio', 'Laboratorio De Fabricación 3D/Realidad Virtual', 'REALIDAD AUMENTADA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Laboratorio de Work Station para la simulación de fenómenos físicos', NULL, 32, NULL, '2022-03-29 00:44:12', '2022-03-29 00:44:12'),
(112, 'Laboratorio', 'Química Y Física', 'LABORATORIO DE FISICA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Laboratorio didáctico para prácticas de mecánica clásica, experimentos energéticos, eléctricos, electromagnéticos y geotermodinámicos.', NULL, 32, NULL, '2022-03-29 00:45:34', '2022-03-29 00:45:34'),
(113, 'Laboratorio', 'Laboratorio De Maquinado (Piezas Metálicas)', 'TALLER DE MAQUINADO', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Taller de fabricación de piezas metálicas y a base de polímeros; torno fresado y centro de maquinado a tres ejes', NULL, 32, NULL, '2022-03-29 00:47:17', '2022-03-29 00:47:17'),
(114, 'Laboratorio', 'Laboratorio De Fabricación 3D/Realidad Virtual', 'TALLER DE FABRICACION 3 D', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Taller de piezas tridimensionales a base de impresión de polímeros.', NULL, 32, NULL, '2022-03-29 00:48:27', '2022-03-29 00:48:27'),
(115, 'Laboratorio', 'Maquinaria Industrial', 'TALLER DE BAJA TENSION', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Taller para realizar prácticas de instalaciones a 120, 220 y 440 volts', NULL, 32, NULL, '2022-03-29 00:50:56', '2022-03-29 00:50:56'),
(116, 'Laboratorio', 'Laboratorio De Maquinado (Piezas Metálicas)', 'TALLER DE MANUFACTURA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'En este taller se cuenta con una celda de manufactura para simulación física de procesos industriales', NULL, 32, NULL, '2022-03-29 00:54:50', '2022-03-29 00:54:50'),
(117, 'Laboratorio', 'Maquinaria Industrial', 'LABORATORIO DE ELECTRONICA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Laboratorio para la generación de circuitos electrónicos y mediciones', NULL, 32, NULL, '2022-03-29 00:56:35', '2022-03-29 00:56:35'),
(118, 'Laboratorio', 'Maquinaria Industrial', 'TALLER DE SOLDADURA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Taller de unión de piezas metálicas con base en procedimientos SMAW y MIG', NULL, 32, NULL, '2022-03-29 00:57:43', '2022-03-29 00:57:43'),
(119, 'Laboratorio', 'Química Y Física', 'Laboratorio de química', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'El laboratorio de química del ITSJRC tiene como  finalidad la\r\nconstrucción del pensamiento científico, crítico y tecnológico de\r\nlos estudiantes, así como el desarrollo de competencias y habilidades.', NULL, 25, NULL, '2022-03-29 02:52:55', '2022-03-29 02:52:55'),
(120, 'Laboratorio', 'Desarrollo De Software', 'Laboratorio de Informática', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Instalación  y montaje de equipo de cómputo nuevo y especializado.', NULL, 20, NULL, '2022-03-29 15:26:38', '2022-03-29 15:26:38'),
(121, 'Laboratorio', 'Química Y Física', 'Laboratorio de Ciencias Básicas', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Asesoría de procesos de ingeniería de instalación de sistemas de medición de hidrocarburos.', NULL, 20, NULL, '2022-03-29 15:29:01', '2022-03-29 15:29:01'),
(122, 'Laboratorio', 'Química Y Física', 'LAB. FÍSICA', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, 'Ejemplo laboratorio de física', NULL, 38, NULL, '2022-05-30 23:17:21', '2022-05-30 23:17:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_surname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_surname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `f_surname`, `s_surname`, `phone`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `role_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(143, 'admin', 'admin', 'admin', '12345678', 'israelpalafox@utgz.edu.mx', NULL, '$2y$10$XfKekwZx7ElmlT02z.TeAuxeygGlE/o3sVnmcfL7gS9wF/UWP15s6', 'admin', NULL, 1, NULL, NULL, NULL),
(144, 'admin', 'admin', 'admin', '12345678', 'vinculacion@gs.msev.gob.mx', '0000-00-00 00:00:00', '$2y$10$XfKekwZx7ElmlT02z.TeAuxeygGlE/o3sVnmcfL7gS9wF/UWP15s6', '', 'RinSalXWsg8p4etrCaGe4Fopk2cCDotPDm32ZVT0TBtKLC7wC4CWcyHro1CN', 1, NULL, NULL, NULL),
(145, 'Luis Daniel', 'Montero', 'Irigoyen', '(+52) 228-101-97-60', 'lmontero@msev.gob.mx', NULL, '$2y$10$muksaFr2DT.Tszp5sMaNUOXpduQOEgulGJ609RZi0ZJ1FQo1Pje7O', '', NULL, 2, NULL, '2022-03-15 16:19:00', '2022-03-15 16:19:00'),
(146, 'Magda Aurora', 'Álvarez', 'Carreño', '(+52) 782-152-48-23', 'magda@utgz.edu.mx', NULL, '$2y$10$kbjgXVpd2a63BegHZJHqmuw3NjbhIRiQy1FKKIc3.7aAeqrcTSvpa', '', 'Xv3LuJ3vKkjz7toGftGUFNx75F0LqZqJo7lC4CQaFUAKHKDL6Lc5y913dov6', 2, NULL, '2022-03-15 16:36:02', '2022-03-15 16:41:49'),
(147, 'Iliana', 'Alafita', 'Contreras', '(+52) 228-826-07-35', 'ialafita@msev.gob.mx', NULL, '$2y$10$KHr8Id2b6n9slgEijeG9puPMb31bAYLS0ZTFd41vTJtZYu.0yJ2T2', '', NULL, 2, NULL, '2022-03-15 17:20:06', '2022-03-15 17:20:06'),
(148, 'Ana Luz', 'López', 'Rodríguez', '(+52) 228-178-51-91', 'ana.lopez@upav.edu.mx', NULL, '$2y$10$/BlU/lgeC7TrIO/6bWsEW.AUdGS0VPxiCE5RwllBO.sseATfkEZBW', '', NULL, 2, NULL, '2022-03-15 17:21:09', '2022-03-15 17:21:09'),
(149, 'Abigail', 'Llamas Uscanga', 'Uscanga', '(+52) 229-298-33-35', 'itsavvinculacion@gmail.com', NULL, '$2y$10$AiyfPX.ZFI4mx3UY37foKuE.pLTvTClSnwwY4NV91GT5xraxf7O.a', '', 'JVPx27mkoSxOcorzHTQri8hxxZOgeLkP0AgiFQAOEcHZhzTu0qB79qnJ2jme', 2, NULL, '2022-03-15 17:21:20', '2022-03-15 17:21:20'),
(150, 'Rafael', 'Pale', 'Lombard', '(+52) 228-501-07-45', 'rapale78@gmail.com', NULL, '$2y$10$ScOAIR6A7Y6xyre4mGIX6O9JPL0WtHcbfGIRdDYuWEvVESxao1MNq', '', NULL, 2, NULL, '2022-03-15 17:23:32', '2022-03-15 17:23:32'),
(151, 'Carlos', 'Vásquez', 'Carlos Vasquez', '(+52) 923-113-15-18', 'c-vasquezo@choapas.tecnm.mx', NULL, '$2y$10$G6dw6buSk/anW/Mali.VBOQZr.4TBWJk0rowDo1aYO4mR6Pfpmmhy', '', NULL, 2, NULL, '2022-03-15 17:25:35', '2022-03-15 17:25:35'),
(152, 'Ana Karen', 'Toral', 'Del Moral', '(+52) 228-213-74-27', 'atoral@icc.clavijero.edumx', NULL, '$2y$10$IdgYyLMdv6eFG9N99.UpZuK3.xpNNfVlJ3wLU0pybU8Sb/kVl2M0i', '', NULL, 2, NULL, '2022-03-15 17:27:24', '2022-03-15 17:27:24'),
(153, 'Judith', 'Amaya', 'Domínguez', '(+52) 229-120-99-59', 'judith.amaya@itstb.edu.mx', NULL, '$2y$10$YparOVbCUpoKfWZ7c/SpEe/qIesbz70SScIZZs.NT0JILi85jZOAm', '', 'DDl4R0TUVCPSg5ZzfxyXcjtR4JtSLwNlFIJQgY0NTBulI9R4zIl12JfuFBmP', 2, NULL, '2022-03-15 17:27:47', '2022-03-15 17:27:47'),
(154, 'David Alejandro', 'Torres', 'López', '(+52) 228-268-46-63', 'dtorresl@msev.gob.mx', NULL, '$2y$10$inUaXStrbeEECduStXVQYuM3UmllxFOisWygHrWD0e499X2PWoOq2', '', NULL, 2, NULL, '2022-03-15 17:29:39', '2022-03-15 17:29:39'),
(155, 'Empresa', 'Empresa', 'Empresa', '(+52) 228-822-88-22', 'empresa@prueba.com', NULL, '$2y$10$bal//2Wp2J7QIvE99kwWVuPEMReSNn.8JMo9mwrpiTNKqUPddDDuy', '', NULL, 4, NULL, '2022-03-15 17:29:57', '2022-03-15 17:29:57'),
(156, 'Ludivina', 'Flores', 'Villegas', '(+52) 228-121-81-09', 'ludivina.flores@itsx.edu.mx', NULL, '$2y$10$CO/5Upwxnsxk0DqyfEpZJODgN916UDbqbOfyOZ6IcWBYy8JcZx8aG', '', 'PMGMX9ZmDXGsAQSd56W0xdAL7GU1O3jlqm5r1dMSf80KmfASp1DVtkIxX1Re', 2, NULL, '2022-03-15 17:31:02', '2022-03-15 17:31:02'),
(157, 'Alejandra', 'Méndez', 'Hernández', '(+52) 228-101-97-60', 'amendezh@msev.gob.mx', NULL, '$2y$10$Gm3rTdaBOnCmRqRSkNhneOSp0.AP7al387B7NpaZGDNyURso0zIPW', '', NULL, 2, NULL, '2022-03-15 17:32:07', '2022-03-15 17:32:07'),
(158, 'Claudia Lorena', 'Fernández', 'López', '(+52) 229-216-59-65', 'mtra.claudia.fernandez200@uphuatusco.edu.mx', NULL, '$2y$10$B5J9wgjiwGMwEXa3B6wGnOp2GkRp7wV32O1YVyJwMc1s3tKrF0bc.', '', NULL, 2, NULL, '2022-03-15 17:32:27', '2022-03-15 17:32:27'),
(159, 'Eloy', 'Marcos', 'Domínguez', '(+52) 766-100-92-66', 'programador1@tecmartinez.edu.mx', NULL, '$2y$10$UD9bGOX03bEOKoonYIm2cue/pLYoEd/V/LLBFVXHB/ejMgjk4GDii', '', 't3Ci22qr7OMsj5Nbgi11DKAwIqYnRbgSUDxp9OODdIWlVVWZ14de5d876qX7', 2, NULL, '2022-03-15 17:34:21', '2022-03-15 17:34:21'),
(160, 'Alma Rosa', 'Díaz', 'Méndez', '(+52) 782-104-76-67', 'alma.diaz@itspozarica.edu.mx', NULL, '$2y$10$AYuZT6JGL8y.lWTaamjka.tz0/zz2BXpPnouZpO15XjcV1fJyqDy.', '', '9PpMHaa2jmCmofFDuWL543ci1IjNQF21PAAzLXkqGNt2msfNqmVqx9yNsg2v', 2, NULL, '2022-03-15 17:37:34', '2022-03-15 17:37:34'),
(161, 'Guadalupe', 'Martínez', 'Caiseros', '(+52) 228-111-10-75', 'extension.universitaria@utsv.edu.mx', NULL, '$2y$10$RYFdO/OfjS5UpPQ9VwKhoeFqBvVDcIC3jLoLy2xRNEHcNq0BWGpM2', '', 'ubvdJGQv6cJYWRs8CCTnRHOqfL4eGfNVyBkmM5WMPFh4iJxAAl5tpVaWLzvt', 2, NULL, '2022-03-15 17:37:45', '2022-03-15 17:37:45'),
(162, 'Gonzalo Demetrio', 'León', 'Teddy', '(+52) 228-182-37-78', 'subdireccionvinculacion@itsperote.edu.mx', NULL, '$2y$10$izzqHMFsjaqiJ4R7u9PpLuRY/OUPGtBceIdF6AKSzZG2tl8e7mQ0W', '', NULL, 2, NULL, '2022-03-15 17:39:00', '2022-03-22 18:56:14'),
(163, 'Fabiola Del Carmen', 'Antonio', 'Martínez', '(+52) 921-161-88-84', 'fabiola_antonio@itsjc.edu.mx', NULL, '$2y$10$a.EuBEfr/16BWRhZCeMj/.SejuQskOxYuifToxjBgfFnGlyo9oE4u', '', 't9BuZpeJDU3bI3wM3pJFADIHvWuBsqxvArVqD4mghmxlDVoUFu5wxEvImnQ9', 2, NULL, '2022-03-15 17:39:35', '2022-03-15 17:39:35'),
(164, 'Francisco Gerardo', 'Ponce', 'Del Ángel', '(+52) 789-107-88-07', 'sub_vinculacion@itsta.edu.mx', NULL, '$2y$10$Ktk2Si.xOtOCBZ5lG/DsKudmzCDYu4laOpaTLnXijQQZcITTisyQa', '', NULL, 2, NULL, '2022-03-15 17:41:11', '2022-03-15 17:41:11'),
(165, 'Carina Elizabeth', 'Grajales', 'Aguilar', '(+52) 235-323-15-45', 'cegrajalesa@itsm.edu.mx', NULL, '$2y$10$og0CW/jIJCdAcmI8F8ZCDuywxvhXFljJUhWqGL2uns17VD771jS8O', '', NULL, 2, NULL, '2022-03-15 17:41:22', '2022-03-15 17:41:22'),
(166, 'María Del Rosario', 'Sosa', 'Jiménez', '(+52) 833-233-79-65', 'rosario.jimenez@itspanuco.edu.mx', NULL, '$2y$10$0DwpqD38t3oEJuICPtxY7eJZPA0hRAs5SeNAJdPpTMpkPgeIhR0Sa', '', 'nUdYh1mr8ief3GlC9mJzA7i1extfBSB93AbpQMpnitHBjj78xU0zAVlSwZLz', 2, NULL, '2022-03-15 17:42:22', '2022-03-15 17:42:22'),
(167, 'Gabriela Del Carmen', 'Troyo', 'Latour', '(+52) 921-103-88-50', 'sub_vinculacion@itesco.edu.mx', NULL, '$2y$10$V6s89jCRG.Jl9LONJH.HvuFyXxHgc1OQIH.SvzxEf8ZMaNj0hQ5jS', '', '3IHLUQlz1JXeEVFqlqDfNwRuTtiRlXvfo3JIBXKkrvmf16cl1NMRd7PblUPF', 2, NULL, '2022-03-15 17:43:39', '2022-03-15 17:43:39'),
(168, 'Jesús', 'Oviedo', 'Cruz', '(+52) 768-101-80-35', 'jesus.oviedo@itsna.edu.mx', NULL, '$2y$10$Efxzn/fQr6.CzmLogqYgy.VRT5W5LKPsQ/THtLlT9cRsqN4q5Dkzq', '', 'HenWYvKIGtjRHQLwERdFiirCzyy6SyVRmrUXBfH31yRg6NZICl3Vlha3wXnh', 2, NULL, '2022-03-15 17:44:28', '2022-03-15 17:44:28'),
(169, 'José Luis', 'García', 'López', '(+52) 833-285-91-37', 'jose.gl@alamo.tecnm.mx', NULL, '$2y$10$s6r6QY2nr7yh8XzbfKFQdenbYJlE4O21LONDfcmcgBnZaqAI9./rG', '', '6S35yEPaXz91KcCquSRmAQm8ZRtkdQamrf2szabJQkkyWA4hF1x96PHvbKmt', 2, NULL, '2022-03-15 17:44:40', '2022-03-22 19:29:35'),
(170, 'Ernesto', 'Ramos', 'Cruz', '(+52) 746-123-31-71', 'eramos@chicontepec.tecnm.mx', NULL, '$2y$10$z.j4oQ5RawoW2EzyVWbaYO4ufszFzMgrrzvsMgbPQwtDcqMX0OIY2', '', 'Gaga4DNxFBwt8e3ZDmceyVCl57QXfegjrbFKLjf2mtMdvUbEkWboPcOhpX99', 2, NULL, '2022-03-15 17:45:48', '2022-03-15 17:45:48'),
(171, 'Mariela', 'Villegas', 'Bernal', '(+52) 294-101-76-14', 'becas@itssat.edu.mx', NULL, '$2y$10$fgrL1ZOO3p.br6.agIsgNedjINqPGan.k/rYv/AqdQQvyvdo6.2VK', '', NULL, 2, NULL, '2022-03-15 17:47:02', '2022-03-28 17:24:35'),
(172, 'Miguel Ángel', 'Pérez', 'Chimalhua', '(+52) 272-100-85-31', 'dept_comunicacion@zongolica.tecnm.mx', NULL, '$2y$10$Z9pthh.bJqu1w1j9cbfJNuFWn9CjyigP7A7hzxeh3obB2Y3b2WNae', '', 'M8Jo02SHCKFqoz8bsSmZFODVDBISh2fUBBeVoSM1kwLlcHxAwlsBQFM6wAeP', 2, NULL, '2022-03-16 16:16:26', '2022-03-16 16:16:26'),
(173, 'Daniel', 'Cruz', 'Lagunes', '(+52) 229-207-81-91', 'incubadora@utcv.edu.mx', NULL, '$2y$10$MdjOsp4GE2x1x2mTJ1JliOf6WEyjkzfIrSrCU9F3R3ca9rgNJdK4S', '', 'Gk4sGU2ellAY4QXMnccffMotRNe9vApled09KuDqhzJmkr5KRR37Vmvmn9Yv', 2, NULL, '2022-03-16 16:54:53', '2022-03-16 16:54:53'),
(174, 'Cinthia', 'Fernández', 'Romero', '(+52) 228-753-46-27', 'cfernandezr@msev.gob.mx', NULL, '$2y$10$8geWA59c7jXJV9hE.Hd3H.dPTKCcZFt6g3teG3iQ.bSKUIigV8CAu', '', NULL, 2, NULL, '2022-03-18 18:32:58', '2022-03-18 18:32:58'),
(175, 'Alan', 'Arcos', 'López', '(+52) 234-565-43-23', 'aarcosl@msev.gob.mx', NULL, '$2y$10$jDfKEJdQXM2weNg775XxEu.kaiX/rGcnzBX0cjZSvffYMvi9aRufK', 'student/MaiE7atuVgCVlMDw6M8MPZnnv3ilNo7maBA1XASt.png', NULL, 3, NULL, '2022-03-18 18:37:24', '2022-03-18 18:37:24'),
(176, 'Carolina', 'García', 'Ortíz', '(+52) 229-118-69-37', 'carolina.go@itsjuanrodriguezclara.edu.mx', NULL, '$2y$10$YCurB2oiflihueMcO7VvHeqCB9H9xRf2Glil2rQGD75yKfATIuKBS', '', NULL, 2, NULL, '2022-03-22 19:32:13', '2022-03-23 20:16:19'),
(177, 'Silvia Cristina', 'Zárate', 'Merino', '(+52) 271-231-50-87', 'acad_dhuatusco@tecnm.mx', NULL, '$2y$10$gZH9sbFXexStgpdTUd6D3uDSvZ/./J4Y7R1FX2vtv8pyExCuIkYi2', '', '0TcTHzLJ1glUWvgoxfvgvDdHPONqZM1Q366yoiNAUH2BiedjHZhDkmzYBztk', 2, NULL, '2022-03-23 20:22:55', '2022-03-23 20:22:55'),
(178, 'Ayesha Margarita', 'Courrech', 'Arias', '(+52) 222-718-97-60', 'acourrech.itsco@gmail.com', NULL, '$2y$10$vhjiaX4jvD1ww1VATDiXtOo9mJMoCLN4xEPij0zWIShGZoK5oG9pa', '', NULL, 2, NULL, '2022-03-28 19:07:48', '2022-03-28 19:07:48'),
(180, 'Ejemplo_Ut', 'Xx', 'Xx', '(+52) 123-456-78-90', 'ejemplo@gmail.com', NULL, '$2y$10$7RiHX5S.kCvUbEWO9d/uTeRngeW17qiYb5U/gjpwnBekGH/rur7oO', '', NULL, 2, '2022-08-03 14:29:57', '2022-03-28 19:18:26', '2022-08-03 14:29:57'),
(181, 'ejemplo', 'ejemplo', 'ejemplo', '(+52) 123-456-78-90', 'estudiante@gmail.com', NULL, '$2y$10$SGkw75ChUqtnznEUuz0wKO/5UXObc9EKC53zEKh8yxB7PfwyBDPWm', 'student/exe8G11avR6gmjlxLblODIS7yqkbKBR6YPNM7Ydm.jpg', NULL, 3, NULL, '2022-08-03 15:21:15', '2022-08-03 15:21:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requeriments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibilities` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loans` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enterprise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address_companies`
--
ALTER TABLE `address_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_companies_locality_id_foreign` (`locality_id`),
  ADD KEY `address_companies_company_id_foreign` (`company_id`);

--
-- Indices de la tabla `address_enterprises`
--
ALTER TABLE `address_enterprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_enterprises_locality_id_foreign` (`locality_id`),
  ADD KEY `address_enterprises_enterprise_id_foreign` (`enterprise_id`);

--
-- Indices de la tabla `admin_notificacions`
--
ALTER TABLE `admin_notificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignars`
--
ALTER TABLE `asignars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprise_id` (`enterprise_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `asignar_university_service`
--
ALTER TABLE `asignar_university_service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descripcions`
--
ALTER TABLE `descripcions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descripcion_subsector`
--
ALTER TABLE `descripcion_subsector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa_sector`
--
ALTER TABLE `empresa_sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enterprises`
--
ALTER TABLE `enterprises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enterprise_projects`
--
ALTER TABLE `enterprise_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprise_projects_enterprise_id_foreign` (`enterprise_id`),
  ADD KEY `enterprise_projects_project_id_foreign` (`project_id`);

--
-- Indices de la tabla `enterprise_services`
--
ALTER TABLE `enterprise_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprise_services_enterprise_id_foreign` (`enterprise_id`);

--
-- Indices de la tabla `enterprise_service_university`
--
ALTER TABLE `enterprise_service_university`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipment_services`
--
ALTER TABLE `equipment_services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo_imagens`
--
ALTER TABLE `equipo_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_student_id_foreign` (`student_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalities_state_id_foreign` (`state_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_students`
--
ALTER TABLE `project_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_students_project_id_foreign` (`project_id`),
  ADD KEY `project_students_student_id_foreign` (`student_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector_subsector`
--
ALTER TABLE `sector_subsector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `service_enterprises`
--
ALTER TABLE `service_enterprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `student_vacancy`
--
ALTER TABLE `student_vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subsectors`
--
ALTER TABLE `subsectors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indices de la tabla `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indices de la tabla `university_services`
--
ALTER TABLE `university_services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address_companies`
--
ALTER TABLE `address_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `address_enterprises`
--
ALTER TABLE `address_enterprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `admin_notificacions`
--
ALTER TABLE `admin_notificacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `asignars`
--
ALTER TABLE `asignars`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `asignar_university_service`
--
ALTER TABLE `asignar_university_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `descripcions`
--
ALTER TABLE `descripcions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `descripcion_subsector`
--
ALTER TABLE `descripcion_subsector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `empresa_sector`
--
ALTER TABLE `empresa_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enterprises`
--
ALTER TABLE `enterprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `enterprise_projects`
--
ALTER TABLE `enterprise_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enterprise_services`
--
ALTER TABLE `enterprise_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `enterprise_service_university`
--
ALTER TABLE `enterprise_service_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `equipment_services`
--
ALTER TABLE `equipment_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `equipo_imagens`
--
ALTER TABLE `equipo_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2464;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `project_students`
--
ALTER TABLE `project_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sector_subsector`
--
ALTER TABLE `sector_subsector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `service_enterprises`
--
ALTER TABLE `service_enterprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `student_vacancy`
--
ALTER TABLE `student_vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `subsectors`
--
ALTER TABLE `subsectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `university_services`
--
ALTER TABLE `university_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de la tabla `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
