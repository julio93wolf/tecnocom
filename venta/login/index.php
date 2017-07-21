<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		// Validar contraseña correcta
		$correo=$_POST['correo'];
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$contrasena=$_POST['contrasena'];
			$confirmar=$_POST['confirmar'];
			if (strlen($contrasena)>=5) {
				if ($contrasena==$confirmar){
					// Insertamos el nuevo usuario
					$contrasena=md5($contrasena);
					$paraUsuario['correo']=$correo;
					$paraUsuario['contrasena']=$contrasena;
					$rowChange=$tecnocom->insertar('usuario',$paraUsuario);
					if ($rowChange>0) {
						$mensAlert[0]='Se agrego el nuevo usuario';
						// Obtenemos el id_usuario
						$datoUsuario=$tecnocom->consultar('select * from usuario where correo=:correo and contrasena=:contrasena',$paraUsuario);
						$id_usuario=$datoUsuario[0]['id_usuario'];
						$paraUsrRol['id_usuario']=$id_usuario;
						$paraUsrRol['id_rol']=2;
						// Insertamos el rol_usuario
						$tecnocom->insertar('usuario_rol',$paraUsrRol);
						// Insertamos en nuevo cliente
						$paraCliente['nombre']=$_POST['nombre'];
						$paraCliente['apaterno']=$_POST['apaterno'];
						$paraCliente['amaterno']=$_POST['amaterno'];
						$paraCliente['telefono']=$_POST['telefono'];
						$paraCliente['domicilio']=$_POST['domicilio'];
						$paraCliente['id_usuario']=$id_usuario;
						$rowChange=$tecnocom->insertar('cliente',$paraCliente);
						if ($rowChange>0) {
							$mensAlert[1]='Se agrego el nuevo cliente';
							// Obtenemos el id del cliente
							$paraCliente=array();
							$paraCliente['id_usuario']=$id_usuario;
							$datoCliente=$tecnocom->consultar('select id_cliente from cliente where id_usuario=:id_usuario',$paraCliente);
							$id_cliente=$datoCliente[0]['id_cliente'];
							$paraCarrito['id_cliente']=$id_cliente;
							$paraCarrito['subtotal']=0;
							$paraCarrito['iva']=0;
							$paraCarrito['total']=0;
							$rowChange=$tecnocom->insertar('carrito',$paraCarrito);
							if ($rowChange>0) {
								$mensAlert[2]='Se agrego el nuevo carrito para el cliente';
								$colorAlert='success';
								$iconAlert='glyphicon glyphicon-ok';
								include('../login/index.php');
								die();
							}else{
								$mensAlert[2]="Error: No se ha podido agregar un carrito al nuevo cliente";	
							}
						}else{
							$mensAlert[1]="Error: No se ha podido agregar al nuevo cliente";
						}
					}else{
						$mensAlert[0]="Error: No se ha podido agregar al nuevo usuario";
					}
				}else{
					$mensAlert[0]="Error: Las contraseñas no son correctas";
				}
			}else{
				$mensAlert[0]="Error: La contraseña debe tener al menos 5 carácteres";
			}
		}else{
			$mensAlert[0]="Error: El correo no es correcto";
		}
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Iniciar Sesión</h1>
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
		<form action="index.php" method="POST">
	  	<div class="form-group">
		    <label for="in_Email">Correo</label>
		    <input type="email" name="correo" class="form-control" id="in_Email" placeholder="Correo">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Contrasena">Contraseña</label>
		    <input type="password" name="contrasena" class="form-control" id="in_Contrasena" placeholder="Contraseña" onkeydown="password()">
	  	</div>
	  	
	  	<div class="form-group">
	  		<button type="submit" name="enviar" value="Registrarse" class="btn btn-primary">Registrarse</button>
				<a class="btn btn-danger pull-right" href="index.php">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div>
<script src="../../js/usuario.js"></script>
<?php
	include('../footer.php');
?>