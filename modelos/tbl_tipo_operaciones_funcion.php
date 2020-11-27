<?php
require '../config/Conexion.php';

class operaciones{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertar($tipo_operacion,$estado)
        {
            $sql = "INSERT INTO tbl_tipo_operaciones(tipo_operacion,estado) 
            VALUES ('$tipo_operacion','$estado')"; 
            
            $id_usuario=$_SESSION['id'];
                  $objeto="operaciones";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion='se creo una operacion';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) 
                 VALUES (' $id_usuario','$objeto','$accion','$descripcion', ) ");
            
            return ejecutarConsulta($sql);
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editar($id_tipo_operaciones,$tipo_operacion,$estado)
        {
            $sql=" UPDATE tbl_tipo_operaciones SET tipo_operacion ='$tipo_operacion', estado='$estado'
            WHERE id_tipo_operaciones='$id_tipo_operaciones'";
            return ejecutarConsulta($sql);

        }

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_tipo_operaciones)
	{
        $sql="SELECT * FROM tbl_tipo_operaciones where id_tipo_operaciones='$id_tipo_operaciones'" ;
		return ejecutarConsultaSimpleFila($sql);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sql="SELECT * FROM tbl_tipo_operaciones " ;
		return ejecutarConsulta($sql);		
	}
        //Falta funcion modificado por//
        public function desactivar($id_tipo_operaciones)
            {
                $sql="UPDATE tbl_tipo_operaciones SET estado='0' WHERE id_tipo_operaciones='$id_tipo_operaciones'";
                return ejecutarConsulta($sql);
            }

            //Implementamos un método para activar categorías
            public function activar($id_tipo_operaciones)
            {
                $sql="UPDATE tbl_tipo_operaciones SET estado ='1' WHERE id_tipo_operaciones='$id_tipo_operaciones'";
                return ejecutarConsulta($sql);
            }
    
        
}
?>