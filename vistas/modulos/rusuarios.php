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
/*termina codigo de bitacora*/ 
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Usuarios</title>
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
     Usuarios
        <small>Mantenimiento Usuario </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Usuarios</li>
      </ol>
    </section>
  <form enctype="multipart/form-data" name="formulario" method="post" >
  <section class="content">
      <div class="box">
        <div class="box-header with-border">
        <a class="btn btn-primary"  style="background:#2A9BDC  ;"data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
       </a>
       </div> 
<br>  
<table width="100%">

<form action="editar_usuarios.php" name="formulario" method="post">
      <div class="box-body">
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
      $sql="SELECT id_usuario,Nombre_Usuario,rol,correo_electronico,estado_usuario, u.fecha_creacion ,ultima_conexion FROM tbl_usuario u
      join tbl_roles r  on r.id_rol= u.id_rol";
      $resultado=$conn-> query ($sql);
      while ($mostar=mysqli_fetch_array($resultado)){
      
        echo "<tr>";
        echo "<td>"; echo $mostar['id_usuario']; echo "</td>";
        echo "<td>";  echo $mostar['Nombre_Usuario'];echo "</td>";
        echo "<td>"; echo $mostar['rol'];echo "</td>";
        echo "<td>"; echo $mostar['correo_electronico'];echo "</td>";
        echo "<td>"; echo $mostar['estado_usuario'];echo "</td>";
        echo "<td>"; echo $mostar['fecha_creacion'];echo "</td>";
        echo "<td>"; echo $mostar['ultima_conexion'];echo "</td>";
        echo "<td> <a href='vistas/modulos/editar_usuarios.php?id_usuario=".$mostar['id_usuario']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";          
        echo "</tr>";
               
               }
            ?>
                </div>
        </div>
              </table>
        </form>
    </div>
 </div>
</div>

<?php 
IF (isset($_POST["enviar1"])){
              $user = strtoupper( $_POST['NuevoUsuario']);
              $correo =  $_POST['Correo_Electronico'];
              $ncontra = $_POST['Ingresar_Contraseña'];
              $rcontra =  $_POST['Repetir_Contraseña'];
                   
                    $tipo =  $_POST['TipodeUsuario'] ;
                      
                    if (filter_var($correo, FILTER_VALIDATE_EMAIL) ){

                
                    $sqluser = "SELECT  Nombre_Usuario from tbl_usuario WHERE Nombre_Usuario = '$user'";
                    $resultado = $conn -> query($sqluser);
                    $filas = $resultado -> num_rows;
                    $contraseña = "SELECT  correo_electronico from tbl_usuario WHERE correo_electronico = '$correo'";
                  
                    $resultado2  = $conn -> query($contraseña);
                    $filas2  = $resultado2 -> num_rows;
                    if($filas2 == 0){
                          if($rcontra == $ncontra){
                                  if($filas == 0){
                                    $sqluser = "INSERT INTO  tbl_usuario (Nombre_Usuario , Contraseña , correo_electronico,estado_usuario,intentos,id_rol) VALUES ('$user', '$rcontra', '$correo','Nuevo',0,'$tipo' ) ";                      
                                    $objeto1="Crear Usuario";
                                    $accion1="se creo un nuevo usario"; 
                                  
                                    $insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) VALUES ('$var1','$objeto1','$accion1','$user') ");
                                    $resultado = $conn ->query($sqluser);
                                   

                                                
                                              if($resultado > 0){
                                                echo"<script>
                                                alert('exito ');
                                               
                                                </script>";
                                              }else {
                                                "<script>
                                                    alert(' no existe');
                                                    
                                                    </script>";
                                              }
                                            }
                                            
                                            else {
                                              echo "<script>
                                                    alert('el usuario  existe');
                                                    
                                                    </script>";
                                            }
                                            
                                          }
                                          
                                          else{
                                            echo"<script>
                                            alert('Las dos claves son distintas');
                                            </script>";
                                          }
                                      }else{   print"<script>
                                        alert('El Correo ya exite');
                                        </script>";
                                      }
                                    }else{

                                      print"<script>
                                     alert('El Correo no es valido, favor verificar' );
                                     </script>";
                                   
                                   }
                                      
                                      
                                      
              }
                  
?>

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background:#001F3F; color:white" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>

      <div class="modal-body">
      <form class="form-horizontal" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
      <div class="form-group">
       <img src="" class="img-responsive" >

        <input type="text" class="form-control" placeholder="Usuario" name="NuevoUsuario" 
        
 required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
                <script language="javascript">

          function aaa(campo, event) {

                  CadenaaReemplazar = " ";
                  CadenaReemplazo = "";
                  CadenaTexto = campo.value;
                  CadenaTextoNueva = CadenaTexto.split(CadenaaReemplazar).join(CadenaReemplazo);
                  campo.value = CadenaTextoNueva;

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
<label for="NUserioo">Correo Electronico</label>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Correo_Electronico" name="Correo Electronico"  >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>    
       
        <label for="Ncontraa">Nueva Contraseña</label>
      <div class="form-group has-feedback">

  
      <input type="password" class="form-control" placeholder="Ingresar Contraseña"  name="Ingresar_Contraseña" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <label for="Rcontraseña">Repetir Contraseña</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repetir Contraseña" name="Repetir_Contraseña"  onkeyup="aaa(this, event)" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    
      <div >
            
      <label for="usuarioseleccionar">Seleccionar Usuario</label>
            <select class="form-control " name="TipodeUsuario">
              <option value="">"Seleccionar Usuario"</option>
              <option value="1">Administrador</option>
              <option value="9">Operador</option>
              <option value="10">Usuario</option>
              </select>
            

      </div><br>
   
        <!-- /.col -->
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar1">Guardar Usuario</button>
          <br>
          </br>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>
  </div>
</div>
</div>
</div>

