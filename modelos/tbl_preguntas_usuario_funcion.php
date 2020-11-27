<?php

require "../config/Conexion.php";

class Pregunta
{
   public function __construct()
   {
       
   }

   // insertar preguntas

   public function insertar($id_usuario,$id_pregunta,$respuesta)

    {
        $sql = "INSERT INTO tbl_preguntas_x_usuario (id_usuario, id_pregunta,respuesta,estado)
        VALUES ('$id_usuario',  '$id_pregunta', '$respuesta','1')";
        
        $id_usuario=$_SESSION['id'];
                  $objeto="preguntas usuario";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion='se creo una pregunta para el usuario';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion) 
                 VALUES (' $id_usuario','$objeto','$accion','$descripcion') ");

        return ejecutarConsulta($sql);
       
   }

   // editar preguntas

   public function  editar($id_pregunta_usuario,$id_usuario,$id_pregunta,$respuesta)

   {
       $sql = "UPDATE tbl_preguntas_x_usuario SET id_usuario='$id_usuario',  id_pregunta='$id_pregunta', respuesta='$respuesta' WHERE id_pregunta_usuario='$id_pregunta_usuario'";
      
      
       $var1= ("SELECT id_usuario,  id_pregunta, respuesta FROM tbl_preguntas_x_usuario WHERE id_pregunta_usuario='$id_pregunta_usuario'");
       $dato=ejecutarConsultaSimpleFila($var1);
              if($row =$dato){
                  $F_U=$row["id_usuario"];
                  $F_P=$row["id_pregunta"];
                  $F_R=$row["respuesta"];
      




              }
              /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="preguntas_x_usuario ";
                       $accion="EDITADO"; 															                                    
                       $descripcion="Se edito un campo de Preguntas Usuario ";																				
                       if($F_U != $id_usuario){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_U','$id_usuario')");  }
                       if($F_P != $id_pregunta){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_P','$id_pregunta')");  } 
                       if($F_R != $respuesta){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_R','$respuesta')");  } 
                       
      
      return ejecutarConsulta($sql);
   }

   //Implementamos un método para desactivar registros
	public function desactivar($id_pregunta_usuario)
	{
		$sql="UPDATE tbl_preguntas_x_usuario SET estado='0' 
              WHERE id_pregunta_usuario='$id_pregunta_usuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_pregunta_usuario)
	{
		$sql="UPDATE tbl_preguntas_x_usuario SET estado ='1' 
              WHERE id_pregunta_usuario='$id_pregunta_usuario'";
		return ejecutarConsulta($sql);
	}

 // mostrar los datos de preguntas  a modificar

 public function  mostrar($id_pregunta_usuario)

 {
     $sql = "SELECT * from tbl_preguntas_x_usuario  WHERE id_pregunta_usuario='$id_pregunta_usuario'";
     return ejecutarConsultaSimpleFila($sql);
    
 }
 
// listar registros preguntas

public function  listar()

{
    $sql = "SELECT p.id_pregunta_usuario, u.Nombre_Usuario, pp.pregunta, p.respuesta,p.estado 
    from tbl_preguntas_x_usuario p 
    join tbl_usuario u on u.id_usuario=p.id_usuario 
    join tbl_preguntas pp on pp.id_pregunta = p.id_pregunta
    ORDER BY p.id_pregunta ASC";
    return ejecutarConsulta($sql);
   
}

}

?>
