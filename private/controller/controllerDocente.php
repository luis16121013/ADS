<?php
require_once('model/docente.php');
class controllerDocente{
    private $teacher;
    public function __construct(){
        $this->teacher=new docente();
    }
    public function index(){
        require_once('view/header.php');
        require_once('view/viewDocente/navDocente.php');
        require_once('view/viewDocente/inicioDocente.php');
        require_once('view/footer.php');
    }
    public function perfil(){
        require_once('view/header.php');
        require_once('view/viewDocente/navDocente.php');
        require_once('view/viewDocente/perfilDocente.php');
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