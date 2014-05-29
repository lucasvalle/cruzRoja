<?php 
require_once 'Manager.php';
/*calcular el total de las entraads*/
$ingresos=new Manager();
$ingresos->consultar("SELECT SUM(Cantidad) as total FROM donativo");
$row=$ingresos->resultado();
$TotalIngreso=$row->total;

/*calcular el total de las entraads*/
$Egreso=new Manager();
$Egreso->consultar("SELECT SUM(Egresos) as total FROM contabilidad");
$rowE=$Egreso->resultado();
$TotalEgreso=$rowE->total;

$saldo=$TotalIngreso-$TotalEgreso;
 ?>