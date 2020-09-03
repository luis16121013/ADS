<title>Escuela Virtual</title>
<?php
    require_once 'model/administrador.php';
    class controllerAdministrador {
        private $admin;
        private $ruta='view/viewAdministrador/';
        private $rutaLocation='view/viewAdministrador/navLocationAdministrador.php';
        function __construct(){
            $this->admin=new administrador();
        }

        function index(){
            $this->HeadNav();
            require_once($this->ruta.'inicioAdministrador.php');
            echo "<script>let pageAdmin='inicio';</script>";
            $this->Footer();
            
        }
        function perfil(){
            $this->HeadNav();
            require_once($this->rutaLocation);
            require_once($this->ruta.'perfilAdministrador.php');
            $this->Footer('LoadPagePerfil');
        }
        function cursos(){
            $this->HeadNav();
            require_once($this->rutaLocation);
            require_once($this->ruta.'cursosAdministrador.php');
            $this->Footer();
        }
        function pageDocente(){
            $this->HeadNav();
            require_once($this->rutaLocation);
            require_once($this->ruta.'pageDocentAdministrador.php');
            $this->Footer('LoadPageTeacher');
        }
        function pageAdmin(){
            $this->HeadNav();
            require_once($this->rutaLocation);
            require_once($this->ruta.'pageConfigAdmin.php');
            $this->Footer('LoadPageAdmin');
        }

        private function HeadNav(){
            require_once('view/header.php');
            require_once($this->ruta.'navAdministrador.php');
        }
        private function Footer($page=''){
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
            }else if($url=='Administrador'){
                return 'pageAdmin';
            }else{
                return 'index';
            }
        }
    }
?>
