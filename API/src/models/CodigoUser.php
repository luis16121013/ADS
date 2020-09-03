<?php
class CodigoUser{
    protected function getCodigo($dni){
        $sql="SELECT idUser FROM table_users WHERE dni=?";
        $rs=database::getConnection()->conexion->prepare($sql);
        $rs->execute(array($dni));
        $cod=$rs->fetch(PDO::FETCH_OBJ);
        return $cod->idUser; 
    }
    protected function deleteRegisterModelUser($dni){
        $sql="DELETE FROM table_users WHERE idUser=?";
        $rs=database::getConnection()->conexion->prepare($sql);
        $rs->execute(array($dni));
    }
}