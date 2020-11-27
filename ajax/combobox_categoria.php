<?php 
require_once '../config/Conexion.php';
function getListascategoria(){

$query = 'SELECT idcategoria,nombre FROM categoria';
$result = ejecutarConsulta($query);
$lista = '<option value="0">Elige una opción</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[idcategoria]'>$row[nombre]</option>";
}
return $lista;
}

echo getListascategoria();