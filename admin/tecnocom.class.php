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
			}


		}// Class Tecnocom

	}
	$tecnocom= new Tecnocom;
?>