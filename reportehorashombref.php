<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center>Cuadro resumen de horas hombre realizadas</center>
			<h4 align="center">Cruz Roja Salvadoreña. Seccional Ciudad Arce</h4>
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">  </div>
	    <div class="col-lg-6">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Datos de la búsqueda por fecha</h3>
			</div>
			 	<div class="panel-body" align="center">

					<div class="row">
						<div class="col-lg-6">
							<label for="">Mes:</label>
							<input type="date" name="" id="input" class="form-control" value="" required="required" title="">
						</div>

					
						<div class="col-lg-6">
							<label for="">Año:</label>
							<input type="date" name="" id="input" class="form-control" value="" required="required" title="">
						</div>
					</div>
				 </div>
		

			 <div class="panel-footer" align="center">
				  	<button class="btn btn-info"><i class="fa fa-save fa-spin"></i> Mostrar resultados</button>
				  	<button class="btn btn-danger"><i class="fa fa-times fa-spin"></i> Cancelar</button>

			  </div>

		</div>
    </div>
</div>
		<br>


<div class="row">
	<table class="table table-bordered  table-condensed table-hover">
		<tr align="center">
			<td class="col-lg-1 col-sm-1"><label>No.</label></td>
			<td class="col-lg-4 col-sm-4"><label>Nombre</label></td>
			<td class="col-lg-1 col-sm-1"><label>Carnet</label></td>
			<td class="col-lg-1 col-sm-1"><label>Horas</label></td>
			<td class="col-lg-3 col-sm-3"><label>Tarea realizada</label></td>
		</tr>
		
		<tr>
			<td>1</td>
			<td>Juan Carlos peraza Sandoval</td>
			<td>4545 545</td>
			<td>15</td>
			<td>Ninguna tarea realizada</td>
		</tr>
		<tr>
			<td colspan="5">
				
				<div class="panel-footer" align="center">
			 		<button class="btn btn-info"><i class="fa fa-print fa-spin"></i>Imprimir reporte</button>
			  		<button class="btn btn-danger"><i class="fa fa-times fa-spin"></i>Cancelar</button>

			 	 </div>
			</td>
		</tr>
	</table>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>