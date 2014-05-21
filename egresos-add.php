<?php 
require_once 'controller/Egresos.php';
$cuenta = new Egreso();
 ?>
<form action="controller/Egresos.php" id="frmDonacion" method="post">
		<h3>Registrar Egreso</h3>
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Formulario</h3>
				  </div>
				  <div class="panel-body">
							<div class="alert alert-danger ocultar" id="error"></div>
							<div class="alert alert-success ocultar" id="success"></div>
						<div class="row">
							<div class="col-lg-12">
								<label for="">Cuenta</label>
								<select name="CtaContable" id="CtaContable" class="form-control">
									<?php $cuenta->getCuentas() ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="">Documento:</label>
								<small></small>
								<input type="text" name="nDocumento" id="nDocumento" class="form-control" validar value="" required="required" pattern="^[0-9]+$" title=" solo Numeros">
							</div>
							<div class="col-lg-6">
								<label for="">Cantidad:</label>
								<small></small>
								<input type="text" validarSaldo data-saldo="<?=$cuenta->saldo()?>" name="Egresos" id="Egresos" class="form-control" validar value="" required="required" pattern="^[0-9\.]+$" title=" solo Numeros">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="">Fecha</label>
								<small></small>
								<input type="date" validar  required="required" name="Fecha"  id="Fecha" class="form-control" value=""  title="">
							</div>
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