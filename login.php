<?php 
ob_start();
session_start();
require_once 'controller/Login.php'; 
if(isset($_POST['identificarse']))
Login::load();

if(@$_SESSION["administrador"])
  header("Location: /");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <title>Inicio de Session</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/singin.css">

  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Log-In</h2>
        <input type="text" class="form-control" placeholder="Nombre de Usuario" autofocus name="user" value="<?=@$POST['user']?>">
        <input type="password" class="form-control" placeholder="Conraseña" name="pass">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="identificarse">Identificarse</button>
        <div class="row">
          <div class="col-lg-12 text-center">
            <p>&copy; Derechos reservados <?=date("Y") ?></p>
            <p>sistema de control de inventario</p>
            <p>se extienden los derechos a Titu's</p>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
