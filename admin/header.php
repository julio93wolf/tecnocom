<!DOCTYPE html>
<html lang="es">  
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="TecnoCom Celaya">
  <meta name="author" content="Valle Rodriguez Julio Cesar">
  <meta name="keywords" content="computadoras procesadores">
  <link rel="icon" href="../../images/icon_tecnocom.ico">
	<title>TecnoCom - Admin</title>
	<!-- Bootstrap -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet"> 
  <link href="../../css/main.css" rel="stylesheet"> 
</head>
<body>
	<?php
		if (isset($_SESSION['usrValido']) && $_SESSION['usrRol'][0]=='Administrador'):
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
	  	<div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_administrador" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    	<a class="navbar-brand" href="/tecnocom/admin/main/index.php">Admin</a>
	  	</div><!-- /.navbar-header -->

      <div class="collapse navbar-collapse" id="nav_administrador">
	      <ul class="nav navbar-nav">
	        <li><a href="/tecnocom/admin/clientes">Clientes</a></li>
	        <li><a href="/tecnocom/admin/empleados">Empleados</a></li>
	        <li><a href="/tecnocom/admin/productos">Productos</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalogo <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="/tecnocom/admin/roles">Roles</a></li>
			        <li><a href="/tecnocom/admin/fabricantes">Fabricantes</a></li>
			        <li><a href="/tecnocom/admin/categorias">Categoría</a></li>
	          </ul>
	        </li>
	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Cuenta<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <?php
		else:
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_administrador" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/tecnocom/index.php">TecnoCom</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="nav_administrador">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/tecnocom/admin/login/">Iniciar Sesion</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<?php
		endif;
	?>
	<div class="container" id="content_admin">
		<div class="row" id="wrapper">
      <div class="container-fluid">
      	
      