<?php

require ('../crud/Conexion.php');
	
	class Socio {

		private $idSocio;
		private $nombre;
		private $dni;
		private $cuota;
		private $fechaAlt;
		private $FK_idEquipo;
		const TABLA = 'socio';

		public function __construct($nombre, $dni, $cuota){
			$this->nombre = $nombre;
			$this->dni = $dni;
			$this->cuota = $cuota;
    	}

    	public function getIdSocio(){
			return $this->idSocio;
		}

		public function setIdSocio($idSocio){
			$this->idSocio = $idSocio;
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

		public function getCuota(){
			return $this->cuota;
		}

		public function setCuota($cuota){
			$this->cuota = $cuota;
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



		public function anadirSocio(){
			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = 'INSERT INTO '.self::TABLA.'(Nombre, Dni, Cuota, FK_IdEquipo) VALUES (:nombre, :dni, :cuota, :fkIdEquipo);';

			$nombre = $this->getNombre();
			$dni = $this->getDni();
			$cuota = $this->getCuota();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":cuota", $cuota );
			$resultado->bindParam(":fkIdEquipo", $fkIdEquipo );

				
			if (!$resultado) {
				return "Erro al añadir Jugador";
			} else {
				$resultado->execute();
				return "Registrado con exito";
			}
		}


		public function modificarSocio(){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = 'UPDATE '.self::TABLA.' set Nombre = :nombre, Cuota = :cuota WHERE Dni = :dni AND FK_idEquipo = :fkIdEquipo';

			$nombre = $this->getNombre();
			$dni = $this->getDni();
			$cuota = $this->getCuota();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":cuota", $cuota );
			$resultado->bindParam(":fkIdEquipo", $fkIdEquipo );

			if (!$resultado) {
				return "Error al modificar Jugador";
			} else {
				$resultado->execute();
				return "Modificado con exito";
			}

		}


		public static function buscarSocio($dni,$FK_IdEquipo){

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