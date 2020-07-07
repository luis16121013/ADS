<?php 
class controller{
    private $obj=null;
    public function __construct($instance=null){
        if($instance==null){
            $instance='';
        }else if($instance=='users'){
            require_once('src/models/users.php');
            $this->obj= new users();
        }else if($instance=='prueba'){
            require_once('src/models/pruebaPost.php');
            $this->obj= new prueba();
        }
    } 
    /*---------GET USUARIOS------------*/ 
    public function Users(){
        return $this->obj->getUsers();
    }
    public function UsersId($id){
        return $this->obj->getUsersId($id);
    }
    /*-------------GET DATA OF PROCEDURE STATEDMENT*/
    public function getStudents(){
        return $this->obj->getStudents();
    }
    public function getTeachers(){
        return $this->obj->getTeachers();
    }
    public function getAdmins(){
        return $this->obj->getAdmins();
    }
    /*--------------GED DATA PROCEDURE OF STATEDMENT BY ID*/
    public function getStudentsById($number){
        return $this->obj->getStudentsById($number);
    }
    public function getTeachersById($number){
        return $this->obj->getTeachersById($number);
    }
    public function getAdminsById($number){
        return $this->obj->getAdminsById($number);
    }
    


    public function prueba($array){
        return $this->obj->setPrueba($array);
    }
    public function deletePrueba($id){
        return $this->obj->deletePrueba($id);
    }
    public function updatePrueba($array){
        return $this->obj->updatePrueba($array);
    }

}
?>