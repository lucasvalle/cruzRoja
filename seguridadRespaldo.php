<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-4 col-md-4 col-lg-ofsset-4 col-md-offset-4">
		<div class="alert alert-danger">
			<label class="text-center">Debe identificarse para poder generar un respaldo a la base de datos actual</label>
			<hr>
			<form action="controller/Administrador">
				<label for="" class="success">INTRODUZCA SU CONTRASEÑA</label>
				<input type="hidden" name="id" id="id" class="form-control " value="<?=$_SESSION['idAdmin']?>">
				<input type="hidden" name="seguridad" id="seguridad" class="form-control " value="seguridad">
				<p></p>
				<small></small>
				<input validar type="password" name="pass" id="pass" class="form-control input-lg" required="required" >
				<p></p><button class=" btn btn-danger btn-block btn-lg">Confirmar</button>
			</form>
		</div>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		$("form").on("submit",function(e){
			e.preventDefault();
		var action=$(this).attr("action");
		var campos=$(this).serialize();
				/*envio de datos al servidor*/
			$.ajax({
				url:action,
				data:campos,
				dataType:"json",
				type:'POST',
				success:function(datos){
					if(datos.ok){
						location.replace("respaldo")
					}
					if(datos.no){
						alert("error en la contraseña")
					}
				},
				error:function(){
					alert("No se ha podido procesar la informacion, intentalo mas tarde");
					$('button[type=submit]').html("<i class=\"fa fa-save\"></i> error").removeClass("btn-info").addClass("btn-danger").attr("disabled","disabled")
				}
			})
		})
	}(jQuery))	
</script>