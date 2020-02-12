<?php


	$servername = "localhost";
    $username = "root";
  	$password = "";
    $dbname = "latipica1";
    

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }




            IF (isset($_POST["enviar1"])){
              $user = strtoupper( $_POST['NuevoUsuario']);
              $correo =  $_POST['Correo_Electronico'];
              $ncontra = $_POST['Ingresar_Contraseña'];
              $rcontra =  $_POST['Repetir_Contraseña'];
                   
                    $tipo =  $_POST['TipodeUsuario'] ;
                    
                    
                    
                   
                    
                      


                
                    $sqluser = "SELECT  Nombre_Usuario from tbl_usuario WHERE Nombre_Usuario = '$user'";
                    $resultado = $conn -> query($sqluser);
                    $filas = $resultado -> num_rows;
                    $contraseña = "SELECT  correo_electronico from tbl_usuario WHERE correo_electronico = '$correo'";
                  
                    $resultado2  = $conn -> query($contraseña);
                    $filas2  = $resultado2 -> num_rows;
                    if($filas2 == 0){
                          if($rcontra == $ncontra){
                                  if($filas == 0){
                                    $sqluser = "INSERT INTO  tbl_usuario (Nombre_Usuario , Contraseña , correo_electronico,estado_usuario,intentos) VALUES ('$user', '$rcontra', '$correo','Nuevo',0 ) ";                      
                              
                                    
                                    $resultado = $conn ->query($sqluser);
                                   

                                                
                                              if($resultado > 0){
                                                echo"<script>
                                                alert('exito ');
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
    <p >Agregar Usuario</p>

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
                 



      <div class="form-group has-feedback">
      
        <input type="text" class="form-control" placeholder="Usuario" name="NuevoUsuario"  required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
        <input type="password" class="form-control" placeholder="Nueva Contraseña" name="Ingresar_Contraseña"  onkeyup="aaa(this, event)" required> 
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
              <option value="Administrador">Administrador</option>
              <option value="Operador">Operador</option>
              </select>
            

      </div><br>
   
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