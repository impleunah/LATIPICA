<?php

require "../config/Conexion.php";

class CLIENTE
{
   public function __construct()
   {
       
   }

   // insertar registro del cai ---karla 22/03/2020

   public function insertar($nombre,$correo,$RTN,$estado)

    {
        $sql = "INSERT INTO tbl_cliente (nombre,correo, RTN, estado)
        VALUES ('$nombre','$correo','$RTN','$estado')";
        return ejecutarConsulta($sql);
       
   }

   // editar registro del cai ---karla 22/03/2020
   public function  editar($id_cliente, $nombre,$correo,$RTN,$estado)
   {
       $sql = "UPDATE tbl_cliente SET id_cliente ='$id_cliente', nombre='$nombre',correo='$correo', RTN='$RTN',
       estado='$estado' WHERE id_cliente ='$id_cliente'";
       return ejecutarConsulta($sql);
   }

    //Falta funcion modificado por//
    public function desactivar($id_cliente)
    {
        $sql="UPDATE tbl_cliente SET estado='0'
        where id_cliente='$id_cliente' ";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($id_cliente)
    {
        
      $sql="UPDATE tbl_cliente SET estado='1'
      where id_cliente='$id_cliente' ";
        return  ejecutarConsulta($sql);
    }
    public function eliminar($id_cliente)
    {
        
      $sql=" DELETE FROM tbl_cliente WHERE  id_cliente='$id_cliente' ";
        return  ejecutarConsulta($sql);
    }
 // mostrar los datos   a modificar

 public function  mostrar($id_cliente)
 {
     $sql = "SELECT * from tbl_cliente
     WHERE id_cliente='$id_cliente'";
     return ejecutarConsultaSimpleFila($sql);   
 }
 
// listar registros 

public function  listar()
{
    $sql = "SELECT * from tbl_cliente
    ORDER BY id_cliente ASC";
    return ejecutarConsulta($sql);  
}

 
}

?>






