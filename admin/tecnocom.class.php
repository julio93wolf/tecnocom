<?php
	
  if(!class_exists('Tecnocom')){
		
    class Tecnocom{
		
			function __construct(){
				include ('../../config.php');
				$this->conexion=$conexion;
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
				$columnas='';
				$datos='';
				$i=0;
				foreach ($parametros as $key => $value) {
					if ($i!=0){
						$columnas.=','.$key;
						$datos.=',:'.$key;
					}
					else{
						$columnas.=$key;
						$datos.=':'.$key;
					}
					$i++;
				}
				$sql='insert into '.$tabla.' ('.$columnas.') values ('.$datos.')';
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
				$sql='delete from '.$tabla.' where ';
				$where='';
				$i=0;
				foreach ($parametros as $key => $value) {
					if ($i!=0) {
						$where=$where.' and '.$key.'=:'.$key;
					}else{
						$where=$key.'=:'.$key;
					}
					$i++;
				}
				$sql=$sql.$where;
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
			
		}// Class Tecnocom

	}
	$tecnocom = new Tecnocom;
?>