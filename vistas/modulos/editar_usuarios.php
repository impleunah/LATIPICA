<?php


	$servername = "localhost";
    $username = "root";
  	$password = "";
    $dbname = "latipica1";
    

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      

            if (isset($_POST["actualizar"])){
			  $userid = $_POST['id_usuario'];
			  $Nombre = $_POST['Nombre_Usuario'];
			  $rol =  $_POST['id_rol'];
              $correo =  $_POST['correo_electronico'];
              $estado = $_POST['estado_usuario'];
                   
            
                    $sqluser = "UPDATE tbl_usuario SET 
					Nombre_Usuario=$Nombre, 
					id_rol=$rol,
					correo_electronico=$correo,
					estado_usuario=$estado,
					WHERE id_usuario = '$userid'";


                    $resultado = $conn -> query($sqluser);          
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
    <p >Actualizar Usuario</p>

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
                 



      <div class="form-group has-feedback">
      <label for="NUserioo">Id Usuario</label>
        <input type="text" class="form-control" placeholder="Id usuario" name="id_usuario" required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
          <div>
<label for="NUserioo">Nombre Usuario</label>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombre Usuario" name="Nombre_Usuario">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>    
		<div >
            
      <label for="rolseleccionar">Seleccionar rol</label>
            <select class="form-control " name="Id_rol">
              <option value="">"Seleccionar rol"</option>
              <option value="1">Administrador</option>
              <option value="2">Operador</option>
    
              </select>
      </div>
       
        <label for="Ncontraa">Correo electronico</label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Correo Electronico"  name="correo-electronico">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div >
            
      <label for="estadoseleccionar">Seleccionar estado</label>
            <select class="form-control " name="estado_usuario">
              <option value="">"Seleccionar Usuario"</option>
              <option value="1">Activo</option>
              <option value="9">Nuevo</option>
              <option value="10">bloqueado</option>
              </select>
          
      </div>
      <br>
   
        <!-- /.col -->
        <div class center="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="actualizar">Actualizar Usuario</button>

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