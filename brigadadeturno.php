<?php 
require_once 'controller/Manager.php';
require_once 'controller/Turnos.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); 

$carnets=new Manager();
$carnets->consultar("select Carnet from personal order by Carnet ASC");

$hoy=date("Y-m-d");
$reg=new Manager();
$reg->consultar("SELECT p.Nombre, p.Carnet, a.* from personal p join asistencia a on p.Carnet=a.Carnet and a.Fecha='$hoy'");
?>
<!-- aqui inicia el contenido -->

<datalist id="Carnets">
	<?php 
		while($row=$carnets->resultado()):
				?>
				<option value="<?=$row->Carnet?>">
				<?php
		endwhile;
	 ?>
</datalist>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center>Brigada de Turno</center>
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-4" id="view">
		<!-- cargar el form -->
	</div>
	<div class="col-lg-8 col-md-8">
		<table class="table table-condensed table-hover table-responsive">
			<thead>
				<tr>
					<th>Carnet</th>
					<th>Nombre</th>
					<th>Brigada</th>
					<th>horas</th>
					<th>Fecha</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					while($row=$reg->resultado()):
							?>
							<tr>
								<td><?=$row->Carnet?></td>
								<td><?=$row->Nombre?></td>
								<td><?=$row->BrigadaTurno?></td>
								<td><?=$row->HorasLaboradas?></td>
								<td><?=$row->Fecha?></td>
								<td></td>
							</tr>			
							<?php
					endwhile;
				 ?>
			</tbody>
		</table>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		loadPage('brigadaturno-add.php', "#view")
	}(jQuery))
</script>