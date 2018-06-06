-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-06-2018 a las 02:38:44
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deldia`
--

DROP TABLE IF EXISTS `deldia`;
CREATE TABLE IF NOT EXISTS `deldia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `nombreimagen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `deldia`
--

INSERT INTO `deldia` (`id`, `dia`, `nombre`, `descripcion`, `precio`, `nombreimagen`) VALUES
(1, 'lunes', 'Plato 1', 'El plato 1 contiene estos ingredientes', 11000, '1.jpg'),
(2, 'martes', 'Plato 2', 'El plato 2 contiene estos ingredientes', 12000, '2.jpg'),
(3, 'miercoles', 'Plato 3', 'El plato 3 contiene estos ingredientes', 13000, '3.jpg'),
(4, 'jueves', 'Plato 4', 'El plato 4 contiene estos ingredientes', 14000, '4.jpg'),
(5, 'viernes', 'Plato 5', 'El plato 5 contiene estos ingredientes', 15000, '5.jpg'),
(6, 'sabado', 'Plato 6', 'El plato 6 contiene estos ingredientes', 16000, '6.jpg'),
(7, 'domingo', 'Plato 7', 'El plato 7 contiene estos ingredientes', 17000, '7.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
