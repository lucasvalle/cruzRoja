<?php 
require_once 'Manager.php';
/**
* 
*/
class Servicio extends Manager
{
	
	function getCasos($id='')
	{
		$case=new Manager();
		$case->consultar("select * from casos order by NombreCaso ASC");
		while($row=$case->resultado()):
				?>
				<option
				<?=($id==$row->IdCasos ? "selected=\"selected\"" : "")?>
				 value="<?=$row->IdCasos?>"><?=$row->NombreCaso?></option>
				<?php
		endwhile;
	}

	public function getHospitales($nombre='')
	{
		/*ojo recuerda que estos datos se deben manjar con cuidado*/
		$hospitales=array(
			"Hospital Nacional Francisco Menéndez",
			"Unida de Salud Ahuachapán",
			"Unidad de Salud San Lorenzo",
			"Unidad de Salud Santa Ana"
			);
		foreach($hospitales as $hospital):
			?>
				<option
				<?=($nombre==$hospital ? "selected=\"selected\"" : "")?>
				 value="<?=$hospital?>"><?=$hospital?></option>
				<?php
		endforeach;
	}

	public function getMotorista($id='')
	{
		$motorista=new Manager();
		$motorista->consultar("select *  from personal where Cargo like '%Motorista'");
		while($row=$motorista->resultado()):
				?>
				<option
				<?=($id==$row->idEmpleado ? "selected=\"selected\"" : "")?>
				 value="<?=$row->idEmpleado?>"><?=$row->Nombre?></option>
				<?php
		endwhile;
	}

	public function getSocorrista($id='')
	{
		$motorista=new Manager();
		$motorista->consultar("select *  from personal where Cargo like '%Socorrista'");
		while($row=$motorista->resultado()):
				?>
				<option
				<?=($id==$row->idEmpleado ? "selected=\"selected\"" : "")?>
				 value="<?=$row->idEmpleado?>"><?=$row->Nombre?></option>
				<?php
		endwhile;
	}

	public function getAmbulancia($id='')
	{
		$ambulance=new Manager();
		$ambulance->consultar("select *  from ambulancia");
		while($row=$ambulance->resultado()):
				?>
				<option
				<?=($id==$row->idAmbulancia ? "selected=\"selected\"" : "")?>
				 value="<?=$row->idAmbulancia?>"><?=$row->Placa?></option>
				<?php
		endwhile;
	}
}

if(isset($add)){
	$nuevo=new Manager();
	$hoy=date("Y-m-d");
	$f=0;
	$total=0;
	/*buscar para que no se repita en la base de datos*/
	if($nDocumento!=""):
		$total=$nuevo->contar("select * from donativo where nDocumento='$nDocumento'");
	endif;

	if(strtotime($hoy) < strtotime($Fecha)){
		$msg["errorFecha"]="No se permite registrar Donaciones a fechas Futuras, verifique la fecha";
		$f++;
	}

	if($total>0)
		$msg["errorDocumento"]="Verifique el Numero del documento, este ya esta registrado";
	
	if($total+$f==0):
			if($nuevo->crud("insert into servicioambulancia values('','$Solicitante','$NombrePaciente','$NombreAcompanante','$Caso','$Diagnostico','$LugarServicio','$Motorista','$Socorrista1','$Socorrista2','$Hospital','$HoraSalida','$Horallegada','$Ambulancia','$Fecha')")):
				if($Cantidad!=""):
					if($nuevo->crud("insert into donativo values('','$nDocumento','$Donante','$Cantidad','$DUI','$NIT','$Fecha')")):
						if($nuevo->crud("insert into contabilidad values('','$Fecha','$idCta','$nDocumento','$Cantidad','0')"))
							$msg["insert"]="se Inseto correctamente";
					endif;
				endif;
			else:
				$msg["errorInsert"]="No se pudo insertar el registro";
			endif;
	endif;
	echo json_encode($msg);
}
 ?>