<?php 
require_once 'Manager.php';
$tabla="administradores";

if(isset($new)){
$add=new Manager();
$error=0;
if($add->contar("select * from $tabla where nombre='$nombre'")>0):
	$msg["errorName"]="el nombre ya esta registrado";
	$error++;
endif;

if($add->contar("select * from $tabla where user='$user'")>0):
	$msg["errorUser"]="el Usuario ya esta registrado";
	$error++;
endif;
echo mysql_error();
if($error==0):
	$pass=trim(md5($pass));
	if($add->crud("insert into $tabla values('','$nombre','$user','$pass')"))
		$msg["insert"]="El registro fue insertado correctamente";
	else
		$msg["noinset"]="no se pudo insertar el registro en la base de datos";
endif;
echo json_encode($msg);
}


if(isset($modificar)){
$add=new Manager();
$error=0;
if($add->contar("select * from $tabla where nombre='$nombre' and idAdmin<>$id")>0):
	$msg["errorName"]="el nombre ya esta registrado";
	$error++;
endif;

if($add->contar("select * from $tabla where user='$user' and idAdmin<>$id")>0):
	$msg["errorUser"]="el Usuario ya esta registrado";
	$error++;
endif;
echo mysql_error();
if($error==0):
	if($pass!==""):
		$pass=trim(md5($pass));
		$sql="update $tabla set nombre='$nombre', user='$user', pass='$pass' where idAdmin=$id";
	else:
		$sql="update $tabla set nombre='$nombre', user='$user' where idAdmin=$id";
	endif;

		if($add->crud($sql))
			$msg["update"]="El registro fue Modificado correctamente";
		else
			$msg["noUpdate"]="no se pudo Modificar el registro de la base de datos";
endif;
echo json_encode($msg);
}

if(isset($del)){
	$administrador=new Manager();
	echo $administrador->delete("delete from $tabla where idAdmin=$id");
}

if(isset($seguridad)){
	$escudo=new Manager();
	$pass=trim(md5($pass));
	if($escudo->contar("select * from administradores where idAdmin=$id and pass='$pass'")>0)
		{
			$msg["ok"]="si se encontro";
			@session_start();
			$_SESSION["respaldo"]="true";
		}
	else
		$msg["no"]="no se encontro";


	echo json_encode($msg);
}
 ?>