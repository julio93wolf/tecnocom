<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if(isset($_GET['id_usuario'])){
		$id_usuario=$_GET['id_usuario'];
	}else{
		header('Location: /tecnocom/admin/empleados/');
	}
	$mensAlert[0]="Error: No se ha seleccionado un rol a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_rol'])) {
		$id_rol = $_GET['id_rol'];
		$paraUserRol['id_usuario']= $id_usuario;
		$paraUserRol['id_rol']= $id_rol;
		$tecnocom->borrar('usuario_rol',$paraUserRol);	
		if ($tecnocom->rowChange>0) {
			$mensAlert[0]="Se elimino ".$tecnocom->rowChange." rol";
			$colorAlert="success";
			$iconAlert='glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido eliminar el rol";
			$colorAlert="danger";
			$iconAlert='glyphicon-exclamation-sign';
		}
	}
	include('index.php'); 
?>