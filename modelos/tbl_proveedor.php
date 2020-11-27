<?php
require '../config/Conexion.php';

class tbl_proveedor
{
 	//Implementamos nuestro constructor
    public function __construct()
    {
 
    }

  public function editar($id_proveedor,$Nombre_prov,$correo,$RTN,$telefono,$direccion,$estado)
  {
     $sql="UPDATE tbl_proveedor SET id_proveedor='$id_proveedor',Nombre_prov='$Nombre_prov' correo='$correo',RTN='$RTN',telefono='$telefono',direccion='$direccion', estado='$estado'
     WHERE id_proveedor='$id_proveedor'";   
      return ejecutarconsulta($sql);
  }

 public function desactivar($id_proveedor)
  {
    $sql="UPDATE tbl_proveedor SET estado = 0;
    WHERE id_proveedor=$id_proveedor";
    return ejecutarconsulta($sql);
   }

 public function activar($id_proveedor)
 {
    $sql="UPDATE tbl_proveedor SET estado = 1;
    WHERE id_proveedor=$id_proveedor";
    return ejecutarconsulta($sql);
  }

 public function mostrar($id_proveedor)
 {
$sql= "SELECT id_proveedor,idarticulo,Nombre_prov,correo,RTN,telefono,direccion,estado 
        FROM tbl_proveedor p 
        INNER JOIN tbl_articulo c ON p.id_proveedor = c.idarticulo
        WHERE id_proveedor='$id_proveedor'";
 }

 public function listar()
 {
    $sql="SELECT * from tbl_proveedor
    ORDER BY id_proveedor ASC
   ";
    return ejecutarconsulta($sql);
 }
 public function listar_a()
 {
    $sql="SELECT * from tbl_proveedor
   where estado =1";
    return ejecutarconsulta($sql);
 


}


}
?>




