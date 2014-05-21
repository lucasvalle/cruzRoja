<?php 
require_once 'controller/Manager.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); 

$catalogo=new Manager();
$catalogo->consultar("select * from conceptocuenta order by CtaContable ASC");
?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center>Decalogo de cuentas </center>
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-5 col-md-5" id="view">
		<!-- formulario para modificar y registrar cuentas -->
	</div>
	<div class="col-lg-7 col-md-7">
		<table class="table table-condensed table-responsive table-hover">
			<hhead>
				<tr>
					<th>Cuenta</th>
					<th>Concepto</th>
					<th></th>
				</tr>
			</hhead>
			<tbody>
				<?php 
				if($catalogo->contar("select * from conceptocuenta order by CtaContable ASC")>0):
				while($row=$catalogo->resultado()):
						?>
				<tr>
					<td><?=$row->CtaContable?></td>
					<td><?=$row->concepto?></td>
					<td>
						<a href="<?=$row->idCta?>" class="btn btn-warning edit"><i class="fa fa-pencil"></i></a>
						<a href="<?=$row->idCta?>" data-name="<?=$row->concepto?>" class="btn btn-danger delete"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
						<?php
				endwhile;
				else:
				 ?>
				<tr>
					<td colspan="3">
						<div class="alert alert-info">No hay registros</div>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		//cargar el formulario para registrar cuentas
		loadPage("decalogo-add.php","#view");

		//cargar 
		$(document).on("click","a.edit",function(e){
			$("*").removeClass("success")
			e.preventDefault();
			var $this=$(this);
			var id=$this.attr("href");
			loadPage("decalogo-upd.php?id="+id,'#view');
			$this.parent().parent().addClass("success")
		})

	$(document).on("click","a.delete",function(e){
				var $this=$(this)
				var id=$this.attr("href");
				e.preventDefault();
					if(confirm("esta seguro que desea eliminar el registro:" + $this.data("name") )){
						$.ajax({
							url:'controller/Catalogo.php?del&id='+id,
							success:function(datos){
								if(datos==1){
									$this.parent().parent().fadeOut().remove()
								if($("table tbody tr").length < 1)
									location.reload()
								}
								else
									alert("no se ha podido eliminar ningun registro");
							}
						})	
					}
			})
	}(jQuery))
</script>