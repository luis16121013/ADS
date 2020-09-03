<?php
require_once('Includes/database.php');
class docente{
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }

    public function renderCourse($id){
        $sql="SELECT*FROM table_course WHERE idTeacher=?";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($id));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
}