<?php
require '../config/Conexion.php';

class compras
{

        public function _construct()
        {
            
        }
        //Funcion para insertar una compra en la base de datos//Falta el combobox
        public function _insertar($id_proveedor,$idarticulo,$id_presentacion,$cantidad,$precio,$total)
        {
         
        $sql="INSERT INTO compras( id_proveedor, idarticulo, id_presentacion, Cantidad, Precio, Total_Compra, estado)
		                    VALUES ('$id_proveedor','$idarticulo','$id_presentacion','$cantidad','$precio','$total',1)";       
        return ejecutarconsulta($sql);

        
        }
        //Funcion para editar 
        public function _editar($id_compras,$id_proveedor,$idarticulo,$id_presentacion,$cantidad,$precio,$total)
        {
            $sql=" UPDATE compras SET  id_proveedor='$id_proveedor', idarticulo='$idarticulo', Cantidad='$cantidad',id_presentacion='$id_presentacion',
             Precio ='$precio' ,Total_Compra= '$total'
            WHERE id_compras='$id_compras'";
            return ejecutarConsulta($sql);

        }

        //Implementamos un método para desactivar registros
	public function desactivar($id_compras)
	{
		$sql="UPDATE compras SET estado='0'  WHERE id_compras='$id_compras'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($id_compras)
	{
		$sql="UPDATE compras SET estado='1'  WHERE id_compras='$id_compras'";
		return ejecutarConsulta($sql);
	}


        //Funcion para mostrar datos 
        public function mostrar($id_compras)
	{
        $sql="SELECT *FROM compras a join tbl_presentacion b on a.id_presentacion= b.id_presentacion 
        join tbl_proveedor c on a.id_proveedor= c.id_proveedor 
        join tbl_articulo d on a.idarticulo= d.idarticulo WHERE id_compras='$id_compras'";
		return ejecutarConsultaSimpleFila($sql);
    }
    //Implementar un método para listar los registros
	    public function listar()
	{
        $sql="SELECT  a.id_compras,c.Nombre,d.nombre,b.descripcion,a.Cantidad,a.Precio,a.Total_Compra,a.estado FROM compras a 
        join tbl_presentacion b on a.id_presentacion= b.id_presentacion
         join tbl_proveedor c on a.id_proveedor= c.id_proveedor 
         join tbl_articulo d on a.idarticulo= d.idarticulo";
		return ejecutarConsulta($sql);		
	}
        
		
	
}
?>