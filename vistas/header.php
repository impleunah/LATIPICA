<?php
ob_start();


if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>La Tipica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="../public/css/smoke.min.css">
<link rel="stylesheet" href="../public/css/bootstrap.min.css">
<link rel="stylesheet" href="../public/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../public/css/fileinput.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini"  "> 
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo index2.html-->
        <a href="inico.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">TIPICA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>La Tipica</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><?php echo $_SESSION["Nombre_Usuario"] ?></span>
                </a>
                
                <ul class="dropdown-menu">
                  <!-- User image -->
                 
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
             
                    <center><a href="cambiar_contaseña_suario.php" class="btn btn-default btn-flat">Cambiar Contraseña</a></center>
                        <center> <a href="preguntas_usuario.php" class="btn btn-default btn-flat">Preguntas</a></center>
                      <center><a href="../ajax/tbl_usuarios_envio.php?op=salir"  class="btn btn-default btn-flat">Cerrar</a></center>
                    </div>
                  </li>

                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="inico.php">
                <i class="fa fa-spinner"></i> <span>Inicio</span>
              </a>
            </li>  
      <?php
     
         if($_SESSION['Mostar_Menu_Compras']==1 ){

            echo '<li id="mCompras" class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>      
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="tbl_ingreso.php"><i class="fa fa-circle-o"></i>Compras</a></li>
                <li><a href="tbl_proveedor.php"><i class="fa fa-circle-o"></i> Proveedor</a></li>
                <li><a href="Proveedores.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>' ; 
         }?> 
             <?php  if( $_SESSION['Mostar_Menuventas']==1 ){
           echo' <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="venta.php"><i class="fa fa-circle-o"></i> Nueva Venta</a></li>
              <li><a href="tbl_clientes.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
              <li><a href="Clientes.php"><i class="fa fa-circle-o"></i> Clientesss </a></li>
               <li><a href="caid.php"><i class="fa fa-circle-o"></i> CAI</a></li>
              </ul>
            </li>';
             }?>
             <?php if($_SESSION['Mostar_MenuInventario']  ==1 ){
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-sort-amount-asc"></i>
                <span>Inventario</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="inventario.php"><i class="fa fa-circle-o"></i> Inventario</a></li>
               

              </ul>
            </li>   '; 
            }?>


            <?php if($_SESSION['Mostar_Menu_Producto']==1 ){
            echo '
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cart-plus"></i>
                <span>Producto</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Producto</a></li>
              </ul>
            </li>';
          }?>




<?php if($_SESSION['Mostar_MenuMantenimiento']==1){
            echo '
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i> <span>Mantenimientos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="mantenimiento_tbl_empresa.php"><i class="fa fa-circle-o"></i> Empresa </a></li>
                <li><a href="mantenimiento_presentacion.php"><i class="fa fa-circle-o"></i> Presentaciones </a></li>
                <li><a href="mantenimiento_descuento.php"><i class="fa fa-circle-o"></i> Descuento </a></li>
                <li><a href="mantenimiento_impuesto.php"><i class="fa fa-circle-o"></i> Impuesto </a></li>
                <li><a href="mantenimiento_operaciones.php"><i class="fa fa-circle-o"></i>   Operaciones</a></li>
                </a></li>
              </ul>
            </li> 
';}?>
<!--codigo de manteminimento operaciones-->
 <!--<li><a href="mantenimiento_tipo_operacion.php"><i class="fa fa-circle-o"></i> Tipo operacion</a></li>-->
<?php if($_SESSION['Mostar_MenuSeguridad']==1){
            echo '
            <li class="treeview">
              <a href="#">
                <i class="fa fa-lock"></i> <span>Seguridad</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="mantenimiento_usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
                <li><a href="manteniento_permiso.php"><i class="fa fa-circle-o"></i> Permisos de Usuarios</a></li>
                <li class="treeview">
                <a href="#">
                <i class="fa fa-circle-o"></i> <span>Preguntas</span>
           
                  </a>
                     <ul class="treeview-menu">
              
                <li><a href="mantenimiento_preguntas_1.php"></i>  Preguntas</a></li>
                <li><a href="mantenimiento_pregunta_usuario.php"> Pregunta Usuario</a></li>
                </ul>
                </li>
                <li><a href="mantenimiento_roles.php"><i class="fa fa-circle-o"></i> Roles </a></li>
                <li><a href="mantenimiento_bitacora.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="mantenimiento_pantallas.php"><i class="fa fa-circle-o"></i> Pantallas</a></li>    
                <li><a href=" tbl_parametros.php"><i class="fa fa-circle-o"></i>    Parametros</a></li>
              </ul>
            </li>
';}?>

        </section >
        <!-- /.sidebar     -->
      </aside>
      <?php 
}
require ('permisos.php');
ob_end_flush();
?>