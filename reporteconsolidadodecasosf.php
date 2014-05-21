<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- Inicio de la consulta -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center> Reporte consolidado de Casos por rango de Fecha</center>
		</h1>
		<h4 align="center">Cruz Roja. Seccional de Ciudad Arce</h4>
	</div>
</div> <br>

	
<!-- Inicio de la consulta -->
<div class="row">
	    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Datos de la búsqueda por rango de fechas</h3>
			</div>
			 	<form action="controller/ReporteDeCasosRango.php" id="frmConsultaRango" method="post">
			 		<div class="panel-body" align="center">
					<div class="row">
						<div class="col-lg-6">
							<label for="">Desde</label>
							<input type="date" name="desde" id="desde" class="form-control" value="" required="required" title="">
						</div>
						<div class="col-lg-6">
							<label for="">Hasta:</label>
							<small></small>
							<input type="date" name="hasta" id="hasta" class="form-control" value="" required="required" title="">
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
	$("#frmConsultaRango").on("submit",function(e){
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