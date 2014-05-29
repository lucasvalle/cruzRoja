<?php 
require_once 'controller/Servicios.php';
$interface=new Servicio();

$casos=new Manager();

require_once 'Template.php';
$template=new Template();
$template->makeHeader("Modificar Servicio Ambulancia"); 

/*buscar datos del servicio*/
$servicio=new Manager();
$servicio->consultar("select * from servicioambulancia where IdServicioAmbulancia=$id");
$row=$servicio->resultado();

?>
<!-- aqui inicia el contenido -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" align="center">
			Registro de servicio
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-success ocultar" id="success"></div>
		<div class="alert alert-danger ocultar" id="error"></div>
	</div>
</div>
<div class="row">
		<div class="col-lg-12 col-md-12">
			<?php if($casos->contar("select * from casos")>0): ?>
			<form action="controller/Servicios.php" method="post" id="frmServicios">
			<div class="row">
				<div class="col-lg-2 col-md-2"><label for="">Caso</label>
					<select name="Caso" id="Caso" class="form-control input-sm" required="required">
						<?php $interface->getCasos($row->Caso) ?>
					</select>
				</div>

				<div class="col-lg-4 col-md-4"><label for="">nombre del Paciente</label>
					<small></small>
					<input type="text" name="NombrePaciente" id="NombrePaciente" class="form-control input-sm" value="<?=$row->NombrePaciente?>" required="required" patterns="" title="">
				</div>

				<div class="col-lg-3 col-md-3"><label for="">Solicitante</label>
					<small></small>
					<input type="text" name="Solicitante" id="Solicitante" class="form-control input-sm" value="<?=$row->Solicitante?>">
				</div>
				<div class="col-lg-3 col-md-3"><label for="">Acompañarte</label>
					<small></small>
					<input type="text" name="NombreAcompanante" id="NombreAcompanante" class="form-control input-sm" value="<?=$row->NombreAcompanante?>">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<label for="">Diagnostico</label>
					<textarea class="form-control input-sm" name="Diagnostico" rows="4"><?=$row->Diagnostico?></textarea>
				</div>
				<div class="col-lg-6 col-md-6">
					<!-- <label for="">Lugar de Servicio</label> -->
					<!-- <input type="text" name="LugarServicio" id="LugarServicio" class="form-control input-sm" value="" required="required" patterns="" title=""> -->

					<label for="">Hospital de referencia</label>
					<select name="Hospital" id="Hospital" class="form-control input-sm" required="required">
						<?php $interface->getHospitales($row->Hospital) ?>
					</select>

				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<label for="">Motorista</label><small></small>
					<select name="Motorista" id="Motorista" class="form-control input-sm" required="required">
						<?php $interface->getMotorista($row->Motorista) ?>
					</select>
				</div>
				<div class="col-lg-2 col-md-2">
					<label for="">Ambulancia</label><small></small>
					<select name="Ambulancia" id="Ambulancia" class="form-control input-sm" required="required">
					<?php $interface->getAmbulancia($row->Ambulancia) ?>
					</select>
				</div>
				<div class="col-lg-3 col-md-3">
					<label for="">Hora de Salida</label>
					<small></small>
					<input type="time" name="HoraSalida" id="HoraSalida" class="form-control input-sm" value="<?=$row->HoraSalida?>" required="required" title="">
				</div>
				<div class="col-lg-3 col-md-3">
					<label for="">Hora de llegada</label>
					<small></small>
					<input type="time" name="Horallegada" id="Horallegada" class="form-control input-sm" value="<?=$row->Horallegada?>" required="required" title="">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<label for="">Socorrista 1</label><small></small>
					<select name="Socorrista1" id="Socorrista1" class="form-control input-sm" required="required">
						<?php $interface->getSocorrista($row->Socorrista1) ?>
					</select>
				</div>
				<div class="col-lg-4 col-md-4">
					<label for="">Socorrista 2</label><small></small>
					<select name="Socorrista2" id="Socorrista2" class="form-control input-sm" required="required">
						<?php $interface->getSocorrista($row->Socorrista2) ?>
						
					</select>
				</div>
				<div class="col-lg-4 col-md-4">
					<label for="">Fecha</label>
					<input type="date" name="Fecha" id="Fecha" class="form-control input-sm" value="<?=$row->Fecha?>" required="required" title="">
				</div>
			</div>
			
			<p></p>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
					<input type="hidden" name="upd">
					<input type="hidden" name="id" value="<?=$id?>">
					<button class="btn btn-info btn-lg"><i class="fa fa-refresh"></i> Actualizar</button>
					<a  href="servicios" class="btn btn-default btn-lg"><i class="fa fa-times"></i> Cancelar</a>
				</div>
			</div>
		</form>
	<?php else: ?>
	<div class="alert alert-danger">no hay casos registrados <a href="casos" class="btn btn-danger"><i class="fa fa-plus"></i> Nuevo Caso</a></div>
<?php endif; ?>
		</div>
</div>
<!-- fin del contenido -->
<?php $template->makeFooter() ?>
<script>
	(function($){
		$(document).on("submit","#frmServicios",function(e){
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
						if(datos.errorFecha)
							alert(datos.errorFecha)
						
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