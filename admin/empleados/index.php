<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Empleados</h1>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-success pull-right" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Empleado</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
				<th>Nombre</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select emp.id_empleado,emp.id_usuario,concat(emp.nombre,' ',ifnull(emp.apaterno,''),' ',ifnull(emp.amaterno,'')) as nom_empleado,usr.correo from empleado emp join usuario usr on emp.id_usuario = usr.id_usuario order by (emp.apaterno) asc");
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['nom_empleado'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_empleado='.$value['id_empleado'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_empleado='.$value['id_empleado'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>