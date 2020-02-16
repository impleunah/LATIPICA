
<?php
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "latipica1";
  

$conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
      die("Conexión fallida: ".$conn->connect_error);
    }
?>

  
  <div class="content-wrapper">

  
    <section class="content-header">
      <h1>
        Mantenimiento de Usuario

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>
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

      <div class="row">
      <div class="col-sm-6">
      <div class="dataTables_length" id="tableListar_length">
      <label>Mostrar <select name="tableListar_length" aria-controls="tableListar" >
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        </select> registros por página</label></div></div></div>

        <div class="row">
        <div class="col-sm-6"><div id="tableListar_filter" class="dataTables_filter">
        <label for="Buscar"> Buscar </label>
        <label><input type="search" class="form-control input-sm" 
         placeholder="Buscar" aria-controls="tableListar"></label></div></div></div>
    
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
            </tbody>
        </div>

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
      //  $crearUsuario -> ctrCrearUsuario();

       ?>

    </form>
    </div>

 </div>

</div>


