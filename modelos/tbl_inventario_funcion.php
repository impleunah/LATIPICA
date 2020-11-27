<?php

require "../config/Conexion.php";

class Inventario
{
   public function __construct()
   {
       
   }

   // insertar preguntas

   public function insertar($idarticulo,$libra,$conversion,$gramos,$unidades)

    {
        $sql = "INSERT INTO `tbl_inventario` ( `idarticulo`, `libr`, `conversio`, `gramo`, `unidades`, `estado`) 
                                        VALUES ( '$idarticulo', '$libra', '$conversion', '$gramos', '$unidades', 1)
        
        
        ";
        return ejecutarConsulta($sql);
       
   }

   // editar preguntas

   public function  editar($id_inventario,$idarticulo,$libra,$conversion,$gramos, $unidades)
   {
       $sql = "UPDATE tbl_inventario SET  idarticulo='$idarticulo',libr='$libra', conversio='$conversion' , gramo='$gramos', unidades = '$unidades'
       
     WHERE id_inventario='$id_inventario'";
       return ejecutarConsulta($sql);
   }

   //Implementamos un método para desactivar registros
   public function desactivar($id_inventario)
   {
       $sql="UPDATE tbl_inventario  SET estado='0' 
       WHERE id_inventario='$id_inventario'";
       return ejecutarConsulta($sql);
   }

   //Implementamos un método para activar registros
   public function activar($id_inventario)
   {
       $sql="UPDATE tbl_inventario  SET estado='1' 
       WHERE id_inventario='$id_inventario'";
       return ejecutarConsulta($sql);
   }

 // mostrar los datos   a modificar

 public function  mostrar($id_inventario)
 {
     $sql = "SELECT * from tbl_inventario  WHERE id_inventario='$id_inventario'";
     return ejecutarConsultaSimpleFila($sql);   
 }
 
// listar registros 

public function  listar()
{
    $sql = "SELECT *
    from tbl_inventario 
    ORDER BY id_inventario ASC
    
   ";
    return ejecutarConsulta($sql);  
}



}

?>

