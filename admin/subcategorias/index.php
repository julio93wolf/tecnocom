<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Subcategorias</h1>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-success pull-right" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Subcategoria</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
				<th>Subcategoria</th>
				<th>Categoria</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select sub.id_subcategoria,sub.subcategoria,cat.categoria from subcategoria sub join categoria cat on sub.id_categoria = cat.id_categoria order by subcategoria asc");
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['subcategoria'].'</td>';
						echo '<td>'.$value['categoria'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_subcategoria='.$value['id_subcategoria'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_subcategoria='.$value['id_subcategoria'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>