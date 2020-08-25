<?php 
class controller{
    private $obj=null;
    public function __construct(IProcedure $instance){
        $this->obj=$instance;
    } 
    /**
     * AJAX HTTP GET DATA 
     */ 
    public function getRegisterTable(){
        return $this->obj->getData();
    }
   
    public function countRegister(){
        return $this->obj->countData();
    }
    /**
     * AJAX HTTP GET DATA BY ID
     */
    public function getRegisterById($id){
        return $this->obj->getData($id);
    }
    public function getDataLimit($number){
        return $this->obj->getLimit($number);
    }
    
    /**
     * AJAX HTTP POST DATA
     */
    public function insertData($array){
        return $this->obj->postInsert($array);
    }
    /**
     * AJAX HTTP DELETE DATA
     */
    public function delete($id){
        return $this->obj->deleteRegister($id);
    }

    //--------------PUT DATA BY ID
    public function updateTeacher($array){
        return $this->obj->putTeacherById($array);
    }


    /**
     * HTTP VALIDATE-AJAX EXIST REGISTER
     */
    public function validateRegister($dni){
        return $this->obj->validate($dni);
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