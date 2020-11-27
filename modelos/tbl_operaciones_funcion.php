<?php
require '../config/Conexion.php';

class operaciones{

        public function _construct()
        {
            
        }
        //Funcion para insertar 
        public function insertar($nombre,$descripcion,$estado)
        {
            $sql = "INSERT INTO tbl_operaciones(id_tipo_operaciones,descripcion,estado) 
            VALUES ('$nombre','$descripcion','1')"; 
            return ejecutarConsulta($sql);

            $objeto="Operacion";
            $id_usuario=$_SESSION['id'];               
                 
            $accion="CREADO"; 
            $descripcion1='se creo una Operacion';
            ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion ,Antes,Despues) 
            VALUES ('$id_usuario','$objeto','$accion','$descripcion1',' ','$nombre') ");
        }
        //Funcion para editar  
        public function editar($id_operacion,$nombre,$descripcion)
        {
            $sql=" UPDATE tbl_operaciones SET  id_tipo_operaciones='$nombre', descripcion='$descripcion'
            WHERE id_operacion='$id_operacion'";

$var1= ("SELECT id_tipo_operaciones, descripcion  FROM tbl_operaciones WHERE id_operacion='$id_operacion'");
                $dato=ejecutarConsultaSimpleFila($var1);
                       if($row =$dato){
                           $F_N=$row["id_tipo_operaciones"];
                           $F_D=$row["descripcion"];
                          
			
			

                                }
                                /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="operaciones ";
$accion="EDITADO"; 															                                    
$descripcion1="Se edito un campo de operaciones ";																				
if($F_N != $nombre){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion1','$F_N','$nombre')");  }
if($F_D != $descripcion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion1','$F_D','$descripcion')");           ;           } 


            return ejecutarConsulta($sql);

        }

        //Implementamos un método para desactivar registros
	public function desactivar($id_operacion)
	{
		$sql="UPDATE tbl_operaciones SET estado='0' 
              WHERE id_operacion='$id_operacion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_operacion)
	{
		$sql="UPDATE tbl_operaciones SET estado ='1' 
              WHERE id_operacion='$id_operacion'";
		return ejecutarConsulta($sql);
	}

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_operacion)
	{
        $sql="SELECT * FROM tbl_operaciones where id_operacion='$id_operacion'" ;
	return ejecutarConsultaSimpleFila($sql);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sql="SELECT * FROM tbl_operaciones
               " ;
		return ejecutarConsulta($sql);		
	}
        //Falta funcion modificado por//        
}
?>