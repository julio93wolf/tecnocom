<?php
	include_once('../tecnocom.class.php');
	$mensAlert[0]="Error: No se ha seleccionado un producto a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_producto'])) {
		$id_producto = $_GET['id_producto'];
		$paraProducto['id_producto']= $id_producto;
		$datoCompraDetalle=$tecnocom->consultar('select * from compra_detalle where id_producto=:id_producto',$paraProducto);
		$mensAlert[0]="No se han podido eliminar por que hay ".count($datoCompraDetalle)." compras asociadas";
		if(count($datoCompraDetalle)<=0){
			//Eliminar el producto del carrito de los usuarios
			$rowChange=$tecnocom->borrar('carrito_detalle',$paraProducto);
			//Obtener el id de las ofertas asignadas al producto
			$datoOferta=$tecnocom->consultar('select id_oferta from oferta where id_producto=:id_producto',$paraProducto);
			foreach ($datoOferta as $keyOferta => $varOferta) {
				$paraOferta = array();
				$paraOferta['id_oferta']=$varOferta['id_oferta'];
				//Obtener los banner de las ofertas asiganadas
				$datoOfertaBanner=$tecnocom->consultar('select banner from oferta_banner where id_oferta=:id_oferta',$paraOferta);
				if(count($datoOfertaBanner)>0){
					$oferta_banner=$datoOfertaBanner[0]['banner'];
					//Eliminar los banners de la oferta
					$rowChange=$tecnocom->borrar('oferta_banner',$paraOferta);
					if($rowChange>0){
						if(file_exists('../../images/ofertas/'.$oferta_banner)){
								//Eliminar los banners de la carpeta del servidor
			    			unlink('../../images/ofertas/'.$oferta_banner);
						}
					}
				}
			}

			// Eliminas las ofertas
			$rowChange=$tecnocom->borrar('oferta',$paraProducto);
			
			//Eliminar los detalles del producto
			$rowChange=$tecnocom->borrar('producto_detalle',$paraProducto);

			//Obtener el nombre de la imagen del producto
			$prodImagen="";
			$producto=$tecnocom->consultar('select imagen from producto where id_producto=:id_producto',$paraProducto);
			if(count($producto)>0){
				$prodImagen=$producto[0]['imagen'];	
			}
			//Eliminar el producto
			$rowChange=$tecnocom->borrar('producto',$paraProducto);
			if($rowChange>0){
				$colorAlert="success";
				$iconAlert='glyphicon-ok';
				$mensAlert[0]="Se eliminaron ".$rowChange." productos";
				if($prodImagen!=""){
					if(file_exists('../../images/productos/'.$prodImagen)){
						//Eliminar las imagenes de la carpeta del servidor
		    		unlink('../../images/productos/'.$prodImagen);
					}
				}
			}else{
				$mensAlert[0]="Error: No se pudo eliminar el producto";
			}
		}
	}
	include('index.php');
?>