<?php 
require "../../modelos/conexion2.php";
require 'PHPMailer/PHPMailerAutoload.php';
  $sqluser = "SELECT Nombre_Usuario from usuarios";
  $nombre=$conn-> query ($sqluser);

if (isset($_POST["ENVIAR"]))
{

  $correo = $_POST['txtCorreoelectronico'];
  $sqluser = "SELECT correo_electronico from tbl_usuario where correo_electronico='$correo'";
  $resultado=$conn-> query ($sqluser);
  $filas= $resultado-> num_rows;

    if($filas > 0){
    $mail=new PHPMailer(); 
    $mail->isSMTP();  

            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';//Modificar
            $mail->Host = 'smtp.gmail.com';//Modificar
            $mail->Port = '587';//Modificar
            $mail->Username = 'latipicahn20@gmail.com'; //Modificar
            $mail->Password = 'LATIPICAHN20'; //Modificar               //smtp port
            $mail->setFrom('latipicahn20@gmail.com', 'Condimentos La Tipica');
            $mail->addAddress ($correo);
            $url = "http://localhost/LATIPICA/vistas/modulos/preguntacorreo.php";
            $mail->Subject = 'Recuperación de contraseña - Condimentos la tipica';
            $mail->Body    =  "Hola : <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";;
            $mail->isHTML(true);

            echo"<script>
            alert('Correo enviado...!!!! Porfavor Verifique su correo ');
      
            </script>";

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
              </script>';
          }
    }
      
      else{
        echo"<script>
        alert('CORREO NO EXISTE');
  
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

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
    <label for="Contracorreo">Ingrese Su Correo</label><br>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Ingrese su Correo" name= "txtCorreoelectronico">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <br>
      </br>
      
        <!-- /.col -->
        <div class center="col-xs-4">
          <button type="submit" style ="BACKGROUND-COLOR: green  " name= "ENVIAR"
          class="btn btn-primary btn-block btn-flat">ENVIAR </button>

        </div>
        <br>
      </br>
      <a href="../modulos/recuperarcontraseña.php" class="text-center">Atras </a>
    </form>
    
</body>
</html>