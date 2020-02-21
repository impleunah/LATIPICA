<?php
  include "modelos/conexion2.php";
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Mantenimientos  Usuario</title>
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
     USUARIOS
        <small>Mantenimiento Usuario </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Usuario</li>
      </ol>
    </section>

<div class="box">
        <div class="box-header with-border">
        <a class="btn btn-primary"  style="background:#2ECC71    ;" href="vistas/modulos/registro_ussario.php">
          Agregar Usuario
        
       </a>
       </div> 
  <div class="container">
<div class="panel panel-success" style="background-color:white">
<form action="" class="formulario">
<br>  
<table width="100%">

       <div class="box-body">
       <div class="table-responsive">
       <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info ">
                
                   
       <thead>
               <tr class="succeser" style="background-color:#54B4F5" role="row">
              <th>Id</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Fecha de creacion </th>
                <th>Ultima Conexion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <?php
      $sql="SELECT id_usuario,id_rol,Nombre_Usuario,correo_electronico,estado_usuario,fecha_creacion,ultima_conexion FROM tbl_usuario";
      $resultado=$conn-> query ($sql);
      while ($mostar=mysqli_fetch_array($resultado)){
      ?>
            <tr>
                <td><?php echo $mostar['id_usuario']?></td>
                <td> <?php echo $mostar['Nombre_Usuario']?></td>
                <td><?php echo $mostar['id_rol']?></td>
                <td><?php echo $mostar['correo_electronico']?></td>
                <td><?php echo $mostar['estado_usuario']?></td>
                <td><?php echo $mostar['fecha_creacion']?></td>
                <td><?php echo $mostar['ultima_conexion']?></td>
                <td><a class="btn btn-primary" 
                href="vistas/modulos/editar_usuarios.php " style="background:#E67E22 ">Editar </a>
                </td>
               </tr>
               <?php
               }
            ?>
             </tbody>
        </div>
</table>
    </form>
    </div>
  </table>
 </div>

</div>
