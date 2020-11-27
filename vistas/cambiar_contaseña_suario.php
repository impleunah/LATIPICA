
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
     
IF (isset($_POST["btnGuardar"])){
  
$usuario =$_SESSION["Nombre_Usuario"];
$Contraseña_anterior=$_POST["Contraseña"];
$Contraseña_Nueva= $_POST["Contraseña_Nueva"];
$Repetir_Contraseña= $_POST["Repetir_Contraseña"];
$query = "SELECT * FROM tbl_usuario where Nombre_Usuario = '$usuario' ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$Contraseña = $row['Contraseña'];



};
$Contraseña_anterior_hash=hash("SHA256",$Contraseña_anterior);

$Contraseña_Nueva_hash=hash("SHA256",$Contraseña_Nueva);

if($Contraseña != $Contraseña_Nueva_hash){
if($Contraseña==$Contraseña_anterior_hash){



if($Contraseña_Nueva==$Repetir_Contraseña){
  $clavehash=hash("SHA256",$Contraseña_Nueva);
   if (ejecutarConsulta("UPDATE  tbl_usuario SET Contraseña = '$clavehash' WHERE Nombre_Usuario = '$usuario' and Contraseña='$Contraseña_anterior'")) {
    
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
echo " <script> bootbox.alert('La contraseña se ha actualizado correctamente')</script>";
   }
   
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
  echo " <script> bootbox.alert('Las contraseñas no son iguales')</script>";
}
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
  echo " <script> bootbox.alert('La Contraseña anterior es incorrecta ')</script>";
  } }else{echo '<script src="../public/js/jquery-3.1.1.min.js"></script>
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
echo " <script> bootbox.alert('La Contraseña nueva  es Igual a la Anterior  ')</script>";}


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
                         

                            <script languaje="javascript">
                          function CheckUserName(ele) {
                          if (/\s/.test(ele.value)) { bootbox.alert("No se permiten espacios en blanco"); }
                          }
                          

                          </script>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Contraseña Actual:</label>
                            <script languaje="javascript">
                          function CheckUserName(ele) {
                          if (/\s/.test(ele.value)) { bootbox.alert("No se permiten espacios en blanco"); }
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

                      
                          </div>
                          <div class="form-group has-feedback " >
                          <script>
                                function mostrarContrasena2(){
                                    var tipo = document.getElementById("Contraseña_Nueva");
                                    if(tipo.type == "password"){
                                        tipo.type = "text";
                                    }else{
                                        tipo.type = "password";
                                    }
                                }
                              </script>
                            </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Contraseña Nueva:</label>
                            <div style="display: flex;">
                            <input type="password" class="form-control" name="Contraseña_Nueva" id="Contraseña_Nueva" minlength ="<?php echo $valormin; ?>"  maxlength="<?php echo $valormax ?>"    placeholder="Contraseña_Nueva" required onBlur="CheckUserName(this);">
                            <button class="" type="button" onclick="mostrarContrasena2()"><span class="glyphicon  ">&#xe105;</span></button>
                        
                          </div>
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                          <label>Repetir Contraseña:</label>
                        <div style="display: flex;">
                            <input type="password" class="form-control" name="Repetir_Contraseña" id="Repetir_Contraseña" minlength ="<?php echo $valormin; ?>"  maxlength="<?php echo $valormax ?>"    placeholder="Repetir_Contraseña" required onBlur="CheckUserName(this);">
                            <button class="" type="button" onclick="mostrarContrasena1()"><span class="glyphicon  ">&#xe105;</span></button>
                        </div>
                          </div>
                          </div>
               
                   
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit"  name="btnGuardar" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onClick=" window.location.href='inico.php' " type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                           
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
  <?php 
}
ob_end_flush();
?>
