<?php 
	require_once 'Manager.php';
	$tabla="casos";
	if(isset($add)){
		$nuevo=new Manager();
		/*buscar para que no se repita en la base de datos*/
		$total=$nuevo->contar("select * from $tabla where NombreCaso='$NombreCaso'");
	
		if($total>0)
			$msg["errorCaso"]="Ya existe el nombre del caso";
		
		if($total==0):
				if($nuevo->crud("insert into $tabla values('','$NombreCaso','$Descripcion')"))
					$msg["insert"]="se Inseto correctamente";
				else
					$msg["errorInsert"]="No se pudo insertar el registro";
		endif;
		echo json_encode($msg);
	}

if(isset($upd)){
		$nuevo=new Manager();
		/*buscar para que no se repita en la base de datos*/
		$total=$nuevo->contar("select * from $tabla where NombreCaso='$NombreCaso' and IdCasos<>$id");
	
		if($total>0)
			$msg["errorCaso"]="Ya existe el nombre del caso";
		
		if($total==0):
				if($nuevo->crud("update $tabla set NombreCaso='$NombreCaso',Descripcion='$Descripcion' where IdCasos=$id"))
					$msg["insert"]="Se Modifico Correctamente";
				else
					$msg["errorInsert"]="No se pudo Modificar el registro";
		endif;
		echo json_encode($msg);
	}

	if(isset($del)){
		$personal=new Manager();
		if($personal->delete("delete from $tabla where IdCasos=$id"))
			echo true;
		else
			echo false;
	}
 ?>