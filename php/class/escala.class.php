<?php
    require_once '../../php/bancodedados/connect.class.php';

    class Escala{
        private $instance;
        private $conn;
        function __construct(){
            $this->instance = ConnectDb::getInstance();
            $this->conn = $this->$instance->getConnection();
        }
    }
?>