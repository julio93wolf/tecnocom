<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Productos</h1>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-success pull-right" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Producto</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
				<th>SKU</th>
				<th>Producto</th>
				<th>Modelo</th>
				<th>Precio</th>
				<th>Fabricante</th>
				<th>Categoria</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select pro.id_producto,pro.sku,pro.producto,pro.modelo,pro.precio,fab.fabricante,sub.subcategoria,pro.imagen from producto pro inner join fabricante fab on pro.id_fabricante = fab.id_fabricante inner join subcategoria sub on pro.id_subcategoria = sub.id_subcategoria;");
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['sku'].'</td>';
						echo '<td>'.$value['producto'].'</td>';
						echo '<td>'.$value['modelo'].'</td>';
						echo '<td>'.$value['precio'].'</td>';
						echo '<td>'.$value['fabricante'].'</td>';
						echo '<td>'.$value['subcategoria'].'</td>';
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