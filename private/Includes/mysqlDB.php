<?php
    require_once('configDB.php');
    class mysqlDB{
        static private $host=_HOST_;
        static private $port=_PORT_;
        static private $db=_DDBB_;
        static private $user=_USER_;
		static private $pass=_PASS_;

        public static function getConexion(){
           try{
                $con=new PDO('mysql:host='.self::$host.':'.self::$port.'; dbname='.self::$db.';',self::$user,self::$pass);
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
           }catch(Exception $e){
               die('error: '.$e->getMessage());
           }
           return $con;
        }

    }
?>
