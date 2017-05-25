<?php

if($_POST){ //Si elusuario ingresa información
$file = $_POST['nombre']; //Archivo seleccionado

$edit = '../Archivos/' . $file . '.txt' ; //PATH  del archivo
$write = $_POST['editar']; //Lo que el usuairo escribe en text area


file_put_contents($edit, $write); //Crea o edita el archivo (PATH, LO QUE QUIERES ESCRIBIR)

header("Location: ../preview.html"); //Redireccionar a preview.html
}
?>
