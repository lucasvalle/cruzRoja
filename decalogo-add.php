<form action="controller/Catalogo.php" id="frmCatalogo">
	<div class="panel panel-info">
		  <div class="panel-heading">
				<h3 class="panel-title">Nueva Cuenta</h3>
		  </div>
		  <div class="panel-body">
		  	<div class="alert alert-success ocultar" id="success"></div>
		  	<div class="alert alert-danger ocultar" id="error"></div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Cuenta contable:</label>
						<small></small>
						<input validar  type="text" name="CtaContable" id="CtaContable" class="form-control" value="" required="required" title="">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Concepto:</label>
						<small></small>
						<input validar type="text" name="concepto" id="concepto" class="form-control" value="" required="required"  title="">
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
		$(document).on("submit","#frmCatalogo",function(e){
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