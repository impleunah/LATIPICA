<?php
require '../config/Conexion.php';

class Permiso{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertar($id_rol,$id_objeto,$permiso_insercion ,$permiso_consulta ,$permiso_actualizacion,$usu,$estado,$Mostar_Menu ){
        if($Mostar_Menu==0){
            $permiso_actualizacion=0;
            $permiso_consulta=0;
            $permiso_insercion=0;
            $sqll = "INSERT INTO  tbl_roles_objeto (id_rol,id_objeto,permiso_insercion ,permiso_consulta ,permiso_actualizacion,estado, Mostar_Menu) 
            VALUES ('$id_rol','$id_objeto','$permiso_insercion' ,'$permiso_consulta' ,'$permiso_actualizacion','1','$Mostar_Menu' )";
        }
            if($permiso_consulta==0){
            $permiso_actualizacion=0;
            $sqll = "INSERT INTO  tbl_roles_objeto (id_rol,id_objeto,permiso_insercion ,permiso_consulta ,permiso_actualizacion,estado, Mostar_Menu) 
            VALUES ('$id_rol','$id_objeto','$permiso_insercion' ,'$permiso_consulta' ,'$permiso_actualizacion','1','$Mostar_Menu' )"; 
          
            $objeto="Se creo un nuevo permiso ";
            $accion="creado "; 
            $descricion="Se creo un nuevo Permiso";
            $query1 = "SELECT id_usuario FROM tbl_usuario where  Nombre_Usuario='$usu'";
            $result1 =ejecutarConsulta($query1);
            while($row = mysqli_fetch_array($result1)){
            $id= $row['id_usuario'];
            }
            ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) VALUES ('$id','$objeto','$accion','$descricion') ");
            
            return ejecutarConsulta($sqll);
        }else{ $sqll = "INSERT INTO  tbl_roles_objeto (id_rol,id_objeto,permiso_insercion ,permiso_consulta ,permiso_actualizacion,estado, Mostar_Menu) 
            VALUES ('$id_rol','$id_objeto','$permiso_insercion' ,'$permiso_consulta' ,'$permiso_actualizacion','1','$Mostar_Menu' )"; 

        }  return ejecutarConsulta($sqll);
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editar($id_permiso,$id_rol,$id_objeto,$permiso_insercion ,$permiso_consulta,$permiso_actualizacion,$NOMBRE,$Mostar_Menu )
        {
            if($Mostar_Menu==0){
                $permiso_actualizacion=0;
                $permiso_consulta=0;
                $permiso_insercion=0;
            $sql="UPDATE tbl_roles_objeto SET id_rol='$id_rol', id_objeto='$id_objeto',permiso_insercion='$permiso_insercion' ,Mostar_Menu ='$Mostar_Menu',
            permiso_consulta='$permiso_consulta',permiso_actualizacion='$permiso_actualizacion'
            WHERE id_permiso='$id_permiso'";
        
            
        $var1= ("SELECT id_rol, id_objeto, permiso_insercion, Mostar_Menu, permiso_consulta, permiso_actualizacion FROM tbl_roles_objeto WHERE id_permiso='$id_permiso'");
        $dato=ejecutarConsultaSimpleFila($var1);
               if($row =$dato){
                   $F_R=$row["id_rol"];
                   $F_O=$row["id_objeto"];
                   $F_I=$row["permiso_insercion"];
                    $F_MM=$row["Mostar_Menu"];
                    $F_PC=$row["permiso_consulta"];
                    $F_PA=$row["permiso_actualizacion"];
        }
                    /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="roles_objeto ";
                       $accion="EDITADO"; 															                                    
                       $descripcion="Se edito un campo de Permisos de Usuario ";																				
                       if($F_R != $id_rol){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_R','$id_rol')");  }
                       if($F_O != $id_objeto){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_O','$id_objeto')");           ;           } 
                       if($F_I != $permiso_insercion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_I','$permiso_insercion')");   } 
                       if($F_MM != $Mostar_Menu){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_MM','$Mostar_Menu')");      }
                       if($F_PC != $permiso_consulta){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_PC','$permiso_consulta')");  }
                       if($F_PA != $permiso_actualizacion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_PA','$permiso_actualizacion')");           ;           } 
                         
            
        } 

        if($permiso_consulta==0){
            $permiso_actualizacion=0;
            $sql="UPDATE tbl_roles_objeto SET id_rol='$id_rol', id_objeto='$id_objeto',permiso_insercion='$permiso_insercion' ,Mostar_Menu ='$Mostar_Menu',
            permiso_consulta='$permiso_consulta',permiso_actualizacion='$permiso_actualizacion'
            WHERE id_permiso='$id_permiso'";
            
            $var1= ("SELECT id_rol, id_objeto, permiso_insercion, Mostar_Menu, permiso_consulta, permiso_actualizacion FROM tbl_roles_objeto WHERE id_permiso='$id_permiso'");
            $dato=ejecutarConsultaSimpleFila($var1);
                   if($row =$dato){
                       $F_R=$row["id_rol"];
                       $F_O=$row["id_objeto"];
                       $F_I=$row["permiso_insercion"];
                        $F_MM=$row["Mostar_Menu"];
                        $F_PC=$row["permiso_consulta"];
                        $F_PA=$row["permiso_actualizacion"];
            }
                        /* VALIDAR BITACORA   */ 
    $id_usuario=$_SESSION['id'];
    $objeto="roles_objeto ";
                           $accion="EDITADO"; 															                                    
                           $descripcion="Se edito un campo de Permisos de Usuario ";																				
                           if($F_R != $id_rol){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_R','$id_rol')");  }
                           if($F_O != $id_objeto){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_O','$id_objeto')");           ;           } 
                           if($F_I != $permiso_insercion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_I','$permiso_insercion')");   } 
                           if($F_MM != $Mostar_Menu){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_MM','$Mostar_Menu')");      }
                           if($F_PC != $permiso_consulta){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_PC','$permiso_consulta')");  }
                           if($F_PA != $permiso_actualizacion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_PA','$permiso_actualizacion')");           ;           } 
                             
            
            return ejecutarConsulta($sql);
        }else{$sql="UPDATE tbl_roles_objeto SET id_rol='$id_rol', id_objeto='$id_objeto',permiso_insercion='$permiso_insercion' ,Mostar_Menu ='$Mostar_Menu',
            permiso_consulta='$permiso_consulta',permiso_actualizacion='$permiso_actualizacion'
            WHERE id_permiso='$id_permiso'";
            
            
            
            $var1= ("SELECT id_rol, id_objeto, permiso_insercion, Mostar_Menu, permiso_consulta, permiso_actualizacion FROM tbl_roles_objeto WHERE id_permiso='$id_permiso'");
            $dato=ejecutarConsultaSimpleFila($var1);
                   if($row =$dato){
                       $F_R=$row["id_rol"];
                       $F_O=$row["id_objeto"];
                       $F_I=$row["permiso_insercion"];
                        $F_MM=$row["Mostar_Menu"];
                        $F_PC=$row["permiso_consulta"];
                        $F_PA=$row["permiso_actualizacion"];
            }
                        /* VALIDAR BITACORA   */ 
    $id_usuario=$_SESSION['id'];
    $objeto="roles_objeto ";
                           $accion="EDITADO"; 															                                    
                           $descripcion="Se edito un campo de Permisos de Usuario ";																				
                           if($F_R != $id_rol){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_R','$id_rol')");  }
                           if($F_O != $id_objeto){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_O','$id_objeto')");           ;           } 
                           if($F_I != $permiso_insercion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_I','$permiso_insercion')");   } 
                           if($F_MM != $Mostar_Menu){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_MM','$Mostar_Menu')");      }
                           if($F_PC != $permiso_consulta){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_PC','$permiso_consulta')");  }
                           if($F_PA != $permiso_actualizacion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_PA','$permiso_actualizacion')");           ;           } 
                             
            
            
            
            ;}
        return ejecutarConsulta($sql);
    }

        //Funcion para mostrar datos 25 febrero 2020 
        public function mostrar($id_permiso)
	{
        $sql="SELECT id_permiso,id_rol,id_objeto,Mostar_Menu,permiso_insercion ,permiso_consulta,permiso_actualizacion,fecha_creacion,estado 
        FROM tbl_roles_objeto where id_permiso ='$id_permiso'";
       return ejecutarConsultaSimpleFila($sql);
    }

    //Implementamos un método para desactivar registros
	public function desactivar($id_permiso)
	{
		$sql="UPDATE tbl_roles_objeto SET estado ='0' WHERE id_permiso='$id_permiso'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_permiso)
	{
		$sql="UPDATE tbl_roles_objeto SET estado ='1' WHERE id_permiso='$id_permiso'";
		return ejecutarConsulta($sql);
	}
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sql="SELECT c.id_permiso,a.rol,b.objeto,Mostar_Menu,c.permiso_insercion ,c.permiso_consulta,c.permiso_actualizacion,c.fecha_creacion,c.estado
        FROM tbl_roles_objeto c 
        join tbl_roles a     on a.id_rol=c.id_rol
        join tbl_pantallas b on b.id_objeto= c.id_objeto
        ORDER BY id_permiso ASC";
        
	return ejecutarConsulta($sql);		
	}
        //Falta funcion modificado por//
    
        
}
?>