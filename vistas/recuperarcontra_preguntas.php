<?php
session_start();
require "../config/Conexion.php";

$query = "SELECT * FROM tbl_parametros where id_parametro=1";
$result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){


$valor =$row['valor'];

}

IF (isset($_POST["enviarrespuestas"])){
    $_SESSION['usuario1'] = $_POST['usuario'];
    $nombre=$_POST['usuario'];
   if(empty($_POST["id_usuario"])){$a  = ' ';}else{  $a= $_POST["id_usuario"]  ;};
   if(empty($_POST["id_usuario_2"])){$a2  = ' ';}else{  $a2= $_POST["id_usuario_2"]  ;};
   if(empty($_POST["id_usuario_3"])){$a3  = ' ';}else{  $a3= $_POST["id_usuario_3"]  ;};
   if(empty($_POST["r"])){$b  = ' ';}else{  $b= $_POST["r"] ;};
   if(empty($_POST["r2"])){$b2  = ' ';}else{  $b2= $_POST["r2"] ;};
   if(empty($_POST["r3"])){$b3  = ' ';}else{  $b3= $_POST["r3"] ;};

   
   
    $query = "SELECT * from  tbl_usuario where Nombre_Usuario='$nombre'";
    $result = mysqli_query($conexion, $query);

        while($row2 = mysqli_fetch_array($result)){

        $as = $row2['id_usuario'];


    }
    if($valor==1){
        

            $filas= ejecutarConsulta_row("SELECT * from tbl_preguntas_x_usuario 
           
            where id_usuario = '$as' && id_pregunta='$a' && respuesta ='$b' " );
    
    
    
            if($filas == 1   ){
        
        
        
                echo "<script>
                
                window.location = 'contrapreguntacorreo.php';
                </script  >";
        
        
              }
              else{
              
                echo "<script>
                alert('Verifique los datos e intente de nuevo ');
                
                </script>";}
        
            

              }
    if($valor==2){


        if($a!=$a2 and $b!=$b2 ){


            $filas= ejecutarConsulta_row("SELECT * from tbl_preguntas_x_usuario 
           
            where id_usuario = '$as' && id_pregunta='$a' && respuesta ='$b' " );
    
    
            $filas2=ejecutarConsulta_row("SELECT *  from tbl_preguntas_x_usuario 
           
            where id_usuario= '$as' && id_pregunta ='$a2' && respuesta ='$b2' " );
    
    
    
    
           
    
            if($filas == 1 and $filas2 == 1   ){
        
        
        
                echo "<script>
                
                window.location = 'contrapreguntacorreo.php';
                </script  >";
        
        
              }
              else{
              
                echo "<script>
                alert('Verifique los datos e intente de nuevo ');
                
                </script>";}
        
            }else{
              
            echo "
            <script >
           alert('Revise las preguntas o Respuestas no se pueden repetir ');
             
            </script>";}


            }

   if($valor==3){
     
      if($a!=$a2 and $a!=$a3 and $b!=$b2 and $b!=$b3 and $a2!=$a3 and $b2!=$b3){


        $filas= ejecutarConsulta_row("SELECT * from tbl_preguntas_x_usuario 
       
        where id_usuario = '$as' && id_pregunta='$a' && respuesta ='$b' " );


        $filas2=ejecutarConsulta_row("SELECT *  from tbl_preguntas_x_usuario 
       
        where id_usuario= '$as' && id_pregunta ='$a2' && respuesta ='$b2' " );




        $filas3=ejecutarConsulta_row("SELECT *  from tbl_preguntas_x_usuario 
     
        where id_usuario='$as' && id_pregunta ='$a3' && respuesta ='$b3' "   );

        if($filas == 1 and $filas2 == 1  and $filas3 == 1  ){
    
    
    
            echo "<script>
            
            window.location = 'contrapreguntacorreo.php';
            </script  >";
    
    
          }
          else{
          
            echo "<script>
            alert('Verifique los datos e intente de nuevo ');
            
            </script>";}
    
        }else{
          
        echo "
        <script >
       alert('Revise las preguntas o Respuestas no se pueden repetir ');
         
        </script>";}
        /*               */
        }
        /* */

    }



?>


<!-- CODIGO HTML -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Condimentos la Tipica</title>
    <div class="login-logo ">
        <!--imagen-->
        <img id="back">

    </div>


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
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

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
                <label for="mod_rol" class="col-sm-6 control-label">Usuario</label>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" required
                        onkeypress="return soloLetras(event)" onkeyup="aaa(this, event) "
                        style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <span class="fa fa-user form-control-feedback"></span>
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
                function soloLetras(e) {
                    key = e.keyCode || e.which;
                    tecla = String.fromCharCode(key).toLowerCase();
                    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                    especiales = "8-37-39-46";

                    tecla_especial = false
                    for (var i in especiales) {
                        if (key == especiales[i]) {
                            tecla_especial = true;
                            break;
                        }
                    }

                    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                        return false;
                    }
                }
                </script>


<div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 1</label>
<div class="col-sm-14">
  <select title="Preguntas" class='form-control' name='id_usuario' id='id_usuario'required onchange="load(1);"> 	</select>
</div>
</div>
<div class="form-group">
        <label for="con_password" class="col-md-3 control-label">Respuestas</label>
        <div class="col-md-14">
            <input title="Respuesta de la Pregunta" id="r" type="text" class="form-control" name="r" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
        </div>
</div>


<?php if( $valor==2 or  $valor==3) {echo'

<div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 2</label>
<div class="col-sm-14">
<select title="Preguntas" class="form-control" name="id_usuario_2" id="id_usuario_2" onchange="load(1);" required>	</select>
</div>
</div>
<div class="form-group">
<label for="con_password" class="col-md-3 control-label">Respuestas</label>
<div class="col-md-14">
<input title="Respuesta de la Pregunta" id="r2" type="text" class="form-control" name="r2" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
</div>
</div>
';}
?>




<?php if( $valor==3) {echo'
<div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 3</label>
<div class="col-sm-14">
<select title="Preguntas" class="form-control" name="id_usuario_3" id="id_usuario_3"onchange="load(1);" required>	</select>
</div>
</div>
<div class="form-group">
<label for="con_password" class="col-md-3 control-label">Respuestas</label>
<div class="col-md-14">
<input title="Respuesta de la Pregunta" id="r3" type="text" class="form-control" name="r3" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
</div>
</div>
';}
?>
                    <!-- /.col -->
                    <div class center="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"
                            name="enviarrespuestas">Enviar</button>
                    </div>

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

            <script type="text/javascript" src="scripts/combobox_preguntas_1.js"></script>
            <script type="text/javascript" src="scripts/combobox_preguntas_2.js"></script>
            <script type="text/javascript" src="scripts/combobox_preguntas_3.js"></script>


</body>

</html>