<div class="container">
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
      <?php
        $i=0;
        foreach($conexion->query("select * from vw_banner_ofertas") as $fila) {
          if ($i==0) {
            echo '<div class="item active">';
              echo'<img class="first-slide" src="images/ofertas/'.$fila['banner'].'" alt="First slide">';
            echo '</div>';
          }
          if ($i==1) {
            echo '<div class="item">';
              echo '<img class="second-slide" src="images/ofertas/'.$fila['banner'].'" alt="Second slide">';
            echo '</div>';
          }
          if ($i==2) {
            echo '<div class="item">';
              echo '<img class="third-slide" src="images/ofertas/'.$fila['banner'].'" alt="Third slide">';
            echo '</div>';
          }
          $i++;
        }
      ?>  
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
  </div><!-- /.container -->  