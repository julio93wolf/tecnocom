<?php
	include('../../admin/tecnocom.class.php');
	$metodo=$_SERVER['REQUEST_METHOD'];
	header('Content-Type: application/json');	
	$json=array('mensaje'=>'no se implemento ninguna acción');
	switch ($metodo) {
		case 'POST':
			$json=file_get_contents('php://input');
			$json=json_decode($json);
			foreach ($json as $key => $value) {
				$param['correo']=$value->correo;
				$param['contrasena']=$value->contrasena;
				$tecnocom->insertar('usuario',$param);
				$dato=$tecnocom->consultar('select id_usuario from usuario where correo=:correo and contrasena=:contrasena',$param);
				if ($tecnocom->rowChange>0) {
					$param=array();
					$param['id_usuario']=$dato[0]['id_usuario'];
					$param['nombre']=$value->nombre;
					$param['apaterno']=$value->apaterno;
					$param['amaterno']=$value->amaterno;
					$param['telefono']=$value->telefono;
					$param['domicilio']=$value->domicilio;
					$tecnocom->insertar('cliente',$param);
					if ($tecnocom->rowChange>0) {
						$param=array();
						$param['id_usuario']=$dato[0]['id_usuario'];
						$param['id_rol']=2;
						$tecnocom->insertar('usuario_rol',$param);
						if ($tecnocom->rowChange>0) {
							$param=array();
							$param['id_usuario']=$dato[0]['id_usuario'];
							$dato=$tecnocom->consultar('select id_cliente from cliente where id_usuario=:id_usuario',$param);
							$param=array();
							$param['id_cliente']=$dato[0]['id_cliente'];
							$param['subtotal']=0;
							$param['iva']=0;
							$param['total']=0;
							$tecnocom->insertar('carrito',$param);
							if ($tecnocom->rowChange>0) {
								$json=array('mensaje'=>'Se inserto el cliente');		
							}else{
								$json=array('mensaje'=>'No se inserto el carrito del cliente');
							}
						}else{
							$json=array('mensaje'=>'No se inserto rol del cliente');
						}
					}else{
						$json=array('mensaje'=>'No se inserto el cliente');
					}
				}else{
					$json=array('mensaje'=>'No se inserto el usuario del cliente');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_cliente'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$llave['id_cliente']=$_GET['id_cliente'];
				foreach ($json as $key => $value) {
					$param['nombre']=$value->nombre;
					$param['apaterno']=$value->apaterno;
					$param['amaterno']=$value->amaterno;
					$param['telefono']=$value->telefono;
					$param['domicilio']=$value->domicilio;
					$tecnocom->actualizar('cliente',$param,$llave);
					if ($tecnocom->rowChange>0) {
						$param=array();
						$param['id_cliente']=$_GET['id_cliente'];
						$dato=$tecnocom->consultar('select id_usuario from cliente where id_cliente=:id_cliente',$param);
						$llave=array();
						$llave['id_usuario']=$dato[0]['id_usuario'];
						$param=array();
						$param['correo']=$value->correo;
						$param['contrasena']=$value->contrasena;
						$tecnocom->actualizar('usuario',$param,$llave);
						if ($tecnocom->rowChange>0) {
							$json=array('mensaje'=>'Se actualizaron los datos del cliente');
						}else{
							$json=array('mensaje'=>'No se actualizaron los datos del usuario');
						}
					}else{
						$json=array('mensaje'=>'No se actualizaron los datos del cliente o el cliente no existe');
					}
				}
			}else{
				$json=array('mensaje'=>'El ID del cliente es Obligatorío');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_cliente'])) {
					$param['id_cliente']=$_GET['id_cliente'];
					$tecnocom->consultar('select * from compra where id_cliente=:id_cliente',$param);
					if ($tecnocom->rowChange==0) {
						$tecnocom->consultar('select id_usuario from cliente where id_cliente=:id_cliente',$param);
						if ($tecnocom->rowChange>0) {

							$dato=$tecnocom->consultar('select id_carrito from carrito where id_cliente=:id_cliente',$param);
							$param=array();
							$param['id_carrito']=$dato[0]['id_carrito'];
							$tecnocom->borrar('carrito_detalle',$param);
							$param=array();
							$param['id_cliente']=$_GET['id_cliente'];
							$tecnocom->borrar('carrito',$param);
							if ($tecnocom->rowChange>0) {
								$dato=$tecnocom->consultar('select id_usuario from cliente where id_cliente=:id_cliente',$param);
								$tecnocom->borrar('cliente',$param);
								if ($tecnocom->rowChange>0) {
									$param=array();
									$param['id_usuario']=$dato[0]['id_usuario'];
									$tecnocom->borrar('usuario_rol',$param);
									if ($tecnocom->rowChange>0) {	
										$tecnocom->borrar('usuario',$param);
										if ($tecnocom->rowChange>0){
											$json=array('mensaje'=>'Se elimino el cliente');	
										}else{
											$json=array('mensaje'=>'No se elimino el usuario');	
										}
									}else{
										$json=array('mensaje'=>'No se elimino el rol del cliente');	
									}
								}else{
									$json=array('mensaje'=>'No se elimino el cliente');	
								}
							}else{
								$json=array('mensaje'=>'No se elimino el carrito del cliente');
							}
						}else{
							$json=array('mensaje'=>'El cliente no existe');
						}					

					}else{
						$json=array('mensaje'=>'No se puede eliminar, existen '.$tecnocom->rowChange.' dependencias en la tabla compra');
					}
				}else{
					$json=array('mensaje'=>'El ID del cliente es obligatorío');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_cliente'])) {
					$param['id_cliente']=$_GET['id_cliente'];
					$json=$tecnocom->consultar('select id_cliente,correo,apaterno,amaterno,nombre,telefono,domicilio,rol from cliente join usuario using (id_usuario) join usuario_rol using (id_usuario) join rol using (id_rol) where id_cliente=:id_cliente order by id_cliente',$param);
				}else{
					$json=$tecnocom->consultar('select id_cliente,correo,apaterno,amaterno,nombre,telefono,domicilio,rol from cliente join usuario using (id_usuario) join usuario_rol using (id_usuario) join rol using (id_rol) order by id_cliente');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El cliente no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>