<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="web.html">

    <img src="img/logo.png" width="200" height="80" class="logo" style="margin-top: 15mm;margin-bottom: 2cm;">


                    </a>
                </li>



                <li style="margin-top: 25mm;">
                    <a href="ayuda.html">Ayuda</a>
                </li>
                <li>
                    <a href="about.html">Acerca de</a>
                </li>

                <li>
                    <a href="archivos.php">Mis archivos</a>
                </li>
                <li>
                  <a href="index.html">Logout</a>
                </li>


            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

          <!--Poner todo el contenido entre estos 2 tags @ -->
          <?php
          session_start(); //Iniciar función de variables globales
          require_once('php/mysqli_connect.php'); //Concetar a la base de datos
          $idusuario = $_SESSION["idusuario"];
          ?>


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
              margin: 10px 150px 20px 150px; /*top right bottom left*/
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
              margin-left: 150px;


          }
          </style>
          </head>

          <body>


          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Subir')">Subir</button>
            <button class="tablinks" onclick="openCity(event, 'Seleccionar')" id="defaultOpen">Seleccionar</button>
            <button class="tablinks" onclick="openCity(event, 'Nuevo')">Nuevo</button>
              <button class="tablinks" onclick="openCity(event, 'Editar')">Editar</button>


          </div>

          <div id="Subir" class="tabcontent">
            <h3>Subir</h3>
          </br>
            <form action="php/upload.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
              <input type="file" name="file">
            </br>
                <input type="submit" name="submit" value="Subir">
          </form>
          </div>

          <div id="Seleccionar" class="tabcontent">
            <form method="post">
            <input class="inputsearch" type="text" name="nombre" placeholder="Buscar..">
            <input type="submit" name="submit" value="Buscar">
            <h3>Seleccionar</h3>

            <?php
            if($_POST): //Si se utiliza el boton buscar
              $nombre = $_POST['nombre'];
              $sql2 = "SELECT nombre, idarchivos FROM Archivos WHERE Usuario_idusuario = $idusuario and nombre LIKE '%$nombre%'"; //Función MYSQL
              $result2 = $dbc->query($sql2); //Ejecutar función en la base de datos
          $i = 0;
          $arreglo2 = array();
          if($result2-> num_rows> 0):
          ?>
          <table>

          <?php while($row = $result2->fetch_array(MYSQLI_ASSOC)): //Por cada registro encontrado, guardar los datos buscados en el arreglo row?>

              <tr>
              <td><a href="php/buscar.php?nombre=<?php echo $row['nombre']?>"><?php echo $row['nombre']?></a></td> <!--Imprime cada archivo existente en la base de datos-->
              <td><a href="php/eliminar.php?id=<?php echo $row['idarchivos']?>">Borrar</td> <!--Guardar el id en un arreglo-->
              </tr>

          <?php endwhile;
                endif;
              endif; //Cerrar los loops?>

          </table>
          </form>

          </br>
            <button class="tablinks" onclick="openCity(event, 'Nuevo')">Nuevo</button>
          </div>

          <div id="Nuevo" class="tabcontent">
            <h3>Nuevo</h3>
                <form action="php/crear.php" method="post">
                  Nombre del nuevo archivo:</br>
                  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                  <input type="text" name="filename" pattern="[^'\x22\x20]+" title="No utilices espacios">
                </br>
                  Escribe o pega el texto que quieras imprimir

                <br></br>
                  <textarea class="inputtext" name="editar" rows ="4" cols="100"></textarea>
                  <br></br>
                  <input type="submit" name="submit" value="Crear">
              </form>
          </div>
          <div id="Editar" class="tabcontent">
            <h3>Editar</h3>
              <form action="php/editar.php" method="post" >
                Selecciona el archivo que quieras editar</br>
                <select class="inputselect" name="nombre">
              <?php

              $sql = "SELECT * FROM Archivos where Usuario_idusuario = $idusuario"; //Función de MYSQL
              $result = $dbc->query($sql); //Ejecutar función de MYSQL
              $arreglo = array();
              $i = 0;
              while($row = $result->fetch_array(MYSQLI_ASSOC)){ //Mientras se encutentren datos
              $arreglo[$i] = $row["nombre"]; //Guardalos en un array
              $i ++;
              }

              echo "<option>...</option>";
              foreach($arreglo as $v){
              echo "<option value=". $v. ">". $v . "</option>"; //Imprime cada dato del array en formato de opciones
            }
              ?>
            </select>
          </br>
            Escribe o pega el texto que quieras imprimir
          <br></br>
                <textarea class="inputtext" name="editar" rows ="4" cols="100"></textarea>
                <br></br>
                <input type="submit" name="submit" value="Guardar">
            </form>
          </div>

          <script>
          document.getElementById("defaultOpen").click();
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



          <!--Poner todo el contenido entre estos 2 tags @-->



            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle" style = "margin-left: 140px; margin-top: 30px">Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
