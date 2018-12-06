<?php
    require_once '../../php/class/escala.class.php';
    $escala = $_POST['escala'];
    $dia = $_POST['dia'];
    $esc = new Escala();
    $esc->salvar($dia,$escala);
    header("Location: ../../pages/view/listar_escala.php");
?>