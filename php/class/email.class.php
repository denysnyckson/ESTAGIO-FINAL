<?php
    require_once '../../php/PHPMailer/src/PHPMailer.php';
    require_once '../../php/PHPMailer/src/SMTP.php';
    require_once '../../php/PHPMailer/src/Exception.php';
    require_once '../../php/class/bolsista.class.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class Email{
        private $conn;
        private $instance;
        private $mail;    
        private $bolsista;
        private $empresa = 'SISGES';
        private $nome = "Olá usuário(a)";
        private $mensagem = "Segue o anexo da escala gerada";
        private $arquivo = '../../php/pdf/escala.pdf';
        private $email = 'sisges.ufrn@gmail.com';
        private $senha = '';
        public function __construct(){
            $this->instance = ConnectDb::getInstance();
            $this->conn = $this->instance->getConnection();
            $this->mail = new PHPMailer();
            $this->mail->CharSet = 'UTF-8';
            $this->mail->isSMTP();
            $this->mail->Subject = "Escala";
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $this->email; // seu email (no caso, google)
            $this->mail->Password = $this->senha; // sua senha do email
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;
            $this->mail->SetFrom($this->mail->Username, $this->empresa);
            $this->mail->AddAttachment($this->arquivo);
        }
        public function enviar(){
            $int = intval($id);
            $stmt = $this->conn->query("SELECT * FROM bolsistas");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $value){
                $name = $this->nome . $result['nome'];
                $this->mail->ClearAddresses();
                $this->mail->AddAddress($result['email'], $name);
                $this->mail->msgHTML("<html><br/>{$name}<br/>Enviamos um email de envio da escala para: {$result['email']}<br/>{$this->mensagem}.</html>");
                $this->mail->AltBody = "de: {$name}\nemail:{$result['email']}\nmensagem: {$this->mensagem}.";
                if ($mail->send()) {
                    // header("Location: deucerto.php");
                    echo 'Mensagem enviada com sucesso!';
                 } else {
                    // header("Location: deuerrado.php");
                    echo 'Mensagem não foi enviada!';
                }
            }
        }
        public function enviarTeste(){
            //$int = intval($id);
            //$stmt = $this->conn->query("SELECT * FROM bolsistas");
            //$stmt->execute();
            //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = ['evertonfernand23@gmail.com','denysboy10@gmail.com','evertonfrnds@gmail.com'];
            for($x=0;$x<3;$x++){
                $name = $this->nome;
                $this->mail->ClearAddresses();
                $this->mail->AddAddress($arr[$x], $name);
                $this->mail->msgHTML("<html><br/>{$name}<br/>Enviamos um email de envio da escala para: {$arr[$x]}<br/>{$this->mensagem}.</html>");
                $this->mail->AltBody = "de: {$name}\nemail:{$arr[$x]}\nmensagem: {$this->mensagem}.";
                if ($this->mail->send()) {
                    // header("Location: deucerto.php");
                    echo 'Mensagem enviada com sucesso!';
                 } else {
                    // header("Location: deuerrado.php");
                    echo 'Mensagem não foi enviada!';
                }
            }
        }
    }
?>