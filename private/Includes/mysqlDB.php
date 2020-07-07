<?php
    class mysqlDB{
        static private $host='localhost';
        static private $port='3308';
        static private $db='aulavirtual2020';
        static private $user='root';


        public static function getConexion(){
           try{
                $con=new PDO('mysql:host='.self::$host.':'.self::$port.'; dbname='.self::$db.';',self::$user,'');
                //$con=new PDO('mysql:host=localhost:3308; dbname=users;','root','');
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $con->exec('SET CHARACTER SET UTF8');
           }catch(Exception $e){
               die('error: '.$e->getMessage());
           }
           return $con;
        }

    }
?>