<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
</head>

<body>
		<form method="post">
			  <table>
          <tr>
  			  	<td align="left">Nombre:</td>
  					<td>&#160</td>
  					<td align="center"><input type="text" name="nombre"></td>

  			  </tr>
			  <tr>
			  	<td align="left">Usuario:</td>
					<td>&#160</td>
					<td align="center"><input type="text" name="login"></td>
			  </tr>
        <tr>
			  	<td align="left">E-mail:</td>
					<td>&#160</td>
					<td align="center"><input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="El email que ingreso no existe"></td>
			  </tr>
			  <tr>
			  	<td align="left">Contrasena:</td>
					<td>&#160</td>
					<td align="center"><input type="password" name="clave"></td>
			  </tr>
        <tr>
			  	<td align="left">Repetir contrasena:</td>
					<td>&#160</td>
					<td align="center"><input type="password" name="clave2"></td>
			  </tr>
			  <tr>
					<td>&#160</td>
			    <td colspan="2" align="center"><input type="submit" name="submit" value="Registrar"></td>
			  </tr>
			</table>
			</from>

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
