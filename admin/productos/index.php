<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Productos</h1>
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
		<a class="btn btn-success" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Producto</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
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
				$datos=$tecnocom->consultar("select pro.id_producto,pro.sku,pro.producto,pro.modelo,pro.precio,fab.fabricante,sub.subcategoria,pro.imagen from producto pro inner join fabricante fab on pro.id_fabricante = fab.id_fabricante inner join subcategoria sub on pro.id_subcategoria = sub.id_subcategoria;");
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td><a href="../../images/productos/'.$value['imagen'].'" target="_blank"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a></td>';
						echo '<td>'.$value['sku'].'</td>';
						echo '<td>'.$value['producto'].'</td>';
						echo '<td>'.$value['modelo'].'</td>';
						echo '<td>'.$value['precio'].'</td>';
						echo '<td>'.$value['fabricante'].'</td>';
						echo '<td>'.$value['subcategoria'].'</td>';
						echo '<td><a class="btn btn-success" href="../producto_detalle/index.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Detalles</a></td>';
						echo '<td><a class="btn btn-info" href="../ofertas/index.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Ofertas</a></td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$value['id_producto'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>