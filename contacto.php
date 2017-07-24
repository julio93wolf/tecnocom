<?php
	include_once('admin/tecnocom.class.php');
	include('header.php');
	if (isset($_POST['enviar'])) {

		$paramComentario['id_cliente'] = null;
		$paramComentario['nombre'] = $_POST['nombre'];
		$paramComentario['correo'] = $_POST['correo'];
		$paramComentario['tipo_comentario'] = $_POST['tipo_comentario'];
		$paramComentario['comentario'] = $_POST['comentario'];
		$paramComentario['fecha'] = date('Y-m-d');
		if ($_POST['no_cliente'] != '') {
			$paramCliente['id_cliente'] = $_POST['no_cliente'];
			$datoCliente = $tecnocom->consultar('select * from cliente where id_cliente=:id_cliente',$paramCliente);
			if(count($datoCliente)>0){
				$paramComentario['id_cliente'] = $_POST['no_cliente'];
			}
		}
		$tecnocom->insertar('comentario',$paramComentario);
		$mensaje='Comentario Enviado';
		$color='success';
		$icon='glyphicon glyphicon-info';
	}
?>
<section>
	<div class="panel panel-tecnocom">
		<div class="panel-heading">
		  <h3 class="panel-title">Contacto</h3>
		</div><!-- /.panel-heading -->  
	</div>
	<?php
		if(isset($mensaje) and isset($color) and isset($icon)){
			echo '<div class="alert alert-'.$color.' alert-dismissible" role="alert"><span class="glyphicon '.$icon.'" aria-hidden="true"></span> '.$mensaje.'</div>';
		}
	?>
	<div class="panel panel-tecnocom">
		  <div class="panel-body">
		  	<form action="contacto.php" method="POST">
			  	<div class="form-group">
				    <label for="in_Nombre">Nombre: </label>
				    <input type="text" name="nombre" class="form-control" id="in_Nombre" placeholder="Nombre">
			  	</div>
			  	<div class="form-group">
				    <label for="in_Correo">Correo: </label>
				    <input type="email" name="correo" class="form-control" id="in_Correo" placeholder="Correo">
			  	</div>
			  	<div class="form-group">
				    <label for="in_noCliente">Numero de Cliente: </label>
				    <input type="number" name="no_cliente" class="form-control" id="in_noCliente" placeholder="No. Cliente">
			  	</div>
			  	<div class="form-group">
			  		<label for="in_Comentario">Comentario: </label>
			  		<select class="form-control" name="tipo_comentario">
							<option value="sugerencia">Sugerencia</option>
							<option value="queja">Queja</option>
							<option value="felicitacion">Felicitación</option>
						</select>
			  		<textarea name="comentario" class="form-control" id="in_Comentario" placeholder="Comentario" rows="10"></textarea>
			  	</div>		  	
			  	<div class="form-group">
			  		<button type="submit" name="enviar" value="Enviar" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</button>
			  	</div>
			  </form>    
		  </div>
	</div>
</section>
<?php
	include('footer.php');
?>