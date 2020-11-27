<?php

require "../config/Conexion.php";

class Salida
{
   public function __construct()
   {
       
   }

   // insertar preguntas

   public function insertar($idarticulo,$salida,$motivo)

    {
        $sql = "INSERT INTO tbl_salida (idarticulo,salida,motivo) 
        VALUES ('$idarticulo','$salida','$motivo')";
        return ejecutarConsulta($sql);
       
   }

   // editar preguntas

   public function  editar($id_salida,$idarticulo,$salida,$motivo)
   {
       $sql = "UPDATE tbl_salida SET idarticulo='$idarticulo',salida='$salida',motivo='$motivo'
     WHERE id_salida='$id_salida'";
       return ejecutarConsulta($sql);
   }

 // mostrar los datos   a modificar

 public function  mostrar($id_salida)
 {
     $sql = "SELECT * from tbl_salida WHERE id_salida='$id_salida'";
     return ejecutarConsultaSimpleFila($sql);   
 }
 
// listar registros 

public function  listar()
{
    $sql = "SELECT  s.id_salida,s.idarticulo, a.nombre, s.salida, s.motivo,s.fecha 
    from tbl_salida s 
    join tbl_articulo a  on a.idarticulo=s.idarticulo
    ORDER BY s.id_salida ASC ";
    return ejecutarConsulta($sql);  
}



}

?>

