<?php
	//include_once('admin/tecnocom.class.php');
	$datoCategoria=$tecnocom->consultar('select * from categoria');
  if (count($datoCategoria)>0){
  	foreach ($datoCategoria as $keyCategoria) {
  		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$keyCategoria['categoria'].'<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu">';
			$paraSubcategoria['id_categoria']=$keyCategoria['id_categoria'];
			$datoSubcategoria=$tecnocom->consultar('select * from subcategoria where id_categoria=:id_categoria',$paraSubcategoria);
			foreach ($datoSubcategoria as $keySubcategoria) {
				echo '<li><a href="index.php?sub='.$keySubcategoria['id_subcategoria'].'">'.$keySubcategoria['subcategoria'].'</a></li>';
			}
			echo '</ul></li>';
  	}
  }
?>