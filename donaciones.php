<?php 
require_once 'controller/Donaciones.php';
require_once 'controller/Listas.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); 
$donaciones=new Donacion;
$sub=new Donacion;
$mes=date("m");
$donaciones->consultar("SELECT * FROM `donativo` WHERE month(Fecha)=$mes order by Fecha desc");
$total=$donaciones->contar("SELECT * FROM `donativo` WHERE month(Fecha)=$mes order by Fecha desc");

$cuentas=new Manager();
?>
<!-- aqui inicia el contenido -->
<?php if($cuentas->contar("select * from conceptocuenta")>0): ?>
<div class="row">
</div>
<div class="row">
	<div class="col-lg-5 col-md-5" id="view">
		<!-- contenido de las vistas -->
	</div>
	<div class="col-lg-7 col-md-7">
		<h3>Donaciones del mes de: <?=getMesName($mes)?></h3>
		<h4>Total recaudado: $<?=$sub->Total($mes)?></h4>
		<?php if($total>0): ?>
		<table class="table table-hover table-condensed table-responsive">
			<thead>
				<th>Nombre</th>
				<th>Donación</th>
				<th>Documento</th>
				<th>DUI</th>
				<th>NIT</th>
			</thead>
			<tbody>
				<?php 
			while($row=$donaciones->resultado()):
					?>
				<tr>
					<td><?=$row->Donante?></td>
					<td>$<?=number_format($row->Cantidad,2)?></td>
					<td><?=$row->nDocumento?></td>
					<td><?=$row->DUI?></td>
					<td><?=$row->NIT?></td>
				</tr>
					<?php
			endwhile;
		 ?>
			</tbody>
			<tfoot>
				<tr class="info">
					<td>Total</td>
					<td><b>$<?=$donaciones->Total($mes)?></b></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
	<?php else: ?>
	<div class="alert alert-info">
		<h3>información</h3>
		<p>No se han registrado Donativos en este mes</p>
	</div>
<?php endif; ?>
	</div>
</div>
<?php else: ?>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="alert alert-danger">
				no hay cuentas resgistradas en el catologo <a href="decalogo" class="btn btn-danger"><i class="fa fa-plus"></i> nueva Cuenta</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		loadPage("donaciones-add.php","#view")
	}(jQuery))
</script>