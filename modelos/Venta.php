
<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";


Class Venta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	

	//Implementamos un método para insertar registros
	public function insertar($id_cliente,$id_usuario,$id_tipo_pago,$id_reg_facturacion,$num_factura,$fecha,$total_venta,$idarticulo,$cantidad,$precio_venta,$iva1,$descuento2,$total1,$vneta1)
	{
		$sql=ejecutarConsulta_retornarID("INSERT INTO venta(id_cliente,id_usuario,id_tipo_pago,id_reg_facturacion,num_factura,total_venta,estado) 
		VALUES ('$id_cliente','$id_usuario','$id_tipo_pago','$id_reg_facturacion','$num_factura','$total_venta','1')");
	
				
				$f=ejecutarConsulta_retornarID("INSERT INTO tbl_facturas_serie(numero,idventa,id_reg_facturacion) 
								VALUES ('$num_factura','$sql','$id_reg_facturacion')");
	

	
		

		 $num_elementos=0;
		 $sw=true;

		$a=count($idarticulo);
		
		

		 while ($num_elementos < count($idarticulo))
		 {
			
			
			
			$sql_detalle = "INSERT INTO detalle_venta_1(idventa, idarticulo,cantidad,precio_v,IVA,total,descu,cod_factura,subtotal,ventas_netas) 
		VALUES ('$sql', '$idarticulo[$num_elementos]','$cantidad[$num_elementos]','$precio_venta[$num_elementos]','$iva1',$total_venta,$descuento2,$f,$total1,$vneta1)";
		ejecutarConsulta($sql_detalle) or $sw = false;
	
		$num_elementos=$num_elementos + 1;
	 }
	 return $sw;
	}

	
	//Implementamos un método para anular la venta
	public function anular($idventa)
	{
		$sql="UPDATE venta SET estado='0' WHERE idventa='$idventa'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idventa)
	{
		$sql="SELECT v.idventa, fecha,c.nombre,c.RTN,correo,Nombre_Usuario, numero as num_factura, total_venta,e.cai, v.estado from venta v 
		join tbl_cliente c on c.id_cliente = v.id_cliente
		 join tbl_usuario u on u.id_usuario = v.id_usuario 
		 join tbl_facturas_serie f on f.idventa= v.idventa
         join tbl_reg_facturacion e on v.id_reg_facturacion=e.id_reg_facturacion
         WHERE v.idventa=$idventa";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function listarDetalle($idventa)
	{
		$sql="SELECT idarticulo,nombre,codigo,stock,precio_v,imagen from  articulo a where  idventa='$idventa'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros LISTO
	public function lista()
	{
		$sql="SELECT v.idventa, v.fecha,c.nombre,u.Nombre_Usuario, v.num_factura, v.total_venta, v.estado from venta v  join tbl_cliente c on c.id_cliente = v.id_cliente 
		join tbl_usuario u  on u.id_usuario = v.id_usuario  ORDER by v.idventa ASC";
		return ejecutarConsulta($sql);		
	}

	public function ventacabecera($idventa){
		$sql="SELECT v.idventa,v.idcliente,p.nombre as cliente,p.direccion,p.tipo_documento,p.num_documento,p.email,p.telefono,v.idusuario,u.nombre as usuario,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,date(v.fecha_hora) as fecha,v.impuesto,v.total_venta FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa='$idventa'";
		return ejecutarConsulta($sql);
	}

	public function ventadetalle($idventa){
		$sql="SELECT a.nombre as articulo,a.codigo,d.cantidad,d.precio,d.impuesto,(d.cantidad*d.precio+d.impuesto) as subtotal FROM detalle_venta d 
		INNER JOIN articulo a ON d.idarticulo=a.idarticulo WHERE d.idventa='$idventa'";
		return ejecutarConsulta($sql);
	}
	public function mostrar1()
	{
		$sql=" SELECT estado FROM venta ";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar_c()
	{
		$sql=" SELECT * FROM tbl_cliente ";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function mostrar_c()
	{
		$sql=" SELECT * FROM tbl_cliente ";
		return ejecutarConsultaSimpleFila($sql);
	}

}
?>