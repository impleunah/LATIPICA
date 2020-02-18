<?php
  include "modelos/conexion2.php";
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>Mantenimiento Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Usuario</li>
      </ol>
    </section>

 <div class="box">
  <form enctype="multipart/form-data" name="formulario" method="post" >
  <section class="content">
      <div class="box">
        <div class="box-header with-border">
        <a class="btn btn-primary"  style="background:#2A9BDC  ;" href="vistas/modulos/registro_ussario.php">
          Agregar Usuario
       </a>
       </div>
       <form>
				<center>
        <div class="panel panel-success" style="background-color: #A5C9DE ">
			  <i class='glyphicon glyphicon-share'  title="salir de la consulta" onclick="load(1)"></i>
				<input type="date" id="bd-desde"  /><input type="date" id="bd-hasta"  />
				<a target="_blank" href="javascript:reportePDF();"style="background:#2DC248 ;" class="btn btn-primary">Generar Reporte</a>
				</center>
			</form>
      
      <div class="box-body">
       <div class="table-responsive">
       <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                
            <thead>
              <tr>
              <th style="width:8px">#</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Fecha de creacion </th>
                <th>Ultima Conexion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <?php
      $sql="SELECT id_rol,Nombre_Usuario,correo_electronico,estado_usuario,fecha_creacion,ultima_conexion FROM tbl_usuario";
      $resultado=$conn-> query ($sql);
      while ($mostar=mysqli_fetch_array($resultado)){
      ?>
            <tr>
                <td class="sorting_1"></td>
                <td> <?php echo $mostar['Nombre_Usuario']?></td>
                <td><?php echo $mostar['id_rol']?></td>
                <td><?php echo $mostar['correo_electronico']?></td>
                <td><?php echo $mostar['estado_usuario']?></td>
                <td><?php echo $mostar['fecha_creacion']?></td>
                <td><?php echo $mostar['ultima_conexion']?></td>
                <td><a class="btn btn-primary"  style="background:#FE9227   ;"href="vistas/modulos/editar_usuarios.php">actualizar </a>
                </td>
               </tr>
               <?php
               }
            ?>
                </div>
        </div>
      </div> 
    </div>
    </section>
    

     <! -- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  
 <!-- <div class="modal-dialog">-->

    <!-- Modal content-->
    <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data"  action="<?php $_SERVER["PHP_SELF"]; ?> ">
      <div class="modal-header" style="background:#001F3F; color:white" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>
      <label for="NUser">Agregar Usuario</label>
    
      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
          

            <input type="text" class="form-control input-lg" name="NuevoUsuario" placeholder="Ingresar Usuario" required>
            
          </div>
          
         
          </div>
          <label for="NUserioo">Correo Electronico</label>
          <div class="form-group">
   
          <div class="input-group">
      
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
           
            <input type="text" class="form-control input-lg" name="Correo Electronico" placeholder="Correo Electronico" required>
          </div>
          

          </div>

          <div class="form-group">
          
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="text" size="15" maxlength="5" value="Contraaa" name="Igresar Contraseña">
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
</body>
</html>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
