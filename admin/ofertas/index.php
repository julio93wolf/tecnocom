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
  <h1>Producto - Ofertas</h1>
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
		<a class="btn btn-success" href="nuevo.php?" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Oferta</a>
		<a class="btn btn-info" href="../productos" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr>
				<th>Fecha de Inicio</th>
				<th>Fecha de Termino</th>
				<th>Precio</th>
				<th>Banner</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$datos=$tecnocom->consultar("select * from oferta ofe left join oferta_banner ofb on ofe.id_oferta= ofb.id_oferta  where ofe.id_producto=:id_producto",$parametros);
				foreach ($datos as $key => $value) {
					echo '<tr>';
						echo '<td>'.$value['fechai'].'</td>';
						echo '<td>'.$value['fechat'].'</td>';
						echo '<td>'.$value['precio_oferta'].'</td>';
						echo '<td><a href="../../images/ofertas/'.$value['banner'].'" target="_blank"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a></td>';
						echo '<td><a class="btn btn-primary" href="editar.php?id_oferta='.$value['id_oferta'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$id_producto.'&id_oferta='.$value['id_oferta'].'" role="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>