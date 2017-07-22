<?php
  
  include_once('admin/tecnocom.class.php');
  $datoNuevos=$tecnocom->consultar('select * from vw_ultimos_productos');
  if (count($datoNuevos)>0){
    $productos=array();
    $contador=0;  

    foreach ($datoNuevos as $keyNuevos) {
      $productos[$contador]=$keyNuevos;
      $contador++;
    }
    
    echo '<div class="row">';
      for ($i=0; $i < 4; $i++) { 
        echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">';
          echo '<img src="images/productos/'.$productos[$i]['imagen'].'" class="img-responsive center-block" alt="'.$productos[$i]['producto'].'" />';
        echo '</div>';  
      }
    echo '</div>';
    echo '<div class="row">';
      for ($i=0; $i < 4; $i++) { 
        echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 oferta_producto">';
          echo '<p>'.$productos[$i]['producto'].'</p>';
        echo '</div>';  
      }
    echo '</div>';
    echo '<div class="row">';
      for ($i=0; $i < 4; $i++) { 
        echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 oferta_precio">';
          if($productos[$i]['precio_oferta']<$productos[$i]['precio']){
            echo '<p><strong>$'.$productos[$i]['precio'].'</strong></p>';
            echo '<h2><strong>$'.$productos[$i]['precio_oferta'].'</strong></h2>';
          }else{
            echo '<p></p>';
            echo '<h2><strong>$'.$productos[$i]['precio'].'</strong></h2>';
          }
        echo '</div>';  
      }
    echo '</div>';
  }
?>