<?php
    //require_once '../PHPMailer/'
    /*
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $empresa = "Atendimento SIGEP";
    $nome = "Olá usuário(a).";
    $email = "evertonfernand23@gmail.com";
    $mensagem = "tetando né :D";
    $mail = new PHPMailer();
    //define smtp
    $mail->isSMTP();
    //define charset
    $mail->Charset = "UTF-8";
    //configurações
    $mail->SMTPAuth = true;
    $mail->SMTPSecure ='tls';
    $mail->Username = 'evertonfrnds@gmail.com'; // seu email (no caso, google)
    $mail->Password = 'everton12'; // sua senha do email
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->SetFrom($mail->Username, 'Everton Fernandes');
    //to
    $mail->AddAddress($email, $nome);
    $mail->Subject = "Recuperação de senha!";
    $mail->msgHTML("<html><br/>{$nome}<br/>Enviamos um email de recuperação para: {$email}<br/> <!-- Mensagem: --> {$mensagem}</html>");
    $mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
    if ($mail->send()) {
        // header("Location: deucerto.php");
        echo 'Mensagem enviada com sucesso!';
        //header('Location: view/PrincipalView.php');
     } else {
        //$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
        // header("Location: deuerrado.php");
        echo 'Mensagem não foi enviada!';
     }*/

     $message = "Ola e vai se fuder";
     $header = "From: juracy";
     if(mail("evertonfernand23@gmail.com","Testando",$message,$header)){
         echo 'enviado';
     }else{
        echo 'da o cu';
     }
?>