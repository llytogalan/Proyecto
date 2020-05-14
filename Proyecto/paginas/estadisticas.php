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
			            <?php

  							$model = new Conexion();
  							$conexion = $model->conectar();

			            	$sql='SELECT * FROM jugador ORDER BY Goles DESC LIMIT 5';
			            	$resultado=$conexion->prepare($sql);
			            	$resultado->execute();
			            	$total= $resultado->rowCount();

			            	if ($total == 0) {?>

			            		<br><br><p><?php echo "No hay jugadores registrados";?></p>

			            	<?php

			            	} else {

			            		while ($fila = $resultado->fetch()) {
			            	
			            ?>
			             <tr>
			                <td><?php echo $fila['Nombre'] ?></td>
			                <td><?php echo $fila['Apodo'] ?></td>
			                <td><?php echo $fila['Posicion'] ?></td>
			                <td><?php echo $fila['Goles'] ?></td>
			            </tr>

			            <?php }
			             } ?>
			        </table>


			        <h1>Jugadores con mas Asistencias</h1>
					 <table id="tablaestadisticas">
			            <tr>
			                <th>Nombre</th>
			                <th>Apodo</th>
			                <th>Posicion</th>
			                <th>Asistencias</th>
			            </tr>
			            <?php

  							$model = new Conexion();
  							$conexion = $model->conectar();

			            	$sql='SELECT * FROM jugador ORDER BY Asistencias DESC LIMIT 5';
			            	$resultado=$conexion->prepare($sql);
			            	$resultado->execute();
			            	$total= $resultado->rowCount();

			            	if ($total == 0) {?>

			            		<br><br><p><?php echo "No hay jugadores registrados";?></p>

			            	<?php

			            	} else {

			            		while ($fila = $resultado->fetch()) {
			            	
			            ?>
			             <tr>
			                <td><?php echo $fila['Nombre'] ?></td>
			                <td><?php echo $fila['Apodo'] ?></td>
			                <td><?php echo $fila['Posicion'] ?></td>
			                <td><?php echo $fila['Asistencias'] ?></td>
			            </tr>

			            <?php }
			             } ?>
			        </table>


			        <h1>Jugadores con mas Tarjetas</h1>
					 <table id="tablaestadisticas">
			            <tr>
			                <th>Nombre</th>
			                <th>Apodo</th>
			                <th>Posicion</th>
			                <th>Tarjetas</th>
			            </tr>
			            <?php

  							$model = new Conexion();
  							$conexion = $model->conectar();

			            	$sql='SELECT * FROM jugador ORDER BY Tarjetas DESC LIMIT 5';
			            	$resultado=$conexion->prepare($sql);
			            	$resultado->execute();
			            	$total= $resultado->rowCount();

			            	if ($total == 0) {?>

			            		<br><br><p><?php echo "No hay jugadores registrados";?></p>

			            	<?php

			            	} else {

			            		while ($fila = $resultado->fetch()) {
			            	
			            ?>
			             <tr>
			                <td><?php echo $fila['Nombre'] ?></td>
			                <td><?php echo $fila['Apodo'] ?></td>
			                <td><?php echo $fila['Posicion'] ?></td>
			                <td><?php echo $fila['Tarjetas'] ?></td>
			            </tr>

			            <?php }
			             } ?>
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