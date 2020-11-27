<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class producto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT *
		FROM tbl_articulo  where condicion=1 and  stock>0";
		return ejecutarConsulta($sql);			
	}
	public function listar_p()
	{
		$sql="SELECT * FROM tbl_cliente";
		return ejecutarConsulta($sql);		
	}
	
}

?>