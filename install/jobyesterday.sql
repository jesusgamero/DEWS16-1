-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2016 a las 20:30:03
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jobyesterday`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `idoferta` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `persona_contacto` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `tlf_contacto` int(9) NOT NULL,
  `email_contacto` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `dir_empresa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `poblacion` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `provincia` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `fcreacion` date DEFAULT NULL,
  `fcomunicacion` date DEFAULT NULL,
  `psico_encar` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `candidato` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_candidato` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Disparadores `oferta`
--
DELIMITER $$
CREATE TRIGGER `oferta_BEFORE_INSERT` BEFORE INSERT ON `oferta` FOR EACH ROW SET NEW.fcreacion = CURDATE()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `cod_provincia` int(2) NOT NULL DEFAULT '0' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`cod_provincia`, `nombre`) VALUES
(1, 'Alava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almera'),
(33, 'Asturias'),
(5, 'Avila'),
(6, 'Badajoz'),
(7, 'Balears (Illes)'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(39, 'Cantabria'),
(12, 'Castellón'),
(51, 'Ceuta'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'Coruña (A)'),
(16, 'Cuenca'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(20, 'Guipzcoa'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(25, 'Lleida'),
(27, 'Lugo'),
(28, 'Madrid'),
(29, 'Málaga'),
(52, 'Melilla'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(34, 'Palencia'),
(35, 'Palmas (Las)'),
(36, 'Pontevedra'),
(26, 'Rioja (La)'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia'),
(47, 'Valladolid'),
(48, 'Vizcaya'),
(49, 'Zamora'),
(50, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod`, `tipo`, `nombre`, `user`, `pass`) VALUES
(1, 'A', 'Jesús Gamero Méndez', 'admin', 'admin'),
(2, 'P', 'Juan Pérez Ruíz', 'juanpr', 'juanpr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`idoferta`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`cod_provincia`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `idoferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
