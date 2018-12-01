<?php
    require_once '../../php/class/bolsista.class.php';
    $id = $_GET['id'];
    $bol = new Bolsista();
    $bol->delete($id);
    header("Location: ../../pages/view/listar_bolsista.php");
?>