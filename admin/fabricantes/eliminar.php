<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	$mensAlert[0]="Error: No se ha seleccionado un fabricante a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_fabricante'])) {
		$id_fabricante = $_GET['id_fabricante'];
		$paraFabricante['id_fabricante']= $id_fabricante;
		$datoProducto=$tecnocom->consultar('select * from producto where id_fabricante=:id_fabricante',$paraFabricante);
		$mensAlert[0]="No se han podido eliminar por que hay ".count($datoProducto)." productos asociados";
		if(count($datoProducto)<=0){
			//Obtener el nombre del logo del fabricante
			$logo="";
			$datoFabricante=$tecnocom->consultar('select logo from fabricante where id_fabricante=:id_fabricante',$paraFabricante);
			if(count($datoFabricante)>0){
				$logo=$datoFabricante[0]['logo'];	
			}
			//Eliminar el producto
			$rowChange=$tecnocom->borrar('fabricante',$paraFabricante);
			if($rowChange>0){
				$colorAlert="success";
				$iconAlert='glyphicon-ok';
				$mensAlert[0]="Se elimino ".$rowChange." fabricante";
				if($logo!=""){
					if(file_exists('../../images/fabricantes/'.$logo)){
						//Eliminar las imagenes de la carpeta del servidor
		    		unlink('../../images/fabricantes/'.$logo);
					}
				}
			}else{
				$mensAlert[0]="Error: No se pudo eliminar el fabricante";
			}
		}
	}
	include('index.php');
?>