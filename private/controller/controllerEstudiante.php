<?php
//require_once('model/docente.php');
require_once('urlControllerCourse.php');
require_once('ICourse.php');
class controllerEstudiante extends urlControllerCourse implements ICourse{
    public function __construct(){}


    public function index(){
        $this->HeadNav();
        require_once('view/viewEstudiante/inicioEstudiante.php');
        echo "<script>let pageDocente='inicio';</script>";
        $this->footer();
    }
    public function cursos(){
        $this->HeadNav();
        require_once('view/viewEstudiante/navLocationEstudiante.php');
        require_once('view/viewEstudiante/cursos.php');
        $this->footer();
    }
    public function perfil(){
        $this->HeadNav();
        require_once('view/viewEstudiante/navLocationEstudiante.php');
        require_once('view/viewEstudiante/perfilEstudiante.php');
        echo "<script>let pageDocente='perfil';</script>";
        $this->footer();
    }

    public function goCourse(){
        $this->HeadNav();
        $course=$this->urlTaskController();
        $nameCourse=$this->urlTaskController(true);
        require_once('view/viewEstudiante/navLocationEstudiante.php');
        $this->openCourse($nameCourse);
        $this->footer();
    }
    public function goTaskCourse(){
        $this->HeadNav();
        $course=$this->urlTaskController();
        $nameCourse=$this->urlTaskController(true);
        require_once('view/viewEstudiante/navLocationEstudiante.php');
        $this->taskCourse($course);
        $this->footer();
    }

    /**
     * @SECTION HEAD AND FOOTER OF PAGE
     */
    private function HeadNav(){
        require_once('view/header.php');
        require_once('view/viewEstudiante/navEstudiante.php');
    }
    private function footer(){
        require_once('view/footer.php');
    }
    /**
     * course open student
     */
    public function openCourse($course){
        require_once('view/viewEstudiante/viewCourse/courseOpen.php');
    }
    public function taskCourse($course){
        require_once('view/viewEstudiante/viewCourse/tareas.php');
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
        }else if($url=='goCourse'){
            return 'goCourse';
        }else if($url=='goTaskCourse'){
            return 'goTaskCourse';
        }else{
            return 'index';
        }
    }
}