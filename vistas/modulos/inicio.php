
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
<form>
<h1><center>
         Usuarios
        </center>
      </h1>
				<center><div class="panel panel-success" style="background-color: #A5C9DE ">
			      <i class='glyphicon glyphicon-share'  title="salir de la consulta" onclick="load(1)"></i>
				  <input type="date" id="bd-desde"  /><input type="date" id="bd-hasta"  />
				  <a target="_blank" href="javascript:reportePDF();"style="background:#FF4233 ;" class="btn btn-primary">Generar Reporte</a>
				</center>
			</form>
      <div class="row">
      <div class="col-sm-6">
      <div class="dataTables_length" id="tableListar_length">
      <label>Mostrar <select name="tableListar_length" aria-controls="tableListar" ><
        option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        </select> registros por página</label></div></div>
        <div class="row">
        <div class="col-sm-6"><div id="tableListar_filter" class="dataTables_filter">
        <label><input type="search" class="form-control input-sm" placeholder="Buscar" aria-controls="tableListar"></label></div></div></div>
    
       <div class="box-body">

          <div class="table-responsive">

          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                    <div class="row">
                      <div class="col-sm-12">
                <table class="table table-bordered table-striped tablas dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                
            <thead>
              <tr role="row"><th style="width: 9.91319px;" 
              class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: Activar para ordenar la columna de manera descendente">#</th><th
               class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: Activar para ordenar la columna de manera ascendente" style="width: 125.469px;">
              Nombre</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Usuario: Activar para ordenar la columna de manera ascendente" style="width: 108.802px;">
              Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Foto: Activar para ordenar la columna de manera ascendente" style="width: 73.2465px;">
              Correo</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tipo de Usuario: Activar para ordenar la columna de manera ascendente" style="width: 188.802px;">
              Rol</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Estado: Activar para ordenar la columna de manera ascendente" style="width: 97.691px;">
              Estado</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Ultimo login: Activar para ordenar la columna de manera ascendente" style="width: 185.469px;">
              Ultimo login</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Acciones: Activar para ordenar la columna de manera ascendente" style="width: 118.681px;">
              Acciones</th></tr>
            </thead>
            <tbody>
              
            <tr role="row" class="odd">
                <td class="sorting_1"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td></td>
                <td>
                  
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>

                </td>

              </tr></tbody>
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


