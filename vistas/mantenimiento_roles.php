<?php
ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php'


?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper ">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                 
                    <div class="box-header with-border">
                    <button class="btn btn-primary" id="boton" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> 

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <h1 class="box-header with-border">Roles </h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>Rol</th>
                            <th>Descripcion</th>
                            <th>Fecha Creación</th>
                            <th>Creado Por</th>
                            <th>Fecha Modificacion</th>
                            <th>Modificado Por</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <input type="hidden" name="id_rol" id="id_rol">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Rol:</label>
                         <input type="text" class="form-control" name="rol" id="rol" maxlength="30" placeholder="Escriba el rol" style="text-transform:uppercase;" onkeypress="return soloLetras(event)" onpaste="return false;" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Descripcion:</label>
                         <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="100" placeholder="Descripcion" style="text-transform:uppercase;"  required>
                    </div>
                    
                    </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <?php
  require 'footer.php'
  
  ?>
  <script type="text/javascript" src="scripts/tbl_roles.js"></script>

  <?php 
}
require 'permisos/segurida.php';
ob_end_flush();
?>