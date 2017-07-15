<?php
  header('Content-Type: text/html; charset=UTF-8');
  include('config.php')
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="TecnoCom Celaya">
    <meta name="author" content="Valle Rodriguez Julio Cesar">
    <meta name="keywords" content="computadoras procesadores">
    <link rel="icon" href="images/icon_tecnocom.ico">
    <title>TecnoCom</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet"> 
  </head>
  <body>

    <div class="container">
      <div class="row" id="wrapper">
        <header>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                  <div class="row">
                    <img src="images/banner_tecnocom.png" class="img-responsive" alt="TecnoCom">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="container-fluid" id="header_login">
                  <div class="row">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                      <a class="btn btn-primary" href="#" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registrarse</a>
                      <a class="btn btn-success" href="#" role="button"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar Sesion</a>
                    </div>    
                  </div>
                </div>
                <div class="container-fluid" id="header_search">
                  <form class="form-horizontal" method="GET" action="busqueda.php">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </div>
                        <input type="text" class="form-control" name="search" placeholder="Buscar...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Buscar</button>
                        </span>
                      </div>
                    </div>
                  </form> 
                </div>
              </div>
            </div>  
          </div>
        </header>

        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_caterorias" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Inicio</a>
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

        <div class="container-fluid" id="content">
          <div class="row">
          