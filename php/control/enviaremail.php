<?php
require_once '../../php/class/email.class.php';
require_once '../../php/class/escala.class.php';
require_once '../../php/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$id = $_GET['id'];
$escala = new Escala();
$html = $escala->gerar_html($id);
$html = $html . '
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
</tbody>
</table>';
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('../../php/pdf/escala.pdf', $output);
$mail = new Email();
$mail->enviarTeste();
header('Location: ../../pages/view/listar_escala.php');


















/*require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';
 //From settings
$empresa = "SISGES";
$nome = "Olá usuário(a).";
$email = 'denysboy10@gmail.com ';
$mensagem = "Segue o anexo da escala gerada";
$arquivo = fopen("../pdf/escala.pdf", "r") or die("Unable to open file!");;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    // $mail->SMTPDebug = 2; // mostra a saída do processo na tela
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sisges.ufrn@gmail.com'; // seu email (no caso, google)
    $mail->Password = 'sisgesadmin'; // sua senha do email
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
     //From:
    //$mail->SetFrom($mail->Username, 'Bruno Silva');
    $mail->SetFrom($mail->Username, $empresa);
    
    //To:
    $mail->AddAddress($email, $nome);
     $mail->Subject = "Escala";
    $mail->msgHTML("<html><br/>{$nome}<br/>Enviamos um email de envio da escala para: {$email}.<br/> <!-- Mensagem: --> {$mensagem}</html>");
    $mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
    $mail->AddAttachment('../pdf/escala.pdf');
     if ($mail->send()) {
        echo 'enviado';
        // header("Location: deucerto.php");
        echo 'Mensagem enviada com sucesso!';
     } else {
        // header("Location: deuerrado.php");
        echo 'Mensagem não foi enviada!';
    }
    
} catch (Exception $e) {
    echo 'Mensagem não foi enviada!';
    echo 'Erro: ' . $mail->ErrorInfo;
}*/
?>