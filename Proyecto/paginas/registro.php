<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Resgistro de Equipos</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Un formulario sirve para enviar datos a otra página que los recoge para usarlos o almacenarlos."/>
	<link rel="stylesheet" href="../main.css" />
</head>
<body>
  <div id="header">
    <img src="../img/logo-blanco-grande.png" alt="logo-pagina">
    <div id="botonesInicioSesion">
      <a href="../index.php"><button class="iniciosesion">Volver</button></a>
    </div>
  </div>
  <div id="main">

  	<?php

  	require('../Entidades/equipo.php');

  			if (isset($_POST['enviar'])) {


  				$equipo= new Equipo();
  				$equipo->setNombre($_POST['nombre']);
  				$equipo->setPassword(md5($_POST['password']));
  				$equipo->setLocalidad($_POST['localidad']);
  				$equipo->setDivision($_POST['division']);
  				$equipo->setGrupo($_POST['grupo']);?>
 				<b><?php echo $equipo->insertarEquipo()."<br>"; ?></b>
 				<?php $equipo->obtenerId();?>

 				<p>Este es su username para el inicio de sesion = <b style="color : red;"><?php echo $equipo->getIdEquipo() ?></b></p>
 				
 				<p>No pierda esta infomacion que proporcionamos debido a que si lo pierde no podra iniciar sesion.<br>
 					Dirijase a la pantalla de inicio e inicia sesion para acceder a todas nuestras funcionalidades.<br>
 				Un Saludo y disfrute. El equipo de Administramos de FUTMO.</p>

	<?php 
  			} else { 			

  	?>


  	<h1 id="tituloFormulario">Formulario de Registro de Equipos</h1>
    <form action="registro.php" method="POST" name="formularioRegistroEquipo">

	<label for="nombre">Nombre*</label>
	<input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" required />

	<label for="password">Contraseña*</label>
	<input type="password" name="password" id="password" placeholder="Escribe tu Contraseña" required/>

	<label for="email" />Email*</label>
	<input type="email" name="email" id="email" placeholder="pedro@pedro.com" required />

	<label for="telefono">Telefono*</label>
	<input type="text" name="telefono" id="telefono" placeholder="Escribe tu telefono" required/>

	<label for="localidad">Localidad*</label>
	<input type="text" name="localidad" id="localidad" placeholder="Escribe tu localidad" required />

	<hr style="border-color:black;">

	<label for="division" required>Division*</label>
	<?php $division = array(" ", "3", "Division de Honor", "1 Andaluza", "2 Andaluza");?>
	<select name="division">
		<?php foreach ($division as $liga) {?>
			<option><?php echo $liga ?></option>
	<?php
			}
	?>
	</select>

	<label for="grupo">Grupo*</label>
	<select name="grupo">
		<?php for ($i=1;$i<11;$i++) {?>
			<option><?php echo $i ?></option>
	<?php
			}
	?>
	</select>

	<label><input type="checkbox" id="condiciones" value="condiciones" required >Aceptas nuestras politicas de privacidad</label><br>
	
	
	<input type="submit" name="enviar" value="Enviar datos"/>
	<input type="reset" value="Reset"/>
</form>
  </div>
<?php
  			}
?>
</body>
</html>
