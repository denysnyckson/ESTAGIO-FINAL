<?php
    require_once '../../php/class/funcao.class.php';
    $id = $_GET['id'];
    $fun = new Funcao();
    $fun->setDadosFun($id);
?>