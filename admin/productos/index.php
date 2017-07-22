<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	include('../header.php');
?>
<div class="page-header">
  <h1>Productos</h1>
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
		<a class="btn btn-success" href="nuevo.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Producto</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover ">
		  <tr class="active">
		  	<th>Imagen</th>
				<th>SKU</th>
				<th>Producto</th>
				<th>Modelo</th>
				<th>Precio</th>
				<th>Fabricante</th>
				<th>Categoria</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$datoProducto=$tecnocom->consultar("select pro.id_producto,pro.sku,pro.producto,pro.modelo,pro.precio,fab.fabricante,sub.subcategoria,pro.imagen from producto pro inner join fabricante fab on pro.id_fabricante = fab.id_fabricante inner join subcategoria sub on pro.id_subcategoria = sub.id_subcategoria;");
				foreach ($datoProducto as $keyProducto => $valProducto) {
					echo '<tr>';
						echo '<td><img src="../../images/productos/'.$valProducto['imagen'].'" class="img-responsive center-block" alt="'.$valProducto['sku'].'" /></td>';
						echo '<td>'.$valProducto['sku'].'</td>';
						echo '<td>'.$valProducto['producto'].'</td>';
						echo '<td>'.$valProducto['modelo'].'</td>';
						echo '<td>'.$valProducto['precio'].'</td>';
						echo '<td>'.$valProducto['fabricante'].'</td>';
						echo '<td>'.$valProducto['subcategoria'].'</td>';
						echo '<td><a class="btn btn-success" href="../producto_detalle/index.php?id_producto='.$valProducto['id_producto'].'" role="button"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Detalles</a></td>';
						echo '<td><a class="btn btn-info" href="../ofertas/index.php?id_producto='.$valProducto['id_producto'].'" role="button"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Ofertas</a></td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_producto='.$valProducto['id_producto'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$valProducto['id_producto'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>