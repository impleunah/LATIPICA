<!-- 
Copyright & copy; 2018-2019 All rights reserved.
IA-220 Evaluacion de Sistemas
Licda. Karla Garcia
Elabora por:
Carolin Varela
Angel Zambrano
Roger Carrillo 
Cristian Carrasco
Allan Matamoros
 -->

 	<?php
require_once ("funcs/conexion.php");
$consulta="SELECT id_rol, rol FROM tbl_roles";
		$result=mysqli_query($mysqli, $consulta) or die (mysqli_error($mysqli));
           
	?>
	<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" onClick="location.reload();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Rol</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>
			<div class="form-group">	
            <label for="parametro" class="col-sm-3 control-label">Rol</label>
				<div class="col-sm-8">
				  <input   title="Nombre del Parametro" type="text" class="form-control" id="roles" name="roles" placeholder="roles" style="text-transform: uppercase;" onkeypress="return soloLetras(event)"  maxlength="50"  onPaste="return false;" onkeyup="return unespacio60()" required> 
				  <input  type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			                <script>
    function unespacio60(){
		orig=document.editar_usuario.roles.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.editar_usuario.roles.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
function unosolo() {
	while(roles.value.match(/\s\s/)) roles.value = roles.value.replace('  ', ' ');
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

			  <div class="form-group">
				<label for="descripcions" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="descripcions" name="descripcions" placeholder="descripcions" maxlength="100" required title="Descripcion del rol" onkeypress="return soloLetras(event)" onkeyup="return unespacio61()" onPaste="return false;" style="text-transform: uppercase;" required>
				</div>
			  </div>
			                <script>
    function unespacio61(){
		orig=document.editar_usuario.descripcions.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.editar_usuario.descripcions.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
function unosolo() {
	while(descripcions.value.match(/\s\s/)) descripcions.value = descripcions.value.replace('  ', ' ');
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
	 	 
			
		  </div>
		  <div class="modal-footer">
			<button title="Cerrar ventana" type="submit"  class="btn btn-default" <input name="button" type=button onclick="if(confirm('Deseas continuar?')){this.form.submit();} else{ alert('Operacion Cancelada');}" value="ELIMINAR DATOS"  onClick="location.reload();" data-dismiss="modal">Cerrar</button>
			<button title="Cerrar Ventana" type="submit" class="btn btn-primary"  id="actualizar_datos">Actualizar</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	