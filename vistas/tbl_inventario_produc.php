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
                          <h1 class="box-title">Inventario Producto <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->

                    <!-- Contenido del Formulario -->
                    
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>Empresa</th>
                            <th>Producto</th>
                            <th>Operacion</th>
                            <th>Cantidad</th>
                            <th>C/U Venta</th>
                            <th>C/U Compra</th>
                            <th>Fecha</th>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Estado</th>
                          
                          </thead>
                        </table>
                     
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    
                    <form name= "formulario" id= formulario method="POST">
                    <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Usuario</label>
                            <span class="fa fa-user form-control-feedback"></span>
                            <input type="hidden" name="id_inventarioproducto" id="id_inventarioproducto">
                            
                            <select type="text" class="form-control" name="id_producto" id="id_producto" maxlength="50"  required>
                            </select>
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
  <script type="text/javascript" src="scripts/tbl_inventario_produc.js"></script>
  <script type="text/javascript" src="scripts/combobox_producto.js"></script>

   
<?php 
}
ob_end_flush();
?>
