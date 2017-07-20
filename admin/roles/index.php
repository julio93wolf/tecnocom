<?php
	include_once('../tecnocom.class.php');
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
		<a class="btn btn-success" href="nuevo.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Rol</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr class="active">
				<th>Rol</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$datoRol=$tecnocom->consultar("select * from rol order by rol asc");
				foreach ($datoRol as $keyRol => $valRol) {
					echo '<tr>';
						echo '<td>'.$valRol['rol'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_rol='.$valRol['id_rol'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_rol='.$valRol['id_rol'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>