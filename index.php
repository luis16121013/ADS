<?php
session_start();
define('_IP_','192.168.0.4');
if(isset($_SESSION['usuario'])){
  header('Location:http://'._IP_.'/ADS/private/app.php');
}else if(isset($_POST['ingresar'])){
     require_once 'private/controller/controllerUser.php';
     $controller= new controllerUser();
     $rs=$controller->validarUser();
     if($rs=='Err_user'){
      require_once('public/login.php');
     }else{
      $_SESSION['ID']=$rs->id;
      $_SESSION['IDUSER']=$rs->idUser;
      $_SESSION['usuario']=$rs->cargo;
      $_SESSION['name']=$rs->firstName.' '.$rs->lastName;
      header('Location:http://'._IP_.'/ADS/private/app.php');
     } 
}else{
  require_once('public/login.php');
}
?>