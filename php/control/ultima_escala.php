<?php
    require_once '../../php/class/escala.class.php';
    $esc = new Escala();
    $id = $esc->getLastId();

    header("Location: ../../php/control/gerarpdf.php?id=$id");
?>