<!DOCTYPE html>
<html lang="es">
<head>
<title>Personal</title>
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
		require('../Entidades/personal.php');
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

				if (isset($_POST['anadirPersonal'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$sueldo=(isset($_POST['sueldo']))?$_POST['sueldo']:" ";
					$funcion=(isset($_POST['funcion']))?$_POST['funcion']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$personal = new Personal($nombre, $dni, $sueldo, $funcion, $fk_equipo);

				?>
					<!-- Contenido Pagina cuando añada jugadores -->
					<h1><?php echo $personal->anadirPersonal()."<br>"; ?></h1>
					<a href="./registroPersonal.php"><button id="botonvolver">Volver a formulario</button></a>

				<?php
				}elseif (isset($_POST['modificarPersonal'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$sueldo=(isset($_POST['sueldo']))?$_POST['sueldo']:" ";
					$funcion=(isset($_POST['funcion']))?$_POST['funcion']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$personal = new Personal($nombre, $dni, $sueldo, $funcion, $fk_equipo);


				?>
					<!-- Contenido Pagina cuando modifique jugadores -->
					<h1><?php echo $personal->modificarPersonal()."<br>"; ?></h1>
					<a href="./registroPersonal.php"><button id="botonvolver">Volver a formulario</button></a>

				<?php

				}elseif (isset($_POST['buscarPersonal'])) {

					$nombre=(isset($_POST['nombre']))?$_POST['nombre']:" ";
					$dni=(isset($_POST['dni']))?$_POST['dni']:" ";
					$sueldo=(isset($_POST['sueldo']))?$_POST['sueldo']:" ";
					$funcion=(isset($_POST['funcion']))?$_POST['funcion']:" ";
					$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";

					$personal = new Personal($nombre, $dni, $sueldo, $funcion, $fk_equipo);

					echo $personal->buscarPersonal();
					
				?>
					<!-- Contenido Pagina cuando busque jugadores -->
					<h1>Busqueda de Personal de <?php echo $_SESSION['nombre'] ?></h1>
					<table id="tablabusquedas" >
						<tr>
							<th>IdPersonal:</th>
							<td><?php echo $personal->getIdPersonal(); ?></td>
						</tr>
						<tr>
							<th>Nombre:</th>
							<td><?php echo $personal->getNombre(); ?></td>
						</tr>
						<tr>
							<th>Dni:</th>
							<td><?php echo $personal->getDni(); ?></td>
						</tr>
						<tr>
							<th>Sueldo:</th>
							<td><?php echo $personal->getSueldo(); ?></td>
						</tr>
						<tr>
							<th>Funcion:</th>
							<td><?php echo $personal->getFuncion(); ?></td>
						</tr>
						<tr>
							<th>Fecha Alta:</th>
							<td><?php echo $personal->getFechaAlt(); ?></td>
						</tr>
					</table>

					<a href="./registroPersonal.php"><button id="botonvolver">Volver a formulario</button></a>


				<?php

				}elseif (isset($_POST['mostrarTodos'])) {

				?>
					<!-- Contenido Pagina cuando busque todos los jugadores -->
					<h1>Personal de <?php echo $_SESSION['nombre'] ?></h1>
					 <table id="tablaresultado">
			            <tr>
			                <th>IdPersonal</th>
			                <th>Nombre</th>
			                <th>Dni</th>
			                <th>Sueldo</th>
			                <th>Funcion</th>
			                <th>Fecha Alta</th>
			            </tr>
			            <?php

  							$model = new Conexion();
  							$conexion = $model->conectar();
  							$fk_equipo=(isset($_SESSION['idEquipo']))?$_SESSION['idEquipo']:" ";
			            	$sql="SELECT * FROM personal WHERE FK_IdEquipo = :fk_equipo;";
			            	$resultado=$conexion->prepare($sql);
			            	$resultado->bindParam(":fk_equipo", $fk_equipo );
			            	$resultado->execute();
			            	$total= $resultado->rowCount();

			            	if ($total == 0) {?>

			            		<br><br><p><?php echo "No hay Personal registrados";?></p>

			            	<?php

			            	} else {

			            		while ($fila = $resultado->fetch()) {
			            	
			            ?>
			             <tr>
			                <td><?php echo $fila['PK_IdPersonal'] ?></td>
			                <td><?php echo $fila['Nombre'] ?></td>
			                <td><?php echo $fila['Dni'] ?></td>
			                <td><?php echo $fila['Sueldo'] ?></td>	
			                <td><?php echo $fila['Funcion'] ?></td>			                
			                <td><?php echo $fila['FechaAlt'] ?></td>
			            </tr>

			            <?php } }?>
			        </table>

			        <a href="./registroPersonal.php"><button id="botonvolver">Volver a formulario</button></a>
 
				<?php

				}else {?>

					<!--Contenido Pagina cuando no haya echo aun nada -->
					<h1>Formulario de Registro de Personal de <?php echo $_SESSION['nombre'] ?></h1>

					<form id="formulario" action="./registroPersonal.php" method="POST" name="formularioRegistroPersonal" >

						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" placeholder="Introduce nombre" />

						<label for="dni">DNI*</label>
						<input type="text" name="dni" id="dni" placeholder="Introduce el Dni" required/>

						<hr style="border-color:black;">

						<label for="sueldo">Sueldo</label>
						<input type="text" name="sueldo" id="sueldo" placeholder="Introduce sueldo"  />

						<label for="funcion">Funcion</label>
						<select name="funcion">
							<option default> </option>
							<option>Utillero</option>
							<option>Fisioterapeuta</option>
							<option>Preparador</option>
							<option>Psicologo</option>
							<option>Director Deportivo</option>
						</select>
						
						<input type="submit" name="anadirPersonal" value="Añadir Personal"/>


			    		<input type="submit" name="modificarPersonal" value="Modificar Personal" />


			    		<input type="submit" name="buscarPersonal" value="Buscar Personal"/>

						<input type="reset" value="Reset"/>

					</form>

					<form id="formulario2" action="./registroPersonal.php" method="POST">
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