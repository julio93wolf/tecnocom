<?php
	
  if(!class_exists('Tecnocom')){
		
    class Tecnocom{
		
			function __construct(){
				include ($_SERVER['DOCUMENT_ROOT'].'/tecnocom/config.php');
				$this->conexion=$conexion;
				$this->configuracion=$configuracion;
			}

			/*
			* Método generico para realizar consultas en la base de datos
			*/
			function consultar($sql,$parametros=null){
				$statement=$this->conexion->prepare($sql);
				if(!is_null($parametros)){
					foreach ($parametros as $key => $value) {
						$statement->bindValue(':'.$key,$value);
					}	
				}
				$statement->execute();
				$datos=$statement->fetchAll();
				return $datos;
			}// Funcion Consultar

			/*
			* Método generico para insertar registros en la base de datos
			*/
			function insertar($tabla,$parametros){
				$columnas = array_keys($parametros);
				$datos = array_keys($parametros);
				array_walk($datos, function(&$item){$item=':'.$item;});
				$sql='insert into '.$tabla.' ('.implode(", ",$columnas).') values ('.implode(", ",$datos).');';
				try{
					$statement=$this->conexion->prepare($sql);
					foreach ($parametros as $key => $value) {
						$statement->bindValue(':'.$key,$value);
					}
					return $statement->execute();
				}catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			}//Funcion Insertar

			/*
			* Método generico para actualizar registos en la base de datos
			*/
			function actualizar($tabla, $parametros, $llaves){
				$datos = array_keys($parametros);
				$keys = array_keys($llaves);
				array_walk($datos, function(&$item){$item=$item.'=:'.$item;});
				array_walk($keys, function(&$item){$item=$item.'=:'.$item;});
				$sql = 'update '.$tabla.' set '.implode(", ",$datos).' where '.implode(" and ", $keys).'';
				try{
					$statement=$this->conexion->prepare($sql);
					foreach ($parametros as $key => $value) {
						$statement->bindValue(':'.$key, $value);
						
					}
					foreach ($llaves as $key => $value) {
						$statement->bindValue(':'.$key, $value);
					}
					return $statement->execute();	
				}catch (Exception $e){
					echo 'La exception: '. $e->getMessage(). '\n';
				}
			}

			/* 
			* Método generico para eliminar registros en la base de datos
			*/
			function borrar($tabla,$parametros){
				$datos = array_keys($parametros);
				array_walk($datos, function(&$item){$item=$item.'=:'.$item;});
				$sql='delete from '.$tabla.' where '.implode(" and ", $datos).'';
				try{
					$statement=$this->conexion->prepare($sql);
					foreach ($parametros as $key => $value) {
						$statement->bindValue(':'.$key,$value);
					}
					return $statement->execute();
				}catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			}// Funcion Borrar

			function dropDownList($sql,$nombre,$id_seleccionado=null){
				$datos=$this->consultar($sql);
				$select='<select class="form-control" name="'.$nombre.'">';
				$select.='<option value=""></option>';
				foreach ($datos as $key => $value) {
					$selected = '';
					if ($id_seleccionado==$datos[$key]['id']) {
						$selected = 'selected';
					}
					$select.='<option value="'.$datos[$key]['id'].'" '.$selected.'>'.$datos[$key]['opcion'].'</option>';
				}
				$select.='</select>';
				return $select;
			}

			function validarImagen($imagen){
				if(in_array($imagen['type'],$this->configuracion['img_permit'])){
					return true;
				}
				return false;
			}
			
			function security($rolPermitido,$ulrError){
				if (isset($_SESSION['usrValido'])) {
					if ($_SESSION['usrValido']) {
						$bandRol=false;
						foreach ($_SESSION['usrRol'] as $rolUsr) {
							if (in_array($rolUsr,$rolPermitido)) {
								$bandRol=true;
							}
						}
						if (!$bandRol) {
							$error=3;
						}
					}else{
						$error=2;
					}
				}else{
					$error=1;
				}
				if (!$bandRol) {
					header('Location: '.$ulrError.'index.php?error='.$error);
				}
			}

		}// Class Tecnocom

	}
	$tecnocom = new Tecnocom;
?>