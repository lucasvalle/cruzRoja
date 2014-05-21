<?php 
require_once 'controller/Manager.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); 

$ambulancia=new Manager();
$sql="select * from ambulancia";
$ambulancia->consultar($sql);
?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-5 col-md-5" id="view">
		
	</div>
	<div class="col-lg-7 col-md-7" >
		<?php if($ambulancia->contar($sql)>0): ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Marca</th>
					<th>Placa</th>
					<th>Modelo</th>
					<th class="text-center"><i class="fa fa-gear"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					while($row=$ambulancia->resultado()):
				?>
				<tr>
					<td><?=$row->Marca?></td>
					<td><?=$row->Placa?></td>
					<td><?=$row->Modelo?></td>
					<td class="col-lg-2 col-md-2">
						<a  href="<?=$row->idAmbulancia?>" class="btn btn-warning edit"><i class="fa fa-pencil"></i></a>
						<a href="<?=$row->idAmbulancia?>" data-placa="<?=$row->Placa?>" class="btn btn-danger delete"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				<?php endwhile;  ?>
			</tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info">
				<h3>Informacion</h3>
				<p>No se han encontrado Ambulancias en la base de datos</p>
			</div>
		<?php endif; ?>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		/*cargar la vista para registrar nuevas ambulancias*/
		loadPage('ambulancias-add.php','#view');

		/*cargar la vista para modificar los registros de las ambulancias*/
		$("a.edit").on("click",function(e){
			$("a.edit").parent().parent().removeClass("success")
			e.preventDefault();
			var $this=$(this)
			$this.parent().parent().addClass("success")
				loadPage("ambulancias-upd.php?id="+$this.attr("href"),"#view")
		})



		$(document).on("click","a.cancel",function(e){
			e.preventDefault()
			location.reload()
		})


		$(document).on('click','a.delete',function(e){
			e.preventDefault();
			$this= $(this);
			var id=$this.attr("href");
			var placa=$this.data("placa");
				if(confirm("esta seguro que desea eliminar el registro:\n " +placa)){
					$.ajax({
						url:'controller/Ambulancia.php?del&id='+id,
						success:function(datos){
							if(datos)
								location.reload()
							if(!datos)
								alert("no se pudo eliminar el registro, intentelo mas tarde")
						}
					})
				}
		})


	}(jQuery))
</script>