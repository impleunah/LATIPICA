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
                    <button class="btn btn-primary" id="boton" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> 
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <h1 class="box-header with-border"> Lista de Clientes </h1>
                    <!-- Contenido del Formulario -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#  </th>
                            <th> Nombre </th>
                            <th >Correo </th>
                            <th >RTN </th>
                            <th>Estado</th>
                          </thead>
                        </table>
                    </div>
                    </div>
                   
                    <script>
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
          </script>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                          <form name="formulario" id="formulario" method="POST">
                    <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                    <input type="hidden" name="id_cliente" id="id_cliente"> 
                            <label>Nombre</label>  
                            <input type="text"  class="form-control" name="nombre" id="nombre" maxlength="50"  required="">
                        </div>
                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                        <label>Correo </label>
                      <input type="email" class="form-control" name="correo" id="correo"maxlength="50" required="">
                       </div>
                       <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                        <label>RTN</label>
                      <input type="text" onkeypress='return validaNumericos(event)'class="form-control" name="RTN" id="RTN"maxlength="14" required="">
                       </div>
                                     <!-- <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                        <label>Telefono </label>
                      <input type="text" onkeypress='return validaNumericos(event)'class="form-control" name="telefono" id="telefono"maxlength="50" required="">
                       </div>-->
                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                       <label class="control-label">Estado</label> 
                      <select class="form-control" id="estado" name="estado" required>
				             	<option value="1" selected>Activo</option>
                      <option value="0">Inactivo</option>
                   </select>      
                    </div>
                    <br>  </br>
                    <br>  </br>
                  
                    <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                        <div id='divTel' class='divTel'>
                                 <input type="hidden" value="1" id='numtel'>   
                                 <button class="btn btn-info" onclick="agregartelefono('')" type="button"> <i class="fa fa-plus-square"></i></button> 
                                 <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                     <label>Telefono 1 </label>
                                     <input type="text" class="form-control" name="telefono_1" id="telefono_1" maxlength="9" placeholder="Telefono 1" required onkeypress='return validaNumericos(event)'> 
                               </div>
                            </div>
                        </div>
            <div  class= "form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary"  type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
                    </form>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
          </div>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
                </form>
                </div>
            </div> 
  <?php
  require 'footer.php'
  
  ?>
  <script type="text/javascript" src="scripts/clientes.js"></script>
  

<?php 
require 'permisos/caid.php';
}
ob_end_flush();
?>
