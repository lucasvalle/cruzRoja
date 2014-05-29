<form  action="controller/Administrador.php" method="POST" role="form" id="frmAdmin">
			<legend>Nuevo Administrador</legend>
			<div id="error" class="alert alert-danger ocultar"></div>
			<div id="success" class="alert alert-success ocultar"></div>
			<div class="form-group">
				<label class="sr-only" for="">Nombre de Administrador</label>
				<small></small>
				<input name="nombre" type="text" validar min="5" max="30" required="required" class="form-control" id="" placeholder="Nombre del nuevo adminsitrador">
			</div>

			<div class="form-group">
				<label class="sr-only" for="">Usuario</label>
				<small></small>
				<input type="text" name="user" validar min="5" max="15" id="input" class="form-control" value="" required="required" placeholder="Usuario" title="">
			</div>

			<div class="form-group">
				<label class="sr-only" for="">Contraseña</label>
				<small></small>
				<input pass type="password" name="pass" validar min="5" max="15" id="input" class="form-control" value="" required="required" placeholder="contraseña" title="">
			</div>

			<div class="form-group">
				<label class="sr-only" for="">Confirmar Contraseña</label>
				<small></small>
				<input  confirm type="password" name="pass2" validar min="5" max="15" id="input" class="form-control" value="" required="required" placeholder="vuelve a escribir la contraseña" title="">
			</div>
			<input type="hidden" name="new">
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
		</form>
<script>
(function($){
	$("#frmAdmin").on("submit", function(e){
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
						if(datos.errorName)
							$("#error").append("<li>"+datos.errorName).fadeIn()

						if(datos.errorUser)
							$("#error").append("<li>"+datos.errorUser).fadeIn()

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