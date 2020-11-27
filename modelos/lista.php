

<?php
require '../config/Conexion.php';
Class lista
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

public function lista()
	{
		$sql="SELECT v.idventa, fecha,nombre,Nombre_Usuario,r.cai,  num_factura, total_venta, v.estado from venta v  
		join tbl_cliente c on c.id_cliente = v.id_cliente 
		join tbl_usuario u  on u.id_usuario = v.id_usuario 
        join tbl_reg_facturacion r on r.id_reg_facturacion=v.id_reg_facturacion
		 ORDER by v.idventa desc";
		return ejecutarConsulta($sql);		
	}

	public function mostrar_p($idventa){

		$sql="SELECT v.idventa, fecha,nombre,Nombre_Usuario,r.cai,  num_factura from venta v  
		join tbl_cliente c on c.id_cliente = v.id_cliente 
		join tbl_usuario u  on u.id_usuario = v.id_usuario 
        join tbl_reg_facturacion r on r.id_reg_facturacion=v.id_reg_facturacion where idventa='$idventa'
		";
		return ejecutarConsultaSimpleFila($sql);

	}
	public function lis_p($idventa){
		$sql="SELECT precio_venta ,cantidad ,IVA,total,descu,nombre 
		FROM detalle_venta_1 v 
		join tbl_articulo a on a.idarticulo =v.idarticulo
		 where idventa= '$idventa'
		ORDER BY v.idventa ASC";

		return ejecutarConsulta($sql);	
	}

	public function listarDetalle($idventa)
	{
                
				$sql="SELECT nombre,cantidad,precio_v,IVA,total,descu,subtotal,ventas_netas 
				FROM detalle_venta_1 dv inner join	tbl_articulo a on dv.idarticulo=a.idarticulo where dv.idventa='$idventa'";
		return ejecutarConsulta($sql);
	}

	public function ventacabecera($idventa){
		$sql="SELECT v.idventa, fecha,nombre,Nombre_Usuario,r.cai,  num_factura from venta v  
		join tbl_cliente c on c.id_cliente = v.id_cliente 
		join tbl_usuario u  on u.id_usuario = v.id_usuario 
        join tbl_reg_facturacion r on r.id_reg_facturacion=v.id_reg_facturacion where idventa='$idventa'
		";
		return ejecutarConsultaSimpleFila($sql);

	}

}

?>