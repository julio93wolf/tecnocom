<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
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
    if(isset($_REQUEST['sub'])){
      $paramSubcategoria['id_subcategoria'] = $_REQUEST['sub'];
      $datoSubcategoria=$tecnocom->consultar('select * from subcategoria where id_subcategoria=:id_subcategoria',$paramSubcategoria);
      $subcategoria=$datoSubcategoria[0]['subcategoria'];
      $datoFabricante=$tecnocom->consultar('select * from vw_fabricantes where id_subcategoria=:id_subcategoria',$paramSubcategoria);
      if(isset($_REQUEST['fab'])){
        $paramProducto['id_fabricante'] = $_REQUEST['fab'];
        $paramProducto['id_subcategoria'] = $_REQUEST['sub'];
        $datoProductos=$tecnocom->consultar('select * from vw_productos where id_subcategoria=:id_subcategoria and id_fabricante=:id_fabricante',$paramProducto);
      }else{
        $paramProducto['id_subcategoria'] = $_REQUEST['sub'];
        $datoProductos=$tecnocom->consultar('select * from vw_productos where id_subcategoria=:id_subcategoria',$paramProducto);
      }
    }else{
      if(isset($_REQUEST['fab'])){
        $paramProducto['id_fabricante'] = $_REQUEST['fab'];
        $datoFabricante=$tecnocom->consultar('select * from fabricante where id_fabricante=:id_fabricante',$paramProducto);
        $datoProductos=$tecnocom->consultar('select * from vw_productos where id_fabricante=:id_fabricante',$paramProducto);
      }else{
        $datoFabricante=$tecnocom->consultar('select id_fabricante,fabricante from fabricante where id_fabricante in (select id_fabricante from vw_productos group by (id_fabricante)) group by fabricante');
        $datoProductos=$tecnocom->consultar('select * from vw_productos');
      }
    }
  }
  if (isset($_POST['solicitar'])) {
    $carrito=array();
    $paramCarrito['id_usuario']=$_SESSION['usrDatos']['id_usuario'];
    $datoCarrito=$tecnocom->consultar('select id_carrito,id_cliente from carrito inner join cliente using (id_cliente) where id_usuario=:id_usuario',$paramCarrito);
    $id_carrito=$datoCarrito[0]['id_carrito'];
    $id_cliente=$datoCarrito[0]['id_cliente'];
    $datoCarrito=$tecnocom->consultar('select id_producto,cantidad,precio from  carrito_detalle inner join carrito using (id_carrito) inner join cliente using (id_cliente) inner join usuario using (id_usuario) where id_usuario=:id_usuario',$paramCarrito);
    foreach ($datoCarrito as $keyCarrito => $valCarrito) {
      $carrito[$valCarrito['id_producto']]=$datoCarrito[$keyCarrito];
    }
    if (isset($_POST['carrito'])) {
      foreach ($_POST['carrito'] as $key => $value) {
        if(!empty($value)){
          $carrito[$key]['id_carrito']=$id_carrito;
          $carrito[$key]['id_producto']=$key;
          $carrito[$key]['cantidad'] = (isset($carrito[$key]['cantidad'])) ? $carrito[$key]['cantidad']+$value : $value;
        }
      }
      $subtotal=0;
      $paramCarrito=array();
      $paraProducto=array();
      $paramCarrito['id_carrito']=$id_carrito;
      $tecnocom->borrar('carrito_detalle',$paramCarrito);
      foreach ($carrito as $keyCarrito => $valCarrito) {
        $paramCarrito['id_producto']=$keyCarrito;
        $paramCarrito['cantidad']=$valCarrito['cantidad'];
        $paraProducto['id_producto']=$keyCarrito;
        $datoProducto=$tecnocom->consultar('select * from vw_productos where id_producto=:id_producto',$paraProducto);
        if($datoProducto[0]['precio_oferta']<$datoProducto[0]['precio']){
          $paramCarrito['precio'] = $datoProducto[0]['precio_oferta'];
        }
        else{
          $paramCarrito['precio'] = $datoProducto[0]['precio'];
        }
        $subtotal+=$paramCarrito['cantidad']*$paramCarrito['precio'];
        $tecnocom->insertar('carrito_detalle',$paramCarrito);
      }
      $paramCarrito=array();
      $llaveCarrito['id_carrito']=$id_carrito;
      $paramCarrito['subtotal']=$subtotal;
      $paramCarrito['iva']=$subtotal*0.16;
      $paramCarrito['total']=$subtotal*1.16;
      $tecnocom->actualizar('carrito',$paramCarrito,$llaveCarrito);
      $mensAlert='Se han agregado los productos al carrito';
      $colorAlert='success';
      $iconAlert='glyphicon glyphicon-ok';
    }
  }
	include('../header.php');
?>
<div class="page-header">
  <h1>Productos
    <form class="form-inline pull-right" method="GET" action="index.php">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </div>
          <input type="text" class="form-control" name="search" id="search" placeholder="Buscar...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Buscar</button>
           </span>
        </div>
      </div>
    </form>
  </h1>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_caterorias" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Productos</a>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse" id="nav_caterorias">
      <ul class="nav navbar-nav">
        <?php
          include('../../components/nav_cliente.php');
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
  if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
    echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$mensAlert.'</div>';
  }
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
            if (isset($_REQUEST['sub'])) {
              echo '<li class="list-group-item"><a href="index.php?sub='.$_REQUEST['sub'].'">Todos</a></li>'; 
            }else{
              if (isset($_REQUEST['search'])) {
                echo '<li class="list-group-item"><a href="index.php?search='.$_REQUEST['search'].'">Todos</a></li>'; 
              }else{
                echo '<li class="list-group-item"><a href="index.php">Todos</a></li>';   
              }
            }
            
            foreach($datoFabricante as $keyFabricante) {
              if (isset($_REQUEST['sub'])) {
                echo '<li class="list-group-item"><a href="index.php?sub='.$_REQUEST['sub'].'&fab='.$keyFabricante['id_fabricante'].'">'.$keyFabricante['fabricante'].'</a></li>';  
              }else{
                if (isset($_REQUEST['search'])) {
                  echo '<li class="list-group-item"><a href="index.php?search='.$_REQUEST['search'].'&fab='.$keyFabricante['id_fabricante'].'">'.$keyFabricante['fabricante'].'</a></li>';  
                }else{
                  echo '<li class="list-group-item"><a href="index.php?fab='.$keyFabricante['id_fabricante'].'">'.$keyFabricante['fabricante'].'</a></li>';  
                }
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
          <?php
            if(isset($_REQUEST['sub'])){
              echo '<h3 class="panel-title">'.$subcategoria.'</h3>';
            }else{
              echo '<h3 class="panel-title">Productos</h3>';
            }
          ?>
        </div>
        <form action="index.php" method="POST">
          <?php
            if (isset($_REQUEST['sub'])) {
              echo '<input type="hidden" name="sub" value="'.$_REQUEST['sub'].'">';
            }
            if (isset($_REQUEST['fab'])) {
              echo '<input type="hidden" name="fab" value="'.$_REQUEST['fab'].'">';
            }
            if (isset($_REQUEST['search'])) {
              echo '<input type="hidden" name="search" value="'.$_REQUEST['search'].'">';
            }
            if (count($datoProductos)==0) {
              echo '<div class="panel-body">No Hay Productos</div>';
            }else
              foreach ($datoProductos as $keyProducto):
          ?>
          <div class="panel-body">
            <div class="row vertical-align">
              <div class="hidden-xs hidden-sm col-md-2 col-lg-2"> 
                <img class="img-responsive center-block" src="../../images/productos/<?php echo $keyProducto['imagen']; ?>" alt="<?php echo $keyProducto['sku']; ?>" />
              </div>
              <div class="hidden-xs hidden-sm col-md-2 col-lg-2"> 
                <img class="img-responsive center-block" src="../../images/fabricantes/<?php echo $keyProducto['logo']; ?>" alt="<?php echo $keyProducto['fabricante']; ?>'" />
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
                <div class="form-group">
                  <label for="in_Cantidad">Cantidad:</label>
                  <input type="number" name="carrito[<?php echo $keyProducto['id_producto']; ?>]" class="form-control" id="in_Cantidad" placeholder="0">
                </div>
                <div class="form-group">
                  <button type="submit" name="solicitar" value="Agregar" class="btn btn-warning center-block"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar</button>
                </div>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          ?>
        </form>
      </div>
    </section>
  </div>
</div>

<?php
	include('../footer.php');
?>