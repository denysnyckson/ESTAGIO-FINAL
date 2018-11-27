<?php
    require_once '../class/funcao.class.php';
    $nome = $_POST["nome"];
    $qnt = $_POST["qnt"];

    $funcao = new Funcao();
    $funcao->cadastrar($nome,$qnt);
    header("Location: ../../pages/index/index.php");
?>
