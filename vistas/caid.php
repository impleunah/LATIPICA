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
                    <h1 class="box-header with-border">CAI </h1>
                    <!-- Contenido del Formulario -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>   CAI </th>
                            <th >Fecha_Inicio </th>
                            <th >Fecha_Limite </th>
                            <th>Rango_Desde</th>
                            <th>Rango_Hasta</th>
                            <th>Establecimiento</th>
                            <th>Punto_de_Emision</th>
                            <th>Secuencia</th>
                            <th>Tipo_Documento</th>
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
                    <input type="hidden" name="id_reg_facturacion" id="id_reg_facturacion">
                            <label>CAI</label>  
                            <input type="text" onkeypress='return validaNumericos(event)' style="text-transform:uppercase;" value=""   class="form-control" name="cai" id="cai" maxlength="16" placeholder="CAI" required>
                        </div>
                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Establecimiento:</label>
                           <input type="text" class="form-control" name="establecimiento" id="establecimiento" maxlength="10"  required>
                        </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">             
                      <label for="messeleccionar">Seleccionar  Fecha Inicio </label>
                      <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required="">
                       </div>

                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">             
                      <label for="messeleccionar">Seleccionar  Fecha Limite</label>
                      <input type="date" class="form-control" name="fecha_limite" id="fecha_limite" required="">
                       </div>
                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Rango desde:</label>
                            <input type="text" onkeypress='return validaNumericos(event)' class="form-control" name="rango_desde" id="rango_desde" maxlength="19"  required>
                        </div>
                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Rango hasta:</label>
                            <input type="text" onkeypress='return validaNumericos(event)' class="form-control" name="rango_hasta" id="rango_hasta" maxlength="19"  required>
                        </div>
                       
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <label for="añoseleccionar"> Tipo documento </label>
              <select class="form-control" name="tipo_documento" id="tipo_documento" maxlength="15" required>
              <option value="">"Seleccionar "</option>
              <option value="factura">Factura</option>
              <option value="Nota credito">Nota credito</option>
              <option value="Nota debito">Nota debito</option>
            </select>
            </div>
            <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Secuencia:</label>
                           <input type="TEXT" class="form-control" onkeypress='return validaNumericos(event)' name="secuencia" id="secuencia" maxlength="10"  required>
                        </div>
                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Punto emision:</label>
                           <input type="text" class="form-control" name="punto_emision" id="punto_emision" maxlength="10"  required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label">Estado</label> 
                      <select class="form-control" id="estado" name="estado" required>
				             	<option value="1" selected>Activo</option>
                      <option value="0">Inactivo</option>
                   </select>      
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

  <?php
  require 'footer.php'
  
  ?>
  <script type="text/javascript" src="scripts/reg_cai.js"></script>
  

<?php 
require 'permisos/caid.php';
}
ob_end_flush();
?>
