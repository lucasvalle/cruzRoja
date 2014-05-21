<?php 
require_once 'controller/Listas.php';
 ?>
 <h3>Nuevo Empledo</h3>
<form action="controller/Personal.php" id="frmPersonal">
		<label for="">Carnet</label>
		<small></small>
		<input validar required="required" type="text" name="Carnet" id="Carnet" class="form-control" placeholder="N. Carnét" value="423-" pattern="^423\-[0-9]{2,3}$" title="423-05">
		
		<label for="">Nombre</label>
		<small></small>
		<input validar required="required" type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" pattern="^[a-zA-ZñÑ ]{3,60}$" title="minimo 5 car.">
		
		<label for="">Cargo</label>
		<select name="Cargo" id="" class="form-control">
			<?php 	getCargos(); ?>
		</select>
		
		<label for="">Brigada</label>
		<select name="Brigada" id="" class="form-control">
				<?php getBrigadas() ?>
		</select>
		
		<label for=""></label>
		<input type="hidden" name="add">
		<button class="btn btn-info btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
</form>

<script>
	$("#frmPersonal").on("submit",function(e){
			$("small").html("").fadeOut()
			e.preventDefault();
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
						if(datos.errorCarnet)
							$("#Carnet").prev().html(datos.errorCarnet).fadeIn()

						if(datos.errorNombre)
							$("#Nombre").prev().html(datos.errorNombre).fadeIn()

						if(datos.insert){
							location.reload();
						}

						if(datos.errorInsert){
							alert(datos.errorInsert);
							location.reload();
						}


					},
					error:function(){
						alert("No se ha podido procesar la informacion, intentalo mas tarde");
					}
				})
			}
		})
</script>
	