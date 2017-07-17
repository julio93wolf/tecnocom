<?php
	if(isset($_REQUEST['id_producto'])){
		$id_producto=$_REQUEST['id_producto'];
		$parametros['id_producto']=$id_producto;
	}else{
		header('Location: /tecnocom/admin/productos/');
	}
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Producto - Descripción</h1>
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
		<a class="btn btn-success" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Descripción</a>
		<a class="btn btn-info" href="../productos" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
				<th>Descripción</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select * from producto_detalle where id_producto=:id_producto",$parametros);
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['descripcion'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_producto_detalle='.$value['id_producto_detalle'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$id_producto.'&id_producto_detalle='.$value['id_producto_detalle'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>