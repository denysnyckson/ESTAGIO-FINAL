<?php
    require_once '../class/bolsista.class.php';
    $nome = $_POST["nome"];
    $turno = $_POST["turno"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $bolsista = new Bolsista();
    $bolsista->cadastrar($nome,$turno,$email,$telefone);
    header("Location: ../../pages/index/index.php");
?>