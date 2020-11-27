<?php

require '../config/Conexion.php';

class Usuario{

        public function _construct()
        {
            
        }
        //Funcion para insertar un usuario en la base de datos 
        public function _insertarusuario($Nombre_Usuario,$Contraseña,$correo_electronico,$id_rol,$Repetir_Contraseña,$NOMBRE)
        {
            if($Contraseña == $Repetir_Contraseña){
            $nombre="SELECT  * from tbl_usuario WHERE (Nombre_Usuario = '$Nombre_Usuario')
             or
              (correo_electronico = '$correo_electronico') ";
            $filas=ejecutarConsulta_row($nombre);
            if($filas === 0)
            { 
                $clavehash=hash("SHA256",$Contraseña);
                $sql = "INSERT INTO  tbl_usuario (Nombre_Usuario , Contraseña , correo_electronico,estado_usuario,intentos,id_rol,nuevo) 
                VALUES ('$Nombre_Usuario','$clavehash','$correo_electronico','0','0','$id_rol','0')"; 
                  //pendeiente
                  
                  $id_usuario=$_SESSION['id'];
                  $objeto="Usuarios";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion='se creo un usuario';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) 
                 VALUES (' $id_usuario','$objeto','$accion','$descripcion',' ','$Nombre_Usuario') ");
                $idusuarionew=ejecutarConsulta_retornarID($sql);

                
                return $sql;
            }
            }   
            
            
        }
        //Funcion para editar un usuario en la base de datos 
        public function _editarusuario($Nombre_Usuario,$id_rol,$correo_electronico,$id_usuario,$Contraseña,$Repetir_Contraseña)
        {  
                    $bitacora=("SELECT tbl_direccion , id_cliente, direccion FROM `tbl_direccion` ");

            $var1= ("SELECT Nombre_Usuario,id_rol,correo_electronico,Contraseña FROM tbl_usuario WHERE id_usuario='$id_usuario'");
            $dato=ejecutarConsultaSimpleFila($var1);
                        if($row =$dato){
                            $a=$row["Nombre_Usuario"];
                            $b=$row["id_rol"];
                            $w=$row["correo_electronico"];
                            $d=$row["Contraseña"];
  /**/ 
                                    if($Contraseña==$Repetir_Contraseña){
                                        $clavehash=hash("SHA256",$Contraseña);
                                                $sqluser="UPDATE tbl_usuario SET Nombre_Usuario= '$Nombre_Usuario',id_rol='$id_rol',correo_electronico='$correo_electronico' , Contraseña='$clavehash'
                                                WHERE id_usuario='$id_usuario'";
                                                $objeto="Editar Usuario";
                                                $accion="Modifico"; 
                                                $descripcion="Modifico campos de usuario ";
                                                if($a!=$Nombre_Usuario){$insertar1=("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$a','$Nombre_Usuario')"); $uno=ejecutarConsulta($insertar1); }
                                                if($b!=$id_rol){$insertar2=("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$b','$id_rol')");                 $dos=  ejecutarConsulta($insertar2);           } 
                                                if($w!=$correo_electronico){$insertar3=("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$w','$correo_electronico')");  $tres =  ejecutarConsulta($insertar3);  } 
                                                if($d!=$Contraseña){$insertar4=("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$d','$Contraseña')");     $cuatro =  ejecutarConsulta($insertar4);    }
                                                  
                                                ejecutarConsulta($sqluser);
                                                //Eliminamos todos los permisos asignados para volverlos a registrar
                                                    $sqldel="DELETE FROM permiso_usuario WHERE id_usuario='$id_usuario'";
                                                    ejecutarConsulta($sqldel);

                                                 

                                                    return $sqluser;

                                                 }
                                                }

        }
        //Funcion para cambiar contraseña de un usuario en la base de datos 
        public function _cambiarcontrausuario($Contraseña,$Contraseña_N,$Contraseña_R,$id_usuario)
        {
            if($Contraseña_N==$Contraseña_R){
            $sqluser = "UPDATE tbl_usuario SET Contraseña ='$Contraseña_N' WHERE id_usuario ='$id_usuario' AND  Contraseña = '$Contraseña'";
            return ejecutarConsulta($sqluser);
            }
        }

        //Funcion para mostrar datos 22 febrero 2020 
        public function mostrar($id_usuario)
	{
        $sqluser="SELECT id_usuario,Nombre_Usuario,Contraseña,correo_electronico,estado_usuario,fecha_creacion_u,ultima_conexion,rol,u.id_rol FROM tbl_usuario u
        join tbl_roles r  on r.id_rol= u.id_rol where id_usuario='$id_usuario'" ;
		return ejecutarConsultaSimpleFila($sqluser);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sqluser="SELECT id_usuario,Nombre_Usuario,rol,correo_electronico,estado_usuario, fecha_creacion_u ,ultima_conexion, Contraseña,u.id_rol FROM tbl_usuario u
        join tbl_roles r  on r.id_rol= u.id_rol
        ORDER BY id_usuario ASC";
		return ejecutarConsulta($sqluser);		
    }
    public function rol($id_usuario)
	{
        $sqluser="SELECT id_rol FROM tbl_usuario where id_usuario = '$id_usuario'";
		return ejecutarConsulta($sqluser);		
    }

public function intentos_1($NOMBRE)
	{
        $sqluser=("SELECT estado_usuario FROM tbl_usuario where Nombre_Usuario='$NOMBRE' and  estado_usuario=0");
		return ejecutarConsulta($sqluser);		
    }
    //intentos 
    public function intentos($NOMBRE){
        
        $result12=ejecutarConsulta("SELECT * FROM tbl_parametros where id_parametro=9 ");
            

            while($row = mysqli_fetch_array($result12)){
            $valor= $row['valor'];
            }
            $result1=ejecutarConsulta("SELECT * FROM tbl_usuario where Nombre_Usuario='$NOMBRE' ");
           

            while($row = mysqli_fetch_array($result1)){
            $intentos= $row['intentos'];
            }
            
            if($intentos<=$valor){
                $intentos++;
                if( $valor >= $intentos){
         
                $sqluser="UPDATE tbl_usuario SET intentos = '$intentos' where Nombre_Usuario='$NOMBRE' ";
                return ejecutarConsulta($sqluser);	
                }else{
                    $sql="UPDATE tbl_usuario SET estado_usuario ='0' WHERE Nombre_Usuario='$NOMBRE'";
                return ejecutarConsulta($sql);
                }
	
            }

    }
    //Implementar un método para listar los permisos marcados
    public function listarmarcados($id_usuario)
	{
        
		$sql="SELECT * FROM permiso_usuario WHERE id_usuario = '$id_usuario'";
		return ejecutarConsulta($sql);
	}

        //Falta funcion modificado por//
        public function verificar($Nombre_Usuario,$Contraseña)
        //Hash SHA256 en la contraseña
		
        {
            $clavehash=hash("SHA256",$Contraseña);
            $sql="SELECT Nombre_Usuario,Contraseña,id_usuario FROM tbl_usuario  WHERE Nombre_Usuario='$Nombre_Usuario' AND Contraseña='$clavehash' AND estado_usuario = 1 "; 
            
            ejecutarConsulta("UPDATE `tbl_usuario` SET `intentos` = '0' WHERE Nombre_Usuario = '$Nombre_Usuario'  AND Contraseña='$clavehash'");
            
            
            return ejecutarConsulta($sql);  

        }


        public function nuevo($Nombre_Usuario)
        {
            $sql="SELECT Nombre_Usuario FROM tbl_usuario  WHERE Nombre_Usuario='$Nombre_Usuario' AND nuevo = 0 "; 
            return ejecutarConsulta($sql);  
        }
        
            //Implementamos un método para desactivar categorías
            public function desactivar($id_usuario)
            {
                $sql="UPDATE tbl_usuario SET estado_usuario ='0' WHERE id_usuario='$id_usuario'";
                return ejecutarConsulta($sql);
            }

            //Implementamos un método para activar categorías
            public function activar($id_usuario)
            {
                $sql="UPDATE tbl_usuario SET estado_usuario ='1' WHERE id_usuario='$id_usuario'";
                return ejecutarConsulta($sql);
            }

         

}
?>