<?php 
require_once 'controller/Manager.php';
$cuenta=new Manager();
$cuenta->consultar("select * from conceptocuenta where idCta=$id ");
$row=$cuenta->resultado();
 ?>
<form action="controller/Catalogo.php?mod" id="frmCata">
	<div class="panel panel-info">
		  <div class="panel-heading">
				<h3 class="panel-title">Modificar Cuenta</h3>
		  </div>
		  <div class="panel-body">
		  	<div class="alert alert-success ocultar" id="success"></div>
		  	<div class="alert alert-danger ocultar" id="error"></div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Cuenta contable:</label>
						<small></small>
						<input validar  type="text" name="CtaContable" id="CtaContable" class="form-control" value="<?=$row->CtaContable?>" required="required" min="1" max="8" pattern="[0-9]+" title="">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Concepto:</label>
						<small></small>
						<input validar type="text" name="concepto" id="concepto" class="form-control" value="<?=$row->concepto?>" required="required"  title="">
					</div>
				</div>
		  </div>
		  <div class="panel-footer" align="center">
			<input type="hidden" name="id" value="<?=$id?>">
		  	<button type="submit" class="btn btn-info btn-block btn-lg"><i class="fa fa-save"></i> Guardar</button>
		  	<a href="decalogo" class="btn btn-danger btn-block btn-lg"><i class="fa fa-times"></i> Cancelar</a>
		  </div>
	</div>
</form>
<script>
	(function($){
		$(document).on("submit","#frmCata",function(e){
			e.preventDefault();
			$("#error, #success").html("").fadeOut()
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
						if(datos.errorCta)
							$("#error").append("<li>"+datos.errorCta).fadeIn()

						if(datos.errorConcepto)
							$("#error").append("<li>"+datos.errorConcepto).fadeIn()

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