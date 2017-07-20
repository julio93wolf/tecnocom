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
				if(file_exists('../../images/fabricantes/'.$_POST['logo_anterior'])){
	    		unlink('../../images/fabricantes/'.$_POST['logo_anterior']);
				}
				if(move_uploaded_file($origen,$destino)){
					$paraFabricante['fabricante']=$_POST['fabricante'];
					$paraFabricante['logo']=$logo.'.'.$extension[1];
					$llaveFabricante['id_fabricante']=$_POST['id_fabricante'];
					$rowChange=$tecnocom->actualizar('fabricante',$paraFabricante,$llaveFabricante);			
					if ($rowChange>0) {
						$mensAlert[0]='Se actualizaron los datos del fabricante';
						$colorAlert='success';
						$iconAlert='glyphicon glyphicon-ok';
					}else{
						$mensAlert[0]="Error: No se ha podido actualizar los datos del fabricante";
					}			
				}else{
					$mensAlert[0]="Error: No se ha podido cargar la imagen al servidor";
				}
			}else{
				$mensAlert[0]="Error: El archivo tiene una extensión invalída";
			}
		}else{
			$origen='../../images/fabricantes/'.$_POST['logo_anterior'];
			$logo=str_replace(" ","_",strtolower($_POST['fabricante']));
			$extension=explode('.',$_POST['logo_anterior']);
			if(file_exists($origen)){				
				$destino='../../images/fabricantes/'.$logo.'.'.$extension[1];
	    	rename($origen,$destino);
			}
			$paraFabricante['fabricante']=$_POST['fabricante'];
			$paraFabricante['logo']=$logo.'.'.$extension[1];
			$llaveFabricante['id_fabricante']=$_POST['id_fabricante'];
			$rowChange=$tecnocom->actualizar('fabricante',$paraFabricante,$llaveFabricante);				
			if ($rowChange>0) {
				$mensAlert[0]='Se actualizaron los datos del fabricante';
				$colorAlert='success';
				$iconAlert='glyphicon glyphicon-ok';
			}else{
				$mensAlert[0]="Error: No se ha podido actualizar los datos del fabricante";
			}			
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	if (isset($_REQUEST['id_fabricante'])) {
		$id_fabricante=$_REQUEST['id_fabricante'];
		$paraFabricante=array();
		$paraFabricante['id_fabricante']=$id_fabricante;
		$datoFabricante=$tecnocom->consultar('select * from fabricante where id_fabricante=:id_fabricante',$paraFabricante);
	}else{
		$mensAlert[0]="Error: No se ha seleccionado un producto a modificar";
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';	
		include('index.php');
		die();
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Editar Fabricante</h1>
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
		<form action="editar.php" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
		    <label for="in_Fabricante">Fabricante</label>
		    <input type="text" name="fabricante" class="form-control" id="in_Fabricante" placeholder="Fabricante" value="<?php echo $datoFabricante[0]['fabricante']; ?>">
	  	</div>
	  	
	  	<div class="form-group">
		    <label for="in_Logo">Imagen del Producto</label>
		    <input type="file" name="logo" id="in_Logo">
		    <p class="help-block">Solo archivos .jpg, .png y .gif</p>
		  </div>
		  <input type="hidden" name="logo_anterior" value="<?php echo $datoFabricante[0]['logo']; ?>">
		  <input type="hidden" name="id_fabricante" value="<?php echo $datoFabricante[0]['id_fabricante']; ?>">

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