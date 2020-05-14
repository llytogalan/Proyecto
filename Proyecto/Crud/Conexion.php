<?php

	class Conexion{
	 	
	 	public function conectar(){
	 		$conexion = new PDO("mysql:host=localhost;dbname=proyecto","root","");
	 		return $conexion;
	 	}
	}

?>