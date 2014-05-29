<!doctype html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Document</title>
</head>
<body>
   <?php 
@require_once 'Manager.php';
function backup_tables($tables = '*')
{
$admin=new Manager();
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   
   //cycle through
   $return='DROP DATABASE `cruzroja`;';
   $return.='CREATE DATABASE IF NOT EXISTS `cruzroja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
         USE `cruzroja`;';
   foreach($tables as $table)
   {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   
   //save file
   $handle = fopen('../respaldos/CruzRojaDB'.date("d-m-Y H.i.s").'.sql','w+');
   if(fwrite($handle,$return))
      return true;
   fclose($handle);
   return false;
}
    ?>
</body>
</html>
<?php 

/*para generar el respaldo*/
if(isset($respaldar)){
	backup_tables();
}

if(isset($file)){
	$carpeta="../respaldos/";
	if(unlink($carpeta.$file))
		echo true;
	else
		echo false;
}
 ?>