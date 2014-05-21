<?php 
require_once '../controller/Manager.php';
$buscar=new Manager();
$buscar->consultar("select * from personal where activo=1");
 ?>
 <style>
	@page {
	  size: letter landscape;
	  margin:auto;
	}
 </style>
 <hr>
 <h1>Reporte de horas hombre trabajadas </h1>
 <p>Desde: <?=date("d-m-Y",strtotime($desde))?> - Hasta: <?php echo date("d-m-Y",strtotime($hasta)) ?></p>
<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>
 <p><a href="../print/index?report=reporteHorashombre&desde=<?=$desde?>&hasta=<?=$hasta?>" class="btn btn-info btn-lg hidden-print print"><i class="fa fa-print"></i> Imprimir Reporte</a></p>
 <table class="table table-bordered  table-condensed table-hover table-striped">
		<tr>
			<td class="col-lg-1 col-md-1"><label>No.</label></td>
			<td class="col-lg-4 col-md-4"><label>Nombre</label></td>
			<td class="col-lg-1 col-md-1"><label>Carnet</label></td>
			<td class="col-lg-1 col-md-1"><label>Cargo</label></td>
			<td class="col-lg-1 col-md-1"><label>Horas</label></td>
		</tr>
		<?php 
		$total=new Manager();
		$a=1;

		$totalConsulta=new Manager();
		$totalConsulta->consultar("select sum(HorasLaboradas) as sumatoria from asistencia where  Fecha between '$desde' and '$hasta'");
		$totalHoras=$totalConsulta->resultado();
		while($row=$buscar->resultado()): 
				$total->consultar("select sum(HorasLaboradas) as sumatoria from asistencia where Carnet='$row->Carnet' and Fecha between '$desde' and '$hasta'");
				$horas=$total->resultado();
				if($horas->sumatoria>0):
			?>
			<tr>
				<td><?=$a++?></td>
				<td><?=$row->Nombre?></td>
				<td><?=$row->Carnet?></td>
				<td><?=$row->Cargo?></td>
				<td><?=$horas->sumatoria;?></td>
			</tr>
		<?php 
			endif;
		endwhile; ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><b>Total</b></td>
			<td><b><?=$totalHoras->sumatoria?></b></td>
		</tr>
	</table>
