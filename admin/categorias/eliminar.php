<?php
	include_once('../tecnocom.class.php');
	$id_categoria = $_GET['id_categoria'];
	$parametros['id_categoria']= $id_categoria;
	$datos=$tecnocom->consultar('select * from subcategoria where id_categoria=:id_categoria',$parametros);
	$mensajes[0]="No se han podido eliminar por que hay ".sizeof($datos)." subcategorias asociadas";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$row_change=$tecnocom->borrar('categoria',$parametros);	
		$mensajes[0]="Se eliminaron ".$row_change." categorias";
		$color="success";
		$icon='glyphicon-ok';
	}
	include('index.php');
?>