
<!DOCTYPE html>
<html lang="es">
<head>
<title>Inicio</title>
<meta charset="utf-8" />
<meta name="description" content="futbol,tercera,segunda,estadisticas,entrenadores,gestion">
<link rel="stylesheet" href="../main.css" />
</head>
 
<body>
  <div id="header">
    <img src="../img/logo-blanco-grande.png" alt="logo-pagina" >
    <div id="botonesInicioSesion">
      <a href="../index.php"><button class="iniciosesion">Volver</button></a>
    </div>
  </div>
  <div id="main">

    <?php

      require ('../Entidades/equipo.php');

        if (isset($_POST['iniciosesion'])) {

            $equipo= new Equipo();
            $equipo->setIdEquipo($_POST['IdEquipo']);
            $equipo->setPassword(md5($_POST['password']));

            echo $equipo->login();


        } else {?>

            <form action="./login.php" method="POST">

              <label for="IdEquipo">Username</label>
              <input type="text" name="IdEquipo" id="IdEquipo" placeholder="Escribe tu Id de equipo"/>

              <label for="password">Contraseña</label>
              <input type="password" name="password" id="password" placeholder="Escribe tu Contraseña" /> 
              <input type="submit" name="iniciosesion" value="Iniciar Sesion" />
            </form>
              </div>
  <?php
        }
  ?>
</body>
</html>


