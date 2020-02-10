



  <div class="content-wrapper">

  
    <section class="content-header">
      <h1>
        Administrar Usuarios

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Usuarios</li>

      </ol>

    </section>


    <section class="content">

      <div class="box">

        <div class="box-header with-border">

        <a class="btn btn-primary"  href="vistas/modulos/registro_ussario.php">
          Agregar Usuario

       </a>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   <!--=============================================================================================================
  =            MODAL USUARIO            =
  ==================================================================================================================->

  <! -- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data"  action="<?php $_SERVER["PHP_SELF"]; ?> ">
      <div class="modal-header" style="background:#001F3F; color:white" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="text" class="form-control input-lg" name="NuevoUsuario" placeholder="Ingresar Usuario" required>
          </div>


          </div>

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="text" class="form-control input-lg" name="Correo Electronico" placeholder="Correo Electronico" required>
          </div>
          

          </div>

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control input-lg" name="Ingresar Contraseña" placeholder="Ingresar Contraseña" required>
          </div><br> 

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control input-lg" name="Repetir Contraseña" placeholder="Repetir Contraseña" required>
          </div>
          
          </div>

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users" name="tipo"></i></span>

            <select class="form-control input-lg" name="TipodeUsuario">
              <option value="">"Seleccionar Usuario"</option>
              <option value="Administrador">Administrador</option>
              <option value="Operador">Operador</option>
              </select>
            

      </div><br>
              

            
             <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>

            <select class="form-control input-lg" name="Preguntas">
              <option value="">"Seleccionar Preguntas de Seguridad"</option>
              <option value="color">Cúal es su color favorito?</option>
              <option value="Trabajo">Cúal seria su trabajo ideal?</option>
              <option value="Mascota">Nombre de su primera mascota?</option>
              <option value="Amigo">Mejor amigo de la infancia?</option>


              
              
              

            </select>
            

      </div><br>

      <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="text" class="form-control input-lg" name="Respuesta seguridad" placeholder="Respuesta seguridad" required>
          </div>
          
+

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" name="enviar1">Guardar Usuario</button>
      </div>
      <?php 
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

       ?>

    </form>
    </div>

 </div>

</div>


