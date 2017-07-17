<?php
	include_once('../tecnocom.class.php');
	$id_producto = $_GET['id_producto'];
	$parametros['id_producto']= $id_producto;
	$datos=$tecnocom->consultar('select * from compra_detalle where id_producto=:id_producto',$parametros);
	$mensajes[0]="No se han podido eliminar por que hay ".sizeof($datos)." compras asociadas";
	$color="danger";
	$icon='glyphicon-exclamation-sign';
	if(sizeof($datos)<=0){
		
		//Eliminar el producto del carrito de los usuarios
		$row_change=$tecnocom->borrar('carrito_detalle',$parametros);
		
		//Obtener el id de las ofertas asignadas al producto
		$oferta=$tecnocom->consultar('select id_oferta from oferta where id_producto=:id_producto',$parametros);
		foreach ($oferta as $key => $value) {
			$param_oferta = array();
			$param_oferta['id_oferta']=$value['id_oferta'];
			//Obtener los banner de las ofertas asiganadas
			$oferta_detalle=$tecnocom->consultar('select banner from oferta_banner where id_oferta=:id_oferta',$param_oferta);
			if(sizeof($oferta_detalle)>0){
				$oferta_banner=$oferta_detalle[0]['banner'];	
				//Eliminar los banners de la oferta
				$row_change=$tecnocom->borrar('oferta_banner',$param_oferta);
				if($row_change>0){
					if(file_exists('../../images/ofertas/'.$oferta_banner)){
							//Eliminar los banners de la carpeta del servidor
		    			unlink('../../images/ofertas/'.$oferta_banner);
					}
				}
			}
		}

		//Eliminar las ofertas del producto
		$row_change=$tecnocom->borrar('oferta',$parametros);
		if($row_change>0){
			$mensajes[0]="Se eliminaron ".$row_change." ofertas";
		}

		//Eliminar los detalles del producto
		$row_change=$tecnocom->borrar('producto_detalle',$parametros);

		//Obtener el nombre de la imagen del producto
		$producto_imagen="";
		$producto=$tecnocom->consultar('select imagen from producto where id_producto=:id_producto',$parametros);
		if(sizeof($producto)>0){
			$producto_imagen=$producto[0]['imagen'];	
		}
		//Eliminar el producto
		$row_change=$tecnocom->borrar('producto',$parametros);
		if($row_change>0){
			$mensajes[1]="Se eliminaron ".$row_change." productos";
			if($producto_imagen!=""){
				if(file_exists('../../images/productos/'.$producto_imagen)){
					//Eliminar las imagenes de la carpeta del servidor
	    		unlink('../../images/producto/'.$producto_imagen);
				}
			}
		}
		$color="success";
		$icon='glyphicon-ok';
	}
	include('index.php');
?>