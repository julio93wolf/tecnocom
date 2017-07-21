<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['login'])) {
		$correo=$_POST['correo'];
		$contrasena=$_POST['contrasena'];
		if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$contrasena=md5($contrasena);
			$paraLogin['correo']=$correo;
			$paraLogin['contrasena']=$contrasena;
			$datoUsuario=$tecnocom->consultar('select * from usuario where correo=:correo and contrasena=:contrasena',$paraLogin);
			if (count($datoUsuario)>0) {
				$id_usuario=$datoUsuario[0]['id_usuario'];
				$paraRol['id_usuario']=$id_usuario;
				$datoRol=$tecnocom->consultar('select rol from rol join usuario_rol using (id_rol) where id_usuario=:id_usuario',$paraRol);
				unset($_SESSION['usrValido']);
				unset($_SESSION['usrDatos']);
				unset($_SESSION['usrRol']);
				$_SESSION['usrValido']=true;
				$_SESSION['usrDatos']=$datoUsuario[0];
				$contRol=0;
				foreach ($datoRol as $keyRol => $valRol) {
					$_SESSION['usrRol'][$contRol]=$datoRol[$contRol]['rol'];
					$contRol++;
				}
				header('Location: ../productos/');
				die();
			}else{
				$mensAlert[0]='Correo o Contraseña incorrecta';
				$colorAlert='danger';
				$iconAlert='glyphicon glyphicon-info';
			}
		}else{
			$mensAlert[0]='El correo es incorrecto';
			$colorAlert='danger';
			$iconAlert='glyphicon glyphicon-info';
		}
	}
	if (isset($_GET['error'])) {
		$colorAlert='danger';
		$iconAlert='glyphicon glyphicon-info';
		switch ($_GET['error']) {
			case 1:
				$mensAlert[0]='Necesita iniciar sesion';
				break;

			case 2:
				$mensAlert[0]='La sesion no es valida';
				break;

			case 3:
				$mensAlert[0]='Usted no tiene privilegios para acceder a esta página';
				break;
			
			default:
				$mensAlert[0]='Necesita iniciar sesion';
				break;
		}
	}
	include('../header.php');
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
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
	  		<button type="submit" name="login" value="Login" class="btn btn-primary">Iniciar Sesión</button>
				<a class="btn btn-danger pull-right" href="index.php">Cancelar</a>  		
	  	</div>
		</form>
	</div>
</div> 
<?php
	include('../footer.php');
?>