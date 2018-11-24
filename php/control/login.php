<?php
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    include '../class/gestor.class.php';
    $log = new Gestor();
    $log->logar($user,$pass);
?>