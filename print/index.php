<?php require '../controller/Manager.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Impresion de Reportes</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/imprimir.css" media="print">
</head>
<body>
	<table border="0" width="100%">
		<tr>
			<td width="20%"><img src="../img/nuevo_emblema_indicativo.jpg" height="120" alt=""></td>
			<td width="60%" align="center">
				<h1 class="encabezado">Cruz roja Salvadoreña</h1>
				<h3>Seccional Ciudad Arce</h3>
				<p>direccion pendiente</p>
				<p><b>Tel</b> 24066057</p>
			</td>
			<td width="20%"><img src="../img/cruz-y-luna-roja4.jpg" height="120" alt=""></td>
		</tr>
	</table>
	<?php 
		if(isset($report)):
			include $report.".php";
		else:
	 ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
			<div class="alert alert-info">
				<h2 >
					error
				</h2>
				<p>no se ha encontrado un reporte para imprimir</p>
			</div>
		</div>
	</div>
<?php endif; ?>
</body>
</html>