<!-- Modal -->


<div class="modal fade" id="editar<?php echo $row_usuario['id_proveedor'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Proveedor</h4>
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
<form id="formEdita<?php echo $row_usuario['id_proveedor'];?>" data-smk-icon="glyphicon-remove" action="javascript:()">
  <div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Nombre</label></div>
      <div class="col-md-10">
    <input class="form-control" id="Nombre<?php echo $row_usuario['id_proveedor'];?>" name="Nombre"  value="<?php echo $row_usuario['Nombre'];?>"
    placeholder="Nombre" required maxlength="25" >
      </div>
  </div>
</div>
<br>

<div class="row">
<div class="form-group">
      <div class="col-md-2"><label class="control-label">RTN</label></div>
      <div class="col-md-10">
          <input type="TExt" class="form-control" id="RTN<?php echo $row_usuario['id_proveedor'];?>"  name="RTN"  onkeypress='return validaNumericos(event)'  value="<?php echo $row_usuario['RTN'];?>"  required required maxlength="14">
      </div>
  </div>
</div>
<br>
 
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Correo</label></div>
      <div class="col-md-10">
          <input type="email" class="form-control" id="correo<?php echo $row_usuario['id_proveedor'];?>"  name="correo"   value="<?php echo $row_usuario['correo'];?>"  required >
      </div>
  </div>
</div>
<br>

<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Direccion</label></div>
      <div class="col-md-10">
        <input class="form-control" id="direccion<?php echo $row_usuario['id_proveedor'];?>" name="direccion"  value="<?php echo $row_usuario['direccion'];?>"
    placeholder="direccion" required maxlength="200" ></div>
  </div>
</div>
<br>

<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono</label></div>
      <div class="col-md-10">
        <input class="form-control" id="Telefono<?php echo $row_usuario['id_proveedor'];?>" name="Telefono" onkeypress='return validaNumericos(event)' value="<?php echo $row_usuario['telefono'];?>"
    placeholder="Telefono1" required maxlength="8" ></div>
  </div>
</div>
<br>

<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Estado</label></div>
      <div class="col-md-10">
<select class="form-control" id="estado<?php echo $row_usuario['id_proveedor'];?>" name="estado" required >
				  <option value="1" <?php if (!(strcmp(1, htmlentities($row_usuario['estado'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Activo</option>
          <option value="0" <?php if (!(strcmp(0, htmlentities($row_usuario['estado'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Inactivo</option>
        </select>       </div>
  </div>
</div>
<br>

</form>
      </div>
      <div class="modal-footer">
     
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary fa fa" id="btnEditar<?php echo $row_usuario['id_proveedor'];?>">Guardar</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden"  name="id_usuario" id="id_usuario<?php echo $row_usuario['id_proveedor'];?>" value="<?php echo $row_usuario['id_proveedor'];?>" size="32"> 

<?php 

$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../../config/Conexion.php');

$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 2 ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$permiso_consulta = $row['permiso_consulta'];
$permiso_insercion =$row['permiso_insercion'];
$permiso_actualizacion =$row['permiso_actualizacion'];


}

?>
                    <script type="text/javascript">
                     
                        


                    
                  
                    var  permiso_actualizacion= <?php echo  $permiso_actualizacion; ?>;
                    
                    if(permiso_actualizacion==0){
                        var visible = document.getElementById("btnEditar<?php echo $row_usuario['id_proveedor'];?>");
                        visible.style.display= 'none';

                    }
                   
             
                      
              
                    </script>








<script>


$('#btnEditar<?php echo $row_usuario['id_proveedor'];?>').click(function() {
    if ($('#formEdita<?php echo $row_usuario['id_proveedor'];?>').smkValidate()) {
                

      // Code here
     var dataString=
        'Nombre='+$('#Nombre<?php echo $row_usuario['id_proveedor'];?>').val()+
        '&RTN='+$('#RTN<?php echo $row_usuario['id_proveedor'];?>').val()+
        '&correo='+$('#correo<?php echo $row_usuario['id_proveedor'];?>').val()+
        '&direccion='+$('#direccion<?php echo $row_usuario['id_proveedor'];?>').val()+
        '&telefono='+$('#Telefono<?php echo $row_usuario['id_proveedor'];?>').val()+
        '&estado='+$('#estado<?php echo $row_usuario['id_proveedor'];?>').val()+
        '&id_proveedor='+$('#id_usuario<?php echo $row_usuario['id_proveedor'];?>').val();

    $.ajax({
        type:"POST",
        url:"../ajax/ajax/editar_proveedor.php",
        data:dataString
    }).done(function(data){
      if(data=1){
          $.smkAlert({
          text: 'Excelente',
          type: 'success'
      });
        ver_tabla_proveedor();
        $("#editar").modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
			}
      
			else{
            $.smkAlert({
            text: 'Error',
            type: 'danger'
        });
			}
    })
  
  }
});

  
</script>  