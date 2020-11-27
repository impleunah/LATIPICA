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
                    <h1 class="box-header with-border">Preguntas del Usuario </h1>
                    <!-- /.box-header -->
                    <!-- centro -->

                    <!-- Contenido del Formulario -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Pregunta</th>
                            
                            <th>Estado</th>
                          
                          </thead>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">    
                    <form name= "formulario" id= formulario method="POST">
                    <input type="hidden" name="id_pregunta_usuario" id="id_pregunta_usuario">
                    <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Usuario:</label>
                            <select type="text" class="form-control" name="id_usuario" id="id_usuario" maxlength="50"  required>
                            </select>
                        </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              
                      <label for="preguntaseleccionar">Seleccionar Pregunta</label>
                      <select class="form-control " name="id_pregunta" id="id_pregunta" required>
                      <option value="">"Seleccionar Pregunta"</option>
                      <option value="1">¿Actor Favorito?</option>
                      <option value="2">¿Serie Favorita?</option>
                      <option value="3">¿Cual es tu Color Favorito?</option>
                      <option value="4">¿Cual es tu comida Favorita?</option>
                      <option value="5">¿Nombre de tu primer mascota?</option>
                       </select>
                       </div>

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Respuesta:</label>
                    
                            <input type="text" class="form-control" name="respuesta" id="respuesta" maxlength="200" placeholder="Respuesta" required>
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
  <script type="text/javascript" src="scripts/tbl_pregunta_usuario.js"></script>
  <script type="text/javascript" src="scripts/combobox_preguntas.js"></script>

   
<?php 
}
require 'permisos/segurida.php';
ob_end_flush();
?>
