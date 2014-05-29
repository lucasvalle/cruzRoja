<?php 
require_once 'Template.php';
$template=new Template();
$template->makeHeader("titulo de la pagina web"); ?>
<!-- aqui inicia el contenido -->
<div class="row">
	<?php 
$file="respaldos/".$_GET['archivo'];
function Conectarse()
{
 if (!($link=@mysql_connect("localhost","root","")))
 {
 echo "<div class=\"alert alert-danger\"><h3>Error Conectando con el sevidor</h3></div>";
 exit();
 }
 if (!mysql_select_db("cruzroja",$link))
 {
 echo "<div class=\"alert alert-danger\"><h3>No se encontro la base de Datos</h3></div>";
 exit();
 }
 return $link;
}

require_once 'controller/Manager.php';
$new=new Manager();
$sql = explode(";",file_get_contents($file));//
$link=Conectarse();
foreach($sql as $query)
 mysql_query($query);


if(mysql_errno()):
		?>
		<script>
			alert("el Respaldo se creo correctamente");
			location.replace("respaldo");
		</script>
		<?php
else:
	?>
		<script>
			alert("Error no se pudo crear el respaldo");
			location.replace("respaldo");
		</script>
		<?php
endif;
 ?>
</div>
	
<!-- fin del contenido -->
<?php $template->makeFooter() ?>