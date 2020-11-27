<?php
session_start();
 require "../config/Conexion.php";

  $query = "SELECT * FROM tbl_parametros where id_parametro=2";
  $result = mysqli_query($conexion, $query);
  
  while($row = mysqli_fetch_array($result)){
  
 
  $valormax =$row['valor'];
  
  }


  $query = "SELECT * FROM tbl_parametros where id_parametro=3";
  $result = mysqli_query($conexion, $query);
  
  while($row = mysqli_fetch_array($result)){
  
 
  $valormin =$row['valor'];
  
  }

  IF (isset($_POST["enviar"])){
    
  
    $user =   $_POST['Usuario'];
    $ncontra = $_POST['ncontra'];
    $rcontra =  $_POST['rcontra'];
    $sqluser = "SELECT  Nombre_Usuario from tbl_usuario WHERE Nombre_Usuario = '$user'";
    $resultado = ejecutarConsulta($sqluser);
    $filas = $resultado -> num_rows;
   
    
    if($rcontra == $ncontra){
            if($filas > 0){
              $clavehash=hash("SHA256",$ncontra);
              $sqluser = "UPDATE tbl_usuario SET Contraseña ='$clavehash' WHERE  Nombre_Usuario= '$user'  ";
              $resultado = ejecutarConsulta($sqluser);
             

                          
                        if($resultado > 0){
                          echo"<script>
                          alert('Exito');
                          window.location = 'index.php';
                          </script>";
                        }else {
                          "<script>
                              alert(' No existe');
                              
                              </script>";
                        }
                      }
                      
                     
                      
                    }
                    
                    else{
                      
                      echo"<script>
                      alert('Ambas claves son distintas');
                      </script>";
                    }
                }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Condimentos la Tipica</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="">

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
    
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini login-page register-page">
<div id=""></div>

<div class="register-box">
  <div class="register-logo">
    <img src="" class="img-responsive" style="padding:0px 80px 0px 80px">
  </div>

 <div class="register-box-body">
    <p class="login-box-msg">Cambio de Contraseña1</p>

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
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
    <label for="Ncontraseña1">Nombre de Usuario</label><br>
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre de Usuario" name="Usuario" id="Usuario"  
        onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required> 
    
      </div>

    
    <script languaje="javascript">
                          function CheckUserName(ele) {
                          if (/\s/.test(ele.value)) { bootbox.alert("no se permiten espacios en blanco"); }
                          }
                          

    </script>



<script>
                                function mostrarContrasena1(){
                                    var tipo = document.getElementById("ncontra");
                                    if(tipo.type == "password"){
                                        tipo.type = "text";
                                    }else{
                                        tipo.type = "password";
                                    }
                                }
                              </script>
          <label for="Ncontraseña1">Nueva Contraseña</label><br>
      <div class="form-group has-feedback">
      <div style="display: flex;">
        <input type="password" class="form-control" placeholder="Nueva Contraseña" name="ncontra" id="ncontra" minlength ="<?php echo $valormin; ?>" maxlength="<?php echo $valormax ?>"  orequired onBlur="CheckUserName(this);" required> 
        <button class="" type="button" onclick="mostrarContrasena1()"><span class="glyphicon  ">&#xe105;</span></button>
      </div>
      </div>


      <script>
                                function mostrarContrasena(){
                                    var tipo = document.getElementById("rcontra");
                                    if(tipo.type == "password"){
                                        tipo.type = "text";
                                    }else{
                                        tipo.type = "password";
                                    }
                                }
                              </script>
      <label for="Repetir">Repetir Contraseña</label><br>
      
      <div class="form-group has-feedback">
      <div style="display: flex;">
        <input type="password" class="form-control" placeholder="Repetir Contraseña" minlength ="<?php echo $valormin; ?>" maxlength="<?php echo $valormax ?>" name="rcontra" id="rcontra"   required onBlur="CheckUserName(this);" required>
        <button class="" type="button" onclick="mostrarContrasena()"><span class="glyphicon  ">&#xe105;</span></button>
      </div>
      </div>
        <!-- /.col -->
        <div class center="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar">Cambiar</button>

        </div>
        <br>
      </br>
        <!-- /.col -->
           
           <a href="index.php" class="text-center">Cancelar </a>
    </form>
  
 
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
    <!-- jQuery 2.1.4 -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/js/app.min.js"></script>
     <!-- DATATABLES -->
     <script src="../public/datatables/jquery.dataTables.min.js"></script>    
    <script src="../public/datatables/dataTables.buttons.min.js"></script>
    <script src="../public/datatables/buttons.html5.min.js"></script>
    <script src="../public/datatables/buttons.colVis.min.js"></script>
    <script src="../public/datatables/jszip.min.js"></script>
    <script src="../public/datatables/pdfmake.min.js"></script>
    <script src="../public/datatables/vfs_fonts.js"></script> 
    <script src="../public/js/bootbox.min.js"></script> 
    <script src="../public/js/bootstrap-select.min.js"></script>
</body>
</html>
        