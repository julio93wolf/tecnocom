<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		$paraCategoria['categoria']=$_POST['categoria'];
		$rowChange=$tecnocom->insertar('categoria',$paraCategoria);			
		if ($rowChange>0) {
			$mensAlert[0]='Se inserto la nueva categoría';
			$colorAlert='success';
			$iconAlert='glyphicon glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido agregar la nueva categoría";
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
  <h1>Nueva Categoría</h1>
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
		<form action="nuevo.php" method="POST">
			<div class="form-group">
		    <label for="in_Categoria">Categoría</label>
		    <input type="text" name="categoria" class="form-control" id="in_Categoria" placeholder="Categoría">
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