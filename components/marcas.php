<?php
	foreach($conexion->query("select * from fabricantes") as $cat_fila) {
		echo '<li class="dropdown">';
		echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$cat_fila['categoria'].'<span class="caret"></span></a>';
		echo '<ul class="dropdown-menu">';
		foreach($conexion->query("select * from subcategoria where id_categoria='".$cat_fila['id_categoria']."'") as $sub_fila) {
			echo '<li><a href="categoria.php?cat='.$sub_fila['id_subcategoria'].'">'.$sub_fila['subcategoria'].'</a></li>';
		}
		echo '</ul></li>';
	}
?>