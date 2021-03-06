<?php 
require_once '../controller/Manager.php';
require_once '../controller/Egresos.php';
$reporte=new Manager();
$reporte->consultar("select * from contabilidad order by Fecha DESC");

$cuenta=new Egreso();

/*calcular el total de las entraads*/
$ingresos=new Manager();
$ingresos->consultar("SELECT SUM(Cantidad) as total FROM donativo");
$row=$ingresos->resultado();
$TotalIngreso=$row->total;

/*calcular el total de las entraads*/
$Egreso=new Manager();
$Egreso->consultar("SELECT SUM(Egresos) as total FROM contabilidad");
$rowE=$Egreso->resultado();
$TotalEgreso=$rowE->total;

$saldo=$TotalIngreso-$TotalEgreso;
?>
<!-- aqui inicia el contenido -->
 <style>
	@page {
	  size: letter landscape;
	  margin:auto;
	}
 </style>
<div class="row">
	<div class="col-lg-12">
		<h1 >
			Reporte General Financiero
		</h1>
						<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>
	</div>
</div> 
<p class="hidden-print">
			<a href="../print/index?report=reporteGeneraldeContabilidad" class="btn btn-info print btn-lg"><i class="fa fa-print"></i> Imprimir Reporte</a>
</p>
	<table class="table table-bordered  table-condensed table-hover table-striped">
		<tr align="center">
			<td>N.</td>
			<td class="col-lg-2 col-md-2"><label>Fecha.</label></td>
			<td><label>Cta. Contable</label></td>
			<td class="col-lg-5 col-md-5"><label>Concepto</label></td>
			<td class="col-lg-1 col-md-1"><label>No. de Doc.</label></td>
			<td class="col-lg-1 col-md-1"><label>Ingresos</label></td>
			<td class="col-lg-1 col-md-1"><label>Egresos</label></td>
			<td class="col-lg-1 col-md-1"><label>Saldo</label></td>
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
			<td><?=($row->Ingresos>0 ? "$".number_format($row->Ingresos,2) : "" )?></td>
			<td><?=($row->Egresos>0 ? "$".number_format($row->Egresos,2) : "" )?></td>
			<td>$<?=number_format($sal=$sal+$row->Ingresos-$row->Egresos,2)?></td>
		</tr>
		<?php endwhile; ?>
		<tr class="success">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td class="text-right"><strong>TOTAL</strong></td>
			<td>$<?=number_format($TotalIngreso,2)?></td>
			<td>$<?=number_format($TotalEgreso,2)?></td>
			<td>$<?=number_format($saldo,2)?></td>
		</tr>
	</table>
	<div class="row hidden-print">
		<div class="col-lg-12 col-md-12">
			<a href="../print/index?report=reporteGeneraldeContabilidad" class="btn btn-info print btn-lg"><i class="fa fa-print"> </i>Imprimir Reporte</a>
		</div>
	</div>