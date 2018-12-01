<?php
    require_once '../../php/bancodedados/connect.class.php';
    require_once '../../php/class/bolsista.class.php';
    require_once '../../php/class/funcao.class.php';
    class Escala{
        private $conn;
        private $bolsista;
        private $funcoes;
        private $escala;
        private $semana = ["segunda","terça","quarta","quinta","sexta"];

        function __construct(){
            $this->bolsista = new Bolsista();
            $this->funcoes = new Funcao();
            $this->conn = mysqli_connect("localhost", "root", "", "sisgesbd");
        }
        public function gerarEscala(){
            $this->escala = [];
            for($dia = 0; $dia<5;$dia++){
                $this->escala[$this->semana[$dia]] = $this->gerar();
            }
            return $this->escala;
        }
        public function gerar(){
            $array = [];
            $array["manha"] = $this->gerarManha();
            $array["tarde"] = $this->gerarTarde();
            $array["noite"] = $this->gerarNoite();
            return $array;
        }
        public function gerarManha(){
            $array =[];
            if($this->bolsista->getNumBolsista('M') == $this->funcoes->getNumFuncoes()){
                $arrBol = $this->arrayBol('M'); 
                $arrFun = $this->arrayFun();
                $num = count($arrFun) - 1;
                for($i = 0;$i < $this->bolsista->getNumBolsista('M');$i++){
                    while(count($arrFun)!=0){
                        $var = rand(0, $num);   
                        if(array_key_exists($var, $arrFun)){
                            break;
                        }
                    }
                    array_push($array, [$arrBol[$i][0],$arrFun[$var][1]]);
                    unset($arrFun[$var]);
                }
            }
            return $array;
        }
        private function gerarTarde(){
            $array =[];
            if($this->bolsista->getNumBolsista('T') == $this->funcoes->getNumFuncoes()){
                $arrBol = $this->arrayBol('T'); 
                $arrFun = $this->arrayFun();
                $num = count($arrFun) - 1;
                for($i = 0;$i < $this->bolsista->getNumBolsista('T');$i++){
                    while(count($arrFun)!=0){
                        $var = rand(0, $num);   
                        if(array_key_exists($var, $arrFun)){
                            break;
                        }
                    }
                    array_push($array, [$arrBol[$i][0],$arrFun[$var][1]]);
                    unset($arrFun[$var]);
                }
            }
            return $array;
        }
        private function gerarNoite(){
            $array =[];
            if($this->bolsista->getNumBolsista('N') == 4){
                $arrBol = $this->arrayBol('N'); 
                $arrFun = $this->arrayFunN();
                $num = count($arrFun) - 1;
                for($i = 0;$i < $this->bolsista->getNumBolsista('N');$i++){
                    while(count($arrFun)!=0){
                        $var = rand(0, $num);   
                        if(array_key_exists($var, $arrFun)){
                            break;
                        }
                    }
                    array_push($array, [$arrBol[$i][0],$arrFun[$var][1]]);
                    unset($arrFun[$var]);
                }
            }
            return $array;
        }

        public function arrayBol($t){
            $arr =[];
            $bolsista = mysqli_query($this->conn,"SELECT * from bolsistas where horario='$t'");
            while ($row = mysqli_fetch_array($bolsista)) {
                array_push($arr, [$row["id"],$row["nome"],$row["horario"]]);
            }
            return $arr;
            //var_dump($arr);
        }
        public function arrayFun(){
            $arr =[];
            $funcao = mysqli_query($this->conn,"SELECT * from funcoes");
            while ($row = mysqli_fetch_array($funcao)){
                array_push($arr, [$row["id"],$row["nome"]]);
            }
            return $arr;
            //var_dump($arr);
        }
        public function arrayFunN(){
            $arr =[];
            $funcao = mysqli_query($this->conn,"SELECT * from funcoes");
            while ($row = mysqli_fetch_array($funcao)){
                for($n = 1; $n<=$row["qnt"]; $n++){
                    array_push($arr, [$row["id"],$row["nome"]]);
                }
            }
            return $arr;
            //var_dump($arr);
        }
        public function name($id){
            $int = intval($id);
            $sql = "SELECT nome FROM bolsistas WHere id = $int";
            $result = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $nome = $row["nome"];
            }
            return $nome;
        }
        public function gerou(){
            $arr = $this->gerarEscala();
            echo '
                <table class="table table-bordered table-hover">
                <tr>
                    <td colspan="6" style="text-align:center"><b>Manha</b></td>
                </tr>
                <thead>
                <tr>
                <th>Bolsista</th>
                <th>Segunda</th> 
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <thead>
                <tbody>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["manha"][0][0]).'</b></td>
                <td>'.$arr["segunda"]["manha"][0][1].'</td>
                <td>'.$arr["terça"]["manha"][0][1].'</td>
                <td>'.$arr["quarta"]["manha"][0][1].'</td>
                <td>'.$arr["quinta"]["manha"][0][1].'</td>
                <td>'.$arr["sexta"]["manha"][0][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["manha"][1][0]).'</b></td>
                <td>'.$arr["segunda"]["manha"][1][1].'</td>
                <td>'.$arr["terça"]["manha"][1][1].'</td>
                <td>'.$arr["quarta"]["manha"][1][1].'</td>
                <td>'.$arr["quinta"]["manha"][1][1].'</td>
                <td>'.$arr["sexta"]["manha"][1][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["manha"][2][0]).'</b></td>
                <td>'.$arr["segunda"]["manha"][2][1].'</td>
                <td>'.$arr["terça"]["manha"][2][1].'</td>
                <td>'.$arr["quarta"]["manha"][2][1].'</td>
                <td>'.$arr["quinta"]["manha"][2][1].'</td>
                <td>'.$arr["sexta"]["manha"][2][1].'</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:center"><b>Tarde</b></td>
                </tr>
                <td><b>'.$this->name($arr["segunda"]["tarde"][0][0]).'</b></td>
                <td>'.$arr["segunda"]["tarde"][0][1].'</td>
                <td>'.$arr["terça"]["tarde"][0][1].'</td>
                <td>'.$arr["quarta"]["tarde"][0][1].'</td>
                <td>'.$arr["quinta"]["tarde"][0][1].'</td>
                <td>'.$arr["sexta"]["tarde"][0][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["tarde"][1][0]).'</b></td>
                <td>'.$arr["segunda"]["tarde"][1][1].'</td>
                <td>'.$arr["terça"]["tarde"][1][1].'</td>
                <td>'.$arr["quarta"]["tarde"][1][1].'</td>
                <td>'.$arr["quinta"]["tarde"][1][1].'</td>
                <td>'.$arr["sexta"]["tarde"][1][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["tarde"][2][0]).'</td>
                <td>'.$arr["segunda"]["tarde"][2][1].'</td>
                <td>'.$arr["terça"]["tarde"][2][1].'</td>
                <td>'.$arr["quarta"]["tarde"][2][1].'</td>
                <td>'.$arr["quinta"]["tarde"][2][1].'</td>
                <td>'.$arr["sexta"]["tarde"][2][1].'</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:center"><b>Noite</b></td>
                </tr>
                <td><b>'.$this->name($arr["segunda"]["noite"][0][0]).'</b></td>
                <td>'.$arr["segunda"]["noite"][0][1].'</td>
                <td>'.$arr["terça"]["noite"][0][1].'</td>
                <td>'.$arr["quarta"]["noite"][0][1].'</td>
                <td>'.$arr["quinta"]["noite"][0][1].'</td>
                <td>'.$arr["sexta"]["noite"][0][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["noite"][1][0]).'</b></td>
                <td>'.$arr["segunda"]["noite"][1][1].'</td>
                <td>'.$arr["terça"]["noite"][1][1].'</td>
                <td>'.$arr["quarta"]["noite"][1][1].'</td>
                <td>'.$arr["quinta"]["noite"][1][1].'</td>
                <td>'.$arr["sexta"]["noite"][1][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["noite"][2][0]).'</b></td>
                <td>'.$arr["segunda"]["noite"][2][1].'</td>
                <td>'.$arr["terça"]["noite"][2][1].'</td>
                <td>'.$arr["quarta"]["noite"][2][1].'</td>
                <td>'.$arr["quinta"]["noite"][2][1].'</td>
                <td>'.$arr["sexta"]["noite"][2][1].'</td>
                </tr>
                <tr>
                <td><b>'.$this->name($arr["segunda"]["noite"][3][0]).'</b></td>
                <td>'.$arr["segunda"]["noite"][3][1].'</td>
                <td>'.$arr["terça"]["noite"][3][1].'</td>
                <td>'.$arr["quarta"]["noite"][3][1].'</td>
                <td>'.$arr["quinta"]["noite"][3][1].'</td>
                <td>'.$arr["sexta"]["noite"][3][1].'</td>
                </tr>
                </tbody>
                </table>
                
                ';
        }
    }
    //echo $arr["segunda"][0][0];


    
?>