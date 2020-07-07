<?php
require_once('Includes/database.php');
class docente{
    private $db=null;
    public function __construct(){
        $this->db=database::getConnection();
    }
    public function urlController($url){
        if($url=='inicio'){
            return 'index';
        }else{
            return 'index';
        }
    }
}