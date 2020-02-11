<?php
 require "../../modelos/conexion2.php";
  IF (isset($_POST["enviar"])){
    
    $contra =  $_POST['contraa'];
    $user =  strtoupper($_POST['usuario']);
    $ncontra = $_POST['ncontra'];
    $rcontra =  $_POST['rcontra'];
    $validarcontra = "SELECT  Contraseña from tbl_usuario WHERE Contraseña = '$contra'";
    $sqluser = "SELECT  Nombre_Usuario from tbl_usuario WHERE Nombre_Usuario = '$user'";
    $resultado = $conn -> query($sqluser);
    $filas = $resultado -> num_rows;
    $contraseña = "SELECT Contraseña from tbl_usuario  WHERE Contraseña = '$contra' ";
    $resultado2  = $conn -> query($contraseña);
    $filas2  = $resultado2 -> num_rows;
    if($filas2 > 0){
    if($rcontra == $ncontra){
            if($filas > 0){
              $sqluser = "UPDATE tbl_usuario SET Contraseña ='$ncontra' WHERE  Contraseña ='$contra' ";
              $resultado = $conn ->query($sqluser);
              if($contra  !=$contra)
              print("Contraseña Actual Incorrecta");

                          
                        if($resultado > 0){
                          echo"<script>
                          alert('exito');
                          window.location = '../../index.php';
                          </script>";
                        }else {
                          "<script>
                              alert(' no existe');
                              
                              </script>";
                        }
                      }
                      
                      else {
                        echo "<script>
                              alert('el usuario no existe');
                              
                              </script>";
                      }
                      
                    }
                    
                    else{
                      echo"<script>
                      alert('Las dos claves son distintas');
                      </script>";
                    }
                }else{   print"<script>
                  alert('Las Contraseña Actual es Incorrecta');
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

<body class="hold-transition skin-blue sidebar-mini login-page register-page">
<div id=""></div>

<div class="register-box">
  <div class="register-logo">
    <img src="" class="img-responsive" style="padding:0px 80px 0px 80px">
  </div>

 <div class="register-box-body">
    <p class="login-box-msg">Cambio de Contraseña</p>

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

       <label for="Usuariocambio">Usuario</label>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario"  required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <label for="ConActual">Contraseña Actual</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña actual" name="contraa" onkeyup="aaa(this, event)" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <label for="NContra">Nueva Contraseña</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Nueva Contraseña" name="ncontra" onkeyup="aaa(this, event)" required> 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <label for="Repetir">Repetir Contraseña</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repetir Contraseña" name="rcontra" onkeyup="aaa(this, event)" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <!-- /.col -->
        <div class center="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar">Cambiar</button>

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



