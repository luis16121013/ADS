<?php
    require_once 'mysqlDB.php';
    class database{
        static private $instance=null;
        public $conexion=null;
        private function __construct(){
            $this->conexion=mysqlDB::getConexion();
        }
        public static function getConnection(){
            if(self::$instance==null){
                self::$instance=new database();
            }
            return self::$instance;
        }

        
        //public function __clone(){}
        
    }
?>