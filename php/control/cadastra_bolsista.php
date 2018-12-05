<?php
    require_once '../class/bolsista.class.php';
    $nome = $_POST["nome"];
    $turno = $_POST["turno"];
    $email = $_POST["email"];
    $horario = $_POST['horas'];
    $telefone = $_POST["telefone"];
    $bolsista = new Bolsista();
    $bolsista->cadastrar($nome,$turno,$email,$telefone,$horario);
    header("Location: ../../pages/index/index.php");
?>