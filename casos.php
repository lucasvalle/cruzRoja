<?php 
require_once 'controller/Manager.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("Casos...."); 

$casos=new Manager();
$sql="select * from casos order by NombreCaso ASC";
$casos->consultar($sql);
?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-5 col-md-5" id="view">
		<!-- formulario para modificar y registrar cuentas -->
	</div>
	<div class="col-lg-7 col-md-7">
		<table class="table table-condensed table-responsive table-hover">
			<hhead>
				<tr>
					<th class="col-lg-2 col-md-3">Caso</th>
					<th class="col-lg-8 col-md-6">Descripcion</th>
					<th class="col-lg-2 col-md-3"></th>
				</tr>
			</hhead>
			<tbody>
				<?php 
				if($casos->contar($sql)>0):
				while($row=$casos->resultado()):
						?>
				<tr>
					<td><?=$row->NombreCaso?></td>
					<td><?=($row->Descripcion=="" ? "..." : $row->Descripcion)?></td>
					<td>
						<a href="<?=$row->IdCasos?>" class="btn btn-warning edit"><i class="fa fa-pencil"></i></a>
						<a href="<?=$row->IdCasos?>" data-name="<?=$row->NombreCaso?>" class="btn btn-danger delete"><i class="fa fa-trash-o"></i></a>
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
		loadPage("casos-add.php","#view");
		
		$(document).on("click","a.edit",function(e){
			$("*").removeClass("success")
			e.preventDefault();
			var $this=$(this);
			var id=$this.attr("href");
			loadPage("casos-upd.php?id="+id,'#view');
			$this.parent().parent().addClass("success")
		})

	$(document).on("click","a.delete",function(e){
				var $this=$(this)
				var id=$this.attr("href");
				e.preventDefault();
					if(confirm("esta seguro que desea eliminar el registro:" + $this.data("name") )){
						$.ajax({
							url:'controller/Casos.php?del&id='+id,
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