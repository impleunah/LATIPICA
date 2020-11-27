<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class parametro
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($id_usuario,$descripcion,$valor,$estado)
	{
		$sql="INSERT INTO tbl_parametros(Parametro,descripcion,valor,estado)
		VALUES ('$id_usuario','$descripcion','$valor','1')";


		


		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_usuario,$descripcion,$valor,$id_parametro,$usu)
	{
		$sql="UPDATE tbl_parametros SET Parametro='$id_usuario',descripcion='$descripcion',valor='$valor'WHERE id_parametro='$id_parametro' ";
		
		$var1= ("SELECT Parametro, descripcion, valor FROM tbl_parametros WHERE id_parametro='$id_parametro' ");
		$dato=ejecutarConsultaSimpleFila($var1);
			   if($row =$dato){
				   $F_V=$row["valor"];
				  
	
	

		}
		/* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="parametros ";
					   $accion="EDITADO"; 															                                    
					   																				
					   if($F_V != $valor){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_V','$valor')");  }
					   

		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($id_parametro)
	{
		$sql="UPDATE tbl_parametros 
		SET estado ='0' 
		WHERE id_parametro='$id_parametro'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_parametro)
	{
		$sql="UPDATE tbl_parametros 
		SET estado  ='1' 
		WHERE id_parametro='$id_parametro'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_parametro)
	{
		$sql="SELECT * FROM tbl_parametros
		 WHERE id_parametro='$id_parametro'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM tbl_parametros
		ORDER BY Parametro  ASC ";
		return ejecutarConsulta($sql);		
	}
}

?>