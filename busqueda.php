<?php
	include_once('admin/tecnocom.class.php');
	if(isset($_GET['search'])){
    $search=$_GET['search'];
    $search=strtolower($search);
    $search='%'.str_replace(' ','%',$search).'%';
    if (isset($_GET['fab'])) {
      $paramProductos['id_fabricante']=$_GET['fab'];
      $datoProductos=$tecnocom->consultar("select * from vw_productos where id_producto in ( select id_producto from producto join producto_detalle using (id_producto) where producto like '".$search."' or descripcion like '".$search."' group by producto) and id_fabricante=:id_fabricante",$paramProductos);
    }else{
      $datoProductos=$tecnocom->consultar("select * from vw_productos where id_producto in ( select id_producto from producto join producto_detalle using (id_producto) where producto like '".$search."' or descripcion like '".$search."' group by producto)");
    }
    $datoFabricante=$tecnocom->consultar("select id_fabricante,fabricante from fabricante where id_fabricante in (select id_fabricante from vw_productos where id_producto in (select id_producto from producto join producto_detalle using (id_producto) where producto like '".$search."' or descripcion like '".$search."' group by producto)) group by fabricante");
  }else{
    $datoFabricante=$tecnocom->consultar('select id_fabricante,fabricante from fabricante where id_fabricante in (select id_fabricante from vw_productos group by (id_fabricante)) group by fabricante');
    $datoProductos=$tecnocom->consultar('select * from vw_productos');
  }
	include('header.php');
?>
<div class="row">
  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"> 
    <aside>
      <div class="panel panel-tecnocom">
        <div class="panel-heading">
          <h3 class="panel-title">Fabricantes</h3>
        </div>
        <ul class="list-group">
          <?php
            echo '<li class="list-group-item"><a href="busqueda.php?search='.$_GET['search'].'">Todos</a></li>'; 
            foreach($datoFabricante as $keyFabricante) {
              if (isset($_GET['search'])) {
                echo '<li class="list-group-item"><a href="busqueda.php?search='.$_GET['search'].'&fab='.$keyFabricante['id_fabricante'].'">'.$keyFabricante['fabricante'].'</a></li>';  
              }else{
                echo '<li class="list-group-item"><a href="busqueda.php?fab='.$keyFabricante['id_fabricante'].'">'.$keyFabricante['fabricante'].'</a></li>';  
              }
            }
          ?>
        </ul>
      </div>
    </aside>
  </div>
  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10"> 
    <section>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Busqueda</h3>
        </div>
        <?php
          if (count($datoProductos)==0) {
            echo '<div class="panel-body">No Hay Productos</div>';
          }else
            foreach ($datoProductos as $keyProducto):
        ?>
        <div class="panel-body">
          <div class="row vertical-align">
            <div class="hidden-xs hidden-sm col-md-2 col-lg-2"> 
              <img class="img-responsive center-block" src="images/productos/<?php echo $keyProducto['imagen']; ?>" alt="<?php echo $keyProducto['sku']; ?>" />
            </div>
            <div class="hidden-xs hidden-sm col-md-2 col-lg-2"> 
              <img class="img-responsive center-block" src="images/fabricantes/<?php echo $keyProducto['logo']; ?>" alt="<?php echo $keyProducto['fabricante']; ?>'" />
            </div>
            <div class="col-xs-8 col-sm-9 col-md-5 col-lg-5"> 
              <?php
                echo '<h4><strong>'.$keyProducto['producto'].'</strong></h4>';
                echo '<p>'.$keyProducto['sku'].'</p>';
                echo '<ul>';
                $paramDescripcion['id_producto'] = $keyProducto['id_producto'];
                $datoDetalle=$tecnocom->consultar('select descripcion from producto_detalle where id_producto=:id_producto',$paramDescripcion);
                foreach($datoDetalle as $keyDetalle){
                  echo '<li>'.$keyDetalle['descripcion'].'</li>';
                }
                echo '</ul>';
              ?>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 precios"> 
              <?php
                  echo '<h4 class="text-center"><strong>Precio sin IVA</strong></h4>';
                  if($keyProducto['precio_oferta']<$keyProducto['precio']){
                    echo '<h1 class="text-center"><strong>$'.$keyProducto['precio_oferta'].'</strong></h1>';
                    echo '<p class="text-center"><strong>$'.$keyProducto['precio'].'</strong></p>';
                  }else{
                    echo '<h1 class="text-center"><strong>$'.$keyProducto['precio'].'</strong></h1>';
                  }
                ?>
            </div>
          </div>
        </div>
        <?php
          endforeach;
        ?>
      </div>
    </section>
  </div>
</div>
<?php
	include('footer.php');
?>  