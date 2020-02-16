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
			<button type="button" onClick="location.reload();"   class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>EDITAR PERMISOS</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>
			

	
					 
	<input type="hidden" name="df" id="df">
			  <div class="form-group">
				<label for="inser" class="col-sm-3 control-label"> Inserccion</label>
				<div class="col-sm-3">  		
                    <select name="inser"  id="inser"  class="">
			<option value='S'>Si</option>
			<option value='N'>No</option>
		
		</select>
                
				</div>
			  </div>
			  <div class="form-group">
				<label for="con" class="col-sm-3 control-label">Consulta</label>
				<div class="col-sm-3">  		
                    <select name="con"  id="con"  class="">
			<option value='S'>Si</option>
			<option value='N'>No</option>
		
		</select>
                
				</div>
			  </div>		
                
			  <div class="form-group">
				<label for="edi" class="col-sm-3 control-label"> Edicion</label>
				<div class="col-sm-3">  		
                    <select name="edi"  id="edi"  class="">
			<option value='S'>Si</option>
			<option value='N'>No</option>
		
		</select>
                
				</div>
			  </div>
			
                
			  <div class="form-group">
				<label for="eliminar" class="col-sm-3 control-label">ELiminar</label>
				<div class="col-sm-3">  		
                    <select name="eliminar"  id="eliminar"  class="">
			<option value='S'>Si</option>
			<option value='N'>No</option>
		
		</select>
                
				</div>
			  </div>		 
	
		  
		  <div class="modal-footer">
		<button title="Cerrar ventana" type="submit"  class="btn btn-default" name="button" type=button onclick="if(confirm('Deseas continuar?')){this.form.submit();} else{ alert('Operacion Cancelada');}" value="ELIMINAR DATOS"  onClick="location.reload();" data-dismiss="modal">Cerrar</button>
			<button title="Cerrar Ventana" type="submit" class="btn btn-primary"  id="actualizar_datos" >Actualizar</button>
		  </div>
		  </form>
		</div>
          </div>
	  </div>
	</div>
	