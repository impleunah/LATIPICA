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
	<!-- Modal -->
	<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" onClick="location.reload();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-remove'></i> ¿Seguro que desea eliminar este Permiso?</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_password" name="editar_password">
			<div id="resultados_ajax3"></div>

			  <div class="form-group">
				
				<div class="col-sm-8">
					<input type="hidden" id="moda" name="moda">
				</div>
			  </div>
	
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-danger"  id="btn_eliminar" onClick="location.reload();" name="btn_eliminar">Eliminar Permiso</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
</div>
	