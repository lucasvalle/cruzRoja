<?php 
require_once 'controller/Manager.php';
require_once 'controller/Login.php';
$admin=new Login();
$admin->verificar();
/**
* plantilla base para el sistema
*/
class Template 
{
	
	public function makeHeader($title)
	{
		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<title><?=$title?></title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" href="css/imprimir.css" media="print">

	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/validaciones.js"></script>
	<script src="js/jquery.printPage.js"></script>

</head>
<body>
	<div id="shadow">
	<div class="container">	
		<header>
			<div class="row">
				<div class="col-lg-3 col-md-3 text-center">
					<div id="logo">
					<h1 class="">Cruz Roja Salvadoreña</h1>
					<a href="/"><img src="http://elsalvadordejapon311.files.wordpress.com/2011/03/nuevo_emblema_indicativo.jpg" height="150" alt=""></a>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<h1 id="seccional">Seccional de ciudad arce</h1>
					<nav class="navbar navbar-default">
						<div class="navbar-header">
						
						</div>
							<ul class="nav navbar-nav" align="center">
								<li class="dropdown" href="index" style="display:none">
								<a href="index" class="dropdown-toggle" data-toggle="dropdown">
									<img src="img/Inicio.png" height="40" alt="" align="center"><br>
									<label for="">Inicio</label>
								</a>
									
								</li>

								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="img/Ambulancia.png" height="40" alt=""><br>
									<label for="">Emergencias <i class="caret"></i> </label>
								</a>
									<ul class="dropdown-menu" align="left">
										<li><a href="nuevaambulancia"><i class="fa fa-truck"></i> Ambulancias</a></li>
										<li><a href="servicio-add.php"><i class="fa fa-times" ></i> Nuevo servicio</a></li>
										<li><a href="curacionlocal"><i class="fa fa-crosshairs"></i> Casos Locales</a></li>
										<!-- <li><a href="#"><i class="fa fa-print" ></i> Reporte de ambulancia</a></li> -->
										<li><a href="reporteconsolidadodecasos"><i class="fa fa-print" ></i> Reporte de servicio mensual</a></li>
										<li><a href="reporteconsolidadodecasosf"><i class="fa fa-print" ></i> Reporte de servicio por fecha</a></li>
										<li><a href="casos"><i class="fa fa-book"></i> Conceptos de casos</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="img/Personal.png" height="40" alt=""><br>
										<label for="">Personal <i class="caret"></i> </label>
									</a>
									<ul class="dropdown-menu" align="left">
										<li><a href="personal"><i class="fa fa-edit" ></i> Agregar personal</a></li>
										<li><a href="brigadadeturno"><i class="fa fa-male" ></i> Brigada de turno</a></li>
										<li><a href="reportehorashombre"><i class="fa fa-print"></i> Reporte horas hombre mensual</a></li>
										<!-- <li><a href="reportehorashombref"><i class="fa fa-print"></i> Reporte horas hombre por fecha</a></li> -->
										<li><a href="administradores"><i class="fa fa-user"></i> Administradores</a></li>
										<li><a href="reporteGeneralPersonal.php"><i class="fa fa-print"></i> Reporte de personal</a></li>
									</ul>
								</li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="img/Contabilidad.png" height="40" alt=""><br>
										<label for="">Contabilidad <i class="caret"></i> </label>
									</a>
									<ul class="dropdown-menu" align="left">
										<li><a href="decalogo"><i class="fa fa-book"></i>  Decalogo de cuentas</a></li>
										<li><a href="egresos"><i class="fa fa-book"></i>  Egresos</a></li>
										<li><a href="graficaIngresos"><i class="fa fa-bar-chart-o"></i>  Grafica de Ingresos</a></li>
										<li><a href="graficaEgresos"><i class="fa fa-bar-chart-o"></i>  Grafica de gresos</a></li>
										<li><a href="reportefinanciero"><i class="fa fa-print"></i>  Reporte financiero general</a></li>
										<!-- <li><a href="reportefinancieromensual"><i class="fa fa-calendar"></i>  Reporte financiero mensual</a></li> -->
										<li><a href="reportefinancieromensualf"><i class="fa fa-calendar"></i>  Reporte financiero por fecha</a></li>
										<li><a href="reporteGeneraldeEgresos"><i class="fa fa-print"></i>  Reporte general de Egresos</a></li>
										<li><a href="reporteGeneraldeEgresosporFecha"><i class="fa fa-calendar"></i>  Reporte de Egresos por fecha </a></li>
									</ul>
								</li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="img/Donar.png" height="40" alt=""><br>
										<label for="">Donaciones <i class="caret"></i> </label>
									</a>
									<ul class="dropdown-menu" align="left">
										<li><a href="donaciones"><i class="fa fa-money"></i>Donaciones</a></li>
										<li><a href="reporteGeneralDonaciones"><i class="fa fa-print"></i>  Reporte General</a></li>
										<li><a href="reportedeDonacionesPorFecha"><i class="fa fa-print"></i>  Reporte por Fecha</a></li>
									</ul>
								</li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="img/Sesion.png" height="40" alt=""><br>
										<label for="">Sesión <i class="caret"></i> </label>
									</a>
									<ul class="dropdown-menu" align="left">
										<li><a href="logout"><i class="fa fa-user"></i>  Cerrar sesión</a></li>
										<li><a href="respaldo"><i class="faner"></i>  Copia de Respaldo</a></li>
										<li><a href=""><i class="fa fa-refresh"></i>  opcion 3</a></li>
									</ul>
								</li>
							</ul>

					</nav>
					<section id="adminSection">
						<a href=""><i class="fa fa-user"></i>  <?php echo $_SESSION['administrador'] ?></a>
					</section>
				</div>
			</div>
		</header>
	</div>

<div class="container">
	<section class="body shadow">
		<?php
	}

public function makeFooter()
{
?>
</section>
</div>


	<div class="container">
		<footer>
			<div class="row" align="center">
				<div class="col-lg-2 col-md-2">El Salvador, C.A.</div>
				<div class="col-lg-2 col-md-2">Derechos reservados 2014</div>
				<div class="col-lg-4 col-md-2" align="center">Cruz Roja Salvadoreña. Sección Ciudad Arce <br>

				</div>
				<div class="col-lg-2 col-md-2">Tel: 2443-0587</div>
				<div class="col-lg-2 col-md-2">Email: crciudadarce@gmail.com</div>
			</div>
		</footer>
	</div>
	</div>
	
</body>
</html>
<?php
}




}
 ?>