<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/');
	include('../header.php');
?>
<div class="page-header">
  <h1>Bienvenido</h1>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Productos</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/venta/productos"><img src="../../images/icons/productos.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Ofertas</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/venta/ofertas"><img src="../../images/icons/ofertas.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mi Carrito</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/venta/carrito"><img src="../../images/icons/carrito.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Historial</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/venta/historial"><img src="../../images/icons/historial.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<?php
	include('../footer.php');
?>