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
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar usuario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>
			
			<div class="form-group">
				<label for="nombre_usuario" class="col-sm-3 control-label">Nombres</label>
				<div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				  <input type="text" class="form-control" id="nombre_usuarios" name="nombre_usuarios" autocomplete="off" style="text-transform: uppercase;" onkeyup="return unespacionom()" onkeypress="return soloLetras(event)" placeholder="Nombres" required>
				  <input type="hidden" id="mod_id" name="mod_id">
				</div>
                </div>
			  </div>
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
    
    function unespacionom(){
		orig=document.editar_usuario.nombre_usuarios.value;
		nuev=orig.split('  ');
		nuev=nuev.join(' ');
		document.editar_usuario.nombre_usuarios.value=nuev;
		if(nuev=orig.split(' ').length>=2);
	}

	
    function unosolo() {
	while(nom.value.match(/\s\s/)) nom.value = nom.value.replace('  ', ' ');
}

</script>
			  
			  <div class="form-group">
				<label for="usuarios" class="col-sm-3 control-label">Usuario</label>
				<div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				  <input type="text" class="form-control" id="usuarios" name="usuarios" style="text-transform: uppercase;" autocomplete="off" placeholder="usuario" onkeypress="return soloLetras(event)" onkeyup="return noespaciosusu()" required>
				</div>
			  </div>
                </div>
			  
			  <script type="text/javascript">                
                      function noespaciosusu(){
		              orig=document.editar_usuario.usuarios.value;
		              nuev=orig.split(' ');
		              nuev=nuev.join('');
		              document.editar_usuario.usuarios.value=nuev;
		              if(nuev=orig.split(' ').length>=2);
	}
      
               </script>

			  <div class="form-group">
				<label for="mod_rol" class="col-sm-3 control-label">Rol</label>
				<div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				  <select class='form-control' name='rols' id='rols' style="text-transform: uppercase;" onchange="load(1);">
							<option value="">Seleccione un Rol</option>
							<?php 
							$query_cod_veh=mysqli_query($mysqli,"select * from tbl_roles order by id_rol");
							while($rw=mysqli_fetch_array($query_cod_veh))	{
								?>
							<option value="<?php echo $rw['id_rol'];?>"><?php echo $rw['rol'];?></option>			
								<?php
							}

							?>
						</select>
				</div>
                  </div>
			  </div>
  
			
			  <div class="form-group">
				<label for="correo_electronico" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
                  <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				  <input type="text" class="form-control" id="correo_electronicos" name="correo_electronicos" placeholder="Correo electrónico" onkeyup="return noespaciosemail()" required>
				</div>
			  </div>
             </div>
              <script type="text/javascript">                
                      function noespaciosemail(){
		              orig=document.editar_usuario.correo_electronicos.value;
		              nuev=orig.split(' ');
		              nuev=nuev.join('');
		              document.editar_usuario.correo_electronicos.value=nuev;
		              if(nuev=orig.split(' ').length>=2);
	}
      
               </script> 
              
               
               
               
            	<div class="form-group">
  <label class="col-md-3 control-label">Estado:</label>
    <div class="col-md-8 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
		<select name="estado_usuarios"  id="estado_usuarios"class="form-control" style="text-transform: uppercase;">
			<option value="-1">--seleccione estado--</option>
			<option value="BlOQUEADO">BlOQUEADO</option>
			<option value="ACTIVO">ACTIVO</option>
			<option value="INACTIVO">INACTIVO</option>
		
		</select>
	 </div>
</div>
</div>
					 
			
		  </div>
		  <div class="modal-footer">
			<button title="Cerrar ventana" type="submit"  class="btn btn-default" name="button" type=button onclick="if(confirm('Deseas continuar?')){this.form.submit();} else{ alert('Operacion Cancelada');}" value="ELIMINAR DATOS"  onClick="location.reload();" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	