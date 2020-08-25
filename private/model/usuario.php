<?php
    require_once 'private/Includes/database.php';

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
        
        public function validateUser($user,$dni,$password){
            try{
                $rs=array();
                $table=null;
                if($user=='Administrador'){
                    $table='table_admins';
                }else if($user=='Docente'){
                    $table='table_teachers';
                }else if($user=='Estudiante'){
                    $table='table_students';
                }else{
                    return null;
                }
                
                $sql="SELECT ts.id, tu.idUser, tu.cargo, ts.firstName, ts.lastName, ts.sexo FROM $table ts,table_users tu WHERE ts.idUser=tu.idUser AND ts.dni=? AND tu.pass=?";
                $rs=$this->db->conexion->prepare($sql);
                $rs->execute(array($dni,$password));
                if($rs->rowCount()>0){
                return $rs->fetch(PDO::FETCH_OBJ);
                }
            return false;
            }catch(Exception $e){
                die('error: '.$e->getMessage());
            }
        }
    }
?>
