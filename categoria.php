<?php
	include('header.php');
?>
	<div class="col-md-2">		
		<aside>
			<div class="panel panel-tecnocom">
			  <div class="panel-heading">
			    <h3 class="panel-title">Fabricantes</h3>
			  </div>
			  <ul class="list-group">
			  	<?php
			    	if(isset($_GET['cat'])){
			    		echo '<li class="list-group-item"><a href="categoria.php?cat='.$_GET['cat'].'">Todos</a></li>';	
			    		foreach($conexion->query('select * from vw_fabricantes where id_subcategoria='.$_GET['cat'].' group by fabricante') as $fila) {
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
			  <table class="table">
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
			    		foreach($conexion->query('select * from vw_productos '.$where) as $fila) { ?>
				        
				        <tr class="producto" >
				    			
				    			<td class="hidden-xs">
					    			<div class="img_producto"><?php
											echo '<img class="img-responsive" src="images/productos/'.$fila['imagen'].'" alt="'.$fila['producto'].'" />'; ?>
					    			</div>
				    			</td>

				    			<td class="hidden-xs">
				    				<div class="img_logo"><?php 
					    				echo '<img class="img-responsive" src="images/fabricantes/'.$fila['logo'].'" alt="'.$fila['fabricante'].'" />'; ?>
				    				</div>
				    			</td>

			    				<td><?php
			    					echo '<h4><strong>'.$fila['producto'].'</strong></h4>';
			    					echo '<p>'.$fila['sku'].'</p>';
				    				echo '<ul>';
				    				foreach($conexion->query('select descripcion from producto_detalle where id_producto='.$fila['id_producto']) as $fila_desc){
					    				echo '<li>'.$fila_desc['descripcion'].'</li>';
				    				}
				    				echo '</ul>';?>
				    			</td>
			    				
			    				<td>
			    					<div class="pre_producto">
			    						<div class="pre_producto_info"><?php
			    							if($fila['precio_oferta']<$fila['precio']){
			    								echo '<h2><strong>$'.$fila['precio_oferta'].'</strong></h2>';
			    								echo '<h5><strong>$'.$fila['precio'].'</strong></h5>';
			    							}else{
			    								echo '<h2><strong>$'.$fila['precio'].'</strong></h2>';
			    							}?>
			    							<a class="btn btn-warning center-block" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar</a>
			    						</div>
			    					</div>
			    				</td>

				        </tr>
			    		<?php } 
			    	}
			    ?>
				</table>
			</div>
		</section>
	</div>

	

<?php
	include('footer.php');
?>