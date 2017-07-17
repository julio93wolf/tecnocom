<?php
	if(!isset($_REQUEST['id_producto_detalle'])){
		header('Location: /tecnocom/admin/productos/');
	}
	include_once('../tecnocom.class.php');
	$id_producto_detalle = $_REQUEST['id_producto_detalle'];
	$id_producto = $_REQUEST['id_producto'];
	$param_detalle['id_producto_detalle']= $id_producto_detalle;
	$parametros['id_producto']= $id_producto;
	$row_change=$tecnocom->borrar('producto_detalle',$param_detalle);	
	$mensajes[0]="Descripción eliminada";
	$color="success";
	$icon='glyphicon-ok';
	include('index.php');
?>