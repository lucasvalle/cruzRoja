<?php 
require_once '../controller/Manager.php';
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
 <style>
@page {
  size: letter portrait;
  margin:auto;
}
 </style>
 		<?php 				
					if($total->contar("select * from servicioambulancia where Fecha between '$desde'  and '$hasta'")):
						?>
								<hr>
								<h1>Reporte Mensual de Casos Transferidos</h1>
								<p>Desde: <?=$desde?> - Hasta: <?php echo $hasta ?></p>
								<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>
						<table class="table table-condensed table-hover table-bordered">
							<thead>
								<tr>
									<td class="col-lg-3 col-md-3">Total de Casos</td>
									<td class="col-lg-9 col-md-9">Nombre del Caso</td>
								</tr>
							</thead>
							<tbody>
								<?php while($row=$buscar->resultado()): ?>
								<tr>
									<td class="text-right"><?=$total->contar("select * from servicioambulancia where Caso=$row->IdCasos and  Fecha between '$desde'  and '$hasta'")?></td>
									<td><?=$row->Descripcion?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>

					<?php else: ?>
					<div class="alert alert-info">
						<h3>Reporte de Casos Rerefidos</h3>
						<p>No se ha encontrado ningun caso</p>
					</div>
					<?php endif;  ?>




 	
 	