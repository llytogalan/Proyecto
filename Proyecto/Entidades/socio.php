<?php

require ('../crud/Conexion.php');
	
	class Socio {

		private $idSocio;
		private $nombre;
		private $dni;
		private $cuota;
		private $fechaAlt;
		private $FK_idEquipo;

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
			$sql = "INSERT INTO socio(Nombre, Dni, Cuota, FK_IdEquipo) VALUES (:nombre, :dni, :cuota, :fkIdEquipo);";

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
			$sql = "UPDATE socio set Nombre = :nombre, Cuota = :cuota WHERE Dni = :dni AND FK_idEquipo = :fkIdEquipo";

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


		public function buscarSocio(){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = "SELECT * FROM socio WHERE Dni = :dni AND FK_idEquipo = :FK_idEquipo";

			$dni = $this->getDni();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":FK_idEquipo", $fkIdEquipo );

			$resultado->execute();
			$total=$resultado->rowCount();

			if ($total == 0) {
				echo "No esta en base datos o no ha introducido bien datos";
			} else {
				
				$fila = $resultado->fetch();
				$this->setIdSocio($fila['PK_IdSocio']);
				$this->setNombre($fila['Nombre']);
				$this->setDni($fila['Dni']);
				$this->setCuota($fila['Cuota']);
				$this->setFechaAlt($fila['FechaAlt']);
				$this->setFK_idEquipo($fila['FK_IdEquipo']);
			}
		}




	}





?>