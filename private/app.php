
<title>Escuela Virtual</title>


<?php 
   session_start();
   define('_IP_','192.168.0.4');
   if(isset($_SESSION['usuario'])){
      if(isset($_GET['id']) and $_GET['id']=='close'){
         session_unset();
         session_destroy();
         header('Location:http://'._IP_.'/ADS/');
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
      header('Location:http://'._IP_.'/ADS/');
   }
?>

