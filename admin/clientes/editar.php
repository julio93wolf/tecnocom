<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		// Validar correo
		$correo=$_POST['correo'];
		$colorAlert="danger";
		$iconAlert='glyphicon-exclamation-sign';
		if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			if(isset($_POST['contrasena'])){
				// Valida que conozca la contraseña anterior
				$actual=$_POST['actual'];
				$anterior=$_POST['anterior'];
				$anterior=md5($anterior);
				if ($actual==$anterior) {
					// Valida que la nueva contraseña 
					$contrasena=$_POST['contrasena'];
					$confirmar=$_POST['confirmar'];
					if (strlen($contrasena)>=5) {
						if ($contrasena==$confirmar){
							// Actualizamos el usuario
							$contrasena=md5($contrasena);
							$paraUsuario['correo']=$correo;
							$paraUsuario['contrasena']=$contrasena;
							$llaveUsuario['id_usuario']=$_POST['id_usuario'];
							$rowChange=$tecnocom->actualizar('usuario',$paraUsuario,$llaveUsuario);
							if ($rowChange>0) {
								$mensAlert[0]='Se actualizo la informacion del usuario';
								// Actualizamos la informacion del cliente
								$paraCliente['nombre']=$_POST['nombre'];
								$paraCliente['apaterno']=$_POST['apaterno'];
								$paraCliente['amaterno']=$_POST['amaterno'];
								$paraCliente['telefono']=$_POST['telefono'];
								$paraCliente['domicilio']=$_POST['domicilio'];
								$llaveCliente['id_cliente']=$_POST['id_cliente'];
								$rowChange=$tecnocom->actualizar('cliente',$paraCliente,$llaveCliente);
								if ($rowChange>0) {
									$mensAlert[1]='Se actualizo la informacion del cliente';
									$colorAlert='success';
									$iconAlert='glyphicon glyphicon-ok';
										
								}else{
									$mensAlert[1]="Error: No se ha podido modificar la información del cliente";
								}
							}else{
								$mensAlert[0]="Error: No se ha podido modificar la información del usuario";
							}
						}else{
							$mensAlert[0]="Error: Las contraseñas no son correctas";
						}		
					}else{
						$mensAlert[0]="Error: La contraseña debe tener al menos 5 carácteres";
					}
				}else{
					$mensAlert[0]="Error: La contraseña actual no coincide";
				}
			}else{
				$paraUsuario['correo']=$correo;
				$llaveUsuario['id_usuario']=$_POST['id_usuario'];
				$rowChange=$tecnocom->actualizar('usuario',$paraUsuario,$llaveUsuario);
				if ($rowChange>0) {
					$mensAlert[0]='Se actualizo la informacion del usuario';
					// Actualizamos la informacion del cliente
					$paraCliente['nombre']=$_POST['nombre'];
					$paraCliente['apaterno']=$_POST['apaterno'];
					$paraCliente['amaterno']=$_POST['amaterno'];
					$paraCliente['telefono']=$_POST['telefono'];
					$paraCliente['domicilio']=$_POST['domicilio'];
					$llaveCliente['id_cliente']=$_POST['id_cliente'];
					$rowChange=$tecnocom->actualizar('cliente',$paraCliente,$llaveCliente);
					if ($rowChange>0) {
						$mensAlert[1]='Se actualizo la informacion del cliente';
						$colorAlert='success';
						$iconAlert='glyphicon glyphicon-ok';
					}else{
						$mensAlert[1]="Error: No se ha podido modificar la información del cliente";
					}
				}else{
					$mensAlert[0]="Error: No se ha podido modificar la información del usuario";
				}
			}
		}else{
			$mensAlert[0]="Error: El correo no es correcto";
		}
		if($_POST['enviar']=="Guardar y Regresar"){
			include('index.php');
			die();
		}
	}
	if ($_REQUEST['id_cliente']) {
		$id_cliente = $_REQUEST['id_cliente'];
		$paraCliente=array();
		$paraCliente['id_cliente'] =$id_cliente;
		$datoCliente = $tecnocom->consultar('select * from cliente join usuario using (id_usuario) where id_cliente=:id_cliente',$paraCliente);
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Editar Cliente</h1>
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
		<form action="editar.php" method="POST">
			
			<div class="form-group">
		    <label for="in_Nombre">Nombre</label>
		    <input type="text" name="nombre" class="form-control" id="in_Nombre" placeholder="Nombre(s)" value="<?php echo $datoCliente[0]['nombre']?>">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Paterno">Apellido Paterno</label>
		    <input type="text" name="apaterno" class="form-control" id="in_Paterno" placeholder="Apellido Paterno" value="<?php echo $datoCliente[0]['apaterno']?>">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Materno">Apellido Materno</label>
		    <input type="text" name="amaterno" class="form-control" id="in_Materno" placeholder="Apellido Materno" value="<?php echo $datoCliente[0]['amaterno']?>">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Phone">Teléfono</label>
		    <input type="tel" name="telefono" class="form-control" id="in_Phone" placeholder="Teléfono" value="<?php echo $datoCliente[0]['telefono']?>">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Domicilio">Domicilio</label>
		    <input type="text" name="domicilio" class="form-control" id="in_Domicilio" placeholder="Domicilio" value="<?php echo $datoCliente[0]['domicilio']?>">
	  	</div>
	  	<div class="form-group">
		    <label for="in_Email">Correo</label>
		    <input type="email" name="correo" class="form-control" id="in_Email" placeholder="Correo" value="<?php echo $datoCliente[0]['correo']?>">
	  	</div>

	  	<div class="checkbox">
		    <label>
		      <input type="checkbox" id="in_Password" onclick="new_password()"> Modificar Contraseña
		    </label>
		  </div>
		  <div class="form-group">
		    <label for="in_Anterior">Contraseña</label>
		    <input type="password" name="anterior" class="form-control" id="in_Anterior" placeholder="Contraseña" disabled>
	  	</div>
	  	<div class="form-group">
		    <label for="in_Contrasena">Nueva Contraseña</label>
		    <input type="password" name="contrasena" class="form-control" id="in_Contrasena" placeholder="Nueva Contraseña" onkeydown="password()" disabled>
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
		    <input type="password" name="confirmar" class="form-control" id="in_Confirmar" placeholder="Confirmar Contraseña" disabled>
	  	</div>
	  	<input type="hidden" name="id_cliente" value="<?php echo $datoCliente[0]['id_cliente']?>">
	  	<input type="hidden" name="id_usuario" value="<?php echo $datoCliente[0]['id_usuario']?>">
	  	<input type="hidden" name="actual" value="<?php echo $datoCliente[0]['contrasena']?>">
	  	<div class="form-group">
	  		<button type="submit" name="enviar" value="Guardar" class="btn btn-primary">Guardar</button>
				<button type="submit" name="enviar" value="Guardar y Regresar" class="btn btn-success">Guardar y Regresar</button>	
				<a class="btn btn-danger pull-right" href="index.php">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div>
<script src="../../js/usuario.js"></script>
<?php
	include('../footer.php');
?>