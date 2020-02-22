
<?php

use function PHPSTORM_META\elementType;

$consulta = Consultarusuario($_GET['id_usuario']);

      function Consultarusuario($no_user)
      {
        include "../../modelos/conexion2.php";

        
          $sql="SELECT id_usuario,id_rol,Nombre_Usuario,correo_electronico,estado_usuario FROM tbl_usuario WHERE id_usuario='$no_user' ";
          $resultado= mysqli_query($conn,$sql) or die (mysql_error());
          $filas=mysqli_fetch_array($resultado);
      
        return [

          $filas['Nombre_Usuario'],
          $filas['id_rol'],
          $filas['correo_electronico'],
          $filas['estado_usuario'] 
        ];

      }
     
      include "../../modelos/conexion2.php";

      
      function ModificarUsuario1($nombre, $idrol, $correo,$estado, $id)
{
  include "../../modelos/conexion2.php";
  $q=$_GET['id_usuario'];
  $var1= $conn->query("SELECT Nombre_Usuario,id_rol,correo_electronico,estado_usuario FROM tbl_usuario WHERE id_usuario='$q' ");
  if($row =mysqli_fetch_array($var1)){
    $a=$row["Nombre_Usuario"];
    $b=$row["id_rol"];
    $w=$row["correo_electronico"];
    $d=$row["estado_usuario"];
  }

  $sentencia="UPDATE tbl_usuario SET Nombre_Usuario='".$nombre."', id_rol= '".$idrol."', correo_electronico='".$correo."',estado_usuario='".$estado."' WHERE id_usuario='".$id."' ";
  $objeto="Editar Usuario";
  $accion="Modifico"; 
  $descripcion="Modifico campos de usuario ";
 
  

 
if($a!=$nombre){$insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id','$objeto','$accion','$descripcion','$a','$nombre')");}
if($b!=$idrol){$insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id','$objeto','$accion','$descripcion','$b','$idrol')");}
if($w!=$correo){$insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id','$objeto','$accion','$descripcion','$w','$correo')");}
if($d!=$estado){$insertarUno=$conn->query("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id','$objeto','$accion','$descripcion','$d','$estado')");}
  
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
  

if (isset($_POST["enviar"])){

  ModificarUsuario1(strtoupper($_POST['Nombre_Usuario']), $_POST['Id_rol'], $_POST['correo_electronico'],$_POST['estado_uduario'],$_GET['id_usuario']);
 

}else{
  
}
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Condimentos la Tipica</title>
  <div class="login-logo "  >
    <!--imagen-->
    <img   id="back" >
    
  </div>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="">

  <!--=====================================
  =            PLUGING DE CSS             =
  ======================================-->


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="../dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--=====================================
  =            PLUGING DE JAVASCRIPT      =
  ======================================-->

  <!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</head>

<body class=" register-page ">
<div id=""></div>

<div style="margin:0px 450px 0px 450px">
  <div >
    <img src="" class="img-responsive" style="margin:0px 80px 0px 80px">
  </div>

 <div class="register-box-body">
 <p >Modificar Usuario</p>

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">

      <div class="form-group has-feedback">
      <input type="hidden" name="id_usuario" value="<?php echo $_GET['id_usuario']?> ">
      </div>
                <script language="javascript">

          function aaa(campo, event) {

                  CadenaaReemplazar = " ";
                  CadenaReemplazo = "";
                  CadenaTexto = campo.value;
                  CadenaTextoNueva = CadenaTexto.split(CadenaaReemplazar).join(CadenaReemplazo);
                  campo.value = CadenaTextoNueva;

            }o
          </script>
          <script>
        
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
          <div>
<label>Nombre Usuario</label>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombre Usuario" name="Nombre_Usuario" value="<?php echo$consulta[0] ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>    
		<div >
    <label>Rol de Usuario</label>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="rol Usuario" name="Id_rol" value="<?php echo $consulta[1] ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>    
		<div >
  
        <label>Correo electronico</label>
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="Correo Electronico"  name="correo_electronico" value="<?php echo$consulta[2] ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div >
            
      <label>Estado Usuario</label>
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="estado Usuario"  name="estado_uduario" value="<?php echo$consulta[3] ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div >
      <br>
   
        <!-- /.col -->
        <div class center="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar">Guardar</button>

        </div>
        <br>
      </br>
        <!-- /.col -->
       

           <a href="../../index.php" class="text-center">Cancelar </a>
    </form>
  
 
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

</body>
</html>