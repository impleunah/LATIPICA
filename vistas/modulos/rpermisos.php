<<?php
 include "modelos/conexion2.php";

 /*codigo de bitacora */ 
if(($_SESSION['u'])) {


$ssss= $_SESSION['u'];

$sql = "SELECT id_usuario  from tbl_usuario WHERE Nombre_Usuario = '$ssss'"; 
$consulta = mysqli_query($conn,$sql);
if($row =mysqli_fetch_array($consulta)){
  $var1=$row["id_usuario"];
  $objeto="Mantenimiento Permisos";
  $accion="INGRESO"; 
  $descripcion="Ingreso a Pantalla Bitacoras";
  $insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) VALUES ('$var1','$objeto','$accion','$descripcion') ");




}
else{
header ("Location: index.php");
}


}
/*termina codigo de vitacora*/ 
?>}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>permisos de Usuario</title>
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
      PERMISOS
        <small>Mantenimiento Permisos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">permisos</li>
      </ol>
    </section>
<br>
</br>

  <div class="container">
<div class="panel panel-success" style="background-color:white">
<form action="" class="formulario">
<br>  
<table width="100%">
<tbody><tr> 
    <td width="5%"></td>
    <td width="16%"><b> Seleccione el Rol:</b></td>
    <td width="15%">
    <select class="select" id="combo_roles" name="combo_roles" style="width: 150px; height:30px">

 .select {
  display:block;
  height:50px;
  width:2000px;
}
        

    <!--//seleccionamos id rol y nombre del rol de la tabla roles y las metemos en variable $sql .
    luego verificamos la conexion,luego entramos a una codicion si numero de columnas es mayor q 0 -->

    	<option selected="selected" disabled="disabled"> Elija un Rol</option><option value="1">ADMINISTRADOR</option><option value="7">EMPLEADO</option><option value="6">NUEVO</option>
    </select> 
    </td>

   
    <td rowspan="2">
            <br>
            <input type="checkbox" id="ck_todos" name="ck_todos" style="margin-left:20px" onclick="seleccionar_todo();" ondblclick="deseleccionar_todo();">Marcar Todos
            <br>
            <input type="checkbox" id="ck_consultar" name="ck_consultar" style="margin-left:20px">Consultar
            <br>
            <input type="checkbox" id="ck_insertar" name="ck_insertar" style="margin-left:20px">Insertar
            <br>
            <input type="checkbox" id="ck_actualizar" name="ck_actualizar" style="margin-left:20px">Actualizar
            <br>
            <input type="checkbox" id="ck_eliminar" name="ck_eliminar" style="margin-left:20px">Eliminar
            <br><br>  
    </td>
   
</tr>

<tr>
<td></td>
<td><b>Seleccione la Pantalla:</b></td>
<td>
<select class="select" id="combo_objeto" name="combo_objeto" style="width: 150px; height:30px">

<!--//seleccionamos id rol y nombre del rol de la tabla roles y las metemos en variable $sql .
luego verificamos la conexion,luego entramos a una codicion si numero de columnas es mayor q 0 -->

	<option selected="selected" disabled="disabled"> Elija una Pantalla</option><option value="1">USUARIOS</option><option value="2">EMPLEADOS</option><option value="3">ROLES</option><option value="4">ROLES OBJETO</option><option value="5">PANTALLAS</option><option value="6">BACKUP</option><option value="7">PARAMETROS</option><option value="8">CLIENTES</option><option value="9">VEHICULOS</option><option value="10">COMPRAS</option><option value="11">VENTAS</option><option value="12">BITACORAS</option><option value="13">COTIZACION</option>
</select> 
<td><div class="box-header with-border">
        <a class="btn btn-primary"  style="background:#F5B041   ;">
          Guardar
       </a>
       </div> 
 </td>

        </tr>
    
    
        </tbody>
       <div class="box-body">
       <div class="table-responsive">
       <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info ">
                
       <thead>
              <tr class="succeser" style="background-color:#54B4F5" role="row">
              <th style="width:10px">#</th>
                <th>Rol</th>
                <th>Objeto</th>
                <th>Consultar </th>
                <th>Insertar</th>
                <th>Actualizar</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <?php
      $sql="SELECT id_permiso,rol,objeto,permiso_consulta,permiso_insercion,permiso_actualizacion FROM tbl_roles_objeto r 
      join tbl_pantallas p on p.id_objeto=r.id_objeto
      join tbl_roles ro on ro.id_rol=r.id_rol  ";
     $resultado=$conn-> query ($sql);
      while ($mostar=mysqli_fetch_array($resultado)){
      ?>
            <tr>
                <td> <?php echo $mostar['id_permiso']?></td>
                <td> <?php echo $mostar['rol']?></td>
                <td><?php echo $mostar['objeto']?></td>
                <td><?php echo $mostar['permiso_consulta']?></td>
                <td><?php echo $mostar['permiso_insercion']?></td>
                <td><?php echo $mostar['permiso_actualizacion']?></td>
                <td> <a class="btn btn-primary"  style="background:#E67E22   ;" > Editar
                <a class="btn btn-primary"  style="background:#E74C3C  ;">Eliminar</a>
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

 </div>

</div>
