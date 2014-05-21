<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Reporte General"); 

	?>
	<div id="view">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
				<div class="alert alert-info">
					<p class="text-center">espere un momento, se estan cargando los resultados</p>
				</div>
			</div>
		</div>
	</div>
	<?php $template->makeFooter() ?>
	<script>
		(function($){
				$.ajax({
					url:'print/reporteGeneraldeEgresos',
					success:function(datos){
						$("#view").html(datos)
					}
				})
		}(jQuery))
	</script>