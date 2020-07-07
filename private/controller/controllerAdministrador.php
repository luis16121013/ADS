<title>Escuela Virtual</title>
<?php
    require_once 'model/administrador.php';
    class controllerAdministrador{
        private $admin;
        function __construct(){
            $this->admin=new administrador();
        }

        function index(){
            require_once('view/header.php');
            require_once('view/viewAdministrador/navAdministrador.php');
            require_once('view/viewAdministrador/inicioAdministrador.php');
            require_once('view/footer.php');
            
        }
        function perfil(){
            require_once('view/header.php');
            require_once('view/viewAdministrador/navAdministrador.php');
            require_once('view/viewAdministrador/perfilAdministrador.php');
            require_once('view/footer.php');
        }
        public static function urlController($url){
            if($url=='inicio'){
                return 'index';
            }else if($url=='perfil'){
                return 'perfil';
            }else{
                return 'index';
            }
        }
    }
?>