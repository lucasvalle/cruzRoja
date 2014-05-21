<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Reporte General"); 
	?>
	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3  ">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Filtro de Egresos por Fecha</h3>
			</div>
			 	<form action="print/reporteGeneraldeEgresosporFecha" id="frmConsultaMensual" method="post">
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
	<div id="view">
	</div>
	<?php $template->makeFooter() ?>
	<script>
		(function($){
				$("form").on("submit",function(e){
					e.preventDefault();
					var action=$(this).attr("action");
					var campos=$(this).serialize();
							/*envio de datos al servidor*/
						$.ajax({
							url:action,
							data:campos,
							type:'POST',
							success:function(datos){
								$("#view").html(datos)
							},
							error:function(){
								alert("No se ha podido procesar la informacion, intentalo mas tarde");
							}
						})
				})
		}(jQuery))
	</script>