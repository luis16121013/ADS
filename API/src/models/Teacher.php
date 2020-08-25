<?php
require_once('../private/Includes/database.php');
require_once('IProcedure.php');
class Teacher implements IProcedure{
    private $db=null;

    /**
     * METHODS USES BY API
     */
    public function __construct(){
        $this->db=database::getConnection();
    }

    public function getLimit($number){
        return $this->getDataLimit($number);
    }

    public function countData(){
        return $this->countAllTeachers();
    }

    /**
     * AJAX HTTP METHOD PUT
     */
    public function putTeacherById($array){
        $id=$array['id']; //table_teachers pk
        $codigo=$array['codigo'];
        $nombre=$array['firstName'];
        $apellido=$array['lastName'];
        $phone=$array['phone'];
        $email=$array['email'];
        $sexo=$array['sexo'];

        $idUser=$array['idUser'];//table_users pk
        $pass=$array['pass'];

        $sql="UPDATE table_teachers set firstName=?,lastName=?,phone=?,email=?,sexo=? WHERE id=?";
        $teacher=$this->db->conexion->prepare($sql);
        $teacher->execute(array($nombre,$apellido,$phone,$email,$sexo,$id));

        $sql="UPDATE table_users set pass=? WHERE idUser=?";
        $user=$this->db->conexion->prepare($sql);
        $user->execute(array($pass,$idUser));
        return true;
    }
    /**
     * AJAX HTTP METHOD POST
     */
    public function postInsert($array){
        $dni=$array['dni'];
        $phone=$array['contact'];
        $firsName=$array['firstName'];
        $lastName=$array['lastName'];
        $email=$array['email'];
        $pass=$array['pass'];
        $sexo=$array['sexo'];
        

        $sqlUser="INSERT INTO table_users VALUES(0,'Docente',?,?)";
        $sqlTeacher="INSERT INTO table_teachers VALUES(0,?,?,?,?,?,?,?,?)";

        $user=$this->db->conexion->prepare($sqlUser);
        $user->execute(array($pass,$dni));
        if($user->rowCount()>0){
            $codigoUser=$this->codigoUsers($dni);
            $codigoTeacher=$this->codigoTeachers();

            $teacher=$this->db->conexion->prepare($sqlTeacher);
            $teacher->execute(array($codigoTeacher,$dni,$firsName,$lastName,$phone,$email,$codigoUser->idUser,$sexo));
            if($teacher->rowCount()>0){
                return true;
            }
            return false;
        }       
        return false;
    }

    /**
     * AJAX METHOD DELETE-------METHOD IS OF INTERFACE PROCEDURE
     */
    public function deleteRegister($id){
        $sql="DELETE FROM table_teachers WHERE id=?";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($id));
        if($rs->rowCount()>0){
            return true;
        }
        return false;
    }

    /**
     * METHOD OF INTERFACE
     */
    public function countAllTeachers(){
        $sql="SELECT count(id) as total_teachers FROM table_teachers";
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }


    public function getData($id=0){
        $condicion=($id==0)?"":"AND tm.id=$id";
        $sql="SELECT tm.id, tm.codigo, tm.dni, tm.firstName, tm.lastName, tm.phone, tm.email, tu.idUser, tm.sexo, tu.pass FROM table_users tu, table_teachers tm WHERE tu.idUser=tm.idUser ".$condicion;
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($id));
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDataLimit($number){
        $sql="SELECT tm.id, tm.codigo, tm.dni, tm.firstName, tm.lastName, tm.phone, tm.email, tu.idUser, tm.sexo, tu.pass FROM table_users tu, table_teachers tm WHERE tu.idUser=tm.idUser ORDER BY tm.lastName ASC LIMIT $number,10";
        $rs=array();
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * FUNCTION DB-PROCEDURE
     */
    private function codigoUsers($dni){
        $sql="SELECT idUser FROM table_users WHERE dni=?";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute(array($dni));
        return $rs->fetch(PDO::FETCH_OBJ);
    }
    private function codigoTeachers(){
        $sql="SELECT MAX(codigo) AS cod from table_teachers";
        $rs=$this->db->conexion->prepare($sql);
        $rs->execute();
        if($rs->rowCount()>0){
            $codigo=$rs->fetch(PDO::FETCH_OBJ);
            $generate=substr($codigo->cod,-7);
            $result=intval($generate)+1;
            $cod="DOC$result";
            return $cod;
        }
        return "DOC2001001";
    }

    //UNIT TESTING IN GENERATE CODIGO FOR USERS
    public function prueba(){
        return $this->codigoTeachers();
    }
}