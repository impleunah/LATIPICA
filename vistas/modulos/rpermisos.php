<<?php
 include "modelos/conexion2.php";
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
<form enctype="multipart/form-data" name="formulario" method="post" >
  <section class="content">
      <div class="box">
        <div class="box-header with-border">
        <a class="btn btn-primary" id="btnguardar"  style="background:#2A9BDC  ;"data-toggle="modal" data-target="#modalAgregarUsuario">
          Guardar
       </a>
       </div> 
       </form>
   </br> 

  <div class="container">
<div class="panel panel-success" style="background-color:white">
<form action="" class="formulario">
<br></br>
<table width="100%">
<tbody><tr> 
    <td width="5%"></td>
    <td width="16%"><b> Seleccione el Rol:</b></td>
    <td width="15%">
    <select class="select" id="combo_roles" name="combo_roles" style="width: 150px; height:30px">

<style>
 .select {
  display:block;
  height:50px;
  width:2000px;
}
</style>
    <!--//seleccionamos id rol y nombre del rol de la tabla roles y las metemos en variable $sql .
    luego verificamos la conexion,luego entramos a una codicion si numero de columnas es mayor q 0 -->
	
    <?php 

$sql = "SELECT id_rol, rol FROM tbl_roles";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<option selected = 'selected' disabled = 'disabled'> Elija un Rol</option>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //codigo generado por php
        echo "<option value='".$row['id_rol']."'>".$row['rol']."</option>"; 
    }
} 
  ?>
    </td>

   <form>
    <td rowspan="2">
            <br>
            <input type="checkbox" id="ck_todos" name="ck_todos" style="margin-left:20px">Marcar Todos
            <br>
            <input type="checkbox" id="ck_consultar" name="ck_consultar" style="margin-left:20px">Consultar
            <br>
            <input type="checkbox" id="ck_insertar" name="ck_insertar" style="margin-left:20px">Insertar
            <br>
            <input type="checkbox" id="ck_actualizar" name="ck_actualizar" style="margin-left:20px">Actualizar
            <br><br>  
    </td>
   </form>
</tr>

<tr>
<td></td>
<td><b>Seleccione la Pantalla:</b></td>
<class="select" id="combo_pantalla" name="combo_pantalla">

<td>
<select class="select" id="combo_objeto" name="combo_objeto" style="width: 150px; height:30px">

<!--//seleccionamos id pantalla y nombre del pantalla de la tabla pantallas y las metemos en variable $sql .
luego verificamos la conexion,luego entramos a una codicion si numero de columnas es mayor q 0 -->
<?php 

$sql = "SELECT id_objeto, objeto FROM tbl_pantallas";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<option selected = 'selected' disabled = 'disabled'> Elija una pantalla</option>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //codigo generado por php
        echo "<option value='".$row['id_objeto']."'>".$row['objeto']."</option>"; 
    }
} 
  ?>

<form>

<td>    
 </td>

 </form>

        </tr>
    
    
        </tbody>
        <form>
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
      while ($mostar=mysqli_fetch_array($resultado))
      {
      ?>
            <tr>
                <td> <?php echo $mostar['id_permiso']?></td>
                <td> <?php echo $mostar['rol']?></td>
                <td><?php echo $mostar['objeto']?></td>
                <td><?php echo $mostar['permiso_consulta']?></td>
                <td><?php echo $mostar['permiso_insercion']?></td>
                <td><?php echo $mostar['permiso_actualizacion']?></td>

                <td><button type='button' class='btn btn-success' data-toggle= "modal" data-target="#myModalpara">Modificar</button> </a></td>;
                </td>
       </a>
                </td>
               </tr>
               <?php
              }
            ?>
            </tbody>
        </div>
</body> 
</html> 
            </table>
    </form>
    </div>

 </div>
</div>

<!-- Modal Agregar Rol-->
<div class="modal fade" id="myModalpara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>Cerrar</button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Rol </h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_parametro" name="guardar_parametro">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="Rol" class="col-sm-3 control-label">Rol:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Rol" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  maxlength="60"  onPaste="return false;" onkeyup="return unespacio55()"  required autofocus="on" autocomplete="off">
        </div>
			  </div>
			  <div class="form-group">
				<label for="descripcion" class="col-sm-3 control-label">Descripcion:</label>
				<div class="col-sm-8"> 
				  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCION" style="text-transform: uppercase;"  maxlength="200" onkeyup="return unespacio90()" onPaste="return false;" required value="" autocomplete="off" autofocus="on">
				</div>
        <button title="Cerrar ventana" type="submit"  class="btn btn-default" name="button" type = "button" onclick="if(confirm('Deseas continuar?')){this.form.submit();} else{ alert('Operacion Cancelada');}" value="ELIMINAR DATOS"  onClick="location.reload();" data-dismiss="modal">Cerrar</button>
			  <button title="Guardar" type="submit" class="btn btn-primary" id="guardar_datos">Guardar </button>
			  </div>
        </div>
        </div>               
		  </div>
      <script>


<!-- Modal Editar Rol-->
  <?php

use function PHPSTORM_META\elementType;

$consulta = Consultarrol($_GET['id_rol']);

      function Consultarrol($no_rol)
      {
        include "../../modelos/conexion2.php";

        
          $sql="SELECT id_rol,rol,descripcion FROM tbl_roles WHERE id_rol='$no_rol' ";
          $resultado= mysqli_query($conn,$sql) or die (mysql_error());
          $filas=mysqli_fetch_array($resultado);
      
        return [

          $filas['rol'],
          $filas['descripcion'],
        ];

      }
     
      include "../../modelos/conexion2.php";

      
      function Modificarrol($rol,$descripcion, $id)
{
  include "../../modelos/conexion2.php";
  $q=$_GET['id_rol'];
  $var1= $conn->query("SELECT rol,descripcion FROM tbl_roles WHERE id_rol='$q' ");
  if($row =mysqli_fetch_array($var1)){
    $a=$row["rol"];
    $b=$row["descripcion"];

  }

  $sentencia="UPDATE tbl_roles SET rol='".$rol."', descripcion='".$descripcion."' WHERE id_rol='".$id."' ";
  $objeto="Editar Usuario";
  $accion="Modifico"; 
  $descripcion="Modifico campos de usuario ";
 
  
if($a!=$rol){$insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id','$objeto','$accion','$descripcion','$b','$idrol')");}
if($b!=$descripcion){$insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id','$objeto','$accion','$descripcion','$w','$correo')");}

  $resultado=$conn->query ($sentencia) or die (mysql_error());
  if($resultado > 0){
   echo "<script>
   alert('usuario  Modificado exitosamente');
   window.location = '../../index.php';
   </script>";
  }
   else {
    "<script>
    alert(' no se actualizo');
    
    </script>";
   }

  }
  

if (isset($_POST["mod"])){

  //Modificarrol($_POST['rol']), $_POST['descripcion'],$_POST['id_rol']);
 

}else{
  
}
    
?>