<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
  if (isset($_GET['id_producto'])&&isset($_GET['id_carrito'])) {
    $paramCarrito['id_producto']=$_GET['id_producto'];
    $paramCarrito['id_carrito']=$_GET['id_carrito'];
    $tecnocom->borrar('carrito_detalle',$paramCarrito);
  }
  if (isset($_POST['vaciar'])) {
    $paramCarrito['id_carrito']=$_POST['id_carrito'];
    $tecnocom->borrar('carrito_detalle',$paramCarrito);  
  }
  if (isset($_POST['comprar'])) {
    $paramCliente['id_usuario']=$_SESSION['usrDatos']['id_usuario'];
    $datoCliente=$tecnocom->consultar('select * from cliente where id_usuario=:id_usuario',$paramCliente);
    $paramCompra['id_cliente']=$datoCliente[0]['id_cliente'];
    $paramCompra['fecha']=date('Y-m-d');
    $tecnocom->insertar('compra',$paramCompra);
    $datoCompra=$tecnocom->consultar('select * from compra inner join cliente using (id_cliente) where id_usuario=:id_usuario order by (id_compra) desc',$paramCliente);
    $paramCarrito['id_usuario']=$_SESSION['usrDatos']['id_usuario'];
    $datoCarrito=$tecnocom->consultar('select * from vw_carrito where id_usuario=:id_usuario',$paramCarrito);
    $id_compra=$datoCompra[0]['id_compra'];
    $paramDetalle['id_compra']=$datoCompra[0]['id_compra']; 
    $subtotal=0;
    foreach ($datoCarrito as $keyCarrito => $valCarrito) {
      $paramDetalle['id_producto']=$valCarrito['id_producto'];
      $paramDetalle['cantidad']=$_POST['cantidad'][$valCarrito['id_producto']];
      $paramDetalle['precio']=$valCarrito['precio'];
      $subtotal+=$paramDetalle['precio']*$_POST['cantidad'][$valCarrito['id_producto']];
      $tecnocom->insertar('compra_detalle',$paramDetalle);
    }
    $paramCarrito=array();
    $paramCarrito['id_carrito']=$datoCarrito[0]['id_carrito'];
    $tecnocom->borrar('carrito_detalle',$paramCarrito);
    $paramCompra=array();
    $llaveCompra['id_compra']=$id_compra;
    $paramCompra['subtotal']=$subtotal;
    $paramCompra['iva']=$subtotal*0.16;
    $paramCompra['total']=$subtotal*1.16;
    $tecnocom->actualizar('compra',$paramCompra,$llaveCompra);
    $mensAlert='Se ha realizado la compra con exito';
    $colorAlert='success';
    $iconAlert='glyphicon glyphicon-ok';
  }
  $paramCarrito=array();
  $paramCarrito['id_usuario']=$_SESSION['usrDatos']['id_usuario'];
  $datoCarrito=$tecnocom->consultar('select * from vw_carrito where id_usuario=:id_usuario',$paramCarrito);
  include('../header.php');
?>
<div class="page-header">
  <h1>Carrito</h1>
</div>
<?php
  if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
    echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$mensAlert.'</div>';
  }
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
  <form action="index.php" method="POST">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Productos</h3>
      </div>
      <?php if(count($datoCarrito)!=0):
        foreach ($datoCarrito as $keyCarrito => $valCarrito): ?>
        <div class="panel-body">
          <input type="hidden" name="id_carrito" value="<?php echo $valCarrito['id_carrito']; ?>">
          <div class="col-xs-4 col-sm-6 col-md-2 col-lg-2">
            <label for="in_Cantidad">Cantidad:</label>
            <input type="number" name="cantidad[<?php echo $valCarrito['id_producto']; ?>]" class="form-control" id="in_Cantidad" placeholder="0" value="<?php echo $valCarrito['cantidad']; ?>">
          </div>
          <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
            <td><img class="img-responsive" src="../../images/productos/<?php echo $valCarrito['imagen']; ?>" alt="<?php echo $valCarrito['sku']; ?>" /></td>
          </div>
          <div class="col-xs-8 col-sm-6 col-md-3 col-lg-3">
            <h4><strong><?php echo $valCarrito['producto']; ?></strong></h4>
            <p><?php echo $valCarrito['sku']; ?></p>
            <p>Modelo: <?php echo $valCarrito['modelo']; ?></p>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
            <h5><strong>Precio:</strong></h5>
            <h4><strong>$<?php echo $valCarrito['precio']; ?></strong></h4>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
            <h5><strong>Total:</strong></h5>
            <h4><strong>$<?php echo $valCarrito['precio']*$valCarrito['cantidad']; ?></strong></h4>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
            <div class="form-group">
              <a class="btn btn-danger" href="index.php?id_producto=<?php echo $valCarrito['id_producto']; ?>&id_carrito=<?php echo $valCarrito['id_carrito']; ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Quitar</a>
            </div>
          </div>
        </div>
        <?php 
            endforeach;
          else:
            echo '<div class="panel-body">No Hay Productos</div>';
          endif;
        ?>
    </div>
    <?php if(count($datoCarrito)!=0): ?>
      <div class="form-group">
        <button type="submit" name="vaciar" value="Vaciar" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Vaciar</button> 
        <button type="submit" name="comprar" value="Comprar" class="btn btn-success pull-right"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Comprar</button>
      </div>
    <?php endif ?>
  </form>
</div>
<?php
	include('../footer.php');
?>