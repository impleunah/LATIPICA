<?php
session_start();
require 'modelos/conexion2.php';
?>

<head>
<title>ROLES OBJETO</title>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="background-color: cyan">

    <!-- Logo -->
    <a href="vistas/modulos/inicio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>LT</span>
      <!-- logo for regular staprote and mobile devices -->
      <span class="logo-lg"><b>Productos</b> La Tipica</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <div class="pull-right">

 <!-- INICIA BTN DE CERRAR SESION-->
 <form>

<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Salir</span>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}

</script>
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <div>
       <a><h1>Está Saliendo del Sistema <br>¿Desea Continuar?</h1></a>
    </div>
    <br>
    <a href="vistas/modulos/login.php" >SI</a>
    
  </div>
</div>
</form>
                  
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



  
  <style>
body 
{
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

<br>                 
<ul class="dropdown-menu">
<!-- User image -->
<li class="user-header">
  
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
            <li class="active"><a href="roles.php"><i class="fa fa-circle-o"></i> Roles de Usuario</a></li> 
            <li class="active"><a href="roles_objeto.php"><i class="fa fa-circle-o"></i> Permiso de Usuario</a></li>
            <li class="active"><a href="respaldo.php"><i class="fa fa-circle-o"></i> Respaldar o Restaurar</a></li> 
             <li class="active"><a href="bitacoras.php"><i class="fa fa-circle-o"></i> Bitacoras</a></li>   

          </ul>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
</head>
<center>
            <h3> <font-size 1000%> ROLES OBJETOS </h3>   
            
            <html lang="en">
<head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="wrap">
		<div class="info">
    </div>
    
<br>    
<form action="" class="formulario">
<br>  
<table width="100%">
<tbody>
    <td width="3%"></td>
    <td width="4%"><b> Seleccione el Rol:</b><div>
    <td width="30%">
    <select class="select" id="combo_roles" name="combo_roles" style="width: 150px; height:30px">
</br></br>
      
    <!--//seleccionamos id rol y nombre del rol de la tabla roles y las metemos en variable $sql .
    luego verificamos la conexion,luego entramos a una codicion si numero de columnas es mayor q 0 -->

    <?php 

    $sql = "SELECT id_rol, rol FROM tbl_roles";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        //codigo generado por php
            echo "<option value='".$row['id_rol']."'>".$row['rol']."</option>"; 
        }
    } 
    	?>
<br>
<option selected="selected" disabled="disabled"> Elija un Rol</option>
<option value="1">ADMINISTRADOR</option>
<option value="7">EMPLEADO</option>
<option value="6">NUEVO</option>
</select>
</table>

<!--//seleccionamos id obejto y nombre del pantalla de la tabla pantalas y las metemos en variable $sql .
luego verificamos la conexion,luego entramos a una codicion si numero de columnas es mayor q 0 -->
<table width="100%">
<td width="5%"></td>
<td widht ="10"><b>Seleccione la Pantalla:</b>
<select class="select" id="combo_objeto" name="combo_objeto" style="width: 150px; height:30px">


<?php 

$sql = "SELECT id_objeto, objeto FROM tbl_pantallas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<option selected = 'selected' disabled = 'disabled'> Elija una Pantalla</option>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //codigo generado por php
   
        echo "<option value='".$row['id_objeto']."'>".$row['objeto']."</option>";
    }
} 
	?>

	<option selected="selected" disabled="disabled"> Elija una Pantalla</option><option value="1">USUARIOS</option><option value="2">EMPLEADOS</option><option value="3">ROLES</option><option value="4">ROLES OBJETO</option><option value="6">BACKUP</option><option value="7">PARAMETROS</option><option value="8">CLIENTES</option></option><option value="10">COMPRAS</option><option value="11">VENTAS</option><option value="12">BITACORAS</option><option value="13">COTIZACION</option>
</select> 
 </td>

</tbody></table>
		
<div class="checkbox">

<input type="checkbox" name="checkbox" id="checkbox1" style="width: 80px; position: relative;left:45%">
<label for="checkbox1">Consultar</label><dv>	
        
<input type="checkbox" name="checkbox" id="checkbox2"style="width: 80px; position: relative;left:45%">
<label for="checkbox2">Insertar</label><dv>

<input type="checkbox" name="checkbox" id="checkbox3"style="width: 80px; position: relative;left:45%">
<label for="checkbox3">Actualizar</label><dv>
</div>

      <div class="dataTables_length" id="tableListar_length" style="overflow-x: auto;">

      <div id="tableListar_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-xs-6"><div class="dataTables_length" id="tableListar_length"><label>Mostrar <select name="tableListar_length" aria-controls="tableListar" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> registros por página</label></div></div><div class="col-xs-6"><div id="tableListar_filter" class="dataTables_filter"><label><for="busqueda">Buscar</label><input type="search" class="form-control input-sm" placeholder="Buscar" aria-controls="tableListar"></label></div></div></div><table class="table dataTable no-footer" id="tableListar" role="grid" aria-describedby="tableListar_info">
        <thead>
          <tr class="succeser" style="background-color: #8FBC8F" role="row"><th class="sorting" tabindex="0" aria-controls="tableListar" rowspan="1" colspan="1" aria-label="Rol: activate to sort column ascending" style="width: 220px;">Rol</th><th class="sorting" tabindex="0" aria-controls="tableListar" rowspan="1" colspan="1" aria-label="Objeto: activate to sort column ascending" style="width: 202px;">Objeto</th><th class="sorting" tabindex="0" aria-controls="tableListar" rowspan="1" colspan="1" aria-label="Consultar: activate to sort column ascending" style="width: 128px;">Consultar</th><th class="sorting" tabindex="0" aria-controls="tableListar" rowspan="1" colspan="1" aria-label="Insertar: activate to sort column ascending" style="width: 104px;">Insertar</th><th class="sorting" tabindex="0" aria-controls="tableListar" rowspan="1" colspan="1" aria-label="Actualizar: activate to sort column ascending" style="width: 130px;">Actualizar</th><th class="sorting" tabindex="0" aria-controls="tableListar" rowspan="1" colspan="1" aria-label="acccionas: activate to sort column ascending" style="width: 133px;">acccionas</th></tr>
        </thead>
        <tbody>

                  <tr role="row" class="odd">
                   
              <td class="">NUEVO</td>
                <td>USUARIOS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>
                                         </td>
              </tr><tr role="row" class="even">
                   
              <td class="">NUEVO</td>
                <td>EMPLEADOS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>
  
                                         </td>
              </tr><tr role="row" class="odd">
                   
              <td class="">NUEVO</td>
                <td>ROLES</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>
  
                                         </td>
              </tr><tr role="row" class="even">
                   
              <td class="">NUEVO</td>
                <td>ROLES OBJETO</td>
                <td>N</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>
 
                                         </td>
              </tr><tr role="row" class="odd">
                   
              <td class="">NUEVO</td>
                <td>PANTALLAS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>
  
                                         </td>
              </tr><tr role="row" class="even">
                   
              <td class="">NUEVO</td>
                <td>BACKUP</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>

                                         </td>
              </tr><tr role="row" class="odd">
                   
              <td class="">NUEVO</td>
                <td>PARAMETROS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>
 
                                         </td>
              </tr><tr role="row" class="even">
                   
              <td class="">NUEVO</td>
                <td>BITACORAS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>

                                         </td>
              </tr><tr role="row" class="odd">
                   
              <td class="">EMPLEADO</td>
                <td>USUARIOS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>

                                         </td>
              </tr><tr role="row" class="even">
                   
              <td class="">EMPLEADO</td>
                <td>EMPLEADOS</td>
                <td>S</td>
                <td>N</td>
                 <td>N</td>
            <td class="sorting_1">N</td>
   

                <td>

</td>
              </tr></tbody>
      </table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="tableListar_info" role="status" aria-live="polite">Mostrando página 1 de 4</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap" id="tableListar_paginate"><ul class="pagination"><li class="prev disabled"><a href="#">← Anterior</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li class="next"><a href="#">Siguiente → </a></li></ul></div></div></div></div>
     
      </div>
		</form>
  </div>
  <style>
    /* ----- ----- ----- ----- */
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0; }

body {
  font-size: 16px;
  background: #3c8dbc;
  font-family: "Roboto"; }

a {
  color: #FF4136; }

.wrap {
  width: 90%;
  max-width: 1000px;
  margin: auto; }

.info {
  text-align: center;
  padding: 20px;
  color: #3c8dbc;
  border-bottom: 1px solid #ccc; }
  .info p {
    margin-top: 20px; }


  .formulario h2 {
    font-size: 16px;
    color: #3c8dbc;
    margin-bottom: 20px;
    margin-left: 20px; }
  .formulario > div {
    padding: 20px 0;
    border-bottom: 1px solid #ccc; }

  .formulario .checkbox label {
    display: inline-block;
    cursor: pointer;
    color: #3c8dbc;
    position: relative;
    padding: 5px 15px 5px 51px;
    font-size: 1em;
    border-radius: 5px;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease; }


    .formulario .checkbox label:before {
      content: "";
      display: inline-block;
      width: 17px;
      height: 17px;
      position: absolute;
      left: 15px;
      border-radius: 50%;
      background: none;
      border: 3px solid #3c8dbc; }

    .formulario input[type="radio"]:checked + label:before {
      display: none; }
    
  .formulario .checkbox label:before {
    border-radius: 3px; }
  .formulario .checkbox input[type="checkbox"] {
    display: none; }
    .formulario .checkbox input[type="checkbox"]:checked + label:before {
      display: none; }
    .formulario .checkbox input[type="checkbox"]:checked + label {
      background: #3c8dbc;
      color: #fff;
      padding: 5px 15px; }
      </style>
</body>

</html>
      <script src="./javascript/myjava.js"></script>
<script type="text/javascript">  

</script>

<script type="text/javascript">
function redirect2(){
    window.location.replace("./roles.php");
}
</script>

<script type="text/javascript">
function redirect3(){
    window.location.replace("./objeto_pantalla.php");
}
</script>

<script src="./javascript/myjava.js"></script>
<script type="text/javascript">    

</script>

<script type="text/javascript">
function redirect2(){
    window.location.replace("./roles.php");
}
</script>

<script type="text/javascript">
function redirect3(){
    window.location.replace("./objeto_pantalla.php");
}
</script>
<script>
function load(page){
		
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'LATIPICA/ajax/buscar_roles_objeto.php',
       beforeSend: function(objeto){
       $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
      },
      success:function(data){
        $(".outer_div").html(data).fadeIn('slow');
        $('#loader').html('');
        
      }
    })
  }
  </script>

    </select> 
    </td>
 </div