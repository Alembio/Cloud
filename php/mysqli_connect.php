<?php

$dbc = new mysqli("localhost","root","","proyecto");

if ($dbc->connect_error)
{
  die("Error: " . $dbc->connect_error);
}
else{

}

?>
