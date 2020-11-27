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
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title"> <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Editar</th>
                            <th>#</th>
                            <th>cliente</th>
                            <th>Telefono o Direccion</th>
                            <th>tipo</th>
                            <th>Descripcion</th>

                          
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                     
                        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
      <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>cliente:</label>
                            <input type="hidden" name="id_telefono_direccion" id="id_telefono_direccion">
                            <input type="text" class="form-control" name="id_cliente" id="id_cliente" maxlength="256" placeholder="cliente">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              
                              <label for="usuarioseleccionar">Telefono o Direccion</label>
                                    <select class="form-control " name="Tipo_Telefono_Direccion" id="Tipo_Telefono_Direccion" required>
                                      <option value="">"Telefono o Direccion"</option>
                                      <option value="Telefono">Telefono</option>
                                      <option value="Direccion">Direccion</option>
                                    </select>
                            </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              
                              <label for="usuarioseleccionar">tipo</label>
                                    <select class="form-control " name="tipo" id="tipo" required>
                                      <option value="">"tipo"</option>
                                      <option value="Celular">Celular</option>
                                      <option value="Fijo">Fijo</option>
                                      <option value="Casa">Casa</option>
                                      <option value="Trabajo">Trabajo</option>
                                    </select>
                            </div>
                            
                          
                         
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="Descripcion" id="Descripcion" maxlength="256" placeholder="Numero de telefono o Direccion">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                          </form>
                          </div>
                          </div>
                          </div>
                 
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
<script type="text/javascript" src="scripts/tbl_tipo_tel_dir_enviar.js"></script>
<?php 
}
ob_end_flush();
?>