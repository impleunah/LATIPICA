<?php
 include "modelos/conexion2.php";

     /*codigo de bitacora */ 
  if(($_SESSION['u'])) {
    
   
    $ssss= $_SESSION['u'];

    $sql = "SELECT id_usuario  from tbl_usuario WHERE Nombre_Usuario = '$ssss'"; 
    $consulta = mysqli_query($conn,$sql);
    if($row =mysqli_fetch_array($consulta)){
      $var1=$row["id_usuario"];
      $objeto="Mantenimiento Roles";
      $accion="INGRESO"; 
      $descripcion="Ingreso a Pantalla Bitacoras";
      $insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) VALUES ('$var1','$objeto','$accion','$descripcion') ");


  
  
}
else{
  header ("Location: index.php");
}

  
}
/*termina codigo de vitacora*/ 
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

    <form enctype="multipart/form-data" name="formulario" method="post" >
    <section class="content">
    <div class="box">
        <div class="box-header with-border">
        <a class="btn btn-primary" data-toggle= "modal" data-target="#myModalpara"  style="background:#F5B041;">
          Nuevo Rol
       </a>
       </div> 

      
       <table width="100%">
       <form  name="formulario" method="post">
       <div class="box-body">
       <div class="table-responsive">
       <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                
       <thead>
             <tr class="succeser" style="background-color:#54B4F5" role="row">
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
                <td> <?php echo $mostar['id_rol']?></td>
                <td><?php echo $mostar['rol']?></td>
                <td><?php echo $mostar['descripcion']?></td>
                <td><?php echo $mostar['fecha_creacion']?></td>
                <td> <a class="btn btn-primary" data-toggle= "modal" data-target="#modificar" style="background:#E67E22   ;" > Editar
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

 <!-- Modal Agregar Rol-->
 <div class="modal fade" id="myModalpara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar Nuevo Rol </h4>
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
			  <script>
    function unespacio55(){
		orig=document.guardar_parametro.nombre.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.guardar_parametro.nombre.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
function unosolo() {
	while(nombre.value.match(/\s\s/)) nombre.value = nombre.value.replace('  ', ' ');
}
    
    </script>

			  <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
			  <div class="form-group">
				<label for="descripcion" class="col-sm-3 control-label">Descripcion:</label>
				<div class="col-sm-8"> 
				  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCION" style="text-transform: uppercase;"  maxlength="200" onkeyup="return unespacio90()" onPaste="return false;" required value="" autocomplete="off" autofocus="on">
				</div>
			  </div>                
		  </div>
              <script>
    function unespacio90(){
		orig=document.guardar_parametro.descripcion.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.guardar_parametro.descripcion.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
function unosolo() {
	while(descripcion.value.match(/\s\s/)) descripcion.value = descripcion.value.replace('  ', ' ');
}
    
    </script>
 <div class="modal-footer">
    <!-- aqui esta el boton de limpiar
		 
			<input  type="reset" value="limpiar" onclick="limpiar" class="btn btn-default" ></input>

			<script> 
					function limpiar() {
	    			document.getElementById("nombre").value = "";
    			document.getElementById("descripcion").value = "";
			</script> -->

			<button title="Cerrar ventana" type="submit"  class="btn btn-default" name="button" type=button onclick="if(confirm('Deseas continuar?')){this.form.submit();} else{ alert('Operacion Cancelada');}" value="ELIMINAR DATOS"  onClick="location.reload();" data-dismiss="modal">Cerrar</button>
			<button title="Guardar" type="submit" class="btn btn-primary" id="guardar_datos">Guardar </button>

			</script> 

		  </div>
		  </form>
		</div>
	  </div>
	</div>


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

  Modificarrol($_POST['rol']), $_POST['descripcion'],$_POST['id_rol']);
 

}else{
  
}
    
?>

<div class="modal fade" id="modificar" name="modificar"tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"  onClick="location.reload();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Rol</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_rol" name="editar_rol">
			<div id="resultados_ajax2"></div>
      <div class="form-group has-feedback">
      <input type="hidden" name="id_rol" value="<?php echo $_GET['id_rol']?> ">
      </div>
			<div class="form-group">	
            <label for="parametro" class="col-sm-3 control-label">Rol:</label>
				<div class="col-sm-8">
				  <input title="Nombre del rol" type="text" class="form-control" id="rol" name="rol" placeholder="ROL" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  maxlength="50"  onPaste="return false;"  onkeyup="return unespacio56()"  required> 
				  <input  type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			     <script>
    function unespacio56(){
		orig=document.editar_usuario.nombres.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.editar_usuario.nombres.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
function unosolo() {
	while(nombres.value.match(/\s\s/)) nombres.value = nombres.value.replace('  ', ' ');
}
    
    </script>
			  		  <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

			  <div class="form-group">
				<label for="descripcion" class="col-sm-3 control-label">Descripcion</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCION" style="text-transform: uppercase;" maxlength="200" required title="Descripcion de la pantalla" onkeyup="return unespacio57()" onPaste="return false;">
				</div>
			  </div>
	    <script>
    function unespacio57(){
		orig=document.editar_usuario.descripcions.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.editar_usuario.descripcions.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
function unosolo() {
	while(descripcions.value.match(/\s\s/)) descripcions.value = descripcions.value.replace('  ', ' ');
}
    
    </script>
						 	 
			
		  </div>
		  <div class="modal-footer">
			<button title="Cerrar ventana" type="submit"  class="btn btn-default" <input name="button" type=button onclick="if(confirm('Deseas continuar?')){this.form.submit();} else{ alert('Operacion Cancelada');}" value="ELIMINAR DATOS"  onClick="location.reload();" data-dismiss="modal">Cerrar</button>
			<button title="Cerrar Ventana" type="submit" class="btn btn-primary"  name="mod">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
  
