<?php
	include_once('../tecnocom.class.php');
	$mensAlert[0]="Error: No se ha seleccionado algún cliente a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_cliente'])){
		$id_cliente = $_GET['id_cliente'];
		$paraCliente['id_cliente']= $id_cliente;
		$datoCompra=$tecnocom->consultar('select * from compra where id_cliente=:id_cliente',$paraCliente);
		$mensAlert[0]="No se han podido eliminar por que hay ".sizeof($datoCompra)." compras asociadas";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if(sizeof($datoCompra)<=0){
			$datoCarrito=$tecnocom->consultar('select id_carrito from carrito where id_cliente=:id_cliente',$paraCliente);
			if(sizeof($datoCarrito)>0){
				$id_carrito=$datoCarrito[0]['id_carrito'];
				$paraCarrito['id_carrito']=$id_carrito;
				$datoDetalle=$tecnocom->consultar('select * from carrito_detalle where id_carrito=:id_carrito',$paraCarrito);
				echo "Numero de Productos: ".sizeof($datoDetalle)."<br />";
				$bandDetalle=true;
				if(sizeof($datoDetalle)>0){
					$rowChange=$tecnocom->borrar('carrito_detalle',$paraCarrito);
					echo "Productos Eliminados: ".$rowChange."<br />";
					if($rowChange<=0){
						$bandDetalle=false;
					}
				}
				if ($bandDetalle) {
					$rowChange=$tecnocom->borrar('carrito',$paraCliente);
					echo "Carritos Eliminados: ".$rowChange."<br />";
					if($rowChange<=0){
						$bandCarrito=false;
					}	
				}
			}
			die();
		}
	}
	include('index.php');   
?>