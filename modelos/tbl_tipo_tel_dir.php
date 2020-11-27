<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Tipo_Telefono_Direccio
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($id_cliente,$Tipo_Telefono_Direccion,$tipo,$Descripcion)
	{
		$sql="INSERT INTO tbl_tipo_tel_dir (id_cliente,Tipo_Telefono_Direccion,tipo,Descripcion)
		VALUES ($id_cliente,$Tipo_Telefono_Direccion,$tipo,$Descripcion)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_telefono_direccion,$Tipo_Telefono_Direccion,$tipo,$Descripcion,$id_cliente)
	{
		$sql="UPDATE tbl_tipo_tel_dir  SET Tipo_Telefono_Direccion='$Tipo_Telefono_Direccion',
        Descripcion='$Descripcion' ,tipo='$tipo',id_cliente='1'  WHERE id_telefono_direccion='$id_telefono_direccion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_telefono_direccion)
	{
		$sql="UPDATE tbl_tipo_tel_dir SET Estadon='0' WHERE id_telefono_direccion='$id_telefono_direccion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_telefono_direccion)
	{
		$sql="UPDATE tbl_tipo_tel_dir SET Estadon='1' WHERE id_telefono_direccion='$id_telefono_direccion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_telefono_direccion)
	{
		$sql="SELECT * FROM tbl_tipo_tel_dir  t
		join tbl_cliente c on  c.id_cliente =t.id_cliente   WHERE id_telefono_direccion='$id_telefono_direccion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM tbl_tipo_tel_dir  t
		join tbl_cliente c on  c.id_cliente =t.id_cliente
		ORDER BY id_telefono_direccion ASC   ";
		return ejecutarConsulta($sql);		
	}
}

?>