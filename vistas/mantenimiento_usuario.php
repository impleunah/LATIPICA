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
$query = "SELECT * FROM tbl_parametros where id_parametro=2";
      $result = mysqli_query($conexion, $query);
      
      while($row = mysqli_fetch_array($result)){
      
     
      $valormax =$row['valor'];
      
      }


      $query = "SELECT * FROM tbl_parametros where id_parametro=3";
      $result = mysqli_query($conexion, $query);
      
      while($row = mysqli_fetch_array($result)){
      
     
      $valormin =$row['valor'];
      
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
                    <h1 class="box-header with-border">Mantenimiento De Usuario </h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>Nombre Usuario</th>
              
                            <th>Correo Electronico</th>
                            <th>Rol</th>
                            <th>Fecha Creación</th>
                            <th>Ultima Conexión</th>
                            <th>Estado Usuario</th>
                            
                          </tfoot>
                        </table>
                    </div>
                    </div>
                    
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                        <script language="javascript">

                                            function aaa(campo, event) {

                                                    CadenaaReemplazar = " ";
                                                    CadenaReemplazo = "";
                                                    CadenaTexto = campo.value;
                                                    CadenaTextoNueva = CadenaTexto.split(CadenaaReemplazar).join(CadenaReemplazo);
                                                    campo.value = CadenaTextoNueva;

                                              }
                                            </script>
                                            <script>
                                            function soloLetras(e){
                                            key = e.keyCode || e.which;
                                            tecla = String.fromCharCode(key).toLowerCase();
                                            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                                            especiales = "8-37-39-46";

                                            tecla_especial = false
                                            for(var i in especiales){
                                                  if(key == especiales[i]){
                                                      tecla_especial = true;
                                                      break;
                                                  }
                                              }

                                              if(letras.indexOf(tecla)==-1 && !tecla_especial){
                                                  return false;
                                              }
                                            }
                                  </script>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="id_usuario" id="id_usuario">
                            <input type="text" class="form-control" name="Nombre_Usuario" id="Nombre_Usuario" maxlength="70" placeholder="Nombre" required  onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Correo Electronico:</label>
                            <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" maxlength="80" placeholder="Correo Electronico" required>
                          </div>

                          <div class="form-group has-feedback ">
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                          <label>Ingresar Contraseña:</label>
                          <script languaje="javascript">
                          function CheckUserName(ele) {
                          if (/\s/.test(ele.value)) { bootbox.alert("no se permiten espacios en blanco"); }
                          }
                          

                          </script>
                           <script>
                                function mostrarContrasena(){
                                    var tipo = document.getElementById("Contraseña");
                                    if(tipo.type == "password"){
                                        tipo.type = "text";
                                    }else{
                                        tipo.type = "password";
                                    }
                                }
                              </script>
                            <div style="display: flex;">
                            <input type="password" class="form-control" name="Contraseña" id="Contraseña" minlength ="<?php echo $valormin; ?>" maxlength="<?php echo $valormax ?>"  placeholder="Ingresar_Contraseña" required  onBlur="CheckUserName(this);">
                            <button class="" type="button" onclick="mostrarContrasena()"><span class="glyphicon  ">&#xe105;</span></button>
                          </div>
                          
                          </div>
                          <div class="form-group has-feedback " >
                          <script>
                                function mostrarContrasena1(){
                                    var tipo = document.getElementById("Repetir_Contraseña");
                                    if(tipo.type == "password"){
                                        tipo.type = "text";
                                    }else{
                                        tipo.type = "password";
                                    }
                                }
                              </script>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                          <label>Repetir Contraseña:</label>
                        <div style="display: flex;">
                            <input type="password" class="form-control" name="Repetir_Contraseña" id="Repetir_Contraseña" minlength ="<?php echo $valormin; ?>"  maxlength="<?php echo $valormax ?>"    placeholder="Repetir_Contraseña" required onBlur="CheckUserName(this);">
                            <button class="" type="button" onclick="mostrarContrasena1()"><span class="glyphicon  ">&#xe105;</span></button>
                        </div>
                          </div>
                          </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
              
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>ROl:</label>
                             <select type="text" class="form-control" name="rol_1" id="rol_1" maxlength="50"  required>
                              </select>
                          </div>
                             <!-- Permisos lisatado -->
                            
                    
                   
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
   <script type="text/javascript" src="scripts/combobox_rol.js"></script>
  <script type="text/javascript" src="scripts/tbl_usuarios.js"></script>

<?php 
}
require 'permisos/segurida.php';
ob_end_flush();
?>