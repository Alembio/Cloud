<?php
session_start(); //Iniciar la función de variables globales
require_once('mysqli_connect.php'); //Conetar a la base de datos

$idusuario = $_SESSION["idusuario"]; //guardar la variable global como idusuario

if($_POST){ //Si es que el usuario utiliza el "form"
$filename = $_FILES['file']['name']; //Guarda los datos del archivo como variables
$filetype = $_FILES['file']['type'];
$filesize = $_FILES['file']['size'];
$filetmp_name = $_FILES['file']['tmp_name'];
$file_error = $_FILES['file']['error'];

$dir = 'C:\\wamp64\\www\\\proyecto-mysql\\Archivos\\'; //Dirección donde queremos que se guarde el archivo
$file = $dir . basename($filename); //Dirección donde queremos que se guarde + el nombre del archivo


echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) { //Copiar el archivo a la dirección que se puso previamente
    echo "El fichero es válido y se subió con éxito.\n";
} else {
   echo "¡Posible ataque de subida de ficheros!\n";
}

$sql2 = "INSERT INTO Archivos (name, type, size, Usuario_idusuario) VALUES('$filename', '$filetype', $filesize, '$idusuario')"; //Comando de insertar de MYSQL

if($dbc->query($sql2) === TRUE){ //Ejecutar comando de insertar
  header("Location: ../preview.html"); //Si no hay error, redireccionar a preview.html
} else{
  echo 'Error ' . $sql2 . ' ' . $dbc->connect_error; //Si hay error, imprime el error
}
$dbc->close(); //Cerrar la conexión con la base de datos
}


?>
