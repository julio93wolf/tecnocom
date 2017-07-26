<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if(isset($_REQUEST['id_producto'])){
		$id_producto=$_REQUEST['id_producto'];
	}else{
		header('Location: /tecnocom/admin/producto/');
	}
	if (isset($_POST['enviar'])) {
		$llaveDetalle['id_producto_detalle']=$_POST['id_producto_detalle'];
		$paraDetalle['descripcion']=$_POST['descripcion'];
		$tecnocom->actualizar('producto_detalle',$paraDetalle,$llaveDetalle);
		$mensAlert[0]='Se actualizo la descripción';
		$colorAlert='success';
		$iconAlert='glyphicon glyphicon-ok';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	if(isset($_REQUEST['id_producto_detalle'])){
		$id_producto_detalle=$_REQUEST['id_producto_detalle'];
		$paraDetalle=array();
		$paraDetalle['id_producto_detalle']=$_REQUEST['id_producto_detalle'];
		$datoDetalle=$tecnocom->consultar("select * from producto_detalle where id_producto_detalle=:id_producto_detalle",$paraDetalle);
	}else{
		$mensAlert[0]="Error: No se ha seleccionado una subcategoría a modificar";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';	
		include('index.php');
		die();
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Editar Descripción</h1>
</div>
<?php
	if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
		foreach ($mensAlert as $key => $value) {
			echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$value.'</div>';
		}
	}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form action="editar.php" method="POST">
			<input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
			<input type="hidden" name="id_producto_detalle" value="<?php echo $id_producto_detalle; ?>">
			<div class="form-group">
		    <label for="in_Descripcion">Descripción</label>
		    <input type="text" name="descripcion" class="form-control" id="in_Descripcion" placeholder="Descripción" value="<?php echo $datoDetalle[0]['descripcion']; ?>">
	  	</div>
	  	<div class="form-group">
	  		<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
				<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-success">Guardar y Regresar</button>	
				<a class="btn btn-danger pull-right" href="index.php?id_producto=<?php echo $id_producto; ?>">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div>
<?php
	include('../footer.php');
?>