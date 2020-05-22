<?php

require('../Crud/Conexion.php');

	class Equipo{

		private $idEquipo;
		private $nombre;
		private $password;
		private $localidad;
		private $division;
		private $grupo;
		const TABLA = 'equipo';

		public function __construct(){
    	}

    	public function getIdEquipo(){
			return $this->idEquipo;
		}

		public function setIdEquipo($idEquipo){
			$this->idEquipo = $idEquipo;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getLocalidad(){
			return $this->localidad;
		}

		public function setLocalidad($localidad){
			$this->localidad = $localidad;
		}

		public function getDivision(){
			return $this->division;
		}

		public function setDivision($division){
			$this->division = $division;
		}

		public function getGrupo(){
			return $this->grupo;
		}

		public function setGrupo($grupo){
			$this->grupo = $grupo;
		}

		public function insertarEquipo(){

			$model = new Conexion();
  			$conexion = $model->conectar();
			$sql = 'INSERT INTO '.self::TABLA.' (Nombre, Contrasenia, Localidad, Division, Grupo) VALUES (:nombre, :contrasenia, :localidad, :division, :grupo)';

			$nombre = $this->getNombre();
			$password = $this->getPassword();
			$localidad = $this->getLocalidad();
			$division = $this->getDivision();
			$grupo = $this->getGrupo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":contrasenia",$password);
			$resultado->bindParam(":localidad", $localidad);
			$resultado->bindParam(":division", $division );
			$resultado->bindParam(":grupo", $grupo );
				
			if (!$resultado) {
				return "fallo";
			} else {
				$resultado->execute();
				return "Registrado con exito";
			}
		}

		public function obtenerId(){

			$model = new Conexion();
  			$conexion = $model->conectar();

  			$sql = 'SELECT PK_IdEquipo FROM '.self::TABLA.' WHERE Nombre= :nombre AND Contrasenia= :contrasenia AND Localidad= :localidad AND Division= :division AND Grupo= :grupo';

  			$nombre = $this->getNombre();
			$password = $this->getPassword();
			$localidad = $this->getLocalidad();
			$division = $this->getDivision();
			$grupo = $this->getGrupo();

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":nombre",$nombre);
			$resultado->bindParam(":contrasenia",$password);
			$resultado->bindParam(":localidad", $localidad);
			$resultado->bindParam(":division", $division );
			$resultado->bindParam(":grupo", $grupo );

			$resultado->execute();
			$total=$resultado->rowCount();

			if ($total == 0) {
				echo "No se ha podido iniciar sesion";
			} else {
				$fila = $resultado->fetch();
				$this->setIdEquipo($fila['PK_IdEquipo']);
			}

		}


		public function login(){

			$model = new Conexion();
  			$conexion = $model->conectar();

			$idEquipo = $this->getIdEquipo();
			$password = $this->getPassword();

  			$sql = 'SELECT * FROM '.self::TABLA.' WHERE PK_IdEquipo= :PK_IdEquipo AND Contrasenia= :contrasenia';

			$resultado=$conexion->prepare($sql);
			$resultado->bindParam(":PK_IdEquipo",$idEquipo);
			$resultado->bindParam(":contrasenia",$password);

			$resultado->execute();
			$total=$resultado->rowCount();

			if ($total == 0) {
				echo "No esta registrado o no ha introducido bien datos";
			} else {
				
				$fila = $resultado->fetch();
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['idEquipo'] = $fila['PK_IdEquipo'];
				$_SESSION['nombre'] = $fila ['Nombre'];
				$_SESSION['division'] = $fila['Division'];
				$_SESSION['grupo'] = $fila['Grupo'];
				header('location: ../paginas/home.php');
			}



		}

		


	}
?>