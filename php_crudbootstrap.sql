-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2018 a las 22:46:04
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `php_crudbootstrap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
`idEmp` int(11) NOT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Telefono` text,
  `Carrera` varchar(100) DEFAULT NULL,
  `Pais` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tabla Empleados';

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmp`, `Nombres`, `Apellidos`, `Telefono`, `Carrera`, `Pais`) VALUES
(1, 'Luis', 'Morales', '784521589', 'Modelamiento', 'Mexico'),
(2, 'Katrina', 'Cespedes', '215489653', 'Psicologia', 'Panama'),
(3, 'Antonio', 'Castelino', '025412569', 'Administracion', 'Adminsitrador '),
(4, 'German', 'Molina', '745845214', 'Ing. Sistemas', 'Argentina'),
(6, 'Marcial', 'Cancares', '545678903', 'Ing. Produccion', 'Colombia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`idEmp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
MODIFY `idEmp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
