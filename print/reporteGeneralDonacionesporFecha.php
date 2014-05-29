<?php 
require_once '../controller/Manager.php';
$reporte=new Manager();

if($documento>0)
	$sql="select * from donativo where fecha between '$desde' and '$hasta' and NIT<>'' order by Fecha DESC";
else
	$sql="select * from donativo where fecha between '$desde' and '$hasta' and NIT='' order by Fecha DESC";


$reporte->consultar($sql);
$total=new Manager();
if($documento>0)
	$total->consultar("select sum(Cantidad) totalingreso from donativo where fecha between '$desde' and '$hasta' and NIT<>'' order by Fecha DESC");
else
	$total->consultar("select sum(Cantidad) totalingreso from donativo where fecha between '$desde' and '$hasta' and NIT='' order by Fecha DESC");

$Ingreso=$total->resultado();
 ?>

 <?php if($reporte->contar($sql)): ?>
 <style>
@page{
	 size: letter landscape;
 	 margin:auto;
}
 </style>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<h1>Reporte de Donacion de por Fecha</h1>
<p>Desde: <?=date("d-m-Y",strtotime($desde))?> - Hasta: <?php echo date("d-m-Y",strtotime($hasta)) ?></p>
						<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>	</div>
</div>
	<div class="col-lg-12 col-md-12">
	<a href="../print/index?report=reporteGeneralDonacionesporFecha&desde=<?=$desde?>&hasta=<?=$hasta?>&documento=<?=$documento?>" class="btn btn-info pull-right print hidden-print"><i class="fa fa-print"></i> Imprimir Reporte</a>

		<table class=" table table-condensed table-hover table-striped table-responsive">
		<thead>
			<tr>
				<th class="col-lg-1 col-md-1">cor.</th>
				<th class="col-lg-2 col-md-2">Fecha</th>
				<th class="col-lg-2 col-md-2">Documento</th>
				<th class="col-lg-3 col-md-3">Nombre</th>
				<th class="col-lg-1 col-md-1">Dui</th>
				<th class="col-lg-2 col-md-2">Nit</th>
				<th class="col-lg-1 col-md-1">Cantidad</th>
			</tr>
		</thead>
		<tbody>
			<?php $a=1; while($row=$reporte->resultado()):?>
				<tr>
					<td><?=$a++?></td>
					<td><?=date("d-M-Y", strtotime($row->Fecha))?></td>
					<td><?=$row->nDocumento?></td>
					<td><?=$row->Donante?></td>
					<td><?=$row->DUI?></td>
					<td><?=$row->NIT?></td>
					<td>$<?=number_format($row->Cantidad,2)?></td>
				</tr>
					<?php
			endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="text-right">Total</td>
				<td>$<?=number_format($Ingreso->totalingreso,2)?></td>
			</tr>
		</tfoot>
	</table>
	</div>
 <?php else: ?>

 <?php endif; ?>