<?php
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Fabricantes</h1>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="btn btn-success pull-right" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Fabricante</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
				<th>Fabricante</th>
				<th>Logo</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select * from fabricante order by fabricante asc");
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['fabricante'].'</td>';
						echo '<td>';
							echo '<img class="img-responsive" src="../../images/fabricantes/'.$value['logo'].'" alt="'.$value['fabricante'].'" />';
						echo '</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_fabricante='.$value['id_fabricante'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_fabricante='.$value['id_fabricante'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>