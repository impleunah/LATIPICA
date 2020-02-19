<?php 
session_start();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Condimentos la Tipica</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/logosfmini.png">

  <!--=====================================
  =            PLUGING DE CSS             =
  ======================================-->


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--=====================================
  =            PLUGING DE JAVASCRIPT      =
  ======================================-->
  <!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- SweetAlert 2 -->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="vistas/plugins/sweetalert2/sweetalert2.all.min.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->


<body class="hold-transition skin-blue sidebar-mini login-page register-page">

  <?php


if (isset($_SESSION["iniciarSesion"])&& $_SESSION["iniciarSesion"] == "ok"){
  echo '<div class="wrapper">';

/*=============================================
=            CABEZOTE                         =
=============================================*/

  include "modulos/cabezote.php";

  /*=============================================
  =            MENU                             =
   =============================================*/

   include "modulos/menu.php";

  /*=============================================
  =            CONTENIDO                        =
   =============================================*/
  if (isset($_GET["ruta"])){
  
  if ($_GET["ruta"] == "rempresa"||
      $_GET["ruta"] == "empresa"||
      $_GET["ruta"] == "rusuarios"||
      $_GET["ruta"] == "servicios"||
      $_GET["ruta"] == "roles"||
      $_GET["ruta"] == "productos"||
      $_GET["ruta"] == "inventario" ||
      $_GET["ruta"] == "rpermisos" ||
      $_GET["ruta"] == "clientes" ||
      $_GET["ruta"] == "reportes" ||
      $_GET["ruta"] == "rnotificaciones" ||
      $_GET["ruta"] == "facturacion" ||
      $_GET["ruta"] == "salir" ||
      $_GET["ruta"] == "registro" ||
      $_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "inicioo" ||
      $_GET["ruta"] == "notificaciones"){

    include "Modulos/".$_GET["ruta"].".php";


    }else {

    include "Modulos/404.php   ";

  }

}else{

  include "Modulos/inicio.php";

}

  
  /*=============================================
  =           FOOTER                     =
   =============================================*/
   include "modulos/footer.php";

   echo '</div>';

}else{

  include "modulos/login.php";

}


  ?>


  
</div>
<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
</body>
</html>
