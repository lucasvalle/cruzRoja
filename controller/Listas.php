<?php 
/*Lista de cargos en para los empleados*/

 function getCargos($active=0)
{
	$cargoEmpleado=array(
	"1"=>"Socorrista",
	"2"=>"Alumno",
	"3"=>"Fefe de Brigada",
	"4"=>"Sub Jefe de Brigada",
	"5"=>"Sub Jefe Local",
	"6"=>"Motorista"
	);
	foreach ($cargoEmpleado as $value) {
			?>
			<option
				<?=($active==$value) ? "selected=\"selected\"" : ""?>
			 value="<?=$value?>"><?=$value?></option>
			<?php
	}
}

function getBrigadas($active=0)
{
	$brigadas=array(
	"1"=>"Brigada 1",
	"2"=>"Brigada 2",
	"3"=>"Brigada 3",
	"4"=>"Brigada 4"
	);

	foreach ($brigadas as $valor) {
		?>
			<option
				<?=($active==$valor) ? "selected=\"selected\"" : ""?>
			 value="<?=$valor?>"><?=$valor?></option>
			<?php
	}
}

function getMesName($mes){
$meses = array('01' =>'Enero' ,'02' =>'Febrero' ,'03' =>'Marzo' ,'04' =>'Abril' ,'05' =>'Mayo' ,'06' =>'Junio' ,'07' =>'Julio' ,'08' =>'Agosto' ,'09' =>'Septiembre' ,'10' =>'Octubre' ,'11' =>'Noviembre' ,'12' =>'Diciembre' , );
	foreach ($meses as $key => $valor) {
	if($key==$mes)
		return $valor;
	}
}

 ?>