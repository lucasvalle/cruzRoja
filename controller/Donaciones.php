<?php 
require_once 'Manager.php';
$tabla="donativo";
/**
* 
*/
class Donacion extends Manager
{
	
	public function cuentaDonacion()
	{
		$this->consultar("select * from conceptocuenta where concepto like '%Donaci%'");
		$row=$this->resultado();
		return $row->idCta;
	}

	public function Total($mes)
	{
		$this->consultar("SELECT SUM(Cantidad) as total FROM donativo WHERE month(Fecha)=$mes");
		$row=$this->resultado();
		return number_format($row->total,2);
	}
}

/*Registrar nuevo*/
if(isset($add)){
	$nuevo=new Manager();
	$hoy=date("Y-m-d");
	$f=0;
	/*buscar para que no se repita en la base de datos*/
	$total=$nuevo->contar("select * from $tabla where nDocumento='$nDocumento'");

	if(strtotime($hoy) < strtotime($Fecha)){
		$msg["errorFecha"]="no se permiten fechas futuras";
		$f++;
	}

	if($total>0)
		$msg["errorDocumento"]="Ya existe";
	
	if($total+$f==0):
			if($nuevo->crud("insert into $tabla values('','$nDocumento','$Donante','$Cantidad','$DUI','$NIT','$Fecha')")):
				$msg["insert"]="se Inseto correctamente";
			$nuevo->crud("insert into contabilidad values('','$Fecha','$idCta','$nDocumento','$Cantidad','0')");
			else:
				$msg["errorInsert"]="No se pudo insertar el registro";
			endif;
	endif;
	echo json_encode($msg);
}
 ?>