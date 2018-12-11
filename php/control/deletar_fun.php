<?php
    require_once '../../php/class/funcao.class.php';
    $id = $_GET['id'];
    $fun = new Funcao();
    $fun->delete($id);
    header("Location: ../../pages/view/listar_funcoes.php");
?>