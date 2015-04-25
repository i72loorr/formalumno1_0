-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2015 a las 18:41:41
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `abmdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `APELLIDOS` varchar(45) DEFAULT NULL,
  `SEG. SOCIAL` varchar(14) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `FECHANACIMIENTO` date DEFAULT NULL,
  `EMPRESA_CIF` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`DNI`, `NOMBRE`, `APELLIDOS`, `SEG. SOCIAL`, `TELEFONO`, `EMAIL`, `FECHANACIMIENTO`, `EMPRESA_CIF`) VALUES
('12233445T', 'Manuel', 'Ortiguilla Ruiz', 'AN123232532', '672993388', 'mortigui@gmail.com', '1995-12-03', 'B73622563'),
('12345678Z', 'Alberto', 'Martos Consuegra', 'AN27717263502', '621445643', 'albertitomartos@hotmail.com', '1983-03-12', 'B23352135'),
('21222324H', 'Pilar', 'Luque Barrera', 'AN36292036', '628672354', 'pilaricaluque@gmail.com', '1994-08-21', 'B73622563'),
('34628945G', 'Maria', 'Lopez Zuñiga', 'AN1124123243', '683503701', 'mlzunyiga@hotmail.com', '1996-05-21', 'B23352135'),
('41563258T', 'Lola', 'Mï¿½rquez Sigï¿½enza', 'AN12312312421', '653291873', 'lolamsi@gmail.com', '2001-04-21', 'B23352135');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `CIF` varchar(9) NOT NULL,
  `RAZON_SOCIAL` varchar(45) DEFAULT NULL,
  `DOMICILIO` varchar(45) DEFAULT NULL,
  `CIUDAD` varchar(45) DEFAULT NULL,
  `PROVINCIA` varchar(45) DEFAULT NULL,
  `TELEFONO` varchar(45) DEFAULT NULL,
  `EMAIL` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`CIF`, `RAZON_SOCIAL`, `DOMICILIO`, `CIUDAD`, `PROVINCIA`, `TELEFONO`, `EMAIL`) VALUES
('B23352135', 'Bodegas Arcanoid e Hijos', 'C/ Flautista de Halloween, 21', 'Montilla', 'Córdoba', '957651234', 'info@bodegasarcanoid.com'),
('B73622563', 'Alcantarillados Trujillo', 'C/ Trujillo Grande, 4', 'Montilla', 'Córdoba', '957654321', 'contacto@alctrujillo.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`DNI`,`EMPRESA_CIF`), ADD KEY `fk_ALUMNO_EMPRESA1_idx` (`EMPRESA_CIF`), ADD KEY `EMPRESA_CIF` (`EMPRESA_CIF`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`CIF`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `fk_ALUMNO_EMPRESA1` FOREIGN KEY (`EMPRESA_CIF`) REFERENCES `empresa` (`CIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
