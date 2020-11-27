<?php
require "../config/Conexion.php";

IF (isset($_POST["btnEmpty1"])){
$nombre =($_POST['nombre']);
$estado=$_POST['estado']; 
$correo=$_POST['correo']; 
$RTN = $_POST['RTN'];
$direccion = $_POST['direccion'];
$Telefono1 = $_POST['telefono_1'];
$Telefono2 = isset($_POST['telefono_2'])?$_POST['telefono_2']:'0';
$Telefono3 = isset($_POST['telefono_3'])?$_POST['telefono_3']:'0';
$Telefono4 = isset($_POST['telefono_4'])?$_POST['telefono_4']:'0';
$Telefono5 = isset($_POST['telefono_5'])?$_POST['telefono_5']:'0';

$sql=ejecutarConsulta_row("SELECT * FROM tbl_cliente WHERE nombre='$nombre'");
if($sql==0){
  
ejecutarConsulta("INSERT INTO tbl_cliente(nombre,correo,estado,RTN) value('$nombre','$correo','$estado','$RTN ')");

$id=mysqli_insert_id($conexion);
ejecutarConsulta("INSERT INTO tbl_tipo_tel_dir(id_cliente,Telefono1,Telefono2,Telefono3,Telefono4,Telefono5) 
value($id,'$Telefono1','$Telefono2','$Telefono3','$Telefono4','$Telefono5') ");
ejecutarConsulta("INSERT INTO tbl_direccion(id_cliente,direccion) value($id,'$direccion') ");

}
else{
  echo '<script type="text/javascript">
 alert("EL Cliente que desea ingresar ya existe")
       </script>'
      ;}
    }
?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
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

<form id="formEmpty1" data-smk-icon="glyphicon-remove" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Cliente</label></div>
      <div class="col-md-10">
    <input class="form-control" id="nombre" name="nombre"
    placeholder="Nombre" required maxlength="50" >
      </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">RTN</label></div>
      <div class="col-md-10">
          <input type="text" class="form-control" id="RTN"  name="RTN"  minlength="14" maxlength="14" onkeypress='return validaNumericos(event)'>
      </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Correo</label></div>
      <div class="col-md-10">
    <input type="email" class="form-control" id="correo" name="correo"
    placeholder="Correo" required maxlength="50" >
      </div>
  </div>
</div>
<br>
<div class="row">
  <div class="form-group">
      <div class="col-md-2"><label class="control-label">Direccion</label></div>
      <div class="col-md-10">
          <input type="text" class="form-control" id="direccion" maxlength="50" name="direccion" required>
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

<script>
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

function agregartelefono(){
	var numtel= Number($('#numtel').val());
	numtel+=1;
	if(numtel >5){
		bootbox.alert('No se pueden agregar mas de 5 Teléfonos');
		return false;
	}else{
		var html='<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 divTemp">';
		html+=' <label>Telefono '+numtel+':</label>';
		html+=' <input type="text" class="form-control" name="telefono_'+numtel+'" id="telefono_'+numtel+'" maxlength="8" placeholder="Telefono '+numtel+'" required onkeypress="return validaNumericos(event)">';
		html+='</div>';
		$('.divTel').append(html);
		$('#numtel').val(numtel);

	}
}
</script>
<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id='divTel' class='divTel'>
                                 <input type="hidden" value="1" id='numtel'>   
                                 <button class="btn btn-info" onclick="agregartelefono()" type="button"> <i class="fa fa-plus-square"></i></button> 
                                  <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">  
                                 
                                     <label>Telefono 1 </label>
                                     <input type="text" class="form-control" name="telefono_1" id="telefono_1" maxlength="8" placeholder="Telefono 1" required onkeypress='return validaNumericos(event)'> 
                               </div>
                            </div>
                        </div>



			  	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnEmpty1" name="btnEmpty1">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
