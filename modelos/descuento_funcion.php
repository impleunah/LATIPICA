<?php


require "../config/Conexion.php";

class descuento 
{
   public function __construct()
   {
       
   }

   // insertar descuento 

   public function insertar($descripcion)

    {
        $sql = "INSERT INTO tbl_descuento (descripcion,estado) VALUES ('$descripcion','0')";
       
        $id_usuario=$_SESSION['id'];
        $objeto="descuento";
                       
       
       $accion="CREADO"; 
       $descripcion1='se creo un descuento';
       ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues) 
       VALUES (' $id_usuario','$objeto','$accion','$descripcion1',' ','descripcion') ");
       
        return ejecutarConsulta($sql);
       
   }

   // editar descuento
   public function  editar($id_descuento, $descripciono)
   {
       $sql = "UPDATE tbl_descuento SET descripcion= '$descripciono' WHERE id_descuento='$id_descuento'";
       
       $var1= ("SELECT  descripcion  FROM tbl_descuento WHERE id_descuento='$id_descuento'");
                $dato=ejecutarConsultaSimpleFila($var1);
                       if($row =$dato){
                           $df=$row["descripcion"];
                          
			
			

                }
                /* VALIDAR BITACORA   */ 
$id_usuario=$_SESSION['id'];
$objeto="DESCUENTO ";
                       $accion="EDITADO"; 															                                    
                       $descripcion="Se edito un campo de descuento ";																				
                       if($df != $descripciono){ejecutarConsulta("INSERT INTO   tbl_bitacoras(id_usuario,objeto,accion,descripcion,Antes,Despues)  VALUES ('$id_usuario','$objeto','$accion','$descripcion','$df','$descripciono')");  }
                       
                         
       
       return ejecutarConsulta($sql);
   }

   //Implementamos un método para desactivar registros
	public function desactivar($id_descuento)
	{
		$sql="UPDATE tbl_descuento  SET  estado ='0' WHERE id_descuento='$id_descuento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_descuento)
	{
		$sql="UPDATE tbl_descuento  SET estado  ='1'  WHERE id_descuento='$id_descuento'";
		return ejecutarConsulta($sql);
	}

 // mostrar los datos de preguntas  a modificar

 public function  mostrar($id_descuento)

 {
     $sql = "SELECT  id_descuento,descripcion,estado FROM  tbl_descuento  WHERE id_descuento='$id_descuento'";
     return ejecutarConsultaSimpleFila($sql);
    
 }
 
// listar registros preguntas

public function  listar()

{
    $sql = "SELECT * FROM  tbl_descuento
    ORDER BY id_descuento ASC ";
    return ejecutarConsulta($sql);
   
}

}

?>