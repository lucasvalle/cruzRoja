<?php 
require_once 'controller/Donaciones.php';
$cuenta = new Donacion();
 ?>
<form action="controller/Donaciones.php" id="frmDonacion" method="post">
		<h3>Registrar Donación</h3>
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Formulario</h3>
				  </div>
				  <div class="panel-body">
							<div class="alert alert-danger ocultar" id="error"></div>
							<div class="alert alert-success ocultar" id="success"></div>
						<div class="row">
							<div class="col-lg-6">
								<input type="hidden" value="<?=$cuenta->cuentaDonacion()?>" class="form-control" name="idCta">
								<label for="">Documento</label>
								<small></small>
								<input validar type="text" name="nDocumento" id="nDocumento " class="form-control" value="" required="required" pattern="^[0-9]+$" title="solo numeros">
							</div>
							
							
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label for="">Donante:</label>
								<small></small>
								<input type="text" name="Donante" id="Donante" class="form-control" validar value="" required="required" pattern="^[a-zA-Z ñÑ]+$" title=" solo letras">
							</div>
						
						</div>
						
						<div class="row">
							<div class="col-lg-6">
								<label for="">Cantidad:</label>
								<small></small>
								<input type="text" name="Cantidad" id="Cantidad" class="form-control" value="" validar required="required" pattern="^[0-9.\]+$" title="formato moneda">
							</div>
							<div class="col-lg-6">
								<label for="">DUI:</label>
								<small></small>
								<input type="text" name="DUI" id="DUI" class="form-control" value=""   pattern="^[0-9]{8}-[0-9]{1}$"  title="00000000-0" placeholder="xxxxxxxx-x">
							</div>
							
						</div>	
						
						<div class="row">
							<div class="col-lg-6">
								<label for="">NIT:</label>
								<small></small>
								<input type="text" name="NIT" id="NIT" class="form-control" value=""  title="xxxx-xxxxxx-xxx-x" pattern="^[0-9]{4}\-[0-9]{6}-[0-9]{3}-[0-9]{1}" placeholder="xxxx-xxxxxx-xxx-x">
							</div>
							<div class="col-lg-6">
								<label for="">Fecha del donativo:</label>
								<input type="date" name="Fecha" id="input" class="form-control" value="" required="required" title="Seleccione la fecha del donativo">
							</div>
						</div>
				  </div>
				  <div class="panel-footer" align="center">
				  	<input type="hidden" name="add">
				  	<button type="submit" class="btn btn-info btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
				  </div>
			</div>
		</form>
<script>
	(function($){
	$(document).on("submit","#frmDonacion",function(e){
		$("#error, #success").html("").fadeOut()
		e.preventDefault();
		$("#error, #success").fadeOut().html("");
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
					if(datos.errorFecha)
						$("#error").append("<li>"+datos.errorFecha).fadeIn()

					if(datos.errorDocumento)
						$("#error").append("<li>"+datos.errorDocumento).fadeIn()

					if(datos.noInsert)
						$("#error").append("<li>"+datos.noInsert).fadeIn()
					
					if(datos.insert){
						$("#success").html(datos.insert).fadeIn()
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