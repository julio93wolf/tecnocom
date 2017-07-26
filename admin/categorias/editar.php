<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if (isset($_POST['enviar'])) {
		$llaveCategoria['id_categoria']=$_POST['id_categoria'];
		$paraCategoria['categoria']=$_POST['categoria'];
		$tecnocom->actualizar('categoria',$paraCategoria,$llaveCategoria);
		$mensAlert[0]='Se actualizo la categoría';
		$colorAlert='success';
		$iconAlert='glyphicon glyphicon-ok';
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	if(isset($_REQUEST['id_categoria'])){
		$paraCategoria=array();
		$paraCategoria['id_categoria']=$_REQUEST['id_categoria'];
		$datosCategoria=$tecnocom->consultar("select * from categoria where id_categoria=:id_categoria",$paraCategoria);
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
  <h1>Editar Categoría</h1>
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
			<input type="hidden" name="id_categoria" value="<?php echo $datosCategoria[0]['id_categoria']; ?>">
			<div class="form-group">
		    <label for="in_Categoria">Categoría</label>
		    <input type="text" name="categoria" class="form-control" id="in_Categoria" placeholder="Subcategoría" value="<?php echo $datosCategoria[0]['categoria']; ?>">
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