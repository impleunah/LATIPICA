 <?php

require_once "conexion.php";

class ModeloUsuarios{

	

	/* MOSTRAR USUARIOS */

	static public function mdlMostrarUsuarios($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlIngresarUsuarios($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO USUARIOS (Nombre_Usuario,Contraseña,Tipo_Usuario) VALUES (:Nombre_Usuario,:Contraseña,:Tipo_Usuario");

		$stmt->bindParam(":Nombre_Usuario",$datos["Nombre_Usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":Contraseña",$datos["Contraseña"],PDO::PARAM_STR);
		$stmt->bindParam(":Tipo_Usuario",$datos["Tipo_Usuario"],PDO::PARAM_STR);

		if ($stmt->execute()) 
		{
			
			return "ok";

		} else {
			
			return "error";
		
		}
		
	}

}