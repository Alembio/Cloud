<?php
session_start();
require_once('mysqli_connect.php');

$login = $_POST["login"];
$clave = $_POST["clave"];


$sql="SELECT login, idusuario FROM usuario WHERE login='$login' AND clave='$clave'";
$result = $dbc->query($sql);


if($result-> num_rows> 0){

		$row = $result->fetch_array(MYSQLI_NUM);
		$idusuario = $row[1];
		$_SESSION["idusuario"] = $idusuario;

		header("Location: ../web.html");

	} else

	header("Location: ../error.html");


?>
