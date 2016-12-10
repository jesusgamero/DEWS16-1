-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2016 a las 01:43:24
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
  `estado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fcreacion` date DEFAULT NULL,
  `fcomunicacion` date DEFAULT NULL,
  `psico_encar` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `candidato` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_candidato` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idoferta`, `descripcion`, `persona_contacto`, `tlf_contacto`, `email_contacto`, `dir_empresa`, `poblacion`, `cp`, `provincia`, `estado`, `fcreacion`, `fcomunicacion`, `psico_encar`, `candidato`, `des_candidato`) VALUES
(1, 'Comercial Santa Lucia', 'Juan Antonio Ojeda', 959567893, 'juano@gmail.com', 'Avenida Campos de Montiel 6  ', 'Huelva', '21007', '21', 'P', '2016-11-22', '2017-01-10', '12', '', ''),
(2, 'Conductor de autobuses Damas S.A', 'Antonio Pascual', 959782314, 'antopas@outlook.com', 'Ricardo Caro 9  ', 'Huelva', '21005', '21', 'S', '2016-11-29', '2017-01-24', '12', 'Alfonso González', 'Experiencia anterior en Leda, y tres años en Socibus.'),
(3, 'Teleoperadora', 'Ana Pérez', 956313234, 'anap@gmail.com', 'Calle Ramón y cajal 8  ', 'Fuenlabrada', '34569', '28', 'C', '2016-11-29', '2016-12-12', '12', 'Lucía Nuñez Pérez', 'Chica con buena voz y capacidad de comunicación, trabajó dos años en movistar.'),
(4, 'Camarera Bar "Manolo"', 'Ceciclia Conde', 954221345, 'cecicon@icloud.com', 'Calle Pomar 12', 'Sevilla', '41005', '1', 'C', '2016-11-29', '2016-12-20', '12', 'Cristina Cortés', 'Chica responsable y con experiencia.'),
(5, 'Jefe de cocina', 'Antonio Méndez', 955211133, 'antoniomendez@hotmail.com', 'Calle Luis Montoro ', 'Mairena del Aljarafe', '41004', '1', 'S', '2016-11-29', '2017-01-15', '12', 'Miguel López', 'Experiencia en el Bully.'),
(6, 'Comercial con experiencia', 'Pedro Ortega Martínez', 926785141, 'pedroortega@outlook.com', '', 'La Coruña', '34125', '1', 'P', '2016-11-29', '2017-02-22', '12', '', ''),
(7, 'Recepcionista Hotel Zaida', 'Janire Pascual', 954678899, 'janipr@outlook.com', 'Calle Simón Pérez 23', 'Sevilla', '41004', '41', 'P', '2016-11-29', '2017-03-23', '12', '', ''),
(8, 'Comercial sector eléctrico', 'David López', 634849388, 'davidlo@gmail.com', 'Calle Morería 3B', 'Jerez de los Caballeros', '06380', '1', 'P', '2016-11-29', '2017-01-21', '12', '', ''),
(9, 'Mecánico de automoción.', 'Ángel Luís Galindo', 927342134, 'angellgal@hotmail.com', 'Calle Lugo 21', 'Cáceres', '06780', '10', 'R', '2016-11-29', '2017-01-10', '13', '', ''),
(10, 'Programador de Moodle', 'Noelia Pérez Gil', 622364866, 'noeliaperez@gmail.com', 'Calla Antonio Machado 5', 'Badajoz', '06300', '1', 'P', '2016-12-01', '2017-02-21', '12', '', '');

--
-- Disparadores `oferta`
--

CREATE TRIGGER `oferta_BEFORE_INSERT` BEFORE INSERT ON `oferta` FOR EACH ROW SET NEW.fcreacion = CURDATE();

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `cod_provincia` int(2) NOT NULL DEFAULT '0' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(2, 'A', 'Santiago Domínguez', 'santiago', 'santiago'),
(3, 'P', 'Moises Marquez', 'psico', 'psico'),
(4, 'P', 'Antonio José Carcela', 'antonio', 'antonio'),
(5, 'A', 'Carlos Ojeda Pichardo', 'carlos', 'carlos'),
(6, 'P', 'Cristobal Asensio', 'cristobal', 'cristobal'),
(7, 'A', 'Juan Antonio Nuñez', 'juan', 'juan'),
(8, 'P', 'Alfonso Gallardo', 'alfonso', 'alfonso'),
(9, 'A', 'Cristina Borrachero', 'cristina', 'cristina'),
(10, 'A', 'Ana Pérez', 'ana', 'ana'),
(11, 'P', 'Jesús González Pacheco', 'jesus', 'jesus'),
(12, 'P', 'Marta Méndez', 'marta', 'marta'),
(13, 'A', 'Sara Hernández', 'sara', 'sara'),
(14, 'A', 'Pedro Rivera', 'pedro', 'pedro');

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
  MODIFY `idoferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
