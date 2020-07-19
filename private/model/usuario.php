<?php
    require_once 'private/Includes/database.php';
    //require_once 'mysqlDB.php';
    class usuario{
        public $id=null;
        public $idUser=null;
        public $cargo=null;
        public $firstName=null;
        public $lastName=null;
        private $db=null;
        public function __construct(){
            $this->db=database::getConnection();
        }
        
        public function validateUser($user,$id,$password){
            try{
                $rs=array();
                $rs=$this->db->conexion->prepare("CALL validarUser(?,?,?)");
                $rs->execute(array($user,$id,$password));
                return $rs->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die('error: '.$e->getMessage());
            }
        }
    }
?>