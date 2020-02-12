<?php


  require "../../modelos/conexion2.php";
  require "../../controladores/usuario.controlador.php";
 

  session_start();
  $ssss= $_SESSION['u'];

            IF (isset($_POST["enviar1"])){
             
                    $pregunta =  $_POST['Preguntas'];
                    $repuesta =  $_POST['Respuesta_seguridad'];
                                    $sqluser3 = "UPDATE  tbl_usuario SET estado_usuario ='activo' where Nombre_Usuario = '$ssss'";                      
                                    $resultado = mysqli_query($conn,$sqluser3);
                                    $userr1 = $conn->insert_id;

                                    $insertardos=$conn->query("INSERT INTO   tbl_preguntas (pregunta,creado_Por) VALUES ('$pregunta','$userr1') ");

                                    $insertarUno=$conn->query("INSERT INTO   tbl_pregunta_x_usuario(respuesta,id_pregunta) VALUES ('$repuesta', '$conn->insert_id' ) ");
                                    
                                    $resultado1 = $conn ->query($sqluser3);
                                   

                                                
                                              if($resultado1 > 0){
                                                echo"<script>
                                                alert('exito ');
                                                window.location = '../../index.php';
                                                </script>";
                                              }else {
                                                "<script>
                                                    alert(' no existe');
                                                    
                                                    </script  >";
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
    <p >Preguntas</p>

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
                 



      <div >        
          <div >
          <label for="SP">Seleccionar Preguntas de Seguridad</label>
            <span ><i"></i></span>
            <select class="form-control " name="Preguntas">
              <option   value="">Seleccionar Preguntas de Seguridad</option>
              <option value="color">Cúal es su color favorito?</option>
              <option value="Trabajo">Cúal seria su trabajo ideal?</option>
              <option value="Mascota">Nombre de su primera mascota?</option>
              <option value="Amigo">Mejor amigo de la infancia?</option>
            </select>
      </div>
      </div><br>
      <label for="RS">Respuesta Seguridad</label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Respuesta seguridad" name="Respuesta_seguridad"  >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

   
        <!-- /.col -->
        <div class center="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviar1">Guardar Usuario</button>

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