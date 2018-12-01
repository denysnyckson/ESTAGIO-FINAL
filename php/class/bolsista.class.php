<?php
    require_once '../../php/bancodedados/connect.class.php';

    class Bolsista{

        private $instance;
        private $conn;

        function __construct(){
            $this->instance = ConnectDb::getInstance();
            $this->conn = $this->instance->getConnection();
        }
        public function cadastrar($nome,$turno,$email,$telefone){
            $stmt = $this->conn->prepare("INSERT INTO bolsistas(nome,horario,email,telefone) VALUES ('$nome','$turno','$email','$telefone')");
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
                            <input onclick=define_del('.$value['id'].') class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal-default" value="Deletar">
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
                    <input type="hidden" id="edTelefone" value="'.$value['telefone'].'">
                ';
            }
        }
        public function editar($id,$nome,$email,$turno,$telefone){
            $int = intval($id);
            $sql = "UPDATE bolsistas SET nome = '$nome', email ='$email',horario = '$turno',telefone = '$telefone' WHERE id = $int";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //var_dump($int);
        }

        public function delete($id){
            $int = intval($id);
            $sql = "DELETE FROM bolsistas WHERE id = $int";
            $this->conn->exec($sql);
        }

        public function getNumBolsista($horario){
            if($horario=="ALL"){
                $stmt = $this->conn->query("SELECT * FROM bolsistas");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return count($result);
            }elseif($horario=="M"){
                $stmt = $this->conn->query("SELECT * FROM bolsistas WHERE horario = 'M'");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return count($result);
            }
            elseif($horario=="T"){
                $stmt = $this->conn->query("SELECT * FROM bolsistas WHERE horario = 'T'");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return count($result);
            }elseif($horario=="N"){
                $stmt = $this->conn->query("SELECT * FROM bolsistas WHERE horario = 'N'");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return count($result);
            }else{
                return 0;
            }
        }
    }
?>