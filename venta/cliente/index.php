<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
	echo "Bienvenido";
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
	die();
	include('../header.php');
?>

<?php
	include('../footer.php');
?>
