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
require 'ab.php';


?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content " onload="funcion_inicial()" >
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                    <button class="btn btn-primary boton" id="boton" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> 
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <h1 class="box-header with-border">Ventas</h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" style="height:1000px;" id="listadoregistros">
                        <table id="tbllistados" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th >Operaciones</th>
                            <th >#</th>
                            <th>Número Factura</th>
                            <th>CAI</th>
                            <th>Usuario</th>
                            <th >Cliente</th>
                           
                           
                            
                            <th>Total Venta</th>
                            <th >Fecha</th>
                            <th>Estado</th>
                            
                          </thead>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 2000px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST"> 
                          <h4 class="box-title">Cliente </h4>
                          <div class="box-tools pull-right">
                          </div>
                          <div class="box">
                        <div class="box-header with-border">
                        <div class="col-6 col-sm-3">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="id_cliente" id="id_cliente">
                            <input type="text" class="form-control" name="cliente" id="cliente" maxlength="50"required parent>           
                          </div>
                          <div class="col-3 col-sm-1">
                          <a data-toggle="modal" href="#myModa1">           
                          <h1 class="form-group col-3 col-sm-3"> <button id="btnAgregarcli" type="button" class="btn btn-success"> <span class="fa fa-plus"></span></button></h1>
                            </a> 
                            </div>
                         <div class="form-group col-3 col-sm-3">
                         <label>RTN:</label>
                            <input type="text" class="form-control" name="RTN" id="RTN" maxlength="10" readonly>
                         </div>
                         <div class="form-group col-3 col-sm-3">
                         <label>Correo:</label>
                        <input type="text" class="form-control" name="correo" id="correo" readonly>
                         </div>
                         </div>
                         </div>
                         <div class="form-group col-3 col-sm-3">
                          <label>CAI:</label>
                          <input type="hidden" name="id_reg_facturacion" id="id_reg_facturacion" value=<?php echo $k; ?>>
                            <input id="cai"name="cai" type="text" value=<?php echo $c; ?> class="form-control" readonly>  
                          </div>
                          <div class="form-group col-3 col-sm-3">
                          <label>#Factura:</label>
                          <input type="text" id="num_factura" name="num_factura" value=<?php echo $b; ?> class="form-control"readonly>  
                           
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Fecha(*):</label>
                            <input type="text" class="form-control input-sm" name="fecha" id="fecha" value="<?php echo date("d/m/Y");?>" required>
                          </div>
                          <div class="form-group col-3 col-sm-3">
                          <label>Tipo Pago(*):</label>
                            <select type="text" class="form-control" name="id_tipo_pag"  id="id_tipo_pag"required >
                          </select>
                          </div>
                          <div class="form-group col-3 col-sm-3">
                          <label>Descuento(*):</label>
                          <select class="form-control " name="descuento1" id="descuento1" required>
                                 
                                  
                             </select>
                          </div>

                          <div class="form-group col-3 col-sm-3">
                          <label>Impuesto(*):</label>
                          <select class="form-control " name="v_Impuesto" id="v_Impuesto" required>
                                 
                                  
                          </select>
                          </div>
                         
                        
                          <div class="form-group col-3 col-sm-3">
                          <a data-toggle="modal" href="#myModa" >           
                          <h1 class="form-group col-3 col-sm-3"><h1 class="form-group col-3 col-sm-3"><button id="btnAgregarArt" type="button" class="btn btn-primary "> <span class="fa fa-plus"></span> Agregar Artículos</button></h1></h1>
                            </a>
                          </div>
                          
                          <br>  </br>
                          <br>  </br>
                          <br>  </br>
                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#A9D0F5">
                              <th>#</th>      
                              
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Stock Actual</th>
                                   <th>Precio de Venta</th>
                                    <th>Subtotal</th>
                                    <th>Calcular</th>
                                </thead>
                                <tfoot>
                                <tr>
                                <th></th>
                                   
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Subtotal</TH>
                                    <th><h4 id="sub_total" align="right">L 0.00</h4><input type="hidden" step="any" name="total1" id="total1"></th> 
                                    <th></th></tr>
                                <tr>
                                <th></th>
                                    
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Descuento</TH>
                                    <th><h4 id="descuento" align="right">L 0.0</h4><input type="hidden" step="any"  name="descuento2" id="descuento2"></th> 
                                    <th></th></tr>
                                    <tr>
                                <th></th>
                                    
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Venta Neta</TH>
                                    <th><h4 id="vneta" align="right">L 0.0</h4><input type="hidden" step="any"  name="vneta1" id="vneta1"></th> 
                                    <th></th></tr>
                                <th></th>
                                    
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> I.S.V</TH>
                                    <th><h4 id="iva" align="right">L 0.00</h4><input type="hidden" step="any" name="iva1" id="iva1"></th>
                                    <th></th> </tr>
                                    <th></th>
                                    <th>Calcular</th>
                                    <th><button type="button" onclick="modificarSubototales()"  id='rau' class="btn btn-info"><i class="fa fa-refresh"></i></button></th>
                                   
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th><h4 id="total" align="right">L 0.00</h4><input type="hidden" step="any" name="total_venta" id="total_venta"></th>
                               
                                </tfoot>
                                <tbody>
                                  
                                </tbody>
                            </table>
                          </div>
                        

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary  " onclick="modificarSubototales()" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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

  <!-- Modal -->
  <div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Artículo</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Precio Venta</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>stock</th>
               
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  
  <!-- Fin modal -->
   <!-- Modal -->
   <div class="modal fade" id="myModa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Cliente</h4>
        </div>
        <div class="modal-body">
          <table id="tblclientes" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Agregar</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>RTN</TH>
                <th>Correo</th>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  
 




  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Factura</h4>
      </div>
    
      <div class="modal-body">
    
      

     
  
      <label>Fecha:</label>
      
      <h5 class="form-control " id="fecha_f"></h5>
      
   
  
      <label>Numero de Factura:</label>
     
      <h5 class="form-control " id="nun_f"></h5>

     
      
    
      <label>CAI:</label>
      <h5  class="form-control " id="cai_f"></h5>
      
     
      
      
      <label>Nombre del Cliente:</label>
    
      <h5  class="form-control " id="cliente_f"></h5>
   
      
      
      <label>Creada Por:</label> 
     
      <h5 class="form-control "  id="usuario_f"></h5>
   
                        
      
        <br>
        <br>
   
                             
                          <div class="panel-body table-responsive" id="listadoregistros_f">
                            <table id="tbllistados_f" class="table table-striped table-bordered table-condensed table-hover">
                             <thead style="background-color:#A9D0F5">
                            <th >Articulo</th>
                            <th >Cantidad</th>
                            <th >Precio Venta</th>
                            <th>Subtotal</th>
                            
                            <tfoot>
                                <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Subtotal</TH>
                                    <th><h4 id="total_f">L 0.00</h4><input type="hidden" name="total1_f" id="total1_f"></th> 
                                    </tr>
                                <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Descuento</TH>
                                    <th><h4 id="descuento_f">L 0.0</h4><input type="HIDDEN"  name="descuento2_f" id="descuento2_f"></th> 
                                    </tr>
                                    <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Venta Neta</TH>
                                    <th><h4 id="vneta_f" >L 0.0</h4><input type="HIDDEN"  name="vneta_f" id="vneta_f"></th> 
                                    </tr>
                                    <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> I.S.V</TH>
                                    <th><h4 id="iva_f">L 0.00</h4><input type="hidden" name="iva1_f" id="iva1_f"></th>
                                     </tr>
                                    <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th><h4 id="total_f">L 0.00</h4><input type="hidden" name="total_venta_f" id="total_venta_f"></th>
                                     </tr>
                                </tfoot>
                            
                            </thead>
                        </table>
                    
                    </div>

                   
  
      </div>
      <div class="modal-footer">
       
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
     
    </div>
  </div>
</div>
  <!-- Fin modal -->
 
<?php


require 'footer.php';

?>
<script type="text/javascript" src="scripts/combobox_impuesto.js"></script>
<script type="text/javascript" src="scripts/combobox_descuento.js"></script>
<script type="text/javascript" src="scripts/venta.js"></script>
<script type="text/javascript" src="scripts/combobox_pago.js"></script>
<?php 
}
ob_end_flush();
require 'permisos/venta.php';
?>

