<?php
ob_start();
@session_start();
@extract($_POST); 
@extract($_GET);
@extract($_SESSION);
class Manager{
	var $servidor="localhost";
	var $usuario="root";
	var $contrasena="";

	var $DB="cruzroja";
	 var $query;
	var $result;

	 function Manager(){
		if( !@mysql_connect($this->servidor, $this->usuario, $this->contrasena) ):
				?>
			<script>
					location.replace("/errorserver/")
			</script>
			<?php
		endif;

		if(!mysql_select_db($this->DB)):
			?>
			<script>
					location.replace("/errordb/")
			</script>
			<?php
		endif;
		@mysql_query("SET NAMES 'utf8'");

	}
/*
	------------------Metodo para manerjar los Insert, Delete y Update en una tabla------------------
		*/
	  function crud($myQuery){
			mysql_query($myQuery);
				if(mysql_affected_rows()>0)
					return true;
				else
					return false;
		}

/*
	------------------contar registros de la tabla en la base de datos------------------
	*/	
	 function contar($mysql)
	{
		$sql=mysql_query($mysql);
			return  @mysql_num_rows($sql);
		}

		  function consultar($myQuery="select * from categorias")
	{
		$this->query=mysql_query($myQuery);
		}
		/*
		------------------el resultado de la consulta
		*/
		  function resultado(){
			return $this->result=mysql_fetch_object($this->query);
			}	
			/*
					-----obtener la fecha
			*/
		 function getFecha(){
			return  date("Y-m-d H:i:s");
	}

	/*eliminar registros*/
	public function delete($query)
	{
		mysql_query($query);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
	}
}
?>