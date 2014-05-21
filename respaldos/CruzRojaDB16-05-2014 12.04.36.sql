DROP TABLE administradores;

CREATE TABLE `administradores` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(120) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO administradores VALUES("1","Pedro Joaquin arevalo lopez","peterpan","e10adc3949ba59abbe56e057f20f883e");
INSERT INTO administradores VALUES("11","lucas Arturo valle mejia","lucas","dc53fc4f621c80bdc2fa0329a6123708");
INSERT INTO administradores VALUES("12","josue david Arevalo","josue","172522ec1028ab781d9dfd17eaca4427");



DROP TABLE ambulancia;

CREATE TABLE `ambulancia` (
  `idAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `Placa` char(6) NOT NULL,
  `Marca` char(15) DEFAULT NULL,
  `Modelo` char(15) DEFAULT NULL,
  `Anio` int(2) DEFAULT NULL,
  `Kilometraje` int(15) NOT NULL,
  PRIMARY KEY (`idAmbulancia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO ambulancia VALUES("2","P01548","Toyota","Hlllux","2014","150");



DROP TABLE asistencia;

CREATE TABLE `asistencia` (
  `IdAsistencia` int(5) NOT NULL AUTO_INCREMENT,
  `Carnet` char(7) NOT NULL,
  `BrigadaTurno` char(10) DEFAULT NULL,
  `HorasLaboradas` decimal(10,0) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdAsistencia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO asistencia VALUES("3","423-878","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("4","423-88","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("5","423-25","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("6","423-25","Brigada 1","8","2014-05-13");
INSERT INTO asistencia VALUES("7","423-258","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("8","423-258","Brigada 1","5","2014-05-16");



DROP TABLE casos;

CREATE TABLE `casos` (
  `IdCasos` int(3) NOT NULL AUTO_INCREMENT,
  `NombreCaso` varchar(15) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCasos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO casos VALUES("1","Fractura","");
INSERT INTO casos VALUES("2","Quemadura","");
INSERT INTO casos VALUES("3","Parto","5 Monos");



DROP TABLE conceptocuenta;

CREATE TABLE `conceptocuenta` (
  `idCta` int(11) NOT NULL AUTO_INCREMENT,
  `CtaContable` int(20) NOT NULL,
  `concepto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idCta`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO conceptocuenta VALUES("13","130","nombre modificado");
INSERT INTO conceptocuenta VALUES("14","15","pago de recibo de agua");
INSERT INTO conceptocuenta VALUES("15","178","Pago de Luz");
INSERT INTO conceptocuenta VALUES("16","12548","Donaciones");
INSERT INTO conceptocuenta VALUES("17","325","compra de insumos");



DROP TABLE contabilidad;

CREATE TABLE `contabilidad` (
  `IdContabilidad` int(5) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `CtaContable` int(20) DEFAULT NULL,
  `nDocumento` int(11) DEFAULT NULL,
  `Ingresos` double DEFAULT NULL,
  `Egresos` double DEFAULT NULL,
  PRIMARY KEY (`IdContabilidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO contabilidad VALUES("1","2014-05-16","16","12548","150","0");
INSERT INTO contabilidad VALUES("2","2014-05-16","15","1254","","10");



DROP TABLE curacionlocal;

CREATE TABLE `curacionlocal` (
  `IdCuracionLocal` int(4) NOT NULL AUTO_INCREMENT,
  `Caso` int(3) DEFAULT NULL,
  `Diagnostico` varchar(100) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Socorrista` char(6) NOT NULL,
  PRIMARY KEY (`IdCuracionLocal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO curacionlocal VALUES("1","3","No aguanto","36","Pedro");



DROP TABLE donativo;

CREATE TABLE `donativo` (
  `IdDonativo` int(5) NOT NULL AUTO_INCREMENT,
  `nDocumento` int(11) NOT NULL,
  `Donante` varchar(50) NOT NULL,
  `Cantidad` double NOT NULL,
  `DUI` char(10) DEFAULT NULL,
  `NIT` char(10) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdDonativo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO donativo VALUES("1","12548","peter arevalo","150","","","2014-05-16");



DROP TABLE personal;

CREATE TABLE `personal` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Carnet` char(9) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Brigada` varchar(30) NOT NULL,
  `Activo` int(1) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO personal VALUES("23","423-258","Peter Arevalo","Socorrista","Brigada 1","1");
INSERT INTO personal VALUES("24","423-25","Lucas Arturo Valle Mejia","Motorista","Brigada 4","1");



DROP TABLE servicioambulancia;

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

INSERT INTO servicioambulancia VALUES("1","Juan Lopez","Luis Gonzalez","Juan Lopez","1","Fractura de tibia","Cancha munucipal","1111-1","2222-2","3333-3","Hospital Nacional de Ciud","04:00:00","06:00:00","23.5","cr-77");



