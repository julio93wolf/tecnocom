<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Empleados</h1>
</div>
<?php
	if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
		foreach ($mensAlert as $keyMensaje => $valMensaje) {
			echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$valMensaje.'</div>';
		}
	}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-success" href="nuevo.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Empleado</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr class="active">
				<th>Nombre</th>
				<th>Correo</th>
				<th>Roles</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$datoEmpleado=$tecnocom->consultar("select emp.id_empleado,emp.id_usuario,concat(emp.nombre,' ',ifnull(emp.apaterno,''),' ',ifnull(emp.amaterno,'')) as nom_empleado,usr.correo from empleado emp join usuario usr on emp.id_usuario = usr.id_usuario order by (emp.apaterno) asc");
				foreach ($datoEmpleado as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['nom_empleado'].'</td>';
						echo '<td>'.$value['correo'].'</td>';
						echo '<td><a class="btn btn-success" href="../usuario_rol/index.php?id_usuario='.$value['id_usuario'].'" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Roles</a></td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_empleado='.$value['id_empleado'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_empleado='.$value['id_empleado'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>