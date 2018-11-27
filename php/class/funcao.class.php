<?php
    require_once '../../php/bancodedados/connect.class.php';

    class Funcao{

        private $instance;
        private $conn;

        function __construct(){
            $this->instance = ConnectDb::getInstance();
            $this->conn = $this->instance->getConnection();
        }
        public function cadastrar($nome,$qnt){
            $stmt = $this->conn->prepare("INSERT INTO funcoes(nome,qnt) VALUES ('$nome','$qnt')");
            $stmt->execute();
        }
        public function listar(){
            $stmt = $this->conn->prepare("SELECT nome,qnt FROM funcoes");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            foreach($result as $values){
                echo '
                    <tr>
                        <td>'.$values['nome'].'</td>
                        <td>'.$values['qnt'].'</td>
                    </tr>
                ';
            }
        }
    }

?>
