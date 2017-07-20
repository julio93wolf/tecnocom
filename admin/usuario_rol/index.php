<?php
	include_once('../tecnocom.class.php');
	if (isset($_POST['enviar'])) {
		$id_usuario = $_POST['id_usuario'];
		$id_rol = $_POST['id_rol'];
		$paraUserRol['id_usuario']=$id_usuario;
		$paraUserRol['id_rol']=$id_rol;
		$rowChange=$tecnocom->insertar('usuario_rol',$paraUserRol);
		if ($rowChange>0) {
			$mensAlert[0]='Se inserto el nuevo rol';
			$colorAlert='success';
			$iconAlert='glyphicon glyphicon-ok';
		}else{
			$mensAlert[0]="Error: No se ha podido agregar el nuevo rol";
			$colorAlert="danger";
			$iconAlert='glyphicon-exclamation-sign';
		}
	}
	if(isset($_REQUEST['id_usuario'])){
		$id_usuario = $_REQUEST['id_usuario'];
		$paraUsuario['id_usuario'] = $id_usuario;
		$dropRol = $tecnocom->dropDownList('select id_rol as id,rol as opcion from rol order by rol asc','id_rol');
	}else{
		header('Location: /tecnocom/admin/empleados/');
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Roles</h1>
</div>
<?php
	if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
		foreach ($mensAlert as $keyMensaje => $valuMensaje) {
			echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$valuMensaje.'</div>';
		}
	}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
		<form class="form-inline" action="index.php" method="POST">
			<div class="form-group">
	    	<label for="in_UnidadMedida">Unidad de Medida</label>
	    	<?php echo $dropRol; ?>
	    	<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>" >
	    	<button type="submit" name="enviar" value="Agregar Rol" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Rol</button>
	    	<a class="btn btn-info" href="../empleados" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
  		</div>
	  </form>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr class="active">
				<th>Rol</th>
				<th></th>
			</tr>
			<?php
				$dataRoles=$tecnocom->consultar("select * from rol join usuario_rol using (id_rol) where id_usuario=:id_usuario order by rol asc",$paraUsuario);
				foreach ($dataRoles as $keyRoles => $valRoles) {
					echo '<tr>';
						echo '<td>'.$valRoles['rol'].'</td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_usuario='.$id_usuario.'&id_rol='.$valRoles['id_rol'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>