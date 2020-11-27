<?php
session_start();
require "../config/Conexion.php";



if (isset($_SESSION["Nombre_Usuario"]))
{
    IF(isset($_POST["enviarrespuestas"])){

        $co =$_SESSION["Nombre_Usuario"];
        $a= $_POST["id_usuario"];
        $a2= $_POST["id_usuario_2"];
        $a3= $_POST["id_usuario_3"];
        $b= $_POST["r"];
        $b2= $_POST["r2"];
        $b3= $_POST["r3"];
        $query = "SELECT * from  tbl_usuario where Nombre_Usuario='$co' ";
        $result = mysqli_query($conexion, $query);
  
    while($row = mysqli_fetch_array($result)){
   
    $as = $row['id_usuario'];
    
 
        }

      
        IF ($a!="0" ){
        
          if($a!=$a2 and $a!=$a3 and $b!=$b2 and $b!=$b3 and $a2!=$a3 and $b2!=$b3){
         
        ejecutarConsulta("INSERT INTO tbl_preguntas_x_usuario (id_pregunta,id_usuario,respuesta,nun)  VALUES('$a','$as','$b','1')");
         ejecutarConsulta("UPDATE tbl_usuario SET nuevo=1 WHERE Nombre_Usuario='$co'")   ;	
         ejecutarConsulta("INSERT INTO tbl_preguntas_x_usuario (id_pregunta,id_usuario,respuesta,nun)  VALUES('$a2','$as','$b2','2')");
       	
         ejecutarConsulta("INSERT INTO tbl_preguntas_x_usuario (id_pregunta,id_usuario,respuesta,nun)  VALUES('$a3','$as','$b3','3')");
       
            
        echo "
        <script >
             alert('Todo salio bien ');
             window.location = 'login.html';
        </script>";
        
    
    
        }else{
          
          echo "
          <script >
         alert('Revise las preguntas o Respuestas no se pueden repetir ');
           
          </script>";}
    
    
    
    
    }




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
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="../public/css/smoke.min.css">
<link rel="stylesheet" href="../public/css/bootstrap.min.css">
<link rel="stylesheet" href="../public/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../public/css/fileinput.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini login-page register-page  ">
<div id=""></div>

<div class="register-box">
  <div class="register-logo">
    <img src="" class="img-responsive" style="padding:0px 80px 0px 80px">
  </div>

 <div class="register-box-body">

      
    <p class="login-box-msg">Preguntas de Seguridad</p>

    <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">

    <div style="padding-top:30px" class="panel-body" >
			<form id="loginform" class="form-horizontal" role="form" action="" method="POST" autocomplete="off">
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
          <div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 2</label>
<div class="col-sm-14">
  <select title="Preguntas" class='form-control' name='id_usuario_2' id='id_usuario_2' onchange="load(1);" required>	</select>
</div>
</div>
<div class="form-group">
    <label for="con_password" class="col-md-3 control-label">Respuestas</label>
    <div class="col-md-14">
      <input title="Respuesta de la Pregunta" id="r2" type="text" class="form-control" name="r2" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
    </div>
  </div>
  

  <div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 3</label>
<div class="col-sm-14">
  <select title="Preguntas" class='form-control' name='id_usuario_3' id='id_usuario_3' onchange="load(1);" required>	</select>
</div>
</div>
<div class="form-group">
    <label for="con_password" class="col-md-3 control-label">Respuestas</label>
    <div class="col-md-14">
      <input title="Respuesta de la Pregunta" id="r3" type="text" class="form-control" name="r3" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
    </div>
  </div>
     
  
       
       <!-- /.col -->
       <div class center="col-xs-4">
           
       <button type="submit" class="btn btn-primary btn-block btn-flat" name="enviarrespuestas">Enviar</button>
         
     
          </br>  
          <a href="login.html">Atras</a>  
          </div>

</body>
  <!-- jQuery 2.1.4 -->
  <script src="../public/js/jquery.min.js"></script>
   
   <script src="../public/js/smoke.min.js"></script>
   
   
   <script src="../public/js/fileinput.min.js"></script>
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
</html>