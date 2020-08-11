<?php
class controllerCourse{
    public function __construct(){}
    public function openCourse(){
        require_once('view/viewDocente/viewCourse/courseMath.php');
    }
    public function taskCourse(){
        require_once('view/viewDocente/viewCourse/taskCourse.php');
    }
}