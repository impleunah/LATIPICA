<?php
ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
;


	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
	require "../../config/Conexion.php";
		$id=	$_GET["id"];
	

		$query = "SELECT v.idventa, fecha,nombre,Nombre_Usuario,r.cai,v.estado,  num_factura from venta v  
		join tbl_cliente c on c.id_cliente = v.id_cliente 
		join tbl_usuario u  on u.id_usuario = v.id_usuario 
        join tbl_reg_facturacion r on r.id_reg_facturacion=v.id_reg_facturacion where idventa='$id'
		";
		$result = mysqli_query($conexion, $query);
  
	while($row = mysqli_fetch_array($result)){
   
	$idventa = $row['idventa'];
	$fecha =$row['fecha'];
	$Nombre_Usuario =$row['Nombre_Usuario'];
	$nombre =$row['nombre'];
	$cai =$row['cai'];
	$num_factura =$row['num_factura'];
	$estado =$row['estado'];	
}

$query1 = "SELECT * FROM tbl_cliente where  nombre='$nombre'
		";
		$result1 = mysqli_query($conexion, $query1);
  
	while($row1 = mysqli_fetch_array($result1)){
		$id_cliente = $row1['id_cliente'];
	$nombre_c = $row1['nombre'];
	$correo =$row1['correo'];
	$RTN =$row1['RTN'];

}
$query2 = "SELECT * FROM tbl_tipo_tel_dir where  id_cliente='$id_cliente'
		";
		$result2 = mysqli_query($conexion, $query2);
  
	while($row2 = mysqli_fetch_array($result2)){
		$Telefono1 = $row2['Telefono1'];
}
$query3 = "SELECT * FROM tbl_direccion where  id_cliente='$id_cliente'
		";
		$result3 = mysqli_query($conexion, $query3);
  
	while($row3 = mysqli_fetch_array($result3)){
		$direccion = $row3['direccion'];
}




if(empty($nombre_c )){$nombre_c ='';}else{};
if(empty($correo )){$correo ='';}else{};
if(empty($RTN )){$RTN ='';}else{};
	
 //print_r($configuracion); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
IF($estado==0){ ?>

<img class="anulada" src="img/anulado.png" alt="Anulada">
<?PHP
}
?>
<body>
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					
				</div>
			</td>
			<td class="info_empresa">
			<input type="hidden" name="i_f" id="i_f" value="<?php echo $id?>">
				<div>
				<span class="h2">LA TIPICA</span>
					<p>EL TRAPICHE</p>
					<p>Teléfono: +(504) 2222-3333</p>
					<p>Email: latipica@impleunah.com</p>
				</div>
				
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: <strong><?php echo $num_factura ; ?></strong></p>
					<P>CAI<strong> <?php echo $cai ; ?></strong></P>
					<p>Fecha y hora: <?php echo $fecha ; ?></p>
				
					<p>Vendedor: <?php echo $Nombre_Usuario; ?></p>
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
							<td><label>Nombre:</label><p><?php echo $nombre; ?></p></td>
							<td><label>RTN:</label> <p><?php echo $RTN; ?></p></td>
						</tr>
						<tr>
							<td><label>Correo:</label> <p><?php echo $correo; ?></p></td>
							<td><label>Telefono:</label> <p><?php echo $Telefono1; ?></p></td>
						</tr>
						<tr><td><label>Direccion:</label> <p><?php echo $direccion; ?></p></td></tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle" style="background-color:#c3c3c3" class="round" ">
			<thead class="round" >
				<tr>
					
					<th class="textleft">Articulo</th>
					<th width="50px">Cant.</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos"  >

			<?php

							$query4 = "SELECT nombre,cantidad,precio_v,IVA,total,descu,subtotal,ventas_netas 
							FROM detalle_venta_1 dv inner join	tbl_articulo a on dv.idarticulo=a.idarticulo 
							where dv.idventa='$id'
									";
									$result4 = mysqli_query($conexion, $query4);
							
								while($row4 = mysqli_fetch_array($result4)){
									$articulo = $row4['nombre'];
									$cantidad = $row4['cantidad'];
									$precio_v = $row4['precio_v'];
									$IVA = $row4['IVA'];
									$descu = $row4['descu'];
									$total = $row4['total'];
									$subtotal = $row4['subtotal'];
									$ventas_netas  = $row4['ventas_netas'];

							

							$result_detalle = mysqli_num_rows($result4);
					

				
			 ?>
				<tr>
				
					<td  ><?php echo $row4['nombre']; ?></td>
					<td class="textcenter" ><?php echo $row4['cantidad']; ?></td>
					<td class="textright" ><?php echo $row4['precio_v']; ?></td>
					
					<td class="textright" ><?php echo ($cantidad*$precio_v) ?></td>
				</tr>
			<?php
						
								}
				

				
			?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
					<td class="textright"><span>L.<?php echo $subtotal; ?></span></td>
				</tr>
				<tr>
				<td colspan="3" class="textright"><span>Descuento.</span></td>
					<td class="textright"><span>L.<?php echo $descu; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>Ventas Netas.</span></td>
					<td class="textright"><span>L.<?php echo $ventas_netas; ?></span></td>
				</tr>
				<tr>
				<td colspan="3" class="textright"><span>ISV.</span></td>
					<td class="textright"><span>L.<?php echo $IVA; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>TOTAL.</span></td>
					<td class="textright"><span>L.<?php echo $total; ?></span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>

<script type="text/javascript" src="../../vistas/scripts/listarF.js"></script>
<?php
}
ob_end_flush();
?>