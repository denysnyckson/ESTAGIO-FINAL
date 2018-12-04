<?php
    require_once '../../php/class/escala.class.php';
    $id = $_GET['id'];
    $esc = new Escala();
    $esc->exibir_escala($id);
?>