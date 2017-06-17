<?php
session_start(); // Iniciar función de variables globales
require_once('mysqli_connect.php'); // Conetar a la base de datos

$idusuario = $_SESSION["idusuario"];

if  ($_GET) {
        $id = $_GET;
        $idd = implode($id); //convertir el array en un string

        $sql4 = "SELECT nombre FROM Archivos WHERE idarchivos = $idd and Usuario_idusuario = $idusuario"; //Función de MYSQL
        $result = $dbc->query($sql4); //Ejecutar función de MYSQL

        $i = 0;
        $arreglo = array();

        while($row = $result->fetch_array(MYSQLI_ASSOC)){ //Mientras se encutentren datos
        $arreglo[$i] = $row["nombre"]; //Guardalos en un array
        $i ++;
        }

        $file = implode($arreglo);//Convertir el array en string

        $delete = 'C:/wamp64/www/Cloud/Archivos/' . $idusuario .  '/' . $file . '.txt';
        unlink($delete);

        $delete2 = 'C:/wamp64/www/Cloud/EPS/' . $idusuario .  '/' . $file . '_img.eps';
        unlink($delete2);

        $delete3 = 'C:/wamp64/www/Cloud/puntos/' . $idusuario .  '/' . $file . '_puntos.txt';
        unlink($delete3);

        $sql3 = "DELETE FROM Archivos WHERE idarchivos = $idd and Usuario_idusuario = $idusuario"; //Función de MYSQL
        $dbc->query($sql3); //Ejecutar función en la base de datos

        header("Location: ../archivos.php"); //Redireccionar a archivos.php
    }


?>
