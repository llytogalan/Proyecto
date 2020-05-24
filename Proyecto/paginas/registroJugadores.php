<!DOCTYPE html>
<html lang="es">
<head>
<title>Jugadores</title>
<meta charset="utf-8" />
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta name="description" content="futbol,tercera,segunda,estadisticas,entrenadores,gestion">
<link rel="stylesheet" href="../registrados.css" type="text/css" />
</head>
 
<body>

	<?php
		session_start();
		require('../Entidades/jugador.php');
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

				if (isset($_POST['anadirJugador'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$apodo=(isset($_POST['apodo']))?$_POST['apodo']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$fechaNac=(isset($_POST['fechaNac']))?$_POST['fechaNac']:" ";
					$dorsal=(isset($_POST['dorsal']))?$_POST['dorsal']:" ";
					$posicion=(isset($_POST['posicion']))?$_POST['posicion']:" ";
					$goles=(isset($_POST['goles']))?$_POST['goles']:" "; 
					$asistencias=(isset($_POST['asistencias']))?$_POST['asistencias']:" "; 
					$tarjetas=(isset($_POST['tarjetas']))?$_POST['tarjetas']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";
					$fecha = str_replace('/', '-', $fechaNac);
					$fecha= date('Y-m-d', strtotime($fecha));

					$jugador = new Jugador();
					$jugador->setNombre($nombre);
					$jugador->setApodo($apodo);
					$jugador->setDni($dni);
					$jugador->setPosicion($posicion);
					$jugador->setDorsal($dorsal);
					$jugador->setFechaNac($fecha);
					$jugador->setGoles($goles);
					$jugador->setAsistencias($asistencias);
					$jugador->setTarjetas($tarjetas);
					$jugador->setFK_idEquipo($fk_equipo);

				?>
					<!-- Contenido Pagina cuando añada jugadores -->
					<h1><?php echo $jugador->anadirJugador()."<br>"; ?></h1>
					<a href="./registroJugadores.php"><button id="botonvolver">Volver a formulario</button></a>

				<?php
				}elseif (isset($_POST['modificarJugador'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$apodo=(isset($_POST['apodo']))?$_POST['apodo']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$fechaNac=(isset($_POST['fechaNac']))?$_POST['fechaNac']:" ";
					$dorsal=(isset($_POST['dorsal']))?$_POST['dorsal']:" ";
					$posicion=(isset($_POST['posicion']))?$_POST['posicion']:" ";
					$goles=(isset($_POST['goles']))?$_POST['goles']:" "; 
					$asistencias=(isset($_POST['asistencias']))?$_POST['asistencias']:" "; 
					$tarjetas=(isset($_POST['tarjetas']))?$_POST['tarjetas']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";
					$fecha = str_replace('/', '-', $fechaNac);
					$fecha= date('Y-m-d', strtotime($fecha));

					$jugador = new Jugador();
					$jugador->setNombre($nombre);
					$jugador->setApodo($apodo);
					$jugador->setDni($dni);
					$jugador->setPosicion($posicion);
					$jugador->setDorsal($dorsal);
					$jugador->setFechaNac($fecha);
					$jugador->setGoles($goles);
					$jugador->setAsistencias($asistencias);
					$jugador->setTarjetas($tarjetas);
					$jugador->setFK_idEquipo($fk_equipo);

				?>
					<!-- Contenido Pagina cuando modifique jugadores -->
					<h1><?php echo $jugador->modificarJugador()."<br>"; ?></h1>
					<table id="tablabusquedas" >
						<tr>
							<th>Nombre:</th>
							<td><?php echo $jugador->getNombre(); ?></td>
						</tr>
						<tr>
							<th>Apodo:</th>
							<td><?php echo $jugador->getApodo(); ?></td>
						</tr>
						<tr>
							<th>Dni:</th>
							<td><?php echo $jugador->getDni(); ?></td>
						</tr>
						<tr>
							<th>Posicion:</th>
							<td><?php echo $jugador->getPosicion(); ?></td>
						</tr>
						<tr>
							<th>Dorsal:</th>
							<td><?php echo $jugador->getDorsal(); ?></td>
						</tr>
						<tr>
							<th>Fecha Nacimiento:</th>
							<td><?php echo $jugador->getFechaNac(); ?></td>
						</tr>
						<tr>
							<th>Goles:</th>
							<td><?php echo $jugador->getGoles(); ?></td>
						</tr>
						<tr>
							<th>Asistencias:</th>
							<td><?php echo $jugador->getAsistencias(); ?></td>
						</tr>
						<tr>
							<th>Tarjetas:</th>
							<td><?php echo $jugador->getTarjetas(); ?></td>
						</tr>


					</table>
					<a href="./registroJugadores.php"><button id="botonvolver">Volver a formulario</button></a>

				<?php

				}elseif (isset($_POST['buscarJugador'])) {

					$apodo=(isset($_POST['apodo']))?$_POST['apodo']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$jugador = new Jugador();
					$jugador->setApodo($apodo);
					$jugador->setDni($dni);
					$jugador->setFK_idEquipo($fk_equipo);

					echo $jugador->buscarJugador();
					
				?>
					<!-- Contenido Pagina cuando busque jugadores -->
					<h1>Busqueda de Jugador de <?php echo $_SESSION['nombre'] ?></h1>
					<table id="tablabusquedas" >
						<tr>
							<th>IdJugador:</th>
							<td><?php echo $jugador->getIdJugador(); ?></td>
						</tr>
						<tr>
							<th>Nombre:</th>
							<td><?php echo $jugador->getNombre(); ?></td>
						</tr>
						<tr>
							<th>Apodo:</th>
							<td><?php echo $jugador->getApodo(); ?></td>
						</tr>
						<tr>
							<th>Dni:</th>
							<td><?php echo $jugador->getDni(); ?></td>
						</tr>
						<tr>
							<th>Posicion:</th>
							<td><?php echo $jugador->getPosicion(); ?></td>
						</tr>
						<tr>
							<th>Dorsal:</th>
							<td><?php echo $jugador->getDorsal(); ?></td>
						</tr>
						<tr>
							<th>Fecha Nacimiento:</th>
							<td><?php echo $jugador->getFechaNac(); ?></td>
						</tr>
						<tr>
							<th>Goles:</th>
							<td><?php echo $jugador->getGoles(); ?></td>
						</tr>
						<tr>
							<th>Asistencias:</th>
							<td><?php echo $jugador->getAsistencias(); ?></td>
						</tr>
						<tr>
							<th>Tarjetas:</th>
							<td><?php echo $jugador->getTarjetas(); ?></td>
						</tr>


					</table>

					<a href="./registroJugadores.php"><button id="botonvolver">Volver a formulario</button></a>


				<?php

				}elseif (isset($_POST['mostrarTodos'])) {

				?>
					<!-- Contenido Pagina cuando busque todos los jugadores -->
					<h1>Jugadores de <?php echo $_SESSION['nombre'] ?></h1>
					 <table id="tablaresultado">
			            <tr>
			                <th>IdJugador</th>
			                <th>Nombre</th>
			                <th>Apodo</th>
			                <th>Dni</th>
			                <th>Posicion</th>
			                <th>Dorsal</th>
			                <th>Fecha Nacimiento</th>
			                <th>Goles</th>
			                <th>Asistencias</th>
			                <th>Tarjetas</th>
			            </tr>
			            <?php $obj = new Jugador();
			            		$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";
			            		$obj->mostrarTodos($fk_equipo);
			            		$filas = $obj->getRows();
			            	foreach($filas as $jugador){?>
			            	<tr>
			                	<td><?php echo $jugador['PK_IdJugador']?></td>
			                	<td><?php echo $jugador['Nombre'] ?></td>
			                	<td><?php echo $jugador['Apodo']; ?></td>
			                	<td><?php echo $jugador['Dni'];?></td>
			                	<td><?php echo $jugador['Posicion'];?></td>
			                	<td><?php echo $jugador['Dorsal'];?></td>
			                	<td><?php echo $jugador['FechaNac'];?></td>
			                	<td><?php echo $jugador['Goles'];?></td>
			                	<td><?php echo $jugador['Asistencias'];?></td>
			                	<td><?php echo $jugador['Tarjetas'];?></td>
			            	</tr>
			            <?php	
			            	};
			            ?>
			            
			        </table>

			        <a href="./registroJugadores.php"><button id="botonvolver">Volver a formulario</button></a>
 
				<?php

				}else {?>

					<!--Contenido Pagina cuando no haya echo aun nada -->
					<h1>Formulario de Registro de Jugadores de <?php echo $_SESSION['nombre'] ?></h1>

					<form id="formulario" action="./registroJugadores.php" method="POST" name="formularioRegistroJugadores" >

						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" />


			    		<label for="apodo">Apodo*</label>
						<input type="text" name="apodo" id="apodo" placeholder="Escribe el Apodo" required/>

						<label for="dni">DNI*</label>
						<input type="text" name="dni" id="dni" placeholder="Escribe el Dni" required/>


						<label for="fechaNac">Fecha Nacimiento</label>
						<input type="date" name="fechaNac" id="fechaNac" />

						<hr style="border-color:black;">

						<label for="dorsal">Dorsal</label>
						<input type="text" name="dorsal" id="dorsal" placeholder="Escribe el Dorsal"  />

						<label for="posicion">Posicion</label><br>
						<?php $posiciones = array("Portero", "Defensa", "Mediocentro", "Delantero"); 
							foreach ($posiciones as $posicion) { ?>
								<input type="radio" id="posicion" name="posicion" value="<?php echo $posicion ?>" ><label><?php echo $posicion ?></label><br>
 						<?php
							}
						?>

						<hr style="border-color:black;">

						<label for="goles">Goles</label>
						<input type="text" name="goles" id="goles" placeholder="Introduce Goles" />


			    		<label for="asistencias">Asistencias</label>
						<input type="text" name="asistencias" id="asistencias" placeholder="Introduce asistencias"  />


			    		<label for="tarjetas">Tarjetas</label>
						<input type="text" name="tarjetas" id="tarjetas" placeholder="Introduce Tarjetas"  />
						
						
						<input type="submit" name="anadirJugador" value="Añadir Jugador"/>


			    		<input type="submit" name="modificarJugador" value="Modificar Jugador" />


			    		<input type="submit" name="buscarJugador" value="Buscar Jugador"/>

						<input type="reset" value="Reset"/>

					</form>

					<form id="formulario2" action="./registroJugadores.php" method="POST">
							<input type="submit" name="mostrarTodos" value="Mostrar Todos"/>
							<a href="./home.php"><input type="button" name="volver" value="Volver a Inicio"/></a>
					</form>



			    		

		<?php

			}

		?>

		

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