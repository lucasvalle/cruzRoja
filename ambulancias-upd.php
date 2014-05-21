<?php 
require_once 'controller/Manager.php';
$amb=new Manager();
$amb->consultar("select * from ambulancia where idAmbulancia=$id");
$row=$amb->resultado();
 ?>
<form action="controller/Ambulancia.php" id="frmAmbulancia">
			<div class="panel panel-danger">
				  <div class="panel-heading">
						<h3>Modificar Ambulancia</h3>
				  </div>
				  <div class="panel-body">
				  		<div class="alert alert-danger ocultar" id="error"></div>
				  		<div class="alert alert-success ocultar" id="success"></div>
						<div class="row">

							<div class="col-lg-6 col-md-6">
								<label  for="">Placa:</label>
								<small></small>
								<input validar type="text" required="required" min="5" max="7" pattern="^P[0-9]{5,7}" title="P000123" name="Placa" value="<?=$row->Placa?>" id="input" class="form-control" placeholder="Introduce la placa">
							</div>
							<div class="col-lg-6 col-md-6">
								<label  for="">Marca:</label>
								<small></small>
								<input  validar type="text" name="Marca" value="<?=$row->Marca?>" id="input" class="form-control"  required="required" >
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<label for="">Modelo</label>
								<small></small>
								<input validar type="text" name="Modelo" value="<?=$row->Modelo?>" id="input" class="form-control"  required="required"  title="">
							</div>
						

							<div class="col-lg-6 col-md-6">
							<label for="">Año</label>
							<small></small>
								<input  validar type="text" name="Anio" value="<?=$row->Anio?>" id="input" class="form-control"  required="required" pattern="^[0-9]{2,4}" title="97 ó 1997">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<label for="">Kilometraje</label>
								<small></small>
								<input validar type="text" name="Kilometraje" value="<?=$row->Kilometraje?>" id="input" class="form-control"  required="required" pattern="^[0-9]{2,7}" title="10 ó 32540">
							</div>
						</div>

				  </div>
				  <div class="panel-footer" align="center">
				  	<input type="hidden" name="upd">
				  	<input type="hidden" name="id" value="<?=$id?>">
				  	<button type="submit" class="btn btn-info btn-lg"><i class="fa fa-save"></i> Guardar</button>
				  	<a class="btn btn-default btn-lg cancel"><i class="fa fa-times  "></i> Cancelar</a>
				  </div>
			</div>
		</form>
<script>
	(function($){

		$(document).on('submit','#frmAmbulancia',function(e){
			$("#error, #success").html("").fadeOut()
			e.preventDefault();
			$("#error, #success").fadeOut().html("");
			if ($('form small').is(':visible')){
				alert("hay errores en  el formulario, por favor verifiquelos");
			}
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
						if(datos.errorPlaca)
							$("#error").append("<li>"+datos.errorPlaca).fadeIn()

						if(datos.noInsert)
							$("#error").append("<li>"+datos.noInsert).fadeIn()
						
						if(datos.insert){
							$("#success").append("<li>"+datos.insert).fadeIn()
							location.reload()
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