<?php

require "../config/Conexion.php";

class Entrada
{
   public function __construct()
   {
       
   }

   // insertar preguntas

   public function insertar($idarticulo,$entrada,$motivo)

    {
        $sql = "INSERT INTO tbl_entrada (idarticulo,entrada,motivo) 
        VALUES ('$idarticulo','$entrada','$motivo')";
        return ejecutarConsulta($sql);
       
   }

   // editar preguntas

   public function  editar($id_entrada,$idarticulo,$entrada,$motivo)
   {
       $sql = "UPDATE tbl_entrada SET idarticulo='$idarticulo',entrada='$entrada',motivo='$motivo'
     WHERE id_entrada='$id_entrada'";
       return ejecutarConsulta($sql);
   }

 // mostrar los datos   a modificar

 public function  mostrar($id_entrada)
 {
     $sql = "SELECT * from tbl_entrada WHERE id_entrada='$id_entrada'";
     return ejecutarConsultaSimpleFila($sql);   
 }
 
// listar registros 

public function  listar()
{
    $sql = "SELECT  e.id_entrada,e.idarticulo, a.nombre, e.entrada, e.motivo,e.fecha from tbl_entrada e join tbl_articulo a  on a.idarticulo=e.idarticulo";
    return ejecutarConsulta($sql);  
}



}

?>

