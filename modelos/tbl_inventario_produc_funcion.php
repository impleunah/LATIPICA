<?php

require "../config/Conexion.php";

class Inventariop
{
   public function __construct()
   {
       
   }

   // insertar preguntas

   public function insertar($id_empresa,$id_producto,$id_operacion, $cantidad,$costo_unitario_venta,$costo_unitario_compra,$fecha,$mes,$año,$estado)

    {
        $sql = "INSERT INTO tbl_inventarioproducto (id_empresa,id_producto,id_operacion,cantidad,costo_unitario_venta,costo_unitario_compra,fecha,mes,año,estado)
        VALUES ('$id_empresa','$id_producto','$id_operacion','$cantidad','$costo_unitario_venta','$costo_unitario_compra','$fecha','$mes','$año','1')";
        return ejecutarConsulta($sql);
       
   }

   // editar preguntas

   public function  editar($id_inventarioproducto,$id_empresa,$id_producto,$id_operacion,$cantidad,$costo_unitario_venta,$costo_unitario_compra,$fecha,$mes,$año,$estado)

   {
       $sql = "UPDATE tbl_inventarioproducto SET  id_empresa='$id_empresa', id_producto='$id_producto' , id_operacion='$id_operacion', cantidad='$cantidad',
       costo_unitario_venta='$costo_unitario_venta',costo_unitario_compra='$costo_unitario_compra', fecha='$fecha',mes='$mes',año='$año',estado='$estado'
       WHERE id_inventarioproducto='$id_inventarioproducto'";
       return ejecutarConsulta($sql);
   }

   //Implementamos un método para desactivar registros
   public function desactivar($id_inventarioproducto)
   {
       $sql="UPDATE tbl_inventarioproducto SET estado='0' WHERE id_inventarioproducto='$id_inventarioproducto'";
       return ejecutarConsulta($sql);
   }

   //Implementamos un método para activar registros
   public function activar($id_inventarioproducto)
   {
       $sql="UPDATE tbl_inventarioproducto SET estado='1' WHERE id_inventarioproducto='$id_inventarioproducto'";
       return ejecutarConsulta($sql);
   }
 // mostrar los datos de preguntas  a modificar

 public function  mostrar($id_inventarioproducto)

 {
     $sql = "SELECT p.id_inventarioproducto ,e.nombre_comercial,pp.producto, tp.tipo_operacion, p.cantidad, p.costo_unitario_venta, p.costo_unitario_compra,p.fecha,p.mes,p.año FROM tbl_inventarioproducto p 
      join tbl_empresa e on  e.id_empresa= p.id_empresa
      join tbl_producto pp on pp.id_producto=p.id_producto
      join tbl_tipo_operaciones tp on tp.id_tipo_operaciones= p.id_operacion 
      WHERE id_inventarioproducto= '$id_inventarioproducto'";
     return ejecutarConsultaSimpleFila($sql);
    
 }
 
// listar registros preguntas

public function  listar()

{
    $sql = "SELECT p.id_inventarioproducto ,e.nombre_comercial,pp.producto, tp.tipo_operacion, p.cantidad, p.costo_unitario_venta, p.costo_unitario_compra,p.fecha, p.mes, p.año FROM tbl_inventarioproducto p  
    join tbl_empresa e on  e.id_empresa= p.id_empresa join tbl_producto pp on pp.id_producto=p.id_producto 
    join tbl_tipo_operaciones tp on tp.id_tipo_operaciones= p.id_operacion
    ORDER BY p.id_inventarioproducto  ASC";
    return ejecutarConsulta($sql);
   
}

}

?>
