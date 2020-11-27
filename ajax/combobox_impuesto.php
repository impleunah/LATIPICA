<?php 
require_once '../config/Conexion.php';
function combobox_impuesto(){

$query = 'SELECT * FROM `tbl_impuesto` WHERE estado =1';
$result = ejecutarConsulta($query);
$lista=' ';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[descripcion]'>$row[descripcion]</option>";
}
return $lista;
}

echo combobox_impuesto();