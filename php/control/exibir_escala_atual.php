<?php
	require_once '../../php/class/escala.class.php';
   		$esc = new Escala();
   		$id = $esc->getLastId();
		$esc->exibir_escala($id);
?>
