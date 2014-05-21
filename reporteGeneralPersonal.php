<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aqui inicia el contenido -->
<div id="view">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
			<div class="alert alert-info">
				<p>Cargando informacion espere un momento</p>
			</div>
		</div>
	</div>
</div>


<!-- fin del contenido -->
<?php $template->makeFooter(); ?>

<script>
	(function($){
		loadPage("print/reporteGeneralPersonal.php","#view");
	}(jQuery))
</script>