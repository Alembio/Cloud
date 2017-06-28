<?php
session_start(); // Iniciar función de variables globales

$idusuario = $_SESSION["idusuario"];

if  ($_GET) {
        $nombre = $_GET;
        $nnombre = implode($nombre); //convertir el array en un string

        $nfile = $nnombre . '.txt';

        $_SESSION['filename'] = $nfile;

header("Location: ../preview.php"); // Redireccionar a web.html


      }
?>
