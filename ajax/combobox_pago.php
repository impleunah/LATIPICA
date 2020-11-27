
<?php 
require_once '../config/Conexion.php';
function combobox_descuento(){

$query = 'SELECT id_tipo_pago,tipo_pago FROM tbl_tipo_pago';
$result = ejecutarConsulta($query);

while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[id_tipo_pago]'>$row[tipo_pago]</option>";
}
return $lista;
}

echo combobox_descuento();