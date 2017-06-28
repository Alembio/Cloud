<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>

<body>
	<div class="container">

				<header>

							</header>
				<div  class="form">
					<form id="contactform">
						<p class="contact"><label for="nombre">Nombre</label></p>
						<input id="name" name="name" placeholder="Nombre y Apellido" required="" tabindex="1" type="text">

						<p class="contact"><label for="email">Email</label></p>
						<input id="email" name="email" placeholder="example@domain.com" required="" type="email">

									<p class="contact"><label for="usuario">Usuario</label></p>
						<input id="usuario" name="usuario" placeholder="usuario" required="" tabindex="2" type="text">

									<p class="contact"><label for="password">Contrasena</label></p>
						<input type="password" id="password" name="clave" required="">
									<p class="contact"><label for="clave2">Confirmar contrasena</label></p>
						<input type="password" id="repassword" name="clave2" required="">


							<input class="buttom" name="submit" id="submit" tabindex="5" value="Registrar" type="submit">
		 </form>
	</div>
	</div>

<?php

session_start(); // Iniciar función de variables globales
require_once('mysqli_connect.php'); // Conetar a la base de datos

  if($_POST){

    $nombre = $_POST['nombre'];
    $login = $_POST['login'];
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];
    $email = $_POST['email'];

      if($clave != $clave2){

        echo "<p>No concuerdan las contraseñas</p>";
        echo "<a href=\"#\"><button>Reintentar</button></a>";

        } else if($clave = $clave2){

          $sql = "INSERT INTO Usuario(nombre,login,clave,email) VALUES('$nombre', '$login','$clave','$email')"; //Insertar en la base de datos datos del nuevo usuario

            if($dbc->query($sql) === TRUE){ // Si se ejecuta el comando de MYSQL

              header("Location: ../index.html"); //Redireccionar a preview.html

            } else{

              echo 'Error ' . $sql . ' ' . $dbc->connect_error; // Imprimir error
              echo "<a href=\"#\"><button>Reintentar</button></a></br>";

            }
        }

      }
  ?>
</body>
</html>
