<form action="controller/Ambulancia.php" id="frmAmbulanciaNew">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 >Nueva Ambulancia</h3>
				  </div>
				  <div class="panel-body">
				  		<div class="alert alert-danger ocultar" id="error"></div>
				  		<div class="alert alert-success ocultar" id="success"></div>
						<div class="row">

							<div class="col-lg-6 col-md-6">
								<label  for="">Placa:</label>
								<small></small>
								<input validar type="text" required="required" min="4" max="6" pattern="^CR [0-9]{1,3}$" title="CR 000" name="Placa" id="input" class="form-control" placeholder="Introduce la placa">
							</div>
							<div class="col-lg-6 col-md-6">
								<label  for="">Marca:</label>
								<small></small>
								<input  validar type="text" name="Marca" id="input" class="form-control" value="" required="required" >
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<label for="">Modelo</label>
								<small></small>
								<input validar type="text" name="Modelo" id="input" class="form-control" value="" required="required"  title="">
							</div>
						

							<div class="col-lg-6 col-md-6">
							<label for="">Año</label>
							<small></small>
								<input  validar  anio type="text" name="Anio" id="input" class="form-control"  required="required" pattern="^[0-9]{2,4}" title="97 ó 1997">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<label for="">Kilometraje</label>
								<small></small>
								<input validar type="text" name="Kilometraje" id="input" class="form-control" value="" required="required" pattern="^[0-9]{2,7}" title="10 ó 32540">
							</div>
						</div>

				  </div>
				  <div class="panel-footer" align="center">
				  	<input type="hidden" name="add">
				  	<button type="submit" class="btn btn-info btn-lg"><i class="fa fa-save"></i> Guardar</button>
				  </div>
			</div>
		</form>
<script>
	(function($){
		$(document).on('submit','#frmAmbulanciaNew',function(e){
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
						if(datos.errorPlaca)
							$("#error").append("<li>"+datos.errorPlaca).fadeIn()

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