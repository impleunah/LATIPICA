<?php

require "../config/Conexion.php";

class PROVEEDOR
{
   public function __construct()
   {
       
   }

   // insertar registro del cai ---karla 22/03/2020

   public function insertar($nombre,$correo,$RTN, $telefono, $direccion ,$estado)

    {
        $sql = "INSERT INTO tbl_proveedor (nombre,correo, RTN,telefono,direccion, estado)
        VALUES ('$nombre','$correo','$RTN','$telefono','$direccion','$estado')";
        return ejecutarConsulta($sql);
       
   }

   // editar registro del cai ---karla 22/03/2020
   public function  editar($id_proveedor, $nombre,$correo,$RTN, $telefono, $direccion ,$estado)
   {
       $sql = "UPDATE tbl_proveedor  SET id_proveedor ='$id_proveedor', nombre='$nombre',correo='$correo', RTN='$RTN',telefono='$telefono', direccion='$direccion',
       estado='$estado' WHERE id_proveedor='$id_proveedor'";
       return ejecutarConsulta($sql);
   }

    //Falta funcion modificado por//
    public function desactivar($id_proveedor)
    {
        $sql="UPDATE tbl_proveedor SET estado='0'
        where id_proveedor='$id_proveedor' ";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($id_proveedor)
    {
        
        $sql="UPDATE tbl_proveedor SET estado ='1' 
        WHERE id_proveedor='$id_proveedor' ";
        return  ejecutarConsulta($sql);
    }

 // mostrar los datos   a modificar

 public function  mostrar($id_proveedor)
 {
     $sql = "SELECT * from tbl_proveedor
     WHERE id_proveedor='$id_proveedor'";
     return ejecutarConsultaSimpleFila($sql);   
 }
 
// listar registros 

public function  listar()
{
    $sql = "SELECT * from tbl_proveedor
    ORDER BY id_proveedor ASC";
    return ejecutarConsulta($sql);  
}

 
}

?>

