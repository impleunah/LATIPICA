<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Categori
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM tbl_facturas_compras f join tbl_cliente c on c.id_cliente = f.id_cliente	";
		return ejecutarConsulta($sql);		
	}
}

?>