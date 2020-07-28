<?php
    require_once 'private/model/usuario.php';
    class controllerUser{
        private $usuario;
        function __construct(){
            $this->usuario=new usuario();
        }
        public function validarUser(){
            $rs=$this->usuario->validateUser($_POST['cargo'],$_POST['id'],$_POST['pass']);
            if(!$rs){
                return 'Err_user';
            }
            return $rs;
        }
    }
?>
