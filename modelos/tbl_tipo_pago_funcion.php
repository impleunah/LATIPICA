<?php
require '../config/Conexion.php';

class Pago{

        public function _construct()
        {
            
        }
        //Funcion para insertar un Pago en la base de datos 
        public function insertar($id_tipo_pago,$tipo_pago,$descripcion)
        {
            $sqluser = "INSERT INTO  tbl_tipo_pago (id_tipo_pago,tipo_pago,descripcion) 
            VALUES ('$id_tipo_pago','$tipo_pago','$descripcion')"; 
            return ejecutarConsulta($sqluser);
        }
        //Funcion para editar un pago en la base de datos 
        public function editar($id_tipo_pago,$tipo_pago,$descripcion)
        {
            $sqluser="UPDATE tbl_tipo_pago 
            SET tipo_pago = '$tipo_pago', descripcion='$descripcion'
            WHERE id_tipo_pago='$id_tipo_pago'";
            return ejecutarConsulta($sqluser);

        }

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_tipo_pago)
	{
        $sqluser="SELECT* FROM tbl_tipo_pago
         where id_tipo_pago='$id_tipo_pago'" ;
		return ejecutarConsultaSimpleFila($sqluser);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sqluser="SELECT * FROM tbl_tipo_pago " ;
		return ejecutarConsulta($sqluser);		
	}

        
}
?>