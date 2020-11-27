<?php
require "../config/Conexion.php";

IF (isset($_POST["btnEmpty2"])){
$Nombre =($_POST['nombre']);
$correo= $_POST['correo']; 
$RTN = $_POST['RTN'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$estado=$_POST['estado']; 


ejecutarConsulta("INSERT INTO tbl_proveedor(Nombre,correo,RTN,telefono,direccion,estado) value('$Nombre','$correo','$RTN','$telefono','$direccion','$estado')");

}
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Proveedor</h4>
      </div>
      <div class="modal-body">
      <script language="javascript">
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
          </script>

<form id="formEmpty2" data-smk-icon="glyphicon-remove" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Proveedor</label></div>
      <div class="col-md-10">
    <input class="form-control" id="nombre" name="nombre"
    placeholder="nombre" required maxlength="25" >
      </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">RTN</label></div>
      <div class="col-md-10">
    <input type="text" class="form-control" id="RTN" name="RTN"
    placeholder="RTN" required maxlength="14" onkeypress='return validanumericos(event)'>
      </div>
  </div>
</div>
<br>

<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Correo</label></div>
      <div class="col-md-10">
          <input type="email" class="form-control" id="correo"  name="correo" required maxlength="25" >
      </div>
  </div>
</div>

<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Direccion</label></div>
      <div class="col-md-10">
          <input type="text" class="form-control" id="direccion"  name="direccion" required>
      </div>
  </div>
</div>
<br>
<script>
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
          </script>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono</label></div>
      <div class="col-md-10">
          <input type="text" class="form-control" id="telefono"  name="telefono" required maxlength="9" onkeypress='return validanumericos(event)'>
      </div>
  </div>
</div>
<br>

<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Estado</label></div>
      <div class="col-md-10">
<select class="form-control" id="estado" name="estado" required>
					<option value="1" selected>Activo</option>
          <option value="0">Inactivo</option>
        </select>      </div>
  </div>
</div>
<br>	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnEmpty2" name="btnEmpty2">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
