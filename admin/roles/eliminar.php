<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	$mensAlert[0]="Error: No se ha seleccionado algún rol a eliminar";
	$colorAlert="danger";
	$iconAlert='glyphicon-exclamation-sign';
	if (isset($_GET['id_rol'])) {
		$id_rol = $_GET['id_rol'];
		$paraRol['id_rol']= $id_rol;
		$datoRol=$tecnocom->consultar('select * from usuario_rol where id_rol=:id_rol',$paraRol);
		$mensAlert[0]="No se han podido eliminar por que hay ".sizeof($datoRol)." usuarios asociadas";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if(sizeof($datoRol)<=0){
			$tecnocom->borrar('rol',$paraRol);
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
	}
	include('index.php');   
?>