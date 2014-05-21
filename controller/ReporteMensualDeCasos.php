<?php 
require_once 'Manager.php';
/*casos trasladados*/
$buscar=new Manager();
	$buscar->consultar("select * from casos");

	$buscar2=new Manager();
	$buscar2->consultar("select * from casos");
	$mant=$mes-1;
	if($mes==1){
		$mant=12;
	}else if($mes<=9){
		$mes="0$mes";
		$mant="0$mant";
	}
		$desde="$anio-$mant-27";
		$hasta="$anio-$mes-26";

	$total=new Manager();
 ?>
 	<div class="col-lg-6 col-md-6">
				<?php 
				
					if($total->contar("select * from servicioambulancia where Fecha between '$desde'  and '$hasta'")):
						?>
						<div class="panel panel-info">
						  <div class="panel-heading">
								<h3 class="panel-title">Casos Transferidos</h3>
								<p>Desde: <?=$desde?> - Hasta: <?php echo $hasta ?></p>
						  </div>
						<table class="table table-condensed table-hover table-bordered">
							<thead>
								<tr>
									<td class="col-lg-3 col-md--">Total de Casos</td>
									<td class="col-lg-9 col-md-9">Nombre del Caso</td>
								</tr>
							</thead>
							<tbody>
								<?php while($row=$buscar->resultado()): ?>
								<tr>
									<td class="text-right"><?=$total->contar("select * from servicioambulancia where Caso=$row->IdCasos and  Fecha between '$desde'  and '$hasta'")?></td>
									<td><?=$row->NombreCaso?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
						<div class="panel-footer">
							<a href="../print/index?report=ReporteMensualDeCasosTransferidos&mes=<?=$mes?>&anio=<?=$anio?>" class="btn btn-primary btn-lg print"><i class="fa fa-print"></i> Imprimir</a>
						</div>
					</div>
					<?php else: ?>
					<div class="alert alert-info">
						<h3>Reporte de Casos Rerefidos</h3>
						<p>No se ha encontrado ningun caso</p>
					</div>
					<?php endif;  ?>

 	</div>




 	<div class="col-lg-6 col-md-6">
				<?php 
				
					if($total->contar("select * from curacionlocal where Fecha between '$desde'  and '$hasta'")):
						?>
						<div class="panel panel-danger">
						  <div class="panel-heading">
								<h3 class="panel-title">Casos Locales</h3>
								<p>Desde: <?=date("d-m-Y",strtotime($desde))?> - Hasta: <?php echo date("d-m-Y",strtotime($hasta)) ?></p>
						  </div>
						<table class="table table-condensed table-hover table-bordered">
							<thead>
								<tr>
									<td class="col-lg-3 col-md--">Total de Casos</td>
									<td class="col-lg-9 col-md-9">Nombre del Caso</td>
								</tr>
							</thead>
							<tbody>
								<?php while($row=$buscar2->resultado()): ?>
								<tr>
									<td class="text-right"><?=$total->contar("select * from curacionlocal where Caso=$row->IdCasos and  Fecha between '$desde'  and '$hasta'")?></td>
									<td><?=$row->NombreCaso?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
						<div class="panel-footer">
							<a href="../print/index?report=ReporteMensualDeCasosLocales&mes=<?=$mes?>&anio=<?=$anio?>" class="btn btn-primary btn-lg print"><i class="fa fa-print"></i> Imprimir</a>
						</div>
					</div>
					<?php else: ?>
					<div class="alert alert-danger">
						<h3>Reporte de Casos Locateles</h3>
						<p>No se ha encontrado ningun caso</p>
					</div>
					<?php endif;  ?>

 	</div>