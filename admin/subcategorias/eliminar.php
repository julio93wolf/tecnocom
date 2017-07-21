<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if(isset($_GET['id_categoria'])){
		$id_categoria=$_GET['id_categoria'];
	}else{
		header('Location: /tecnocom/admin/categorias/');
	}
	$mensAlert[0]="Error: No se ha seleccionado una subcategoría a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_subcategoria'])) {
		$id_subcategoria = $_GET['id_subcategoria'];
		$paraSubCategoria['id_subcategoria']= $id_subcategoria;
		$datoProducto=$tecnocom->consultar('select * from producto where id_subcategoria=:id_subcategoria',$paraSubCategoria);
		$mensAlert[0]="No se han podido eliminar por que hay ".sizeof($datoProducto)." productos asociados";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if(sizeof($datoProducto)<=0){
			$rowChange=$tecnocom->borrar('subcategoria',$paraSubCategoria);	
			if ($rowChange>0) {
				$mensAlert[0]="Se eliminaron ".$rowChange." categorias";
				$colorAlert="success";
				$iconAlert='glyphicon-ok';
			}else{
				$mensAlert[0]="Error: No se ha podido eliminar la subcategoría";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
		}
	}
	include('index.php'); 
?>