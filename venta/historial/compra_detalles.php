<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
  $paramCompra=array();
  if (isset($_GET['id_compra'])) {
  	$paramCompra['id_compra']=$_GET['id_compra'];
  	$datoCompra=$tecnocom->consultar('select cpd.id_compra,cpd.cantidad,pro.sku,pro.producto,pro.modelo,cpd.precio from compra_detalle cpd inner join producto pro using (id_producto) where id_compra=:id_compra',$paramCompra);
  }
  include('../header.php');
?>
<div class="page-header">
  <h1>Historial de Compras</h1>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
  
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Compras</h3>
      </div>
      <?php if(count($datoCompra)!=0): ?>
        <table class="table">
          <tr class="active">
            <th>Cantidad</th>
            <th>SKU</th>
            <th>Producto</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Total</th>
          </tr>
          <?php 
          	$subtotal = 0;
          	foreach ($datoCompra as $keyCompra => $valCompra): 
          ?>
            <tr>
              <td><?php echo $valCompra['cantidad']; ?></td>
              <td><?php echo $valCompra['sku']; ?></td>
              <td><?php echo $valCompra['producto']; ?></td>
              <td><?php echo $valCompra['modelo']; ?></td>
              <td>$<?php echo $valCompra['precio']; ?></td>
              <td>$<?php echo $valCompra['cantidad']*$valCompra['precio']; ?></td>
              <?php $subtotal+= $valCompra['cantidad']*$valCompra['precio']; ?>
            </tr>
          <?php endforeach; ?>
          <tr class="active">
            <th></th>
            <th></th>
            <th></th>
            <th>Subtotal</th>
            <th>IVA</th>
            <th>Total</th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>$<?php echo $subtotal; ?></td>
            <td>$<?php echo $subtotal*0.16; ?></td>
            <td>$<?php echo $subtotal*1.16; ?></td>
          </tr>
        </table>
      <?php else: ?>
          <div class="panel-body">No Hay Registros</div>
      <?php endif; ?>
    </div>
  	<a class="btn btn-primary pull-right" href="recibo.php?id_compra=<?php echo $valCompra['id_compra']; ?>" role="button"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</a>
</div>
<?php
	include('../footer.php');
?>