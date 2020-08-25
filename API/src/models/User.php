<?php
require_once('../private/Includes/database.php');
require_once('IProcedure.php');
class User implements IProcedure{
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }

    
    /**
     * METHODS OF INTERFACE PROCEDURE
     * 
     */

    public function validate($dni){
        $sql="SELECT idUser FROM table_users WHERE dni=?";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($dni));
        if($rs->rowCount()>0){
            return false;
        }
        return true;
    }

    public function getData($id=0){
        $condicion=($id==0)?"":"WHERE idUser=$id";
        $sql="SELECT * FROM table_users ".$condicion;
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($id));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteRegister($id){
        $sql="DELETE FROM table_users WHERE idUser=?";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($id));
        if($rs->rowCount()>0){
            return true;
        }
        return false;
    }


    public function getDataLimit($number){
        $sql="SELECT tm.id, tm.codigo, tm.dni, tm.firstName, tm.lastName, tm.phone, tm.email, tu.idUser, tm.sexo, tu.pass FROM table_users tu, table_teachers tm WHERE tu.idUser=tm.idUser AND tm.id>? LIMIT 10";
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($number));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

}
?>
