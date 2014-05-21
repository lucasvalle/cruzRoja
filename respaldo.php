<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aquí inicia el contenido -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<center>Respaldo de la Base de Datos </center>
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-md-4 text-center">
		<a href="#" class="btn btn-info btn-lg respaldo"><i class="fa fa-gear fa-3x pull-left"></i> Generar <br> Respaldo</a>
	</div>
	<div class="col-lg-6 col-md-6">
		<?php 
				$carpeta="respaldos/";
					$directorio=opendir($carpeta);
					while ($archivo = readdir($directorio)):
						if($archivo!=="." && $archivo!==".."):
							$files[]=$archivo;
						endif;
					endwhile;
					@arsort($files);
					if($files>0):
				 ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>nombre/Fecha/hora</th>
					<td></td>
				</tr>
			</thead>
			<tbody>
					<?php foreach ($files as $archivo):?>
						<tr>
							<td><?=$archivo?></td>
							<td>
								<a href="<?=$carpeta.$archivo?>" class="btn btn-info"><i class="fa fa-download"></i></a>
								<a href="<?=$archivo?>" class="btn btn-danger delete" ><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class="alert alert-info"><h3>información</h3><p>No se ha realizado ningun respalso de la base de datos</p></div>
		<?php endif ?>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		$("a.respaldo").on("click",function(e){
			e.preventDefault();
				$.ajax({
					url:'controller/Respaldo.php?respaldar',
					success:function(datos){
						if(datos)
							{
								alert("se creo satisfactoriamente")
								location.reload()
							}
						else
							alert("no se pudo crear el respaldo")
					}
				})
		})

		/*eliminar*/
		$("a.delete").on("click",function(e){
			e.preventDefault();
			$this=$(this);
			if(confirm("Esta seguro que desea eliminar el respaldo de la base de datos:\n"+ $this.attr("href"))){
				e.preventDefault();
					$.ajax({
						url:'controller/Respaldo.php?file='+$this.attr("href"),
						success:function(datos){
							if(datos)
								location.reload()
							else
								alert("no se pudo eliminar ningun archivo");
						}
					})
			}
		})
	}(jQuery))
</script>