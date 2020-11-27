<?php
require '../config/Conexion.php';

class tipo_persona{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertartipopersona($tipo_persona,$estado)
        {
            $sqluser = "INSERT INTO  tbl_tipo_persona (tipo_persona,estado) 
            VALUES('$tipo_persona','$estado')"; 
            return ejecutarConsulta($sqluser);
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editartipopersona($id_tipo_persona,$tipo_persona,$estado)
        {
            $sqluser="UPDATE tbl_tipo_persona SET tipo_persona= '$tipo_persona', estado='$estado'
            WHERE id_tipo_persona='$id_tipo_persona'";
            return ejecutarConsulta($sqluser);

        }

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_tipo_persona)
	{
        $sqluser="SELECT id_tipo_persona,tipo_persona,estado FROM tbl_tipo_persona where id_tipo_persona='$id_tipo_persona'" ;
		return ejecutarConsultaSimpleFila($sqluser);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sqluser="SELECT id_tipo_persona,tipo_persona,estado FROM tbl_tipo_persona
        ORDER BY id_tipo_persona ASC " ;
		return ejecutarConsulta($sqluser);		
	}
        //Falta funcion modificado por//
    
        
}
?>