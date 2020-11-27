<?php 
//Incluímos inicialmente la conexión a la base de datos.
require "../config/Conexion.php";

Class Articulo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT *
		FROM tbl_articulo a join tbl_presentacion b on b.id_presentacion=a.id_presentacion";
		return ejecutarConsulta($sql);		
	}
}