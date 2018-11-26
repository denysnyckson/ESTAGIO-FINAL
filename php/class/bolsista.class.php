<?php
    require_once '../../php/bancodedados/connect.class.php';
    require_once '../../php/class/tablerow.class.php';

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
        public function listar(){
            $stmt = $this->conn->prepare("SELECT nome,email,horario FROM bolsistas");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v){
                echo $v;
            }
        }
    }

?>