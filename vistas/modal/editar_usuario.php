<!-- Modal -->
<div class="modal fade" id="editar<?php echo $row_usuario['id_cliente'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Clientes</h4>
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

<form id="formEdita<?php echo $row_usuario['id_cliente'];?>" data-smk-icon="glyphicon-remove" action="javascript:()">
  <div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Nombre</label></div>
      <div class="col-md-10">
    <input class="form-control" id="nombre<?php echo $row_usuario['id_cliente'];?>" name="nombre"  value="<?php echo $row_usuario['nombre'];?>"
    placeholder="Nombre" required maxlength="50" >
      </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Correo</label></div>
      <div class="col-md-10">
          <input type="email" class="form-control" id="correo<?php echo $row_usuario['id_cliente'];?>"  name="correo"   value="<?php echo $row_usuario['correo'];?>"  required maxlength="50" >
      </div>
  </div>
</div>
<br>
  <div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Direcion</label></div>
      <div class="col-md-10">
        <input class="form-control" id="direccion<?php echo $row_usuario['id_cliente'];?>" name="direccion"  value="<?php echo $row_usuario['direccion'];?>"
    placeholder="direccion" required maxlength="200" ></div>
  </div>
</div>
<br>
<div class="row">
<div class="form-group">
      <div class="col-md-2"><label class="control-label">RTN</label></div>
      <div class="col-md-10">
          <input type="Text" class="form-control" id="RTN<?php echo $row_usuario['id_cliente'];?>"  name="RTN"  onkeypress='return validaNumericos(event)'  value="<?php echo $row_usuario['RTN'];?>"  maxlength="14">
      </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Estado</label></div>
      <div class="col-md-10">
      
<select class="form-control" id="estado<?php echo $row_usuario['id_cliente'];?>" name="estado" required >

				  <option value="1" <?php if (!(strcmp(1, htmlentities($row_usuario['estado'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Activo</option>
          <option value="0" <?php if (!(strcmp(0, htmlentities($row_usuario['estado'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Inactivo</option>
        </select>       </div>
  </div>
</div>

<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono1</label></div>
      <div class="col-md-10">
        <input class="form-control" id="Telefono1<?php echo $row_usuario['id_cliente'];?>" name="Telefono1" onkeypress='return validaNumericos(event)' value="<?php echo $row_usuario['Telefono1'];?>"
    placeholder="Telefono1" required maxlength="8" ></div>
  </div>
</div>
<br>

<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono2</label></div>
      <div class="col-md-10">
        <input class="form-control" id="Telefono2<?php echo $row_usuario['id_cliente'];?>" name="Telefono2" onkeypress='return validaNumericos(event)'  value="<?php echo $row_usuario['Telefono2'];?>"
    placeholder="Telefono2" required maxlength="8" ></div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono3</label></div>
      <div class="col-md-10">
        <input class="form-control" id="Telefono3<?php echo $row_usuario['id_cliente'];?>" name="Telefono3" onkeypress='return validaNumericos(event)' value="<?php echo $row_usuario['Telefono3'];?>"
    placeholder="Telefono3" required maxlength="8" ></div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono4</label></div>
      <div class="col-md-10">
        <input class="form-control" id="Telefono4<?php echo $row_usuario['id_cliente'];?>" name="Telefono4"onkeypress='return validaNumericos(event)'  value="<?php echo $row_usuario['Telefono4'];?>"
    placeholder="Telefono4" required maxlength="8" ></div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Telefono5</label></div>
      <div class="col-md-10">
        <input class="form-control" id="Telefono5<?php echo $row_usuario['id_cliente'];?>" name="Telefono5"onkeypress='return validaNumericos(event)'  value="<?php echo $row_usuario['Telefono5'];?>"
    placeholder="Telefono5" required maxlength="8" ></div>
  </div>
</div>


				  	  
  
<input type="hidden"  name="id_usuario" id="id_usuario<?php echo $row_usuario['id_cliente'];?>" value="<?php echo $row_usuario['id_cliente'];?>" size="32">
<input type="hidden"  name="viejo_usuario" id="viejo_usuario<?php echo $row_usuario['id_cliente'];?>" value="<?php echo $row_usuario['nombre'];?>" size="32">

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
 <button type="submit" class="btn btn-primary fa fa" id="btnEditar<?php echo $row_usuario['id_cliente'];?>">Guardar</button>
      </div>
    </div>
  </div>
</div>
    

<?php 

$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../../config/Conexion.php');

$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 7 ";
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
                        var visible = document.getElementById("btnEditar<?php echo $row_usuario['id_cliente'];?>");
                        visible.style.display= 'none';

                    }
                   
             
                      
              
                    </script>












<script>


$('#btnEditar<?php echo $row_usuario['id_cliente'];?>').click(function() {
    if ($('#formEdita<?php echo $row_usuario['id_cliente'];?>').smkValidate()) {
                

      // Code here
     var dataString=
        'nombre='+$('#nombre<?php echo $row_usuario['id_cliente'];?>').val()+
        '&estado='+$('#estado<?php echo $row_usuario['id_cliente'];?>').val()+
        '&correo='+$('#correo<?php echo $row_usuario['id_cliente'];?>').val()+
        '&RTN='+$('#RTN<?php echo $row_usuario['id_cliente'];?>').val()+
        '&direccion='+$('#direccion<?php echo $row_usuario['id_cliente'];?>').val()+
        '&Telefono1='+$('#Telefono1<?php echo $row_usuario['id_cliente'];?>').val()+
        '&Telefono2='+$('#Telefono2<?php echo $row_usuario['id_cliente'];?>').val()+
        '&Telefono3='+$('#Telefono3<?php echo $row_usuario['id_cliente'];?>').val()+
        '&Telefono4='+$('#Telefono4<?php echo $row_usuario['id_cliente'];?>').val()+
        '&Telefono5='+$('#Telefono5<?php echo $row_usuario['id_cliente'];?>').val()+
        '&viejo_usuario='+$('#viejo_usuario<?php echo $row_usuario['id_cliente'];?>').val()+
        '&id_cliente='+$('#id_usuario<?php echo $row_usuario['id_cliente'];?>').val();

    $.ajax({
        type:"POST",
        url:"../ajax/ajax/editar_usuario.php",
        data:dataString
    }).done(function(data){
      if(data!=1){
          $.smkAlert({
          text: 'Excelente',
          type: 'success'
      });
        ver_tabla_usuario();
        $("#editar").modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
			}
      
			else{
            $.smkAlert({
            text: 'Errora',
            type: 'danger'
        });
			}
    })
  
  }
});

  
</script>  