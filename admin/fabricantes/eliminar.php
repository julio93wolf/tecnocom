<?php
	include_once('../tecnocom.class.php');
	$id_fabricante = $_GET['id_fabricante'];
	$parametros['id_fabricante']= $id_fabricante;
	$datos=$tecnocom->consultar('select * from producto where id_fabricante=:id_fabricante',$parametros);
	$mensajes[0]="No se han podido eliminar por que hay ".sizeof($datos)." productos asociadas";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		$logo=$tecnocom->consultar('select logo from fabricante where id_fabricante=:id_fabricante',$parametros);
		$row_change=$tecnocom->borrar('fabricante',$parametros);	
		$mensajes[0]="Se eliminaron ".$row_change." fabricantes";
		if($row_change>0){
			if(file_exists('../../images/fabricantes/'.$logo[0]['logo'])){
    			unlink('../../images/fabricantes/'.$logo[0]['logo']);
			}
		}
		$color="success";
		$icon='glyphicon-ok';
	}
	include('index.php');
?>