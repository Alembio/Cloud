<?php
session_start();
require_once('php/mysqli_connect.php');

$idusuario = $_SESSION["idusuario"];

$sql = "SELECT * FROM Archivos where Usuario_idusuario = $idusuario";
$result = $dbc->query($sql);

$arreglo = array();
$i = 0;


while($row = $result->fetch_array(MYSQLI_ASSOC)){
$arreglo[$i] = $row["nombre"];
$i ++;
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Mis Archivos</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style>
h1 {text-align:center;}
body {font-family: "Lato", sans-serif;}
/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    margin: 10px 150px 20px 450px; /*top right bottom left*/
}
/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}
/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}
/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}
/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: 1px solid #ccc;
		margin-right: 150px;
		margin-left: 450px;
<<<<<<< HEAD
<<<<<<< HEAD
    height: 50em
=======
		margin-left: 300px;
>>>>>>> parent of a006cb6... Cambie el margin de tabcontent
=======
		margin: 10px 150px 20px 450px;
>>>>>>> parent of 3add4d1... Abominacion
}
</style>
</head>

<body>

<div id="sidebar">
	<img src="img/logo.jpg" class="sideimg">
<ul>
<li style="border-top: 1px solid black";><a href="web.html">Inicio</a></li>
<li><a href="ayuda.html">Ayuda</a></li>
<li><a href="about.html">Acerca de</a></li>
<li><a href="imprimir.html">Imprimir</a></li>
<li><a href="archivos.html">Mis Arhivos</a></li>
</ul>
</div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Subir')">Subir</button>
  <button class="tablinks" onclick="openCity(event, 'Seleccionar')">Seleccionar</button>
  <button class="tablinks" onclick="openCity(event, 'Nuevo')">Nuevo</button>
		<button class="tablinks" onclick="openCity(event, 'Editar')">Editar</button>


</div>

<div id="Subir" class="tabcontent">
  <h3>Subir</h3>
	<form action="php/upload.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
		<input type="file" name="file">
			<input type="submit" name="submit" value="Subir">
</form>
</div>

<div id="Seleccionar" class="tabcontent">
	<input class="inputsearch" type="text" name="search" placeholder="Buscar..">
  <h3>Seleccionar</h3>
  <h4>Seleccionar el archivo de la cosa</h4>
	<button class="tablinks" onclick="openCity(event, 'Nuevo')">Nuevo</button>
</div>

<div id="Nuevo" class="tabcontent">
  <h3>Nuevo</h3>
			<form action="php/crear.php" method="post">
				Nombre del nuevo archivo:</br>
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<input type="text" name="filename">
			</br>
				Escribe o pega el texto que quieras imprimir
				<textarea class="inputtext" name="editar"></textarea>
				<input type="submit" name="submit" value="Crear">
		</form>
</div>
<div id="Editar" class="tabcontent">
  <h3>Editar</h3>
		<form action="php/editar.php" method="post">
			Selecciona el archivo que quieras editar</br>
			<select class="inputselect" id="country" name="nombre">
		<?php
		echo "<option>...</option>";
		foreach($arreglo as $v){
		echo "<option value=". $v. ">". $v . "</option>";
	}
		?>
  </select>
</br>
	Escribe o pega el texto que quieras imprimir
			<textarea class="inputtext" name="editar"></textarea>
			<input type="submit" name="submit" value="Guardar">
	</form>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

</body>
</html>
