<!--imagen<div id="back"></div>-->


<div class="login-box  login-page">

  <div class="login-logo "  >
    <!--imagen-->
    <img   id="back" >
    
  </div>

  <div class="login-box-body " >

    <p class="login-box-msg">Ingresar al Sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" title="Primera Letra de Nombre,Apellido" placeholder="Usuario" name="ingUsuario" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" title="Contraseña" placeholder="Contraseña" name="ingPassword" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>  

      <div class="row">

        <div class center ="col-xs-4">

          <button type="submit" id="Ingresar" class="btn btn-primary btn-block btn-flat">Ingresar</button>
       
        </div>
        <br>
      </div>

      <?php

      $login = new ControladorUsuarios();
      $login -> ctrIngresoUsuario();
      
      ?>

    </form>
   <br>

   </br>
   <a href="vistas/modulos/recuperarcontraseña.php" >Recuperar la Contraseña</a>

  </div>

</div>
