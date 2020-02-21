<?php
  include "modelos/conexion2.php";
  /*codigo de bitacora */ 
  if(($_SESSION['u'])) {
    
   
    $ssss= $_SESSION['u'];

    $sql = "SELECT id_usuario  from tbl_usuario WHERE Nombre_Usuario = '$ssss'"; 
    $consulta = mysqli_query($conn,$sql);
    if($row =mysqli_fetch_array($consulta)){
      $var1=$row["id_usuario"];
      $objeto="Mantenimiento Usuarios";
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>Mantenimiento Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Usuario</li>
      </ol>
    </section>


<div class="box">
  <form enctype="multipart/form-data" name="formulario" method="post" >
  <section class="content">
      <div class="box">
        <div class="box-header with-border">
        <a class="btn btn-primary"  style="background:#2A9BDC  ;" href="vistas/modulos/registro_ussario.php">
          Agregar Usuario
       </a>
       </div> 
<<<<<<< HEAD
<<<<<<< HEAD
  <div class="container">
<div class="panel panel-success" style="background-color:white">
<form action="" class="formulario">
<br>  
<table width="100%">

       <div class="box-body">
=======
=======
>>>>>>> parent of acb554c... pantalla mante
       <form>
				<center>
        <div class="panel panel-success" style="background-color: #21618C" ;>
			  <i class='glyphicon glyphicon-share'  title="salir de la consulta" onclick="load(1)"></i>
				<input type="date" id="bd-desde"  /><input type="date" id="bd-hasta"  />
				<a target="_blank" href="javascript:reportePDF();"style="background:#2DC248 ;" class="btn btn-primary">Generar Reporte</a>
				</center>
			</form>
<<<<<<< HEAD
     
      <form action="editar_usuarios.php" name="formulario" method="post">
      <div class="box-body">
>>>>>>> c923decfee5a95bc5f185933fbc1854a9ee8142c
=======
      
      <div class="box-body">
>>>>>>> parent of acb554c... pantalla mante
       <div class="table-responsive">
       <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                
            <thead>
              <tr>
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
<<<<<<< HEAD
      ?>
            <tr>
                <td><?php echo $mostar['id_usuario']?></td>
                <td> <?php echo $mostar['Nombre_Usuario']?></td>
                <td><?php echo $mostar['id_rol']?></td>
                <td><?php echo $mostar['correo_electronico']?></td>
                <td><?php echo $mostar['estado_usuario']?></td>
                <td><?php echo $mostar['fecha_creacion']?></td>
                <td><?php echo $mostar['ultima_conexion']?></td>
                <td><a class="btn btn-primary"  style="background:#E67E22   ;
                "href="vistas/modulos/editar_usuarios.php">Editar </a>
                
                </td>
               </tr>
               <?php
=======
      
        echo "<tr>";
        echo "<td>"; echo $mostar['id_usuario']; echo "</td>";
        echo "<td>";  echo $mostar['Nombre_Usuario'];echo "</td>";
        echo "<td>"; echo $mostar['id_rol'];echo "</td>";
        echo "<td>"; echo $mostar['correo_electronico'];echo "</td>";
        echo "<td>"; echo $mostar['estado_usuario'];echo "</td>";
        echo "<td>"; echo $mostar['fecha_creacion'];echo "</td>";
        echo "<td>"; echo $mostar['ultima_conexion'];echo "</td>";
        echo "<td> <a href='vistas/modulos/editar_usuarios.php?id_usuario=".$mostar['id_usuario']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";          
        echo "</tr>";
               
>>>>>>> c923decfee5a95bc5f185933fbc1854a9ee8142c
               }
            ?>
                </div>
        </div>
<<<<<<< HEAD
<<<<<<< HEAD
</table>
=======
        </form>
=======
>>>>>>> parent of acb554c... pantalla mante
      </div> 
    </div>
    </section>
    

     <! -- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  
 <!-- <div class="modal-dialog">-->

    <!-- Modal content-->
    <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data"  action="<?php $_SERVER["PHP_SELF"]; ?> ">
      <div class="modal-header" style="background:#001F3F; color:white" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>
      <label for="NUser">Agregar Usuario</label>
    
      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
          

            <input type="text" class="form-control input-lg" name="NuevoUsuario" placeholder="Ingresar Usuario" required>
            
          </div>
          
         
          </div>
          <label for="NUserioo">Correo Electronico</label>
          <div class="form-group">
   
          <div class="input-group">
      
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
           
            <input type="text" class="form-control input-lg" name="Correo Electronico" placeholder="Correo Electronico" required>
          </div>
          

          </div>

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="text" size="15" maxlength="5" value="Contraaa" name="Igresar Contraseña">
            <input type="password" class="form-control input-lg" name="Ingresar Contraseña" placeholder="Ingresar Contraseña" required>
          </div><br> 

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control input-lg" name="Repetir Contraseña" placeholder="Repetir Contraseña" required>
          </div>
          
          </div>

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users" name="tipo"></i></span>

            <select class="form-control input-lg" name="TipodeUsuario">
              <option value="">"Seleccionar Usuario"</option>
              <option value="Administrador">Administrador</option>
              <option value="Operador">Operador</option>
              </select>
            

      </div><br>
              

            
             <div class="form-group">
             
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>

            <select class="form-control input-lg" name="Preguntas">
              <option value="">"Seleccionar Preguntas de Seguridad"</option>
              <option value="color">Cúal es su color favorito?</option>
              <option value="Trabajo">Cúal seria su trabajo ideal?</option>
              <option value="Mascota">Nombre de su primera mascota?</option>
              <option value="Amigo">Mejor amigo de la infancia?</option>

            </select>
            
        
      </div><br>

      <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="text" class="form-control input-lg" name="Respuesta seguridad" placeholder="Respuesta seguridad" required>
          </div>
          
+

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" name="enviar1">Guardar Usuario</button>
      </div>
      
						
      <?php 
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

       ?>

<<<<<<< HEAD
>>>>>>> c923decfee5a95bc5f185933fbc1854a9ee8142c
=======
>>>>>>> parent of acb554c... pantalla mante
    </form>
    </div>

 </div>

</div>
</body>
</html>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
