
<?php 
require_once '../config/Conexion.php';
function combobox_descuento(){

$query = 'SELECT * FROM `tbl_descuento` where estado = 1';
$result = ejecutarConsulta($query);
$lista = '<option value="0">Sin descuento</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[descripcion]'>$row[descripcion]</option>";
}
return $lista;
}

echo combobox_descuento();