<?php
require_once('model/docente.php');
require_once('controllerCourse.php');
class controllerDocente extends controllerCourse{
    private $teacher;
    public function __construct(){
        $this->teacher=new docente();
    }
    public function index(){
        $this->HeadNav();
        require_once('view/viewDocente/inicioDocente.php');
        $this->footer();
    }
    public function perfil(){
        $this->HeadNav();
        require_once('view/viewDocente/navLocationDocente.php');
        require_once('view/viewDocente/perfilDocente.php');
        $this->footer();
    }
    public function cursos(){
        $this->HeadNav();
        require_once('view/viewDocente/navLocationDocente.php');
        require_once('view/viewDocente/tareasCursos.php');
        $this->footer();
    }
    public function tareas(){
        $this->HeadNav();
        require_once('view/viewDocente/navLocationDocente.php');
        $this->footer();
    }

    public function course(){
        $this->HeadNav();
        echo 'si estamos';
        $this->openCourse();
        $this->footer();
    }


    private function HeadNav(){
        require_once('view/header.php');
        require_once('view/viewDocente/navDocente.php');
    }
    private function footer(){
        require_once('view/footer.php');
    }

    public static function urlController($url){
        if($url=='inicio'){
            return 'index';
        }else if($url=='perfil'){
            return 'perfil';
        }else if($url=='cursos'){
            return 'cursos';
        }else if($url=='tareas'){
            return 'tareas';
        }else if($url=='course'){
            return 'course';
        }else{
            return 'index';
        }
    }
}