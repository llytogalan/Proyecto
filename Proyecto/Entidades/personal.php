<?php

	require('../Crud/Conexion.php');

	class Personal {

		private $idPersonal;
		private $nombre;
		private $dni;
		private $sueldo;
		private $funcion;
		private $fechaAlt;
		private $FK_idEquipo;
		const TABLA = 'personal';

		public function __construct($nombre, $dni, $sueldo, $funcion, $FK_idEquipo){
			$this->nombre = $nombre;
			$this->dni = $dni;
			$this->sueldo = $sueldo ;
			$this->funcion= $funcion ;
			$this->FK_idEquipo = $FK_idEquipo;
    	}

    	public function getIdPersonal(){
			return $this->idPersonal;
		}

		public function setIdPersonal($idPersonal){
			$this->idPersonal = $idPersonal;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getDni(){
			return $this->dni;
		}

		public function setDni($dni){
			$this->dni = $dni;
		}

		public function getSueldo(){
			return $this->sueldo;
		}

		public function setSueldo($sueldo){
			$this->sueldo = $sueldo;
		}

		public function getFuncion(){
			return $this->funcion;
		}

		public function setFuncion($funcion){
			$this->funcion = $funcion;
		}

		public function getFechaAlt(){
			return $this->fechaAlt;
		}

		public function setFechaAlt($fechaAlt){
			$this->fechaAlt = $fechaAlt;
		}

		public function getFK_idEquipo(){
			return $this->FK_idEquipo;
		}

		public function setFK_idEquipo($FK_idEquipo){
			$this->FK_idEquipo = $FK_idEquipo;
		}


		public function anadirPersonal(){
			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = 'INSERT INTO '.self::TABLA.'(Nombre, Dni, Sueldo, Funcion, FK_IdEquipo) VALUES (:nombre, :dni, :sueldo, :funcion, :fkIdEquipo);';

			$nombre = $this->getNombre();
			$dni = $this->getDni();
			$sueldo = $this->getSueldo();
			$funcion = $this->getFuncion();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":sueldo", $sueldo );
			$resultado->bindParam(":funcion", $funcion );
			$resultado->bindParam(":fkIdEquipo", $fkIdEquipo );

				
			if (!$resultado) {
				return "Erro al añadir Personal";
			} else {
				$resultado->execute();
				return "Registrado con exito";
			}
		}


		public function modificarPersonal(){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = 'UPDATE '.self::TABLA.' set Nombre = :nombre, Sueldo = :sueldo, Funcion = :funcion WHERE Dni = :dni AND FK_idEquipo = :fkIdEquipo';

			$nombre = $this->getNombre();
			$dni = $this->getDni();
			$sueldo = $this->getSueldo();
			$funcion = $this->getFuncion();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":sueldo", $sueldo );
			$resultado->bindParam(":funcion", $funcion );
			$resultado->bindParam(":fkIdEquipo", $fkIdEquipo );

			if (!$resultado) {
				return "Error al modificar Personal";
			} else {
				$resultado->execute();
				return "Modificado con exito";
			}

		}


		public static function buscarPersonal($dni, $FK_IdEquipo){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = 'SELECT * FROM '.self::TABLA.' WHERE Dni = :dni AND FK_idEquipo = :FK_idEquipo';

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":FK_idEquipo", $FK_IdEquipo );

			$resultado->execute();
			$total=$resultado->rowCount();

			if ($total == 0) {
				echo "No esta en base datos o no ha introducido bien datos";
			} else {
				
				$fila = $resultado->fetch();
				return $fila;
			}
		}
}

?>