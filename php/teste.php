<?php
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    $html = '
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <div class="box-body">
    <table class="table table-bordered table-hover">
    <tbody>
    <tr>
        <th>Bolsista</td>
        <th>Segunda</td>
        <th>Terça</td>
        <th>Quarta</td>
        <th>Quinta</td>
        <th>Sexta</td>
    </tr>
    <tr class="success">
        <td colspan="6" style="text-align:center"><b>Manhã<b></td>
    </tr>
    <tr>
        <td><b>Akacia 7:00 - 11:00</b></td>
        <td>Checkout</td>
        <td>Balcao</td>
        <td>Guarda Volumes</td>
        <td>Balcao</td>
        <td>Guarda Volumes</td>
    </tr>
    <tr>
        <td><b>Bismark 7:00 - 11:00</b></td>
        <td>Balcao</td>
        <td>Checkout</td>
        <td>Checkout</td>
        <td>Guarda Volumes</td>
        <td>Checkout</td>
    </tr>                   
    <tr>
        <td><b>Fernando  7:00 - 11:00</b></td>
        <td>Guarda Volumes</td>
        <td>Guarda Volumes</td>
        <td>Balcao</td>
        <td>Checkout</td>
        <td>Balcao</td>
    </tr>
    </tbody>
    </table>
    <div>

    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    ';

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents('tabela.pdf', $output);
?>