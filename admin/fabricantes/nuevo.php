<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if(!empty($_FILES['logo']['name'])){
			$extension=explode('.',$_FILES['logo']['name']);
			$origen=$_FILES['logo']['tmp_name'];
			$logo=str_replace(" ","_",strtolower($_POST['fabricante']));
			$destino='../../images/fabricantes/'.$logo.'.'.$extension[1];
			if($tecnocom->validarImagen($_FILES['logo'])){
				if(move_uploaded_file($origen,$destino)){
					$paraFabricante['fabricante']=$_POST['fabricante'];
					$paraFabricante['logo']=$logo.'.'.$extension[1];
					$rowChange=$tecnocom->insertar('fabricante',$paraFabricante);			
					if ($rowChange>0) {
						$mensAlert[0]='Se inserto el nuevo fabricante';
						$colorAlert='success';
						$iconAlert='glyphicon glyphicon-ok';
					}else{
						$mensAlert[0]="Error: No se ha podido agregar el nuevo fabricante";
					}			
				}else{
					$mensAlert[0]="Error: No se ha podido cargar la logo al servidor";
				}
			}else{
				$mensAlert[0]="Error: El archivo tiene una extensión invalída";
			}
		}else{
			$mensAlert[0]="Error: No se cargo la logo del fabricante";
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Nuevo Fabricante</h1>
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
		<form action="nuevo.php" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
		    <label for="in_Fabricante">Fabricante</label>
		    <input type="text" name="fabricante" class="form-control" id="in_Fabricante" placeholder="Fabricante">
	  	</div>
	  
	  	<div class="form-group">
		    <label for="in_Logo">Logotipo del Fabricante</label>
		    <input type="file" name="logo" id="in_Logo">
		    <p class="help-block">Solo archivos .jpg, .png y .gif</p>
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