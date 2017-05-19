<?php

require_once('mysqli_connect.php');

	$login = $_POST["login"];
	$clave = $_POST["clave"];

	$sql="SELECT login FROM usuario WHERE login='$login' AND clave='$clave'";

	$result = $dbc->query($sql);

	if($result-> num_rows> 0){
		while ($row=$result->fetch_assoc()) {

			header("Location: ../web.html");

		}
	} else

	header("Location: ../error.html");


mysqli_close($dbc);

?>
