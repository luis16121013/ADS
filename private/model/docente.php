<?php
require_once('Includes/database.php');
class docente{
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }

    //no se esta usando NOTA
    public function urlController($url){
        if($url=='inicio'){
            return 'index';
        }else{
            return 'index';
        }
    }
}