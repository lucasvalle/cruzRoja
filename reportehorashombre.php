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
				<h3 class="panel-title">Datos de la búsqueda mensual</h3>
			</div>
			 	<form action="print/reporteHorashombre.php" id="frmConsultaMensual" method="post">
			 		<div class="panel-body" align="center">
					<div class="row">
						<div class="col-lg-6">
							<label for="">Desde:</label>
							<input type="date" name="desde" id="desde" class="form-control" value="" required="required" title="">
						</div>
						<div class="col-lg-6">
							<label for="">Hasta:</label>
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

<div id="view">
	
</div>


<!-- fin del contenido -->
<?php $template->makeFooter(); ?>

<script>
	(function($){
		//loadPage("print/reporteHorashombre.php","#view");

		$("form").on("submit",function(e){
			e.preventDefault();
				$.ajax({
					url:$(this).attr("action"),
					data:$(this).serialize(),
					beforeSend:function(){
						$("#view").html("Cargando los resultados Espera un momento")
					},
					success:function(datos){
						$("#view").html(datos);
					}
				})
		})
	}(jQuery))
</script>