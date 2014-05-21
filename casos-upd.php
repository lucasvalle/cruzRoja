<?php 
require_once 'controller/Manager.php';
$modificar=new Manager();
$modificar->consultar("select *  from casos where IdCasos=$id");
$row=$modificar->resultado();
echo mysql_error();
 ?>
<h3>Actualizar Caso:</h3>
<form action="controller/Casos.php" id="frmCasoupd">
	<div class="panel panel-info">
		  <div class="panel-heading">
				<h3 class="panel-title">Modificar datos de  Caso</h3>
		  </div>
		  <div class="panel-body">
		  	<div class="alert alert-success ocultar" id="success"></div>
		  	<div class="alert alert-danger ocultar" id="error"></div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Nombre de Caso</label>
						<small></small>
						<input validar  type="text" name="NombreCaso" id="NombreCaso" class="form-control" value="<?=$row->NombreCaso?>" required="required" title="">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Descripcion</label>
						<small></small>
						<input validar type="text" name="Descripcion" id="Descripcion" class="form-control" value="<?=$row->Descripcion?>" required="required"  title="">
					</div>
				</div>
		  </div>
		  <div class="panel-footer" align="center">
		  	<input type="hidden" name="upd">
		  	<input type="hidden" name="id" value="<?=$id?>">
		  	<button type="submit" class="btn btn-info btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
		  	<a href="casos" class="btn btn-danger btn-block btn-lg"><i class="fa fa-times-circle"></i></a>
		  </div>
	</div>
</form>
<script>
	(function($){
		$(document).on("submit","#frmCasoupd",function(e){
			e.preventDefault();
			$("#error, #success").html("").fadeOut()
			if ($('form small').is(':visible'))
				alert("hay errores en  el formulario, por favor verifiquelos");
			else{
			var action=$(this).attr("action");
			var campos=$(this).serialize();
					/*envio de datos al servidor*/
				$.ajax({
					url:action,
					data:campos,
					dataType:"json",
					type:'POST',
					success:function(datos){
						if(datos.errorCaso)
							$("#error").append("<li>"+datos.errorCaso).fadeIn()

						if(datos.noInsert)
							$("#error").append("<li>"+datos.noInsert).fadeIn()
						
						if(datos.insert){
							$("#success").append("<li>"+datos.insert).fadeIn()
							location.reload();
						}
					},
					error:function(){
						alert("No se ha podido procesar la informacion, intentalo mas tarde");
					}
				})
			}
		})
	}(jQuery))
</script>