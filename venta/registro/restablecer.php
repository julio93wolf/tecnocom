<?php
	include_once('../tecnocom.class.php');
	if (isset($_REQUEST['llave'])) {
		$paraLlave['llave']=$_REQUEST['llave'];
		$datoUsuario=$tecnocom->consultar('select * from usuario where llave=:llave',$paraLlave);
		if (count($datoUsuario)>0 && strlen($datoUsuario[0]['llave'])>0) {
			if (isset($_POST['enviar'])) {
				$llaveUsuario['llave']=$_POST['llave'];
				$paraUsuario['llave']=null;
				$paraUsuario['contrasena']=md5($_POST['contrasena']);
				print_r($paraUsuario);
				die();
				$tecnocom->actualizar('usuario',$paraUsuario,$llaveUsuario);
				header('Location: /tecnocom/venta/login/index.php');
			}
		}else{
			header('Location: /tecnocom/venta/login/index.php');
		}
	}
	include('../header.php');
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
		<div class="page-header">
		  <h3>Restablecer Contraseña</h3>
		</div>

		<form action="restablecer.php" method="POST">
				<div class="form-group">
			    <label for="in_Password">Escriba la nueva contraseña</label>
			    <input type="password" name="contrasena" class="form-control" id="in_Password" placeholder="Contraseña">
			    <input type="hidden" name="llave" class="form-control" id="in_Llave" value="<?php echo $_REQUEST['llave']; ?>">
		  	</div>
		  	<div class="form-group">
			    <button type="submit" name="enviar" value="Enviar" class="btn btn-success">Enviar</button>
		  	</div>
		</form>
<?php
	include('../footer.php');
?>
