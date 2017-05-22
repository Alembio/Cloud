<?php

$dbc = new mysqli("localhost","root","","proyecto"); //Guardo la conección a la base de datos MYSQL como una variable

if ($dbc->connect_error) //Si la concección tiene un error
{
  die("Error: " . $dbc->connect_error); //Imprime el error
}
else{ //Si no, no hagas nada

}

?>
