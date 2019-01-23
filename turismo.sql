-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-02-2017 a las 16:34:44
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividades` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_galeria` int(11) NOT NULL,
  `titulo_actividades` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_actividades` text COLLATE utf8_spanish2_ci NOT NULL,
  `importante_actividades` text COLLATE utf8_spanish2_ci NOT NULL,
  `ruta_actividades` text COLLATE utf8_spanish2_ci NOT NULL,
  `precio_actividades_cop` double NOT NULL,
  `precio_actividades_usd` double NOT NULL,
  `estado_actividades` enum('Nuevo','Destacado','Activo','Inactivo','Oferta') COLLATE utf8_spanish2_ci NOT NULL,
  `id_lenguaje` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividades`, `id_actividad`, `id_galeria`, `titulo_actividades`, `descripcion_actividades`, `importante_actividades`, `ruta_actividades`, `precio_actividades_cop`, `precio_actividades_usd`, `estado_actividades`, `id_lenguaje`) VALUES
(1, 1, 1, 'Tour Museo del Caucho', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Lorem ipsum dolor sit amet</p>\\n', '<p>\\n	Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus.</p>\\n', '<p>\\n	Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus.</p>\\n', 980000, 330, 'Oferta', 1),
(2, 1, 1, 'Tour Museum of the Rubber', '<p>\\n	Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>\\n', '<p>\\n	Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>\\n', '<p>\\n	Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>\\n', 980000, 330, 'Oferta', 2),
(5, 1, 1, 'Tour Musée en Caoutchouc', '<p>\\n	Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus.</p>\\n', '<p>\\n	Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus.</p>\\n', '<p>\\n	Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus.</p>\\n', 980000, 0, 'Oferta', 3),
(6, 2, 2, 'Nueva actividad 2', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', 750000, 250, 'Nuevo', 1),
(7, 2, 2, 'New Activity', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', 750000, 250, 'Nuevo', 2),
(8, 2, 2, 'Quead tr', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '<p>\\n	Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', 750000, 0, 'Nuevo', 3),
(9, 3, 3, 'Recorrido por la selva', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', 500000, 170, 'Nuevo', 1),
(10, 4, 4, 'Avistamiento de delfines', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', 650000, 320, 'Nuevo', 1),
(11, 5, 8, 'Visita tribus', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>\\n', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>\\n', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>\\n', 500000, 170, 'Nuevo', 1),
(12, 4, 4, 'Dolphin Watching', '<p>\\n	Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>\\n', 650000, 320, 'Nuevo', 2),
(13, 5, 8, 'Visita tribus', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>\\n', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>\\n', '<p>\\n	Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada.</p>\\n', 500000, 170, 'Nuevo', 2),
(14, 3, 3, 'Recorrido por la selva', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', '<p>\\n	Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed</p>\\n', 500000, 170, 'Nuevo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_lenguaje`
--

CREATE TABLE `actividad_lenguaje` (
  `id_actividad` int(11) NOT NULL,
  `id_lenguaje` int(11) NOT NULL,
  `key_actividad` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `value_actividad` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actividad_lenguaje`
--

INSERT INTO `actividad_lenguaje` (`id_actividad`, `id_lenguaje`, `key_actividad`, `value_actividad`) VALUES
(1, 1, 'titulo', 'Tour Museo del Caucho'),
(1, 2, 'titulo', 'Tour Museum of the rubber'),
(1, 1, 'descripcion', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.'),
(1, 2, 'descripcion', 'Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_vista`
--

CREATE TABLE `actividad_vista` (
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad_visitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_usuario` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fecha_calificacion` date NOT NULL,
  `puntaje_calificacion` double NOT NULL,
  `comentario_calificacion` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_actividad`
--

CREATE TABLE `comentarios_actividad` (
  `id_comentarios_actividad` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `contenido_comentario` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_comentario` date NOT NULL,
  `calificacion_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comentarios_actividad`
--

INSERT INTO `comentarios_actividad` (`id_comentarios_actividad`, `id_actividad`, `id_usuario`, `contenido_comentario`, `fecha_comentario`, `calificacion_comentario`) VALUES
(1, 1, 2, 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus suscipit tortor eget felis porttitor volutpat.', '2016-12-20', 4),
(2, 1, 2, 'Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus.', '2016-12-20', 2),
(3, 1, 2, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus.', '2016-12-20', 3),
(4, 1, 7, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus.', '2016-12-20', 5),
(5, 1, 7, 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus.', '2016-12-20', 2),
(6, 2, 7, 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit.', '2016-12-20', 5),
(7, 2, 7, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada.', '2016-12-20', 2),
(9, 2, 7, 'Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', '2016-12-20', 1),
(10, 3, 2, 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. ', '2016-12-23', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id_contenidos` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `id_lenguaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id_contenidos`, `id_contenido`, `titulo`, `contenido`, `meta_title`, `meta_keywords`, `meta_description`, `id_lenguaje`) VALUES
(9, 1, 'Metodos de pago', '<div>\\n	Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Sed porttitor lectus nibh. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</div>\\n<div>\\n	&nbsp;</div>\\n<div>\\n	Sed porttitor lectus nibh. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</div>\\n<div>\\n	&nbsp;</div>\\n<div>\\n	Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus.</div>\\n<div>\\n	&nbsp;</div>\\n<div>\\n	Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Proin eget tortor risus.</div>\\n<div>\\n	&nbsp;</div>\\n<div>\\n	Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</div>\\n', 'Metodos de pago', 'Metodos de pago', 'Metodos de pago', 1),
(10, 1, 'Metodos de pago fr', '<p>\\n	Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit.</p>\\n', 'Metodos de pago fr', 'Metodos de pago fr', 'Metodos de pago fr', 3),
(11, 2, 'Entregas', '<p>\\n	Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p>\\n', 'Entregas', 'Entregas', 'Entregas', 1),
(12, 2, 'Entregas en', '<p>\\n	Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat.</p>\\n', 'Entregas en', 'Entregas en', 'Entregas en', 2),
(13, 3, 'Devoluciones', '<p>\\n	Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt.</p>\\n', 'Devoluciones', 'Devoluciones', 'Devoluciones', 1),
(14, 3, 'Devoluciones fr', '<p>\\n	Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt.</p>\\n', 'Devoluciones fr', 'Devoluciones fr', 'Devoluciones fr', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id_destinos` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_galeria` int(11) NOT NULL,
  `nombre_destino` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_destino` text COLLATE utf8_spanish2_ci NOT NULL,
  `latitud_destino` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `longitud_destino` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `calificacion_destino` float NOT NULL,
  `estado_destino` enum('Nuevo','Activo','Inactivo','Oferta') COLLATE utf8_spanish2_ci NOT NULL,
  `id_lenguaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id_destinos`, `id_destino`, `id_galeria`, `nombre_destino`, `descripcion_destino`, `latitud_destino`, `longitud_destino`, `calificacion_destino`, `estado_destino`, `id_lenguaje`) VALUES
(1, 1, 7, 'Leticia', '<p>\\n	Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>\\n', '-4.207966828621378', '-69.94368553161621', 4, 'Nuevo', 1),
(2, 1, 7, 'Leticia ingles', '<p>\\n	Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat.</p>\\n', '-4.207966828621378', '-69.94368553161621', 4, 'Nuevo', 2),
(3, 1, 7, 'Leticia Frances', '<p>\\n	Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat.</p>\\n', '4.32476274863', '-76.3947264924', 4, 'Nuevo', 3),
(5, 2, 6, 'Tarapaca', '<p>\\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.</p>\\n', '4.9324623746237', '-75.34294324328', 0, 'Nuevo', 1),
(6, 2, 0, 'Tarapaca', '<p>\\n	Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit.</p>\\n', '4.32476274863', '-76.3947264924', 0, 'Nuevo', 3),
(7, 3, 9, 'Puerto Alegria', '<p>\\n	Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\\n', '-4.3544543242', '-65.876474624', 0, 'Nuevo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id_galerias` int(11) NOT NULL,
  `tipo_galerias` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galerias`
--

INSERT INTO `galerias` (`id_galerias`, `tipo_galerias`) VALUES
(1, 'Actividad'),
(2, 'Actividad'),
(3, 'Actividad'),
(4, 'Actividad'),
(6, 'Destino'),
(7, 'Destino'),
(8, 'Actividad'),
(9, 'Destino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_archivos`
--

CREATE TABLE `galeria_archivos` (
  `id_galeria_archivos` int(11) NOT NULL,
  `id_galerias` int(11) NOT NULL,
  `archivo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_archivo` enum('Video','Imagen') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `galeria_archivos`
--

INSERT INTO `galeria_archivos` (`id_galeria_archivos`, `id_galerias`, `archivo`, `tipo_archivo`) VALUES
(4, 1, 'p1.png', 'Imagen'),
(6, 2, 'p2.png', 'Imagen'),
(9, 4, 'p3.png', 'Imagen'),
(10, 3, 'p3.jpg', 'Imagen'),
(11, 1, 'p3.jpg', 'Imagen'),
(12, 4, '404.jpg', 'Imagen'),
(13, 6, 'p2.png', 'Imagen'),
(14, 6, 'p2.png', 'Imagen'),
(15, 6, '2016-12-135411p3.jpg', 'Imagen'),
(16, 8, '2016-12-13-2370-tribus.jpg', 'Imagen'),
(17, 9, '2016-12-13-1012-p4.jpg', 'Imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguaje`
--

CREATE TABLE `lenguaje` (
  `id_lenguaje` int(11) NOT NULL,
  `nombre_lenguaje` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_lenguaje` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lenguaje`
--

INSERT INTO `lenguaje` (`id_lenguaje`, `nombre_lenguaje`, `codigo_lenguaje`) VALUES
(1, 'Español', 'es'),
(2, 'Ingles', 'en'),
(3, 'Frances', 'fr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_orden` date NOT NULL,
  `hora_orden` time NOT NULL,
  `adultos_orden` int(11) DEFAULT NULL,
  `menores_orden` int(11) DEFAULT NULL,
  `comentarios_orden` mediumtext COLLATE utf8_spanish2_ci,
  `valor_orden` double NOT NULL,
  `estado_orden` enum('Pagado','Pendiente de pago','Pendiente','Aceptado','Rechazado','Cancelado') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `id_usuario`, `fecha_orden`, `hora_orden`, `adultos_orden`, `menores_orden`, `comentarios_orden`, `valor_orden`, `estado_orden`) VALUES
(10, 2, '2016-12-16', '12:17:34', NULL, NULL, NULL, 500000, 'Pendiente'),
(11, 2, '2016-12-19', '09:04:24', NULL, NULL, NULL, 500000, 'Pendiente'),
(12, 2, '2016-12-19', '02:20:05', NULL, NULL, '                                                                                                    ', 2080000, 'Rechazado'),
(13, 2, '2016-12-19', '02:50:22', NULL, NULL, '                                                                                                                                                            Texto                                                                                                                                                ', 1505000, 'Pendiente de pago'),
(14, 2, '2016-12-23', '11:11:05', NULL, NULL, NULL, 10233000, 'Pendiente'),
(15, 2, '2017-02-06', '03:15:59', NULL, NULL, NULL, 500000, 'Pendiente'),
(16, 2, '2017-02-06', '03:19:14', NULL, NULL, NULL, 500000, 'Pendiente'),
(17, 2, '2017-02-07', '10:14:14', NULL, NULL, NULL, 100170, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

CREATE TABLE `orden_articulos` (
  `id_orden_articulo` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `valor_orden_articulos_cop` double NOT NULL,
  `valor_orden_articulos_usd` double NOT NULL,
  `cantidad_orden_articulos` int(11) NOT NULL,
  `tipo_orden_articulos` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_articulos`
--

INSERT INTO `orden_articulos` (`id_orden_articulo`, `id_orden`, `id_actividad`, `id_paquete`, `valor_orden_articulos_cop`, `valor_orden_articulos_usd`, `cantidad_orden_articulos`, `tipo_orden_articulos`) VALUES
(13, 10, 3, 0, 500000, 0, 1, 1),
(14, 11, 5, 0, 500000, 0, 1, 1),
(15, 12, 1, 0, 980000, 0, 1, 1),
(16, 12, 1, 1, 100000, 0, 1, 0),
(17, 12, 1, 2, 1000000, 0, 1, 0),
(18, 13, 2, 0, 750000, 0, 2, 1),
(19, 13, 2, 3, 1000, 0, 5, 0),
(20, 14, 4, 0, 650000, 0, 9, 1),
(21, 14, 1, 0, 980000, 0, 1, 1),
(22, 14, 1, 1, 100000, 0, 3, 0),
(23, 14, 2, 0, 750000, 0, 2, 1),
(24, 14, 2, 3, 1000, 0, 3, 0),
(25, 14, 5, 0, 500000, 0, 3, 1),
(26, 14, 5, 4, 100000, 0, 1, 0),
(27, 16, 5, 0, 500000, 0, 1, 1),
(28, 17, 5, 0, 500000, 170, 1, 1),
(29, 17, 5, 4, 0, 100000, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_actividad`
--

CREATE TABLE `planes_actividad` (
  `id_planes_actividad` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `titulo_planes_actividad` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_planes_actividad` text COLLATE utf8_spanish2_ci NOT NULL,
  `duracion_planes_actividad` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `preciom_planes_actividad` double NOT NULL,
  `precioa_planes_actividad_usd` double NOT NULL,
  `precioa_planes_actividad_cop` double NOT NULL,
  `destino_planes_actividad` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_planes_actividad` enum('Nuevo','Activo','Inactivo') COLLATE utf8_spanish2_ci NOT NULL,
  `id_lenguaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `planes_actividad`
--

INSERT INTO `planes_actividad` (`id_planes_actividad`, `id_paquete`, `id_actividad`, `titulo_planes_actividad`, `descripcion_planes_actividad`, `duracion_planes_actividad`, `preciom_planes_actividad`, `precioa_planes_actividad_usd`, `precioa_planes_actividad_cop`, `destino_planes_actividad`, `estado_planes_actividad`, `id_lenguaje`) VALUES
(1, 1, 1, 'Sagittis sed pharetra ut nunc. ', '<p>\\n	Curabitur aliquet quam id dui posuere blandit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies ligula sed magna dictum porta. Donec sollicitudin molestie malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Pellentesque in ipsum id orci porta dapibus.</p>\\n', '3 Dias 3 Noches', 200000, 100000, 0, 'Dolor sit, Amet', 'Nuevo', 1),
(4, 1, 1, 'New package', '<p>\\n	Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>\\n', '10 Days 9 Nights', 2500000, 3000000, 0, '', 'Nuevo', 2),
(5, 1, 1, 'Curabitur non nulla', '<p>\\n	Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>\\n', '2 Caritub 1 soiret', 2500000, 2500000, 0, '', 'Nuevo', 3),
(7, 2, 1, 'Paquete numero 2', '<p>\\n	Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>\\n', '2 Semanas', 1000000, 1000000, 0, 'Guajira', 'Nuevo', 1),
(8, 3, 2, 'Paquete actividad 2', '', '', 1200000, 1000, 0, '', 'Nuevo', 1),
(9, 3, 2, 'Paquete frances actividad 2', '', '', 1000000, 1000000, 0, '', 'Nuevo', 3),
(10, 4, 5, 'Pasar una noche con la tribu', '<p>\\n	Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Curabitur aliquet quam id dui posuere blandit.</p>\\n', '1 Noche', 80000, 100000, 0, 'Leticia', 'Nuevo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_lenguaje`
--

CREATE TABLE `plan_lenguaje` (
  `id_plan` int(11) NOT NULL,
  `id_lenguaje` tinyint(4) NOT NULL,
  `key_plan` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `key_lenguaje` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slides`
--

CREATE TABLE `slides` (
  `id_slide` int(11) NOT NULL,
  `imagen` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `slides`
--

INSERT INTO `slides` (`id_slide`, `imagen`, `posicion`) VALUES
(1, 'slide01.png', 1),
(3, 'p4.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id_suscripcion` int(11) NOT NULL,
  `email_suscripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_suscripcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id_suscripcion`, `email_suscripcion`, `fecha_suscripcion`) VALUES
(2, 'nikollaihernandez@gmail.com', '2016-12-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id_testimonio` int(11) NOT NULL,
  `nombre_testimonio` varchar(50) NOT NULL,
  `imagen_testimonio` varchar(50) NOT NULL,
  `texto_testimonio` mediumtext NOT NULL,
  `cargo_testimonio` varchar(50) NOT NULL,
  `genero_testimonio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id_testimonio`, `nombre_testimonio`, `imagen_testimonio`, `texto_testimonio`, `cargo_testimonio`, `genero_testimonio`) VALUES
(1, 'Juan Pablo', '', '<p>\\n	Pellentesque in ipsum id orci porta dapibus. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>\\n', '', 'm'),
(2, 'Ana Maria', '2.png', '<p>\\n	Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit.</p>\\n', '', 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_departamentos`
--

CREATE TABLE `ubicacion_departamentos` (
  `id_departamento` varchar(3) NOT NULL DEFAULT '',
  `nombre` varchar(60) NOT NULL DEFAULT '',
  `PAI_PK` int(11) NOT NULL DEFAULT '52'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Departamentos colombianos segun la distribucion politica ; I';

--
-- Volcado de datos para la tabla `ubicacion_departamentos`
--

INSERT INTO `ubicacion_departamentos` (`id_departamento`, `nombre`, `PAI_PK`) VALUES
('05', 'Antioquia', 52),
('08', 'Atlantico', 52),
('13', 'Bolivar', 52),
('15', 'Boyaca', 52),
('17', 'Caldas', 52),
('18', 'Caqueta', 52),
('19', 'Cauca', 52),
('20', 'Cesar', 52),
('23', 'Cordoba', 52),
('25', 'Cundinamarca', 52),
('27', 'Choco', 52),
('41', 'Huila', 52),
('44', 'La Guajira', 52),
('47', 'Magdalena', 52),
('50', 'Meta', 52),
('52', 'Nariño', 52),
('54', 'Norte de Santander', 52),
('63', 'Quindio', 52),
('66', 'Risaralda', 52),
('68', 'Santander', 52),
('70', 'Sucre', 52),
('73', 'Tolima', 52),
('76', 'Valle del Cauca', 52),
('81', 'Arauca', 52),
('85', 'Casanare', 52),
('86', 'Putumayo', 52),
('88', 'San Andres', 52),
('91', 'Amazonas', 52),
('94', 'Guainia', 52),
('95', 'Guaviare', 52),
('97', 'Vaupes', 52),
('99', 'Vichada', 52),
('999', 'No aplica', 999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_municipios`
--

CREATE TABLE `ubicacion_municipios` (
  `id_municipio` varchar(5) NOT NULL DEFAULT '',
  `nombre_municipio` varchar(60) NOT NULL DEFAULT '',
  `id_departamento` varchar(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Municipios colombianos segun la distribucion politica del; I';

--
-- Volcado de datos para la tabla `ubicacion_municipios`
--

INSERT INTO `ubicacion_municipios` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
('05001', 'Medellin', '05'),
('05002', 'Abejorral', '05'),
('05004', 'Abriaqui', '05'),
('05021', 'Alejandria', '05'),
('05030', 'Amaga', '05'),
('05031', 'Amalfi', '05'),
('05034', 'Andes', '05'),
('05036', 'Angelopolis', '05'),
('05038', 'Angostura', '05'),
('05040', 'Anori', '05'),
('05042', 'Santa Fe de Antioquia', '05'),
('05044', 'Anza', '05'),
('05045', 'Apartado', '05'),
('05051', 'Arboletes', '05'),
('05055', 'Argelia', '05'),
('05059', 'Armenia', '05'),
('05079', 'Barbosa', '05'),
('05086', 'Belmira', '05'),
('05088', 'Bello', '05'),
('05091', 'Betania', '05'),
('05093', 'Betulia', '05'),
('05101', 'Bolivar', '05'),
('05107', 'BriceÃ±o', '05'),
('05113', 'Buritica', '05'),
('05120', 'Caceres', '05'),
('05125', 'Caicedo', '05'),
('05129', 'Caldas', '05'),
('05134', 'Campamento', '05'),
('05138', 'CaÃ±asgordas', '05'),
('05142', 'Caracoli', '05'),
('05145', 'Caramanta', '05'),
('05147', 'Carepa', '05'),
('05148', 'Carmen de Viboral', '05'),
('05150', 'Carolina', '05'),
('05154', 'Caucasia', '05'),
('05172', 'Chigorodo', '05'),
('05190', 'Cisneros', '05'),
('05197', 'Cocorna', '05'),
('05206', 'Concepcion', '05'),
('05209', 'Concordia', '05'),
('05212', 'Copacabana', '05'),
('05234', 'Dabeiba', '05'),
('05237', 'Don Matias', '05'),
('05240', 'Ebejico', '05'),
('05250', 'El Bagre', '05'),
('05264', 'Entrerrios', '05'),
('05266', 'Envigado', '05'),
('05282', 'Fredonia', '05'),
('05284', 'Frontino', '05'),
('05306', 'Giraldo', '05'),
('05308', 'Girardota', '05'),
('05310', 'Gomez Plata', '05'),
('05313', 'Granada', '05'),
('05315', 'Guadalupe', '05'),
('05318', 'Guarne', '05'),
('05321', 'Guatape', '05'),
('05347', 'Heliconia', '05'),
('05353', 'Hispania', '05'),
('05360', 'ItagÃ¼i', '05'),
('05361', 'Ituango', '05'),
('05364', 'Jardin', '05'),
('05368', 'Jerico', '05'),
('05376', 'La Ceja', '05'),
('05380', 'La Estrella', '05'),
('05390', 'La Pintada', '05'),
('05400', 'La Union', '05'),
('05411', 'Liborina', '05'),
('05425', 'Maceo', '05'),
('05440', 'Marinilla', '05'),
('05467', 'Montebello', '05'),
('05475', 'Murindo', '05'),
('05480', 'Mutata', '05'),
('05483', 'NariÃ±o', '05'),
('05490', 'Necocli', '05'),
('05495', 'Nechi', '05'),
('05501', 'Olaya', '05'),
('05541', 'PeÃ±ol', '05'),
('05543', 'Peque', '05'),
('05576', 'Pueblorrico', '05'),
('05579', 'Puerto Berrio', '05'),
('05585', 'Puerto Nare', '05'),
('05591', 'Puerto Triunfo', '05'),
('05604', 'Remedios', '05'),
('05607', 'Retiro', '05'),
('05615', 'Rionegro', '05'),
('05628', 'Sabanalarga', '05'),
('05631', 'Sabaneta', '05'),
('05642', 'Salgar', '05'),
('05647', 'San Andres de Cuerquia', '05'),
('05649', 'San Carlos', '05'),
('05652', 'San Francisco', '05'),
('05656', 'San Jeronimo', '05'),
('05658', 'San Jose de MontaÃ±a', '05'),
('05659', 'San Juan de Uraba', '05'),
('05660', 'San Luis', '05'),
('05664', 'San Pedro', '05'),
('05665', 'San Pedro de Uraba', '05'),
('05667', 'San Rafael', '05'),
('05670', 'San Roque', '05'),
('05674', 'San Vicente', '05'),
('05679', 'Santa Barbara', '05'),
('05686', 'Santa Rosa de Osos', '05'),
('05690', 'Santo Domingo', '05'),
('05697', 'Santuario', '05'),
('05736', 'Segovia', '05'),
('05756', 'Sonson', '05'),
('05761', 'Sopetran', '05'),
('05789', 'Tamesis', '05'),
('05790', 'Taraza', '05'),
('05792', 'Tarso', '05'),
('05809', 'Titiribi', '05'),
('05819', 'Toledo', '05'),
('05837', 'Turbo', '05'),
('05842', 'Uramita', '05'),
('05847', 'Urrao', '05'),
('05854', 'Valdivia', '05'),
('05856', 'Valparaiso', '05'),
('05858', 'Vegachi', '05'),
('05861', 'Venecia', '05'),
('05873', 'Vigia del Fuerte', '05'),
('05885', 'Yali', '05'),
('05887', 'Yarumal', '05'),
('05890', 'Yolombo', '05'),
('05893', 'Yondo (Casabe)', '05'),
('05895', 'Zaragoza', '05'),
('08001', 'Barranquilla', '08'),
('08078', 'Baranoa', '08'),
('08137', 'Campo de la Cruz', '08'),
('08141', 'Candelaria', '08'),
('08296', 'Galapa', '08'),
('08372', 'Juan de Acosta', '08'),
('08421', 'Luruaco', '08'),
('08433', 'Malambo', '08'),
('08436', 'Manati', '08'),
('08520', 'Palmar de Varela', '08'),
('08549', 'Piojo', '08'),
('08558', 'Polonuevo', '08'),
('08560', 'Ponedera', '08'),
('08573', 'Puerto Colombia', '08'),
('08606', 'Repelon', '08'),
('08634', 'Sabanagrande', '08'),
('08638', 'Sabanalarga', '08'),
('08675', 'Santa Lucia', '08'),
('08685', 'Santo Tomas', '08'),
('08758', 'Soledad', '08'),
('08770', 'Suan', '08'),
('08832', 'Tubara', '08'),
('08849', 'Usiacuri', '08'),
('11001', 'Bogota D.C.', '25'),
('13001', 'Cartagena', '13'),
('13006', 'Achi', '13'),
('13030', 'Altos del Rosario', '13'),
('13042', 'Arenal', '13'),
('13052', 'Arjona', '13'),
('13062', 'Arroyohondo', '13'),
('13074', 'Barranco de Loba', '13'),
('13140', 'Calamar', '13'),
('13160', 'Cantagallo', '13'),
('13188', 'Cicuco', '13'),
('13212', 'Cordoba', '13'),
('13222', 'Clemencia', '13'),
('13244', 'El Carmen de Bolivar', '13'),
('13248', 'El Guamo', '13'),
('13268', 'El PeÃ±on', '13'),
('13300', 'Hatillo de Loba', '13'),
('13430', 'Magangue', '13'),
('13433', 'Mahates', '13'),
('13440', 'Margarita', '13'),
('13442', 'Maria la Baja', '13'),
('13458', 'Montecristo', '13'),
('13468', 'Mompos', '13'),
('13473', 'Morales', '13'),
('13490', 'Norosi', '13'),
('13549', 'Pinillos', '13'),
('13580', 'Regidor', '13'),
('13600', 'Rio Viejo', '13'),
('13620', 'San Cristobal', '13'),
('13647', 'San Estanislao', '13'),
('13650', 'San Fernando', '13'),
('13654', 'San Jacinto', '13'),
('13655', 'San Jacinto del Cauca', '13'),
('13657', 'San Juan de Nepomuceno', '13'),
('13667', 'San Martin de Loba', '13'),
('13670', 'San Pablo', '13'),
('13673', 'Santa Catalina', '13'),
('13683', 'Santa Rosa', '13'),
('13688', 'Santa Rosa del Sur', '13'),
('13744', 'Simiti', '13'),
('13760', 'Soplaviento', '13'),
('13780', 'Talaigua Nuevo', '13'),
('13810', 'Tiquisio (Puerto Rico)', '13'),
('13836', 'Turbaco', '13'),
('13838', 'Turbana', '13'),
('13873', 'Villanueva', '13'),
('13894', 'Zambrano', '13'),
('15001', 'Tunja', '15'),
('15022', 'Almeida', '15'),
('15047', 'Aquitania', '15'),
('15051', 'Arcabuco', '15'),
('15087', 'Belen', '15'),
('15090', 'Berbeo', '15'),
('15092', 'Beteitiva', '15'),
('15097', 'Boavita', '15'),
('15104', 'Boyaca', '15'),
('15106', 'BriceÃ±o', '15'),
('15109', 'Buenavista', '15'),
('15114', 'Busbanza', '15'),
('15131', 'Caldas', '15'),
('15135', 'Campohermoso', '15'),
('15162', 'Cerinza', '15'),
('15172', 'Chinavita', '15'),
('15176', 'Chiquinquira', '15'),
('15180', 'Chiscas', '15'),
('15183', 'Chita', '15'),
('15185', 'Chitaraque', '15'),
('15187', 'Chivata', '15'),
('15189', 'Cienaga', '15'),
('15204', 'Combita', '15'),
('15212', 'Coper', '15'),
('15215', 'Corrales', '15'),
('15218', 'Covarachia', '15'),
('15223', 'Cubara', '15'),
('15224', 'Cucaita', '15'),
('15226', 'Cuitiva', '15'),
('15232', 'Chiquiza', '15'),
('15236', 'Chivor', '15'),
('15238', 'Duitama', '15'),
('15244', 'El Cocuy', '15'),
('15248', 'El Espino', '15'),
('15272', 'Firavitoba', '15'),
('15276', 'Floresta', '15'),
('15293', 'Gachantiva', '15'),
('15296', 'Gameza', '15'),
('15299', 'Garagoa', '15'),
('15317', 'Guacamayas', '15'),
('15322', 'Guateque', '15'),
('15325', 'Guayata', '15'),
('15332', 'Guican', '15'),
('15362', 'Iza', '15'),
('15367', 'Jenesano', '15'),
('15368', 'Jerico', '15'),
('15377', 'Labranzagrande', '15'),
('15380', 'La Capilla', '15'),
('15401', 'La Victoria', '15'),
('15403', 'La Uvita', '15'),
('15407', 'Villa de Leiva', '15'),
('15425', 'Macanal', '15'),
('15442', 'Maripi', '15'),
('15455', 'Miraflores', '15'),
('15464', 'Mongua', '15'),
('15466', 'Mongui', '15'),
('15469', 'Moniquira', '15'),
('15476', 'Motavita', '15'),
('15480', 'Muzo', '15'),
('15491', 'Nobsa', '15'),
('15494', 'Nuevo Colon', '15'),
('15500', 'Oicata', '15'),
('15507', 'Otanche', '15'),
('15511', 'Pachavita', '15'),
('15514', 'Paez', '15'),
('15516', 'Paipa', '15'),
('15518', 'Pajarito', '15'),
('15522', 'Panqueba', '15'),
('15531', 'Pauna', '15'),
('15533', 'Paya', '15'),
('15537', 'Paz de Rio', '15'),
('15542', 'Pesca', '15'),
('15550', 'Pisba', '15'),
('15572', 'Puerto Boyaca', '15'),
('15580', 'Quipama', '15'),
('15599', 'Ramiriqui', '15'),
('15600', 'Raquira', '15'),
('15621', 'Rondon', '15'),
('15632', 'Saboya', '15'),
('15638', 'Sachica', '15'),
('15646', 'Samaca', '15'),
('15660', 'San Eduardo', '15'),
('15664', 'San Jose de Pare', '15'),
('15667', 'San Luis de Gaceno', '15'),
('15673', 'San Mateo', '15'),
('15676', 'San Miguel de Sema', '15'),
('15681', 'San Pablo de Borbur', '15'),
('15686', 'Santana', '15'),
('15690', 'Santa Maria', '15'),
('15693', 'Santa Rosa de Viterbo', '15'),
('15696', 'Santa Sofia', '15'),
('15720', 'Sativanorte', '15'),
('15723', 'Sativasur', '15'),
('15740', 'Siachoque', '15'),
('15753', 'Soata', '15'),
('15755', 'Socota', '15'),
('15757', 'Socha', '15'),
('15759', 'Sogamoso', '15'),
('15761', 'Somondoco', '15'),
('15762', 'Sora', '15'),
('15763', 'Sotaquira', '15'),
('15764', 'Soraca', '15'),
('15774', 'Susacon', '15'),
('15776', 'Sutamarchan', '15'),
('15778', 'Sutatenza', '15'),
('15790', 'Tasco', '15'),
('15798', 'Tenza', '15'),
('15804', 'Tibana', '15'),
('15806', 'Tibasosa', '15'),
('15808', 'Tinjaca', '15'),
('15810', 'Tipacoque', '15'),
('15814', 'Toca', '15'),
('15816', 'Togui', '15'),
('15820', 'Topaga', '15'),
('15822', 'Tota', '15'),
('15832', 'Tunungua', '15'),
('15835', 'Turmeque', '15'),
('15837', 'Tuta', '15'),
('15839', 'Tutasa', '15'),
('15842', 'Umbita', '15'),
('15861', 'Ventaquemada', '15'),
('15879', 'Viracacha', '15'),
('15897', 'Zetaquira', '15'),
('17001', 'Manizales', '17'),
('17013', 'Aguadas', '17'),
('17042', 'Anserma', '17'),
('17050', 'Aranzazu', '17'),
('17088', 'Belalcazar', '17'),
('17174', 'Chinchina', '17'),
('17272', 'Filadelfia', '17'),
('17380', 'La Dorada', '17'),
('17388', 'La Merced', '17'),
('17433', 'Manzanares', '17'),
('17442', 'Marmato', '17'),
('17444', 'Marquetalia', '17'),
('17446', 'Marulanda', '17'),
('17486', 'Neira', '17'),
('17495', 'Norcasia', '17'),
('17513', 'Pacora', '17'),
('17524', 'Palestina', '17'),
('17541', 'Pensilvania', '17'),
('17614', 'Riosucio', '17'),
('17616', 'Risaralda', '17'),
('17653', 'Salamina', '17'),
('17662', 'Samana', '17'),
('17665', 'San Jose', '17'),
('17777', 'Supia', '17'),
('17867', 'La Victoria', '17'),
('17873', 'Villamaria', '17'),
('17877', 'Viterbo', '17'),
('18001', 'Florencia', '18'),
('18029', 'Albania', '18'),
('18094', 'Belen de los Andaquies', '18'),
('18150', 'Cartagena del Chaira', '18'),
('18205', 'Curillo', '18'),
('18247', 'El Doncello', '18'),
('18256', 'El Paujil', '18'),
('18410', 'La MontaÃ±ita', '18'),
('18460', 'Milan', '18'),
('18479', 'Morelia', '18'),
('18592', 'Puerto Rico', '18'),
('18610', 'San Jose de Fragua', '18'),
('18753', 'San Vicente del Caguan', '18'),
('18756', 'Solano', '18'),
('18785', 'Solita', '18'),
('18860', 'Valparaiso', '18'),
('19001', 'Popayan', '19'),
('19022', 'Almaguer', '19'),
('19050', 'Argelia', '19'),
('19075', 'Balboa', '19'),
('19100', 'Bolivar', '19'),
('19110', 'Buenos Aires', '19'),
('19130', 'Cajibio', '19'),
('19137', 'Caldono', '19'),
('19142', 'Caloto', '19'),
('19212', 'Corinto', '19'),
('19256', 'El Tambo', '19'),
('19290', 'Florencia', '19'),
('19300', 'Guachene', '19'),
('19318', 'Guapi', '19'),
('19355', 'Inza', '19'),
('19364', 'Jambalo', '19'),
('19392', 'La Sierra', '19'),
('19397', 'La Vega', '19'),
('19418', 'Lopez (Micay)', '19'),
('19450', 'Mercaderes', '19'),
('19455', 'Miranda', '19'),
('19473', 'Morales', '19'),
('19513', 'Padilla', '19'),
('19517', 'Paez (Belalcazar)', '19'),
('19532', 'Patia (El Bordo)', '19'),
('19533', 'Piamonte', '19'),
('19548', 'Piendamo', '19'),
('19573', 'Puerto Tejada', '19'),
('19585', 'Purace (Coconuco)', '19'),
('19622', 'Rosas', '19'),
('19693', 'San Sebastian', '19'),
('19698', 'Santander de Quilichao', '19'),
('19701', 'Santa Rosa', '19'),
('19743', 'Silvia', '19'),
('19760', 'Sotara (Paispamba)', '19'),
('19780', 'Suarez', '19'),
('19785', 'Sucre', '19'),
('19807', 'Timbio', '19'),
('19809', 'Timbiqui', '19'),
('19821', 'Toribio', '19'),
('19824', 'Totoro', '19'),
('19845', 'Villa Rica', '19'),
('20001', 'Valledupar', '20'),
('20011', 'Aguachica', '20'),
('20013', 'Agustin Codazzi', '20'),
('20032', 'Astrea', '20'),
('20045', 'Becerril', '20'),
('20060', 'Bosconia', '20'),
('20175', 'Chimichagua', '20'),
('20178', 'Chiriguana', '20'),
('20228', 'Curumani', '20'),
('20238', 'El Copey', '20'),
('20250', 'El Paso', '20'),
('20295', 'Gamarra', '20'),
('20310', 'Gonzalez', '20'),
('20383', 'La Gloria', '20'),
('20400', 'La Jagua de Ibirico', '20'),
('20443', 'Manaure Balcon del Cesar', '20'),
('20517', 'Pailitas', '20'),
('20550', 'Pelaya', '20'),
('20570', 'Pueblo Bello', '20'),
('20614', 'Rio de oro', '20'),
('20621', 'La Paz (Robles)', '20'),
('20710', 'San Alberto', '20'),
('20750', 'San Diego', '20'),
('20770', 'San Martin', '20'),
('20787', 'Tamalameque', '20'),
('23001', 'Monteria', '23'),
('23068', 'Ayapel', '23'),
('23079', 'Buenavista', '23'),
('23090', 'Canalete', '23'),
('23162', 'Cerete', '23'),
('23168', 'Chima', '23'),
('23182', 'Chinu', '23'),
('23189', 'Cienaga de Oro', '23'),
('23300', 'Cotorra', '23'),
('23350', 'La Apartada (Frontera)', '23'),
('23417', 'Lorica', '23'),
('23419', 'Los Cordobas', '23'),
('23464', 'Momil', '23'),
('23466', 'Montelibano', '23'),
('23500', 'MoÃ±itos', '23'),
('23555', 'Planeta Rica', '23'),
('23570', 'Pueblo Nuevo', '23'),
('23574', 'Puerto Escondido', '23'),
('23580', 'Puerto Libertador', '23'),
('23586', 'Purisima', '23'),
('23660', 'Sahagun', '23'),
('23670', 'San Andres Sotavento', '23'),
('23672', 'San Antero', '23'),
('23675', 'San Bernardo del Viento', '23'),
('23678', 'San Carlos', '23'),
('23682', 'San Jose de Ure', '23'),
('23686', 'San Pelayo', '23'),
('23807', 'Tierralta', '23'),
('23815', 'Tuchin', '23'),
('23855', 'Valencia', '23'),
('25001', 'Agua de Dios', '25'),
('25019', 'Alban', '25'),
('25035', 'Anapoima', '25'),
('25040', 'Anolaima', '25'),
('25053', 'Arbelaez', '25'),
('25086', 'Beltran', '25'),
('25095', 'Bituima', '25'),
('25099', 'Bojaca', '25'),
('25120', 'Cabrera', '25'),
('25123', 'Cachipay', '25'),
('25126', 'Cajica', '25'),
('25148', 'Caparrapi', '25'),
('25151', 'Caqueza', '25'),
('25154', 'Carmen de Carupa', '25'),
('25168', 'Chaguani', '25'),
('25175', 'Chia', '25'),
('25178', 'Chipaque', '25'),
('25181', 'Choachi', '25'),
('25183', 'Choconta', '25'),
('25200', 'Cogua', '25'),
('25214', 'Cota', '25'),
('25224', 'Cucunuba', '25'),
('25245', 'El Colegio', '25'),
('25258', 'El PeÃ±on', '25'),
('25260', 'El Rosal', '25'),
('25269', 'Facatativa', '25'),
('25279', 'Fomeque', '25'),
('25281', 'Fosca', '25'),
('25286', 'Funza', '25'),
('25288', 'Fuquene', '25'),
('25290', 'Fusagasuga', '25'),
('25293', 'Gachala', '25'),
('25295', 'Gachancipa', '25'),
('25297', 'Gacheta', '25'),
('25299', 'Gama', '25'),
('25307', 'Girardot', '25'),
('25312', 'Granada', '25'),
('25317', 'Guacheta', '25'),
('25320', 'Guaduas', '25'),
('25322', 'Guasca', '25'),
('25324', 'Guataqui', '25'),
('25326', 'Guatavita', '25'),
('25328', 'Guayabal de Siquima', '25'),
('25335', 'Guayabetal', '25'),
('25339', 'Gutierrez', '25'),
('25368', 'Jerusalen', '25'),
('25372', 'Junin', '25'),
('25377', 'La Calera', '25'),
('25386', 'La Mesa', '25'),
('25394', 'La Palma', '25'),
('25398', 'La PeÃ±a', '25'),
('25402', 'La Vega', '25'),
('25407', 'Lenguazaque', '25'),
('25426', 'Macheta', '25'),
('25430', 'Madrid', '25'),
('25436', 'Manta', '25'),
('25438', 'Medina', '25'),
('25473', 'Mosquera', '25'),
('25483', 'NariÃ±o', '25'),
('25486', 'Nemocon', '25'),
('25488', 'Nilo', '25'),
('25489', 'Nimaima', '25'),
('25491', 'Nocaima', '25'),
('25506', 'Venecia (Ospina Perez)', '25'),
('25513', 'Pacho', '25'),
('25518', 'Paime', '25'),
('25524', 'Pandi', '25'),
('25530', 'Paratebueno', '25'),
('25535', 'Pasca', '25'),
('25572', 'Puerto Salgar', '25'),
('25580', 'Puli', '25'),
('25592', 'Quebradanegra', '25'),
('25594', 'Quetame', '25'),
('25596', 'Quipile', '25'),
('25599', 'Apulo', '25'),
('25612', 'Ricaurte', '25'),
('25645', 'San Antonio de Tequendama', '25'),
('25649', 'San Bernardo', '25'),
('25653', 'San Cayetano', '25'),
('25658', 'San Francisco', '25'),
('25662', 'San Juan de Rio Seco', '25'),
('25718', 'Sasaima', '25'),
('25736', 'Sesquile', '25'),
('25740', 'Sibate', '25'),
('25743', 'Silvania', '25'),
('25745', 'Simijaca', '25'),
('25754', 'Soacha', '25'),
('25758', 'Sopo', '25'),
('25769', 'Subachoque', '25'),
('25772', 'Suesca', '25'),
('25777', 'Supata', '25'),
('25779', 'Susa', '25'),
('25781', 'Sutatausa', '25'),
('25785', 'Tabio', '25'),
('25793', 'Tausa', '25'),
('25797', 'Tena', '25'),
('25799', 'Tenjo', '25'),
('25805', 'Tibacuy', '25'),
('25807', 'Tibirita', '25'),
('25815', 'Tocaima', '25'),
('25817', 'Tocancipa', '25'),
('25823', 'Topaipi', '25'),
('25839', 'Ubala', '25'),
('25841', 'Ubaque', '25'),
('25843', 'Ubate', '25'),
('25845', 'Une', '25'),
('25851', 'Utica', '25'),
('25862', 'Vergara', '25'),
('25867', 'Viani', '25'),
('25871', 'Villagomez', '25'),
('25873', 'Villapinzon', '25'),
('25875', 'Villeta', '25'),
('25878', 'Viota', '25'),
('25885', 'Yacopi', '25'),
('25898', 'Zipacon', '25'),
('25899', 'Zipaquira', '25'),
('27001', 'Quibdo', '27'),
('27006', 'Acandi', '27'),
('27025', 'Alto Baudo (Pie de Pato)', '27'),
('27050', 'Atrato (Yuto)', '27'),
('27073', 'Bagado', '27'),
('27075', 'Bahia Solano (Mutis)', '27'),
('27077', 'Bajo Baudo (Pizarro)', '27'),
('27099', 'Bojaya (Bellavista)', '27'),
('27135', 'Canton de San Pablo', '27'),
('27150', 'Carmen del Darien', '27'),
('27160', 'Certegui', '27'),
('27205', 'Condoto', '27'),
('27245', 'El Carmen de Atrato', '27'),
('27250', 'El Litoral de San Juan', '27'),
('27361', 'Istmina', '27'),
('27372', 'Jurado', '27'),
('27413', 'Lloro', '27'),
('27425', 'Medio Atrato', '27'),
('27430', 'Medio Baudo', '27'),
('27450', 'Medio San Juan', '27'),
('27491', 'Novita', '27'),
('27495', 'Nuqui', '27'),
('27580', 'Rio Iro', '27'),
('27600', 'Rio Quito', '27'),
('27615', 'Riosucio', '27'),
('27660', 'San Jose del Palmar', '27'),
('27745', 'Sipi', '27'),
('27787', 'Tado', '27'),
('27800', 'Unguia', '27'),
('27810', 'Union Panamericana', '27'),
('41001', 'Neiva', '41'),
('41006', 'Acevedo', '41'),
('41013', 'Agrado', '41'),
('41016', 'Aipe', '41'),
('41020', 'Algeciras', '41'),
('41026', 'Altamira', '41'),
('41078', 'Baraya', '41'),
('41132', 'Campoalegre', '41'),
('41206', 'Colombia', '41'),
('41244', 'Elias', '41'),
('41298', 'Garzon', '41'),
('41306', 'Gigante', '41'),
('41319', 'Guadalupe', '41'),
('41349', 'Hobo', '41'),
('41357', 'Iquira', '41'),
('41359', 'Isnos', '41'),
('41378', 'La Argentina', '41'),
('41396', 'La Plata', '41'),
('41483', 'Nataga', '41'),
('41503', 'Oporapa', '41'),
('41518', 'Paicol', '41'),
('41524', 'Palermo', '41'),
('41530', 'Palestina', '41'),
('41548', 'Pital', '41'),
('41551', 'Pitalito', '41'),
('41615', 'Rivera', '41'),
('41660', 'Saladoblanco', '41'),
('41668', 'San Agustin', '41'),
('41676', 'Santa Maria', '41'),
('41770', 'Suaza', '41'),
('41791', 'Tarqui', '41'),
('41797', 'Tesalia', '41'),
('41799', 'Tello', '41'),
('41801', 'Teruel', '41'),
('41807', 'Timana', '41'),
('41872', 'Villavieja', '41'),
('41885', 'Yaguara', '41'),
('44001', 'Riohacha', '44'),
('44035', 'Albania', '44'),
('44078', 'Barrancas', '44'),
('44090', 'Dibulla', '44'),
('44098', 'Distraccion', '44'),
('44110', 'El Molino', '44'),
('44279', 'Fonseca', '44'),
('44378', 'Hatonuevo', '44'),
('44420', 'La Jagua del Pilar', '44'),
('44430', 'Maicao', '44'),
('44560', 'Manaure', '44'),
('44650', 'San Juan del Cesar', '44'),
('44847', 'Uribia', '44'),
('44855', 'Urumita', '44'),
('44874', 'Villanueva', '44'),
('47001', 'Santa Marta', '47'),
('47030', 'Algarrobo', '47'),
('47053', 'Aracataca', '47'),
('47058', 'Ariguani (El Dificil)', '47'),
('47161', 'Cerro San Antonio', '47'),
('47170', 'Chivolo', '47'),
('47189', 'Cienaga', '47'),
('47205', 'Concordia', '47'),
('47245', 'El Banco', '47'),
('47258', 'El PiÃ±on', '47'),
('47268', 'El Reten', '47'),
('47288', 'Fundacion', '47'),
('47318', 'Guamal', '47'),
('47460', 'Nueva Granada', '47'),
('47541', 'Pedraza', '47'),
('47545', 'PijiÃ±o del Carmen', '47'),
('47551', 'Pivijay', '47'),
('47555', 'Plato', '47'),
('47570', 'Puebloviejo', '47'),
('47605', 'Remolino', '47'),
('47660', 'Sabanas de San Angel', '47'),
('47675', 'Salamina', '47'),
('47692', 'San Sebastian de Buenavista', '47'),
('47703', 'San Zenon', '47'),
('47707', 'Santa Ana', '47'),
('47720', 'Santa Barbara de Pinto', '47'),
('47745', 'Sitionuevo', '47'),
('47798', 'Tenerife', '47'),
('47960', 'Zapayan', '47'),
('47980', 'Zona Bananera', '47'),
('50001', 'Villavicencio', '50'),
('50006', 'Acacias', '50'),
('50110', 'Barranca de Upia', '50'),
('50124', 'Cabuyaro', '50'),
('50150', 'Castilla la Nueva', '50'),
('50223', 'Cubarral', '50'),
('50226', 'Cumaral', '50'),
('50245', 'El Calvario', '50'),
('50251', 'El Castillo', '50'),
('50270', 'El Dorado', '50'),
('50287', 'Fuente de Oro', '50'),
('50313', 'Granada', '50'),
('50318', 'Guamal', '50'),
('50325', 'Mapiripan', '50'),
('50330', 'Mesetas', '50'),
('50350', 'La Macarena', '50'),
('50370', 'La Uribe', '50'),
('50400', 'Lejanias', '50'),
('50450', 'Puerto Concordia', '50'),
('50568', 'Puerto Gaitan', '50'),
('50573', 'Puerto Lopez', '50'),
('50577', 'Puerto Lleras', '50'),
('50590', 'Puerto Rico', '50'),
('50606', 'Restrepo', '50'),
('50680', 'San Carlos de Guaroa', '50'),
('50683', 'San Juan de Arama', '50'),
('50686', 'San Juanito', '50'),
('50689', 'San Martin', '50'),
('50711', 'Vista Hermosa', '50'),
('52001', 'San Juan de Pasto', '52'),
('52019', 'Alban (San Jose)', '52'),
('52022', 'Aldana', '52'),
('52036', 'Ancuya', '52'),
('52051', 'Arboleda (Berruecos)', '52'),
('52079', 'Barbacoas', '52'),
('52083', 'Belen', '52'),
('52110', 'Buesaco', '52'),
('52203', 'Colon (Genova)', '52'),
('52207', 'Consaca', '52'),
('52210', 'Contadero', '52'),
('52215', 'Cordoba', '52'),
('52224', 'Cuaspud (Carlosama)', '52'),
('52227', 'Cumbal', '52'),
('52233', 'Cumbitara', '52'),
('52240', 'Chachagui', '52'),
('52250', 'El Charco', '52'),
('52254', 'El PeÃ±ol', '52'),
('52256', 'El Rosario', '52'),
('52258', 'El Tablon de Gomez', '52'),
('52260', 'El Tambo', '52'),
('52287', 'Funes', '52'),
('52317', 'Guachucal', '52'),
('52320', 'Guaitarilla', '52'),
('52323', 'Gualmatan', '52'),
('52352', 'Iles', '52'),
('52354', 'Imues', '52'),
('52356', 'Ipiales', '52'),
('52378', 'La Cruz', '52'),
('52381', 'La Florida', '52'),
('52385', 'La Llanada', '52'),
('52390', 'La Tola', '52'),
('52399', 'La Union', '52'),
('52405', 'Leiva', '52'),
('52411', 'Linares', '52'),
('52418', 'Los Andes (Sotomayor)', '52'),
('52427', 'MagÃ¼i (Payan)', '52'),
('52435', 'Mallama (Piedrancha)', '52'),
('52473', 'Mosquera', '52'),
('52480', 'NariÃ±o', '52'),
('52490', 'Olaya Herrera', '52'),
('52506', 'Ospina', '52'),
('52520', 'Francisco Pizarro', '52'),
('52540', 'Policarpa', '52'),
('52560', 'Potosi', '52'),
('52565', 'Providencia', '52'),
('52573', 'Puerres', '52'),
('52585', 'Pupiales', '52'),
('52612', 'Ricaurte', '52'),
('52621', 'Roberto Payan (San Jose)', '52'),
('52678', 'Samaniego', '52'),
('52683', 'Sandona', '52'),
('52685', 'San Bernardo', '52'),
('52687', 'San Lorenzo', '52'),
('52693', 'San Pablo', '52'),
('52694', 'San Pedro de Cartago', '52'),
('52696', 'Santa Barbara (Iscuande)', '52'),
('52699', 'Santacruz (Guachavez)', '52'),
('52720', 'Sapuyes', '52'),
('52786', 'Taminango', '52'),
('52788', 'Tangua', '52'),
('52835', 'Tumaco', '52'),
('52838', 'Tuquerres', '52'),
('52885', 'Yacuanquer', '52'),
('54001', 'Cucuta', '54'),
('54003', 'Abrego', '54'),
('54051', 'Arboledas', '54'),
('54099', 'Bochalema', '54'),
('54109', 'Bucarasica', '54'),
('54125', 'Cacota', '54'),
('54128', 'Cachira', '54'),
('54172', 'Chinacota', '54'),
('54174', 'Chitaga', '54'),
('54206', 'Convencion', '54'),
('54223', 'Cucutilla', '54'),
('54239', 'Durania', '54'),
('54245', 'El Carmen', '54'),
('54250', 'El Tarra', '54'),
('54261', 'El Zulia', '54'),
('54313', 'Gramalote', '54'),
('54344', 'Hacari', '54'),
('54347', 'Herran', '54'),
('54377', 'Labateca', '54'),
('54385', 'La Esperanza', '54'),
('54398', 'La Playa', '54'),
('54405', 'Los Patios', '54'),
('54418', 'Lourdes', '54'),
('54480', 'Mutiscua', '54'),
('54498', 'OcaÃ±a', '54'),
('54518', 'Pamplona', '54'),
('54520', 'Pamplonita', '54'),
('54553', 'Puerto Santander', '54'),
('54599', 'Ragonvalia', '54'),
('54660', 'Salazar', '54'),
('54670', 'San Calixto', '54'),
('54673', 'San Cayetano', '54'),
('54680', 'Santiago', '54'),
('54720', 'Sardinata', '54'),
('54743', 'Silos', '54'),
('54800', 'Teorama', '54'),
('54810', 'Tibu', '54'),
('54820', 'Toledo', '54'),
('54871', 'Villa Caro', '54'),
('54874', 'Villa del Rosario', '54'),
('63001', 'Armenia', '63'),
('63111', 'Buenavista', '63'),
('63130', 'Calarca', '63'),
('63190', 'Circasia', '63'),
('63212', 'Cordoba', '63'),
('63272', 'Filandia', '63'),
('63302', 'Genova', '63'),
('63401', 'La Tebaida', '63'),
('63470', 'Montenegro', '63'),
('63548', 'Pijao', '63'),
('63594', 'Quimbaya', '63'),
('63690', 'Salento', '63'),
('66001', 'Pereira', '66'),
('66045', 'Apia', '66'),
('66075', 'Balboa', '66'),
('66088', 'Belen de Umbria', '66'),
('66170', 'Dos Quebradas', '66'),
('66318', 'Guatica', '66'),
('66383', 'La Celia', '66'),
('66400', 'La Virginia', '66'),
('66440', 'Marsella', '66'),
('66456', 'Mistrato', '66'),
('66572', 'Pueblo Rico', '66'),
('66594', 'Quinchia', '66'),
('66682', 'Santa Rosa de Cabal', '66'),
('66687', 'Santuario', '66'),
('68001', 'Bucaramanga', '68'),
('68013', 'Aguada', '68'),
('68020', 'Albania', '68'),
('68051', 'Aratoca', '68'),
('68077', 'Barbosa', '68'),
('68079', 'Barichara', '68'),
('68081', 'Barrancabermeja', '68'),
('68092', 'Betulia', '68'),
('68101', 'Bolivar', '68'),
('68121', 'Cabrera', '68'),
('68132', 'California', '68'),
('68147', 'Capitanejo', '68'),
('68152', 'Carcasi', '68'),
('68160', 'Cepita', '68'),
('68162', 'Cerrito', '68'),
('68167', 'Charala', '68'),
('68169', 'Charta', '68'),
('68176', 'Chima', '68'),
('68179', 'Chipata', '68'),
('68190', 'Cimitarra', '68'),
('68207', 'Concepcion', '68'),
('68209', 'Confines', '68'),
('68211', 'Contratacion', '68'),
('68217', 'Coromoro', '68'),
('68229', 'Curiti', '68'),
('68235', 'El Carmen', '68'),
('68245', 'El Guacamayo', '68'),
('68250', 'El PeÃ±on', '68'),
('68255', 'El Playon', '68'),
('68264', 'Encino', '68'),
('68266', 'Enciso', '68'),
('68271', 'Florian', '68'),
('68276', 'Floridablanca', '68'),
('68296', 'Galan', '68'),
('68298', 'Gambita', '68'),
('68307', 'Giron', '68'),
('68318', 'Guaca', '68'),
('68320', 'Guadalupe', '68'),
('68322', 'Guapota', '68'),
('68324', 'Guavata', '68'),
('68327', 'Guepsa', '68'),
('68344', 'Hato', '68'),
('68368', 'Jesus Maria', '68'),
('68370', 'Jordan', '68'),
('68377', 'La Belleza', '68'),
('68385', 'Landazuri', '68'),
('68397', 'La Paz', '68'),
('68406', 'Lebrija', '68'),
('68418', 'Los Santos', '68'),
('68425', 'Macaravita', '68'),
('68432', 'Malaga', '68'),
('68444', 'Matanza', '68'),
('68464', 'Mogotes', '68'),
('68468', 'Molagavita', '68'),
('68498', 'Ocamonte', '68'),
('68500', 'Oiba', '68'),
('68502', 'Onzaga', '68'),
('68522', 'Palmar', '68'),
('68524', 'Palmas del Socorro', '68'),
('68533', 'Paramo', '68'),
('68547', 'Pie de Cuesta', '68'),
('68549', 'Pinchote', '68'),
('68572', 'Puente Nacional', '68'),
('68573', 'Puerto Parra', '68'),
('68575', 'Puerto Wilches', '68'),
('68615', 'Rio Negro', '68'),
('68655', 'Sabana de Torres', '68'),
('68669', 'San Andres', '68'),
('68673', 'San Benito', '68'),
('68679', 'San Gil', '68'),
('68682', 'San Joaquin', '68'),
('68684', 'San Miguel', '68'),
('68686', 'San Jose de Miranda', '68'),
('68689', 'San Vicente del Chucuri', '68'),
('68705', 'Santa Barbara', '68'),
('68720', 'Santa Helena del Opon', '68'),
('68745', 'Simacota', '68'),
('68755', 'Socorro', '68'),
('68770', 'Suaita', '68'),
('68773', 'Sucre', '68'),
('68780', 'Surata', '68'),
('68820', 'Tona', '68'),
('68855', 'Valle de San Jose', '68'),
('68861', 'Velez', '68'),
('68867', 'Vetas', '68'),
('68872', 'Villanueva', '68'),
('68895', 'Zapatoca', '68'),
('70001', 'Sincelejo', '70'),
('70110', 'Buenavista', '70'),
('70124', 'Caimito', '70'),
('70204', 'Coloso (Ricaurte)', '70'),
('70215', 'Corozal', '70'),
('70221', 'CoveÃ±as', '70'),
('70230', 'Chalan', '70'),
('70233', 'El Roble', '70'),
('70235', 'Galeras (Nueva Granada)', '70'),
('70265', 'Guaranda', '70'),
('70400', 'La Union', '70'),
('70418', 'Los Palmitos', '70'),
('70429', 'Majagual', '70'),
('70473', 'Morroa', '70'),
('70508', 'Ovejas', '70'),
('70523', 'Palmito', '70'),
('70670', 'Sampues', '70'),
('70678', 'San Benito Abad', '70'),
('70702', 'San Juan de Betulia', '70'),
('70708', 'San Marcos', '70'),
('70713', 'San Onofre', '70'),
('70717', 'San Pedro', '70'),
('70742', 'Since', '70'),
('70771', 'Sucre', '70'),
('70820', 'Tolu', '70'),
('70823', 'Tolu Viejo', '70'),
('73001', 'Ibague', '73'),
('73024', 'Alpujarra', '73'),
('73026', 'Alvarado', '73'),
('73030', 'Ambalema', '73'),
('73043', 'Anzoategui', '73'),
('73055', 'Armero (Guayabal)', '73'),
('73067', 'Ataco', '73'),
('73124', 'Cajamarca', '73'),
('73148', 'Carmen de Apicala', '73'),
('73152', 'Casabianca', '73'),
('73168', 'Chaparral', '73'),
('73200', 'Coello', '73'),
('73217', 'Coyaima', '73'),
('73226', 'Cunday', '73'),
('73236', 'Dolores', '73'),
('73268', 'Espinal', '73'),
('73270', 'Falan', '73'),
('73275', 'Flandes', '73'),
('73283', 'Fresno', '73'),
('73319', 'Guamo', '73'),
('73347', 'Herveo', '73'),
('73349', 'Honda', '73'),
('73352', 'Icononzo', '73'),
('73408', 'Lerida', '73'),
('73411', 'Libano', '73'),
('73443', 'Mariquita', '73'),
('73449', 'Melgar', '73'),
('73461', 'Murillo', '73'),
('73483', 'Natagaima', '73'),
('73504', 'Ortega', '73'),
('73520', 'Palocabildo', '73'),
('73547', 'Piedras', '73'),
('73555', 'Planadas', '73'),
('73563', 'Prado', '73'),
('73585', 'Purificacion', '73'),
('73616', 'Rioblanco', '73'),
('73622', 'Roncesvalles', '73'),
('73624', 'Rovira', '73'),
('73671', 'SaldaÃ±a', '73'),
('73675', 'San Antonio', '73'),
('73678', 'San Luis', '73'),
('73686', 'Santa Isabel', '73'),
('73770', 'Suarez', '73'),
('73854', 'Valle de San Juan', '73'),
('73861', 'Venadillo', '73'),
('73870', 'Villahermosa', '73'),
('73873', 'Villarrica', '73'),
('73999', '*Ibague', '73'),
('76001', 'Cali', '76'),
('76020', 'Alcala', '76'),
('76036', 'Andalucia', '76'),
('76041', 'Ansermanuevo', '76'),
('76054', 'Argelia', '76'),
('76100', 'Bolivar', '76'),
('76109', 'Buenaventura', '76'),
('76111', 'Buga', '76'),
('76113', 'Bugalagrande', '76'),
('76122', 'Caicedonia', '76'),
('76126', 'Calima (Darien)', '76'),
('76130', 'Candelaria', '76'),
('76147', 'Cartago', '76'),
('76233', 'Dagua', '76'),
('76243', 'El Aguila', '76'),
('76246', 'El Cairo', '76'),
('76248', 'El Cerrito', '76'),
('76250', 'El Dovio', '76'),
('76275', 'Florida', '76'),
('76306', 'Ginebra', '76'),
('76318', 'Guacari', '76'),
('76364', 'Jamundi', '76'),
('76377', 'La Cumbre', '76'),
('76400', 'La Union', '76'),
('76403', 'La Victoria', '76'),
('76497', 'Obando', '76'),
('76520', 'Palmira', '76'),
('76563', 'Pradera', '76'),
('76606', 'Restrepo', '76'),
('76616', 'Riofrio', '76'),
('76622', 'Roldanillo', '76'),
('76670', 'San Pedro', '76'),
('76736', 'Sevilla', '76'),
('76823', 'Toro', '76'),
('76828', 'Trujillo', '76'),
('76834', 'Tulua', '76'),
('76845', 'Ulloa', '76'),
('76863', 'Versalles', '76'),
('76869', 'Vijes', '76'),
('76890', 'Yotoco', '76'),
('76892', 'Yumbo', '76'),
('76895', 'Zarzal', '76'),
('81001', 'Arauca', '81'),
('81065', 'Arauquita', '81'),
('81220', 'Cravo Norte', '81'),
('81300', 'Fortul', '81'),
('81591', 'Puerto Rondon', '81'),
('81736', 'Saravena', '81'),
('81794', 'Tame', '81'),
('85001', 'Yopal', '85'),
('85010', 'Aguazul', '85'),
('85015', 'Chameza', '85'),
('85125', 'Hato Corozal', '85'),
('85136', 'La Salina', '85'),
('85139', 'Mani', '85'),
('85162', 'Monterrey', '85'),
('85225', 'Nunchia', '85'),
('85230', 'Orocue', '85'),
('85250', 'Paz de Ariporo', '85'),
('85263', 'Pore', '85'),
('85279', 'Recetor', '85'),
('85300', 'Sabanalarga', '85'),
('85315', 'Sacama', '85'),
('85325', 'San Luis de Palenque', '85'),
('85400', 'Tamara', '85'),
('85410', 'Tauramena', '85'),
('85430', 'Trinidad', '85'),
('85440', 'Villanueva', '85'),
('86001', 'Mocoa', '86'),
('86219', 'Colon', '86'),
('86320', 'Orito', '86'),
('86568', 'Puerto Asis', '86'),
('86569', 'Puerto Caicedo', '86'),
('86571', 'Puerto Guzman', '86'),
('86573', 'Puerto Leguizamo', '86'),
('86749', 'Sibundoy', '86'),
('86755', 'San Francisco', '86'),
('86757', 'San Miguel', '86'),
('86760', 'Santiago', '86'),
('86865', 'Valle del Guamuez (La Hormiga)', '86'),
('86885', 'Villa Garzon', '86'),
('88001', 'San Andres', '88'),
('88564', 'Providencia', '88'),
('91001', 'Leticia', '91'),
('91263', 'El Encanto', '91'),
('91405', 'La Chorrera', '91'),
('91407', 'La Pedrera', '91'),
('91430', 'La Victoria', '91'),
('91460', 'Miriti - Parana', '91'),
('91530', 'Puerto Alegria', '91'),
('91536', 'Puerto Arica', '91'),
('91540', 'Puerto NariÃ±o', '91'),
('91669', 'Puerto Santander', '91'),
('91798', 'Tarapaca', '91'),
('94001', 'Inirida', '94'),
('94343', 'Barranco Minas', '94'),
('94663', 'Mapiripana', '94'),
('94883', 'San Felipe', '94'),
('94884', 'Puerto Colombia', '94'),
('94885', 'La Guadalupe', '94'),
('94886', 'Cacahual', '94'),
('94887', 'Pana Pana', '94'),
('94888', 'Morichal', '94'),
('95001', 'San Jose del Guaviare', '95'),
('95015', 'Calamar', '95'),
('95025', 'El Retorno', '95'),
('95200', 'Miraflores', '95'),
('97001', 'Mitu', '97'),
('97161', 'Caruru', '97'),
('97511', 'Pacoa', '97'),
('97666', 'Taraira', '97'),
('97777', 'Papunaua', '97'),
('97889', 'Yavarate', '97'),
('99001', 'Puerto CarreÃ±o', '99'),
('99524', 'La Primavera', '99'),
('99624', 'Santa Rosalia', '99'),
('99773', 'Cumaribo', '99'),
('99999', 'No aplica', '99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `nombre_usuarios` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_usuarios` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_usuarios` bigint(16) DEFAULT NULL,
  `movil_usuarios` bigint(16) NOT NULL,
  `email_usuarios` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion_usuarios` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen_usuarios` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `password_usuarios` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_usuarios` tinyint(1) NOT NULL,
  `id_idioma` tinyint(4) NOT NULL,
  `id_moneda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `tipo_usuario`, `nombre_usuarios`, `apellido_usuarios`, `telefono_usuarios`, `movil_usuarios`, `email_usuarios`, `direccion_usuarios`, `imagen_usuarios`, `id_ciudad`, `password_usuarios`, `estado_usuarios`, `id_idioma`, `id_moneda`) VALUES
(1, 1, 'Nikollai', 'Hernandez', 3218335089, 3218335089, 'nikollaihernandez@gmail.com', 'Avenida Centenario Carrera 45 #56-90 ', '', 63001, 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0),
(2, 2, 'Daniel ', 'Hernandez', 3218335089, 3218335089, 'daniel@gmail.com', 'Avenida Centenario Carrera 45 #56-90 ', '', 17001, 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0),
(6, 2, 'Niko', 'Hernandez', NULL, 0, 'niko@gmail.com', 'Avenida Centenario Carrera 45 #56-90 ', '', 0, '202cb962ac59075b964b07152d234b70', 1, 1, 0),
(7, 2, 'Ana maria', 'Padilla', 0, 55555, 'anamaria@gmail.com', 'Centro', '', 81001, 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0),
(8, 2, 'Nikollai', 'Hernandez', NULL, 0, 'nikollaihernandezgamus@gmail.com', '', '', 0, 'b6bef09c518cace5eeeecd79d06bf3d6', 1, 1, 0),
(9, 2, 'Cristian', 'Torres', NULL, 0, 'cristian@gmail.com', '', '', 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_like`
--

CREATE TABLE `usuario_like` (
  `id_usuario_like` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `tipo_like` enum('Actividad','Destino') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario_like`
--

INSERT INTO `usuario_like` (`id_usuario_like`, `id_usuario`, `id_articulo`, `tipo_like`) VALUES
(23, 2, 1, 'Destino'),
(27, 2, 2, 'Destino'),
(28, 2, 4, 'Actividad'),
(29, 2, 3, 'Destino'),
(31, 2, 2, 'Actividad'),
(32, 2, 1, 'Actividad'),
(33, 7, 2, 'Actividad'),
(34, 9, 1, 'Actividad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividades`),
  ADD KEY `actividad_galeria_idx` (`id_galeria`);

--
-- Indices de la tabla `actividad_lenguaje`
--
ALTER TABLE `actividad_lenguaje`
  ADD KEY `lenguaje_actividad_idx` (`id_actividad`),
  ADD KEY `actividad_lenguaje_idx` (`id_lenguaje`);

--
-- Indices de la tabla `actividad_vista`
--
ALTER TABLE `actividad_vista`
  ADD KEY `vista_usuario_idx` (`id_usuario`),
  ADD KEY `vista_actividad_idx` (`id_actividad`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD KEY `calificacion_usuario_idx` (`id_usuario`),
  ADD KEY `calificacion_actividad_idx` (`id_actividad`);

--
-- Indices de la tabla `comentarios_actividad`
--
ALTER TABLE `comentarios_actividad`
  ADD PRIMARY KEY (`id_comentarios_actividad`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id_contenidos`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destinos`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id_galerias`);

--
-- Indices de la tabla `galeria_archivos`
--
ALTER TABLE `galeria_archivos`
  ADD PRIMARY KEY (`id_galeria_archivos`),
  ADD KEY `archivo_galeria_idx` (`id_galerias`);

--
-- Indices de la tabla `lenguaje`
--
ALTER TABLE `lenguaje`
  ADD PRIMARY KEY (`id_lenguaje`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD PRIMARY KEY (`id_orden_articulo`);

--
-- Indices de la tabla `planes_actividad`
--
ALTER TABLE `planes_actividad`
  ADD PRIMARY KEY (`id_planes_actividad`),
  ADD KEY `plan_actividad_idx` (`id_actividad`),
  ADD KEY `plan_lenguaje_idx` (`id_lenguaje`);

--
-- Indices de la tabla `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id_suscripcion`),
  ADD UNIQUE KEY `email_suscripcion` (`email_suscripcion`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id_testimonio`);

--
-- Indices de la tabla `ubicacion_departamentos`
--
ALTER TABLE `ubicacion_departamentos`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `PAI_PK` (`PAI_PK`);

--
-- Indices de la tabla `ubicacion_municipios`
--
ALTER TABLE `ubicacion_municipios`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- Indices de la tabla `usuario_like`
--
ALTER TABLE `usuario_like`
  ADD PRIMARY KEY (`id_usuario_like`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `comentarios_actividad`
--
ALTER TABLE `comentarios_actividad`
  MODIFY `id_comentarios_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id_contenidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destinos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id_galerias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `galeria_archivos`
--
ALTER TABLE `galeria_archivos`
  MODIFY `id_galeria_archivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `lenguaje`
--
ALTER TABLE `lenguaje`
  MODIFY `id_lenguaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  MODIFY `id_orden_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `planes_actividad`
--
ALTER TABLE `planes_actividad`
  MODIFY `id_planes_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `slides`
--
ALTER TABLE `slides`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuario_like`
--
ALTER TABLE `usuario_like`
  MODIFY `id_usuario_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividad_galeria` FOREIGN KEY (`id_galeria`) REFERENCES `galerias` (`id_galerias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `actividad_lenguaje`
--
ALTER TABLE `actividad_lenguaje`
  ADD CONSTRAINT `actividad_lenguaje` FOREIGN KEY (`id_lenguaje`) REFERENCES `lenguaje` (`id_lenguaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lenguaje_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividades`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `actividad_vista`
--
ALTER TABLE `actividad_vista`
  ADD CONSTRAINT `vista_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vista_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `calificacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_archivos`
--
ALTER TABLE `galeria_archivos`
  ADD CONSTRAINT `archivo_galeria` FOREIGN KEY (`id_galerias`) REFERENCES `galerias` (`id_galerias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `planes_actividad`
--
ALTER TABLE `planes_actividad`
  ADD CONSTRAINT `plan_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plan_lenguaje` FOREIGN KEY (`id_lenguaje`) REFERENCES `lenguaje` (`id_lenguaje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
