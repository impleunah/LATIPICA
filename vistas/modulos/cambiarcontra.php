<?php
 require "../../modelos/conexion2.php";
  IF (isset($_POST["enviar"])){
    
    $contra =  $_POST['contraa'];

    $user =  $_POST['usuario'];
    $ncontra = $_POST['ncontra'];
    $rcontra =  $_POST['rcontra'];
    $sqluser = "SELECT  Nombre_Usuario from usuarios WHERE Nombre_Usuario = '$user'";
    $resultado = $conn -> query($sqluser);
    $filas = $resultado -> num_rows;
   if($rcontra == $ncontra){
            if($filas > 0){
              $sqluser = "UPDATE usuarios SET Contraseña ='$ncontra' WHERE  Contraseña ='$contra' ";
              $resultado = $conn ->query($sqluser);
              if($sqluser > 0){
                echo"<script>
                alert('exito');
                window.location = 'index.php';
                </script>";
              }else {
                "<script>
                    alert(' no existe');
                    window.location = 'index.php';
                    </script>";
              }
            }
            else {
              echo "<script>
                    alert('el usuario no existe');
                    window.location = 'index.php';
                    </script>";
            }
          }
  else {
    print"<script>
    alert('Las dos claves son distintas');
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
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña actual" name="contraa">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Nueva Contraseña" name="ncontra"> 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Repetir Contraseña" name="rcontra">
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
