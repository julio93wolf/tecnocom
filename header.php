<?php
  header('Content-Type: text/html; charset=UTF-8');
  include('config.php')
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TecnoCom Celaya">
    <meta name="author" content="Valle Rodriguez Julio Cesar">
    <meta name="keywords" content="computadoras procesadores">
    <link rel="icon" href="images/tecnocom.ico">
    <title>TecnoCom</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Bootstrap -->
    <link href="css/main.css" rel="stylesheet"> 
  </head>
  <body>
    <div class="container" id="wrapper">
      <header>
        <div class="container-fluid">
          <div class="row">
              <div class="hidden-xs col-sm-8 col-md-8 col-lg-8">
              </div><!-- /.col-xs-4 /.col-sm-8 /.col-md-8 /.col-lg-8 -->
              <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="row" id="header_registro">
                    <form class="form-inline" action="ingresa.php">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                        <button type="submit" class="btn btn-danger">
                          <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar
                        </button>
                      </div><!-- /.form-group -->
                    </form>
                  </div><!-- /.row -->
                  <div class="row" id="header_log_in">
                  <form class="form-inline" action="busqueda.php" method="GET">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </div><!-- /.input-group -->
                        <input type="text" class="form-control" name="search" placeholder="Buscar...">
                        <span class="input-group-btn">
                          <button class="btn btn-success" type="submit">Buscar</button>
                        </span>
                      </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                  </form>
                </div><!-- /.row -->  
              </div><!-- /.col-xs-8 /.col-sm-4 /.col-md-4 /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </header>
      <div id="content">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_caterorias" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Categorias</a>
            </div><!-- /.navbar-header -->

            <div class="collapse navbar-collapse" id="nav_caterorias">
              <ul class="nav navbar-nav">
                <?php
                  include('components/nav.php');
                ?>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>