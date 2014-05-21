<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-12">
		<form action="">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h4>Formulario</h4>
				  </div>
				  <div class="panel-body">
				  		
						<div class="row">

							<div class="col-lg-6">
								<label for="">Carnet:</label>
								<input type="text" name="" id="input" class="form-control" value="" required="required" title="">
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="">Nombres:</label>
								<input type="text" name="" id="input" class="form-control" value="" required="required" title="">
							</div>
							<div class="col-lg-6">
								<label for="">Apellidos:</label>
								<input type="text" name="" id="input" class="form-control" value="" required="required" title="">
							</div>
						
						</div>
						
						<div class="row">
							<div class="col-lg-6">
								<label for="">Cargo:</label>
								<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
							
							</div>
						</div>	
						<div class="row">
							<div class="col-lg-6">
								<label for="">Brigada:</label>
								<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
							</div>
							<div class="col-lg-6">
								<label for="">Activo:</label>
								<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
							</div>
						</div>

				  </div>
				  <div class="panel-footer" align="center">
				  	<button class="btn btn-info"><i class="fa fa-save fa-spin"></i> Guardar</button>
				  	<button class="btn btn-danger"><i class="fa fa-times fa-spin"></i> Cancelar</button>

				  </div>
			</div>
		</form>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>