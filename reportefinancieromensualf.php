<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Reporte Financanciero por Fecha"); 
	?>
	<div class="row">
	    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3  ">
		<div class="panel panel-info">
			 <div class="panel-heading">
				<h3 class="panel-title">Reporte financiero por Fecha</h3>
			</div>
			 	<form action="print/reporteFinancieroGeneralporFecha" id="frmConsultaMensual" method="post">
			 		<div class="panel-body" align="center">
					<div class="row">
						<div class="col-lg-6">
							<label for="">Desde:</label>
							<input type="date" name="desde" id="desde" class="form-control" value="" required="required" title="">
						</div>
						<div class="col-lg-6">
							<label for="">Hasta:</label>
							<input type="date" name="hasta" id="hasta" class="form-control" value="" required="required" title="">
						</div>
					</div>
				 </div>
			 <div class="panel-footer" align="center">
				  	<button type="submit" class="btn btn-info btn-block btn-lg"><i class="fa fa-search"></i> Mostrar resultados</button>
			  </div>
			 	</form>
		</div>
    </div>
</div>
	<div id="view">
		
	</div>
	<?php $template->makeFooter() ?>
	<script>
		(function($){
				//loadPage("print/reporteFinancieroGeneralporFecha.php","#view")
				$("form").on("submit",function(e){
					e.preventDefault();
					$this=$(this);
						$.ajax({
							url:$this.attr("action"),
							data:$this.serialize(),
							beforeSend:function(){
								$("#view").html("<h3 class='text-center'>Generando Reporte espera un momento</h3>")
							},
							success:function(datos){
								$("#view").html(datos)
							}
						})
				})
		}(jQuery))
	</script>