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

    /**
     * SECTION OF COURSE NAV
     */
    public function cursos(){
        $this->HeadNav();
        require_once('view/viewDocente/navLocationDocente.php');
        require_once('view/viewDocente/Cursos.php');
        $this->footer();
    }

    /**
     * ACTIONS OF THE COURSES
     */
    public function goCourse(){
        $this->HeadNav();
        require_once('view/viewDocente/navLocationDocente.php');
        $this->openCourse();
        $this->footer();
    }
    public function goTaskCourse(){
        $this->HeadNav();
        require_once('view/viewDocente/navLocationDocente.php');
        $this->TaskCourse();
        $this->footer();
    }



    /**
     * HEADER AND FOOTER OF TEACHER
     */
    private function HeadNav(){
        require_once('view/header.php');
        require_once('view/viewDocente/navDocente.php');
    }
    private function footer(){
        require_once('view/footer.php');
    }


    /**
     * CONTROLLER OF THE URL TEACHER
     */
    public static function urlController($url){
        if($url=='inicio'){
            return 'index';
        }else if($url=='perfil'){
            return 'perfil';
        }else if($url=='cursos'){
            return 'cursos';
        }else if($url=='tareas'){
            return 'tareas';
        }else if($url=='goCourse'){
            return 'goCourse';
        }else if($url=='goTaskCourse'){
            return 'goTaskCourse';
        }else{
            return 'index';
        }
    }
}