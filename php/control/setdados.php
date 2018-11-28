<?php
    require_once '../../php/class/bolsista.class.php';
    $id = $_GET['id'];
    $bol = new Bolsista();
    $bol->setDados($id);
?>