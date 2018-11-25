<?php
    require_once '../bancodedados/connect.class.php';

    class Bolsista{

        private $instance;
        private $conn;

        function __construct(){
            $this->instance = ConnectDb::getInstance();
            $this->conn = $this->instance->getConnection();
        }
        public function cadastrar($nome,$turno,$email){
            $stmt = $this->conn->prepare("INSERT INTO bolsistas(nome,horario,email) VALUES ('$nome','$turno','$email')");
            $stmt->execute();
        }
    }

?>