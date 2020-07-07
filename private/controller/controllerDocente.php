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
}