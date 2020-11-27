<?php

require "../config/Conexion.php";

class CAI
{
   public function __construct()
   {
       
   }

   // insertar registro del cai ---karla 22/03/2020

   public function insertar($cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_documento,$secuencia,$estado)

    {
        $sql = "INSERT INTO tbl_reg_facturacion (cai,fecha_inicio,fecha_limite,rango_desde,rango_hasta,punto_emision,establecimiento,tipo_documento,secuencia,estado)
        VALUES ('$cai','$fecha_inicio','$fecha_limite','$rango_desde','$rango_hasta','$punto_emision','$establecimiento','$tipo_documento','$secuencia','$estado')";
        return ejecutarConsulta($sql);
       
   }

   // editar registro del cai ---karla 22/03/2020
   public function  editar($id_reg_facturacion,$cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_documento,$secuencia,$estado)
   {
       $sql = "UPDATE tbl_reg_facturacion  SET id_reg_facturacion='$id_reg_facturacion', cai='$cai',fecha_inicio='$fecha_inicio', fecha_limite='$fecha_limite',rango_desde='$rango_desde', rango_hasta='$rango_hasta' ,
        punto_emision='$punto_emision',establecimiento='$establecimiento',tipo_documento='$tipo_documento',secuencia='$secuencia'
     WHERE id_reg_facturacion='$id_reg_facturacion'";
       return ejecutarConsulta($sql);
   }

    //Falta funcion modificado por//
    public function desactivar($id_reg_facturacion)
    {
        $sql="UPDATE tbl_reg_facturacion  SET estado='0'
        where id_reg_facturacion='$id_reg_facturacion' ";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($id_reg_facturacion )
    {
        
        $sql="UPDATE tbl_reg_facturacion  SET estado ='1' 
        WHERE id_reg_facturacion='$id_reg_facturacion' ";
        return  ejecutarConsulta($sql);
    }

 // mostrar los datos   a modificar

 public function  mostrar($id_reg_facturacion )
 {
     $sql = "SELECT * from tbl_reg_facturacion 
     WHERE id_reg_facturacion='$id_reg_facturacion'";
     return ejecutarConsultaSimpleFila($sql);   
 }
 
// listar registros 

public function  listar()
{
    $sql = "SELECT * from tbl_reg_facturacion
    ORDER BY id_reg_facturacion ASC";
    return ejecutarConsulta($sql);  
}

 
}

?>
