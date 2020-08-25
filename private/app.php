
<title>Escuela Virtual</title>


<?php 
   session_start();
   require_once('config/config.php');

   if(isset($_SESSION['usuario'])){
      if(isset($_GET['id']) and $_GET['id']=='close'){
         session_unset();
         session_destroy();
         
         header(_REDIRECTION_);
      }

      require_once 'controller/controller'.$_SESSION['usuario'].'.php';
      $action=null;
      $controller= 'controller'.$_SESSION['usuario'];
      $controller= new $controller();
      if(isset($_GET['a'])){
         $action=$controller::urlController($_GET['a']);
      }else{
         $action='index';
      }
      call_user_func(array($controller,$action));
   }else{
      header(_REDIRECTION_);
   }
?>

