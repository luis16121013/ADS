<?php
require_once('model/docente.php');
require_once('urlControllerCourse.php');
require_once('ICourse.php');
class controllerDocente extends urlControllerCourse implements ICourse{
    private $teacher;
    public function __construct(){$this->teacher=new docente();}

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
        $course=$this->urlTaskController();
        require_once('view/viewDocente/navLocationDocente.php');
        $this->openCourse($course);
        $this->footer();
    }
    public function goTaskCourse(){
        $this->HeadNav();
        $course=$this->urlTaskController();
        require_once('view/viewDocente/navLocationDocente.php');
        $this->TaskCourse($course);
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
     * CONTROLLER URL COURSE TEACHER
     */
    public function openCourse($course){
        require_once('view/viewDocente/viewCourse/courseMath.php');
    }
    public function taskCourse($course){
        require_once('view/viewDocente/viewCourse/taskCourse.php');
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