<?php

	require ('../crud/Conexion.php');
	
	class Jugador {

		private $idJugador;
		private $nombre;
		private $apodo;
		private $dni;
		private $posicion;
		private $dorsal;
		private $fechaNac;
		private $goles;
		private $asistencias;
		private $tarjetas;
		private $FK_idEquipo;

		public function __construct(){
    	}

    	public function getIdJugador(){
			return $this->idJugador;
		}

		public function setIdJugador($idJugador){
			$this->idJugador = $idJugador;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getApodo(){
			return $this->apodo;
		}

		public function setApodo($apodo){
			$this->apodo = $apodo;
		}

		public function getDni(){
			return $this->dni;
		}

		public function setDni($dni){
			$this->dni = $dni;
		}

		public function getPosicion(){
			return $this->posicion;
		}

		public function setPosicion($posicion){
			$this->posicion = $posicion;
		}

		public function getDorsal(){
			return $this->dorsal;
		}

		public function setDorsal($dorsal){
			$this->dorsal = $dorsal;
		}

		public function getFechaNac(){
			return $this->fechaNac;
		}

		public function setFechaNac($fechaNac){
			$this->fechaNac = $fechaNac;
		}

		public function getGoles(){
			return $this->goles;
		}

		public function setGoles($goles){
			$this->goles = $goles;
		}

		public function getAsistencias(){
			return $this->asistencias;
		}

		public function setAsistencias($asistencias){
			$this->asistencias = $asistencias;
		}

		public function getTarjetas(){
			return $this->tarjetas;
		}

		public function setTarjetas($tarjetas){
			$this->tarjetas = $tarjetas;
		}

		public function getFK_idEquipo(){
			return $this->FK_idEquipo;
		}

		public function setFK_idEquipo($FK_idEquipo){
			$this->FK_idEquipo = $FK_idEquipo;
		}


		public function anadirJugador(){
			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = "INSERT INTO jugador(Nombre, Apodo, Dni, Posicion, Dorsal, FechaNac, Goles, Asistencias, Tarjetas, FK_IdEquipo) VALUES (:nombre, :apodo, :dni, :posicion, :dorsal, :fechaNac, :goles, :asistencias, :tarjetas, :fkIdEquipo);";

			$nombre = $this->getNombre();
			$apodo = $this->getApodo();
			$dni = $this->getDni();
			$posicion = $this->getPosicion();
			$dorsal = $this->getDorsal();
			$fechaNac = $this->getFechaNac();
			$goles = $this->getGoles();
			$asistencias = $this->getAsistencias();
			$tarjetas = $this->getTarjetas();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":apodo",$apodo);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":posicion", $posicion );
			$resultado->bindParam(":dorsal", $dorsal );
			$resultado->bindParam(":fechaNac", $fechaNac );
			$resultado->bindParam(":goles", $goles );
			$resultado->bindParam(":asistencias", $asistencias );
			$resultado->bindParam(":tarjetas", $tarjetas );
			$resultado->bindParam(":fkIdEquipo", $fkIdEquipo );

				
			if (!$resultado) {
				return "Erro al añadir Jugador";
			} else {
				$resultado->execute();
				return "Registrado con exito";
			}
		}


		public function modificarJugador(){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = "UPDATE jugador set Nombre = :nombre, Posicion = :posicion, Dorsal = :dorsal, FechaNac = :fechaNac, Goles = :goles, Asistencias = :asistencias, Tarjetas = :tarjetas WHERE Dni = :dni AND FK_idEquipo = :FK_idEquipo AND apodo = :apodo";

			$nombre = $this->getNombre();
			$apodo = $this->getApodo();
			$dni = $this->getDni();
			$posicion = $this->getPosicion();
			$dorsal = $this->getDorsal();
			$fechaNac = $this->getFechaNac();
			$goles = $this->getGoles();
			$asistencias = $this->getAsistencias();
			$tarjetas = $this->getTarjetas();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":apodo",$apodo);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":posicion", $posicion );
			$resultado->bindParam(":dorsal", $dorsal );
			$resultado->bindParam(":fechaNac", $fechaNac );
			$resultado->bindParam(":goles", $goles );
			$resultado->bindParam(":asistencias", $asistencias );
			$resultado->bindParam(":tarjetas", $tarjetas );
			$resultado->bindParam(":FK_idEquipo", $fkIdEquipo );

			if (!$resultado) {
				return "Error al modificar Jugador";
			} else {
				$resultado->execute();
				return "Modificado con exito";
			}

		}

		public function buscarJugador(){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = "SELECT * FROM jugador WHERE Dni = :dni AND FK_idEquipo = :FK_idEquipo AND Apodo = :apodo";

			$apodo = $this->getApodo();
			$dni = $this->getDni();
			$fkIdEquipo = $this->getFK_idEquipo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":dni", $dni);
			$resultado->bindParam(":FK_idEquipo", $fkIdEquipo );
			$resultado->bindParam(":apodo",$apodo);

			$resultado->execute();
			$total=$resultado->rowCount();

			if ($total == 0) {
				echo "No esta en base datos o no ha introducido bien datos";
			} else {
				
				$fila = $resultado->fetch();
				$this->setIdJugador($fila['PK_IdJugador']);
				$this->setNombre($fila['Nombre']);
				$this->setPosicion($fila['Posicion']);
				$this->setDorsal($fila['Dorsal']);
				$this->setFechaNac($fila['FechaNac']);
				$this->setGoles($fila['Goles']);
				$this->setAsistencias($fila['Asistencias']);
				$this->setTarjetas($fila['Tarjetas']);

			}
		}


		public function buscarGoleadores(){
			$sql='SELECT * FROM jugador ORDER BY Goles DESC LIMIT 5';

		}


		

	}
?>