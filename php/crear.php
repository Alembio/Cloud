<?php
session_start(); //Iniciar función de varibales globales
require_once('mysqli_connect.php'); //Conectar a la base de datos

$idusuario = $_SESSION["idusuario"]; //Variable global del id de usuario

$newfile = $_POST['filename']; //Archivo seleccionado

$edit = '../Archivos/' . $newfile . '.txt'; //PATH  del archivo
$write = $_POST['editar']; //Lo que el usuairo escribe en text area


file_put_contents($edit, $write); //Crea o edita el archivo (PATH, LO QUE QUIERES ESCRIBIR)

$sql2 = "INSERT INTO Archivos (nombre, Usuario_idusuario) VALUES('$newfile', '$idusuario')"; //Insertar en la base de datos el nombre del nuevo archivo

if($dbc->query($sql2) === TRUE){ //Si se registraron los datos

  header("Location: ../preview.html"); //Redireccionar a preview.html

} else{

  echo 'Error ' . $sql2 . ' ' . $dbc->connect_error; //Si no, imprimir un error
}
$dbc->close();

?>
