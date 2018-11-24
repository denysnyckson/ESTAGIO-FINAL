<?php 
    include 'session_start.php';
    if($_SESSION['log'] == 'false'){
        header('Location: ../login/index.php');
    }
?>