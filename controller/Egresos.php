<?php 
require_once 'Manager.php';
$tabla="contabilidad";
/**
* 
*/
class Egreso extends Manager
{
	public function cuentaDonacion()
	{
		$this->consultar("select * from conceptocuenta where concepto like '%Donaci%'");
		$row=$this->resultado();
		return $row->idCta;
	}
	
	public function Total($mes)
	{
		$this->consultar("SELECT SUM(Egresos) as total FROM contabilidad WHERE month(Fecha)=$mes");
		$row=$this->resultado();
		return number_format($row->total,2);
	}

	public function getCuenta($id)
	{
		$this->consultar("select * from conceptocuenta where idCta=$id");
		$row=$this->resultado();
		return $row->concepto;
	}

	public function getCuentas($id='')
	{
		$donacion=$this->cuentaDonacion();
		$this->consultar("select * from conceptocuenta where idCta <> $donacion order by concepto asc");
		while($row=$this->resultado()):
				?>
				<option 
				<?=($row->idCta==$id ? "selected=\"selected\"" : "")?>
				value="<?=$row->idCta?>"><?=$row->concepto?></option>
				<?php
		endwhile;
	}

	public function Saldo()
	{
		$ingresos=new Manager();
		$egresos=new Manager();
		$ingresos->consultar("select SUM(Ingresos) as total from contabilidad");
		$egresos->consultar("select SUM(Egresos) as total from contabilidad");

		$rowIngresos=$ingresos->resultado();
		$rowEgresos=$egresos->resultado();
		return $rowIngresos->total-$rowEgresos->total;
	}
}

/*Registrar nuevo*/
if(isset($add)){
	$nuevo=new Manager();
	$hoy=date("Y-m-d");
	$f=0;
	/*buscar para que no se repita en la base de datos*/
	$totalDocument=$nuevo->contar("select * from $tabla where nDocumento='$nDocumento'");
	if(strtotime($hoy) < strtotime($Fecha)){
		$msg["errorFecha"]="no se permiten fechas futuras";
		$f++;
	}

	if($totalDocument>0)
		$msg["errorDocumento"]="Ya existe";
	
	if($totalDocument+$f==0):
			if($nuevo->crud("insert into $tabla values('','$Fecha','$CtaContable','$nDocumento','0','$Egresos')")):
				$msg["insert"]="se Inseto correctamente";
			else:
				$msg["errorInsert"]="No se pudo insertar el registro";
			endif;
	endif;
	echo json_encode($msg);
}
 ?>