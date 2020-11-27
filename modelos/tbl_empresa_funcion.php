<?php
require '../config/Conexion.php';

class Empresa{

        public function _construct()
        {
            
        }
        //Funcion para insertar una empresa en la base de datos 
        public function insertar($id_operacion,$RTN,$razon_social,$nombre_comercial,$domicilio_1,$domicilio_2,$correo_1,$correo_2,$telefono_1,$telefono_2)
        {
            if($telefono_2>1){
                $sqluser = "INSERT INTO tbl_empresa (id_operacion,RTN,razon_social,nombre_comercial,domicilio_1,domicilio_2,correo_1, correo_2,telefono_1,telefono_2,estado) 
                VALUES ('$id_operacion', '$RTN', '$razon_social', '$nombre_comercial', '$domicilio_1', '$domicilio_2',  '$correo_1', '$correo_2',  '$telefono_1', '$telefono_2',1)"; 
               
               $id_usuario=$_SESSION['id'];
                      $objeto="empresa";
                                     
                     
                     $accion="CREADO"; 
                     $descripcion='se creo una empresa';
                     ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) 
                     VALUES (' $id_usuario','$objeto','$accion','$descripcion') ");
               
               return ejecutarConsulta($sqluser);
            }else{
                $sqluser = "INSERT INTO tbl_empresa (id_operacion,RTN,razon_social,nombre_comercial,domicilio_1,domicilio_2,correo_1, correo_2,telefono_1,telefono_2,estado) 
                VALUES ('$id_operacion', '$RTN', '$razon_social', '$nombre_comercial', '$domicilio_1', '$domicilio_2',  '$correo_1', '$correo_2',  '$telefono_1',' ',1)"; 
               
               $id_usuario=$_SESSION['id'];
                      $objeto="empresa";
                                     
                     
                     $accion="CREADO"; 
                     $descripcion='se creo una empresa';
                     ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) 
                     VALUES (' $id_usuario','$objeto','$accion','$descripcion',' ','$nombre_comercial') ");
               
               return ejecutarConsulta($sqluser);
            }
        }
        //Funcion para editar un usuario en la base de datos 
        public function editar($id_empresa,$id_operacion,$RTN,$razon_social,$nombre_comercial,$domicilio_1,$domicilio_2,$correo_1,$correo_2,$telefono_1,$telefono_2)
        {
            $sqluser="UPDATE tbl_empresa SET id_operacion= '$id_operacion', RTN= '$RTN', razon_social='$razon_social', nombre_comercial='$nombre_comercial', domicilio_1='$domicilio_1', domicilio_2='$domicilio_2', correo_1='$correo_1',correo_2='$correo_2',
            telefono_1='$telefono_1',telefono_2='$telefono_2'  WHERE id_empresa='$id_empresa'";
           
           $var1= ("SELECT id_operacion, RTN, razon_social, nombre_comercial, domicilio_1, domicilio_2, correo_1, correo_2, telefono_1, telefono_2 FROM tbl_empresa WHERE id_empresa='$id_empresa'");
                $dato=ejecutarConsultaSimpleFila($var1);
                       if($row =$dato){
                           $I_O=$row["id_operacion"];
                           $F_RTN=$row["RTN"];
                           $F_RS=$row["razon_social"];
                           $F_NC=$row["nombre_comercial"];
                           $F_D1=$row["domicilio_1"];
                           $F_D2=$row["domicilio_2"];
                           $F_C1=$row["correo_1"];
                           $F_C2=$row["correo_2"];
                           $F_T1=$row["telefono_1"];
                           $F_T2=$row["telefono_2"];
                           

                       }
                       /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="empresa ";
                       $accion="EDITADO"; 															                                    
                       $descripcion="Se edito un campo de empresa ";																				
                       if($I_O != $id_operacion){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$I_O','$id_operacion')");  }
                       if($F_RTN != $RTN){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_RTN','$RTN')");           ;           } 
                       if($F_RS != $razon_social){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_RS','$razon_social')");   } 
                       if($F_NC != $nombre_comercial){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_NC','$nombre_comercial')");      }
                       if($F_D1 != $domicilio_1){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_D1','$domicilio_1')");  }
                       if($F_D2 != $domicilio_2){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_D2','$domicilio_2')");           ;           } 
                       if($F_C1 != $correo_1){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_C1','$correo_1')");   } 
                       if($F_C2 != $correo_2){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_C2','$correo_2')");      }
                       if($F_T1 != $telefono_1){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_T1','$telefono_1')");  }
                       if($F_T2 != $telefono_2){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_T2','$telefono_2')");           ;           } 
                       
           
           return ejecutarConsulta($sqluser);

        }

        //Funcion para mostrar datos 24 febrero 2020 
        public function mostrar($id_empresa)
	{
        $sqluser="SELECT * from tbl_empresa where id_empresa='$id_empresa'" ;
        return ejecutarConsultaSimpleFila($sqluser);
        
    }
    public function mostrar_p($id_empresa)
	{
        $sqluser="SELECT * from tbl_empresa e INNER join tbl_operaciones o on o.id_operacion=e.id_operacion where id_empresa='$id_empresa'";
        return ejecutarConsultaSimpleFila($sqluser);
        
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sqluser="SELECT e.id_empresa,o.descripcion,e.RTN,e.razon_social,e.nombre_comercial,e.domicilio_1,e.correo_1,e.telefono_1,e.estado from tbl_empresa e 
        join tbl_operaciones o  on o.id_operacion=e.id_operacion
        ORDER BY e.id_empresa ASC";
		return ejecutarConsulta($sqluser);		
	}
    
    public function desactivar($id_empresa)
            {
                $sql="UPDATE tbl_empresa SET estado='0' WHERE id_empresa ='$id_empresa'";
                return ejecutarConsulta($sql);
            }

            //Implementamos un método para activar categorías
            public function activar($id_empresa)
            {
                $sql="UPDATE tbl_empresa SET estado ='1' WHERE id_empresa='$id_empresa'";
                return ejecutarConsulta($sql);
            }
        
}
?>
        