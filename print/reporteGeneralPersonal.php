<?php 
require_once '../controller/Manager.php';
$buscar=new Manager();
$buscar->consultar("select * from personal order by Carnet asc");
 ?>
 <style>
	@page {
	  size: letter landscape;
	  margin:auto;
	}
 </style>
 <hr>
 <h1>Reporte General de Personal </h1>
						<p>Reporte Generado el <?=date('d-M-Y H:i:s')?> Por: <?=$administrador?></p>
 <p><a href="../print/index?report=reporteGeneralPersonal" class="btn btn-info btn-lg hidden-print print"><i class="fa fa-print"></i> Imprimir Reporte</a></p>
 <table class="table table-bordered  table-condensed table-hover table-striped">
		<tr>
			<td class="col-lg-1 col-md-1"><label>No.</label></td>
			<td class="col-lg-4 col-md-4"><label>Nombre</label></td>
			<td class="col-lg-1 col-md-1"><label>Carnet</label></td>
			<td class="col-lg-1 col-md-1"><label>Cargo</label></td>
			<td class="col-lg-1 col-md-1"><label>Estado</label></td>
		</tr>
		<?php 
		$total=new Manager();
		$a=1;
		while($row=$buscar->resultado()): 
			?>
			<tr>
				<td><?=$a++?></td>
				<td><?=$row->Nombre?></td>
				<td><?=$row->Carnet?></td>
				<td><?=$row->Cargo?></td>
				<td><?=($row->Activo==0 ? "Inactivo" : "")?></td>
			</tr>
		<?php 
		endwhile; ?>
	</table>
