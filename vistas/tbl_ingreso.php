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

require "../config/Conexion.php";




    IF(isset($_POST["pro_b"])){

echo '<script>alert("siiii")</script>';
    }
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
                    <h1 class="box-header with-border">Compras </h1>
                    <!-- /.box-header -->
                    <!-- centro -->

                    <!-- Contenido del Formulario -->
                    <div id="div"> 
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Presentación</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </thead>
                        </table>
                        </div>
                     
                    </div>
                    <script language="javascript">
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
          </script>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <input type="hidden" name="id_compras" id="id_compras">
                        <input type="hidden" name="id_proveedor" id="id_proveedor">
                        <input type="hidden" name="idarticulo" id="idarticulo">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proveedor:</label>
                      <div style="display: flex;">
                      
                        <input type="text" class="form-control" name="id_proveedo" id="id_proveedo" maxlength="50" parent readonly>           
                      
                        <div class="col-3 col-sm-1">
                        <a data-toggle="modal" href="#myModa1">           
                          <button id="btnAgregarcli" type="button" class="btn btn-success"> <span class="fa fa-plus"></span></button>
                       </a> 
                       </div>
</div>
                            </div>
                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label>Nombre Producto(*):</label>
                       <div style="display: flex;">
                            
                            <input type="text" class="form-control" name="pro" id="pro" maxlength="50"required parent readonly> 
                            <div class="col-3 col-sm-1">
                              <a data-toggle="modal" href="#myModa5">           
                                <button  id="btnAgregarArt" type="button"class="btn btn-success"> <span class="fa fa-plus"></span> </button>
                            </a>
                          </div>
                            </div>
                            </div>
                            
                            <script language="javascript">
                                    function validaNumericos(event) {
                              if(event.charCode >= 48 && event.charCode <= 57){
                                return true;
                              }
                              return false;        
                          }
                                    </script>

                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label> Cantidad :</label>
             
                        <input type="text" onkeypress='return validaNumericos(event)'  class="form-control" name="Cantidad" id="Cantidad" maxlength="10" placeholder="cantidad" required>
                        </div>
                       
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Presentacion(*):</label>
                            <select type="text" class="form-control" name="id_presentacion"  id="id_presentacion" required >
                          </select>
                          </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label> Precio  :</label>
                         <input type="number" class="form-control" name="Precio" id="Precio"  min="1" max="9999"  step="0.01" placeholder="Precio" required>
                      </div>

                     <!--<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label> Total :</label>
                         <input type="text" class="form-control" name="total" id="total" require >
                      </div>  -->
                      
                
                    
                        <div class= "form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary"  type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

                        </div>
                        </div>
                    </form>
                       
                    

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->



  <!--Fin-Contenido-->
  <div class="modal fade" id="myModa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog" style="width: 40% !important;">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">Seleccione Proveedor</h4>
                                        </div>
                                        <div class="modal-body">
                                        <table id="tblclientes" class="table table-striped table-bordered table-condensed table-hover">
                                              <thead>
                                                  <th>Agregar</th>
                                                  <th>#</th>
                                                  <th>Nombre</th>
                                              

                                              
                                            </thead>
                                          </table>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>        
                                      </div>
                                    </div>
                                  </div> 



  
  <div class="modal fade" id="myModa5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:50% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Artículo</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>#</th>
                <th>Nombre</th>
                <th>Imagen</th>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div> 


      </form>
        
               
      </div>
    </div>
  </div> 
  </div> 
  <?php
  require 'footer.php';
  
  
  ?>
  
  <script type="text/javascript" src="scripts/ing.js"></script>
  <script type="text/javascript" src="scripts/combobox_proveedor.js"></script>
  <script type="text/javascript" src="scripts/combobox_presentacion.js"></script>

  <script type="text/javascript">  
  $(document).ready(function()
{


  $("#Precio").keyup(function(){
  $("#Cantidad").keyup(function(){
  
  var precio = $('#Precio').val();
  var cantidad =$('#Cantidad').val();

  if(precio > 0  and cantidad > 0 ){

  var totales =  (precio * cantidad ).toFixed(2); 
  $('#total').val(totales);
   
  }else{
    $('#total').val("0.00");

  }
}
 </script>
<?php 
require 'permisos/tbl_ingreso.php';
}
ob_end_flush();
?>