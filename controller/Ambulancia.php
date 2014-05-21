<?php 
require_once 'Manager.php';
$tabla="ambulancia";

if(isset($add)){
$amb=new Manager();
if($amb->contar("select * from $tabla where Placa='$Placa'")>0):
	$msg["errorPlaca"]="Nº de Placa ya existe";
else:
	if($amb->crud("insert into $tabla values('','$Placa','$Marca','$Modelo','$Anio','$Kilometraje')"))
		$msg["insert"]="Se inserto correctamente";
	else
		$msg["noInsert"]="No se pudo Registrar la Ambulancia";
endif;
echo json_encode($msg);
}


/*
***** modificar registros de la base de datos
*/

if(isset($upd)){
$amb=new Manager();
if($amb->contar("select * from $tabla where Placa='$Placa' and idAmbulancia<>$id")>0):
	$msg["errorPlaca"]="Nº de Placa ya existe";
else:
	if($amb->crud("update $tabla set Placa='$Placa', Marca='$Marca', Modelo='$Modelo', Anio='$Anio', Kilometraje='$Kilometraje' where idAmbulancia=$id"))
		$msg["insert"]="Se Modifico correctamente";
	else
		$msg["noInsert"]="No se pudo Modificar los datos de la Ambulancia";
endif;
echo json_encode($msg);
}

/*
*****
*/

if(isset($del)){
	$administrador=new Manager();
	echo $administrador->delete("delete from $tabla where idAmbulancia=$id");
}
 ?>