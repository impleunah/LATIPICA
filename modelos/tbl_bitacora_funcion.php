<?php
require '../config/Conexion.php';

class bitacoras{

        public function _construct(){}
      
      
    //Implementar un método para listar los registros
	    public function listar()
	{
		$sql="SELECT * FROM tbl_bitacoras b
		join  tbl_usuario u on u.id_usuario=b.id_usuario";
		return ejecutarConsulta($sql);		
	}
        
    
        
}
?>