-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2014 a las 14:58:41
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cruzroja`
--
CREATE DATABASE IF NOT EXISTS `cruzroja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cruzroja`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(120) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `nombre`, `user`, `pass`) VALUES
(1, 'Pedro Joaquin arevalo lopez', 'peterpan', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'lucas Arturo valle mejia', 'lucas', 'dc53fc4f621c80bdc2fa0329a6123708'),
(12, 'josue david Arevalo', 'josue', '172522ec1028ab781d9dfd17eaca4427');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambulancia`
--

CREATE TABLE IF NOT EXISTS `ambulancia` (
  `idAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `Placa` char(6) NOT NULL,
  `Marca` char(15) DEFAULT NULL,
  `Modelo` char(15) DEFAULT NULL,
  `Anio` int(2) DEFAULT NULL,
  `Kilometraje` int(15) NOT NULL,
  PRIMARY KEY (`idAmbulancia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `IdAsistencia` int(5) NOT NULL AUTO_INCREMENT,
  `Carnet` char(6) NOT NULL,
  `BrigadaTurno` char(10) DEFAULT NULL,
  `HorasLaboradas` decimal(10,0) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdAsistencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`IdAsistencia`, `Carnet`, `BrigadaTurno`, `HorasLaboradas`, `Fecha`) VALUES
(1, '4452-3', 'Brigada 2', '6', '0000-00-00'),
(2, '4425-3', 'Brigada 3', '6', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE IF NOT EXISTS `casos` (
  `IdCasos` int(3) NOT NULL AUTO_INCREMENT,
  `NombreCaso` varchar(15) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCasos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`IdCasos`, `NombreCaso`, `Descripcion`) VALUES
(1, 'Fractura', NULL),
(2, 'Quemadura', NULL),
(3, 'Parto', '5 Monos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptocuenta`
--

CREATE TABLE IF NOT EXISTS `conceptocuenta` (
  `CtaContable` int(20) NOT NULL,
  `concepto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CtaContable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conceptocuenta`
--

INSERT INTO `conceptocuenta` (`CtaContable`, `concepto`) VALUES
(777, 'Pago de Luz'),
(999, 'Iniciador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE IF NOT EXISTS `contabilidad` (
  `IdContabilidad` int(5) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `CtaContable` int(20) DEFAULT NULL,
  `NoDocumento` decimal(10,0) DEFAULT NULL,
  `Ingresos` double DEFAULT NULL,
  `Egresos` double DEFAULT NULL,
  `Saldo` double DEFAULT NULL,
  PRIMARY KEY (`IdContabilidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `contabilidad`
--

INSERT INTO `contabilidad` (`IdContabilidad`, `Fecha`, `CtaContable`, `NoDocumento`, `Ingresos`, `Egresos`, `Saldo`) VALUES
(1, '2014-01-01', 999, '9092', 0, 0, 2000),
(2, '2014-03-27', 777, '1001', 0, 6, 1994);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curacionlocal`
--

CREATE TABLE IF NOT EXISTS `curacionlocal` (
  `IdCuracionLocal` int(4) NOT NULL AUTO_INCREMENT,
  `Caso` int(3) DEFAULT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Socorrista` char(6) NOT NULL,
  PRIMARY KEY (`IdCuracionLocal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `curacionlocal`
--

INSERT INTO `curacionlocal` (`IdCuracionLocal`, `Caso`, `Diagnostico`, `Edad`, `Socorrista`) VALUES
(1, 3, 'No aguanto', 36, 'Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo`
--

CREATE TABLE IF NOT EXISTS `donativo` (
  `IdDonativo` int(5) NOT NULL AUTO_INCREMENT,
  `Donante` varchar(50) NOT NULL,
  `Cantidad` double NOT NULL,
  `DUI` char(10) DEFAULT NULL,
  `NIT` char(10) DEFAULT NULL,
  `FechaDonativo` date DEFAULT NULL,
  `Direccion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdDonativo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `donativo`
--

INSERT INTO `donativo` (`IdDonativo`, `Donante`, `Cantidad`, `DUI`, `NIT`, `FechaDonativo`, `Direccion`) VALUES
(1, 'Juan Luna', 23.5, '1123445-2', '1234455-1', '0000-00-00', 'Ciudad Arce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `Carnet` char(6) NOT NULL,
  `Nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Brigada` varchar(30) NOT NULL,
  `Activo` int(1) NOT NULL,
  PRIMARY KEY (`Carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Carnet`, `Nombres`, `Apellidos`, `Cargo`, `Brigada`, `Activo`) VALUES
('1111-1', 'Alvaro Manuel', 'Garciaguirre', 'Motorista', 'Brigada 1', 1),
('2222-2', 'Eduardo', 'Cisneros', 'Socorrista', 'Brigada 2', 1),
('3333-3', 'Pedro', 'Arevalo', 'Socorrista', 'Brigada 1', 1),
('4452-3', 'Jorge Luis', 'Mendoza', 'Socorrista', 'Brigada 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicioambulancia`
--

CREATE TABLE IF NOT EXISTS `servicioambulancia` (
  `IdServicioAmbulancia` int(4) NOT NULL AUTO_INCREMENT,
  `Solicitante` varchar(50) DEFAULT NULL,
  `NombrePaciente` varchar(50) NOT NULL,
  `NombreAcompañante` varchar(50) DEFAULT NULL,
  `Caso` int(2) NOT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `LugarServicio` varchar(25) DEFAULT NULL,
  `Motorista` char(6) NOT NULL,
  `Socorrista1` char(6) NOT NULL,
  `Socorrista2` char(6) NOT NULL,
  `Hospital` varchar(50) DEFAULT NULL,
  `HoraSalida` time DEFAULT NULL,
  `Horallegada` time DEFAULT NULL,
  `Donativo` double DEFAULT NULL,
  `Ambulancia` char(6) NOT NULL,
  PRIMARY KEY (`IdServicioAmbulancia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `servicioambulancia`
--

INSERT INTO `servicioambulancia` (`IdServicioAmbulancia`, `Solicitante`, `NombrePaciente`, `NombreAcompañante`, `Caso`, `Diagnostico`, `LugarServicio`, `Motorista`, `Socorrista1`, `Socorrista2`, `Hospital`, `HoraSalida`, `Horallegada`, `Donativo`, `Ambulancia`) VALUES
(1, 'Juan Lopez', 'Luis Gonzalez', 'Juan Lopez', 1, 'Fractura de tibia', 'Cancha munucipal', '1111-1', '2222-2', '3333-3', 'Hospital Nacional de Ciud', '04:00:00', '06:00:00', 23.5, 'cr-77');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
