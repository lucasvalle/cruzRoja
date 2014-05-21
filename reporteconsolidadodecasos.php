<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- Inicio de la consulta -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center> Reporte consolidado de casos</center>
		</h1>
		<h4 align="center">Cruz Roja. Seccional de Ciudad Arce</h4>
	</div>
</div> <br>

	
<!-- Inicio de la consulta -->
<div class="row">
	    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Datos de la búsqueda mensual</h3>
			</div>
			 	<form action="controller/ReporteMensualDeCasos.php" id="frmConsultaMensual" method="post">
			 		<div class="panel-body" align="center">
					<div class="row">
						<div class="col-lg-6">
							<label for="">Mes:</label>
							<select class="form-control" name="mes" required="required">
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label for="">Año:</label>
							<small></small>
							<input type="text" name="anio" id="input" class="form-control" maxlength="4" value="<?=date("Y")?>" validar required="required" pattern="^[0-9]{4}$" title="">
						</div>
					</div>
				 </div>
			 <div class="panel-footer" align="center">
				  	<button type="submit" class="btn btn-info btn-block btn-lg"><i class="fa fa-search"></i> Mostrar resultados</button>
			  </div>
			 	</form>
		</div>
    </div>
</div>
<div class="row" id="view">

</div>
<?php $template->makeFooter() ?>
<script>
	//loadPage("controller/ReporteMensualDeCasos.php","#view");

	$("#frmConsultaMensual").on("submit",function(e){
		e.preventDefault();
			$.ajax({
				url:$(this).attr("action"),
				data:$(this).serialize(),
				beforeSend:function(){
					$("#view").html("se esta generando la vista, espera un momento");
				},
				success:function(datos){
					$("#view").html(datos);
				}
			})
	})
</script>