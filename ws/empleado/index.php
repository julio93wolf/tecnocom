<?php
	include('../../admin/tecnocom.class.php');
	$metodo=$_SERVER['REQUEST_METHOD'];
	header('Content-Type: application/json');	
	$json=array('mensaje'=>'no se implemento ninguna acción');
	switch ($metodo) {
		case 'POST':
		echo "POST";
			$json=file_get_contents('php://input');
			$json=json_decode($json);
			foreach ($json as $key => $value) {
				$param['correo']=$value->correo;
				$param['contrasena']=md5($value->contrasena);
				$tecnocom->insertar('usuario',$param);
				$dato=$tecnocom->consultar('select id_usuario from usuario where correo=:correo and contrasena=:contrasena',$param);
				if ($tecnocom->rowChange>0) {
					$param=array();
					$param['id_usuario']=$dato[0]['id_usuario'];
					$param['nombre']=$value->nombre;
					$param['apaterno']=$value->apaterno;
					$param['amaterno']=$value->amaterno;
					$tecnocom->insertar('empleado',$param);
					if ($tecnocom->rowChange>0) {
						$param=array();
						$param['id_usuario']=$dato[0]['id_usuario'];
						$param['id_rol']=1;
						$tecnocom->insertar('usuario_rol',$param);
						if ($tecnocom->rowChange>0) {
							$json=array('mensaje'=>'Se inserto el empleado');	
						}else{
							$json=array('mensaje'=>'No se inserto rol del empleado');
						}
					}else{
						$json=array('mensaje'=>'No se inserto el empleado');
					}
				}else{
					$json=array('mensaje'=>'No se inserto el usuario del empleado');
				}
			}
			break;
		case 'PUT':
			if (isset($_GET['id_empleado'])) {
				$json=file_get_contents('php://input');
				$json=json_decode($json);
				$param['id_empleado']=$_GET['id_empleado'];
				$dato=$tecnocom->consultar('select id_usuario from empleado where id_empleado=:id_empleado',$param);
				if ($tecnocom->rowChange>0) {
					foreach ($json as $key => $value) {
						$llave['id_empleado']=$_GET['id_empleado'];
						$param['nombre']=$value->nombre;
						$param['apaterno']=$value->apaterno;
						$param['amaterno']=$value->amaterno;
						$tecnocom->actualizar('empleado',$param,$llave);
						$llave=array();
						$llave['id_usuario']=$dato[0]['id_usuario'];
						$param=array();
						$param['correo']=$value->correo;
						$param['contrasena']=md5($value->contrasena);
						$tecnocom->actualizar('usuario',$param,$llave);
						$json=array('mensaje'=>'Se actualizaron los datos del empleado');
					}
				}else{
					$json=array('mensaje'=>'El empleado no existe');
				}
			}else{
				$json=array('mensaje'=>'El ID del Empleado es Obligatorío');
			}
			break;
		case 'DELETE':
				if (isset($_GET['id_empleado'])) {
					$param['id_empleado']=$_GET['id_empleado'];
					$tecnocom->consultar('select * from carrito where id_empleado=:id_empleado',$param);
					if ($tecnocom->rowChange==0) {
						$dato=$tecnocom->consultar('select id_usuario from empleado where id_empleado=:id_empleado',$param);
						if ($tecnocom->rowChange>0) {
							$tecnocom->borrar('empleado',$param);
							if ($tecnocom->rowChange>0) {
								$param=array();
								$param['id_usuario']=$dato[0]['id_usuario'];
								$tecnocom->borrar('usuario_rol',$param);
								if ($tecnocom->rowChange>0) {	
									$tecnocom->borrar('usuario',$param);
									if ($tecnocom->rowChange>0){
										$json=array('mensaje'=>'Se elimino el empleado');	
									}else{
										$json=array('mensaje'=>'No se elimino el usuario del empleado');	
									}
								}else{
									$json=array('mensaje'=>'No se elimino el rol del empleado');	
								}
							}else{
								$json=array('mensaje'=>'No se elimino el empleado');	
							}
						}else{
							$json=array('mensaje'=>'El empleado no existe');
						}					
					}else{
						$json=array('mensaje'=>'No se puede eliminar, existen '.$tecnocom->rowChange.' dependencias en la tabla carrito');
					}
				}else{
					$json=array('mensaje'=>'El ID del empleado es obligatorío');
				}
			break;
		default:
			case 'GET':
				if (isset($_GET['id_empleado'])) {
					$param['id_empleado']=$_GET['id_empleado'];
					$json=$tecnocom->consultar('select id_empleado,correo,apaterno,amaterno,nombre,rol from empleado join usuario using (id_usuario) join usuario_rol using (id_usuario) join rol using (id_rol) where id_empleado=:id_empleado order by id_empleado',$param);
				}else{
					$json=$tecnocom->consultar('select id_empleado,correo,apaterno,amaterno,nombre,rol from empleado join usuario using (id_usuario) join usuario_rol using (id_usuario) join rol using (id_rol) order by id_empleado');
				}
				if (count($json)==0) {
					$json=array('mensaje'=>'El empleado no existe');
				}
			break;
	}
	http_response_code(200);
	$json=json_encode($json);
	echo $json;
?>