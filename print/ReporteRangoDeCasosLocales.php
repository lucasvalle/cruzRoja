				<?php 
				$buscar=new Manager();
					$buscar->consultar("select * from casos");

					$total=new Manager();
					if($total->contar("select * from curacionlocal where Fecha between '$desde' and '$hasta'")):
						?>
						<hr>
								<h1 >Reporte de Casos Atendidos Localmente </h1>
						<p>Desde: <?=date("d-m-Y",strtotime($desde))?> - Hasta: <?php echo date("d-m-Y",strtotime($hasta)) ?></p>
						<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>
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
									<td><?=$row->Descripcion?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					<?php endif;  ?>