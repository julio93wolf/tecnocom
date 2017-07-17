<?php
	include_once('../tecnocom.class.php');
	$id_empleado = $_GET['id_empleado'];
	$parametros['id_empleado']= $id_empleado;
	$datos=$tecnocom->consultar('select id_usuario from empleado where id_empleado=:id_empleado',$parametros);
	$usuario['id_usuario']=$datos[0]['id_usuario'];
	$row_change=$tecnocom->borrar('empleado',$parametros);	
	$mensajes[0]="Se eliminaron ".$row_change." empleados";
	$row_change=$tecnocom->borrar('usuario_rol',$usuario);
	$row_change=$tecnocom->borrar('usuario',$usuario);	
	$mensajes[1]="Se eliminaron ".$row_change." usuarios";
	$color="success";
	$icon='glyphicon-ok';
	include('index.php');
?>