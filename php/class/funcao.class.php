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
            $stmt = $this->conn->prepare("SELECT * FROM funcoes");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            foreach($result as $values){
                echo '
                    <tr>
                        <td>'.$values['nome'].'</td>
                        <td>'.$values['qnt'].'</td>
                        <td>
                            <input onclick=define_del('.$values['id'].') class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-default" value="Deletar">
                        </td>
                    </tr>
                ';
            }
        }
        public function getNumFuncoes(){
            $stmt = $this->conn->query("SELECT * FROM funcoes");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return count($result);
        }
        public function deletar($id){
            $int = intval($id);
            $sql = "DELETE FROM funcoes WHERE id = $int";
            $this->conn->exec($sql);
        }
    }

?>
