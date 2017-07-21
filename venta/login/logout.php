<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
	session_destroy();
	header('Location: /tecnocom/');
?>