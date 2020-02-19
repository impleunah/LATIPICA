<?php
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "latipica1";
  

$conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
      die("Conexión fallida: ".$conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Roles de Usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Cat Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/es.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome1.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>

</aside>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      ROLES 
        <small>Mantenimiento Roles</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">roles</li>
      </ol>
    </section>

  <div class="container">
<div class="panel panel-success" style="background-color:white">

    </section>
    <section class="content">
        <form>
        <center>
        <div class="panel panel-success" style="background-color:white ">
        <i class='glyphicon glyphicon-share'  title="salir de la consulta" onclick="load(1)"></i>
        <input type="date" id="bd-desde"  /><input type="date" id="bd-hasta"  />
        <a target="_blank" href="javascript:reportePDF();"style="background:#2DC248 ;" class="btn btn-primary">BUSCAR</a>
        </center>
      </form>

      <div class="row">
      <div class="col-sm-6">
      <div class="dataTables_length" id="tableListar_length">
      <label>Mostrar <select name="tableListar_length" aria-controls="tableListar" >
        <option value="10">10</option>
        <option value="70">70</option>
        <option value="100">100</option>
        <option value="150">150</option>
        </select> registros por página</label></div></div></div>

        <div class="row">
        <div class="col-sm-6"><div id="tableListar_filter" class="dataTables_filter">
        <label for="Buscar"> Buscar </label>
        <label><input type="search" class="form-control input-sm" 
         placeholder="Buscar" aria-controls="tableListar"></label></div></div></div>
    
      </form>

       <div class="box-body">
       <div class="table-responsive">
       <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                
       <thead>
              <tr>
              <th style="width:10px">#</th>
                <th>Id rol</th>
                <th>Rol</th>
                <th>descripcion</th>
                <th>Fecha de creacion </th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <?php
      $sql="SELECT id_rol,rol,descripcion,fecha_creacion FROM tbl_roles";
      $resultado=$conn-> query ($sql);
      while ($mostar=mysqli_fetch_array($resultado)){
      ?>
            <tr>
                <td class="sorting_1"></td>
                <td> <?php echo $mostar['id_rol']?></td>
                <td><?php echo $mostar['rol']?></td>
                <td><?php echo $mostar['descripcion']?></td>
                <td><?php echo $mostar['fecha_creacion']?></td>
                <td> <a class="btn btn-primary"  style="background:#E67E22   ;" > Editar
                <td><a class="btn btn-primary"  style="background:#E74C3C  ;">Eliminar</a>
                </td>
               </tr>
               <?php
               }
            ?>
            </tbody>
        </div>

    </form>
    </div>

 </div>

</div>
