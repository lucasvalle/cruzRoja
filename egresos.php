<?php 
require_once 'controller/Egresos.php';
require_once 'controller/Listas.php';
require_once 'controller/saldo.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); 
$salida=new Egreso;
$sub=new Egreso;
$detalle=new Egreso;
$mes=date("m");
$salida->consultar("SELECT * FROM contabilidad WHERE month(Fecha)=$mes and Egresos>0 order by Fecha desc");

$total=$salida->contar("SELECT * FROM contabilidad WHERE month(Fecha)=$mes and Egresos>0 order by Fecha desc");


?>
<!-- aqui inicia el contenido -->
<div class="row">
</div>
<div class="row">
	<div class="col-lg-5 col-md-5" id="view">
		<!-- contenido de las vistas -->
		<div class="alert alert-danger ocultar" id="sinSaldo">
			<h1>Ups</h1>
			<p>No se puden realizar Egresos porque no hay saldo disponible</p>
		</div>
	</div>
	<div class="col-lg-7 col-md-7">
		<h3>Egresos del mes de: <?=getMesName($mes)?></h3>
		<table class="table-bordered table">
			<tr class="danger">
				<td><h4>Egresado en este mes:</h4></td>
				<td><h4>Saldo General: </h4></td>
			</tr>
			<tr>
				<td><strong>$<?=$sub->Total($mes)?></strong></td>
				<td><strong>$<?php echo number_format($saldo,2) ?></strong></td>
			</tr>
		</table>
		<span id="saldo" class="ocultar"><?=$detalle->saldo()?></span>	
		<?php if($total>0): ?>
		<table class="table table-hover table-condensed table-responsive">
			<thead>
				<th>Cuenta</th>
				<th>Documento</th>
				<th>Cantidad</th>
				<th>Fecha</th>
			</thead>
			<tbody>
				<?php 
			while($row=$salida->resultado()):
					?>
				<tr>
					<td><?=$sub->getCuenta($row->CtaContable)?></td>
					<td><?=$row->nDocumento?></td>
					<td>$<?=number_format($row->Egresos,2)?></td>
					<td><?=$row->Fecha?></td>
				</tr>
					<?php
			endwhile;
		 ?>
			</tbody>
			<tfoot>
				<tr class="info">
					<td></td>
					<td>Total</td>
					<td><b>$<?=$salida->Total($mes)?></b></td>
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
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		if($("#saldo").text()>0)
		loadPage("egresos-add.php","#view")
		else	
			$("#sinSaldo").fadeIn()

		
	}(jQuery))
</script>