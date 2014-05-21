<?php 
require_once 'Template.php';
require_once 'controller/Manager.php';
$template=new Template();
$template->makeHeader("Administradores"); 
$datos=new Manager();
$datos->consultar("select * from administradores where idAdmin<>$idAdmin");
?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-7 col-md-7">
		<?php if($datos->contar("select * from administradores where idAdmin<>$idAdmin")>0): ?>
		<ul class="list-group">
			<?php while($row=$datos->resultado()): ?>
			<li class="list-group-item">
						<p class="pull-right">
							<a href="<?=$row->idAdmin?>" class="btn btn-success edit"><i class="fa fa-edit"></i></a>
							<a href="<?=$row->idAdmin?>" data-name="<?=$row->nombre?>" class="btn btn-danger delete"><i class="fa fa-trash-o"></i></a>	
						</p>
						<h3 class="list-group-item-heading"><?=$row->nombre?></h3>
							<p class="list-group-item-text"><?=$row->user?></p>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php else: ?>
		<div class="alert alert-info">
			<h3>Información</h3>
			<p>no hay más administadores registrados</p>
		</div>
		<?php endif; ?>
	</div>
	<div class="col-lg-5 col-md-5" id="load">
		
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		//cargar el formulario de registro de administradores
		loadPage('administradores-add','#load');
			$(document).find(".alert").fadeIn()
		
	
		$( document ).on( 'click','a.edit',function(e){
			e.preventDefault();
			$this=$(this);
			var id=$this.attr("href")
			loadPage('administradores-upd?id='+id,'#load');
			$this.parent().parent().addClass("active")
		})

		$(document).on('click','a.delete',function(e){
			e.preventDefault();
			$this= $(this);
			var id=$this.attr("href");
			var nombre=$this.data("name");
				if(confirm("esta seguro que desea eliminar al administrador:\n " +nombre)){
					$.ajax({
						url:'controller/Administrador.php?del&id='+id,
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