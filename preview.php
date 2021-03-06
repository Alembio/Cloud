<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BR3G - Preview</title>

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
                  <img src="img/logo.png" width="200" height="80" class="logo" style="margin-top: 15mm;margin-bottom: 2cm;">
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



          <!--Poner todo el contenido entre estos 2 tags @-->



            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                    </div>
                </div>
            </div>


            <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <style>
        .image {
   position: relative;
   width: 100%; /* for IE 6 */
}

p {
   position: absolute;
   top: 10px;
   left: 10px;
   width: 100%;
}</style>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Preview
                    <small>Vista Previa</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <?php

        session_start();
        $idusuario = $_SESSION["idusuario"];
        $nfile = $_SESSION["filename"];
        $file = 'C:/wamp64/www/Cloud/Archivos/' . $idusuario . '/' . $nfile;
        $document = file_get_contents($file);

         ?>
        <div class = "image">
          <img src = "img/blank.jpg" width="420px" height="558px">

                <p><?php echo $document?></p>
            </div>

            <div class="col-md-4">
							<button type="Button">Imprimir</button>
							<a href="archivos.php"><button type="Button">Editar</button></a>

            </div>
          </div>

        </div>


        <!-- /.row -->

        <!-- Related Projects Row -->

        <!-- /.row -->


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Linces 2017
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
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
