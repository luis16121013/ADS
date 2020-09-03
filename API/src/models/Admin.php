<?php
require_once('../private/Includes/database.php');
require_once('IProcedure.php');
require_once('CodigoUser.php');
class Admin extends CodigoUser implements IProcedure{
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
        $sql="SELECT tm.id, tm.codigo, tm.dni, tm.firstName, tm.lastName, tm.phone, tm.email, tu.idUser, tm.sexo, tu.pass FROM table_users tu, table_admins tm WHERE tu.idUser=tm.idUser AND tm.id>? LIMIT 10";
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($number));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($info){
        $idUser=$info['idUser'];

        $dni=$info['dni'];
        $fisrtName=$info['firstName'];
        $lastName=$info['lastName'];
        $phone=$info['phone'];
        $email=$info['email'];
        $sexo=$info['sexo'];
        $pass=$info['pass'];

        $sqlAdmin="UPDATE table_admins SET dni=?,firstName=?,lastName=?,phone=?,email=?,sexo=? WHERE idUser=$idUser";
        $sqlUser="UPDATE table_users SET pass=?,dni=? WHERE idUser=$idUser";

        $rsAdmin=$this->db->conexion->prepare($sqlAdmin);
        $rsAdmin->execute(array($dni,$fisrtName,$lastName,$phone,$email,$sexo));
        $rsUser=$this->db->conexion->prepare($sqlUser);
        $rsUser->execute(array($pass,$dni));
        return true;
    }
    public function updatePerfil($id,$info){
        $phone=$info['phone'];
        $email=$info['email'];
        $pass=$info['pass'];
        
        if($phone!=''||$email!=''||$pass!=''){
            if($phone!=''){
                $sql="UPDATE table_admins SET phone=? WHERE idUser=$id";
                $rs=$this->db->conexion->prepare($sql);
                $rs->execute(array($phone));
            }
            if($email!=''){
                $sql="UPDATE table_admins SET email=? WHERE idUser=$id";
                $rs=$this->db->conexion->prepare($sql);
                $rs->execute(array($email));
            }
            if($pass!=''){
                $sql="UPDATE table_users SET pass=? WHERE idUser=$id";
                $rs=$this->db->conexion->prepare($sql);
                $rs->execute(array($pass));
            }
            return true;
        }else{
            return false;
        }
    }

    public function insert($info){
        $dni=$info['dni'];
        $fisrtName=$info['firstName'];
        $lastName=$info['lastName'];
        $phone=$info['phone'];
        $email=$info['email'];
        $sexo=$info['sexo'];
        $pass=$info['pass'];

        $codAdmin=$this->getCodAdmin();

        $sqlUser="INSERT INTO table_users VALUES(0,'Administrador',?,?)";
        $sqlAdmin="INSERT INTO table_admins VALUES(0,?,?,?,?,?,?,?,?)";

        $rsUser=$this->db->conexion->prepare($sqlUser);
        $rsUser->execute(array($pass,$dni));
        if($rsUser->rowCount()>0){
            $codUser=$this->getCodigo($dni);
            $rsAdmin=$this->db->conexion->prepare($sqlAdmin);
            $rsAdmin->execute(array($codAdmin,$dni,$fisrtName,$lastName,$phone,$email,$codUser,$sexo));
            return true;
        }else{
            $codUser=$this->getCodigo($dni);
            $sql="DELETE FROM table_users WHERE idUser=?";
            $rs=$this->db->conexion->prepare($sql);
            $rs->execute(array($codUser));
            return false;
        }
    }
    public function deleteRegister($idUser){
        $sql="DELETE FROM table_admins WHERE idUser=?";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($idUser));
        if($rs->rowCount()>0){
            $sqlUser="DELETE FROM table_users WHERE idUser=?";
            $r=$this->db->conexion->prepare($sqlUser);
            $r->execute(array($idUser));
            return true;
        }
        return false;
    }

    private function getCodAdmin(){
        $sql="SELECT MAX(codigo) AS cod from table_admins";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute();
        $codigo=$rs->fetch(PDO::FETCH_OBJ);
        if($codigo->cod!=''){
            $generate=substr($codigo->cod,-7);
            $result=intval($generate)+1;
            $cod="ADM$result";
            return $cod;
        }
        return "ADM2001001";
    }
    
}