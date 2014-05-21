<?php 
require_once 'Manager.php';
$table="personal";
/*registrar personal*/
if(isset($add)){
	$personal=new Manager();
	/*buscar para que no se repita en la base de datos*/
	$totalCarnet=$personal->contar("select * from $table where Carnet='$Carnet'");
	$totalName=$personal->contar("select * from $table where Nombre='$Nombre'");

	if($totalCarnet>0)
		$msg["errorCarnet"]="Ya existe";

	if($totalName>0)
		$msg["errorNombre"]="Ya existe";
	
	if($totalCarnet+$totalName==0):
			if($personal->crud("insert into $table values('','$Carnet','$Nombre','$Cargo','$Brigada',1)"))
				$msg["insert"]="se Inseto correctamente";
			else
				$msg["errorInsert"]="No se pudo insertar el registro";
	endif;
	echo json_encode($msg);
}

if(isset($estado)){
	$mod=new Manager();
	if($mod->crud("update $table set Activo='$estado' where idEmpleado=$id"))
		echo true;
	else
		echo false;
}
/*Modificar Registros*/
if(isset($upd)){
	$personal=new Manager();
	/*buscar para que no se repita en la base de datos*/
	$totalCarnet=$personal->contar("select * from $table where Carnet='$Carnet' and idEmpleado<>$id");
	$totalName=$personal->contar("select * from $table where Nombre='$Nombre' and idEmpleado<>$id");

	if($totalCarnet>0)
		$msg["errorCarnet"]="Ya existe";

	if($totalName>0)
		$msg["errorNombre"]="Ya existe";
	
	if($totalCarnet+$totalName==0):
			if($personal->crud("update $table set Carnet='$Carnet',Nombre='$Nombre',Cargo='$Cargo',Brigada='$Brigada' where idEmpleado=$id"))
				$msg["update"]="se Modifico correctamente";
			else
				$msg["errorUpdate"]="No se pudo Actualizar el registro";
	endif;
	echo json_encode($msg);
}

if(isset($del)){
	$personal=new Manager();
	if($personal->delete("delete from $table where idEmpleado=$id"))
		echo true;
	else
		echo false;
}

/*busar*/
if(isset($buscar)){
$person=new Manager();
$sql="select * from personal where Nombre like '%$dato%' or Carnet='$dato'";
$person->consultar($sql);
if($person->contar($sql)>0):
	while($row=$person->resultado()):
	?>
		<tr>
			<td><?=$row->Carnet?></td>
			<td><?=$row->Nombre?></td>
			<td><?=$row->Cargo?></td>
			<td><?=$row->Brigada?></td>
			<td><a  href="<?=$row->idEmpleado?>" class="estado btn btn-<?=($row->Activo==1) ? "success" : "danger"?>"><?=$row->Activo?></a></td>
			<td>
				<a href="<?=$row->idEmpleado?>" class="btn btn btn-warning edit"><i class="fa fa-pencil"></i></a>
				<a data-name="<?=$row->Nombre?>" href="<?=$row->idEmpleado?>" class="btn btn btn-danger delete"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
				<?php 
				endwhile;
				else: ?>
				<tr>
					<td  colspan="7">
						<div class="alert alert-info">no se han encontrado registros</div>
					</td>
				</tr>
	<?php
endif;	
}

if(isset($lista)){
$person=new Manager();
$sql="select * from personal where Nombre like '%$word%' or Carnet='$word'";
$person->consultar($sql);
while($row=$person->resultado()):
		?>
		<option value="<?=$row->Nombre?>">
		<?php
endwhile;
}
 ?>