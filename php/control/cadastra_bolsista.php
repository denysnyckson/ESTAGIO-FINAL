<?php
    require_once '../class/bolsista.class.php';
    $nome = $_POST["nome"];
    $turno = $_POST["turno"];
    $email = $_POST["email"];

    $bolsista = new Bolsista();
    $bolsista->cadastrar($nome,$turno,$email);
    header("Location: ../../pages/index/index.php");
?>