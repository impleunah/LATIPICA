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
require_once('../config/Conexion.php');
$valor=" ";
iF (isset($_POST["btnGuardar1"])){
    
    $usuario =$_SESSION["Nombre_Usuario"];
    $id_pregunta_usuario = $_POST["id_usuario"];
    $g = $_POST["g"];
   
    $query = "SELECT * FROM tbl_usuario where Nombre_Usuario = '$usuario' ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){
$id_usuario = $row['id_usuario'];
$Contraseña = $row['Contraseña'];

};
$query1 = "SELECT * FROM tbl_preguntas_x_usuario where id_usuario= $id_usuario";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){
$id_usuario_1 = $row['id_usuario'];
$id_pregunta = $row['id_pregunta'];
$respuesta = $row['respuesta'];
};
$Con=hash("SHA256",$g);

$co =$_SESSION["Nombre_Usuario"];
$a= $_POST["id_usuario"];
$a2= $_POST["id_usuario_2"];
$a3= $_POST["id_usuario_3"];
$b= $_POST["r"];
$b2= $_POST["r2"];
$b3= $_POST["r3"];






if($Con==$Contraseña){
  if($a!=$a2 and $a!=$a3 and $b!=$b2 and $b!=$b3 and $a2!=$a3 and $b2!=$b3){
    if($a!=0){if($a!=0){if($a!=0){
ejecutarConsulta("UPDATE `tbl_preguntas_x_usuario` 
SET  `id_pregunta` = '$a', `respuesta` = '$b' WHERE id_usuario = $id_usuario  and nun='1'");
ejecutarConsulta("UPDATE `tbl_preguntas_x_usuario`
 SET  `id_pregunta` = '$a2', `respuesta` = '$b2' WHERE id_usuario = $id_usuario and nun='2' ");
ejecutarConsulta("UPDATE `tbl_preguntas_x_usuario` 
SET  `id_pregunta` = '$a3', `respuesta` = '$b3' WHERE id_usuario = $id_usuario  and  nun='3'");

echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../public/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/app.min.js"></script>
 <!-- DATATABLES -->
 <script src="../public/datatables/jquery.dataTables.min.js"></script>    
<script src="../public/datatables/dataTables.buttons.min.js"></script>
<script src="../public/datatables/buttons.html5.min.js"></script>
<script src="../public/datatables/buttons.colVis.min.js"></script>
<script src="../public/datatables/jszip.min.js"></script>
<script src="../public/datatables/pdfmake.min.js"></script>
<script src="../public/datatables/vfs_fonts.js"></script> 
<script src="../public/js/bootbox.min.js"></script> 
<script src="../public/js/bootstrap-select.min.js"></script>';
echo '<script type="text/javascript">
bootbox.alert("Pregunta ha sido registrada")
     </script>'
    ;
    
  
      }else{
        echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/js/app.min.js"></script>
     <!-- DATATABLES -->
     <script src="../public/datatables/jquery.dataTables.min.js"></script>    
    <script src="../public/datatables/dataTables.buttons.min.js"></script>
    <script src="../public/datatables/buttons.html5.min.js"></script>
    <script src="../public/datatables/buttons.colVis.min.js"></script>
    <script src="../public/datatables/jszip.min.js"></script>
    <script src="../public/datatables/pdfmake.min.js"></script>
    <script src="../public/datatables/vfs_fonts.js"></script> 
    <script src="../public/js/bootbox.min.js"></script> 
    <script src="../public/js/bootstrap-select.min.js"></script>';    
        
    
        echo "
        <script >
        bootbox.alert('Rellene todos los campos ');
         
        </script>";}
    }else{
      echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../public/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../public/js/app.min.js"></script>
   <!-- DATATABLES -->
   <script src="../public/datatables/jquery.dataTables.min.js"></script>    
  <script src="../public/datatables/dataTables.buttons.min.js"></script>
  <script src="../public/datatables/buttons.html5.min.js"></script>
  <script src="../public/datatables/buttons.colVis.min.js"></script>
  <script src="../public/datatables/jszip.min.js"></script>
  <script src="../public/datatables/pdfmake.min.js"></script>
  <script src="../public/datatables/vfs_fonts.js"></script> 
  <script src="../public/js/bootbox.min.js"></script> 
  <script src="../public/js/bootstrap-select.min.js"></script>';    
      
  
      echo "
      <script >
      bootbox.alert('Rellene todos los campos ');
       
      </script>";}
  }else{
    echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../public/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/app.min.js"></script>
 <!-- DATATABLES -->
 <script src="../public/datatables/jquery.dataTables.min.js"></script>    
<script src="../public/datatables/dataTables.buttons.min.js"></script>
<script src="../public/datatables/buttons.html5.min.js"></script>
<script src="../public/datatables/buttons.colVis.min.js"></script>
<script src="../public/datatables/jszip.min.js"></script>
<script src="../public/datatables/pdfmake.min.js"></script>
<script src="../public/datatables/vfs_fonts.js"></script> 
<script src="../public/js/bootbox.min.js"></script> 
<script src="../public/js/bootstrap-select.min.js"></script>';    
    

    echo "
    <script >
    bootbox.alert('Rellene todos los campos ');
     
    </script>";}





      }else{
        echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/js/app.min.js"></script>
     <!-- DATATABLES -->
     <script src="../public/datatables/jquery.dataTables.min.js"></script>    
    <script src="../public/datatables/dataTables.buttons.min.js"></script>
    <script src="../public/datatables/buttons.html5.min.js"></script>
    <script src="../public/datatables/buttons.colVis.min.js"></script>
    <script src="../public/datatables/jszip.min.js"></script>
    <script src="../public/datatables/pdfmake.min.js"></script>
    <script src="../public/datatables/vfs_fonts.js"></script> 
    <script src="../public/js/bootbox.min.js"></script> 
    <script src="../public/js/bootstrap-select.min.js"></script>';    
        
    
        echo "
        <script >
        bootbox.alert('Revise las preguntas o Respuestas no se pueden repetir ');
         
        </script>";}
      }else{
          echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
          <!-- Bootstrap 3.3.5 -->
          <script src="../public/js/bootstrap.min.js"></script>
          <!-- AdminLTE App -->
          <script src="../public/js/app.min.js"></script>
           <!-- DATATABLES -->
           <script src="../public/datatables/jquery.dataTables.min.js"></script>    
          <script src="../public/datatables/dataTables.buttons.min.js"></script>
          <script src="../public/datatables/buttons.html5.min.js"></script>
          <script src="../public/datatables/buttons.colVis.min.js"></script>
          <script src="../public/datatables/jszip.min.js"></script>
          <script src="../public/datatables/pdfmake.min.js"></script>
          <script src="../public/datatables/vfs_fonts.js"></script> 
          <script src="../public/js/bootbox.min.js"></script> 
          <script src="../public/js/bootstrap-select.min.js"></script>';
             echo '<script type="text/javascript">
             bootbox.alert("No se pudo cambiar la pregunta")
             </script>'
            ;
           
         }

 

    
        }



?>

<div class="content-wrapper ">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                        
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                        <div class="panel-body" style="height: 400px;" id="formularioregistros">
                                            
                        <div class="panel-body" style="height: 400px;" id="formularioregistros">
                            <form name="formulario" id="formulario" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
                         
                            <div style="display: flex;">
                           
                            <div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 1</label>
<div class="col-sm-14">
  <select title="Preguntas" class='form-control' name='id_usuario' id='id_usuario'required onchange="load(1);"> 	</select>
</div>
</div>
<div class="form-group">
    <label for="con_password" class="col-md-3 control-label">Respuestas</label>
    <div class="col-md-14">
      <input title="Respuesta de la Pregunta" id="r" type="text" class="form-control" name="r" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
    </div>
  </div>
  </div>

                        

  <div style="display: flex;">                     
  <div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 2</label>
<div class="col-sm-14">
<select title="Preguntas" class='form-control' name='id_usuario_2' id='id_usuario_2' onchange="load(1);" required>	</select>
</div>
</div>
<div class="form-group">
<label for="con_password" class="col-md-3 control-label">Respuestas</label>
<div class="col-md-14">
<input title="Respuesta de la Pregunta" id="r2" type="text" class="form-control" name="r2" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
</div>
</div>
</div>

<div style="display: flex;">                     
                           
<div class="form-group">

<label for="mod_rol" class="col-sm-6 control-label">Preguntas 3</label>
<div class="col-sm-14">
<select title="Preguntas" class='form-control' name='id_usuario_3' id='id_usuario_3' onchange="load(1);" required>	</select>
</div>
</div>

<div class="form-group">
<label for="con_password" class="col-md-3 control-label">Respuestas</label>
<div class="col-md-14">
<input title="Respuesta de la Pregunta" id="r3" type="text" class="form-control" name="r3" placeholder="Respuesta" title="Debes responder la pregunta" onPaste="return false;" maxlength="50" required>
</div>
</div>

</div>
                     





<!-- modal -->
                             <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">


                                    <script>
                                function mostrarContrasena1(){
                                    var tipo = document.getElementById("g");
                                    if(tipo.type == "password"){
                                        tipo.type = "text";
                                    }else{
                                        tipo.type = "password";
                                    }
                                }
                              </script>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Introdusca contraseña</h4>
                                    </div>
                                    <div class="modal-body">
                                    <div style="display: flex;">
                                    <input type="password" class="form-control" name="g" id="g" maxlength="200" placeholder="Respuesta" required>
                                    <button class="" type="button" onclick="mostrarContrasena1()"><span class="glyphicon  ">&#xe105;</span></button>
                                  </div>
                                    <br>
                                    <button class="btn btn-primary" type="submit"   name="btnGuardar1" id="btnGuardar1"><i class="fa fa-save"></i> Guardar</button>    
                                </div>
                                </div>
                            </div>
                        </div>
                   <br>
                   <br>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#miModal"  name="btnGuardar" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onClick=" window.location.href='inico.php' " type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                           
                          </div>
                        </form>
                        </div>

<!--Fin centro -->
</div><!-- /.box -->
</div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->            
   
<?php
  require 'footer.php'
?>
      <script type="text/javascript" src="scripts/combobox_preguntas_1.js"></script>
       <script type="text/javascript" src="scripts/combobox_preguntas_2.js"></script>
       <script type="text/javascript" src="scripts/combobox_preguntas_3.js"></script>
  <?php 
}
ob_end_flush();
?>