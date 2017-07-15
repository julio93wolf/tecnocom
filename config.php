<?php

	/*Configuración de la base de datos - Conexion*/
	define('USER','admin_tecnocom');
	define('PASSWORD','12345');
	define('SGDB','mysql');
	define('DB','tecnocom');
	define('SGDB_SERVER','localhost');
	$conexion = new PDO(SGDB.':host='.SGDB_SERVER.';dbname='.DB,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

?>