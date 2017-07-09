<?php
	$user='admin_tecnocom';
	$password='12345';
	$conexion = new PDO('mysql:host=localhost;dbname=tecnocom', $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
?>