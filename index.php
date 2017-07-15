<?php
  include('header.php');
?>
<section>
  
  <?php
    include('components/carousel.php')
  ?>

  <div class="container">
    <div class="panel panel-tecnocom">
      <div class="panel-heading">
        <h3 class="panel-title">Ofertas</h3>
      </div><!-- /.panel-heading -->  
      <div class="container-fluid panel_index">
        <?php
          include('components/ofertas.php');
        ?>
      </div>
    </div><!-- /.panel panel-primary -->  
  </div><!-- /.container -->  
  
  
    <div class="container">
      <div class="panel panel-tecnocom">
        <div class="panel-heading">
          <h3 class="panel-title">Lo Más Vendido</h3>
        </div><!-- /.panel-heading -->  
        <div class="container-fluid panel_index">
        <?php
          include('components/mas_vendidos.php');
        ?>
      </div>
      </div><!-- /.panel panel-primary -->  
    </div><!-- /.container -->  
  
  
    <div class="container">
      <div class="panel panel-tecnocom">
        <div class="panel-heading">
          <h3 class="panel-title">Lo Nuevo</h3>
        </div><!-- /.panel-heading -->  
        <div class="container-fluid panel_index">
          <?php
            include('components/nuevos_productos.php');
          ?>
        </div>  
      </div><!-- /.panel panel-primary -->  
    </div><!-- /.container -->  
</section>

<aside>
    
</aside>
<?php
  include('footer.php');
?>      