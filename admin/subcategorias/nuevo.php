<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if(isset($_REQUEST['id_categoria'])){
		$id_categoria=$_REQUEST['id_categoria'];
	}else{
		header('Location: /tecnocom/admin/categorias/');
	}
	if (isset($_POST['enviar'])) {
		$paraSubCategoria['id_categoria']=$_POST['id_categoria'];
		$paraSubCategoria['subcategoria']=$_POST['subcategoria'];
		$rowChange=$tecnocom->insertar('subcategoria',$paraSubCategoria);			
		if ($rowChange>0) {
			$mensAlert[0]='Se inserto la nueva subcategoría';
			$colorAlert='success';
			$iconAlert='glyphicon glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido agregar la nueva subcategoría";
			$colorAlert="danger";
			$iconAlert='glyphicon-exclamation-sign';
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Nueva Subcategoría</h1>
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
			<input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
			<div class="form-group">
		    <label for="in_Subcategoria">Subcategoría</label>
		    <input type="text" name="subcategoria" class="form-control" id="in_Subcategoria" placeholder="Subcategoría">
	  	</div>
	  	<div class="form-group">
	  		<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
				<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-success">Guardar y Regresar</button>	
				<a class="btn btn-danger pull-right" href="index.php?id_categoria=<?php echo $id_categoria; ?>">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div>
<?php
	include('../footer.php');
?>