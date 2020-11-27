
<?php 
require_once '../config/Conexion.php';

function Listaproducto(){

$query = 'SELECT idarticulo,nombre FROM tbl_articulo';
$result = ejecutarConsulta($query);
$lista = '<option value="">"Seleccionar Producto"</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[idarticulo]'>$row[nombre]</option>";
}
return $lista;
}


echo Listaproducto();