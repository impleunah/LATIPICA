
<?php 
require_once '../config/Conexion.php';
function getListasclientes(){

$query = 'SELECT id_cliente,nombre FROM tbl_cliente';
$result = ejecutarConsulta($query);
$lista = '<option value="0">Elige una opción</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[id_cliente]'>$row[nombre]</option>";
}
return $lista;
}

echo getListasclientes();