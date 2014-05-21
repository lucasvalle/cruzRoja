<?php 
require_once 'Manager.php';
$tabla="conceptocuenta";
if(isset($add)){
	$nuevo=new Manager();
	/*buscar para que no se repita en la base de datos*/
	$totalCta=$nuevo->contar("select * from $tabla where CtaContable='$CtaContable'");
	$totalConcepto=$nuevo->contar("select * from $tabla where concepto='$concepto'");

	if($totalCta>0)
		$msg["errorCta"]="La cuenta ya esta registrada";

	if($totalConcepto>0)
		$msg["errorConcepto"]="El concepto de la cuenta ya existe";
	
	if($totalCta+$totalConcepto==0):
			if($nuevo->crud("insert into $tabla values('','$CtaContable','$concepto')"))
				$msg["insert"]="se Inseto correctamente";
			else
				$msg["errorInsert"]="No se pudo insertar el registro";
	endif;
	echo json_encode($msg);
}

if(isset($mod)){
	$actualizar=new Manager();
	/*buscar para que no se repita en la base de datos*/
	$totalCta=$actualizar->contar("select * from $tabla where CtaContable='$CtaContable' and idCta<>$id");
	$totalConcepto=$actualizar->contar("select * from $tabla where concepto='$concepto' and idCta<>$id");

	if($totalCta>0)
		$msg["errorCta"]="La cuenta ya esta registrada";

	if($totalConcepto>0)
		$msg["errorConcepto"]="El concepto de la cuenta ya existe";
	
	if($totalCta+$totalConcepto==0):
			if($actualizar->crud("update $tabla set CtaContable='$CtaContable', concepto='$concepto' where idCta=$id"))
				$msg["insert"]="se Modifico correctamente";
			else
				$msg["errorInsert"]="No se pudo Modificar el registro";
	endif;
	echo json_encode($msg);
}

if(isset($del)){
	$personal=new Manager();
	if($personal->delete("delete from $tabla where idCta=$id"))
		echo true;
	else
		echo false;
	echo mysql_error();
}
 ?>