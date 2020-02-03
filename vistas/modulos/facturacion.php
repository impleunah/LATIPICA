<div class="content-wrapper">
    
    <section class="content-header">

    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Factura</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modelos/productos.modelo.php");
			
		?>
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
					  <input id="id_cliente" type='hidden'>	
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Teléfono</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
							</div>
					<label for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
							</div>
				 </div>
						<div class="form-group row">
							 <label for="tel1" class="col-md-1 control-label">Identidad</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Identidad" readonly>
							</div>

							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
							<label for="email" class="col-md-1 control-label">Pago</label>
							<div class="col-md-3">
								<select class='form-control input-sm' id="condiciones">
									<option value="1">Efectivo</option>
									<option value="2">Cheque</option>
									<option value="3">Transferencia bancaria</option>
									<option value="4">Crédito</option>
								</select>
							</div>
						</div>
						<!---->
						<div class="form-group row">
						<label for="nombre_producto" class="col-md-1 control-label">Producto</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_producto" placeholder="Selecciona un producto" required>
					  <input id="id_cliente" type='hidden'>	
				  </div>
				</div>

						
						<!---->		
					<div class="form-group row">
						<label for="nombre_servicio" class="col-md-1 control-label">Servicio</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_servicio" placeholder="Selecciona servicio" required>
					  <input id="id_cliente" type='hidden'>	
				  </div>
				</div>
				
				
				<div class="col-md-6">
					
						<button type="submit" class="btn btn-default" style="margin: 10px">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>

					</div>	
				</div>
			</form>	
			<!--Mostrar Resultados-->
			<div class="table-responsive">
			  <table class="table">
				<tr  class="danger">
					<th>Código</th>
					<th>Producto</th>
					<th>Cant.</span></th>
					<th>Precio</span></th>
					<th>Agregar</th>
				</tr>
			  </table>
			</div>
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>
	
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_factura.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});	
	</script>
</section>
</div>

