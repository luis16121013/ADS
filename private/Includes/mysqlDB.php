<?php
    class mysqlDB{
        static private $host='localhost';
        static private $port='3306';
        static private $db='aulavirtual2020';
        static private $user='root';
		static private $pass='4321';


        public static function getConexion(){
           try{
                $con=new PDO('mysql:host='.self::$host.':'.self::$port.'; dbname='.self::$db.';',self::$user,self::$pass);
                //$con=new PDO('mysql:host=localhost:3306; dbname=users;','root','4321');
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
           }catch(Exception $e){
               die('error: '.$e->getMessage());
           }
           return $con;
        }

    }
?>
