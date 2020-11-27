<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img class="anulada" src="img/anulado.png" alt="Anulada">
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img src="img/latipica1.jpg">
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">SISTEMA VENTAS LA TIPICA</span>
					<p>Avenida las américas Zona 13, Guatemala</p>
					<p>Teléfono: +(502) 2222-3333</p>
					<p>Email: info@abelosh.com</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: <strong>000001</strong></p>
					<p>Fecha: 20/01/2019</p>
					<p>Hora: 10:30am</p>
					<p>Vendedor: Jorge Pérez Hernández Cabrera</p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
							<td><label>Nit:</label><p>54895468</p></td>
							<td><label>Teléfono:</label> <p>7854526</p></td>
						</tr>
						<tr>
							<td><label>Nombre:</label> <p>Angel Arana Cabrera</p></td>
							<td><label>Dirección:</label> <p>Calzada Buena Vista</p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>


















	
	<table id="factura_detalle" >
			<thead>
				<tr>
							<th >Articulo</th>
                            <th >Cantidad</th>
                            <th >Precio Venta</th>
                            <th>Subtotal</th>
				</tr>
			</thead>


			<tbody id="detalle_productos">
			<tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Subtotal</TH>
                                    <th><h4 id="total_f">L 0.00</h4><input type="hidden" name="total1_f" id="total1_f"></th> 
                                    </tr>
                                <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Descuento</TH>
                                    <th><h4 id="descuento_f">L 0.0</h4><input type="HIDDEN"  name="descuento2_f" id="descuento2_f"></th> 
                                    </tr>
                                    <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> Venta Neta</TH>
                                    <th><h4 id="vneta_f" >L 0.0</h4><input type="HIDDEN"  name="vneta_f" id="vneta_f"></th> 
                                    </tr>
                                    <tr>
                                <th></th>
                                    <th></th>
                                    <th></th>
                                    <TH> I.S.V</TH>
                                    <th><h4 id="iva_f">L 0.00</h4><input type="hidden" name="iva1_f" id="iva1_f"></th>
                                     </tr>
                                    <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th><h4 id="total_f">L 0.00</h4><input type="hidden" name="total_venta_f" id="total_venta_f"></th>
                                     </tr>



			</tbody>
			<tfoot id="detalle_totales">
				
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>