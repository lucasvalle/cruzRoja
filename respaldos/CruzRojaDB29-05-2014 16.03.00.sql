DROP DATABASE `cruzroja`;CREATE DATABASE IF NOT EXISTS `cruzroja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
         USE `cruzroja`;DROP TABLE administradores;

CREATE TABLE `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(120) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO administradores VALUES("1","admin","admin","bdc8341bb7c06ca3a3e9ab7d39ecb789");
INSERT INTO administradores VALUES("15","Alvaro Garciaguirre","manuel93","98db6b79acb71383b5a83e0bbc1cadd4");



DROP TABLE ambulancia;

CREATE TABLE `ambulancia` (
  `idAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `Placa` char(6) NOT NULL,
  `Marca` char(15) DEFAULT NULL,
  `Modelo` char(15) DEFAULT NULL,
  `Anio` int(2) DEFAULT NULL,
  `Kilometraje` int(15) NOT NULL,
  PRIMARY KEY (`idAmbulancia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO ambulancia VALUES("1","CR 77","Chevrolet","Astro","1993","567921");
INSERT INTO ambulancia VALUES("2","CR 125","MAZDA","A","2013","123451");
INSERT INTO ambulancia VALUES("3","CR 56","NISSAN","UVA","2014","1200");



DROP TABLE asistencia;

CREATE TABLE `asistencia` (
  `IdAsistencia` int(5) NOT NULL AUTO_INCREMENT,
  `Carnet` char(7) NOT NULL,
  `BrigadaTurno` char(10) DEFAULT NULL,
  `HorasLaboradas` decimal(10,0) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdAsistencia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO asistencia VALUES("1","423-45","Brigada 1","10","2014-05-24");
INSERT INTO asistencia VALUES("2","423-32","Brigada 1","12","2014-05-19");
INSERT INTO asistencia VALUES("3","423-45","Brigada 1","4","2014-05-20");
INSERT INTO asistencia VALUES("4","423-32","Brigada 2","12","2014-05-27");
INSERT INTO asistencia VALUES("5","423-54","Brigada 1","10","2014-05-27");
INSERT INTO asistencia VALUES("6","423-001","Brigada 4","30","2014-05-25");
INSERT INTO asistencia VALUES("7","423-45","Brigada 1","40","2014-05-27");



DROP TABLE casos;

CREATE TABLE `casos` (
  `IdCasos` int(3) NOT NULL AUTO_INCREMENT,
  `NombreCaso` varchar(25) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCasos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO casos VALUES("1","01","Fractura");
INSERT INTO casos VALUES("2","02","Embarazo");
INSERT INTO casos VALUES("3","03","Quemadura");
INSERT INTO casos VALUES("4","04","Traumatismo");
INSERT INTO casos VALUES("5","05","INFARTOS");



DROP TABLE conceptocuenta;

CREATE TABLE `conceptocuenta` (
  `idCta` int(11) NOT NULL AUTO_INCREMENT,
  `CtaContable` int(20) NOT NULL,
  `concepto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idCta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO conceptocuenta VALUES("1","589744","Donaciones");
INSERT INTO conceptocuenta VALUES("4","5412","Compra de combustible");
INSERT INTO conceptocuenta VALUES("5","5413","Pago de télefono");
INSERT INTO conceptocuenta VALUES("6","5414","Pago de agua potable");
INSERT INTO conceptocuenta VALUES("7","5415","Pago de energía eléctrica ");
INSERT INTO conceptocuenta VALUES("8","5416","Pago de servicios de seguridad");
INSERT INTO conceptocuenta VALUES("9","2147483647","Impuestos ");
INSERT INTO conceptocuenta VALUES("10","2147483647","Impuestos 2");



DROP TABLE contabilidad;

CREATE TABLE `contabilidad` (
  `IdContabilidad` int(5) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `CtaContable` int(20) DEFAULT NULL,
  `nDocumento` int(11) DEFAULT NULL,
  `Ingresos` double DEFAULT NULL,
  `Egresos` double DEFAULT NULL,
  PRIMARY KEY (`IdContabilidad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO contabilidad VALUES("1","2014-04-24","1","1540","40","0");
INSERT INTO contabilidad VALUES("2","2014-05-10","1","1541","100","0");
INSERT INTO contabilidad VALUES("3","2014-05-21","1","1542","50","0");
INSERT INTO contabilidad VALUES("4","2014-05-21","1","1543","15","0");
INSERT INTO contabilidad VALUES("5","2014-05-21","5","9931244","0","13");
INSERT INTO contabilidad VALUES("6","2014-05-14","7","52312","0","20.58");
INSERT INTO contabilidad VALUES("7","2014-04-24","4","40012","0","25");
INSERT INTO contabilidad VALUES("8","2014-05-21","1","1549","10","0");
INSERT INTO contabilidad VALUES("9","2014-05-26","1","232323","1000000","0");
INSERT INTO contabilidad VALUES("10","2014-05-22","1","1599","100","0");
INSERT INTO contabilidad VALUES("11","2014-04-23","1","1345","30","0");
INSERT INTO contabilidad VALUES("12","2014-05-27","4","138989","0","50");
INSERT INTO contabilidad VALUES("13","2014-05-27","4","8787","0","87");



DROP TABLE curacionlocal;

CREATE TABLE `curacionlocal` (
  `IdCuracionLocal` int(4) NOT NULL AUTO_INCREMENT,
  `Caso` int(3) DEFAULT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Socorrista` char(6) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdCuracionLocal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO curacionlocal VALUES("1","3","Quemadura en la mano derecha","Felipa Juarez","35","423-45","2014-05-21");
INSERT INTO curacionlocal VALUES("2","3","Se quemo la mano","Carlos Joral","99","423-54","2014-05-26");



DROP TABLE donativo;

CREATE TABLE `donativo` (
  `IdDonativo` int(5) NOT NULL AUTO_INCREMENT,
  `nDocumento` int(11) NOT NULL,
  `Donante` varchar(50) NOT NULL,
  `Cantidad` double NOT NULL,
  `DUI` char(10) DEFAULT NULL,
  `NIT` char(20) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdDonativo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO donativo VALUES("1","1540","Julio Moran","40","12345678-1","4321-654321-123-1","2014-04-24");
INSERT INTO donativo VALUES("2","1541","Jorge Mendoza","100","98765432-1","4321-654321-123-1","2014-05-10");
INSERT INTO donativo VALUES("3","1542","Luis Mora","50","12345656-1","","2014-05-21");
INSERT INTO donativo VALUES("4","1543","Omar Alarcón","15","12345678-9","","2014-05-21");
INSERT INTO donativo VALUES("5","1549","Delmi Cuellar","10","43219876-3","","2014-05-21");
INSERT INTO donativo VALUES("6","232323","Jorge Alfredo Nose","1000000","","","2014-05-26");
INSERT INTO donativo VALUES("7","1599","Jorge Juarez","100","12345678-9","","2014-05-22");
INSERT INTO donativo VALUES("8","1345","Luis Gonzalez","30","98765432-0","1234-432165-123-4","2014-04-23");



DROP TABLE personal;

CREATE TABLE `personal` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Carnet` char(9) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Brigada` varchar(30) NOT NULL,
  `Activo` int(1) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO personal VALUES("1","423-45","Jorge Mendoza","Socorrista","Brigada 1","1");
INSERT INTO personal VALUES("2","423-32","Alvaro Garciaguirre","Motorista","Brigada 1","1");
INSERT INTO personal VALUES("3","423-54","Juan Luna","Socorrista","Brigada 1","1");
INSERT INTO personal VALUES("4","423-43","Eduardo Cortez","Sub Jefe de Brigada","Brigada 1","1");
INSERT INTO personal VALUES("5","423-001","Pedrito Mendoza","Socorrista","Brigada 1","0");



DROP TABLE servicioambulancia;

CREATE TABLE `servicioambulancia` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO servicioambulancia VALUES("1","911","Lucas Arturo Vale Mejía","Delmi Cuellar","1","Fractura en el hombro derecho","","2","1","3","Hospital Nacional Francisco Menéndez","04:15:00","05:03:00","1","2014-05-21");
INSERT INTO servicioambulancia VALUES("2","911","Luis Mendoza","Hector Mendoza","4","TCE por caída de arbol","","2","3","1","Unida de Salud Ahuachapán","03:00:00","03:50:00","1","2014-05-16");
INSERT INTO servicioambulancia VALUES("3","911","Maria Auxiliadora","Jorge Perez","2","Embarazo gravedad 2","","2","3","1","Hospital Nacional Francisco Menéndez","01:20:00","03:00:00","1","2014-05-01");
INSERT INTO servicioambulancia VALUES("4","911","Carlos Mendoza","Mama de Jorge","1","Fractura en dedo chiquito de la mano izq.","","2","3","5","Unidad de Salud Santa Ana","20:00:00","09:00:00","2","2014-05-26");



