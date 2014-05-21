<?php 
require_once '../controller/Manager.php';
require_once '../controller/Egresos.php';
$reporte=new Manager();
$reporte->consultar("select * from contabilidad where Egresos<>0  and Fecha between '$desde' and '$hasta' order by Fecha DESC");
$totalEncontados=$reporte->contar("select * from contabilidad where Egresos<>0  and Fecha between '$desde' and '$hasta' order by Fecha DESC");

$cuenta=new Egreso();


/*calcular el total de las entraads*/
$Egreso=new Manager();
$Egreso->consultar("SELECT SUM(Egresos) as total FROM contabilidad where Egresos<>0  and Fecha between '$desde' and '$hasta' ");
$rowE=$Egreso->resultado();
$TotalEgreso=number_format($rowE->total,2);
?>
<!-- aqui inicia el contenido -->
 <style>
	@page {
	  size: letter landscape;
	  margin:auto;
	}
 </style>
 <?php if($totalEncontados>0): ?>
<div class="row">
	<div class="col-lg-12">
		<h1 >Reporte General de Egresos por fecha</h1>
		<p>Desde: <?=date("d-m-Y",strtotime($desde))?> - Hasta: <?php echo date("d-m-Y",strtotime($hasta)) ?></p>
						<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>
		<hr>
	</div>
</div> 
<p class="hidden-print">
			<a href="../print/index?report=reporteGeneraldeEgresosporFecha&desde=<?=$desde?>&hasta=<?=$hasta?>" class="btn btn-info print btn-lg"><i class="fa fa-print"></i> Imprimir Reporte</a>
</p>
	<table class="table table-bordered  table-condensed table-hover table-striped">
		<tr align="center">
			<td>N.</td>
			<td class="col-lg-2 col-md-2"><label>Fecha.</label></td>
			<td><label>Cta. Contable</label></td>
			<td class="col-lg-5 col-md-5"><label>Concepto</label></td>
			<td class="col-lg-1 col-md-1"><label>No. de Doc.</label></td>
			<td class="col-lg-1 col-md-1"><label>Egresos</label></td>
		</tr>
		<?php 
		$sal=0;
		$a=1;
		while($row=$reporte->resultado()): ?>
		<tr>
			<td><?=$a++?></td>
			<td><?=date("d-M-Y", strtotime($row->Fecha))?></td>
			<td><?=$row->CtaContable?></td>
			<td><?=$cuenta->getCuenta($row->CtaContable)?></td>
			<td><?=$row->nDocumento?></td>
			<td><?=($row->Egresos>0 ? "$".number_format($row->Egresos,2) : "" )?></td>
		</tr>
		<?php endwhile; ?>
		<tr class="success">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="text-right"><strong>TOTAL</strong></td>
			<td>$<?=number_format($TotalEgreso,2)?></td>
		</tr>
	</table>
	<div class="row hidden-print">
		<div class="col-lg-12 col-md-12">
			<a href="../print/index?report=reporteGeneraldeEgresosporFecha&desde=<?=$desde?>&hasta=<?=$hasta?>" class="btn btn-info print btn-lg"><i class="fa fa-print"> </i>Imprimir Reporte</a>
		</div>
	</div>
	<?php else: ?>
	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<div class="alert alert-danger">
			<h1>Upss</h1>
			<p>no se han encontrados resgistros con el rango de fechas envidado</p>
		</div>
	</div>
	<?php endif; ?>