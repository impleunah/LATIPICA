<?php 
//Incluímos inicialmente la conexión a la base de datos.
require "../config/Conexion.php";

Class Articulo
{
	//Implementamos nuestro constructor.
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$descripcion,$codigo,$precio_venta,$fecha_fabricacion,$fecha_expiracion,$id_presentacion,$stock,$imagen,$condicion)
	{
    
		$sql="INSERT INTO tbl_articulo( nombre, descripcion1, codigo, precio_venta, fecha_fabricacion, fecha_expiracion, id_presentacion, stock,imagen,condicion) 
		VALUES ('$nombre','$descripcion','$codigo','$precio_venta',$fecha_fabricacion,$fecha_expiracion,'$id_presentacion',0,'$imagen',1)";
		
		
		$idfe=ejecutarConsulta_retornarID($sql);
		ejecutarConsulta("UPDATE tbl_articulo SET  nombre='$nombre',descripcion1='$descripcion',codigo='$codigo', precio_venta='$precio_venta', 
		fecha_fabricacion='$fecha_fabricacion', fecha_expiracion='$fecha_expiracion', id_presentacion='$id_presentacion', imagen='$imagen' 
		 WHERE idarticulo='$idfe'");
	}
	public function editar($idarticulo,$nombre,$descripcion,$codigo,$precio_venta,$id_presentacion,$fecha_fabricacion,$fecha_expiracion,$imagen)
	{
		$sql="UPDATE tbl_articulo SET  idarticulo='$idarticulo',nombre='$nombre',descripcion1='$descripcion',codigo='$codigo', precio_venta='$precio_venta', 
		fecha_fabricacion='$fecha_fabricacion', fecha_expiracion='$fecha_expiracion', id_presentacion='$id_presentacion', imagen='$imagen' 
		 WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	
	}
	

	//Implementamos un método para desactivar registros
	public function desactivar($idarticulo)
	{
		$sql="UPDATE tbl_articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idarticulo)
	{
		$sql="UPDATE tbl_articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idarticulo)
	{
		$sql="SELECT idarticulo,nombre, descripcion1,id_presentacion,codigo,precio_venta,fecha_fabricacion,fecha_expiracion, imagen
		FROM tbl_articulo  WHERE idarticulo='$idarticulo'";
		return ejecutarConsultaSimpleFila($sql);
	}


	//Implementar un método para listar los registros activos
	public function listarActivos()
	{
		$sql="SELECT*FROM tbl_articulo
		 WHERE condicion='1'
		 ORDER BY idarticulo ASC";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosVenta()
	{
		$sql="SELECT*FROM tbl_articulo
		WHERE condicion='1'
		ORDER BY idarticulo ASC";
		return ejecutarConsulta($sql);		
	}
}

?>