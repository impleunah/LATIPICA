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
                    <button class="btn btn-primary" id="boton" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <h1 class="box-header with-border">Mantenimiento Empresas </h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>Empresa</th>
                            <th>Operacion</th>
                            <th>RTN</th>
                            <th>Razon Social</th>
                            <th>Domicilio </th>
                            <th>Correo </th>
                            <th>Telefono </th>
                            <th>Estado </th>
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
                    
                    <div class="panel-body" id="formularioregistros">
                    
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Nombre Comercial</label>
                                        <input type="text" class="form-control" name="nombre_comercial" id="nombre_comercial" maxlength="25" placeholder="Nombre Comercial" required>
                                    </div>

                          <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Operacion:</label>
                            <input type="hidden" name="id_empresa" id="id_empresa">
                            <select type="text" class="form-control" name="id_operacion" id="id_operacion" maxlength="50"  required>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                        <label>Razón Social:</label>
                                        <input type="text" class="form-control" name="razon_social" id="razon_social" maxlength="30" placeholder="Razon Social" required>
                                    </div>

                                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                         <label>RTN:</label>
                                         <input type="text" class="form-control" name="RTN" id="RTN" maxlength="14" placeholder="Escriba el RTN" required  onkeypress='return validaNumericos(event)'> 
                                         <br>
                                        </div>

 
                                  
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                                 <div id='divDomicilio' class='divDomicilio'>
                                 <input type="hidden" value="1" id='numDomicilos'>
                                 <button class="btn btn-info" onclick="agregarDomicilio('')" type="button"> <i class="fa fa-plus-square"></i></button>
                                  <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                 
                                     <label>Domicilio 1 </label>
                                     
                                     <input type="text" class="form-control" name="domicilio_1" id="domicilio_1" maxlength="30" placeholder="Domicilio 1" required> 
                               </div>
                            </div>
                        </div>



                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id='divCorreos' class='divCorreos'>
                          <input type="hidden" value="1" id='numCorreos'> 
                          <button class="btn btn-info" onclick="agregarcorreo('')" type="button"><i class="fa fa-plus-square"></i></button>        
                            <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <label> Correo 1:</label>
                                   <input type="email" class="form-control" name="correo_1" id="correo_1" maxlength="50" placeholder="Correo 2" required>
                                </div>
                            </div>        
                        </div>

                        <!-- Área de los teléfonos            -->
                        <script language="javascript">
                  function validaNumericos(event) {
                if(event.charCode >= 48 && event.charCode <= 57){
               return true;
                 }
              return false;        
                }
                  </script>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id='divTel' class='divTel'>
                                 <input type="hidden" value="1" id='numtel'>   
                                 <button class="btn btn-info" onclick="agregartelefono('')" type="button"> <i class="fa fa-plus-square"></i></button> 
                                  <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">  
                                     <label>Telefono 1 </label>
                                     <input type="text" class="form-control" name="telefono_1" id="telefono_1" maxlength="9" placeholder="Telefono 1" required onkeypress='return validaNumericos(event)'> 
                               </div>
                            </div>
                        </div>
                 
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                  </div>
                </form>
                </div>
            </div> 
          <!-- MOdal
        
        
        
        
        
        
        -->
        <div class="modal fade" id="myModa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Cliente</h4>
        </div>
        <div class="modal-body">
        
        <div class="panel-body" id="formularioregistros_p">
                    
                    <div class="panel-body" id="formularioregistros_p">
                        <form name="formulario_P" id="formulario_p" method="POST">
              
                        
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Nombre Comercial</label>
                                        <input type="text" class="form-control" name="nombre_comercial_p" id="nombre_comercial_p" maxlength="256" placeholder="Nombre Comercial" required disabled=»disabled»>
                                    </div>

                          <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Operacion:</label>
                            <input type="hidden" name="id_empresa" id="id_empresa">
                            <input type="text" class="form-control" name="id_operacion_p" id="id_operacion_p" maxlength="50"  required disabled=»disabled»>
                           
                        </div>

                        <div class="form-group col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                        <label>Razón Social:</label>
                                        <input type="text" class="form-control" name="razon_social_p" id="razon_social_p" maxlength="256" placeholder="Razon Social" required disabled=»disabled»>
                                    </div>

                                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                         <label>RTN:</label>
                                         <input type="text" class="form-control" name="RTN_p" id="RTN_P" maxlength="200" placeholder="Escriba el RTN" required disabled=»disabled»> 
                                         <br>
                                        </div>

 
                         <center>      
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                                 <div id='divDomicilio' class='divDomicilio'>
                                 <input type="hidden" value="1" id='numDomicilos'>
                                
                                  <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                 
                                     <label>Domicilio 1 </label>
                                     
                                     <input type="text" class="form-control" name="domicilio_p_1" id="domicilio_p_1" maxlength="256" placeholder="Domicilio 1" required disabled=»disabled»> 
                               </div>
                               <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                 
                                 <label>Domicilio 2 </label>
                                 
                                 <input type="text" class="form-control" name="domicilio_p_2" id="domicilio_p_2" maxlength="256" placeholder="Domicilio 1" required disabled=»disabled»> 
                           </div>
                            </div>
                        </div>
                      



                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id='divCorreos' class='divCorreos'>
                          <input type="hidden" value="1" id='numCorreos'> 
                          
                            <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <label> Correo 1:</label>
                                   <input type="text" class="form-control" name="correo_p_1" id="correo_p_1" maxlength="50" placeholder="Correo 2" required disabled=»disabled»>
                                </div>
                            </div>     
                            <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <label> Correo 2:</label>
                                   <input type="email" class="form-control" name="correo_p_2" id="correo_p_2" maxlength="50" placeholder="Correo 2" required disabled=»disabled»>
                                </div>
                            </div>    
                        
                        

                        <!-- Área de los teléfonos y olvin            -->
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id='divTel' class='divTel'>
                          <input type="hidden" value="1" id='numtel'>   
                                
                            <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">  
                            <label>Telefono 1 </label>
                                  <script>
                        function validaNumericos(event) {
                            if(event.charCode >= 48 && event.charCode <= 57){
                              return true;
                            }
                            return false;        
                        }
                        </script>                               
                        
                           <input type="text" class="form-control" name="telefono_p_1" id="telefono_p_1" maxlength="9" placeholder="Telefono 1" required disabled=»disabled» onkeypress='return validaNumericos(event)'>  
                               </div>
                               </div>
                               <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">  
                                 
                                 <label>Telefono 2 </label>
                                 <input type="text" class="form-control" name="telefono_p_2" id="telefono_p_2" maxlength="9" placeholder="Telefono 2" required disabled=»disabled» onkeypress='return validaNumericos(event)'> 
                           </div>
                            </div>
                        </div>
                        </center>   
                
                </form>
                </div>
            </div> 

            <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div> 
        </div>
             
      </div>
    </div>
  </div>
  </div>  
  
  
  <!-- fin modal -->

              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <?php
  require 'footer.php'
  
  ?>
  <script type="text/javascript" src="scripts/tbl_empresa.js"></script>
  <script type="text/javascript" src="scripts/combobox_operacion.js"></script>
  <?php 
  
}
require 'permisos/manteni.php';
ob_end_flush();
?>

   

   