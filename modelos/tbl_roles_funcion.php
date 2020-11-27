<?php
require '../config/Conexion.php';

class rol{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertarrol($rol,$descripcion,$usu)
        {
            $sqluser = "INSERT INTO  tbl_roles (rol,descripcion,creado_por,modificado_por) 
            VALUES ('$rol','$descripcion','$usu','$usu')"; 

$id_usuario=$_SESSION['id'];
                  $objeto="roles";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion='se creo un rol';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despue) 
                 VALUES (' $id_usuario','$objeto','$accion','$descripcion',' ','$rol') ");


            return ejecutarConsulta($sqluser);
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editarrol($id_rol,$rol,$descripcion,$usu)
        {

                $sqluser="UPDATE `tbl_roles` SET `rol` = '$rol', `descripcion` = '$descripcion',
                  `modificado_por` = '$usu' WHERE `tbl_roles`.`id_rol` = '$id_rol'";
            

            $var1= ("SELECT rol, descripcion, modificado_por FROM tbl_roles WHERE id_rol = '$id_rol'");
            $dato=ejecutarConsultaSimpleFila($var1);
                   if($row =$dato){
                       $F_R=$row["rol"];
                       $F_D=$row["descripcion"];
                       $F_MP=$row["modificado_por"];
                        
                    
                    

                            }
                            /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$c=$_SESSION['Nombre_Usuario'];
$objeto="roles ";
$id_usuario=$_SESSION['id'];
$accion="EDITADO"; 															                                    
$descripcion1="Se edito un campo de Roles ";																				
if($F_R != $rol){ejecutarConsulta("INSERT INTO   tbl_bitacoras($id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion1','$F_R','$rol')");  }
if($F_D != $descripcion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion1','$F_D','$descripcion')");   } 
if($F_MP != $usu){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion1','$F_MP','$c')");   } 

           
            return ejecutarConsulta($sqluser);

        }

        //Implementamos un método para desactivar registros
	public function desactivar($id_rol)
	{
		$sql="UPDATE tbl_roles SET estado='0' 
              WHERE id_rol='$id_rol'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_rol)
	{
		$sql="UPDATE tbl_roles SET estado ='1' 
              WHERE id_rol='$id_rol'";
		return ejecutarConsulta($sql);
	}

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_rol)
	{
        $sqluser="SELECT*FROM tbl_roles where id_rol='$id_rol'" ;
		return ejecutarConsultaSimpleFila($sqluser);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sqluser="SELECT * FROM tbl_roles
                  ORDER BY id_rol ASC " ;
		return ejecutarConsulta($sqluser);		
	}
        //Falta funcion modificado por//
    
        
}
?>