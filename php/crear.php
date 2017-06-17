<?php
session_start(); // Iniciar función de variables globales
require_once('mysqli_connect.php'); // Conetar a la base de datos

$idusuario = $_SESSION["idusuario"];

$newfile = $_POST['filename']; //Archivo seleccionado

$edit = '../Archivos/' . $idusuario .  '/' . $newfile . '.txt'; //PATH  del archivo
$write = $_POST['editar']; //Lo que el usuairo escribe en text area


file_put_contents($edit, $write); //Crea o edita el archivo (PATH, LO QUE QUIERES ESCRIBIR)

$sql2 = "INSERT INTO Archivos (nombre, Usuario_idusuario) VALUES('$newfile', '$idusuario')"; //Insertar en la base de datos el nombre del nuevo archivo

$filename = $newfile . '.txt'; // Agregarle al nombre .txt al final
$string = 'C:\\Python27\\python.exe C:\\wamp64\\www\\proyecto-mysql\\python\\main.py' . ' ' . $filename . ' ' . $idusuario . ' 2>&1'; // Path de python, Path del script de pyton, argumento
echo $string . ' ';
$result = shell_exec($string); // Ejecutar script de python

if($dbc->query($sql2) === TRUE){ // Si se ejecuta el comando de MYSQL
  header("Location: ../preview.html"); //Redireccionar a preview.html
} else{
  echo 'Error ' . $sql2 . ' ' . $dbc->connect_error; // Imprimir error
}
$dbc->close(); // Cerrar base de datos

?>
