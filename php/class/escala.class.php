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
        public function exibir($numBol,$arr,$turno){
            for($x = 0;$x<$numBol; $x++){
                echo '
                    <tr>
                        <td><b>'.$this->name($arr["segunda"][$turno][$x][0]).'</b></td>
                        <td>'.$arr["segunda"][$turno][$x][1].'</td>
                        <td>'.$arr["terça"][$turno][$x][1].'</td>
                        <td>'.$arr["quarta"][$turno][$x][1].'</td>
                        <td>'.$arr["quinta"][$turno][$x][1].'</td>
                        <td>'.$arr["sexta"][$turno][$x][1].'</td>
                    </tr>    
                ';
            }
        }
        public function gerou(){
            $arr = $this->gerarEscala();
            echo '
                <table class="table table-bordered table-hover">
                <tr class = "success">
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
                </tr>';
            $this->exibir($this->bolsista->getNumBolsista('M'),$arr,"manha");
            echo '<tr class = "info"><td colspan="6" style="text-align:center"><b>Tarde</b></td></tr>';
            $this->exibir($this->bolsista->getNumBolsista('T'),$arr,"tarde");
            echo '<tr class = "danger"><td colspan="6" style="text-align:center"><b>Noite</b></td></tr>';
            $this->exibir($this->bolsista->getNumBolsista('N'),$arr,"noite");
            echo '    
                </tbody>
                </table>';
        }
    }
    //echo $arr["segunda"][0][0];


    
?>