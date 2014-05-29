<?php 
require_once 'controller/Listas.php';
 ?>
<form action="controller/Turnos.php" method="post" id="frmTurno">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Formulario</h3>
				  </div>
				  <div class="panel-body">
				  	<div class="alert alert-success ocultar" id="success"></div>
				  	<div class="alert alert-danger ocultar" id="error"></div>
						<div class="row">
							<div class="col-lg-6">
								<label for="">Carnet:</label>
								<small></small>
								<input list="Carnets" validar required="required" type="text" name="Carnet" id="input" class="form-control" value="" required="required" title="423-02" pattern="^423\-[0-9]{2,3}$">
							</div>
							<div class="col-lg-6">
								<label for="">Brigada de turno:</label>
								<select name="BrigadaTurno" class="form-control" id="">
									<?php getBrigadas() ?>
								</select>
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="">Horas laboradas:</label>
								<small></small>
								<input validar horas required="required" type="text" name="HorasLaboradas" id="input" class="form-control" value="" required="required" title="">
							</div>
						
							<div class="col-lg-6">
								<label for="">Fecha:</label>
								<small></small>
								<input validar required="required" type="date" name="Fecha" id="input" class="form-control" value="" required="required" title="">
							
							</div>
						</div>	
				  </div>
				  <div class="panel-footer" align="center">
				  	<input type="hidden" name="add">
				  	<button class="btn btn-info btn-block btn-lg"><i class="fa fa-save "></i> Guardar</button>
				  </div>
			</div>
		</form>

<script>
	(function($){
		$("#frmTurno").on("submit",function(e){
		e.preventDefault();
		$("#error, #success").html("").fadeOut()
		var action=$(this).attr("action");
		var campos=$(this).serialize();
				/*envio de datos al servidor*/
			$.ajax({
				url:action,
				data:campos,
				dataType:"json",
				type:'POST',
				success:function(datos){
					if(datos.fail)
						$("#error").append("<li>"+datos.fail).fadeIn()

					if(datos.errorFecha)
						$("#error").append("<li>"+datos.errorFecha).fadeIn()

					if(datos.noExiste)
						$("#error").append("<li>"+datos.noExiste).fadeIn()

					if(datos.errorInsert)
						$("#error").html(datos.fail).fadeIn()

					if(datos.insert){
						$("#success").html(datos.insert).fadeIn()
						location.reload()
					}
				},
				error:function(){
					alert("No se ha podido procesar la informacion, intentalo mas tarde");
				}
			})
		})
	}(jQuery))
</script>