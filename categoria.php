<?php
	include('header.php');
?>

	<div class="row">
		<div class="col-md-2">
			<aside>
				<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Fabricantes</h3>
				  </div>
				  <ul class="list-group">
				  	<?php
				    	if(isset($_GET['cat'])){
				    		foreach($conexion->query('select * from fabricante_view where id_subcategoria='.$_GET['cat'].'') as $fila) {
				    			echo '<li class="list-group-item"><a href="categoria.php?cat='.$_GET['cat'].'&fab='.$fila['id_fabricante'].'">'.$fila['fabricante'].'</a></li>';	
				    		}
				    	}
				    ?>
				  </ul>
				</div>
			</aside>
		</div>
		<div class="col-md-10">
			<section>
				<div class="panel panel-primary">
				  <div class="panel-heading">
				  	<?php
				    	if(isset($_GET['cat'])){
				    		foreach($conexion->query('select subcategoria from subcategoria where id_subcategoria='.$_GET['cat'].'') as $fila) {
				    			echo '<h3 class="panel-title">'.$fila['subcategoria'].'</h3>';
				    		}
				    	}
				    ?>
				  </div>
				  <table class="table table-condensed table-hover">
						<?php
							$where="";
							if(isset($_GET['cat'])){
									if(isset($_GET['fab'])){
											$where= 'where id_subcategoria='.$_GET['cat'].' and id_fabricante='.$_GET['fab'].'';
									}else{
										$where= 'where id_subcategoria='.$_GET['cat'].'';
									}	
							}
							
				    	if(isset($_GET['cat'])){
				    		$i=0;
				    		foreach($conexion->query('select * from productos_view '.$where) as $fila) {
					        echo '<tr>';
				    			echo '<td><img src="images/productos/'.$fila['imagen'].'" alt="'.$fila['producto'].'" class="img-thumbnail"></td>';
				    			echo '<td>
				    				<img src="images/fabricantes/'.$fila['logo'].'" alt="'.$fila['fabricante'].'" class="img-rounded">
				    				<p>'.$fila['sku'].'</p>
				    			</td>';
				    			echo '<td><h4>'.$fila['producto'].'</h4><p>'.$fila['descripcion'].'</p></td>';
				    			echo '<td><p>'.$fila['precio'].'</p></td>';
					        echo '</tr>';
				    		}
				    	}
				    ?>
					</table>
				</div>
			</section>
		</div>
	</div>	

<?php
	include('footer.php');
?>