<?php
	include_once('../tecnocom.class.php');
	if(isset($_GET['id_producto'])){
		$id_producto=$_GET['id_producto'];
	}else{
		header('Location: /tecnocom/admin/productos/');
	}
	$mensAlert[0]="Error: No se ha seleccionado una oferta a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_oferta'])) {
		$id_oferta = $_GET['id_oferta'];
		$paraOferta['id_oferta']= $id_oferta;
		$datoBanner=$tecnocom->consultar('select banner from oferta_banner where id_oferta=:id_oferta',$paraOferta);
		if (count($datoBanner)>0) {
			$banner=$datoBanner[0]['banner'];
			$rowChange=$tecnocom->borrar('oferta_banner',$paraOferta);
			if($rowChange>0){
				if(file_exists('../../images/ofertas/'.$banner)){
					//Eliminar los banners de la carpeta del servidor
	    		unlink('../../images/ofertas/'.$banner);
	    		$mensAlert[1]="Se elimino la imagen de la oferta";
	    		$colorAlert="success";
					$iconAlert='glyphicon-ok';
				}
			}else{
				$mensAlert[0]="Error: No se ha podido eliminar la imagen de la oferta";
			}
		}
		$rowChange=$tecnocom->borrar('oferta',$paraOferta);	
		if ($rowChange>0) {
			$mensAlert[0]="Se elimino ".$rowChange." oferta";
			$colorAlert="success";
			$iconAlert='glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido eliminar la oferta";
		}
	}
	include('index.php'); 
?>