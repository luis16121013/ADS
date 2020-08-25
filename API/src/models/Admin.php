<?php
require_once('../private/Includes/database.php');
require_once('IProcedure.php');
class Admin implements IProcedure{
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }

    public function getData($id=0){
        $condicion=($id==0)?"":"AND tm.id=$id";
        $sql="SELECT tm.id, tm.codigo, tm.dni, tm.firstName, tm.lastName, tm.phone, tm.email, tu.idUser, tm.sexo, tu.pass FROM table_users tu, table_admins tm WHERE tu.idUser=tm.idUser ".$condicion;
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($id));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
    public function getDataLimit($number){
        $sql="SELECT tm.id, tm.codigo, tm.dni, tm.firstName, tm.lastName, tm.phone, tm.email, tu.idUser, tm.sexo, tu.pass FROM table_users tu, table_teachers tm WHERE tu.idUser=tm.idUser AND tm.id>? LIMIT 10";
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($number));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }
}