<?php
session_start(); // Iniciar función de variables globales
require_once('mysqli_connect.php'); // Conetar a la base de datos

$idusuario = $_SESSION["idusuario"];

if($_POST){ //Si elusuario ingresa información
$file = $_POST['nombre']; //Archivo seleccionado

$edit = '../Archivos/' . $idusuario . '/' . $file . '.txt' ; //PATH  del archivo
$write = $_POST['editar']; //Lo que el usuairo escribe en text area

echo $file;

file_put_contents($edit, $write); //Crea o edita el archivo (PATH, LO QUE QUIERES ESCRIBIR)


$filename = $file . '.txt'; //Agregar .txt al nombre del archivo
$string = 'C:\\Python27\\python.exe C:\\wamp64\\www\\Cloud\\python\\main.py' . ' ' . $filename . ' ' . $idusuario . ' 2>&1'; // Path de python, Path del script de pyton, argumento
//echo $string . ' ';
$result = shell_exec($string); // Ejecutar script de python

$_SESSION["filename"] = $filename;

header("Location: ../preview.php"); //Redireccionar a preview.html
}
?>
