<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Categoria
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcategoria)
	{
		$sql="SELECT * FROM tbl_cliente WHERE id_cliente='$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM tbl_cliente where  estado ='1'";
		return ejecutarConsulta($sql);		
	}
	public function listar_v()
	{
		$sql="SELECT * FROM tbl_cliente ";
		return ejecutarConsulta($sql);		
	}


	public function listar_f()
	{
		$sql="SELECT v.idventa, fecha,nombre,Nombre_Usuario,  numero	, total_venta, v.estado from venta v  join tbl_cliente c on c.id_cliente = v.id_cliente 
		join tbl_usuario u  on u.id_usuario = v.id_usuario join tbl_facturas_serie f on f.idventa= v.idventa where   ORDER by v.idventa ASC";
		return ejecutarConsulta($sql);		
	}
	public function desactivar($idarticulo)
	{
		$sql="UPDATE tbl_articulo SET estado='0' WHERE id_cliente='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idarticulo)
	{
		$sql="UPDATE tbl_articulo SET estado='1' WHERE id_cliente='$idarticulo'";
		return ejecutarConsulta($sql);
	}
}

?>