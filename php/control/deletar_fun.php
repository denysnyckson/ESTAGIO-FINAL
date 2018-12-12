<?php
    require_once '../../php/class/funcao.class.php';
    $id = $_GET['id'];
    $fun = new Funcao();
    $fun->deletar($id);
    header("Location: ../../pages/view/listar_funcoes.php");
?>