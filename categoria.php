<?php
	include_once('admin/tecnocom.class.php');
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
			    	if(isset($_GET['sub'])){
			    		echo '<li class="list-group-item"><a href="categoria.php?sub='.$_GET['sub'].'">Todos</a></li>';	
			    		$paramSubcategoria['id_subcategoria'] = $_GET['sub'];
			    		$datoFabricante=$tecnocom->consultar('select * from vw_fabricantes where id_subcategoria=:id_subcategoria group by fabricante',$paramSubcategoria);
			    		foreach($datoFabricante as $keyFabricante) {
			    			echo '<li class="list-group-item"><a href="categoria.php?sub='.$_GET['sub'].'&fab='.$keyFabricante['id_fabricante'].'">'.$keyFabricante['fabricante'].'</a></li>';	
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
			    	if(isset($_GET['sub'])){
			    		$paramSubcategoria['id_subcategoria'] = $_GET['sub'];
			    		$datoSubcategoria=$tecnocom->consultar('select subcategoria from subcategoria where id_subcategoria=:id_subcategoria',$paramSubcategoria);
			    		foreach($datoSubcategoria as $keySubcategoria) {
			    			echo '<h3 class="panel-title">'.$keySubcategoria['subcategoria'].'</h3>';
			    		}
			    	}
			    ?>
			  </div>
			  <table class="table">
					<?php
						$where="";
						if(isset($_GET['sub'])){
								if(isset($_GET['fab'])){
										$paramProducto['id_subcategoria'] = $_GET['sub'];
										$paramProducto['id_fabricante'] = $_GET['fab'];
										$where= 'where id_subcategoria=:id_subcategoria and id_fabricante=:id_fabricante';
								}else{
									$paramProducto['id_subcategoria'] = $_GET['sub'];
									$where= 'where id_subcategoria=:id_subcategoria';
								}	
						}
						
			    	if(isset($_GET['sub'])){
			    		$i=0;
			    		$datoSubcategoria=$tecnocom->consultar('select * from vw_productos '.$where,$paramProducto);
			    		foreach($datoSubcategoria as $keyProducto) { ?>
				        
				        <tr class="producto" >
				    			
				    			<td class="hidden-xs">
					    			<div class="img_producto"><?php
											echo '<img class="img-responsive" src="images/productos/'.$keyProducto['imagen'].'" alt="'.$keyProducto['producto'].'" />'; ?>
					    			</div>
				    			</td>

				    			<td class="hidden-xs">
				    				<div class="img_logo"><?php 
					    				echo '<img class="img-responsive" src="images/fabricantes/'.$keyProducto['logo'].'" alt="'.$keyProducto['fabricante'].'" />'; ?>
				    				</div>
				    			</td>

			    				<td><?php
			    					echo '<h4><strong>'.$keyProducto['producto'].'</strong></h4>';
			    					echo '<p>'.$keyProducto['sku'].'</p>';
				    				echo '<ul>';
				    				$paramDescripcion['id_producto'] = $keyProducto['id_producto'];
				    				$datoDetalle=$tecnocom->consultar('select descripcion from producto_detalle where id_producto=:id_producto',$paramDescripcion);
				    				foreach($datoDetalle as $keyDetalle){
					    				echo '<li>'.$keyDetalle['descripcion'].'</li>';
				    				}
				    				echo '</ul>';?>
				    			</td>
			    				
			    				<td>
			    					<div class="pre_producto">
			    						<div class="pre_producto_info"><?php
			    							if($keyProducto['precio_oferta']<$keyProducto['precio']){
			    								echo '<h2><strong>$'.$keyProducto['precio_oferta'].'</strong></h2>';
			    								echo '<h5><strong>$'.$keyProducto['precio'].'</strong></h5>';
			    							}else{
			    								echo '<h2><strong>$'.$keyProducto['precio'].'</strong></h2>';
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