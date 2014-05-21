<?php 
require_once 'controller/Manager.php';
$mod=new Manager();
$mod->consultar("select * from administradores where idAdmin=$id");
$row=$mod->resultado();

 ?>
<form  action="controller/Administrador.php" method="POST" role="form" id="frmAdmin">
			<legend>Actualizar Administrador</legend>
			<div id="error" class="alert alert-danger ocultar"></div>
			<div id="success" class="alert alert-success ocultar"></div>
			<div class="form-group">
				<label class="sr-only" for="">Nombre de Administrador</label>
				<small></small>
				<input value="<?=$row->nombre?>" name="nombre" type="text" validar min="5" max="30" required="required" class="form-control" id="" placeholder="Nombre del nuevo adminsitrador">
			</div>

			<div class="form-group">
				<label class="sr-only" for="">Usuario</label>
				<small></small>
				<input value="<?=$row->user?>" type="text" name="user" validar min="5" max="15" id="input" class="form-control" value="" required="required" placeholder="Usuario" title="">
			</div>

			<div class="form-group">
				<label class="sr-only" for="">Contraseña</label>
				<small></small>
				<input pass type="pass" name="pass" validar min="5" max="15" id="input" class="form-control" value="" placeholder="contraseña" title="">
			</div>

			<div class="form-group">
				<label class="sr-only" for="">Confirmar Contraseña</label>
				<small></small>
				<input  confirm type="pass" name="pass2" validar min="5" max="15" id="input" class="form-control" value="" placeholder="vuelve a escribir la contraseña" title="">
			</div>
			<input type="hidden" name="modificar">
			<input type="hidden" name="id" value="<?=$id?>">
			<button type="submit" class="btn btn-primary btn-lg "><i class="fa fa-save"></i> Guardar</button>
			<a href="#" cancelar class="btn btn-default btn-lg"><i class="fa fa-times"></i>Cancelar</a>

		</form>
<script>
(function($){
	$('a[cancelar]').on('click',function(e){
		e.preventDefault()
		location.reload()
	})
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

						if(datos.noUpdate)
							$("#error").append("<li>"+datos.noUpdate).fadeIn()

						if(datos.update){
							$("#success").append("<li>"+datos.update).fadeIn()	
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