/*
SQLyog Ultimate v9.02 
MySQL - 5.5.27 : Database - cruzroja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cruzroja` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cruzroja`;

/*Table structure for table `ambulancia` */

DROP TABLE IF EXISTS `ambulancia`;

CREATE TABLE `ambulancia` (
  `Placa` char(6) NOT NULL,
  `Marca` char(15) DEFAULT NULL,
  `Modelo` char(15) DEFAULT NULL,
  `Año` int(2) DEFAULT NULL,
  `Kilometraje` int(15) NOT NULL,
  PRIMARY KEY (`Placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ambulancia` */

insert  into `ambulancia`(`Placa`,`Marca`,`Modelo`,`Año`,`Kilometraje`) values ('CR-41','Mitsubishi',NULL,76,10001),('CR-77','Ford',NULL,95,985607);

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `IdAsistencia` int(5) NOT NULL AUTO_INCREMENT,
  `Carnet` char(6) NOT NULL,
  `BrigadaTurno` char(10) DEFAULT NULL,
  `HorasLaboradas` decimal(10,0) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdAsistencia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `asistencia` */

insert  into `asistencia`(`IdAsistencia`,`Carnet`,`BrigadaTurno`,`HorasLaboradas`,`Fecha`) values (1,'4452-3','Brigada 2','6','0000-00-00'),(2,'4425-3','Brigada 3','6','0000-00-00');

/*Table structure for table `casos` */

DROP TABLE IF EXISTS `casos`;

CREATE TABLE `casos` (
  `IdCasos` int(3) NOT NULL AUTO_INCREMENT,
  `NombreCaso` varchar(15) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCasos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `casos` */

insert  into `casos`(`IdCasos`,`NombreCaso`,`Descripcion`) values (1,'Fractura',NULL),(2,'Quemadura',NULL),(3,'Parto','5 Monos');

/*Table structure for table `conceptocuenta` */

DROP TABLE IF EXISTS `conceptocuenta`;

CREATE TABLE `conceptocuenta` (
  `CtaContable` int(20) NOT NULL,
  `concepto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CtaContable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `conceptocuenta` */

insert  into `conceptocuenta`(`CtaContable`,`concepto`) values (777,'Pago de Luz'),(999,'Iniciador');

/*Table structure for table `contabilidad` */

DROP TABLE IF EXISTS `contabilidad`;

CREATE TABLE `contabilidad` (
  `IdContabilidad` int(5) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `CtaContable` int(20) DEFAULT NULL,
  `NoDocumento` decimal(10,0) DEFAULT NULL,
  `Ingresos` double DEFAULT NULL,
  `Egresos` double DEFAULT NULL,
  `Saldo` double DEFAULT NULL,
  PRIMARY KEY (`IdContabilidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `contabilidad` */

insert  into `contabilidad`(`IdContabilidad`,`Fecha`,`CtaContable`,`NoDocumento`,`Ingresos`,`Egresos`,`Saldo`) values (1,'2014-01-01',999,'9092',0,0,2000),(2,'2014-03-27',777,'1001',0,6,1994);

/*Table structure for table `curacionlocal` */

DROP TABLE IF EXISTS `curacionlocal`;

CREATE TABLE `curacionlocal` (
  `IdCuracionLocal` int(4) NOT NULL AUTO_INCREMENT,
  `Caso` int(3) DEFAULT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Socorrista` char(6) NOT NULL,
  PRIMARY KEY (`IdCuracionLocal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `curacionlocal` */

insert  into `curacionlocal`(`IdCuracionLocal`,`Caso`,`Diagnostico`,`Edad`,`Socorrista`) values (1,3,'No aguanto',36,'Pedro');

/*Table structure for table `donativo` */

DROP TABLE IF EXISTS `donativo`;

CREATE TABLE `donativo` (
  `IdDonativo` int(5) NOT NULL AUTO_INCREMENT,
  `Donante` varchar(50) NOT NULL,
  `Cantidad` double NOT NULL,
  `DUI` char(10) DEFAULT NULL,
  `NIT` char(10) DEFAULT NULL,
  `FechaDonativo` date DEFAULT NULL,
  `Direccion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdDonativo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `donativo` */

insert  into `donativo`(`IdDonativo`,`Donante`,`Cantidad`,`DUI`,`NIT`,`FechaDonativo`,`Direccion`) values (1,'Juan Luna',23.5,'1123445-2','1234455-1','0000-00-00','Ciudad Arce');

/*Table structure for table `personal` */

DROP TABLE IF EXISTS `personal`;

CREATE TABLE `personal` (
  `Carnet` char(6) NOT NULL,
  `Nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Brigada` varchar(30) NOT NULL,
  `Activo` int(1) NOT NULL,
  PRIMARY KEY (`Carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personal` */

insert  into `personal`(`Carnet`,`Nombres`,`Apellidos`,`Cargo`,`Brigada`,`Activo`) values ('1111-1','Alvaro Manuel','Garciaguirre','Motorista','Brigada 1',1),('2222-2','Eduardo','Cisneros','Socorrista','Brigada 2',1),('3333-3','Pedro','Arevalo','Socorrista','Brigada 1',1),('4452-3','Jorge Luis','Mendoza','Socorrista','Brigada 2',1);

/*Table structure for table `servicioambulancia` */

DROP TABLE IF EXISTS `servicioambulancia`;

CREATE TABLE `servicioambulancia` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `servicioambulancia` */

insert  into `servicioambulancia`(`IdServicioAmbulancia`,`Solicitante`,`NombrePaciente`,`NombreAcompañante`,`Caso`,`Diagnostico`,`LugarServicio`,`Motorista`,`Socorrista1`,`Socorrista2`,`Hospital`,`HoraSalida`,`Horallegada`,`Donativo`,`Ambulancia`) values (1,'Juan Lopez','Luis Gonzalez','Juan Lopez',1,'Fractura de tibia','Cancha munucipal','1111-1','2222-2','3333-3','Hospital Nacional de Ciud','04:00:00','06:00:00',23.5,'cr-77');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
