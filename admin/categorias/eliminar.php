<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	$mensAlert[0]="Error: No se ha seleccionado una categoría a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_categoria'])) {
		$id_categoria = $_GET['id_categoria'];
		$paraCategoria['id_categoria']= $id_categoria;
		$datoSubCategorias=$tecnocom->consultar('select * from subcategoria where id_categoria=:id_categoria',$paraCategoria);
		$mensAlert[0]="No se han podido eliminar por que hay ".sizeof($datoSubCategorias)." subcategorias asociadas";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if(sizeof($datoSubCategorias)<=0){
			$tecnocom->borrar('categoria',$paraCategoria);
			if ($tecnocom->rowChange>0) {
				$mensAlert[0]="Se eliminaron ".$tecnocom->rowChange." categorias";
				$colorAlert="success";
				$iconAlert='glyphicon-ok';
			}else{
				$mensAlert[0]="Error: No se ha podido eliminar la categoría";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
		}
	}
	include('index.php');   
?>