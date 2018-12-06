<?php 
    include 'session_start.php';
    if($_SESSION['log'] == 'false'){
        header('Location: ../../pages/login/index.php');
    }
?>