<?php 
//@unset($respaldo);
session_start();
unset($_SESSION["respaldo"]);
header("Location: index");
 ?>