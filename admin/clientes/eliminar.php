<?php
	include_once('../tecnocom.class.php');
	$id_cliente = $_GET['id_cliente'];
	$parametros['id_cliente']= $id_cliente;
	$datos=$tecnocom->consultar('select * from carrito where id_cliente=:id_cliente',$parametros);
	if(sizeof($datos)>0){
		$mensajes[0]="No se han podido eliminar por que hay ".sizeof($datos)." carritos asociados";		
	}
	$datos=$tecnocom->consultar('select * from compra where id_cliente=:id_cliente',$parametros);
	if(sizeof($datos)>0){
		$mensajes[1]="No se han podido eliminar por que hay ".sizeof($datos)." compras asociadas";		
	}
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$datos=$tecnocom->consultar('select id_usuario from cliente where id_cliente=:id_cliente',$parametros);
		$usuario['id_usuario']=$datos[0]['id_usuario'];
		$row_change=$tecnocom->borrar('cliente',$parametros);	
		$mensajes[0]="Se eliminaron ".$row_change." clientes";
		$row_change=$tecnocom->borrar('usuario_rol',$usuario);
		$row_change=$tecnocom->borrar('usuario',$usuario);	
		$mensajes[1]="Se eliminaron ".$row_change." usuarios";
		$color="success";
		$icon='glyphicon-ok';
	}
	include('index.php');
?>