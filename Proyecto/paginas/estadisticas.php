<!DOCTYPE html>
<html lang="es">
<head>
<title>Estadisticas</title>
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

		?>
					<!-- Contenido Pagina cuando busque todos los jugadores -->
					<h1>Jugadores con mas Goles</h1>
					 <table id="tablaestadisticas">
			            <tr>
			                <th>Nombre</th>
			                <th>Apodo</th>
			                <th>Posicion</th>
			                <th>Goles</th>
			            </tr>
			            <?php $obj = new Jugador();
			            		$obj->mostrarGoles();
			            		$filas = $obj->getRows();
			            	foreach($filas as $jugador){?>
			            	<tr>
			                	<td><?php echo $jugador['Nombre']?></td>
			                	<td><?php echo $jugador['Apodo'] ?></td>
			                	<td><?php echo $jugador['Posicion']; ?></td>
			                	<td><?php echo $jugador['Goles'];?></td>
			            	</tr>
			            <?php	
			            	};
			            ?>
			            
			        </table>


			        <h1>Jugadores con mas Asistencias</h1>
					 <table id="tablaestadisticas">
			            <tr>
			                <th>Nombre</th>
			                <th>Apodo</th>
			                <th>Posicion</th>
			                <th>Asistencias</th>
			            </tr>
			            <?php $obj = new Jugador();
			            		$obj->mostrarAsistencias();
			            		$filas = $obj->getRows();
			            	foreach($filas as $jugador){?>
			            	<tr>
			                	<td><?php echo $jugador['Nombre']?></td>
			                	<td><?php echo $jugador['Apodo'] ?></td>
			                	<td><?php echo $jugador['Posicion']; ?></td>
			                	<td><?php echo $jugador['Asistencias'];?></td>
			            	</tr>
			            <?php	
			            	};
			            ?>
			            
			        </table>


			        <h1>Jugadores con mas Tarjetas</h1>
					 <table id="tablaestadisticas">
			            <tr>
			                <th>Nombre</th>
			                <th>Apodo</th>
			                <th>Posicion</th>
			                <th>Tarjetas</th>
			            </tr>
			            <?php $obj = new Jugador();
			            		$obj->mostrarTarjetas();
			            		$filas = $obj->getRows();
			            	foreach($filas as $jugador){?>
			            	<tr>
			                	<td><?php echo $jugador['Nombre']?></td>
			                	<td><?php echo $jugador['Apodo'] ?></td>
			                	<td><?php echo $jugador['Posicion']; ?></td>
			                	<td><?php echo $jugador['Tarjetas'];?></td>
			            	</tr>
			            <?php	
			            	};
			            ?>
			            
			        </table>

			        <a href="./home.php"><button id="botonvolver">Volver a Menu</button></a>




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