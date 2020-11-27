<?php
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
      <div class="content-wrapper ">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Entradas <button class="btn btn-primary" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                          <div class="box-tools pull-right">
                           <!-- Modal Contenido -->
                    
                        </div>
                    </div>
                    
                    <!-- /.box-header -->
                    <!-- centro -->

                    <!-- Contenido del Formulario -->
                    
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Editar</th>
                            <th>Id Entrada</th>
                            <th>Producto</th>
                            <th>Entrada</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                          </thead>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    <form name= "formulario" id= formulario method="POST">
                    <input type="hidden" name="id_entrada" id="id_entrada">
                    <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Producto:</label>  
                            <select class="form-control" name="idarticulo" id="idarticulo"  maxlength="11"  required>
                          </select>
                        </div>

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Entrada:</label>
                            <input type="number" class="form-control" name="entrada" id="entrada" maxlength="10" placeholder="Entrada" required>
                        </div>

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Motivo:</label>
                           <input type="text" class="form-control" name="motivo" id="motivo" maxlength="10" placeholder="Salida" required>
                        </div>
                      

                        <div class= "form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary"  type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>

                    </form>

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
  <script type="text/javascript" src="scripts/tbl_entrada.js"></script>
  <script type="text/javascript" src="scripts/combobox_producto.js"></script>

  <?php 
}
ob_end_flush();
?>