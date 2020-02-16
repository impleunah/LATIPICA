<?php
require "../../modelos/conexion2.php";
IF (isset($_POST["enviarrespuestas"])){

    $nombre=$_POST['usuario'];
    $pregunta=$_POST['mod_rol'];
    $repuesta=$_POST['ingRespuesta'];
  

    $porfin ="SELECT respuesta, Nombre_Usuario,  pregunta  from tbl_pregunta_x_usuario p
    join tbl_usuario u   on p.id_usuario =u.id_usuario  
    join tbl_preguntas pr on p.id_pregunta = pr.id_pregunta
    where u.Nombre_Usuario = '$nombre' && pr.pregunta ='$pregunta' && respuesta ='$repuesta'" ;

    $resultado1 = $conn -> query($porfin);
    $filas3 = $resultado1 -> num_rows;
  
    if($filas3 > 0  ){



       echo "<script>
        alert('exito');
        
        </script  >";


      }
      else{
        echo "<script>
        alert('usuario');
        
        </script  >";}
      }
?>


<!-- CODIGO HTML -->

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
    <p class="login-box-msg">Preguntas de Seguridad </p>

    <form method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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


<label for="mod_rol" class="col-sm-3 control-label"> Pregunta</label>
				<div class="col-sm-14">
				  <select title="Preguntas" class='form-control' name='mod_rol' id='mod_rol' onchange="load(1);">
              <option value="">Seleccionar Preguntas de Seguridad</option>
              <option value="color">Cúal es su color favorito?</option>
              <option value="Trabajo">Cúal seria su trabajo ideal?</option>
              <option value="Mascota">Nombre de su primera mascota?</option>
              <option value="Amigo">Mejor amigo de la infancia?</option>				
														</select>
				</div>
      <br>

      <div class="form-group">
						<label for="con_respuesta" class="col-md-3 control-label" name="repuesta">Respuesta</label>
						<div class="col-md-14">
							<input title="Respuesta de la Pregunta"  type="text" class="form-control" name="ingRespuesta" placeholder="Escriba su Respuesta" required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) ">
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

<br>
        <!-- /.col -->
        <div class center="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviarrespuestas">Enviar</button>
        </div>
    
        <a href="http://localhost/LATIPICA/vistas/modulos/recuperarcontraseña.php" class="text-center">Atras </a>

  
    </form>

</body>
</html>