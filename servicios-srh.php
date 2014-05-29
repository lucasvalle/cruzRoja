<?php 
require_once 'controller/Manager.php';
require_once 'controller/Listas.php';
require_once 'controller/Servicios.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Servicios"); 


$datos=new Servicio();

$serviciosMes=new Manager();
$mes=date("m");
$serviciosMes->consultar("select * from servicioambulancia where NombrePaciente like'%$dato%' ");
?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-md-6 col-md-offset-6">
		<form action="servicios-srh" method="post">
			<div class="input-group">
			<input type="search" name="dato" id="dato" class="form-control input-lg" value="" placeholder="<?=$dato?>" required="required" title="">
			<div class="input-group-btn">
				<button class="btn btn-info btn-lg"><i class="fa fa-search"></i></button>
				<a href="servicios" class="btn btn-lg btn-danger"><i class="fa fa-times"></i></a>
			</div>
			</div>
				
		</form>
	</div>
	<div class="col-lg-12 col-md-12">
		<h3>Casos del mes: <?=getMesName(date("m"))?></h3>
		<table class="table table-bordered table-condensed table-hover table-responsive">
			<thead>
				<tr>
					<th class="col-md-3">Paciente</th>
					<th class="col-md-2">Caso</th>
					<th class="col-md-3">Socorristas</th>
					<th class="col-md-3">Hospital</th>
					<th class="col-md-1"></th>
				</tr>
			</thead>
			<tbody>
				<?php while($row=$serviciosMes->resultado()):?>
				<tr>
					<td><?=$row->NombrePaciente?></td>
					<td><?=$datos->getCaso($row->Caso)?></td>
					<td>
						<?=$datos->getPersona($row->Socorrista1)?>
						<br>
						<?=$datos->getPersona($row->Socorrista2)?>

					</td>
					<td><?=$row->Hospital?></td>
					<td>
						<a href="servicio-upd?id=<?=$row->IdServicioAmbulancia?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					</td>
				</tr>
			<?php endwhile ?>
			</tbody>
		</table>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>