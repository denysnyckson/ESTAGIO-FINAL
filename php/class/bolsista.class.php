<?php
    require_once '../../php/bancodedados/connect.class.php';

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
            $stmt = $this->conn->query("SELECT * FROM bolsistas");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            foreach($result as $value){
                echo '
                    <tr>
                        <td>'.$value['nome'].'</td>
                        <td>'.$value['email'].'</td>
                        <td>'.$value['horario'].'</td>
                    </tr>
                ';
            }
        }
    }

?>