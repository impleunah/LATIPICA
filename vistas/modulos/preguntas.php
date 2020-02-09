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
    <p class="login-box-msg">Preguntas de Seguridad</p>

    <form method="post">

    <div style="padding-top:30px" class="panel-body" >
			<form id="loginform" class="form-horizontal" role="form" action="" method="POST" autocomplete="off">
				<div class="form-group">
				<label for="mod_rol" class="col-sm-3 control-label">Preguntas</label>
				<div class="col-sm-8">
				  <select title="Preguntas" class='form-control' name='mod_rol' id='mod_rol' onchange="load(1);">
							<option value="">Seleccione una Pregunta</option>			
															<option value="1">¿Cual es su color favorito ?</option>			
															<option value="2">¿Cuál sería tu trabajo ideal ?</option>			
															<option value="3">¿Nombre de la primera mascota  ?</option>			
															<option value="4">¿Mejor amigo(a) de la infancia ?</option>					
														</select>
				</div>
			  </div>
      <br>
      <br>
      <div class="form-group">
						<label for="con_password" class="col-md-3 control-label">Respuestas</label>
						<div class="col-md-9">
							<input title="Respuesta de la Pregunta" id="email" type="text" class="form-control" name="email" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
						</div>
					</div>
      <br>
      <br>
      <br>
       
       <!-- /.col -->
       <div class center="col-xs-4">
         
          <a href="http://localhost/LATIPICA/vistas/modulos/preguntacorreo.php " class="btn btn-primary btn-block btn-flat" style = "BACKGROUND-COLOR: green" >Enviar</a>
          </br>    

</body>
</html>