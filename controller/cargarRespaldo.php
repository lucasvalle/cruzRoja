<?php 
require_once 'Manager.php';
$file="../respaldos/".$_GET['archivo'];
function Conectarse()
{
 if (!($link=mysql_connect("localhost","root","")))
 {
 echo "Error conectando a la base de datos.";
 exit();
 }
 if (!mysql_select_db("cruzroja",$link))
 {
 echo "Error seleccionando la base de datos.";
 exit();
 }
 return $link;
}
$sql = explode(";",file_get_contents($file));//
$link=Conectarse();
foreach($sql as $query)
 mysql_query($query,$link);


if(mysql_errno())
	echo "si se pudo";
else
	echo "no se pudo";
 ?>