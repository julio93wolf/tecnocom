<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Administrador';
	$tecnocom->security($rol,'/tecnocom/admin/login/');
	include('../header.php');
?>
<div class="page-header">
  <h1>Bienvenido</h1>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Clientes</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/admin/clientes"><img src="../../images/icons/clientes.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Empleados</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/admin/empleados"><img src="../../images/icons/empleados.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Productos</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/admin/productos"><img src="../../images/icons/productos.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Roles</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/admin/roles"><img src="../../images/icons/roles.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Fabricantes</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/admin/fabricantes"><img src="../../images/icons/fabricantes.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
	<div class="panel panel-admin">
	  <div class="panel-heading">
	    <h3 class="panel-title">Categorias</h3>
	  </div>
	  <div class="panel-body">
	    <a href="/tecnocom/admin/categorias"><img src="../../images/icons/categorias.png" class="img-responsive" alt="Responsive image"></a>
	  </div>
	</div>
</div>
<?php
	include('../footer.php');
?>