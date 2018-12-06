<?php
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
    //$output = $dompdf->output();
    $dompdf->stream(
        "escala.pdf",array("Attachment"=>false)
    );
    //file_put_contents('../pdf/escala.pdf', $output);
   
?>