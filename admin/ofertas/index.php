<?php
	include_once('../tecnocom.class.php');
	if(isset($_REQUEST['id_producto'])){
		$id_producto=$_REQUEST['id_producto'];
	}else{
		header('Location: /tecnocom/admin/productos/');
	}
	include('../header.php');
?>
<div class="page-header">
  <h1>Producto - Ofertas</h1>
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
		<a class="btn btn-success" href="nuevo.php?id_producto=<?php echo $id_producto; ?>" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Oferta</a>
		<a class="btn btn-info" href="../productos" role="button"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-hover">
		  <tr class="active">
				<th>Fecha de Inicio</th>
				<th>Fecha de Termino</th>
				<th>Precio</th>
				<th>Banner</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$paraOferta=array();
				$paraOferta['id_producto']=$id_producto;
				$datoOferta=$tecnocom->consultar("select * from oferta left join oferta_banner using (id_oferta) where id_producto=:id_producto",$paraOferta);

				foreach ($datoOferta as $keyOferta => $valOferta) {
					echo '<tr>';
						echo '<td>'.$valOferta['fechai'].'</td>';
						echo '<td>'.$valOferta['fechat'].'</td>';
						echo '<td>'.$valOferta['precio_oferta'].'</td>';
						if($valOferta['banner']!=''){
							echo '<td><a href="../../images/ofertas/'.$valOferta['banner'].'" target="_blank"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a></td>';	
						}else{
							echo '<td></td>';	
						}
						echo '<td><a class="btn btn-primary" href="editar.php?id_producto='.$id_producto.'&id_oferta='.$valOferta['id_oferta'].'" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></td>';
						echo '<td><a class="btn btn-danger" href="eliminar.php?id_producto='.$id_producto.'&id_oferta='.$valOferta['id_oferta'].'" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<?php
	include('../footer.php');
?>