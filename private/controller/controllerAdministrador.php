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
            echo "<script>let pageAdmin='inicio';</script>";
            require_once('view/footer.php');
            
        }
        function perfil(){
            require_once('view/header.php');
            require_once('view/viewAdministrador/navAdministrador.php');
            require_once('view/viewAdministrador/navLocationAdministrador.php');
            require_once('view/viewAdministrador/perfilAdministrador.php');
            echo "<script>let pageAdmin='perfil';</script>";
            require_once('view/footer.php');
        }
        function cursos(){
            require_once('view/header.php');
            require_once('view/viewAdministrador/navAdministrador.php');
            require_once('view/viewAdministrador/navLocationAdministrador.php');
            require_once('view/viewAdministrador/cursosAdministrador.php');
            require_once('view/footer.php');
        }
        function pageDocente(){
            require_once('view/header.php');
            require_once('view/viewAdministrador/navAdministrador.php');
            require_once('view/viewAdministrador/navLocationAdministrador.php');
            require_once('view/viewAdministrador/pageDocentAdministrador.php');
            echo "<script>let pageAdmin='configDocente';</script>";
            require_once('view/footer.php');
        }


        public static function urlController($url){
            if($url=='inicio'){
                return 'index';
            }else if($url=='perfil'){
                return 'perfil';
            }else if($url=='cursos'){
                return 'cursos';
            }else if($url=='pageDocente'){
                return 'pageDocente';
            }else{
                return 'index';
            }
        }
    }
?>