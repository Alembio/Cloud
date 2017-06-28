<?php
session_start(); // Iniciar la función de variables globales
require_once('mysqli_connect.php'); // Conetar a la base de datos

$idusuario = $_SESSION["idusuario"];

if($_POST){ // Si es que el usuario utiliza el "form"
$filename = $_FILES['file']['name']; // Guarda los datos del archivo como variables
$filetmp_name = $_FILES['file']['tmp_name'];
$file_error = $_FILES['file']['error'];

$parts = explode('.' , $filename); // Separar el nombre en un arreglo a partir el '.'
$nombre = $parts[0]; // Guardar solo lo que esta antes del punto en una variable

$dir = 'C:/wamp64/www/Cloud/Archivos/' . $idusuario . '/'; // Dirección donde queremos que se guarde el archivo
$file = $dir . basename($nombre) . '.txt'; // Dirección donde queremos que se guarde + el nombre del archivo


if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) { // Copiar el archivo a la dirección que se puso previamente
    //echo 'El fichero es válido y se subió con éxito' . ' ';
} else {
   //echo "¡Posible ataque de subida de ficheros!";
}

$sql2 = "INSERT INTO Archivos (nombre, Usuario_idusuario) VALUES('$nombre', '$idusuario')"; // Comando de insertar de MYSQL

$string = 'C:\\Python27\\python.exe C:\\wamp64\\www\\Cloud\\python\\main.py' . ' ' . $filename . ' ' . $idusuario . ' 2>&1';  // Path de python, Path del script de pyton, argumento
//echo $string . ' ';
$result = shell_exec($string); // Ejecutar script de python

$_SESSION["filename"] = $filename;

if($dbc->query($sql2) === TRUE){ // Si se ejecuta e comando de MYSQL
  header("Location: ../preview.php"); //Redireccionar a preview.html
} else{
  echo 'Error ' . $sql2 . ' ' . $dbc->connect_error; // IMprimir error
}

$dbc->close(); // Cerrar base de datos
}


?>
