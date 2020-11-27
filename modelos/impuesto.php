<?php
require '../config/Conexion.php';

class impuesto{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertar($descripcion)
        {
            $sql = "INSERT INTO tbl_impuesto(descripcion,estado)  VALUES ('$descripcion',0)"; 
           
            $id_usuario=$_SESSION['id'];
            $objeto="impuesto";
                           
           
           $accion="CREADO"; 
           $descripcion1='se creo un impuesto';
           ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) 
           VALUES (' $id_usuario','$objeto','$accion','$descripcion1',' ','$descripcion') ");
           
            return ejecutarConsulta($sql);
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editar($id_impuesto,$descripcion)
        {
            $sql=" UPDATE tbl_impuesto SET descripcion ='$descripcion'
            WHERE id_impuesto='$id_impuesto'";

$var1= ("SELECT descripcion FROM tbl_impuesto WHERE id_impuesto='$id_impuesto'");
                $dato=ejecutarConsultaSimpleFila($var1);
                       if($row =$dato){
                           $df=$row["descripcion"];
                           
			
			

                }
                $id_usuario=$_SESSION['id'];
 						$objeto="impuesto ";
                                                $accion="EDITADO"; 															                                    
                                                $descripcion1="Se edito un campo de impuesto ";																				
                                                if($df != $descripcion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  
                                                VALUES ('$id_usuario','$objeto','$accion','$descripcion1','$df','$descripcion')");  }


            return ejecutarConsulta($sql);

        }

        //Funcion para mostrar datos 
        public function mostrar($id_impuesto)
	{
        $sql="SELECT id_impuesto, descripcion ,estado FROM tbl_impuesto where id_impuesto='$id_impuesto'" ;
		return ejecutarConsultaSimpleFila($sql);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sql="SELECT * FROM tbl_impuesto
        ";
		return ejecutarConsulta($sql);		
	}
        //Falta funcion modificado por//
        public function desactivar($id_impuesto)
            {
                $sql="UPDATE tbl_impuesto SET estado='0'where id_impuesto='$id_impuesto' ";
                return ejecutarConsulta($sql);
            }

            //Implementamos un método para activar categorías
            public function activar($id_impuesto)
            {
                
                $sql="UPDATE tbl_impuesto SET estado ='1' WHERE id_impuesto='$id_impuesto' ";
                return  ejecutarConsulta($sql);
            }
    
        
}
?>