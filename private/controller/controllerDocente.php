<?php
require_once('model/docente.php');
require_once('urlControllerCourse.php');
require_once('ICourse.php');
class controllerDocente extends urlControllerCourse implements ICourse{
    private $teacher;
    private $ruta='view/viewDocente/';
    private $rutaLocation='view/viewDocente/navLocationDocente.php';
    public function __construct(){$this->teacher=new docente();}

    public function index(){
        $this->HeadNav();
        require_once($this->ruta.'inicioDocente.php');
        $this->footer();
    }
    public function perfil(){
        $this->HeadNav();
        require_once($this->rutaLocation);
        require_once($this->ruta.'perfilDocente.php');
        $this->footer('LoadPagePerfil');
    }

    /**
     * SECTION OF COURSE NAV
     */
    public function cursos(){
        session_start();
        $this->HeadNav();
        $rs=$this->teacher->renderCourse($_SESSION['ID']);
        require_once($this->rutaLocation);
        require_once($this->ruta.'Cursos.php');
        $this->footer('LoadPageCourses');
    }

    /**
     * ACTIONS OF THE COURSES
     */
    public function goCourse(){//BETA METHOD ::NOTE-> NOT USE IN APLICATION
        $this->HeadNav();
        $course=$this->urlTaskController();
        require_once($this->rutaLocation);
        $this->openCourse($course);
        $this->footer();
    }
    public function goTaskCourse(){
        $this->HeadNav();
        $course=$this->urlTaskController();
        require_once($this->rutaLocation);
        $this->TaskCourse($course);
        $this->footer('LoadPageTask');
    }



    /**
     * HEADER AND FOOTER OF TEACHER
     */
    private function HeadNav(){
        require_once('view/header.php');
        require_once('view/viewDocente/navDocente.php');
    }
    private function footer($page=''){
        require_once('view/footer.php');
    }

    /**
     * CONTROLLER URL COURSE TEACHER
     */
    public function openCourse($course){//BETA METHOD ::NOTE-> NOT USE IN APLICATION
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
        }else if($url=='goCourse'){//URL IN BETA METHOD NOT USE IN APLICATION
            return 'goCourse';
        }else if($url=='goTaskCourse'){
            return 'goTaskCourse';
        }else{
            return 'index';
        }
    }


}