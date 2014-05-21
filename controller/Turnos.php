<?php 
require_once 'Manager.php';
$tabla="asistencia";
//registrar
if(isset($add)){
	$nuevo=new Manager();
	$hoy=date("Y-m-d");
	$f=0;
	$en=0;
	//validar para que no hayan fechas futuras
	if(strtotime($hoy) < strtotime($Fecha)){
		$msg["errorFecha"]="no se permiten fechas futuras";
		$f++;
	}
	/*buscar para que no se repita en la base de datos*/
	$total=$nuevo->contar("select * from $tabla where Carnet='$Carnet' and Fecha='$Fecha'");

	$empleado=$nuevo->contar("select * from personal where Carnet='$Carnet'");

	if($empleado==0){
		$en=1;
		$msg["noExiste"]="este carnet no existe en la base de datos";
	}

	if($total>0)
		$msg["fail"]="No pueden haber dos registros en la misma fecha";
	
	if($total+$f +$en==0):
			if($nuevo->crud("insert into $tabla values('','$Carnet','$BrigadaTurno','$HorasLaboradas','$Fecha')"))
				$msg["insert"]="se Inseto correctamente";
			else
				$msg["errorInsert"]="No se pudo insertar el registro";
	endif;
	echo json_encode($msg);
}
 ?>