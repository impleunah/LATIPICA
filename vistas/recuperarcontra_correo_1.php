<?php 
require "../config/Conexion.php";
require 'PHPMailer/PHPMailerAutoload.php';
  $sqluser = "SELECT Nombre_Usuario from usuarios";
  $nombre=ejecutarConsulta($sqluser);

if (isset($_POST["ENVIAR"]))
{

  $_SESSION['correo']=strtoupper($_POST['txtCorreoelectronico']);
  $correo1 = strtoupper($_POST['txtCorreoelectronico']);
  $sqluser = "SELECT Nombre_Usuario from tbl_usuario where Nombre_Usuario='$correo1'";
  $resultado=ejecutarConsulta($sqluser);
  $filas= $resultado-> num_rows;
  $query6= "SELECT correo_electronico FROM tbl_usuario where Nombre_Usuario='$correo1' ";
    $result6 = mysqli_query($conexion, $query6);

while($row6 = mysqli_fetch_array($result6)){
  $correo_electronico = $row6['correo_electronico'];
}

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
            $mail->addAddress ( $correo_electronico);
            $url = "http://localhost/la/LATIPICA_01/vistas/preguntacorreo.php";
            $mail->Subject = 'Recuperacion de Clave - Condimentos la tipica';
            $mail->Body    =  "Hola : <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";
            $mail->isHTML(true);

            echo"<script>
            alert('El correo ha sido enviado: Favor verificar');
            window.location = 'index.php';
            </script>";

            if (!$mail->send()) {
              echo '<script>
              Swal.fire({
                type: "success",
                title: "!Enviado!",
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
        alert('La dirección de correo No existe');
  
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



    <label for="Contracorreo">Ingrese Su Usuario</label><br>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Ingrese Su Usuario" name= "txtCorreoelectronico"
        onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
        <span class="fa fa-user form-control-feedback"></span>
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
      <a href="recuperarcontraseña_1.php" class="text-center">Atras </a>
    </form>
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