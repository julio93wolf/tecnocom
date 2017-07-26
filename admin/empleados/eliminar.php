<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	$mensAlert[0]="Error: No se ha seleccionado algún empleado a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_empleado'])){
		$mensAlert[0]="Error: No se ha podido eliminar el empleado";
		$id_empleado = $_GET['id_empleado'];
		$paraEmpleado['id_empleado']= $id_empleado;
		$datoEmpleado=$tecnocom->consultar('select * from empleado where id_empleado=:id_empleado',$paraEmpleado);
		if (count($datoEmpleado)>0) {
			$tecnocom->borrar('empleado',$paraEmpleado);
			if ($tecnocom->rowChange>0) {
				$mensAlert[0]=" Se ha eliminado ".$tecnocom->rowChange." empleado";
				$colorAlert='success';
				$iconAlert='glyphicon glyphicon-ok';
			}else{
				$mensAlert[0]="Error: No se ha ha podido eliminar el empleado";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
			$id_usuario=$datoEmpleado[0]['id_usuario'];
			$paraUsuario['id_usuario']=$id_usuario;
			$tecnocom->borrar('usuario_rol',$paraUsuario);
			$tecnocom->borrar('usuario',$paraUsuario);
			if ($tecnocom->rowChange>0) {
				$mensAlert[1]=" Se ha eliminado ".$tecnocom->rowChange." usuario";
				$colorAlert='success';
				$iconAlert='glyphicon glyphicon-ok';
			}else{
				$mensAlert[1]="Error: No se ha ha podido eliminar el usuario";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
		}else{
			$mensAlert[0]="Error: No se ha ha podido eliminar el empleado";
		}
	}
	include('index.php');
?>