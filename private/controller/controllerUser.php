<?php
    require_once 'private/model/usuario.php';
    class controllerUser{
        private $usuario;
        function __construct(){
            $this->usuario=new usuario();
        }
        public function validarUser(){
            $rs=$this->usuario->validateUser($_POST['cargo'],$_POST['dni'],$_POST['pass']);
            if(!$rs || $rs==null){
                return 'Err_user';
            }
            return $rs;
        }
    }
?>
