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
                    <h1 class="box-header with-border">Permisos de Usuarios </h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>Operaciones</th>
                            <th>#</th>
                            <th> Rol</th>
                            <th>Pantalla</th>
                            <th>Permiso Insercion</th>
                            <th>Permiso Consulta</th>
                            <th>Permiso Actulizacion</th>
                            <th>Mostar_Menu</th>
                            <th>Fecha Creación</th>
                            <th>Estado</th>

                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    
                   
                        <form name="formulario" id="formulario" method="POST">
                        <input type="hidden" name="id_permiso" id="id_permiso">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Rol:</label>
               
                         <select type="text" class="form-control" name="rol_1" id="rol_1" maxlength="50"  required>
                            </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Objeto:</label>
                        <select type="text" class="form-control" name="pantalla" id="pantalla" maxlength="50"  required>
                            </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Permiso de Insercion :</label>
                    
                         <select class="form-control " name="permiso_insercion" id="permiso_insercion" required>
                                  <option value="">Permiso de Insercion :</option>
                                  <option value="1">SI</option>
                                  <option value="0">NO</option>
                            
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Permiso de Consultar:</label>
                        <select class="form-control " name="permiso_consulta" id="permiso_consulta" required>
                                  <option value="">Permiso de Consultar:</option>
                                  <option value="1">SI</option>
                                  <option value="0">NO</option>
                            
                        </select> 
                       
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Permiso de Actualizar:</label>
                        
                         <select class="form-control " name="permiso_actualizacion" id="permiso_actualizacion" required>
                                  <option value="">Permiso de Actualizar:</option>
                                  <option value="1">SI</option>
                                  <option value="0">NO</option>
                            
                        </select> 
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Permiso Mostar pantalla en el Menu:</label>
                        
                         <select class="form-control " name="Mostar_Menu" id="Mostar_Menu" required>
                                  <option value="">Mostar Menu:</option>
                                  <option value="1">SI</option>
                                  <option value="0">NO</option>
                            
                        </select> 
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
  <script type="text/javascript" src="scripts/tbl_permisos.js"></script>
  <script type="text/javascript" src="scripts/combobox_rol.js"></script>
  <script type="text/javascript" src="scripts/combobox_pan.js"></script>
  <?php 
  require('permisos.php');
}
require 'permisos/segurida.php';
ob_end_flush();
?>
