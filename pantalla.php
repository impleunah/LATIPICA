<!-- 
Copyright & copy; 2018-2019 All rights reserved.
IA-220 Evaluacion de Sistemas
Licda. Karla Garcia
Elabora por:
Carolin Varela
Angel Zambrano
Roger Carrillo 
Cristian Carrasco
Allan Matamoros
 -->
 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Autolote 3 Caminos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="background-color: red">
    <!-- Logo -->
    <a href="principal.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>3C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Autolote 3</b> Caminos</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
                  <!-- end task item -->
              
          <!-- User Account: style can be found in dropdown.less -->
          
              
              <div class="pull-right">
                <!-- <a href="cerrar.php"><img src="images/cerrar_sesion.jpg" height="50px" width="50px"></a> -->
            
                <!-- INICIA BTN DE CERRAR SESION-->

                <style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>
</head>
<body>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <div>
       <a><h1>Está Saliendo del Sistema <br>¿Desea Continuar?</h1></a>
    </div>
    <br>
    <a href="logout.php">SI </a>
    <a href="principal.php">NO</a>
    
  </div>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Salir</span>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>


<!--TERMINA BTN CERRAR SESION-->



                  <br>  

                  
                  
              </div>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                
                
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">CERRAR SESIÓN</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
            
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACIÒN</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>COMPRAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="compra.php"><i class="fa fa-circle-o"></i> Registro de Compras</a></li>            
            <li class="active"><a href="vehiculos.php"><i class="fa fa-circle-o"></i> Vehículos</a></li>            
          </ul>
        </li>

        
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dollar"></i> <span>VENTAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="cliente.php"><i class="fa fa-circle-o"></i> Clientes</a></li> 
            <li class="active"><a href="cotizacion.php"><i class="fa fa-circle-o"></i> Cotizaciones</a></li>
            <li class="active"><a href="ventas.php"><i class="fa fa-circle-o"></i> Ventas</a></li>           
          </ul>
        </li>


        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>SEGURIDAD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         
          <ul class="treeview-menu">
            <li class="active"><a href="usuarios.php"><i class="fa fa-circle-o"></i> Usuarios</a></li> 
            <li class="active"><a href="empleados.php"><i class="fa fa-circle-o"></i> Empleados</a></li>
            <li class="active"><a href="roles.php"><i class="fa fa-circle-o"></i> Roles de Usuario</a></li> 
            <li class="active"><a href="roles_objeto.php"><i class="fa fa-circle-o"></i> Permiso de Usuario</a></li>
            <li class="active"><a href="pantallas.php"><i class="fa fa-circle-o"></i> Pantallas</a></li> 
            <li class="active"><a href="respaldo.php"><i class="fa fa-circle-o"></i> Respaldar o Restaurar</a></li> 
            <li class="active"><a href="parametros.php"><i class="fa fa-circle-o"></i> Parametros</a></li>
             <li class="active"><a href="bitacoras.php"><i class="fa fa-circle-o"></i> Bitacoras</a></li>   

          </ul>
        </li>

      

        <!--HASTA AQUI TERMINA-->
            <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
   
 
    
    </section>

    </section>
    <!-- /.content -->

  