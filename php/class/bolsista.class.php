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
                        <td>
                            <input class="btn btn-primary" type="button" onclick=editar('.$value['id'].') value="Editar">
                        </td>
                    </tr>
                ';
            }
        }
        public function setDados($id){
            $stmt = $this->conn->query("SELECT * from bolsistas WHERE id = $id");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $value){
                echo '
                    <input type="hidden" name = "id" value='.$value['id'].'>
                    <input type="hidden" id="edNome" value='.$value['nome'].'>
                    <input type="hidden" id="edEmail" value='.$value['email'].'>
                    <input type="hidden" id="edTurno" value='.$value['horario'].'>
                ';
            }
        }
        public function editar($id,$nome,$email,$turno){
            $int = intval($id);
            $sql = "UPDATE bolsistas SET nome = '$nome', email ='$email',horario = '$turno' WHERE id = $int";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //var_dump($int);
        }
    }

?>