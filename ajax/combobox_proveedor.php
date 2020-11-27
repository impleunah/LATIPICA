
<?php 
require_once '../config/Conexion.php';

function Listaproveedor(){

$query = 'SELECT id_proveedor,Nombre FROM tbl_proveedor';
$result = ejecutarConsulta($query);
$listas = '<option value="">"Seleccionar Proveedor"</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $listas.= "<option value='$row[id_proveedor]'>$row[Nombre]</option>";
}
return $listas;
}


echo Listaproveedor();