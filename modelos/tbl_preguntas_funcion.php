<?php

require "../config/Conexion.php";

class pregunta
{
   public function __construct()
   {
       
   }

   // insertar preguntas

   public function insertar($pregunta,$usu)
    {
       
        $sql = "INSERT INTO tbl_preguntas (pregunta,modificado_por)
        VALUES ('$pregunta','$usu')";
       
       $id_usuario=$_SESSION['id'];
                  $objeto="preguntas";
                                 
                 
                 $accion="CREADO"; 
                 $descripcion='se creo una pregunta';
                 ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) 
                 VALUES (' $id_usuario','$objeto','$accion','$descripcion',' ','$pregunta') ");
       
       return ejecutarConsulta($sql);
       
   }

   // editar preguntas

   public function  editar($id_pregunta, $pregunta,$usu)

   {
       $sql = "UPDATE tbl_preguntas SET pregunta= '$pregunta' WHERE id_pregunta='$id_pregunta'";

       $var1= ("SELECT pregunta FROM tbl_preguntas WHERE id_pregunta='$id_pregunta'");
       $dato=ejecutarConsultaSimpleFila($var1);
              if($row =$dato){
                  $F_P=$row["pregunta"];




              }
              /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="preguntas ";
                       $accion="EDITADO"; 															                                    
                       $descripcion="Se edito un campo de preguntas ";																				
                       if($F_P != $pregunta){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$F_P','$pregunta')");  }
                      
                 

       $sql = "UPDATE tbl_preguntas SET pregunta= '$pregunta', modificado_por='$usu' WHERE id_pregunta='$id_pregunta'";
       return ejecutarConsulta($sql);
   }

   

   //Implementamos un método para desactivar registros
	public function desactivar($id_pregunta)
	{
		$sql="UPDATE tbl_preguntas  SET  estado ='0' 
              WHERE id_pregunta='$id_pregunta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_pregunta)
	{
		$sql="UPDATE tbl_preguntas  SET estado  ='1' 
              WHERE id_pregunta='$id_pregunta'";
		return ejecutarConsulta($sql);
	}

 // mostrar los datos de preguntas  a modificar

 public function  mostrar($id_pregunta)

 {
     $sql = "SELECT * FROM  tbl_preguntas  
     WHERE id_pregunta='$id_pregunta'";
     return ejecutarConsultaSimpleFila($sql);
    
 }
 
// listar registros preguntas

public function  listar()

{
    $sql = "SELECT * FROM  tbl_preguntas
    ORDER BY id_pregunta ASC ";
    return ejecutarConsulta($sql);
   
}

}

?>