<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
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
			
			// Se obtiene el id_carrito
			$datoCarrito=$tecnocom->consultar('select id_carrito from carrito where id_cliente=:id_cliente',$paraCliente);
			$id_carrito=$datoCarrito[0]['id_carrito'];
			$paraCarrito['id_carrito']=$id_carrito;
			
			// Se revisa que el carrito este vacio, de lo contrario se eliminan los registros
			$datoDetalle=$tecnocom->consultar('select * from carrito_detalle where id_carrito=:id_carrito',$paraCarrito);
			if(sizeof($datoDetalle)>0){
				$rowChange=$tecnocom->borrar('carrito_detalle',$paraCarrito);
			}

			// Se elimina el carrito del cliente
			$rowChange=$tecnocom->borrar('carrito',$paraCliente);
			if($rowChange>0){
				$mensAlert[0]='Se elimino '.$rowChange.' carrito';
				$colorAlert='success';
				$iconAlert='glyphicon glyphicon-ok';
			}else{
				$mensAlert[0]="Error al eliminar el carrito del cliente";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
			
			// Se obtiene el id_usuario del cliente
			$datoUsuario=$tecnocom->consultar('select id_usuario from cliente where id_cliente=:id_cliente',$paraCliente);
			$id_usuario=$datoUsuario[0]['id_usuario'];
			$paraUsuario['id_usuario']=$id_usuario;

			// Se elimina el cliente
			$rowChange=$tecnocom->borrar('cliente',$paraCliente);
			if($rowChange>0){
				$mensAlert[1]='Se elimino '.$rowChange.' cliente';
				$colorAlert='success';
				$iconAlert='glyphicon glyphicon-ok';
			}else{
				$mensAlert[1]="Error al eliminar el cliente";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}

			// Se elimina el usuario y su rol
			$tecnocom->borrar('usuario_rol',$paraUsuario);
			$rowChange=$tecnocom->borrar('usuario',$paraUsuario);
			if($rowChange>0){
				$mensAlert[2]='Se elimino '.$rowChange.' usuario';
				$colorAlert='success';
				$iconAlert='glyphicon glyphicon-ok';
			}else{
				$mensAlert[2]="Error al eliminar el usuario";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
		}
	}
	include('index.php');   
?>