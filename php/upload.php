<?php
session_start();
require_once('mysqli_connect.php');

$idusuario = $_SESSION["idusuario"];

if($_POST){
$filename = $_FILES['file']['name'];
$filetype = $_FILES['file']['type'];
$filesize = $_FILES['file']['size'];
$filetmp_name = $_FILES['file']['tmp_name'];
$file_error = $_FILES['file']['error'];

$dir = 'C:\\wamp64\\www\\\proyecto-mysql\\Archivos\\';
$file = $dir . basename($filename);


echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
   echo "¡Posible ataque de subida de ficheros!\n";
}

$sql2 = "INSERT INTO Archivos (name, type, size, Usuario_idusuario) VALUES('$filename', '$filetype', $filesize, '$idusuario')";

if($dbc->query($sql2) === TRUE){
  header("Location: ../preview.html");
} else{
  echo 'Error ' . $sql2 . ' ' . $dbc->connect_error;
}
$dbc->close();
}


?>
