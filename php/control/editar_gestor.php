<?php
    require_once '../../php/class/gestor.class.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $user = $_POST['usuario'];
    $senha = $_POST['senha'];
    $bol = new Gestor();
    $bol->editar($id,$nome,$user,$senha);
    header("Location: ../../pages/index/index.php");
?>