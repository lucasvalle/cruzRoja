<?php 
require_once 'Manager.php';
class Login{
	 function load(){
	$obj=new Manager();
		 $pass=md5(trim($_POST['pass']));
		 $user=$_POST['user'];		
		 if($obj->contar("select * from administradores where user='$user' and pass='$pass'")>0):
		 	$obj->consultar("select * from administradores where user='$user' and pass='$pass'");
		 	$row=$obj->resultado();
			session_start();
		 	$_SESSION['administrador']=$row->nombre;
		 	$_SESSION['idAdmin']=$row->idAdmin;
		 	@header("Location: index");
		 	return true;
		 endif;
	}

	public function verificar(){
		@session_start();
		if(!$_SESSION["administrador"])
			@header("Location: login");
	}

	public function out(){
		@session_start();
		@session_destroy();
		@header("Location: login");
	}
}
 ?>