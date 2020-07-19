<?php
    require_once 'Includes/database.php';
    class administrador{
        private $db=null;
        function __construct(){
            $this->db=database::getConnection();
        }

    }
?>