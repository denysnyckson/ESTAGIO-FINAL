<?php
    require_once '../../php/class/bolsista.class.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $turno = $_POST['turno'];
    $telefone = $_POST['telefone'];
    $horas = $_POST['horas'];
    $bol = new Bolsista();
    $bol->editar($id,$nome,$email,$turno,$telefone, $horas);
    header("Location: ../../pages/view/listar_bolsista.php");
?>