<?php

require '../config/Conexion.php';

class Pantalla{
                     
        public function _construct()
        {
            
		}
		 //Funcion para insertar 
		 public function insertar($objeto,$tipo_objeto,$descripcion,$usu)
		 {
			 $sql = "INSERT INTO tbl_pantallas(objeto,tipo_objeto,descripcion,creado_por,modificado_por) 
			 VALUES ('$objeto','$tipo_objeto','$descripcion','$usu','$usu')"; 
			
			$id_usuario=$_SESSION['id'];
                  $objeto="pantallas";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion='se creo una pantalla';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) 
                 VALUES (' $id_usuario','$objeto','$accion','$descripcion') ");
			
			return ejecutarConsulta($sql);
		 }

		 //Funcion para editar  
		 public function editar($id_objeto,$objeto,$tipo_objeto,$descripcion,$usu)
		 {
			 $sql="UPDATE tbl_pantallas SET  objeto='$objeto', tipo_objeto='$tipo_objeto', descripcion='$descripcion', modificado_por='$usu'
			 WHERE id_objeto='$id_objeto'";
			 return ejecutarConsulta($sql);
		}
    //Implementar un método para listar los registros en oantalla Angelica Najera 24 febrero 2020
	    public function listar()
	{
		$sqluser="SELECT * FROM tbl_pantallas
		ORDER BY id_objeto  ASC";
		return ejecutarConsulta($sqluser);		
	}
	
	public function mostrar($id_objeto )
	{
		$sql="SELECT * FROM tbl_pantallas
		 WHERE id_objeto ='$id_objeto'";
		return ejecutarConsultaSimpleFila($sql);
	}
    
    //Implementamos un método para desactivar registros
	public function desactivar($id_objeto)
	{
		$sql="UPDATE tbl_pantallas 
		SET estado='0' WHERE id_objeto ='$id_objeto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_objeto)
	{
		$sql="UPDATE tbl_pantallas 
		SET estado='1' WHERE id_objeto ='$id_objeto'";
		return ejecutarConsulta($sql);
	}

}
?>
    

