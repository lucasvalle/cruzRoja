-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2014 a las 11:17:06
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `nombre`, `user`, `pass`) VALUES
(1, 'admin', 'admin', 'bdc8341bb7c06ca3a3e9ab7d39ecb789');

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
  `Carnet` char(7) NOT NULL,
  `BrigadaTurno` char(10) DEFAULT NULL,
  `HorasLaboradas` decimal(10,0) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdAsistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE IF NOT EXISTS `casos` (
  `IdCasos` int(3) NOT NULL AUTO_INCREMENT,
  `NombreCaso` varchar(25) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCasos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptocuenta`
--

CREATE TABLE IF NOT EXISTS `conceptocuenta` (
  `idCta` int(11) NOT NULL AUTO_INCREMENT,
  `CtaContable` int(20) NOT NULL,
  `concepto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idCta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `conceptocuenta`
--

INSERT INTO `conceptocuenta` (`idCta`, `CtaContable`, `concepto`) VALUES
(1, 589744, 'Donaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE IF NOT EXISTS `contabilidad` (
  `IdContabilidad` int(5) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `CtaContable` int(20) DEFAULT NULL,
  `nDocumento` int(11) DEFAULT NULL,
  `Ingresos` double DEFAULT NULL,
  `Egresos` double DEFAULT NULL,
  PRIMARY KEY (`IdContabilidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curacionlocal`
--

CREATE TABLE IF NOT EXISTS `curacionlocal` (
  `IdCuracionLocal` int(4) NOT NULL AUTO_INCREMENT,
  `Caso` int(3) DEFAULT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Socorrista` char(6) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdCuracionLocal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo`
--

CREATE TABLE IF NOT EXISTS `donativo` (
  `IdDonativo` int(5) NOT NULL AUTO_INCREMENT,
  `nDocumento` int(11) NOT NULL,
  `Donante` varchar(50) NOT NULL,
  `Cantidad` double NOT NULL,
  `DUI` char(10) DEFAULT NULL,
  `NIT` char(20) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdDonativo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Carnet` char(9) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Brigada` varchar(30) NOT NULL,
  `Activo` int(1) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicioambulancia`
--

CREATE TABLE IF NOT EXISTS `servicioambulancia` (
  `IdServicioAmbulancia` int(4) NOT NULL AUTO_INCREMENT,
  `Solicitante` varchar(50) DEFAULT NULL,
  `NombrePaciente` varchar(50) NOT NULL,
  `NombreAcompanante` varchar(50) DEFAULT NULL,
  `Caso` int(2) NOT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `LugarServicio` varchar(25) DEFAULT NULL,
  `Motorista` char(6) NOT NULL,
  `Socorrista1` char(6) NOT NULL,
  `Socorrista2` char(6) NOT NULL,
  `Hospital` varchar(50) DEFAULT NULL,
  `HoraSalida` time DEFAULT NULL,
  `Horallegada` time DEFAULT NULL,
  `Ambulancia` char(6) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdServicioAmbulancia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


GRANT select, insert, update, delete
ON cruzroja.*
TO cruser@localhost identified by 'admin2014';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
