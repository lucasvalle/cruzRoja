<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>


<!-- Inicio del reporte -->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center>Reporte de donantes con NIT</center>
		</h1>
		<h4 align="center">Cruz Roja. Seccional de Ciudad Arce</h4>
	</div>
</div> <br>


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
							<label for="">Desde:</label>
							<input type="date" name="" id="input" class="form-control" value="" required="required" title="">
						</div>

					
						<div class="col-lg-6">
							<label for="">Hasta:</label>
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
			<td class="col-lg-1 col-sm-1"><label>Código</label></td>
			<td class="col-lg-4 col-sm-4"><label>Nombre del donante</label></td>
			<td class="col-lg-1 col-sm-1"><label>Cantidad</label></td>
			<td class="col-lg-2 col-sm-2"><label>DUI</label></td>
			<td class="col-lg-2 col-sm-2"><label>NIT</label></td>
			<td class="col-lg-2col-sm-2"><label>FEcha</label></td>
			
		</tr>
		
		<tr>
			<td>58585</td>
			<td>Marta Alicia Herrera Arriaza</td>
			<td>25.00</td>
			<td>156684685</td>
			<td>373733733323-32323</td>
			<td>10/04/2014</td>
			

		</tr>
		<tr>
			<td colspan="7">
				
				<div class="panel-footer" align="center">
			 		<button class="btn btn-info"><i class="fa fa-print fa-spin"></i>Imprimir reporte</button>
			  		<button class="btn btn-danger"><i class="fa fa-times fa-spin"></i>Cancelar</button>

			 	 </div>
			</td>
		</tr>
	</table>
</div>
<?php $template->makeFooter() ?>