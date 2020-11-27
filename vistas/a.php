<?php


  require "../../modelos/conexion2.php";
  require "../../controladores/usuario.controlador.php";
 

  session_start();
  $ssss= $_SESSION['u'];

            IF (isset($_POST["enviar1"])){
             
                    $pregunta =  $_POST['Preguntas'];
                    $repuesta =  $_POST['Respuesta_seguridad'];
                                    $sqluser3 = "UPDATE  tbl_usuario SET estado_usuario ='activo' where Nombre_Usuario = '$ssss'";                      
                                    $sql = "SELECT id_usuario  from tbl_usuario WHERE Nombre_Usuario = '$ssss'"; 
                                    $consulta = mysqli_query($conn,$sql);
                                    if($row =mysqli_fetch_array($consulta)){
                                        $var1=$row["id_usuario"];

                                    $insertardos=$conn->query("INSERT INTO   tbl_preguntas (pregunta,creado_Por) VALUES ('$pregunta','$userr1') ");
                                    $insertarUno=$conn->query("INSERT INTO   tbl_pregunta_x_usuario(respuesta,id_pregunta,id_usuario) VALUES ('$repuesta', '$conn->insert_id','$var1') ");
                                    
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
                                              else{"<script>
                                                alert(' no existe');
                                                
                                                </script  >";}
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
              <option value="">Seleccionar Preguntas de Seguridad</option>
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