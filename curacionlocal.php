<?php 
require_once 'Template.php';
require_once 'controller/Locales.php';
require_once 'controller/Servicios.php';
require_once 'controller/Listas.php';
$mes=date("m");

$template=new Template();
$template->makeHeader("titulo de la pagina web"); 

$CasosList=new Servicio();

$carnets=new Manager();
$carnets->consultar("select Carnet, Nombre from personal where Cargo=\"Socorrista\" and Activo=1 order by Carnet ASC");

/*mes actual*/
$mes=date("m");
$cases=new Local();
$sql="select * from curacionlocal where month(Fecha)=$mes";
$cases->consultar($sql);
$total=$cases->contar($sql);
?>
<!-- aqui inicia el contenido -->

<div class="row">
</div>
<div class="row">
	<div class="col-lg-4 col-md-4">
		<form action="controller/Locales.php" id="frmLocales" method="post">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Formulario</h3>
				  </div>
				  <div class="panel-body">
				  	<div class="alert alert-danger ocultar" id="error"></div>
				  	<div class="alert alert-success ocultar" id="success"></div>
				  	<label for="">caso</label>
				  	<small></small>
				  	<select name="Caso" id="Caso" class="form-control" required="required">
				  		<?php  $CasosList->getCasos() ?>
				  	</select>

				  	<label for="">Nombre</label><small></small>
				  	<input validar type="text" name="nombre" id="nombre" class="form-control" value="" required="required" pattern="^[a-zA-ZñÑ ]+$" title="solo letras">
					
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<label for="">Edad</label><small></small>
							<input type="text" name="Edad" id="Edad" class="form-control col-lg-4" value="" required="required" pattern="^[0-9]{1,2}" title="2, 10, 35">
						</div>
					</div>

				  	<label for="">Diagnostico</label>
				  	<textarea  validar name="Diagnostico" id="Diagnostico"  class="form-control" required="required"></textarea>
					
<datalist id="Carnets">
	<?php 
		while($row=$carnets->resultado()):
				?>
				<option value="<?=$row->Carnet?>" label="<?=$row->Nombre?>">
				<?php
		endwhile;
	 ?>
</datalist>				  	
					<label for="">Socorrista</label><small></small>
					<input list="Carnets" validar required="required" type="text" name="Socorrista" id="Socorrista" class="form-control" value="" required="required" title="423-02" pattern="^423\-[0-9]{2,3}$">


				  	<label for="">Fecha</label>
				  	<small></small>
				  	<input validar required="required" type="date" name="Fecha" id="Fecha" class="form-control" value=""  title="">


				  </div>
				  <div class="panel-footer" align="center">
				  	<input type="hidden" name="add">
				  	<button type="submit" class="btn btn-info btn-lg btn-block"><i class="fa fa-save"></i> Guardar</button>

				  </div>
			</div>
		</form>
	</div>
	<div class="col-lg-8 col-md-8">
		<h3><?=$total?>  Caso<?=($total>1 ? "s" : "")?> Atendidos en <?=getMesName($mes)?></h3>
				<?php if($total):  ?>
		<table class=" table table-condensed table-hover table-stiped table-bordered">
			<thead>
				<tr class="success">
					<th class="col-lg-3 col-md-3">nombre</th>
					<th class="col-lg-1 col-md-1">edad</th>
					<th class="col-lg-6 col-md-6">caso/diagnostico</th>
					<th class="col-lg-2 col-md-2">fecha</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row=$cases->resultado()): ?>
				<tr>
					<td><?=$row->nombre?></td>
					<td><?=$row->Edad?></td>
					<td><b><?=$cases->getCasoName($row->Caso)?></b>
						<br>
						<p><?=$row->Diagnostico?></p>
					</td>
					<td><?php echo date("d-m-Y") ?></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
		</table>
				<?php  else:?>
				<div class="alert alert-info">
					no se han atendido casos en este mes
				</div>
				<?php endif; ?>
	</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		$("#frmLocales").on("submit",function(e){
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
						if(datos.noInsert)
							$("#error").html(datos.noInsert).fadeIn()
						
						if(datos.insert){
							$("#success").html(datos.insert).fadeIn()
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