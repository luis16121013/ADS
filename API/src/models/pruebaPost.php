<?php
require_once('../private/Includes/database.php');
class prueba {
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }
    public function setPrueba($array){
        $sql="CALL registrar(?)";
        return $this->noQuery($sql,$array);
    }
    public function deletePrueba($array){
        $sql="CALL eliminarPrueba(?)";
        return $this->noQuery($sql,$array);
    }
    public function updatePrueba($array){
        $id=$array[0]['id'];
        $nombre=$array[0]['nombre'];
        $sql="UPDATE prueba SET nombre=? where id=?";
        $r=array();
        $r=$this->db->conexion->prepare($sql);
        $r->execute(array($nombre,$id));
        return true;
    }


    private function query($sql,$conexion){
        $rs=array();
        $rs=$conexion->prepare($sql);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
    private function noQuery($sql,$array){
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array(/*$array[0]['dato']*/$array));
        return $rs->fetch(PDO::FETCH_OBJ);
    } 
}
?>