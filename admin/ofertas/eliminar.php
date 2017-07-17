<?php
	if(!isset($_REQUEST['id_oferta'])){
		header('Location: /tecnocom/admin/productos/');
	}
	include_once('../tecnocom.class.php');
	$id_oferta = $_REQUEST['id_oferta'];
	$id_producto = $_REQUEST['id_producto'];
	$param_detalle['id_oferta']= $id_oferta;
	$parametros['id_producto']= $id_producto;
	$row_change=$tecnocom->borrar('producto_detalle',$param_detalle);	
	$mensajes[0]="Descripción eliminada";
	$color="success";
	$icon='glyphicon-ok';
	include('index.php');
?>