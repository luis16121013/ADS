<?php
session_start();
require_once('private/config/config.php');
$ruta=_REDIRECTION_."private/app.php";
if(isset($_SESSION['usuario'])){
    header($ruta);
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
      header($ruta);
		 }
}else{
  require_once('public/login.php');
}
?>
