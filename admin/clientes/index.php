<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	include('../header.php');
?>
<div class="page-header">
  <h1>Clientes</h1>
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
		<a class="btn btn-success" href="nuevo.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Cliente</a>
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
				$datoCliente=$tecnocom->consultar("select cli.id_cliente,cli.id_usuario,concat(cli.nombre,' ',ifnull(cli.apaterno,''),' ',ifnull(cli.amaterno,'')) as nom_cliente,usr.correo,cli.telefono from cliente cli join usuario usr on cli.id_usuario = usr.id_usuario order by (cli.apaterno) asc");
				foreach ($datoCliente as $keyCliente => $valCliente) {
					echo '<tr>';
						echo '<td>'.$valCliente['nom_cliente'].'</td>';
						echo '<td>'.$valCliente['correo'].'</td>';
						echo '<td>'.$valCliente['telefono'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_cliente='.$valCliente['id_cliente'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_cliente='.$valCliente['id_cliente'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');  
?>