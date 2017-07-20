<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		$llaveRol['id_rol']=$_POST['id_rol'];
		$paraRol['rol']=$_POST['rol'];
		$rowChange=$tecnocom->actualizar('rol',$paraRol,$llaveRol);
		if ($rowChange>0) {
			$mensAlert[0]='Se actualizo el rol';
			$colorAlert='success';
			$iconAlert='glyphicon glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido modificar el rol";
			$colorAlert="danger";
			$iconAlert='glyphicon-exclamation-sign';
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	if(isset($_REQUEST['id_rol'])){
		$paraRol=array();
		$paraRol['id_rol']=$_REQUEST['id_rol'];
		$datoRol=$tecnocom->consultar("select * from rol where id_rol=:id_rol",$paraRol);
	}else{
		$mensAlert[0]="Error: No se ha seleccionado una categoría a modificar";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';	
		include('index.php');
		die();
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Editar Rol</h1>
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
			<input type="hidden" name="id_rol" value="<?php echo $datoRol[0]['id_rol']; ?>">
			<div class="form-group">
		    <label for="in_Rol">Rol</label>
		    <input type="text" name="rol" class="form-control" id="in_Rol" placeholder="Rol" value="<?php echo $datoRol[0]['rol']; ?>">
	  	</div>
	  	<div class="form-group">
	  		<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
				<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-success">Guardar y Regresar</button>	
				<a class="btn btn-danger pull-right" href="index.php">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div>
<?php
	include('../footer.php');
?>