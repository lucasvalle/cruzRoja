<?php 
require_once 'Manager.php';
$tabla="curacionlocal";
/**
* 
*/
class Local extends Manager
{
	
	function getCasoName($IdCasos)
	{
		$caso=new Manager();
		$caso->consultar("select * from  casos where IdCasos=$IdCasos");
		$row=$caso->resultado();
		return $row->NombreCaso;
	}
}

if(isset($add)){
	$nuevo=new Manager();
			if($nuevo->crud("insert into $tabla values('','$Caso','$Diagnostico','$nombre','$Edad','$Socorrista','$Fecha')"))
				$msg["insert"]="se Inseto correctamente";
			else
				$msg["errorInsert"]="No se pudo insertar el registro";
	echo json_encode($msg);
}
 ?>