<?php
	if(isset($_REQUEST['id_categoria'])){
		$id_categoria=$_REQUEST['id_categoria'];
	}else{
		header('Location: /tecnocom/admin/categorias/');
	}
	include_once('../tecnocom.class.php');
	include('../header.php');
?>
<div class="page-header">
  <h1>Subcategorias</h1>
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
		<a class="btn btn-success" href="nuevo.php?id_categoria=<?php echo $id_categoria; ?>" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Subcategoría</a>
		<a class="btn btn-info" href="../categorias" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr class="active">
				<th>Subcategoria</th>
				<th>Categoria</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
			<?php
				$paramSubcategoria=array();
				$paramSubcategoria['id_categoria']=$id_categoria;
				$dataSubcategoria=$tecnocom->consultar("select * from subcategoria sub join categoria cat on sub.id_categoria = cat.id_categoria where sub.id_categoria=:id_categoria order by subcategoria asc",$paramSubcategoria);
				foreach ($dataSubcategoria as $keySubcategoria => $valSubcategoria) {
					echo '<tr>';
						echo '<td>'.$valSubcategoria['subcategoria'].'</td>';
						echo '<td>'.$valSubcategoria['categoria'].'</td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_categoria='.$id_categoria.'&id_subcategoria='.$valSubcategoria['id_subcategoria'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_categoria='.$id_categoria.'&id_subcategoria='.$valSubcategoria['id_subcategoria'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>