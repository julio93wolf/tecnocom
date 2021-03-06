<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		// Validar contraseña correcta
		$correo=$_POST['correo'];
		if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$contrasena=$_POST['contrasena'];
			$confirmar=$_POST['confirmar'];
			if (strlen($contrasena)>=5) {
				if ($contrasena==$confirmar){
					// Insertamos el nuevo usuario
					$contrasena=md5($contrasena);
					$paraUsuario['correo']=$correo;
					$paraUsuario['contrasena']=$contrasena;
					$tecnocom->insertar('usuario',$paraUsuario);
					if ($tecnocom->rowChange>0) {
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
						$tecnocom->insertar('cliente',$paraCliente);
						if ($tecnocom->rowChange>0) {
							// Obtenemos el id del cliente
							$paraCliente=array();
							$paraCliente['id_usuario']=$id_usuario;
							$datoCliente=$tecnocom->consultar('select id_cliente from cliente where id_usuario=:id_usuario',$paraCliente);
							$id_cliente=$datoCliente[0]['id_cliente'];
							$paraCarrito['id_cliente']=$id_cliente;
							$paraCarrito['subtotal']=0;
							$paraCarrito['iva']=0;
							$paraCarrito['total']=0;
							$tecnocom->insertar('carrito',$paraCarrito);
							if ($tecnocom->rowChange>0) {
								header('Location: /tecnocom/venta/login/');
								die();
							}
						}
					}
				}else{
					$mensAlert[0]="Error: Las contraseñas no son correctas";
					$colorAlert="danger";
					$iconAlert='glyphicon-exclamation-sign';
				}
			}else{
				$mensAlert[0]="Error: La contraseña debe tener al menos 5 carácteres";
				$colorAlert="danger";
				$iconAlert='glyphicon-exclamation-sign';
			}
		}else{
			$mensAlert[0]="Error: El correo no es correcto";
			$colorAlert="danger";
			$iconAlert='glyphicon-exclamation-sign';
		}
	}
	include('../header.php');
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8">
	<div class="page-header">
  		<h1>Registro</h1>
		</div>
		<?php
			if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
				foreach ($mensAlert as $key => $value) {
					echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$value.'</div>';
				}
			}
		?>
		<form action="index.php" method="POST">			
			<div class="form-group">
		    <label for="in_Nombre">Nombre</label>
		    <input type="text" name="nombre" class="form-control" id="in_Nombre" placeholder="Nombre(s)">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Paterno">Apellido Paterno</label>
		    <input type="text" name="apaterno" class="form-control" id="in_Paterno" placeholder="Apellido Paterno">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Materno">Apellido Materno</label>
		    <input type="text" name="amaterno" class="form-control" id="in_Materno" placeholder="Apellido Materno">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Phone">Teléfono</label>
		    <input type="tel" name="telefono" class="form-control" id="in_Phone" placeholder="Teléfono">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Domicilio">Domicilio</label>
		    <input type="text" name="domicilio" class="form-control" id="in_Domicilio" placeholder="Domicilio">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Email">Correo</label>
		    <input type="email" name="correo" class="form-control" id="in_Email" placeholder="Correo">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Contrasena">Contraseña</label>
		    <input type="password" name="contrasena" class="form-control" id="in_Contrasena" placeholder="Contraseña" onkeydown="password()">
	  	</div>
	  	<div class="progress">
			  <div class="progress-bar progress-bar-success" style="width: 0%" id="progrs_str">
			    <span class="sr-only">Segura</span>
			  </div>
			  <div class="progress-bar progress-bar-warning" style="width: 0%" id="progrs_int">
			    <span class="sr-only">Intermedia</span>
			  </div>
			  <div class="progress-bar progress-bar-danger" style="width: 0%" id="progrs_low">
			    <span class="sr-only">Baja</span>
			  </div>
			</div>
	  	<div class="form-group">
		    <label for="in_Confirmar">Confirmar Contraseña</label>
		    <input type="password" name="confirmar" class="form-control" id="in_Confirmar" placeholder="Contraseña">
	  	</div>
	  	<div class="form-group">
	  		<button type="submit" name="enviar" value="Registrarse" class="btn btn-primary">Registrarse</button>
				<a class="btn btn-danger pull-right" href="/tecnocom/">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div>
<script src="../../js/usuario.js"></script>
<?php
	include('../footer.php');
?>