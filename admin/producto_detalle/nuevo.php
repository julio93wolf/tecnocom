<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if(isset($_REQUEST['id_producto'])){
		$id_producto=$_REQUEST['id_producto'];
	}else{
		header('Location: /tecnocom/admin/productos/');
	}
	if (isset($_POST['enviar'])) {
		$paraDetalle['id_producto']=$_POST['id_producto'];
		$paraDetalle['descripcion']=$_POST['descripcion'];
		$tecnocom->insertar('producto_detalle',$paraDetalle);			
		if ($tecnocom->rowChange>0) {
			$mensAlert[0]='Se inserto la nueva descripción';
			$colorAlert='success';
			$iconAlert='glyphicon glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido agregar la nueva descripción";
			$colorAlert="danger";
			$iconAlert='glyphicon-exclamation-sign';
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			unset($_POST['enviar']);
			die();
		}
		unset($_POST['enviar']);
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Nueva Descripción</h1>
</div>
<?php
	if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
		foreach ($mensAlert as $keyAlert => $valAlert) {
			echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$valAlert.'</div>';
		}
	}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form action="nuevo.php" method="POST">
			<input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
			<div class="form-group">
		    <label for="in_Descripcion">Descripción</label>
		    <input type="text" name="descripcion" class="form-control" id="in_Descripcion" placeholder="Descripción">
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