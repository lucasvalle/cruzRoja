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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO ambulancia VALUES("2","P01548","Toyota","Hlllux","2014","150");
INSERT INTO ambulancia VALUES("3","P12548","camioneta","funebre","2014","150");



DROP TABLE asistencia;

CREATE TABLE `asistencia` (
  `IdAsistencia` int(5) NOT NULL AUTO_INCREMENT,
  `Carnet` char(7) NOT NULL,
  `BrigadaTurno` char(10) DEFAULT NULL,
  `HorasLaboradas` decimal(10,0) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdAsistencia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO asistencia VALUES("3","423-878","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("4","423-88","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("5","423-25","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("6","423-25","Brigada 1","8","2014-05-13");
INSERT INTO asistencia VALUES("7","423-258","Brigada 4","5","2014-05-14");
INSERT INTO asistencia VALUES("8","423-258","Brigada 1","5","2014-05-16");
INSERT INTO asistencia VALUES("9","423-000","Brigada 2","5","2014-05-16");
INSERT INTO asistencia VALUES("10","423-25","Brigada 4","5","2014-05-17");



DROP TABLE casos;

CREATE TABLE `casos` (
  `IdCasos` int(3) NOT NULL AUTO_INCREMENT,
  `NombreCaso` varchar(15) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCasos`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO casos VALUES("11","desmayos","nada que hacer");
INSERT INTO casos VALUES("12","torcedura","nada");
INSERT INTO casos VALUES("13","Embarazo","a punto de parir");
INSERT INTO casos VALUES("14","Hemorragia Nasa","abundante sangrado de la nariz");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO contabilidad VALUES("1","2014-05-16","16","12548","150","0");
INSERT INTO contabilidad VALUES("2","2014-05-16","15","1254","","10");
INSERT INTO contabilidad VALUES("4","2014-05-16","17","1288","0","15");
INSERT INTO contabilidad VALUES("5","2014-05-16","17","7898","0","30");
INSERT INTO contabilidad VALUES("6","2014-05-16","13","145896","0","95");
INSERT INTO contabilidad VALUES("7","2014-05-16","16","7995","15","0");
INSERT INTO contabilidad VALUES("8","2014-05-16","17","155482","0","15");
INSERT INTO contabilidad VALUES("9","2014-04-04","16","2584","200","0");
INSERT INTO contabilidad VALUES("10","2014-03-15","16","89","15","0");
INSERT INTO contabilidad VALUES("11","2014-02-28","16","325","95.8","0");
INSERT INTO contabilidad VALUES("12","2014-01-30","16","89325","300","0");
INSERT INTO contabilidad VALUES("13","2014-04-04","17","587","0","80");
INSERT INTO contabilidad VALUES("14","2014-05-17","16","789654","5","0");
INSERT INTO contabilidad VALUES("15","2014-05-17","16","8852","15","0");
INSERT INTO contabilidad VALUES("16","2014-05-17","16","12547","15","0");
INSERT INTO contabilidad VALUES("17","2014-05-18","16","2084","20","0");
INSERT INTO contabilidad VALUES("18","2014-05-21","15","251478","0","150");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO curacionlocal VALUES("1","3","No aguanto","","36","Pedro","0000-00-00");
INSERT INTO curacionlocal VALUES("2","12","se golpeo con un ladrillo","lucas valle","29","","0000-00-00");
INSERT INTO curacionlocal VALUES("3","11","klajslkdj alskdjal sdflajsd ","lucas valle","29","423-64","2014-05-20");
INSERT INTO curacionlocal VALUES("4","13","fuente rota","zoyla Flor del Rio","15","423-64","2014-05-20");
INSERT INTO curacionlocal VALUES("5","11","ya se muere por viejo","sdf","98","423-82","2014-04-05");
INSERT INTO curacionlocal VALUES("6","12","por bobo casi lo quebraban","jlks lwey","19","423-25","2014-04-22");



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO donativo VALUES("1","12548","peter arevalo","150","","","2014-05-16");
INSERT INTO donativo VALUES("3","7995","Josue Valle","15","","","2014-05-16");
INSERT INTO donativo VALUES("4","2584","yo","200","","","2014-04-04");
INSERT INTO donativo VALUES("5","89","Miguel no se cuando","15","","","2014-03-15");
INSERT INTO donativo VALUES("6","325","Cuando vengan","95.8","","","2014-02-28");
INSERT INTO donativo VALUES("7","89325","sutano mengano duarte","300","","","2014-01-30");
INSERT INTO donativo VALUES("8","789654","lucas valle","5","02410189-4","0103-15108","2014-05-17");
INSERT INTO donativo VALUES("9","8852","Days de Vale","15","02410189-4","0103-15108","2014-05-17");
INSERT INTO donativo VALUES("10","12547","peter arevalo","15","","","2014-05-17");
INSERT INTO donativo VALUES("11","2084","Pedro Hernandez","20","","","2014-05-18");



DROP TABLE personal;

CREATE TABLE `personal` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Carnet` char(9) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Brigada` varchar(30) NOT NULL,
  `Activo` int(1) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO personal VALUES("23","423-258","Peter Arevalo","Socorrista","Brigada 1","1");
INSERT INTO personal VALUES("24","423-25","Lucas Arturo Valle Mejia","Motorista","Brigada 4","0");
INSERT INTO personal VALUES("26","423-82","Josue David Arevalo","Socorrista","Brigada 1","1");
INSERT INTO personal VALUES("27","423-647","Angel Gabriel Valle","Socorrista","Brigada 2","1");
INSERT INTO personal VALUES("28","423-000","sdkfjskldf","Alumno","Brigada 4","1");
INSERT INTO personal VALUES("29","423-88","sin nombre","Fefe de Brigada","Brigada 3","0");
INSERT INTO personal VALUES("30","423-878","rocio natalia","Motorista","Brigada 2","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO servicioambulancia VALUES("1","Juan Lopez","Luis Gonzalez","Juan Lopez","12","Fractura de tibia","Cancha munucipal","1111-1","2222-2","3333-3","Hospital Nacional de Ciud","04:00:00","06:00:00","cr-77","2014-05-01");
INSERT INTO servicioambulancia VALUES("2","daysi de valle","lucas valle","","11","torcedura causante por una caida de una bicicleta","ahuachapan","24","23","27","Hospital Nacional Francisco Menéndez","12:00:00","01:00:00","2","2014-05-11");
INSERT INTO servicioambulancia VALUES("3","daysi de valle","lucas valle","","11","torcedura nivel 3","ahuachapan","24","23","27","Hospital Nacional Francisco Menéndez","12:30:00","01:45:00","2","2014-04-06");
INSERT INTO servicioambulancia VALUES("4","daysi de valle","lucas valle","","11","herida axidental con herramienta cortopunzante","ahuachapan","24","26","23","Hospital Nacional Francisco Menéndez","02:00:00","03:00:00","3","2014-03-02");
INSERT INTO servicioambulancia VALUES("5","yeni Garcia","Peter Arevalo","yeny garcia","11","herida con arma de fuego a nivel del pecho","santa ana","24","26","27","Unidad de Salud Santa Ana","14:50:00","17:20:00","3","2013-11-25");
INSERT INTO servicioambulancia VALUES("6","pedro hernandez","micaela tora de la torta","pedro hernandez","13","fuente reventada","extendido","24","26","27","Hospital Nacional Francisco Menéndez","10:15:00","03:00:00","3","2014-02-18");



