<?php
    require_once '../../php/class/funcao.class.php';
    $nome = $_POST['nome'];
    $qnt = $_POST['qnt'];
    $fun = new Funcao();
    $fun->editar($nome,$qnt);
    header("Location: ../../pages/view/listar_funcoes.php");
?>