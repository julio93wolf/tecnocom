<?php
	include_once('../tecnocom.class.php');
	$rol[0]='Cliente';
	$tecnocom->security($rol,'/tecnocom/venta/login/'); 
  $paraCliente=array();
  $paraCliente['id_usuario'] = $_SESSION['usrDatos']['id_usuario'];
  $datoCliente = $tecnocom->consultar('select * from cliente join usuario using (id_usuario) where id_usuario=:id_usuario',$paraCliente);
  include('../header.php');
?>

<div class="page-header">
  <h1>Detalles Cliente</h1>
</div>
<?php
  if(isset($mensAlert) and isset($colorAlert) and isset($iconAlert)){
    foreach ($mensAlert as $key => $value) {
      echo '<div class="alert alert-'.$colorAlert.' alert-dismissible" role="alert"><span class="glyphicon '.$iconAlert.'" aria-hidden="true"></span> '.$value.'</div>';
    }
  }
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Detalles</h3>
    </div>
    <div class="panel-body">
      <h3>Nombre:</h3>
      <p><?php echo $datoCliente[0]['nombre'] ?></p>
      <h3>Apellido Paterno:</h3>
      <p><?php echo $datoCliente[0]['apaterno'] ?></p>
      <h3>Apellido Materno:</h3>
      <p><?php echo $datoCliente[0]['amaterno'] ?></p>
      <h3>Telefono:</h3>
      <p><?php echo $datoCliente[0]['telefono'] ?></p>
      <h3>Domicilio:</h3>
      <p><?php echo $datoCliente[0]['domicilio'] ?></p>
      <h3>Correo:</h3>
      <p><?php echo $datoCliente[0]['correo'] ?></p>
    </div>
  </div>
  <a class="btn btn-success pull-right" href="editar.php" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar Información</a>
</div>
<?php
	include('../footer.php');
?>