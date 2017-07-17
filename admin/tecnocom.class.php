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
						$statement->bindParam(':'.$key,$value);
					}
					return $statement->execute();
				}catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			}// Funcion Borrar

		}// Class Tecnocom

	}
	$tecnocom = new Tecnocom;
?>