<?php
  include('header.php');
?>
<section> 
  <div class="row">
    <?php
      include('components/carousel.php')
    ?>
  </div>
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
</section>
<?php
  include('footer.php');
?>      