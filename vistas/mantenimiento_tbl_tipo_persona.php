<?php
ob_start();
session_start();
if (!isset($_SESSION['Nombre_Usuario']))
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
                          <button class="btn btn-success" id="boton" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                          <th>editar</th>
                            <th>Id_tipo_persona </th>
                            <th>tipo_persona</th>
                            <th>estado</th>
                
                        <!--  </thead> MUESTRA LOS ENCABEZADOS DEL TITULO DE CADA CAMPO EN LA PARTE DE ABAJO DE LA TABLA
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Id_tipo_persona </th>
                            <th>tipo_persona</th>
                            <th>estado</th>

                          </tfoot>-->
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <input type="hidden" name="id_tipo_persona" id="id_tipo_persona">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>tipo_persona:</label>
                         <input type="text" class="form-control" name="tipo_person" id="tipo_person" maxlength="200" placeholder="Escriba el tipo persona" required>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>estado:</label>
                         <input type="text" class="form-control" name="estado" id="estado" maxlength="256" placeholder="estado" required>
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
  require 'footer.php';
 
  ?>
  <script type="text/javascript" src="scripts/tbl_tipo_persona.js"></script>

<?php
}
require 'permisos/manteni.php';
ob_end_flush();
?>

   