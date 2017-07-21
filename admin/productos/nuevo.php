<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	if (isset($_POST['enviar'])) {
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if(!empty($_FILES['imagen']['name'])){
			$extension=explode('.',$_FILES['imagen']['name']);
			$origen=$_FILES['imagen']['tmp_name'];
			$destino='../../images/productos/'.$_POST['sku'].'.'.$extension[1];
			if($tecnocom->validarImagen($_FILES['imagen'])){
				if(move_uploaded_file($origen,$destino)){
					$paraProducto['sku']=$_POST['sku'];
					$paraProducto['producto']=$_POST['producto'];
					$paraProducto['modelo']=$_POST['modelo'];
					$paraProducto['precio']=$_POST['precio'];
					$paraProducto['id_fabricante']=$_POST['id_fabricante'];
					$paraProducto['id_subcategoria']=$_POST['id_subcategoria'];
					$paraProducto['imagen']=$_POST['sku'].'.'.$extension[1];
					$rowChange=$tecnocom->insertar('producto',$paraProducto);			
					if ($rowChange>0) {
						$mensAlert[0]='Se inserto el nuevo producto';
						$colorAlert='success';
						$iconAlert='glyphicon glyphicon-ok';
					}else{
						$mensAlert[0]="Error: No se ha podido agregar la nueva categoría";
					}			
				}else{
					$mensAlert[0]="Error: No se ha podido cargar la imagen al servidor";
				}
			}else{
				$mensAlert[0]="Error: El archivo tiene una extensión invalída";
			}
		}else{
			$mensAlert[0]="Error: No se cargo la imagen del producto";
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	$dropFabricante = $tecnocom->dropDownList('select id_fabricante as id,fabricante as opcion from fabricante order by fabricante asc','id_fabricante');
	$dropSubcategoria = $tecnocom->dropDownList('select id_subcategoria as id,subcategoria as opcion from subcategoria order by subcategoria asc','id_subcategoria');
	include('../header.php');
?>
<div class="page-header">
  <h1>Nuevo Producto</h1>
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
		    <label for="in_SKU">SKU</label>
		    <input type="text" name="sku" class="form-control" id="in_SKU" placeholder="SKU">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Producto">Producto</label>
		    <input type="text" name="producto" class="form-control" id="in_Producto" placeholder="Producto">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Modelo">Modelo</label>
		    <input type="text" name="modelo" class="form-control" id="in_Modelo" placeholder="Modelo">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Precio">Precio</label>
		    <input type="number" name="precio" class="form-control" id="in_Precio" placeholder="Precio">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Precio">Fabricante</label>
		    <?php echo $dropFabricante; ?>
	  	</div>
	  	<div class="form-group">
		    <label for="in_Precio">Categoría</label>
		    <?php echo $dropSubcategoria; ?>
	  	</div>
	  	<div class="form-group">
		    <label for="in_Imagen">Imagen del Producto</label>
		    <input type="file" name="imagen" id="in_Imagen">
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