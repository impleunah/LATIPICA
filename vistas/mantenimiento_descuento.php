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
                    <h1 class="box-header with-border">Mantenimiento de Descuento </h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones </th> 
                            <th>  # </th>                   
                            <th>Descripcion</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    </div>


                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Descripcion:</label>
                        <input type="hidden" name="id_descuento" id="id_descuento">
                         <input type="number"  min="1" max="100"  class="form-control" name="descripcion" id="descripcion" maxlength="25" placeholder="Descripcion" required>
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
  <script type="text/javascript" src="scripts/mantenimiento_descuento.js"></script>

  <?php 
}
require 'permisos/manteni.php';
ob_end_flush();
?>