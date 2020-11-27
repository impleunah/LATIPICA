<?php 
require_once '../config/Conexion.php';
function getListasarticulos(){

$query = 'SELECT idarticulo,nombre FROM tbl_articulo';
$result = ejecutarConsulta($query);
$lista = '<option value="0">Elige una opción</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[idarticulo]'>$row[nombre]</option>";
}
return $lista;
}

echo getListasarticulos();