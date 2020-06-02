<!DOCTYPE html>
<html lang="es">
<head>
<title>Socios</title>
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
		require('../Entidades/socio.php');
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

				if (isset($_POST['anadirSocio'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$cuota=(isset($_POST['cuota']))?$_POST['cuota']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$socio = new Socio($nombre, $dni, $cuota);
					$socio->setFK_idEquipo($fk_equipo);

				?>
					<!-- Contenido Pagina cuando añada socios -->
					<h1><?php echo $socio->anadirSocio()."<br>"; ?></h1>
					<a href="./registroSocios.php"><button id="botonvolver">Volver a formulario</button></a>

				<?php

				}elseif (isset($_POST['eliminarSocio'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$cuota=(isset($_POST['cuota']))?$_POST['cuota']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$socio = new Socio($nombre, $dni, $cuota);
					$socio->setFK_idEquipo($fk_equipo);

				?>
					<!-- Contenido Pagina cuando elimine socios -->
					<h1><?php echo $socio->eliminarSocio()."<br>"; ?></h1>
					<a href="./registroSocios.php"><button id="botonvolver">Volver a formulario</button></a>


				<?php
				}elseif (isset($_POST['modificarSocio'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$cuota=(isset($_POST['cuota']))?$_POST['cuota']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$socio = new Socio($nombre, $dni, $cuota);
					$socio->setFK_idEquipo($fk_equipo);


				?>
					<!-- Contenido Pagina cuando modifique socios -->
					<h1><?php echo $socio->modificarSocio()."<br>"; ?></h1>
					<table id="tablabusquedas" >
						<tr>
							<th>Nombre:</th>
							<td><?php echo $socio->getNombre(); ?></td>
						</tr>
						<tr>
							<th>Dni:</th>
							<td><?php echo $socio->getDni(); ?></td>
						</tr>
						<tr>
							<th>Cuota:</th>
							<td><?php echo $socio->getCuota(); ?></td>
						</tr>
					</table>

					<a href="./registroSocios.php"><button id="botonvolver">Volver a formulario</button></a>

				<?php

				}elseif (isset($_POST['buscarSocio'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$cuota=(isset($_POST['cuota']))?$_POST['cuota']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$fila=Socio::buscarSocio($dni,$fk_equipo);
					
				?>
					<!-- Contenido Pagina cuando busque socios -->
					<h1>Busqueda de Socios de <?php echo $_SESSION['nombre'] ?></h1>
					<table id="tablabusquedas" >
						<tr>
							<th>IdSocio:</th>
							<td><?php echo $fila['PK_IdSocio']; ?></td>
						</tr>
						<tr>
							<th>Nombre:</th>
							<td><?php echo $fila['Nombre']; ?></td>
						</tr>
						<tr>
							<th>Dni:</th>
							<td><?php echo $fila['Dni'] ?></td>
						</tr>
						<tr>
							<th>Cuota:</th>
							<td><?php echo $fila['Cuota'] ?></td>
						</tr>
						<tr>
							<th>Fecha Alta:</th>
							<td><?php echo $fila['FechaAlt']; ?></td>
						</tr>
					</table>

					<a href="./registroSocios.php"><button id="botonvolver">Volver a formulario</button></a>


				<?php

				}elseif (isset($_POST['mostrarTodos'])) {

				?>
					<!-- Contenido Pagina cuando busque todos los socios -->
					<h1>Socios de <?php echo $_SESSION['nombre'] ?></h1>
					 <table id="tablaresultado">
			            <tr>
			                <th>IdSocio</th>
			                <th>Nombre</th>
			                <th>Dni</th>
			                <th>Cuota</th>
			                <th>Fecha Alta</th>
			            </tr>
			            <?php

  							$model = new Conexion();
  							$conexion = $model->conectar();
  							$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";
			            	$sql="SELECT * FROM socio WHERE FK_IdEquipo = :fk_equipo;";
			            	$resultado=$conexion->prepare($sql);
			            	$resultado->bindParam(":fk_equipo", $fk_equipo );
			            	$resultado->execute();
			            	$total= $resultado->rowCount();

			            	if ($total == 0) {?>

			            		<br><br><p><?php echo "No hay socios registrados";?></p>

			            	<?php

			            	} else {

			            		while ($fila = $resultado->fetch()) {
			            	
			            ?>
			             <tr>
			                <td><?php echo $fila['PK_IdSocio'] ?></td>
			                <td><?php echo $fila['Nombre'] ?></td>
			                <td><?php echo $fila['Dni'] ?></td>
			                <td><?php echo $fila['Cuota'] ?></td>			                
			                <td><?php echo $fila['FechaAlt'] ?></td>
			            </tr>

			            <?php } }?>
			        </table>

			        <a href="./registroSocios.php"><button id="botonvolver">Volver a formulario</button></a>
 
				<?php

				}else {?>

					<!--Contenido Pagina cuando no haya echo aun nada -->
					<h1>Formulario de Registro de Socios de <?php echo $_SESSION['nombre'] ?></h1>

					<form id="formulario" action="./registroSocios.php" method="POST" name="formularioRegistroSocios" >

						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" placeholder="Introduce nombre" />

						<label for="dni">DNI*</label>
						<input type="text" name="dni" id="dni" placeholder="Introduce el Dni" required/>

						<hr style="border-color:black;">

						<label for="cuota">Cuota</label>
						<input type="text" name="cuota" id="cuota" placeholder="Introduce cuota"  />

						
						
						<input type="submit" name="anadirSocio" value="Añadir Socio"/>


			    		<input type="submit" name="modificarSocio" value="Modificar Socio" />


			    		<input type="submit" name="buscarSocio" value="Buscar Socio"/>

			    		<input type="submit" name="eliminarSocio" value="Eliminar Socio"/>

						<input type="reset" value="Reset"/>

					</form>

					<form id="formulario2" action="./registroSocios.php" method="POST">
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