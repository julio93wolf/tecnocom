<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
  $paramCarrito=array();
  $paramCarrito['id_usuario']=$_SESSION['usrDatos']['id_usuario'];
  $datoCompra=$tecnocom->consultar('select * from cliente inner join compra using (id_cliente) where id_usuario=:id_usuario',$paramCarrito);
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
            <th>No. Compra</th>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>IVA</th>
            <th>Total</th>
            <th>Detalles</th>
          </tr>
          <?php foreach ($datoCompra as $keyCompra => $valCompra): ?>
            <tr>
              <td><?php echo $valCompra['id_compra']; ?></td>
              <td><?php echo $valCompra['fecha']; ?></td>
              <td><?php echo $valCompra['subtotal']; ?></td>
              <td><?php echo $valCompra['iva']; ?></td>
              <td><?php echo $valCompra['total']; ?></td>
              <td><a class="btn btn-danger" href="compra_detalles.php?id_compra=<?php echo $valCompra['id_compra']; ?>" role="button"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Detalles</a></td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
          <div class="panel-body">No Hay Productos</div>
      <?php endif; ?>
    </div>
  
</div>
<?php
	include('../footer.php');
?>