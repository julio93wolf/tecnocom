<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Clientes</h1>
</div>
<?php
	if(isset($mensajes) and isset($color) and isset($icon)){
		foreach ($mensajes as $key => $value) {
			echo '<div class="alert alert-'.$color.' alert-dismissible" role="alert"><span class="glyphicon '.$icon.'" aria-hidden="true"></span> '.$value.'</div>';
		}
	}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-success" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Cliente</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr class="active">
				<th>Nombre</th>
				<th>Correo</th>
				<th>Télefono</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select cli.id_cliente,cli.id_usuario,concat(cli.nombre,' ',ifnull(cli.apaterno,''),' ',ifnull(cli.amaterno,'')) as nom_cliente,usr.correo,cli.telefono from cliente cli join usuario usr on cli.id_usuario = usr.id_usuario order by (cli.apaterno) asc");
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['nom_cliente'].'</td>';
						echo '<td>'.$value['correo'].'</td>';
						echo '<td>'.$value['telefono'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_cliente='.$value['id_cliente'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_cliente='.$value['id_cliente'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>