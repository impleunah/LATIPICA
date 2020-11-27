
<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <h1 class="box-header with-border">Parametros </h1>
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>Parametro</th>
                            <th>Descripcion</th>
                            <th>Valor</th>    
                            <th>Estado</th>               
                          </thead>
                          <tbody>                            
                          </tbody>        
                          </tfoot>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="id_parametro" id="id_parametro">
                            <input type="text" class="form-control"  readonly="readonly" name="id_usuario" id="id_usuario" maxlength="50" placeholder="Parametro" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Valor:</label>
                          <input type="number" class="form-control" name="valor" id="valor"  min="1"  max="20" placeholder="valor" required>
                           
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Descripción:</label>
                          <input type="text" class="form-control" readonly="readonly" name="descripcion" id="descripcion" maxlength="100" placeholder="descripcion">
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
<script type="text/javascript" src="scripts/tbl_parametros.js"></script>
<?php 
}
require 'permisos/segurida.php';
ob_end_flush();
?>