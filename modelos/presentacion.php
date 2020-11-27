<?php
session_start();
require '../config/Conexion.php';

class presentacion{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertar($descripcion,$estado)
        {
            $sql = "INSERT INTO tbl_presentacion(descripcion,estado) 
            VALUES ('$descripcion','$estado')"; 
           
           $id_usuario=$_SESSION['id'];
                  $objeto="presentacion";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion1='se creo una presentacion';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion ,Antes,Despues) 
                 VALUES ('$id_usuario','$objeto','$accion','$descripcion1',' ','$descripcion') ");
           
           return ejecutarConsulta($sql);
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editar($id_presentacion,$descripcion,$estado)
        {
            $sql=" UPDATE tbl_presentacion SET descripcion ='$descripcion', estado='$estado'
            WHERE id_presentacion='$id_presentacion'";

$var1= ("SELECT descripcion, estado FROM tbl_presentacion WHERE id_presentacion='$id_presentacion'");
                $dato=ejecutarConsultaSimpleFila($var1);
                       if($row =$dato){
                           $F_D=$row["descripcion"];
                           $F_E=$row["estado"];
                          
			
			

                }
                /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="presentacion ";
                       $accion="EDITADO"; 															                                    
                       $descripcion="Se edito un campo de Presentaciones ";																				
                       if($F_D != $descripcion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_D','$descripcion')");  }
                       if($F_E != $estado){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_E','$estado')");           ;           } 
                      


            return ejecutarConsulta($sql);

        }

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_presentacion)
	{
        $sql="SELECT * FROM tbl_presentacion
         where id_presentacion='$id_presentacion'" ;
		return ejecutarConsultaSimpleFila($sql);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sql="SELECT * FROM tbl_presentacion
        ORDER BY id_presentacion ASC";
		return ejecutarConsulta($sql);		
	}
        //Falta funcion modificado por//
        public function desactivar($id_presentacion)
            {
                $sql="UPDATE tbl_presentacion SET estado='0' WHERE id_presentacion ='$id_presentacion'";
                return ejecutarConsulta($sql);
            }

            //Implementamos un método para activar categorías
            public function activar($id_presentacion)
            {
                $sql="UPDATE tbl_presentacion SET estado ='1' WHERE id_presentacion='$id_presentacion'";
                return ejecutarConsulta($sql);
            }
    
        
}
?>