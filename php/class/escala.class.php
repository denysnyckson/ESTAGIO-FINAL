<?php
    require_once '../../php/bancodedados/connect.class.php';
    require_once '../../php/class/bolsista.class.php';
    class Escala{
        private $instance;
        private $conn;
        function __construct(){
            $this->instance = ConnectDb::getInstance();
            $this->conn = $this->$instance->getConnection();
        }
        public function gerarEscala(){
            $escala = [];
        }
    }
?>