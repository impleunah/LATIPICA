<?php 
require "../../modelos/conexion2.php";
require 'PHPMailer/PHPMailerAutoload.php';

if (isset($_POST["ENVIAR"]))
{
  $correo=$_POST['txtCorreoElectronico'];
  $sqluser="SELECT correo_electronico from usuarios where correo_electronico='$correo'";
  //$resultado=$conn-> query ($sqluser);
  IF ($correo==$correo){

    $mail=new PHPMailer(); 
    $mail->isSMTP();  
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'latipicahn@gmail.com';   //username
            $mail->Password = 'Najera2716.';   //password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;                    //smtp port

            $mail->setFrom('latipicahnt@gmail.com', 'Condimentos La Tipica');
            $mail->addAddress($correo);

            $mail->Subject = 'Recuperación de contraseña - Condimentos la tipica';
            $mail->Body    = 'ffffffffffff';
            $mail->isHTML(true);

            if (!$mail->send()) {
              echo '<script>
              Swal.fire({
                type: "success",
                title: "!ENVIADO!",
                showConfirmButton: "true",
                confirmButtonText: "Entrar",
                closeOnConfirm: "false"
              
              }).then((result)=>{
                
                if (result.value){
    
                  window.location = "inicio";
                }
              });
              </script>';
          } else {
              echo '<script>
              Swal.fire({
                type: "error",
                title: "!Error al enviar!",
                showConfirmButton: "true",
                confirmButtonText: "Intentar de nuevo",
                closeOnConfirm: "false"
              
              }).then((result)=>{
                
                if (result.value){
    
                  window.location = "login";
                }
              });
              </script>';;;
          }
      }
    }
//else

        //echo  "<script> alert ('ERROR CORREO NO COICIDEN');
       // </script>
       // ";


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

<body class="hold-transition skin-blue sidebar-mini login-page register-page  ">
<div id=""></div>

<div class="register-box">
  <div class="register-logo">
    <img src="" class="img-responsive" style="padding:0px 80px 0px 80px">
  </div>

 <div class="register-box-body">
 <br>
      </br>
    <p class="login-box-msg">Recuperar Contraseña Via Correo electronico</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Ingrese su Correo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <br>
      </br>
      
        <!-- /.col -->
        <div class center="col-xs-4">
          <button type="submit" style ="BACKGROUND-COLOR: green "
          class="btn btn-primary btn-block btn-flat">ENVIAR </button>

        </div>
        <br>
      </br>
      <a href="http://localhost/LATIPICA/vistas/modulos/recuperarcontraseña.php" class="text-center">Atras </a>
    </form>
    
</body>
</html>