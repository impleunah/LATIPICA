
<?php 
require_once '../config/Conexion.php';
function getListaspresentacion(){

$query = 'SELECT id_presentacion,descripcion  FROM tbl_presentacion';
$result = ejecutarConsulta($query);
$listas= '<option value="0">Elige una opción</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $listas.= "<option value='$row[id_presentacion]'>$row[descripcion]</option>";
}
return $listas;
}

echo getListaspresentacion();