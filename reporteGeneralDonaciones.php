<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Reporte "); ?>
<!-- aqui inicia el contenido -->

<div class="row" id="view">
	<div class="row">
	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Espere...</h3>
				<p>Buscando en la base de datos</p>
			</div>
			 	
		</div>
	</div>
</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		loadPage("print/reporteGeneralDonaciones.php",'#view');
	}(jQuery))
</script>