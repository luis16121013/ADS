<?php
require_once('../private/Includes/database.php');
class users {
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }
    public function getUsers(){
        $sql="SELECT*FROM table_user";
        return $this->query($sql);
    }
    public function getUsersId($id){
        $sql="SELECT*FROM table_user WHERE idUser=$id";
        return $this->query($sql);
    }

    public function getStudents(){
        return $this->dbProcedureGetData('studens');
    }
    public function getTeachers(){
        return $this->dbProcedureGetData('teachers');
    }
    public function getAdmins(){
        return $this->dbProcedureGetData('admins');
    }

    public function getStudentsById($number){
        return $this->dbProcedureGetData('studens',$number);
    }
    public function getTeachersById($number){
        return $this->dbProcedureGetData('teachers',$number);
    }
    public function getAdminsById($number){
        return $this->dbProcedureGetData('admins',$number);
    }


    private function dbProcedureGetData($model,$id=0){
        //$id=($id==null)?0:$id;
        $sql="CALL getUsersByRole(?,?)";
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($model,$id));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
    private function query($sql){
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

}
?>