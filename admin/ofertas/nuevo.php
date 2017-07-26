<?php
	include_once('../tecnocom.class.php');
	if(isset($_REQUEST['id_producto'])){
		$rol[0]='Administrador';
		$tecnocom->security($rol,'/tecnocom/admin/login/');
		$id_producto=$_REQUEST['id_producto'];
	}else{
		header('Location: /tecnocom/admin/productos/');
	}
	if (isset($_POST['enviar'])) {
		$paraOferta['id_producto']=$_POST['id_producto'];
		$paraOferta['fechai']=$_POST['fechai'];
		$paraOferta['fechat']=$_POST['fechat'];
		$paraOferta['precio_oferta']=$_POST['precio_oferta'];
		$tecnocom->insertar('oferta',$paraOferta);			
		if ($tecnocom->rowChange>0) {
			$mensAlert[0]='Se agrego la nueva oferta';
			$colorAlert='success';
			$iconAlert='glyphicon glyphicon-ok';
			if(!empty($_FILES['banner']['name'])){
				$datoOferta=$tecnocom->consultar('select id_oferta from oferta where id_producto=:id_producto and fechai=:fechai and fechat=:fechat and precio_oferta=:precio_oferta',$paraOferta);
				$id_oferta=$datoOferta[0]['id_oferta'];
				$extension=explode('.',$_FILES['banner']['name']);
				$origen=$_FILES['banner']['tmp_name'];
				$destino='../../images/ofertas/oferta_'.$id_oferta.'.'.$extension[1];
				if($tecnocom->validarImagen($_FILES['banner'])){
					if(move_uploaded_file($origen,$destino)){
						$paraBanner['id_oferta']=$id_oferta;
						$paraBanner['banner']='oferta_'.$id_oferta.'.'.$extension[1];
						$tecnocom->insertar('oferta_banner',$paraBanner);			
						if ($tecnocom->rowChange>0) {
							$mensAlert[0]='Se agrego la imagen de la oferta';
							$colorAlert='success';
							$iconAlert='glyphicon glyphicon-ok';
						}else{
							$mensAlert[0]="Error: No se ha podido agregar la imagen de la oferta";
						}			
					}else{
						$mensAlert[0]="Error: No se ha podido cargar la imagen al servidor";
						$colorAlert="danger";
						$iconAlert='glyphicon-exclamation-sign';
					}
				}else{
					$mensAlert[0]="Error: El archivo tiene una extensión invalída";
					$colorAlert="danger";
					$iconAlert='glyphicon-exclamation-sign';
				}
			}
		}else{
			$mensAlert[0]="Error: No se ha podido agregar la nueva oferta";
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
  <h1>Nueva Oferta</h1>
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
		<form action="nuevo.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
			<div class="form-group">
		    <label for="in_FechaI">Fecha de Inicio</label>
		    <input type="date" name="fechai" class="form-control" id="in_FechaI" placeholder="Oferta">
	  	</div>
	  	<div class="form-group">
		    <label for="in_FechaT">Fecha de Termino</label>
		    <input type="date" name="fechat" class="form-control" id="in_FechaT" placeholder="Fecha de Termino">
	  	</div>
	  	<div class="form-group">
		    <label for="in_PrecioOferta">Precio de Oferta</label>
		    <input type="number" name="precio_oferta" class="form-control" id="in_PrecioOferta" placeholder="Precio de Oferta">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Imagen">Imagen de Oferta</label>
		    <input type="file" name="banner" id="in_Imagen">
		    <p class="help-block">Solo archivos .jpg, .png y .gif</p>
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