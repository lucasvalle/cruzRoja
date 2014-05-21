<?php 
require_once 'Manager.php';
/*casos trasladados*/
 ?>
 	<div class="col-lg-6 col-md-6">
				<?php 
				$buscar=new Manager();
					$buscar->consultar("select * from casos");

					$total=new Manager();
					if($total->contar("select * from servicioambulancia where Fecha between '$desde' and '$hasta'")):
						?>
					<div class="panel panel-info">
						  <div class="panel-heading">
								<h3 class="panel-title">casos Transferidos</h3>
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
									<td class="text-right"><?=$total->contar("select * from servicioambulancia where Caso=$row->IdCasos and Fecha between '$desde' and '$hasta'")?></td>
									<td><?=$row->NombreCaso?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>

						</table>
						<div class="panel-footer">
							<a href="../print/index?report=ReporteRangoDeCasosTransferidos&desde=<?=$desde?>&hasta=<?=$hasta?>" class="btn btn-info btn-lg print"><i class="fa fa-print"></i> Imprimir</a>
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
				$buscar=new Manager();
					$buscar->consultar("select * from casos");

					$total=new Manager();
					if($total->contar("select * from curacionlocal where Fecha between '$desde' and '$hasta'")):
						?>
					<div class="panel panel-info">
						  <div class="panel-heading">
								<h3 class="panel-title">Casos Locales</h3>
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
									<td class="text-right"><?=$total->contar("select * from curacionlocal where Caso=$row->IdCasos and Fecha between '$desde' and '$hasta'")?></td>
									<td><?=$row->NombreCaso?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
						<div class="panel-footer">
							<a href="../print/index?report=ReporteRangoDeCasosLocales&desde=<?=$desde?>&hasta=<?=$hasta?>" class="btn btn-info btn-lg print"><i class="fa fa-print"></i> Imprimir</a>
						</div>
						</div>
					<?php else: ?>
					<div class="alert alert-info">
						<h3>Reporte de Casos Rerefidos</h3>
						<p>No se ha encontrado ningun caso</p>
					</div>
					<?php endif;  ?>

 	</div>