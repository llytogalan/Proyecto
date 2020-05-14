<!DOCTYPE html>
<html lang="es">
<head>
<title>Home</title>
<meta charset="utf-8" />
<meta name="description" content="futbol,tercera,segunda,estadisticas,entrenadores,gestion">
<link rel="stylesheet" href="../registrados.css" />
</head>
 
<body>

	<?php
		session_start();
	?>

	<div id="header">
    	<img src="../img/logo-blanco-grande.png" alt="logo pagina">
    	<div id="botonesInicioSesion">
      		<form action="home.php" method="POST">
				<input  type="submit" name="logout" value="Cerrar Sesion" >			
			</form>
    	</div>
   </div>
   <div id="contenido">
		<?php
			if ($_SESSION['login'] == true) {
		?>

		<h1>Bienvenido Administrador de <?php echo $_SESSION['nombre'] ?></h1>

		<div id="contenido2">

	  	<div id="jugadores">
	  		<h2>Jugadores</h2>
	  		<p>
	  			Desde aqui se accede al formulario de registro de jugadores, dentro de este podras tanto registrar datos, buscar jugadores, modificarlos o incluso borrarlos si usted desea.
	  		</p>
	  		<p>
	  			Aqui estara todo lo relacionado con los jugadores de su equipo
	  		</p>
	  		<a href="./registroJugadores.php"><button>Ir a Jugadores</button></a>
	  	</div>
	  	<div id="socios">
	  		<h2>Socios</h2>
	  		<p>
	  			Desde aqui se accede al formulario de registro de socios, dentro de este podras tanto registrar todos los datos, buscar socios, modificarlos o incluso borrarlos si usted desea.
	  		</p>
	  		<p>
	  			Aqui estara todo lo relacionado con los socios de su equipo
	  		</p>
	  		<a href="./registroSocios.php"><button>Ir a Socios</button></a>
	  	</div>
	  	<div id="personal">
	  		<h2>Personal</h2>
	  		<p>
	  			Desde aqui se accede al formulario de registro de personal, dentro de este podras tanto registrar todos los datos, buscar personal, modificarlos o incluso borrarlos si usted desea.
	  		</p>
	  		<p>
	  			Aqui estara todo lo relacionado con el personal de su equipo
	  		</p>
	  		<a href="./registroPersonal.php"><button>Ir a Personal</button></a>
	  	</div>
	  	<div id="estadisticas">
	  		<h2>Estadisticas</h2>
	  		<p>
	  			Desde aqui se accede a las estadisticas de ligas, dentro de este podras tanto ver datos de los jugadores que mas goles marcar, mas asistencias lleva ademas de ver las tarjetas.
	  		</p>
	  		<p>
	  			Aqui estara todo lo relacionado con las estadisticas.
	  		</p>
	  		<a href="./estadisticas.php"><button>Ir a Estadisticas</button></a>
	  	</div>
  </div>


	<?php

		if(isset($_POST['logout'])){
			session_unset();
			session_destroy();
			header('location: ../index.php');
		}

	} else {
		session_unset();
		session_destroy();
		header('location: ../index.php');
	}

	?>

   </div>
</body>
</html>

