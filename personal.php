<?php 
require_once 'controller/Manager.php';
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-8 col-md-8">
		<form action="controller/Personal.php" method="post" id="frmBuscar">
			<div class="input-group">
				<input autocomplete="off"  type="text" list="listname" required="required" name="dato" class="form-control input-lg" id="buscar" placeholder="nombre, Id, codigo">
				<datalist id="listname">
  					
				</datalist>
				<div class="input-group-btn">
					<input type="hidden" name="buscar">
					<button class="btn btn-success btn-lg"><i class="fa fa-search"></i></button>
					<a href="personal.php" class="btn btn-danger btn-lg"><fa class="fa fa-refresh"></fa></a>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-lg-8  col-md-8">
		<table class="table table-hover tabe-condensed">
			<thead>
				<tr>
					<th>Carnet</th>
					<th>Nombre</th>
					<th>Cargo</th>
					<th>Brigada</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>				
					<?php  
						$person=new Manager();
						$sql="select * from personal order by idEmpleado DESC";
						$person->consultar($sql);
						if($person->contar($sql)>0):
							while($row=$person->resultado()):
					  ?>
				<tr>
					<td><?=$row->Carnet?></td>
					<td><?=$row->Nombre?></td>
					<td><?=$row->Cargo?></td>
					<td><?=$row->Brigada?></td>
					<td><a  href="<?=$row->idEmpleado?>" class="estado btn btn-<?=($row->Activo==1) ? "success" : "danger"?>"><?=$row->Activo?></a></td>
					<td>
						<a href="<?=$row->idEmpleado?>" class="btn btn btn-warning edit"><i class="fa fa-pencil"></i></a>
						<a data-name="<?=$row->Nombre?>" href="<?=$row->idEmpleado?>" class="btn btn btn-danger delete"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				<?php 
				endwhile;
				else: ?>
				<tr>
					<td  colspan="7">
						<div class="alert alert-info">No hay personal en la base de datos</div>
					</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="col-lg-4 col-md-4" id="view">
		<!-- cargar el formulario para registrar nuevo personal -->
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>

<script>
	(function($){
		//vistar para registrar nuevos empleados
		loadPage('personal-add.php','#view');

		//cambiar el estado de un empleado
		$(document).on('click','a.estado',function(e){
			e.preventDefault();
			$this=$(this)
			var estado=$this.text();
			var id=$this.attr("href");
			var nuevoEstado=1
			var color="success"
			if(estado>0)
				nuevoEstado=0
			var data={
				"id":id,
				"estado":nuevoEstado
			}
				$.ajax({
					url:'controller/Personal.php',
					data:data,
					success:function(datos){
						if(datos){
							if(nuevoEstado>0)
								$this.removeClass("btn-danger").addClass("btn-success").html("1")
							else
								$this.removeClass("btn-success").addClass("btn-danger").html("0")
						}
					}
				})
		})

		//cargar la vista para modificar resgistros
		$(document).on("click","a.edit",function(e){
			$("*").removeClass("success")
			e.preventDefault();
			var $this=$(this);
			var id=$this.attr("href");
			loadPage("personal-upd.php?id="+id,'#view');
			$this.parent().parent().addClass("success")
		})

		$(document).on("click","a.delete",function(e){
			var $this=$(this)
			var id=$this.attr("href");
			e.preventDefault();
				if(confirm("esta seguro que desea eliminar el registro:" + $this.data("name") )){
					$.ajax({
						url:'controller/Personal.php?del&id='+id,
						success:function(datos){
							if(datos==true)
								$this.parent().parent().fadeOut().remove()
							if($("table tbody tr").length < 1)
								location.reload()
						}
					})	
				}
		})

		//buscar

		$("#frmBuscar").on("submit", function(e){
			e.preventDefault();
			var $this=$(this)
			var data=$this.serialize();
				$.ajax({
					url:$this.attr("action"),
					data:data,
					success:function(datos){
						$("tbody").html(datos)
					}
				})
		})

		/*mostrar ayuda al buscar un registro*/
		$("#buscar").on("keyup",function(e){
			e.preventDefault();
			var $this=$(this)
			var word=$this.val()
				$.ajax({
					url:'controller/Personal.php?lista&word='+word,
					success:function(datos){
						$this.next().html(datos)
					}
				})
		})
	}(jQuery))
</script>