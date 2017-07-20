<?php
	include_once('../tecnocom.class.php');
	if(isset($_GET['id_producto'])){
		$id_producto=$_GET['id_producto'];
	}else{
		header('Location: /tecnocom/admin/productos/');
	}
	$mensAlert[0]="Error: No se ha seleccionado una descripción a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_producto_detalle'])) {
		$id_producto_detalle = $_GET['id_producto_detalle'];
		$paraDetalle['id_producto_detalle']= $id_producto_detalle;
		$rowChange=$tecnocom->borrar('producto_detalle',$paraDetalle);	
		if ($rowChange>0) {
			$mensAlert[0]="Se eliminaron ".$rowChange." descripción";
			$colorAlert="success";
			$iconAlert='glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido eliminar la descripción";
		}
	}
	include('index.php'); 
?>