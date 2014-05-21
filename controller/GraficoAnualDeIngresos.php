<?php 
require_once 'Manager.php';
$buscar=new Manager();
$year=date("Y");
$meses = array('1' =>'Enero' ,'2' =>'Febrero' ,'3' =>'Marzo' ,'4' =>'Abril' ,'5' =>'Mayo' ,'6' =>'Junio' ,'7' =>'Julio' ,'8' =>'Agosto' ,'9' =>'Septiembre' ,'10' =>'Octubre' ,'11' =>'Noviembre' ,'12' =>'Diciembre' , );

for ($i=1; $i <=12 ; $i++):
	$buscar->consultar("select sum(cantidad) as total from donativo where month(Fecha)=$i and year(Fecha)=$year");
	while($row=$buscar->resultado()):
		if($row->total==null)
			$row->total=0;
			$data[]=array(
				"mes"=>$meses[$i],
				"total"=>$row->total
				);
	endwhile;
endfor;
 ?>
 <script>
chartData=<?=json_encode($data)?>
 </script>