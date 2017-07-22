<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
	echo "Bienvenido";
	include('../header.php');
?>

<?php
	include('../footer.php');
?>
