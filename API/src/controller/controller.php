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
        return $this->obj->getDataLimit($number);
    }
    
    /**
     * AJAX HTTP POST DATA
     */
    public function insertData($array){
        return $this->obj->postInsert($array);
    }
    public function insertInfo($array){
        return $this->obj->insert($array);
    }

    /**
     * AJAX HTTP DELETE DATA
     */
    public function delete($id){
        return $this->obj->deleteRegister($id);
    }

    //--------------PUT DATA BY ID
    public function updateInfo($array){
        return $this->obj->update($array);
    }
    public function updatePerfil($id,$array){
        return $this->obj->updatePerfil($id,$array);
    }


    /**
     * HTTP VALIDATE-AJAX EXIST REGISTER
     */
    public function validateRegister($dni){
        return $this->obj->validate($dni);
    }

    public function prueba(){
        //return $this->obj->setPrueba($array);
        return $this->obj->prueba();
    }
    public function deletePrueba($id){
        return $this->obj->deletePrueba($id);
    }
    public function updatePrueba($array){
        return $this->obj->updatePrueba($array);
    }



}
?>