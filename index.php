<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Bienvenidos"); ?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-12">
		<div class="well">
			<h2 align="center">Bienvenido al Sistema de Control de la Cruz Roja Salvadoreña</h2>
			<h3 align="center">Seccional de Cuidad Arce</h3>
		</div>
	</div>
</div>

	<div class="row" align="center">
		<div class="col-lg-3">
			<img src="img/fundacion.jpeg" height="60" alt=""><br>
			<label for="">Fundación</label>
		</div>
		<div class="col-lg-3">
			<img src="img/mision.png" height="60" alt=""><br>
			<label for="">Misión:</label>
			<p align="justify">La Cruz Roja Salvadoreña tiene como misión prevenir y aliviar los sufrimientos humanos sin discriminación de raza, nacionalidad, sexo, clase, religión ni credo político con absoluto apego a los Principios Fundamentales del Movimiento de la Cruz Roja y Media Luna Roja</p>
		</div>
		<div class="col-lg-3">
			<img src="img/vision.jpg" height="60" alt=""><br>
			<label for="">visión</label>
			<p align="justify">Ser la mejor Institución humanitaria, de carácter voluntario, proporcionando servicios básicos en salud y acciones con un enfoque integrado de sus programas y proyectos buscando la excelencia en la calidad y calidez, procurando la sostenibilidad</p>
		</div>	
		<div class="col-lg-3">
			<img src="img/primeros.jpg" height="60" alt=""><br>
			<label for="">Primeros auxilios</label>
		</div>
	</div>



<!-- fin del contenido -->
<?php $template->makeFooter() ?>