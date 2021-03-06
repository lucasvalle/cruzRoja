<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>


<!-- Inicio del reporte -->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center>Reporte de donantes sin NIT</center>
		</h1>
		<h4 align="center">Cruz Roja. Seccional de Ciudad Arce</h4>
	</div>
</div> <br>


<div class="row">
	<div class="col-lg-3">  </div>
	    <div class="col-lg-6">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Datos de la búsqueda mensual</h3>
			</div>
			 	<div class="panel-body" align="center">

					<div class="row">
						<div class="col-lg-6">
							<label for="">Mes:</label>
							<select class="form-control" name="mes" required="required">
								<option></option>
								<option value="Masculino">Enero</option>
								<option value="Femenino">Febrero</option>
								<option value="Femenino">Marzo</option>
								<option value="Femenino">Abril</option>
								<option value="Femenino">Mayo</option>
								<option value="Femenino">Junio</option>
								<option value="Femenino">Julio</option>
								<option value="Femenino">Agosto</option>
								<option value="Femenino">Septiembre</option>
								<option value="Femenino">Octubre</option>
								<option value="Femenino">Noviembre</option>
								<option value="Femenino">Diciembre</option>
							</select>
						</div>

					
						<div class="col-lg-6">
							<label for="">Año:</label>
							<select class="form-control" name="anno" required="required">
								<option></option>
								<option value="Masculino">2013</option>
								<option value="Femenino">2014</option>
								<option value="Femenino">2015</option>
								<option value="Femenino">2016</option>
								<option value="Femenino">2017</option>
								<option value="Femenino">2018</option>
								<option value="Femenino">2019</option>
								<option value="Femenino">2020</option>
								<option value="Femenino">2021</option>
								<option value="Femenino">2022</option>
								<option value="Femenino">2023</option>
								<option value="Femenino">2024</option>
							</select>
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
			<td class="col-lg-2 col-sm-2"><label>Código</label></td>
			<td class="col-lg-4 col-sm-4"><label>Nombre del donante</label></td>
			<td class="col-lg-2 col-sm-2"><label>Cantidad</label></td>
			<td class="col-lg-2 col-sm-2"><label>DUI</label></td>
			<td class="col-lg-2col-sm-2"><label>Fecha</label></td>
			
		</tr>
		
		<tr>
			<td>58585</td>
			<td>Marta Alicia Herrera Arriaza</td>
			<td align="right">25.00</td>
			<td>156684685</td>
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