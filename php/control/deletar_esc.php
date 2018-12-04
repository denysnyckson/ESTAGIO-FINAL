<?php
    require_once '../../php/class/escala.class.php';
    $id = $_GET['id'];
    $esc = new Escala();
    $esc->deletar($id);
    header("Location: ../../pages/view/listar_escala.php");
?>