<?php
session_start(); // Función para iniciar las variables globales
require_once('mysqli_connect.php'); // Conectar a la base de datos

$login = $_POST["login"]; // Guardar lo que se introduce en la página web como variables
$clave = $_POST["clave"];


$sql="SELECT login, idusuario FROM usuario WHERE login='$login' AND clave='$clave'"; //comando de MYSQL
$result = $dbc->query($sql); // Ejecutar comando de MYSQL y guardar el resultado


if($result-> num_rows> 0){ // Si el resultado tiene por lo menos 1 fila

		$row = $result->fetch_array(MYSQLI_NUM); // Guardar el resultado como un array
		$idusuario = $row[1]; // Guardar el id del usuario
		$_SESSION["idusuario"] = $idusuario; // Guardarlo nuevamente como una variable global

		$string = 'C:/wamp64/www/Cloud/Archivos/' . $idusuario;
		$string2 = 'C:/wamp64/www/Cloud/EPS/' . $idusuario;
		$string3 = 'C:/wamp64/www/Cloud/puntos/' . $idusuario;

			if(!is_dir($string) && !is_dir($string2) && !is_dir($string3)){
				mkdir($string);
				mkdir($string2);
				mkdir($string3);
				//echo "El folder de archivos ha sido creado";
					 }
			else{
					//echo "Folders existentes";
					}


		header("Location: ../web.html"); // Redireccionar a web.html

	} else // Si no se ecnuentra nada

	header("Location: ../error.html"); // Redireccionar a error.html


?>
